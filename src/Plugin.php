<?php


namespace Beestjeskwijt;


use Beestjeskwijt\API\AffiliateLeadsAPI;
use Beestjeskwijt\Shortcodes\FormShortcode;
use Beestjeskwijt\Subscriber\FormSubmissionSubscriber;

class Plugin {
	const DOMAIN = 'beestjeskwijt-form';
	const VERSION = '0.1.0';

	private $loaded = false;

	private $container;

	private $plugindata;

	public function __construct($file) {
		$this->plugindata = [
			'plugin_basename' => plugin_basename($file),
			'plugin_domain' => self::DOMAIN,
			'plugin_path' => plugin_dir_path($file),
			'plugin_relative_path' => basename(plugin_dir_path($file)),
			'plugin_url' => plugin_dir_url($file),
			'plugin_version' => self::VERSION,
		];
		$this->loaded = false;
	}

	public function is_loaded(){
		return $this->loaded;
	}

	public function register_styles(){
		wp_register_style(
			'bk_style',
			$this->plugindata['plugin_url'].'css/style.css',
			[],
			self::VERSION
		);
		wp_enqueue_style('bk_style');
	}

	public function register_scripts(){
		wp_register_script(
			'bk_script',
			$this->plugindata['plugin_url'].'js/script.js',
			['jquery'],
			self::VERSION,
			true
		);
	}

	public function init(){
		if($this->is_loaded()){
			return;
		}

		$this->container['FormSubmissionSubscriber'] = new FormSubmissionSubscriber(new AffiliateLeadsAPI());
		$this->container['FormSubmissionSubscriber']->register_hooks();
		add_action('wp_enqueue_scripts', [$this, 'register_styles']);
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
		add_shortcode('beestjeskwijt-form', [$this, 'form_shortcode']);

		$this->loaded = true;
	}

	public function form_shortcode($attributes){
		$form = new FormShortcode(
			$this->plugindata['plugin_path'] . 'templates/Shortcodes/FormShortcode.php',
			'beestjeskwijt_form_template_path',
			'beestjeskwijt_form_template'
		);
		return $form->generate($attributes);
	}
}
