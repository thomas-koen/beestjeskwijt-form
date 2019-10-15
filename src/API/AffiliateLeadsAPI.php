<?php


namespace Beestjeskwijt\API;

use Beestjeskwijt\Plugin;
use InvalidArgumentException;
use UnexpectedValueException;

class AffiliateLeadsAPI {
	const API_URL = "https://beestjeskwijt.nl/api/lead";

	private $required_fields = [];

	public function __construct() {
		$this->required_fields = [
			'url' => [
				'challenge' => function($url){ return wp_http_validate_url($url); },
				'sanitize'  => function($url){ return esc_url($url); }
			],
			'zipcode' => [
				'challenge' => function($postcode){ return preg_match('/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', $postcode, $matches, PREG_OFFSET_CAPTURE, 0); },
				'sanitize'  => function($postcode){ return sanitize_text_field($postcode); }
			],
			'email' => [
				'challenge' => function($email){ return filter_var($email, FILTER_VALIDATE_EMAIL); },
				'sanitize'  => function($email){ return filter_var($email, FILTER_SANITIZE_EMAIL); }
			],
			'service_id' => [
				'challenge' => function($service_id){ return is_numeric($service_id); },
				'sanitize' => function($service_id){ return intval($service_id); }
			],
			'question' => [
				'challenge' => function($question){ return !empty($question); },
				'sanitize'  => function($question){ return sanitize_text_field($question); }
			],
			'type_contact' => [
				'challenge' => function($type_contact){ return !empty($type_contact); },
				'sanitize'  => function($type_contact){ return sanitize_text_field($type_contact); }
			],
			'streetname' => [
				'challenge' => function($streetname){ return !empty($streetname); },
				'sanitize'  => function($streetname){ return sanitize_text_field($streetname); }
			],
			'house_number' => [
				'challenge' => function($house_number){ return !empty($house_number); },
				'sanitize'  => function($house_number){ return sanitize_text_field($house_number); }
			],
			'phone_number' => [
				'challenge'	=> function($phone_number){ if(!self::disallowed_phone_numbers_filter($phone_number)){ return false; } return (preg_match('/^(((0)[1-9]{2}[0-9][-]?[1-9][0-9]{5})|((\+31|0|0031)[1-9][0-9][-]?[1-9][0-9]{6}))$/', $phone_number) || preg_match('/^(((\+31|0|0031)6){1}[1-9]{1}[0-9]{7})$/i', $phone_number)); },
				'sanitize'  => function($phone_number){ return sanitize_text_field($phone_number); }
			]
		];

	}

	public static function disallowed_phone_numbers_filter($number){
		$disallowed = [
			'12345678',
			'87654321',
			'98765432',
			'00000000',
			'11111111',
			'22222222',
			'33333333',
			'44444444',
			'555555555',
			'666666666',
			'7777777777',
			'888888888',
			'999999999'
		];
		foreach($disallowed as $string){
			if(strpos($number, $string) !== false){
				//Invalid phone number
				return false;
			}
		}
		return true;
	}

	public function validate_fields(array $fields){
		foreach($this->required_fields as $field => $callables){
			if(!in_array($field, $fields)){
				throw new InvalidArgumentException(sprintf(__('The required %s field is missing', Plugin::DOMAIN), $field));
			}

			if(is_callable($callables['sanitize'])){
				$fields[$field] = $callables['sanitize']($fields[$field]);
			}else{
				$fields[$field] = sanitize_text_field($fields[$field]);
			}

			if(is_callable($callables['challenge']) && !$callables['challenge']($fields[$field])){
				throw new InvalidArgumentException(sprintf(__('The required %s field contains an invalid value', Plugin::DOMAIN), $field));
			}
		}
		return $fields;
	}

	public function submit(array $fields){
		$fields = $this->validate_fields($fields);
		$response = wp_remote_post(self::API_URL, [
			'body'  => $fields
		]);
		if(is_wp_error($response)){
			throw new UnexpectedValueException(sprintf(__('Something went wrong while submitting the form: %s', Plugin::DOMAIN), $response->get_error_message()));
		}
		return $this->handle_response($response);
	}

	public function handle_response($response){
		$http_code = $response['response']['code'];
		if($http_code != 201){
			$body = sanitize_text_field($response['body']);
			throw new UnexpectedValueException(sprintf(__('Something went wrong while submitting the form: %s', Plugin::DOMAIN), $body));
		}
		return true;
	}
}
