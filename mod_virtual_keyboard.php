<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_virtual_keyboard
 *
 * Copyright (C) 2019 Martin Podolak
 * Licenced for free distribution under the BSDL http://www.opensource.org/licenses/bsd-license.php
 */

defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_virtual_keyboard/styles/keyboard.css');
if ($params->get('vki_responsive')=='1') {
$document->addScript('modules/mod_virtual_keyboard/styles/modernizr-2.8.3.js');
}



$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_virtual_keyboard', $params->get('layout', 'default'));
