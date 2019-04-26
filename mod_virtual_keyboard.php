<?php
/************************************************************
* Search module with virtual keyboard for Joomla 1.5.x
*
* @license GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* @package mod_virtual_keyboard
* @author Martin Podolak
* @home http://www.podolak.net

* The search module is based on Joomla $Id: mod_search.php 14401 2010-01-26 14:10:00Z louis $
* The virtual keyboard is based on JavaScript Graphical / Virtual Keyboard Interface version 1.36 by GreyWyvern. Source: http://www.greywyvern.com/code/javascript/keyboard

CHANGELOG:
V1.0 (30.06.2010):
	- initial release

************************************************************/


// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$set_Itemid		 = intval($params->get('set_itemid', 0));
$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$default_lang		 = $params->get('default_lang', '');
$keyboard_class = $params->get('keyboard_class', '');
$allow_resize = $params->get('allow_resize', '1');
$default_size = $params->get('default_size', '');
$automatic_lang = $params->get('automatic_lang', '');
$dead_keys_on = $params->get('dead_keys_on', '');
$icon_path = $params->get('icon_path', '');
$tooltip_disp_vki	 = $params->get('tooltip_disp_vki', '');
$tooltip_select_layout	 = $params->get('tooltip_select_layout', '');
$tooltip_dead_keys	 = $params->get('tooltip_dead_keys', '');
$tooltip_off	 = $params->get('tooltip_off', '');
$tooltip_close	 = $params->get('tooltip_close', '');
$tooltip_clear	 = $params->get('tooltip_clear', '');
$tooltip_input_clear	 = $params->get('tooltip_input_clear', '');
$tooltip_adjust_size	 = $params->get('tooltip_adjust_size', '');
$keyname_shift	 = $params->get('keyname_shift', '');
$keyname_alt	 = $params->get('keyname_alt', '');
$keyname_altlk	 = $params->get('keyname_altlk', '');
$keyname_altgr	 = $params->get('keyname_altgr', '');
$keyname_bksp	 = $params->get('keyname_bksp', '');
$keyname_caps	 = $params->get('keyname_caps', '');
$keyname_tab	 = $params->get('keyname_tab', '');
$keyname_enter	 = $params->get('keyname_enter', '');
$show_arabic	 = $params->get('Show Arabic', '');
$show_armenian_e = $params->get('Show Armenian East', '');
$show_armenian_w = $params->get('Show Armenian West', '');
$show_belarussian = $params->get('Show Belarussian', '');
$show_belgian	= $params->get('Show Belgian', '');
$show_bengali = $params->get('Show Bengali', '');
$show_bulgarian = $params->get('Show Bulgarian', '');
$show_burmese = $params->get('Show Burmese', '');
$show_czech = $params->get('Show Czech', '');
$show_danish = $params->get('Show Danish', '');
$show_dutch = $params->get('Show Dutch', '');
$show_dvorak = $params->get('Show Dvorak', '');
$show_farsi = $params->get('Show Farsi', '');
$show_french = $params->get('Show French', '');
$show_german = $params->get('Show German', '');
$show_greek = $params->get('Show Greek', '');
$show_hebrew = $params->get('Show Hebrew', '');
$show_hindi = $params->get('Show Hindi', '');
$show_hungarian = $params->get('Show Hungarian', '');
$show_italian = $params->get('Show Italian', '');
$show_hirakata = $params->get('Show Japanese', '');
$show_kazakh = $params->get('Show Kazakh', '');
$show_lithuanian = $params->get('Show Lithuanian', '');
$show_macedonian = $params->get('Show Macedonian', '');
$show_norwegian = $params->get('Show Norwegian', '');
$show_numpad = $params->get('Show Numpad', '');
$show_pashto = $params->get('Show Pashto', '');
$show_pinyin = $params->get('Show Pinyin', '');
$show_polish = $params->get('Show Polish Prog', '');
$show_portuguese_br = $params->get('Show Portuguese BR', '');
$show_portuguese_pt = $params->get('Show Portuguese PT', '');
$show_romanian = $params->get('Show Romanian', '');
$show_russian = $params->get('Show Russian', '');
$show_serbiancyr = $params->get('Show Serbian Cyr', '');
$show_serbianlat = $params->get('Show Serbian Lat', '');
$show_slovak = $params->get('Show Slovak', '');
$show_slovenian = $params->get('Show Slovenian', '');
$show_spanish_es = $params->get('Show Spanish ES', '');
$show_swedish = $params->get('Show Swedish', '');
$show_turkish_f = $params->get('Show Show Turkish F', '');
$show_turkish_q = $params->get('Show Show Turkish Q', '');
$show_uk = $params->get('Show UK', '');
$show_ukrainian = $params->get('Show Ukrainian', '');
$show_us = $params->get('Show US', '');
$show_us_int = $params->get('Show US International', '');
$label_arabic	 = $params->get('Label Arabic', '');
$label_armenian_e	 = $params->get('Label Armenian East', '');
$label_armenian_w	 = $params->get('Label Armenian West', '');
$label_belarussian	 = $params->get('Label Belarussian', '');
$label_belgian	 = $params->get('Label Belgian', '');
$label_bengali	 = $params->get('Label Bengali', '');
$label_bulgarian	 = $params->get('Label Bulgarian', '');
$label_burmese	 = $params->get('Label Burmese', '');
$label_czech	 = $params->get('Label Czech', '');
$label_danish	 = $params->get('Label Danish', '');
$label_dutch	 = $params->get('Label Dutch', '');
$label_dvorak	 = $params->get('Label Dvorak', '');
$label_farsi	 = $params->get('Label Farsi', '');
$label_french	 = $params->get('Label French', '');
$label_german	 = $params->get('Label German', '');
$label_greek	 = $params->get('Label Greek', '');
$label_hebrew	 = $params->get('Label Hebrew', '');
$label_hindi	 = $params->get('Label Hindi', '');
$label_hungarian	 = $params->get('Label Hungarian', '');
$label_italian	 = $params->get('Label Italian', '');
$label_hirakata	 = $params->get('Label Japanese', '');
$label_kazakh	 = $params->get('Label Kazakh', '');
$label_lithuanian	 = $params->get('Label Lithuanian', '');
$label_macedonian	 = $params->get('Label Macedonian', '');
$label_norwegian	 = $params->get('Label Norwegian', '');
$label_numpad	 = $params->get('Label Numpad', '');
$label_pashto	 = $params->get('Label Pashto', '');
$label_pinyin	 = $params->get('Label Pinyin', '');
$label_polish	 = $params->get('Label Polish Prog', '');
$label_portuguese_br	 = $params->get('Label Portuguese BR', '');
$label_portuguese_pt	 = $params->get('Label Portuguese PT', '');
$label_romanian	 = $params->get('Label Romanian', '');
$label_russian	 = $params->get('Label Russian', '');
$label_serbiancyr	 = $params->get('Label Serbian Cyr', '');
$label_serbianlat	 = $params->get('Label Serbian Lat', '');
$label_slovak	 = $params->get('Label Slovak', '');
$label_slovenian	 = $params->get('Label Slovenian', '');
$label_spanish_es	 = $params->get('Label Spanish ES', '');
$label_swedish	 = $params->get('Label Swedish', '');
$label_turkish_f	 = $params->get('Label Turkish F', '');
$label_turkish_q	 = $params->get('Label Turkish Q', '');
$label_uk	 = $params->get('Label UK', '');
$label_ukrainian	 = $params->get('Label Ukrainian', '');
$label_us	 = $params->get('Label US', '');
$label_us_int	 = $params->get('Label US International', '');
$mitemid = $set_Itemid > 0 ? $set_Itemid : JRequest::getInt('Itemid');
require(JModuleHelper::getLayoutPath('mod_virtual_keyboard'));
