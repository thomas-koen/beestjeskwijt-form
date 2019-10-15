<?php


namespace Beestjeskwijt;


use Beestjeskwijt\API\AffiliateLeadsAPI;
use Beestjeskwijt\Shortcodes\FormShortcode;
use Beestjeskwijt\Subscriber\FormSubmissionSubscriber;

class Plugin {
	const DOMAIN = 'beestjeskwijt-form';
	const VERSION = '0.1.0';

	private $loaded = false;

	private $container = [];


	public function __construct() {
		$this->loaded = false;
	}

	public function is_loaded(){
		return $this->loaded;
	}

	public function init(){
		if($this->is_loaded()){
			return;
		}

		$this->container['FormSubmissionSubscriber'] = new FormSubmissionSubscriber(new AffiliateLeadsAPI());
		$this->container['FormSubmissionSubscriber']->register_hooks();

		$this->loaded = true;
	}
}
