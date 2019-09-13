<?php

define('_ILAW_SM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('_ILAW_SM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('_ILAW_SM_PLUGIN_BASENAME',plugin_basename(__FILE__));



require_once _ILAW_SM_PLUGIN_PATH . 'includes/helpers.php';
require_once _ILAW_SM_PLUGIN_PATH . 'includes/register-fields.php';
require_once _ILAW_SM_PLUGIN_PATH . 'includes/register-sidebars.php';

require_once _ILAW_SM_PLUGIN_PATH . 'includes/setup-columns.php';