<?php


namespace Beestjeskwijt\Subscriber;


use Beestjeskwijt\API\AffiliateLeadsAPI;

class FormSubmissionSubscriber {
	private $affiliate_leads_API;

	public function __construct(AffiliateLeadsAPI $affiliate_leads_API) {
		$this->affiliate_leads_API = $affiliate_leads_API;
	}

	public function register_hooks(){
		add_action('wp_ajax_bk_submit_form', [$this, 'handle_submission']);
		add_action('wp_ajax_nopriv_bk_submit_form', [$this, 'handle_submission']);
	}

	public function handle_submission(){

	}
}
