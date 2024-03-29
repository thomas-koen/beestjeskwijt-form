<?php
/**
 * Plugin Name:     Beestjeskwijt Formulier
 * Plugin URI:      https://github.com/thomas-koen/beestjeskwijt-form
 * Description:     Formulier voor Beestjeskwijt affiliate
 * Author:          tyCoon Media
 * Author URI:      https://tycoonmedia.net
 * Text Domain:     beestjeskwijt-form
 * Domain Path:     /languages
 * Version:         0.2.0
 *
 * @package         Beestjeskwijt_Form
 */

namespace Beestjeskwijt;

// Your code starts here.


require_once __DIR__. '/vendor/autoload.php';

$beestjeskwijt_plugin = new Plugin(__FILE__);

add_action('after_setup_theme', [$beestjeskwijt_plugin, 'init']);
