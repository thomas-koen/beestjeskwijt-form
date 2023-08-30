<?php

namespace Beestjeskwijt\Subscriber;

use Beestjeskwijt\API\AffiliateLeadsAPI;
use Beestjeskwijt\Exceptions\InvalidFormValueException;
use Exception;
use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

class RESTSubscriber
{
	const REST_NAMESPACE = 'bkf/v1';
	/**
	 * @var AffiliateLeadsAPI
	 */
	private $API;


	public function __construct(AffiliateLeadsAPI $API){

		$this->API = $API;
	}
	public function register_hooks(){
		add_action('rest_api_init', [$this,'register_rest_routes']);
	}

	public function register_rest_routes(){
		register_rest_route(
			self::REST_NAMESPACE,
			'/processform/',
			[
				'methods' 	=> \WP_REST_Server::CREATABLE,
				'callback'	=> [$this, 'submit_form'],
			]
		);
	}

	public function submit_form(WP_REST_Request $request)
	{
		try{
			$fields = $this->API->submit($request->get_json_params());
		}catch(InvalidFormValueException $e){
			return new WP_Error('invalid_field', $e->getMessage(), ['field' => $e->get_field()]);
		}catch(Exception $e){
			return new WP_Error('unknown_error', $e->getMessage());
		}

		return new WP_REST_Response('ok');
	}
}
