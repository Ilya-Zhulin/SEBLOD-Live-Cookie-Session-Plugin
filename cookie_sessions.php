<?php

/**
 * @version 			SEBLOD 3.x More
 * @url				https://zhulinia.ru
 * @editor			Ilya A. Zhulin
 * @copyright		Copyright (C) 2022. All Rights Reserved.
 * @license 			GNU General Public License version 2 or later; see _LICENSE.php
 * */
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

// Plugin
class plgCCK_Field_LiveCookie_Sessions extends JCckPluginLive {

	protected static $type = 'cookie_sessions';

	// -------- -------- -------- -------- -------- -------- -------- -------- // Prepare
	// onCCK_Field_LivePrepareForm
	public function onCCK_Field_LivePrepareForm(&$field, &$value = '', &$config = array(), $inherit = array()) {
		if (self::$type != $field->live) {
			return;
		}

		// Init
		$live	 = '';
		$options = parent::g_getLive($field->live_options);

		// Prepare
		$default	 = $options->get('default_value', '');
		$variable	 = $options->get('variable', 'art_id');
		$source		 = $options->get('source', 'cookie');

		if ($variable && $source) {
			switch ($source) {
				case'session':
					$session = Factory::getSession();
					$live	 = $session->get($variable);
					break;
				case 'cookie':
					$app	 = Factory::getApplication();
					$cookie	 = $app->input->cookie->getArray();
					$live	 = (isset($cookie[$variable])) ? $cookie[$variable] : '';
					break;
			}
		}
		$live	 = (strlen($live) > 0) ? $live : $default;
		// Set
		$value	 = $live;
	}

}

?>