<?php


namespace Beestjeskwijt\Subscriber;

use Exception;
use Beestjeskwijt\API\AffiliateLeadsAPI;

class FormSubmissionSubscriber {
	private $affiliate_leads_API;

	public function __construct(AffiliateLeadsAPI $affiliate_leads_API) {
		$this->affiliate_leads_API = $affiliate_leads_API;
	}

	public function register_hooks(){
		add_action('admin_post_nopriv_bk_submit_form', [$this, 'handle_submission']);
		add_action('admin_post_bk_submit_form', [$this, 'handle_submission']);
	}

	public function handle_submission(){
		try{
			$this->affiliate_leads_API->submit($_POST['bk_form_fields']);
		}catch(Exception $e){
			$error = $e->getMessage();
			wp_safe_redirect(wp_sanitize_redirect(add_query_arg('bk_error', urlencode($error), $_POST['bk_formpage'])));
			exit;
		}
		wp_safe_redirect(wp_sanitize_redirect(add_query_arg('bk_success', true, $_POST['bk_formpage'])));
		exit;
	}
}
