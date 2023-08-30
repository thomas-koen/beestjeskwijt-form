<?php


namespace Beestjeskwijt\Shortcodes;


class FormShortcode {

	private $default_template_path;

	private $filter_name;

	private $query_template_name;

	public function __construct($default_template_path, $filter_name, $query_template_name) {
		$this->default_template_path = $default_template_path;
		$this->filter_name = $filter_name;
		$this->query_template_name = $query_template_name;
	}


	public function generate($attributes){
		if(!isset($attributes['affiliateurl'])){
			return '<!-- Invalid affiliateurl supplied -->';
		}

		$template_path = $this->get_template_path();
		if (!is_readable($template_path)) {
			return sprintf('<!-- Could not read "%s" file -->', $template_path);
		}

		wp_enqueue_script("bk_script");

		ob_start();
		include $template_path;
		return ob_get_clean();
	}

	public function get_template_path(){
		$template_path = get_query_template($this->query_template_name);
		if(empty($template_path)){
			$template_path = $this->default_template_path;
		}
		return apply_filters($this->filter_name, $template_path);
	}

}
