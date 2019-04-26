<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo JURI::base()  ?>modules/mod_virtual_keyboard/keyboard/keyboard.css">
<script type="text/javascript" charset="UTF-8">
var VKI_attach, VKI_close;
  function VKI_buildKeyboardInputs() {
    var self = this;

    this.VKI_version = "1.36";
    this.VKI_showVersion = false;
    this.VKI_target = false;
    this.VKI_shift = this.VKI_shiftlock = false;
    this.VKI_altgr = this.VKI_altgrlock = false;
    this.VKI_dead = false;
    this.VKI_deadkeysOn = <?php if ($dead_keys_on =="1") {echo "true";} else {echo "false";}?>;
    this.VKI_kts = this.VKI_kt = "<?php if ($default_lang == "arabic") {echo $label_arabic;}
elseif ($default_lang == "armenian_e") {echo $label_armenian_e;}
elseif ($default_lang == "armenian_w") {echo $label_armenian_w;}
elseif ($default_lang == "belarussian") {echo $label_belarussian;}
elseif ($default_lang == "belgian") {echo $label_belgian;}
elseif ($default_lang == "bengali") {echo $label_bengali;}
elseif ($default_lang == "bulgarian") {echo $label_bulgarian;}
elseif ($default_lang == "burmese") {echo $label_burmese;}
elseif ($default_lang == "czech") {echo $label_czech;}
elseif ($default_lang == "danish") {echo $label_danish;}
elseif ($default_lang == "dutch") {echo $label_dutch;}
elseif ($default_lang == "dvorak") {echo $label_dvorak;}
elseif ($default_lang == "farsi") {echo $label_farsi;}
elseif ($default_lang == "french") {echo $label_french;}
elseif ($default_lang == "german") {echo $label_german;}
elseif ($default_lang == "greek") {echo $label_greek;}
elseif ($default_lang == "hebrew") {echo $label_hebrew;}
elseif ($default_lang == "hindi") {echo $label_hindi;}
elseif ($default_lang == "hungarian") {echo $label_hungarian;}
elseif ($default_lang == "italian") {echo $label_italian;}
elseif ($default_lang == "hirakata") {echo $label_hirakata;}
elseif ($default_lang == "kazakh") {echo $label_kazakh;}
elseif ($default_lang == "lithuanian") {echo $label_lithuanian;}
elseif ($default_lang == "macedonian") {echo $label_macedonian;}
elseif ($default_lang == "norwegian") {echo $label_norwegian;}
elseif ($default_lang == "numpad") {echo $label_numpad;}
elseif ($default_lang == "pashto") {echo $label_pashto;}
elseif ($default_lang == "pinyin") {echo $label_pinyin;}
elseif ($default_lang == "polish") {echo $label_polish;}
elseif ($default_lang == "portuguese_br") {echo $label_portuguese_br;}
elseif ($default_lang == "portuguese_pt") {echo $label_portuguese_pt;}
elseif ($default_lang == "romanian") {echo $label_romanian;}
elseif ($default_lang == "russian") {echo $label_russian;}
elseif ($default_lang == "serbiancyr") {echo $label_serbiancyr;}
elseif ($default_lang == "serbianlat") {echo $label_serbianlat;}
elseif ($default_lang == "slovak") {echo $label_slovak;}
elseif ($default_lang == "slovenian") {echo $label_slovenian;}
elseif ($default_lang == "spanish_es") {echo $label_spanish_es;}
elseif ($default_lang == "swedish") {echo $label_swedish;}
elseif ($default_lang == "turkish_f") {echo $label_turkish_f;}
elseif ($default_lang == "turkish_q") {echo $label_turkish_q;}
elseif ($default_lang == "uk") {echo $label_uk;}
elseif ($default_lang == "ukrainian") {echo $label_ukrainian;}
elseif ($default_lang == "us") {echo $label_us;}
else {echo $label_us_int;}?>";  // Default keyboard layout
    this.VKI_langAdapt = <?php if ($automatic_lang =="1") {echo "true";} else {echo "false";}?>;  // Use lang attribute of input to select keyboard
    this.VKI_size = <?php echo $default_size ?>;  // Default keyboard size (1-5)
    this.VKI_sizeAdj = <?php if ($allow_resize =="1") {echo "true";} else {echo "false";}?>;  // Allow user to adjust keyboard size
    this.VKI_clearPasswords = false;  // Clear password fields on focus
    this.VKI_imageURI = "<?php echo $icon_path ?>";
    this.VKI_clickless = 0;  // 0 = disabled, > 0 = delay in ms
    this.VKI_keyCenter = 3;

    this.VKI_isIE = /*@cc_on!@*/false;
    this.VKI_isIE6 = /*@if(@_jscript_version == 5.6)!@end@*/false;
    this.VKI_isIElt8 = /*@if(@_jscript_version < 5.8)!@end@*/false;
    this.VKI_isWebKit = window.opera;
    this.VKI_isOpera = RegExp("Opera").test(navigator.userAgent);
    this.VKI_isMoz = (!this.VKI_isWebKit && navigator.product == "Gecko");

    /* ***** i18n text strings ************************************* */
    this.VKI_i18n = {
      '00': "Virtual Keyboard Interface",
      '01': "<?php echo $tooltip_disp_vki ?>",
      '02': "<?php echo $tooltip_select_layout ?>",
      '03': "<?php echo $tooltip_dead_keys ?>",
      '04': "<?php echo $tooltip_on ?>",
      '05': "<?php echo $tooltip_off ?>",
      '06': "<?php echo $tooltip_close ?>",
      '07': "<?php echo $tooltip_clear ?>",
      '08': "<?php echo $tooltip_input_clear ?>",
      '09': "Version",
      '10': "<?php echo $tooltip_adjust_size ?>"
    };

    /* ***** Create keyboards ************************************** */
    this.VKI_layout = {};
	<?php if (($show_arabic == "1") OR ($default_lang == "arabic")) {echo "

    this.VKI_layout[\"$label_arabic\"] = [ // Arabic Keyboard
      [[\"\u0630\", \"\u0651 \"], [\"1\", \"!\", \"\u00a1\", \"\u00b9\"], [\"2\", \"@\", \"\u00b2\"], [\"3\", \"#\", \"\u00b3\"], [\"4\", \"$\", \"\u00a4\", \"\u00a3\"], [\"5\", \"%\", \"\u20ac\"], [\"6\", \"^\", \"\u00bc\"], [\"7\", \"&\", \"\u00bd\"], [\"8\", \"*\", \"\u00be\"], [\"9\", \"(\", \"\u2018\"], [\"0\", \")\", \"\u2019\"], [\"-\", \"_\", \"\u00a5\"], [\"=\", \"+\", \"\u00d7\", \"\u00f7\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0636\", \"\u064e\"], [\"\u0635\", \"\u064b\"], [\"\u062b\", \"\u064f\"], [\"\u0642\", \"\u064c\"], [\"\u0641\", \"\u0644\"], [\"\u063a\", \"\u0625\"], [\"\u0639\", \"\u2018\"], [\"\u0647\", \"\u00f7\"], [\"\u062e\", \"\u00d7\"], [\"\u062d\", \"\u061b\"], [\"\u062c\", \"\u003c\"], [\"\u062f\", \"\u003e\"], [\"\u005c\", \"\u007c\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0634\", \"\u0650\"], [\"\u0633\", \"\u064d\"], [\"\u064a\", \"\u005d\"], [\"\u0628\", \"\u005b\"], [\"\u0644\", \"\u0644\"], [\"\u0627\", \"\u0623\"], [\"\u062a\", \"\u0640\"], [\"\u0646\", \"\u060c\"], [\"\u0645\", \"\u002f\"], [\"\u0643\", \"\u003a\"], [\"\u0637\", \"\u0022\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u0626\", \"\u007e\"], [\"\u0621\", \"\u0652\"], [\"\u0624\", \"\u007d\"], [\"\u0631\", \"\u007b\"], [\"\u0644\", \"\u0644\"], [\"\u0649\", \"\u0622\"], [\"\u0629\", \"\u2019\"], [\"\u0648\", \"\u002c\"], [\"\u0632\", \"\u002e\"], [\"\u0638\", \"\u061f\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ]; this.VKI_layout[\"$label_arabic\"].lang = [\"ar\"];";} ?>

	<?php if (($show_armenian_e == "1") OR ($default_lang == "armenian_e")) {echo "
    this.VKI_layout[\"$label_armenian_e\"] = [ // Eastern Armenian Keyboard
      [[\"\u055D\", \"\u055C\"], [\":\", \"1\"], [\"\u0571\", \"\u0541\"], [\"\u0575\", \"\u0545\"], [\"\u055B\", \"3\"], [\",\", \"4\"], [\"-\", \"9\"], [\".\", \"\u0587\"], [\"\u00AB\", \"(\"], [\"\u00BB\", \")\"], [\"\u0585\", \"\u0555\"], [\"\u057C\", \"\u054C\"], [\"\u056A\", \"\u053A\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u056D\", \"\u053D\"], [\"\u0582\", \"\u0552\"], [\"\u0567\", \"\u0537\"], [\"\u0580\", \"\u0550\"], [\"\u057F\", \"\u054F\"], [\"\u0565\", \"\u0535\"], [\"\u0568\", \"\u0538\"], [\"\u056B\", \"\u053B\"], [\"\u0578\", \"\u0548\"], [\"\u057A\", \"\u054A\"], [\"\u0579\", \"\u0549\"], [\"\u057B\", \"\u054B\"], [\"'\", \"\u055E\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0561\", \"\u0531\"], [\"\u057D\", \"\u054D\"], [\"\u0564\", \"\u0534\"], [\"\u0586\", \"\u0556\"], [\"\u0584\", \"\u0554\"], [\"\u0570\", \"\u0540\"], [\"\u0573\", \"\u0543\"], [\"\u056F\", \"\u053F\"], [\"\u056C\", \"\u053C\"], [\"\u0569\", \"\u0539\"], [\"\u0583\", \"\u0553\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u0566\", \"\u0536\"], [\"\u0581\", \"\u0551\"], [\"\u0563\", \"\u0533\"], [\"\u057E\", \"\u054E\"], [\"\u0562\", \"\u0532\"], [\"\u0576\", \"\u0546\"], [\"\u0574\", \"\u0544\"], [\"\u0577\", \"\u0547\"], [\"\u0572\", \"\u0542\"], [\"\u056E\", \"\u053E\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_armenian_e\"].lang = [\"hy\"];";} ?>

		<?php if (($show_armenian_w == "1") OR ($default_lang == "armenian_w")) {echo "
    this.VKI_layout[\"$label_armenian_w\"] = [ // Western Armenian Keyboard
      [[\"\u055D\", \"\u055C\"], [\":\", \"1\"], [\"\u0571\", \"\u0541\"], [\"\u0575\", \"\u0545\"], [\"\u055B\", \"3\"], [\",\", \"4\"], [\"-\", \"9\"], [\".\", \"\u0587\"], [\"\u00AB\", \"(\"], [\"\u00BB\", \")\"], [\"\u0585\", \"\u0555\"], [\"\u057C\", \"\u054C\"], [\"\u056A\", \"\u053A\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u056D\", \"\u053D\"], [\"\u057E\", \"\u054E\"], [\"\u0567\", \"\u0537\"], [\"\u0580\", \"\u0550\"], [\"\u0564\", \"\u0534\"], [\"\u0565\", \"\u0535\"], [\"\u0568\", \"\u0538\"], [\"\u056B\", \"\u053B\"], [\"\u0578\", \"\u0548\"], [\"\u0562\", \"\u0532\"], [\"\u0579\", \"\u0549\"], [\"\u057B\", \"\u054B\"], [\"'\", \"\u055E\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0561\", \"\u0531\"], [\"\u057D\", \"\u054D\"], [\"\u057F\", \"\u054F\"], [\"\u0586\", \"\u0556\"], [\"\u056F\", \"\u053F\"], [\"\u0570\", \"\u0540\"], [\"\u0573\", \"\u0543\"], [\"\u0584\", \"\u0554\"], [\"\u056C\", \"\u053C\"], [\"\u0569\", \"\u0539\"], [\"\u0583\", \"\u0553\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u0566\", \"\u0536\"], [\"\u0581\", \"\u0551\"], [\"\u0563\", \"\u0533\"], [\"\u0582\", \"\u0552\"], [\"\u057A\", \"\u054A\"], [\"\u0576\", \"\u0546\"], [\"\u0574\", \"\u0544\"], [\"\u0577\", \"\u0547\"], [\"\u0572\", \"\u0542\"], [\"\u056E\", \"\u053E\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_armenian_w\"].lang = [\"hy-arevmda\"];";} ?>

	<?php if (($show_belarussian == "1") OR ($default_lang == "belarussian")) {echo "
    this.VKI_layout[\"$label_belarussian\"] = [ // Belarusian Standard Keyboard
      [[\"\u0451\", \"\u0401\"], [\"1\", \"!\"], [\"2\", '\"'], [\"3\", \"\u2116\"], [\"4\", \";\"], [\"5\", \"%\"], [\"6\", \":\"], [\"7\", \"?\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0439\", \"\u0419\"], [\"\u0446\", \"\u0426\"], [\"\u0443\", \"\u0423\"], [\"\u043a\", \"\u041a\"], [\"\u0435\", \"\u0415\"], [\"\u043d\", \"\u041d\"], [\"\u0433\", \"\u0413\"], [\"\u0448\", \"\u0428\"], [\"\u045e\", \"\u040e\"], [\"\u0437\", \"\u0417\"], [\"\u0445\", \"\u0425\"], [\"'\", \"'\"], [\"\u005c\", \"/\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0444\", \"\u0424\"], [\"\u044b\", \"\u042b\"], [\"\u0432\", \"\u0412\"], [\"\u0430\", \"\u0410\"], [\"\u043f\", \"\u041f\"], [\"\u0440\", \"\u0420\"], [\"\u043e\", \"\u041e\"], [\"\u043b\", \"\u041b\"], [\"\u0434\", \"\u0414\"], [\"\u0436\", \"\u0416\"], [\"\u044d\", \"\u042d\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"/\", \"|\"], [\"\u044f\", \"\u042f\"], [\"\u0447\", \"\u0427\"], [\"\u0441\", \"\u0421\"], [\"\u043c\", \"\u041c\"], [\"\u0456\", \"\u0406\"], [\"\u0442\", \"\u0422\"], [\"\u044c\", \"\u042c\"], [\"\u0431\", \"\u0411\"], [\"\u044e\", \"\u042e\"], [\".\", \",\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_belarussian\"].lang = [\"be\"];";}
?>
	<?php if (($show_belgian == "1") OR ($default_lang == "belgian")) {echo "
    this.VKI_layout[\"$label_belgian\"] = [ // Belgian Standard Keyboard
      [[\"\u00b2\", \"\u00b3\"], [\"&\", \"1\", \"|\"], [\"\u00e9\", \"2\", \"@\"], ['\"', \"3\", \"#\"], [\"'\", \"4\"], [\"(\", \"5\"], [\"\u00a7\", \"6\", \"^\"], [\"\u00e8\", \"7\"], [\"!\", \"8\"], [\"\u00e7\", \"9\", \"{\"], [\"\u00e0\", \"0\", \"}\"], [\")\", \"\u00b0\"], [\"-\", \"_\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"a\", \"A\"], [\"z\", \"Z\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u005e\", \"\u00a8\", \"[\"], [\"$\", \"*\", \"]\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"q\", \"Q\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"m\", \"M\"], [\"\u00f9\", \"%\", \"\u00b4\"], [\"\u03bc\", \"\u00a3\", \"`\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\", \"\u005c\"], [\"w\", \"W\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\",\", \"?\"], [\";\", \".\"], [\":\", \"/\"], [\"=\", \"+\", \"~\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_belgian\"].lang = [\"nl-BE\", \"fr-BE\"];";}
?>
	<?php if (($show_bengali == "1") OR ($default_lang == "bengali")) {echo "
    this.VKI_layout[\"$label_bengali\"] = [ // Bengali Standard Keyboard
      [[\"\"], [\"1\", \"\", \"\u09E7\"], [\"2\", \"\", \"\u09E8\"], [\"3\", \"\u09CD\u09B0\", \"\u09E9\"], [\"4\", \"\u09B0\u09CD\", \"\u09EA\"], [\"5\", \"\u099C\u09CD\u09B0\", \"\u09EB\"], [\"6\", \"\u09A4\u09CD\u09B7\", \"\u09EC\"], [\"7\", \"\u0995\u09CD\u09B0\", \"\u09ED\"], [\"8\", \"\u09B6\u09CD\u09B0\", \"\u09EE\"], [\"9\", \"(\", \"\u09EF\"], [\"0\", \")\", \"\u09E6\"], [\"-\", \"\u0983\"], [\"\u09C3\", \"\u098B\", \"\u09E2\", \"\u09E0\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u09CC\", \"\u0994\", \"\u09D7\"], [\"\u09C8\", \"\u0990\"], [\"\u09BE\", \"\u0986\"], [\"\u09C0\", \"\u0988\", \"\u09E3\", \"\u09E1\"], [\"\u09C2\", \"\u098A\"], [\"\u09AC\", \"\u09AD\"], [\"\u09B9\", \"\u0999\"], [\"\u0997\", \"\u0998\"], [\"\u09A6\", \"\u09A7\"], [\"\u099C\", \"\u099D\"], [\"\u09A1\", \"\u09A2\", \"\u09DC\", \"\u09DD\"], [\"\u09BC\", \"\u099E\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u09CB\", \"\u0993\", \"\u09F4\", \"\u09F5\"], [\"\u09C7\", \"\u098F\", \"\u09F6\", \"\u09F7\"], [\"\u09CD\", \"\u0985\", \"\u09F8\", \"\u09F9\"], [\"\u09BF\", \"\u0987\", \"\u09E2\", \"\u098C\"], [\"\u09C1\", \"\u0989\"], [\"\u09AA\", \"\u09AB\"], [\"\u09B0\", \"\", \"\u09F0\", \"\u09F1\"], [\"\u0995\", \"\u0996\"], [\"\u09A4\", \"\u09A5\"], [\"\u099A\", \"\u099B\"], [\"\u099F\", \"\u09A0\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\"], [\"\u0982\", \"\u0981\", \"\u09FA\"], [\"\u09AE\", \"\u09A3\"], [\"\u09A8\"], [\"\u09AC\"], [\"\u09B2\"], [\"\u09B8\", \"\u09B6\"], [\",\", \"\u09B7\"], [\".\", \"{\"], [\"\u09AF\", \"\u09DF\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_bengali\"].lang = [\"bn\"];";}
?>
	<?php if (($show_bulgarian == "1") OR ($default_lang == "bulgarian")) {echo "
    this.VKI_layout[\"$label_bulgarian\"] = [ // Bulgarian Phonetic Keyboard
      [[\"\u0447\", \"\u0427\"], [\"1\", \"!\"], [\"2\", \"@\"], [\"3\", \"#\"], [\"4\", \"$\"], [\"5\", \"%\"], [\"6\", \"^\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u044F\", \"\u042F\"], [\"\u0432\", \"\u0412\"], [\"\u0435\", \"\u0415\"], [\"\u0440\", \"\u0420\"], [\"\u0442\", \"\u0422\"], [\"\u044A\", \"\u042A\"], [\"\u0443\", \"\u0423\"], [\"\u0438\", \"\u0418\"], [\"\u043E\", \"\u041E\"], [\"\u043F\", \"\u041F\"], [\"\u0448\", \"\u0428\"], [\"\u0449\", \"\u0429\"], [\"\u044E\", \"\u042E\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0430\", \"\u0410\"], [\"\u0441\", \"\u0421\"], [\"\u0434\", \"\u0414\"], [\"\u0444\", \"\u0424\"], [\"\u0433\", \"\u0413\"], [\"\u0445\", \"\u0425\"], [\"\u0439\", \"\u0419\"], [\"\u043A\", \"\u041A\"], [\"\u043B\", \"\u041B\"], [\";\", \":\"], [\"'\", '\"'], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u0437\", \"\u0417\"], [\"\u044C\", \"\u042C\"], [\"\u0446\", \"\u0426\"], [\"\u0436\", \"\u0416\"], [\"\u0431\", \"\u0411\"], [\"\u043D\", \"\u041D\"], [\"\u043C\", \"\u041C\"], [\",\", \"<\"], [\".\", \">\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_bulgarian\"].lang = [\"bg\"];";}
?>
	<?php if (($show_burmese == "1") OR ($default_lang == "burmese")) {echo "
    this.VKI_layout[\"$label_burmese\"] = [ // Burmese Keyboard
      [[\"\u1039`\", \"~\"], [\"\u1041\", \"\u100D\"], [\"\u1042\", \"\u100E\"], [\"\u1043\", \"\u100B\"], [\"\u1044\", \"\u1000\u103B\u1015\u103A\"], [\"\u1045\", \"%\"], [\"\u1046\", \"\u002F\"], [\"\u1047\", \"\u101B\"], [\"\u1048\", \"\u1002\"], [\"\u1049\", \"(\"], [\"\u1040\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u1006\", \"\u1029\"], [\"\u1010\", \"\u1040\"], [\"\u1014\", \"\u103F\"], [\"\u1019\", \"\u1023\"], [\"\u1021\", \"\u1024\"], [\"\u1015\", \"\u104C\"], [\"\u1000\", \"\u1009\"], [\"\u1004\", \"\u104D\"], [\"\u101E\", \"\u1025\"], [\"\u1005\", \"\u100F\"], [\"\u101F\", \"\u1027\"], [\"\u2018\", \"\u2019\"], [\"\u104F\", \"\u100B\u1039\u100C\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u200B\u1031\", \"\u1017\"], [\"\u200B\u103B\", \"\u200B\u103E\"], [\"\u200B\u102D\", \"\u200B\u102E\"], [\"\u200B\u103A\",\"\u1004\u103A\u1039\u200B\"], [\"\u200B\u102B\", \"\u200B\u103D\"], [\"\u200B\u1037\", \"\u200B\u1036\"], [\"\u200B\u103C\", \"\u200B\u1032\"], [\"\u200B\u102F\", \"\u200B\u102F\"], [\"\u200B\u1030\", \"\u200B\u1030\"], [\"\u200B\u1038\", \"\u200B\u102B\u103A\"], [\"\u1012\", \"\u1013\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u1016\", \"\u1007\"], [\"\u1011\", \"\u100C\"], [\"\u1001\", \"\u1003\"], [\"\u101C\", \"\u1020\"], [\"\u1018\", \"\u1026\"], [\"\u100A\", \"\u1008\"], [\"\u200B\u102C\", \"\u102A\"], [\"\u101A\", \"\u101B\"], [\"\u002E\", \"\u101B\"], [\"\u104B\", \"\u104A\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_burmese\"].lang = [\"my\"];";}
?>
	<?php if (($show_czech == "1") OR ($default_lang == "czech")) {echo "
    this.VKI_layout[\"$label_czech\"] = [ // Czech Keyboard
     [[\";\", \"\u00b0\", \"`\", \"~\"], [\"+\", \"1\", \"!\"], [\"\u011B\", \"2\", \"@\"], [\"\u0161\", \"3\", \"#\"], [\"\u010D\", \"4\", \"$\"], [\"\u0159\", \"5\", \"%\"], [\"\u017E\", \"6\", \"^\"], [\"\u00FD\", \"7\", \"&\"], [\"\u00E1\", \"8\", \"*\"], [\"\u00ED\", \"9\", \"(\"], [\"\u00E9\", \"0\", \")\"], [\"=\", \"%\", \"-\", \"_\"], [\"\u00B4\", \"\u02c7\", \"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
     [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20AC\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00FA\", \"/\", \"[\", \"{\"], [\")\", \"(\", \"]\", \"}\"], [\"$keyname_enter\", \"$keyname_enter\"]],
     [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u016F\", '\"', \";\", \":\"], [\"\u00A7\", \"!\", \"\u00a4\", \"^\"], [\"\u00A8\", \"'\", \"\u005c\", \"|\"]],
     [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u005c\", \"|\", \"\", \"\u02dd\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \"?\", \"<\", \"\u00d7\"], [\".\", \":\", \">\", \"\u00f7\"], [\"-\", \"_\", \"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
     [[\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ];  this.VKI_layout[\"$label_czech\"].lang = [\"cs\"];";}
?>
	<?php if (($show_danish == "1") OR ($default_lang == "danish")) {echo "
    this.VKI_layout[\"$label_danish\"] = [ // Danish Standard Keyboard
      [[\"\u00bd\", \"\u00a7\"], [\"1\", \"!\"], [\"2\", '\"', \"@\"], [\"3\", \"#\", \"\u00a3\"], [\"4\", \"\u00a4\", \"$\"], [\"5\", \"%\", \"\u20ac\"], [\"6\", \"&\"], [\"7\", \"/\", \"{\"], [\"8\", \"(\", \"[\"], [\"9\", \")\", \"]\"], [\"0\", \"=\", \"}\"], [\"+\", \"?\"], [\"\u00b4\", \"`\", \"|\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00e5\", \"\u00c5\"], [\"\u00a8\", \"^\", \"~\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00e6\", \"\u00c6\"], [\"\u00f8\", \"\u00d8\"], [\"'\", \"*\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\", \"\u005c\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\", \"\u03bc\", \"\u039c\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_danish\"].lang = [\"da\"];";}
?>
	<?php if (($show_dutch == "1") OR ($default_lang == "dutch")) {echo "
    this.VKI_layout[\"$label_dutch\"] = [ // Dutch Standard Keyboard
      [[\"@\", \"\u00a7\", \"\u00ac\"], [\"1\", \"!\", \"\u00b9\"], [\"2\", '\"', \"\u00b2\"], [\"3\", \"#\", \"\u00b3\"], [\"4\", \"$\", \"\u00bc\"], [\"5\", \"%\", \"\u00bd\"], [\"6\", \"&\", \"\u00be\"], [\"7\", \"_\", \"\u00a3\"], [\"8\", \"(\", \"{\"], [\"9\", \")\", \"}\"], [\"0\", \"'\"], [\"/\", \"?\", \"\u005c\"], [\"\u00b0\", \"~\", \"\u00b8\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\", \"\u00b6\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00a8\", \"^\"], [\"*\", \"|\"], [\"<\", \">\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\", \"\u00df\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"+\", \"\u00b1\"], [\"\u00b4\", \"\u0060\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"]\", \"[\", \"\u00a6\"], [\"z\", \"Z\", \"\u00ab\"], [\"x\", \"X\", \"\u00bb\"], [\"c\", \"C\", \"\u00a2\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\", \"\u00b5\"], [\",\", \";\"], [\".\", \":\", \"\u00b7\"], [\"-\", \"=\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_dutch\"].lang = [\"nl\"];";}
?>
	<?php if (($show_dvorak == "1") OR ($default_lang == "dvorak")) {echo "
    this.VKI_layout[\"$label_dvorak\"] = [ // Dvorak Keyboard
      [[\"`\", \"~\"], [\"1\", \"!\"], [\"2\", \"@\"], [\"3\", \"#\"], [\"4\", \"$\"], [\"5\", \"%\"], [\"6\", \"^\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"[\", \"{\"], [\"]\", \"}\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"],[\"'\", '\"'], [\",\", \"<\"], [\".\", \">\"], [\"p\", \"P\"], [\"y\", \"Y\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"c\", \"C\"], [\"r\", \"R\"], [\"l\", \"L\"], [\"/\", \"?\"], [\"=\", \"+\"], [\"\u005c\", \"|\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"o\", \"O\"], [\"e\", \"E\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"d\", \"D\"], [\"h\", \"H\"], [\"t\", \"T\"], [\"n\", \"N\"], [\"s\", \"S\"], [\"-\", \"_\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\";\", \":\"], [\"q\", \"Q\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"x\", \"X\"], [\"b\", \"B\"], [\"m\", \"M\"], [\"w\", \"W\"], [\"v\", \"V\"], [\"z\", \"Z\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ];";}
?>
	<?php if (($show_farsi == "1") OR ($default_lang == "farsi")) {echo "
    this.VKI_layout[\"$label_farsi\"] = [ // Farsi Keyboard
      [[\"\u067e\", \"\u0651 \"], [\"1\", \"!\", \"\u00a1\", \"\u00b9\"], [\"2\", \"@\", \"\u00b2\"], [\"3\", \"#\", \"\u00b3\"], [\"4\", \"$\", \"\u00a4\", \"\u00a3\"], [\"5\", \"%\", \"\u20ac\"], [\"6\", \"^\", \"\u00bc\"], [\"7\", \"&\", \"\u00bd\"], [\"8\", \"*\", \"\u00be\"], [\"9\", \"(\", \"\u2018\"], [\"0\", \")\", \"\u2019\"], [\"-\", \"_\", \"\u00a5\"], [\"=\", \"+\", \"\u00d7\", \"\u00f7\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0636\", \"\u064e\"], [\"\u0635\", \"\u064b\"], [\"\u062b\", \"\u064f\"], [\"\u0642\", \"\u064c\"], [\"\u0641\", \"\u0644\"], [\"\u063a\", \"\u0625\"], [\"\u0639\", \"\u2018\"], [\"\u0647\", \"\u00f7\"], [\"\u062e\", \"\u00d7\"], [\"\u062d\", \"\u061b\"], [\"\u062c\", \"\u003c\"], [\"\u0686\", \"\u003e\"], [\"\u0698\", \"\u007c\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0634\", \"\u0650\"], [\"\u0633\", \"\u064d\"], [\"\u064a\", \"\u005d\"], [\"\u0628\", \"\u005b\"], [\"\u0644\", \"\u0644\"], [\"\u0627\", \"\u0623\"], [\"\u062a\", \"\u0640\"], [\"\u0646\", \"\u060c\"], [\"\u0645\", \"\u005c\"], [\"\u06af\", \"\u003a\"], [\"\u0643\", \"\u0022\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u0626\", \"\u007e\"], [\"\u0621\", \"\u0652\"], [\"\u0632\", \"\u007d\"], [\"\u0631\", \"\u007b\"], [\"\u0630\", \"\u0644\"], [\"\u062f\", \"\u0622\"], [\"\u0626\", \"\u0621\"], [\"\u0648\", \"\u002c\"], [\".\", \"\u002e\"], [\"/\", \"\u061f\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ]; this.VKI_layout[\"$label_farsi\"].lang = [\"fa\"];";}
?>
	<?php if (($show_french == "1") OR ($default_lang == "french")) {echo "
    this.VKI_layout[\"$label_french\"] = [ // French Standard Keyboard
      [[\"\u00b2\", \"\u00b3\"], [\"&\", \"1\"], [\"\u00e9\", \"2\", \"~\"], ['\"', \"3\", \"#\"], [\"'\", \"4\", \"{\"], [\"(\", \"5\", \"[\"], [\"-\", \"6\", \"|\"], [\"\u00e8\", \"7\", \"\u0060\"], [\"_\", \"8\", \"\u005c\"], [\"\u00e7\", \"9\", \"\u005e\"], [\"\u00e0\", \"0\", \"\u0040\"], [\")\", \"\u00b0\", \"]\"], [\"=\", \"+\", \"}\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"a\", \"A\"], [\"z\", \"Z\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"^\", \"\u00a8\"], [\"$\", \"\u00a3\", \"\u00a4\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"q\", \"Q\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"m\", \"M\"], [\"\u00f9\", \"%\"], [\"*\", \"\u03bc\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"w\", \"W\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\",\", \"?\"], [\";\", \".\"], [\":\", \"/\"], [\"!\", \"\u00a7\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_french\"].lang = [\"fr\"];";}
?>
	<?php if (($show_german == "1") OR ($default_lang == "german")) {echo "
    this.VKI_layout[\"$label_german\"] = [ // German Standard Keyboard
      [[\"\u005e\", \"\u00b0\"], [\"1\", \"!\"], [\"2\", '\"', \"\u00b2\"], [\"3\", \"\u00a7\", \"\u00b3\"], [\"4\", \"$\"], [\"5\", \"%\"], [\"6\", \"&\"], [\"7\", \"/\", \"{\"], [\"8\", \"(\", \"[\"], [\"9\", \")\", \"]\"], [\"0\", \"=\", \"}\"], [\"\u00df\", \"?\", \"\u005c\"], [\"\u00b4\", \"\u0060\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"\u0040\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"z\", \"Z\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00fc\", \"\u00dc\"], [\"+\", \"*\", \"~\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00f6\", \"\u00d6\"], [\"\u00e4\", \"\u00c4\"], [\"#\", \"'\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\", \"\u00a6\"], [\"y\", \"Y\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\", \"\u00b5\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_german\"].lang = [\"de-de\"];";}
?>
	<?php if (($show_greek == "1") OR ($default_lang == "greek")) {echo "
    this.VKI_layout[\"$label_greek\"] = [ // Greek Standard Keyboard
      [[\"`\", \"~\"], [\"1\", \"!\"], [\"2\", \"@\", \"\u00b2\"], [\"3\", \"#\", \"\u00b3\"], [\"4\", \"$\", \"\u00a3\"], [\"5\", \"%\", \"\u00a7\"], [\"6\", \"^\", \"\u00b6\"], [\"7\", \"&\"], [\"8\", \"*\", \"\u00a4\"], [\"9\", \"(\", \"\u00a6\"], [\"0\", \")\", \"\u00ba\"], [\"-\", \"_\", \"\u00b1\"], [\"=\", \"+\", \"\u00bd\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\";\", \":\"], [\"\u03c2\", \"^\"], [\"\u03b5\", \"\u0395\"], [\"\u03c1\", \"\u03a1\"], [\"\u03c4\", \"\u03a4\"], [\"\u03c5\", \"\u03a5\"], [\"\u03b8\", \"\u0398\"], [\"\u03b9\", \"\u0399\"], [\"\u03bf\", \"\u039f\"], [\"\u03c0\", \"\u03a0\"], [\"[\", \"{\", \"\u201c\"], [\"]\", \"}\", \"\u201d\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u03b1\", \"\u0391\"], [\"\u03c3\", \"\u03a3\"], [\"\u03b4\", \"\u0394\"], [\"\u03c6\", \"\u03a6\"], [\"\u03b3\", \"\u0393\"], [\"\u03b7\", \"\u0397\"], [\"\u03be\", \"\u039e\"], [\"\u03ba\", \"\u039a\"], [\"\u03bb\", \"\u039b\"], [\"\u0384\", \"\u00a8\", \"\u0385\"], [\"'\", '\"'], [\"\u005c\", \"|\", \"\u00ac\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"\u03b6\", \"\u0396\"], [\"\u03c7\", \"\u03a7\"], [\"\u03c8\", \"\u03a8\"], [\"\u03c9\", \"\u03a9\"], [\"\u03b2\", \"\u0392\"], [\"\u03bd\", \"\u039d\"], [\"\u03bc\", \"\u039c\"], [\",\", \"<\"], [\".\", \">\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_greek\"].lang = [\"el\"];";}
?>
	<?php if (($show_hebrew == "1") OR ($default_lang == "hebrew")) {echo "
    this.VKI_layout[\"$label_hebrew\"] = [ // Hebrew Standard Keyboard
      [[\"~\", \"`\"], [\"1\", \"!\"], [\"2\", \"@\"], [\"3\", \"#\"], [\"4\" , \"$\", \"\u20aa\"], [\"5\" , \"%\"], [\"6\", \"^\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \")\"], [\"0\", \"(\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"\u005c\", \"|\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"/\", \"Q\"], [\"'\", \"W\"], [\"\u05e7\", \"E\", \"\u20ac\"], [\"\u05e8\", \"R\"], [\"\u05d0\", \"T\"], [\"\u05d8\", \"Y\"], [\"\u05d5\", \"U\", \"\u05f0\"], [\"\u05df\", \"I\"], [\"\u05dd\", \"O\"], [\"\u05e4\", \"P\"], [\"]\", \"}\"], [\"[\", \"{\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u05e9\", \"A\"], [\"\u05d3\", \"S\"], [\"\u05d2\", \"D\"], [\"\u05db\", \"F\"], [\"\u05e2\", \"G\"], [\"\u05d9\", \"H\", \"\u05f2\"], [\"\u05d7\", \"J\", \"\u05f1\"], [\"\u05dc\", \"K\"], [\"\u05da\", \"L\"], [\"\u05e3\", \":\"], [\",\" , '\"'], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u05d6\", \"Z\"], [\"\u05e1\", \"X\"], [\"\u05d1\", \"C\"], [\"\u05d4\", \"V\"], [\"\u05e0\", \"B\"], [\"\u05de\", \"N\"], [\"\u05e6\", \"M\"], [\"\u05ea\", \">\"], [\"\u05e5\", \"<\"], [\".\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_hebrew\"].lang = [\"he\"];";}
?>
	<?php if (($show_hindi == "1") OR ($default_lang == "hindi")) {echo "
    this.VKI_layout[\"$label_hindi\"] = [ // Hindi Traditional Keyboard
      [[\"\u200d\", \"\u200c\", \"`\", \"~\"], [\"1\", \"\u090D\", \"\u0967\", \"!\"], [\"2\", \"\u0945\", \"\u0968\", \"@\"], [\"3\", \"\u094D\u0930\", \"\u0969\", \"#\"], [\"4\", \"\u0930\u094D\", \"\u096A\", \"$\"], [\"5\", \"\u091C\u094D\u091E\", \"\u096B\", \"%\"], [\"6\", \"\u0924\u094D\u0930\", \"\u096C\", \"^\"], [\"7\", \"\u0915\u094D\u0937\", \"\u096D\", \"&\"], [\"8\", \"\u0936\u094D\u0930\", \"\u096E\", \"*\"], [\"9\", \"(\", \"\u096F\", \"(\"], [\"0\", \")\", \"\u0966\", \")\"], [\"-\", \"\u0903\", \"-\", \"_\"], [\"\u0943\", \"\u090B\", \"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u094C\", \"\u0914\"], [\"\u0948\", \"\u0910\"], [\"\u093E\", \"\u0906\"], [\"\u0940\", \"\u0908\"], [\"\u0942\", \"\u090A\"], [\"\u092C\", \"\u092D\"], [\"\u0939\", \"\u0919\"], [\"\u0917\", \"\u0918\"], [\"\u0926\", \"\u0927\"], [\"\u091C\", \"\u091D\"], [\"\u0921\", \"\u0922\", \"[\", \"{\"], [\"\u093C\", \"\u091E\", \"]\", \"}\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u094B\", \"\u0913\"], [\"\u0947\", \"\u090F\"], [\"\u094D\", \"\u0905\"], [\"\u093F\", \"\u0907\"], [\"\u0941\", \"\u0909\"], [\"\u092A\", \"\u092B\"], [\"\u0930\", \"\u0931\"], [\"\u0915\", \"\u0916\"], [\"\u0924\", \"\u0925\"], [\"\u091A\", \"\u091B\", \";\", \":\"], [\"\u091F\", \"\u0920\", \"'\", '\"'], [\"\u0949\", \"\u0911\", \"\u005c\", \"|\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\"], [\"\u0902\", \"\u0901\", \"\", \"\u0950\"], [\"\u092E\", \"\u0923\"], [\"\u0928\"], [\"\u0935\"], [\"\u0932\", \"\u0933\"], [\"\u0938\", \"\u0936\"], [\",\", \"\u0937\", \",\", \"<\"], [\".\", \"\u0964\", \".\", \">\"], [\"\u092F\", \"\u095F\", \"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_hindi\"].lang = [\"hi\"];";}
?>
	<?php if (($show_hungarian == "1") OR ($default_lang == "hungarian")) {echo "
    this.VKI_layout[\"$label_hungarian\"] = [ // Hungarian Standard Keyboard
      [[\"0\", \"\u00a7\"], [\"1\", \"'\", \"\u007e\"], [\"2\", '\"', \"\u02c7\"], [\"3\", \"+\", \"\u02c6\"], [\"4\", \"!\", \"\u02d8\"], [\"5\", \"%\", \"\u00b0\"], [\"6\", \"/\", \"\u02db\"], [\"7\", \"=\", \"\u0060\"], [\"8\", \"(\", \"\u02d9\"], [\"9\", \")\", \"\u00b4\"], [\"\u00f6\", \"\u00d6\", \"\u02dd\"], [\"\u00fc\", \"\u00dc\", \"\u00a8\"], [\"\u00f3\", \"\u00d3\", \"\u00b8\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"\u005c\"], [\"w\", \"W\", \"\u007c\"], [\"e\", \"E\", \"\u00c4\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"z\", \"Z\"], [\"u\", \"U\", \"\u20ac\"], [\"i\", \"I\", \"\u00cd\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u0151\", \"\u0150\", \"\u00f7\"], [\"\u00fa\", \"\u00da\", \"\u00d7\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\", \"\u00e4\"], [\"s\", \"S\",\"\u0111\"], [\"d\", \"D\",\"\u0110\"], [\"f\", \"F\",\"\u005b\"], [\"g\", \"G\",\"\u005d\"], [\"h\", \"H\"], [\"j\", \"J\",\"\u00ed\"], [\"k\", \"K\",\"\u0141\"], [\"l\", \"L\",\"\u0142\"], [\"\u00e9\", \"\u00c9\",\"\u0024\"], [\"\u00e1\", \"\u00c1\",\"\u00df\"], [\"\u0171\", \"\u0170\",\"\u00a4\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u00ed\", \"\u00cd\",\"\u003c\"], [\"y\", \"Y\",\"\u003e\"], [\"x\", \"X\",\"\u0023\"], [\"c\", \"C\",\"\u0026\"], [\"v\", \"V\",\"\u0040\"], [\"b\", \"B\",\"\u007b\"], [\"n\", \"N\",\"\u007d\"], [\"m\", \"M\",\"\u003c\"], [\",\", \"?\",\"\u003b\"], [\".\", \":\",\"\u003e\"], [\"-\", \"_\",\"\u002a\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_hungarian\"].lang = [\"hu\"];";}
?>
	<?php if (($show_italian == "1") OR ($default_lang == "italian")) {echo "
    this.VKI_layout[\"$label_italian\"] = [ // Italian Standard Keyboard
      [[\"\u005c\", \"\u007c\"], [\"1\", \"!\"], [\"2\", '\"'], [\"3\", \"\u00a3\"], [\"4\", \"$\", \"\u20ac\"], [\"5\", \"%\"], [\"6\", \"&\"], [\"7\", \"/\"], [\"8\", \"(\"], [\"9\", \")\"], [\"0\", \"=\"], [\"'\", \"?\"], [\"\u00ec\", \"\u005e\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00e8\", \"\u00e9\", \"[\", \"{\"], [\"+\", \"*\", \"]\", \"}\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00f2\", \"\u00e7\", \"@\"], [\"\u00e0\", \"\u00b0\", \"#\"], [\"\u00f9\", \"\u00a7\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_italian\"].lang = [\"it\"];";}
?>
	<?php if (($show_hirakata == "1") OR ($default_lang == "hirakata")) {echo "
    this.VKI_layout[\"$label_hirakata\"] = [ // Basic Japanese Hiragana/Katakana Keyboard
      [[\"\uff5e\"], [\"\u306c\", \"\u30cc\"], [\"\u3075\", '\u30d5'], [\"\u3042\", \"\u30a2\", \"\u3041\", \"\u30a1\"], [\"\u3046\", \"\u30a6\", \"\u3045\", \"\u30a5\"], [\"\u3048\", \"\u30a8\", \"\u3047\", \"\u30a7\"], [\"\u304a\", \"\u30aa\", \"\u3049\",\"\u30a9\"], [\"\u3084\", \"\u30e4\", \"\u3083\", \"\u30e3\"], [\"\u3086\", \"\u30e6\", \"\u3085\", \"\u30e5\"], [\"\u3088\", \"\u30e8\", \"\u3087\", \"\u30e7\"], [\"\u308f\", \"\u30ef\", \"\u3092\", \"\u30f2\"], [\"\u307b\", \"\u30db\", \"\u30fc\", \"\uff1d\"], [\"\u3078\", \"\u30d8\" ,\"\uff3e\", \"\uff5e\"], ['\"', '\"', \"\uffe5\", \"\uff5c\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u305f\", \"\u30bf\"], [\"\u3066\", \"\u30c6\"], [\"\u3044\", \"\u30a4\", \"\u3043\", \"\u30a3\"], [\"\u3059\", \"\u30b9\"], [\"\u304b\", \"\u30ab\"], [\"\u3093\", \"\u30f3\"], [\"\u306a\", \"\u30ca\"], [\"\u306b\", \"\u30cb\"], [\"\u3089\", \"\u30e9\"], [\"\u305b\", \"\u30bb\"],[\"\u3001\", \"\u3001\", \"\uff20\", \"\u2018\"],[\"\u3002\", \"\u3002\", \"\u300c\", \"\uff5b\"],[\"\uffe5\",\"\", \"\", \"\uff0a\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u3061\", \"\u30c1\"], [\"\u3068\", \"\u30c8\"], [\"\u3057\", \"\u30b7\"], [\"\u306f\", \"\u30cf\"], [\"\u304d\", \"\u30ad\"], [\"\u304f\", \"\u30af\"], [\"\u307e\", \"\u30de\"], [\"\u306e\", \"\u30ce\"], [\"\u308c\", \"\u30ec\", \"\uff1b\", \"\uff0b\"], [\"\u3051\", \"\u30b1\", \"\uff1a\", \"\u30f6\"], [\"\u3080\", \"\u30e0\", \"\u300d\", \"\uff5d\"],[\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u3064\", \"\u30c4\"], [\"\u3055\", \"\u30b5\"], [\"\u305d\", \"\u30bd\"], [\"\u3072\", \"\u30d2\"], [\"\u3053\", \"\u30b3\"], [\"\u307f\", \"\u30df\"], [\"\u3082\", \"\u30e2\"], [\"\u306d\", \"\u30cd\", \"\u3001\", \"\uff1c\"], [\"\u308b\", \"\u30eb\", \"\u3002\", \"\uff1e\"], [\"\u3081\", \"\u30e1\", \"\u30fb\", \"\uff1f\"], [\"\u308d\", \"\u30ed\", \"\", \"\uff3f\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\"$keyname_altlk\", \"$keyname_altlk\"], [\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ]; this.VKI_layout[\"$label_hirakata\"].lang = [\"ja\"];";}
?>
	<?php if (($show_kazakh == "1") OR ($default_lang == "kazakh")) {echo "
    this.VKI_layout[\"$label_kazakh\"] = [ // Kazakh Standard Keyboard
      [[\"(\", \")\"], ['\"', \"!\"], [\"\u04d9\", \"\u04d8\"], [\"\u0456\", \"\u0406\"], [\"\u04a3\", \"\u04a2\"], [\"\u0493\", \"\u0492\"], [\",\", \";\"], [\".\", \":\"], [\"\u04af\", \"\u04ae\"], [\"\u04b1\", \"\u04b0\"], [\"\u049b\", \"\u049a\"], [\"\u04e9\", \"\u04e8\"], [\"\u04bb\", \"\u04ba\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0439\", \"\u0419\"], [\"\u0446\", \"\u0426\"], [\"\u0443\", \"\u0423\"], [\"\u043A\", \"\u041A\"], [\"\u0435\", \"\u0415\"], [\"\u043D\", \"\u041D\"], [\"\u0433\", \"\u0413\"], [\"\u0448\", \"\u0428\"], [\"\u0449\", \"\u0429\"], [\"\u0437\", \"\u0417\"], [\"\u0445\", \"\u0425\"], [\"\u044A\", \"\u042A\"], [\"\u005c\", \"/\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0444\", \"\u0424\"], [\"\u044B\", \"\u042B\"], [\"\u0432\", \"\u0412\"], [\"\u0430\", \"\u0410\"], [\"\u043F\", \"\u041F\"], [\"\u0440\", \"\u0420\"], [\"\u043E\", \"\u041E\"], [\"\u043B\", \"\u041B\"], [\"\u0434\", \"\u0414\"], [\"\u0436\", \"\u0416\"], [\"\u044D\", \"\u042D\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u005c\", \"|\"], [\"\u044F\", \"\u042F\"], [\"\u0447\", \"\u0427\"], [\"\u0441\", \"\u0421\"], [\"\u043C\", \"\u041C\"], [\"\u0438\", \"\u0418\"], [\"\u0442\", \"\u0422\"], [\"\u044C\", \"\u042C\"], [\"\u0431\", \"\u0411\"], [\"\u044E\", \"\u042E\"], [\"\u2116\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_kazakh\"].lang = [\"kk\"];";}
?>
	<?php if (($show_lithuanian == "1") OR ($default_lang == "lithuanian")) {echo "
    this.VKI_layout[\"$label_lithuanian\"] = [ // Lithuanian Standard Keyboard
      [[\"`\", \"~\"], [\"\u0105\", \"\u0104\"], [\"\u010D\", \"\u010C\"], [\"\u0119\", \"\u0118\"], [\"\u0117\", \"\u0116\"], [\"\u012F\", \"\u012E\"], [\"\u0161\", \"\u0160\"], [\"\u0173\", \"\u0172\"], [\"\u016B\", \"\u016A\"], [\"\u201E\", \"(\"], [\"\u201C\", \")\"], [\"-\", \"_\"], [\"\u017E\", \"\u017D\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"[\", \"{\"], [\"]\", \"}\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\";\", \":\"], [\"'\", '\"'], [\"\u005c\", \"|\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u2013\", \"\u20AC\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \"<\"], [\".\", \">\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_lithuanian\"].lang = [\"lt\"];";}
?>
	<?php if (($show_macedonian == "1") OR ($default_lang == "macedonian")) {echo "
    this.VKI_layout[\"$label_macedonian\"] = [ // Macedonian Cyrillic Standard Keyboard
      [[\"`\", \"~\"], [\"1\", \"!\"], [\"2\", \"\u201E\"], [\"3\", \"\u201C\"], [\"4\", \"\u2019\"], [\"5\", \"%\"], [\"6\", \"\u2018\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0459\", \"\u0409\"], [\"\u045A\", \"\u040A\"], [\"\u0435\", \"\u0415\", \"\u20AC\"], [\"\u0440\", \"\u0420\"], [\"\u0442\", \"\u0422\"], [\"\u0455\", \"\u0405\"], [\"\u0443\", \"\u0423\"], [\"\u0438\", \"\u0418\"], [\"\u043E\", \"\u041E\"], [\"\u043F\", \"\u041F\"], [\"\u0448\", \"\u0428\", \"\u0402\"], [\"\u0453\", \"\u0403\", \"\u0452\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0430\", \"\u0410\"], [\"\u0441\", \"\u0421\"], [\"\u0434\", \"\u0414\"], [\"\u0444\", \"\u0424\", \"[\"], [\"\u0433\", \"\u0413\", \"]\"], [\"\u0445\", \"\u0425\"], [\"\u0458\", \"\u0408\"], [\"\u043A\", \"\u041A\"], [\"\u043B\", \"\u041B\"], [\"\u0447\", \"\u0427\", \"\u040B\"], [\"\u045C\", \"\u040C\", \"\u045B\"], [\"\u0436\", \"\u0416\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u0451\", \"\u0401\"], [\"\u0437\", \"\u0417\"], [\"\u045F\", \"\u040F\"], [\"\u0446\", \"\u0426\"], [\"\u0432\", \"\u0412\", \"@\"], [\"\u0431\", \"\u0411\", \"{\"], [\"\u043D\", \"\u041D\", \"}\"], [\"\u043C\", \"\u041C\", \"\u00A7\"], [\",\", \";\"], [\".\", \":\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_macedonian\"].lang = [\"mk\"];";}
?>
	<?php if (($show_norwegian == "1") OR ($default_lang == "norwegian")) {echo "
    this.VKI_layout[\"$label_norwegian\"] = [ // Norwegian Standard Keyboard
      [[\"|\", \"\u00a7\"], [\"1\", \"!\"], [\"2\", '\"', \"@\"], [\"3\", \"#\", \"\u00a3\"], [\"4\", \"\u00a4\", \"$\"], [\"5\", \"%\"], [\"6\", \"&\"], [\"7\", \"/\", \"{\"], [\"8\", \"(\", \"[\"], [\"9\", \")\", \"]\"], [\"0\", \"=\", \"}\"], [\"+\", \"?\"], [\"\u005c\", \"`\", \"\u00b4\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00e5\", \"\u00c5\"], [\"\u00a8\", \"^\", \"~\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00f8\", \"\u00d8\"], [\"\u00e6\", \"\u00c6\"], [\"'\", \"*\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\", \"\u03bc\", \"\u039c\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_norwegian\"].lang = [\"no\", \"nb\", \"nn\"];";}
?>
	<?php if (($show_numpad == "1") OR ($default_lang == "numpad")) {echo "
    this.VKI_layout[\"$label_numpad\"] = [ // Number pad
      [[\"$\"], [\"\u00a3\"], [\"\u20ac\"], [\"\u00a5\"], [\"/\"], [\"^\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\".\"], [\"7\"], [\"8\"], [\"9\"], [\"*\"], [\"<\"], [\"(\"], [\"[\"]],
      [[\"=\"], [\"4\"], [\"5\"], [\"6\"], [\"-\"], [\">\"], [\")\"], [\"]\"]],
      [[\"0\"], [\"1\"], [\"2\"], [\"3\"], [\"+\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\" \"]]
    ]; this.VKI_layout[\"$label_numpad\"].DDK = true;";}
?>
	<?php if (($show_pashto == "1") OR ($default_lang == "pashto")) {echo "
    this.VKI_layout[\"$label_pashto\"] = [ // Pashto Keyboard
      [[\"\u200d\", \"\u00f7\"], [\"\u06f1\", \"\u0021\", \"\u0060\"], [\"\u06f2\", \"\u066c\", \"\u0040\"], [\"\u06f3\", \"\u066b\", \"\u066b\"], [\"\u06f4\", \"\u00a4\", \"\u00a3\"], [\"\u06f5\", \"\u066a\", \"\u0025\"], [\"\u06f6\", \"\u00d7\", \"\u005e\"], [\"\u06f7\", \"\u00ab\", \"\u0026\"], [\"\u06f8\", \"\u00bb\", \"\u002a\"], [\"\u06f9\", \"(\", \"\ufdf2\"], [\"\u06f0\", \")\", \"\ufefb\"], [\"\u002d\", \"\u0640\", \"\u005f\"], [\"\u003d\", \"\u002b\", \"\ufe87\", \"\u00f7\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0636\", \"\u0652\", \"\u06d5\"], [\"\u0635\", \"\u064c\", \"\u0653\"], [\"\u062b\", \"\u064d\", \"\u20ac\"], [\"\u0642\", \"\u064b\", \"\ufef7\"], [\"\u0641\", \"\u064f\", \"\ufef5\"], [\"\u063a\", \"\u0650\", \"\u0027\"], [\"\u0639\", \"\u064e\", \"\ufe84\"], [\"\u0647\", \"\u0651\", \"\u0670\"], [\"\u062e\", \"\u0685\", \"\u0027\"], [\"\u062d\", \"\u0681\", \"\u0022\"], [\"\u062c\", \"\u005b\", \"\u007b\"], [\"\u0686\", \"\u005d\", \"\u007d\"], [\"\u005c\", \"\u066d\", \"\u007c\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0634\", \"\u069a\", \"\ufbb0\"], [\"\u0633\", \"\u0626\", \"\ufe87\"], [\"\u06cc\", \"\u064a\", \"\u06d2\"], [\"\u0628\", \"\u067e\", \"\u06ba\"], [\"\u0644\", \"\u0623\", \"\u06b7\"], [\"\u0627\", \"\u0622\", \"\u0671\"], [\"\u062a\", \"\u067c\", \"\u0679\"], [\"\u0646\", \"\u06bc\", \"\u003c\"], [\"\u0645\", \"\u0629\", \"\u003e\"], [\"\u06a9\", \"\u003a\", \"\u0643\"], [\"\u06af\", \"\u061b\", \"\u06ab\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u06cd\", \"\u0638\", \"\u003b\"], [\"\u06d0\", \"\u0637\", \"\ufbb0\"], [\"\u0632\", \"\u0698\", \"\u0655\"], [\"\u0631\", \"\u0621\", \"\u0654\"], [\"\u0630\", \"\u200c\", \"\u0625\"], [\"\u062f\", \"\u0689\", \"\u0688\"], [\"\u0693\", \"\u0624\", \"\u0691\"], [\"\u0648\", \"\u060c\", \"\u002c\"], [\"\u0696\", \"\u002e\", \"\u06c7\"], [\"\u002f\", \"\u061f\", \"\u06c9\"], [\"$keyname_shift\", \"$keyname_shift\", \"\u064d\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ]; this.VKI_layout[\"$label_pashto\"].lang = [\"ps\"];";}
?>
	<?php if (($show_pinyin == "1") OR ($default_lang == "pinyin")) {echo "
    this.VKI_layout[\"$label_pinyin\"] = [ // Pinyin Keyboard
      [[\"`\", \"~\", \"\u4e93\", \"\u301C\"], [\"1\", \"!\", \"\uFF62\"], [\"2\", \"@\", \"\uFF63\"], [\"3\", \"#\", \"\u301D\"], [\"4\", \"$\", \"\u301E\"], [\"5\", \"%\", \"\u301F\"], [\"6\", \"^\", \"\u3008\"], [\"7\", \"&\", \"\u3009\"], [\"8\", \"*\", \"\u302F\"], [\"9\", \"(\", \"\u300A\"], [\"0\", \")\", \"\u300B\"], [\"-\", \"_\", \"\u300E\"], [\"=\", \"+\", \"\u300F\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"\u0101\", \"\u0100\"], [\"w\", \"W\", \"\u00E1\", \"\u00C1\"], [\"e\", \"E\", \"\u01CE\", \"\u01CD\"], [\"r\", \"R\", \"\u00E0\", \"\u00C0\"], [\"t\", \"T\", \"\u0113\", \"\u0112\"], [\"y\", \"Y\", \"\u00E9\", \"\u00C9\"], [\"u\", \"U\", \"\u011B\", \"\u011A\"], [\"i\", \"I\", \"\u00E8\", \"\u00C8\"], [\"o\", \"O\", \"\u012B\", \"\u012A\"], [\"p\", \"P\", \"\u00ED\", \"\u00CD\"], [\"[\", \"{\", \"\u01D0\", \"\u01CF\"], [\"]\", \"}\", \"\u00EC\", \"\u00CC\"], [\"\u005c\", \"|\", \"\u3020\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\", \"\u014D\", \"\u014C\"], [\"s\", \"S\", \"\u00F3\", \"\u00D3\"], [\"d\", \"D\", \"\u01D2\", \"\u01D1\"], [\"f\", \"F\", \"\u00F2\", \"\u00D2\"], [\"g\", \"G\", \"\u00fc\", \"\u00dc\"], [\"h\", \"H\", \"\u016B\", \"\u016A\"], [\"j\", \"J\", \"\u00FA\", \"\u00DA\"], [\"k\", \"K\", \"\u01D4\", \"\u01D3\"], [\"l\", \"L\", \"\u00F9\", \"\u00D9\"], [\";\", \":\"], [\"'\", '\"'], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"z\", \"Z\", \"\u01D6\", \"\u01D5\"], [\"x\", \"X\", \"\u01D8\", \"\u01D7\"], [\"c\", \"C\", \"\u01DA\", \"\u01D9\"], [\"v\", \"V\", \"\u01DC\", \"\u01DB\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \"<\", \"\u3001\"], [\".\", \">\", \"\u3002\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\"$keyname_altlk\", \"$keyname_altlk\"], [\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ]; this.VKI_layout[\"$label_pinyin\"].lang = [\"zh-Latn\"];";}
?>
	<?php if (($show_polish == "1") OR ($default_lang == "polish")) {echo "
    this.VKI_layout[\"$label_polish\"] = [ // Polish Programmers Keyboard
      [[\"`\", \"~\"], [\"1\", \"!\"], [\"2\", \"@\"], [\"3\", \"#\"], [\"4\", \"$\"], [\"5\", \"%\"], [\"6\", \"^\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u0119\", \"\u0118\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\", \"\u00f3\", \"\u00d3\"], [\"p\", \"P\"], [\"[\", \"{\"], [\"]\", \"}\"], [\"\u005c\", \"|\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\", \"\u0105\", \"\u0104\"], [\"s\", \"S\", \"\u015b\", \"\u015a\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\", \"\u0142\", \"\u0141\"], [\";\", \":\"], [\"'\", '\"'], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"z\", \"Z\", \"\u017c\", \"\u017b\"], [\"x\", \"X\", \"\u017a\", \"\u0179\"], [\"c\", \"C\", \"\u0107\", \"\u0106\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\", \"\u0144\", \"\u0143\"], [\"m\", \"M\"], [\",\", \"<\"], [\".\", \">\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ]; this.VKI_layout[\"$label_polish\"].lang = [\"pl\"];";}
?>
	<?php if (($show_portuguese_br == "1") OR ($default_lang == "portuguese_br")) {echo "
    this.VKI_layout[\"$label_portuguese_br\"] = [ // Portuguese (Brazil) Standard Keyboard
      [[\"'\", '\"'], [\"1\", \"!\", \"\u00b9\"], [\"2\", \"@\", \"\u00b2\"], [\"3\", \"#\", \"\u00b3\"], [\"4\", \"$\", \"\u00a3\"], [\"5\", \"%\", \"\u00a2\"], [\"6\", \"\u00a8\", \"\u00ac\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\", \"\u00a7\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"/\"], [\"w\", \"W\", \"?\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00b4\", \"`\"], [\"[\", \"{\", \"\u00aa\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00e7\", \"\u00c7\"], [\"~\", \"^\"], [\"]\", \"}\", \"\u00ba\"], [\"/\", \"?\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u005c\", \"|\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\", \"\u20a2\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \"<\"], [\".\", \">\"], [\":\", \":\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_portuguese_br\"].lang = [\"pt-br\"];";}
?>
	<?php if (($show_portuguese_pt == "1") OR ($default_lang == "portuguese_pt")) {echo "
    this.VKI_layout[\"$label_portuguese_pt\"] = [ // Portuguese (Portugal) Standard Keyboard
      [[\"\u005c\", \"|\"], [\"1\", \"!\"], [\"2\", '\"', \"@\"], [\"3\", \"#\", \"\u00a3\"], [\"4\", \"$\", \"\u00a7\"], [\"5\", \"%\"], [\"6\", \"&\"], [\"7\", \"/\", \"{\"], [\"8\", \"(\", \"[\"], [\"9\", \")\", \"]\"], [\"0\", \"=\", \"}\"], [\"'\", \"?\"], [\"\u00ab\", \"\u00bb\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"+\", \"*\", \"\u00a8\"], [\"\u00b4\", \"`\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00e7\", \"\u00c7\"], [\"\u00ba\", \"\u00aa\"], [\"~\", \"^\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\", \"\u005c\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_portuguese_pt\"].lang = [\"pt\"];";}
?>
	<?php if (($show_romanian == "1") OR ($default_lang == "romanian")) {echo "
    this.VKI_layout[\"$label_romanian\"] = [ // Romanian Standard Keyboard
     [[\"\u201E\", \"\u201D\", \"\u0060\", \"~\"], [\"1\", \"!\",\"~\"], [\"2\", \"\u0040\", \"\u02C7\"], [\"3\", \"#\",\"\u005E\"], [\"4\", \"$\", \"\u02D8\"], [\"5\", \"%\", \"\u00B0\"], [\"6\", \"\u005E\", \"\u02DB\"], [\"7\", \"&\", \"\u0060\"], [\"8\", \"*\", \"\u02D9\"], [\"9\", \"(\", \"\u00B4\"], [\"0\", \")\", \"\u02DD\"], [\"-\", \"_\", \"\u00A8\"], [\"=\", \"+\", \"\u00B8\", \"\u00B1\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
     [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20AC\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\", \"\u00A7\"], [\"\u0103\", \"\u0102\", \"[\", \"{\"], [\"\u00EE\", \"\u00CE\", \"]\",\"}\"], [\"\u00E2\", \"\u00C2\", \"\u005c\", \"|\"]],
     [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\", \"\u00df\"], [\"d\", \"D\", \"\u00f0\", \"\u00D0\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\", \"\u0142\", \"\u0141\"], [(this.VKI_isIElt8) ? \"\u015F\" : \"\u0219\", (this.VKI_isIElt8) ? \"\u015E\" : \"\u0218\", \";\", \":\"], [(this.VKI_isIElt8) ? \"\u0163\" : \"\u021B\", (this.VKI_isIElt8) ? \"\u0162\" : \"\u021A\", \"\'\", \"\u005c\"], [\"$keyname_enter\", \"$keyname_enter\"]],
     [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u005c\", \"|\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\", \"\u00A9\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \";\", \"<\", \"\u00AB\"], [\".\", \":\", \">\", \"\u00BB\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
     [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_romanian\"].lang = [\"ro\"];";}
?>
	<?php if (($show_russian == "1") OR ($default_lang == "russian")) {echo "
    this.VKI_layout[\"$label_russian\"] = [ // Russian Standard Keyboard
      [[\"\u0451\", \"\u0401\"], [\"1\", \"!\"], [\"2\", '\"'], [\"3\", \"\u2116\"], [\"4\", \";\"], [\"5\", \"%\"], [\"6\", \":\"], [\"7\", \"?\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0439\", \"\u0419\"], [\"\u0446\", \"\u0426\"], [\"\u0443\", \"\u0423\"], [\"\u043A\", \"\u041A\"], [\"\u0435\", \"\u0415\"], [\"\u043D\", \"\u041D\"], [\"\u0433\", \"\u0413\"], [\"\u0448\", \"\u0428\"], [\"\u0449\", \"\u0429\"], [\"\u0437\", \"\u0417\"], [\"\u0445\", \"\u0425\"], [\"\u044A\", \"\u042A\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0444\", \"\u0424\"], [\"\u044B\", \"\u042B\"], [\"\u0432\", \"\u0412\"], [\"\u0430\", \"\u0410\"], [\"\u043F\", \"\u041F\"], [\"\u0440\", \"\u0420\"], [\"\u043E\", \"\u041E\"], [\"\u043B\", \"\u041B\"], [\"\u0434\", \"\u0414\"], [\"\u0436\", \"\u0416\"], [\"\u044D\", \"\u042D\"], [\"\u005c\", \"/\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"/\", \"|\"], [\"\u044F\", \"\u042F\"], [\"\u0447\", \"\u0427\"], [\"\u0441\", \"\u0421\"], [\"\u043C\", \"\u041C\"], [\"\u0438\", \"\u0418\"], [\"\u0442\", \"\u0422\"], [\"\u044C\", \"\u042C\"], [\"\u0431\", \"\u0411\"], [\"\u044E\", \"\u042E\"], [\".\", \",\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_russian\"].lang = [\"ru\"];";}
?>
	<?php if (($show_serbiancyr == "1") OR ($default_lang == "serbiancyr")) {echo "
    this.VKI_layout[\"$label_serbiancyr\"] = [ // Serbian Cyrillic Standard Keyboard
      [[\"`\", \"~\"], [\"1\", \"!\"], [\"2\", '\"'], [\"3\", \"#\"], [\"4\", \"$\"], [\"5\", \"%\"], [\"6\", \"&\"], [\"7\", \"/\"], [\"8\", \"(\"], [\"9\", \")\"], [\"0\", \"=\"], [\"'\", \"?\"], [\"+\", \"*\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0459\", \"\u0409\"], [\"\u045a\", \"\u040a\"], [\"\u0435\", \"\u0415\", \"\u20ac\"], [\"\u0440\", \"\u0420\"], [\"\u0442\", \"\u0422\"], [\"\u0437\", \"\u0417\"], [\"\u0443\", \"\u0423\"], [\"\u0438\", \"\u0418\"], [\"\u043e\", \"\u041e\"], [\"\u043f\", \"\u041f\"], [\"\u0448\", \"\u0428\"], [\"\u0452\", \"\u0402\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0430\", \"\u0410\"], [\"\u0441\", \"\u0421\"], [\"\u0434\", \"\u0414\"], [\"\u0444\", \"\u0424\"], [\"\u0433\", \"\u0413\"], [\"\u0445\", \"\u0425\"], [\"\u0458\", \"\u0408\"], [\"\u043a\", \"\u041a\"], [\"\u043b\", \"\u041b\"], [\"\u0447\", \"\u0427\"], [\"\u045b\", \"\u040b\"], [\"\u0436\", \"\u0416\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"\u0455\", \"\u0405\"], [\"\u045f\", \"\u040f\"], [\"\u0446\", \"\u0426\"], [\"\u0432\", \"\u0412\"], [\"\u0431\", \"\u0411\"], [\"\u043d\", \"\u041d\"], [\"\u043c\", \"\u041c\"], [\",\", \";\", \"<\"], [\".\", \":\", \">\"], [\"-\", \"_\", \"\u00a9\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_serbiancyr\"].lang = [\"sr-Cyrl\"];";}
?>
	<?php if (($show_serbianlat == "1") OR ($default_lang == "serbianlat")) {echo "
    this.VKI_layout[\"$label_serbianlat\"] = [ // Serbian Latin Standard Keyboard
      [[\"\u201a\", \"~\"], [\"1\", \"!\", \"~\"], [\"2\", '\"', \"\u02c7\"], [\"3\", \"#\", \"^\"], [\"4\", \"$\", \"\u02d8\"], [\"5\", \"%\", \"\u00b0\"], [\"6\", \"&\", \"\u02db\"], [\"7\", \"/\", \"`\"], [\"8\", \"(\", \"\u02d9\"], [\"9\", \")\", \"\u00b4\"], [\"0\", \"=\", \"\u02dd\"], [\"'\", \"?\", \"\u00a8\"], [\"+\", \"*\", \"\u00b8\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"\u005c\"], [\"w\", \"W\",\"|\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"z\", \"Z\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u0161\", \"\u0160\", \"\u00f7\"], [\"\u0111\", \"\u0110\", \"\u00d7\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\", \"[\"], [\"g\", \"G\", \"]\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\", \"\u0142\"], [\"l\", \"L\", \"\u0141\"], [\"\u010d\", \"\u010c\"], [\"\u0107\", \"\u0106\", \"\u00df\"], [\"\u017e\", \"\u017d\", \"\u00a4\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"y\", \"Y\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\", \"@\"], [\"b\", \"B\", \"{\",], [\"n\", \"N\", \"}\"], [\"m\", \"M\", \"\u00a7\"], [\",\", \";\", \"<\"], [\".\", \":\", \">\"], [\"-\", \"_\", \"\u00a9\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_serbianlat\"].lang = [\"sr\"];";}
?>
	<?php if (($show_slovak == "1") OR ($default_lang == "slovak")) {echo "
    this.VKI_layout[\"$label_slovak\"] = [ // Slovak Keyboard
     [[\";\", \"\u00b0\"], [\"+\", \"1\", \"~\"], [\"\u013E\", \"2\", \"\u02C7\"], [\"\u0161\", \"3\", \"\u005E\"], [\"\u010D\", \"4\", \"\u02D8\"], [\"\u0165\", \"5\", \"\u00B0\"], [\"\u017E\", \"6\", \"\u02DB\"], [\"\u00FD\", \"7\", \"\u0060\"], [\"\u00E1\", \"8\", \"\u02D9\"], [\"\u00ED\", \"9\", \"\u00B4\"], [\"\u00E9\", \"0\", \"\u02DD\"], [\"=\", \"%\", \"\u00A8\"], [\"\u00B4\", \"\u02c7\", \"\u00B8\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
     [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\",\"\u005C\"], [\"w\", \"W\",\"\u007C\"], [\"e\", \"E\", \"\u20AC\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"z\", \"Z\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\",\"\u0027\"], [\"\u00FA\", \"/\", \"\u00F7\"], [\"\u00E4\", \"(\", \"\u00D7\"], [\"$keyname_enter\", \"$keyname_enter\"]],
     [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\",\"\u0111\"], [\"d\", \"D\",\"\u0110\"], [\"f\", \"F\",\"\u005B\"], [\"g\", \"G\",\"\u005D\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\",\"\u0142\"], [\"l\", \"L\",\"\u0141\"], [\"\u00F4\", '\"', \"\u0024\"], [\"\u00A7\", \"!\", \"\u00DF\",], [\"\u0148\", \")\",\"\u00A4\"]],
     [[\"$keyname_shift\", \"$keyname_shift\"], [\"&\", \"*\", \"\u003C\"], [\"y\", \"Y\",\"\u003E\"], [\"x\", \"X\",\"\u0023\"], [\"c\", \"C\",\"\u0026\"], [\"v\", \"V\",\"\u0040\"], [\"b\", \"B\",\"\u007B\"], [\"n\", \"N\",\"\u007D\"], [\"m\", \"M\"], [\",\", \"?\", \"<\"], [\".\", \":\", \">\"], [\"-\", \"_\", \"\u002A\", ], [\"$keyname_shift\", \"$keyname_shift\"]],
     [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_slovak\"].lang = [\"sk\"];";}
?>
	<?php if (($show_slovenian == "1") OR ($default_lang == "slovenian")) {echo "
    this.VKI_layout[\"$label_slovenian\"] = [ // Slovenian Standard Keyboard
      [[\"\u00a8\", \"\u00a8\", \"\u00b8\"], [\"1\", \"!\", \"~\"], [\"2\", '\"', \"\u02c7\"], [\"3\", \"#\", \"^\"], [\"4\", \"$\", \"\u02d8\"], [\"5\", \"%\", \"\u00b0\"], [\"6\", \"&\", \"\u02db\"], [\"7\", \"/\", \"\u0060\"], [\"8\", \"(\", \"\u00B7\"], [\"9\", \")\", \"\u00b4\"], [\"0\", \"=\", \"\u2033\"], [\"'\", \"?\", \"\u00a8\"], [\"+\", \"*\", \"\u00b8\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"\u005c\"], [\"w\", \"W\",\"|\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"z\", \"Z\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u0161\", \"\u0160\", \"\u00f7\"], [\"\u0111\", \"\u0110\", \"\u00d7\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\", \"[\"], [\"g\", \"G\", \"]\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\", \"\u0142\"], [\"l\", \"L\", \"\u0141\"], [\"\u010D\", \"\u010C\"], [\"\u0107\", \"\u0106\", \"\u00df\"], [\"\u017E\", \"\u017D\", \"\u00a4\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"y\", \"Y\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\", \"@\"], [\"b\", \"B\", \"{\",], [\"n\", \"N\", \"}\"], [\"m\", \"M\", \"\u00a7\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_slovenian\"].lang = [\"sl\"];";}
?>
	<?php if (($show_spanish_es == "1") OR ($default_lang == "spanish_es")) {echo "
    this.VKI_layout[\"$label_spanish_es\"] = [ // Spanish (Spain) Standard Keyboard
      [[\"\u00ba\", \"\u00aa\", \"\u005c\"], [\"1\", \"!\", \"|\"], [\"2\", '\"', \"@\"], [\"3\", \"'\", \"#\"], [\"4\", \"$\", \"~\"], [\"5\", \"%\", \"\u20ac\"], [\"6\", \"&\",\"\u00ac\"], [\"7\", \"/\"], [\"8\", \"(\"], [\"9\", \")\"], [\"0\", \"=\"], [\"'\", \"?\"], [\"\u00a1\", \"\u00bf\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u0060\", \"^\", \"[\"], [\"\u002b\", \"\u002a\", \"]\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00f1\", \"\u00d1\"], [\"\u00b4\", \"\u00a8\", \"{\"], [\"\u00e7\", \"\u00c7\", \"}\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_spanish_es\"].lang = [\"es\"];";}
?>
	<?php if (($show_swedish == "1") OR ($default_lang == "swedish")) {echo "
    this.VKI_layout[\"$label_swedish\"] = [ // Swedish Standard Keyboard
      [[\"\u00a7\", \"\u00bd\"], [\"1\", \"!\"], [\"2\", '\"', \"@\"], [\"3\", \"#\", \"\u00a3\"], [\"4\", \"\u00a4\", \"$\"], [\"5\", \"%\", \"\u20ac\"], [\"6\", \"&\"], [\"7\", \"/\", \"{\"], [\"8\", \"(\", \"[\"], [\"9\", \")\", \"]\"], [\"0\", \"=\", \"}\"], [\"+\", \"?\", \"\u005c\"], [\"\u00b4\", \"`\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u00e5\", \"\u00c5\"], [\"\u00a8\", \"^\", \"~\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u00f6\", \"\u00d6\"], [\"\u00e4\", \"\u00c4\"], [\"'\", \"*\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\", \"|\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\", \"\u03bc\", \"\u039c\"], [\",\", \";\"], [\".\", \":\"], [\"-\", \"_\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_swedish\"].lang = [\"sv\"];";}
?>
	<?php if (($show_turkish_f == "1") OR ($default_lang == "turkish_f")) {echo "
    this.VKI_layout[\"$label_turkish_f\"] = [ // Turkish F Keyboard Layout
      [['+', \"*\", \"\u00ac\"], [\"1\", \"!\", \"\u00b9\", \"\u00a1\"], [\"2\", '\"', \"\u00b2\"], [\"3\", \"^\", \"#\", \"\u00b3\"], [\"4\", \"$\", \"\u00bc\", \"\u00a4\"], [\"5\", \"%\", \"\u00bd\"], [\"6\", \"&\", \"\u00be\"], [\"7\", \"'\", \"{\"], [\"8\", \"(\", '['], [\"9\", \")\", ']'], [\"0\", \"=\", \"}\"], [\"/\", \"?\", \"\u005c\", \"\u00bf\"], [\"-\", \"_\", \"|\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"f\", \"F\", \"@\"], [\"g\", \"G\"], [\"\u011f\", \"\u011e\"], [\"\u0131\", \"\u0049\", \"\u00b6\", \"\u00ae\"], [\"o\", \"O\"], [\"d\", \"D\", \"\u00a5\"], [\"r\", \"R\"], [\"n\", \"N\"], [\"h\", \"H\", \"\u00f8\", \"\u00d8\"], [\"p\", \"P\", \"\u00a3\"], [\"q\", \"Q\", \"\u00a8\"], [\"w\", \"W\", \"~\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"u\", \"U\", \"\u00e6\", \"\u00c6\"], [\"i\", \"\u0130\", \"\u00df\", \"\u00a7\"], [\"e\", \"E\", \"\u20ac\"], [\"a\", \"A\", \" \", \"\u00aa\"], [\"\u00fc\", \"\u00dc\"], [\"t\", \"T\"], [\"k\", \"K\"], [\"m\", \"M\"], [\"l\", \"L\"], [\"y\", \"Y\", \"\u00b4\"], [\"\u015f\", \"\u015e\"], [\"x\", \"X\", \"`\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\", \"|\", \"\u00a6\"], [\"j\", \"J\", \"\u00ab\", \"<\"], [\"\u00f6\", \"\u00d6\", \"\u00bb\", \">\"], [\"v\", \"V\", \"\u00a2\", \"\u00a9\"], [\"c\", \"C\"], [\"\u00e7\", \"\u00c7\"], [\"z\", \"Z\"], [\"s\", \"S\", \"\u00b5\", \"\u00ba\"], [\"b\", \"B\", \"\u00d7\"], [\".\", \":\", \"\u00f7\"], [\",\", \";\", \"-\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"],  [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ];";}
?>
	<?php if (($show_turkish_q == "1") OR ($default_lang == "turkish_q")) {echo "
    this.VKI_layout[\"$label_turkish_q\"] = [ // Turkish Q Keyboard Layout
      [['\"', \"\u00e9\", \"<\"], [\"1\", \"!\", \">\"], [\"2\", \"'\", \"\u00a3\"], [\"3\", \"^\", \"#\"], [\"4\", \"+\", \"$\"], [\"5\", \"%\", \"\u00bd\"], [\"6\", \"&\"], [\"7\", \"/\", \"{\"], [\"8\", \"(\", '['], [\"9\", \")\", ']'], [\"0\", \"=\", \"}\"], [\"*\", \"?\", \"\u005c\"], [\"-\", \"_\", \"|\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"@\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u20ac\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"\u0131\", \"\u0049\", \"\u0069\", \"\u0130\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"\u011f\", \"\u011e\", \"\u00a8\"], [\"\u00fc\", \"\u00dc\", \"~\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\", \"\u00e6\", \"\u00c6\"], [\"s\", \"S\", \"\u00df\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\"\u015f\", \"\u015e\", \"\u00b4\"], [\"\u0069\", \"\u0130\"], [\",\", \";\", \"`\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"<\", \">\", \"|\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\"\u00f6\", \"\u00d6\"], [\"\u00e7\", \"\u00c7\"], [\".\", \":\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"],  [\"$keyname_altgr\", \"$keyname_altgr\"]]
    ]; this.VKI_layout[\"$label_turkish_q\"].lang = [\"tr\"];";}
?>
	<?php if (($show_uk == "1") OR ($default_lang == "uk")) {echo "
    this.VKI_layout[\"$label_uk\"] = [ // UK Standard Keyboard
      [[\"`\", \"\u00ac\", \"\u00a6\"], [\"1\", \"!\"], [\"2\", '\"'], [\"3\", \"\u00a3\"], [\"4\", \"$\", \"\u20ac\"], [\"5\", \"%\"], [\"6\", \"^\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\", \"\u00e9\", \"\u00c9\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\", \"\u00fa\", \"\u00da\"], [\"i\", \"I\", \"\u00ed\", \"\u00cd\"], [\"o\", \"O\", \"\u00f3\", \"\u00d3\"], [\"p\", \"P\"], [\"[\", \"{\"], [\"]\", \"}\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\", \"\u00e1\", \"\u00c1\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\";\", \":\"], [\"'\", \"@\"], [\"#\", \"~\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u005c\", \"|\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \"<\"], [\".\", \">\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_altgr\", \"AltGr\"]]
    ]; this.VKI_layout[\"$label_uk\"].lang = [\"en-gb\"];";}
?>
	<?php if (($show_ukrainian == "1") OR ($default_lang == "ukrainian")) {echo "
    this.VKI_layout[\"$label_ukrainian\"] = [ // Ukrainian Standard Keyboard
      [[\"\u00b4\", \"~\"], [\"1\", \"!\"], [\"2\", '\"'], [\"3\", \"\u2116\"], [\"4\", \";\"], [\"5\", \"%\"], [\"6\", \":\"], [\"7\", \"?\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"\u0439\", \"\u0419\"], [\"\u0446\", \"\u0426\"], [\"\u0443\", \"\u0423\"], [\"\u043A\", \"\u041A\"], [\"\u0435\", \"\u0415\"], [\"\u043D\", \"\u041D\"], [\"\u0433\", \"\u0413\"], [\"\u0448\", \"\u0428\"], [\"\u0449\", \"\u0429\"], [\"\u0437\", \"\u0417\"], [\"\u0445\", \"\u0425\"], [\"\u0457\", \"\u0407\"], [\"\u0491\", \"\u0490\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"\u0444\", \"\u0424\"], [\"\u0456\", \"\u0406\"], [\"\u0432\", \"\u0412\"], [\"\u0430\", \"\u0410\"], [\"\u043F\", \"\u041F\"], [\"\u0440\", \"\u0420\"], [\"\u043E\", \"\u041E\"], [\"\u043B\", \"\u041B\"], [\"\u0434\", \"\u0414\"], [\"\u0436\", \"\u0416\"], [\"\u0454\", \"\u0404\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"\u044F\", \"\u042F\"], [\"\u0447\", \"\u0427\"], [\"\u0441\", \"\u0421\"], [\"\u043C\", \"\u041C\"], [\"\u0438\", \"\u0418\"], [\"\u0442\", \"\u0422\"], [\"\u044C\", \"\u042C\"], [\"\u0431\", \"\u0411\"], [\"\u044E\", \"\u042E\"], [\".\", \",\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_ukrainian\"].lang = [\"uk\"];";}
?>
	<?php if (($show_us == "1") OR ($default_lang == "us")) {echo "
    this.VKI_layout[\"$label_us\"] = [ // US Standard Keyboard
      [[\"`\", \"~\"], [\"1\", \"!\"], [\"2\", \"@\"], [\"3\", \"#\"], [\"4\", \"$\"], [\"5\", \"%\"], [\"6\", \"^\"], [\"7\", \"&\"], [\"8\", \"*\"], [\"9\", \"(\"], [\"0\", \")\"], [\"-\", \"_\"], [\"=\", \"+\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\"], [\"w\", \"W\"], [\"e\", \"E\"], [\"r\", \"R\"], [\"t\", \"T\"], [\"y\", \"Y\"], [\"u\", \"U\"], [\"i\", \"I\"], [\"o\", \"O\"], [\"p\", \"P\"], [\"[\", \"{\"], [\"]\", \"}\"], [\"\u005c\", \"|\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\"], [\"s\", \"S\"], [\"d\", \"D\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\"], [\";\", \":\"], [\"'\", '\"'], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"z\", \"Z\"], [\"x\", \"X\"], [\"c\", \"C\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\"], [\"m\", \"M\"], [\",\", \"<\"], [\".\", \">\"], [\"/\", \"?\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \"]]
    ]; this.VKI_layout[\"$label_us\"].lang = [\"en-us\"];";}
?>
	<?php if (($show_us_int == "1") OR ($default_lang == "us_int")) {echo "
    this.VKI_layout[\"$label_us_int\"] = [ // US International Keyboard
      [[\"`\", \"~\"], [\"1\", \"!\", \"\u00a1\", \"\u00b9\"], [\"2\", \"@\", \"\u00b2\"], [\"3\", \"#\", \"\u00b3\"], [\"4\", \"$\", \"\u00a4\", \"\u00a3\"], [\"5\", \"%\", \"\u20ac\"], [\"6\", \"^\", \"\u00bc\"], [\"7\", \"&\", \"\u00bd\"], [\"8\", \"*\", \"\u00be\"], [\"9\", \"(\", \"\u2018\"], [\"0\", \")\", \"\u2019\"], [\"-\", \"_\", \"\u00a5\"], [\"=\", \"+\", \"\u00d7\", \"\u00f7\"], [\"$keyname_bksp\", \"$keyname_bksp\"]],
      [[\"$keyname_tab\", \"$keyname_tab\"], [\"q\", \"Q\", \"\u00e4\", \"\u00c4\"], [\"w\", \"W\", \"\u00e5\", \"\u00c5\"], [\"e\", \"E\", \"\u00e9\", \"\u00c9\"], [\"r\", \"R\", \"\u00ae\"], [\"t\", \"T\", \"\u00fe\", \"\u00de\"], [\"y\", \"Y\", \"\u00fc\", \"\u00dc\"], [\"u\", \"U\", \"\u00fa\", \"\u00da\"], [\"i\", \"I\", \"\u00ed\", \"\u00cd\"], [\"o\", \"O\", \"\u00f3\", \"\u00d3\"], [\"p\", \"P\", \"\u00f6\", \"\u00d6\"], [\"[\", \"{\", \"\u00ab\"], [\"]\", \"}\", \"\u00bb\"], [\"\u005c\", \"|\", \"\u00ac\", \"\u00a6\"]],
      [[\"$keyname_caps\", \"$keyname_caps\"], [\"a\", \"A\", \"\u00e1\", \"\u00c1\"], [\"s\", \"S\", \"\u00df\", \"\u00a7\"], [\"d\", \"D\", \"\u00f0\", \"\u00d0\"], [\"f\", \"F\"], [\"g\", \"G\"], [\"h\", \"H\"], [\"j\", \"J\"], [\"k\", \"K\"], [\"l\", \"L\", \"\u00f8\", \"\u00d8\"], [\";\", \":\", \"\u00b6\", \"\u00b0\"], [\"'\", '\"', \"\u00b4\", \"\u00a8\"], [\"$keyname_enter\", \"$keyname_enter\"]],
      [[\"$keyname_shift\", \"$keyname_shift\"], [\"z\", \"Z\", \"\u00e6\", \"\u00c6\"], [\"x\", \"X\"], [\"c\", \"C\", \"\u00a9\", \"\u00a2\"], [\"v\", \"V\"], [\"b\", \"B\"], [\"n\", \"N\", \"\u00f1\", \"\u00d1\"], [\"m\", \"M\", \"\u00b5\"], [\",\", \"<\", \"\u00e7\", \"\u00c7\"], [\".\", \">\"], [\"/\", \"?\", \"\u00bf\"], [\"$keyname_shift\", \"$keyname_shift\"]],
      [[\" \", \" \", \" \", \" \"], [\"$keyname_alt\", \"$keyname_alt\"]]
    ]; this.VKI_layout[\"$label_us_int\"].lang = [\"en\"];";}
?>

    /* ***** Define Dead Keys ************************************** */
    this.VKI_deadkey = {};

    this.VKI_deadkey['"'] = this.VKI_deadkey['\u00a8'] = [ // Umlaut / Diaeresis / Greek Dialytika
      ["a", "\u00e4"], ["e", "\u00eb"], ["i", "\u00ef"], ["o", "\u00f6"], ["u", "\u00fc"], ["y", "\u00ff"], ["\u03b9", "\u03ca"], ["\u03c5", "\u03cb"], ["\u016B", "\u01D6"], ["\u00FA", "\u01D8"], ["\u01D4", "\u01DA"], ["\u00F9", "\u01DC"],
      ["A", "\u00c4"], ["E", "\u00cb"], ["I", "\u00cf"], ["O", "\u00d6"], ["U", "\u00dc"], ["Y", "\u0178"], ["\u0399", "\u03aa"], ["\u03a5", "\u03ab"], ["\u016A", "\u01D5"], ["\u00DA", "\u01D7"], ["\u01D3", "\u01D9"], ["\u00D9", "\u01DB"],
      ["\u304b", "\u304c"], ["\u304d", "\u304e"], ["\u304f", "\u3050"], ["\u3051", "\u3052"], ["\u3053", "\u3054"],
      ["\u305f", "\u3060"], ["\u3061", "\u3062"], ["\u3064", "\u3065"], ["\u3066", "\u3067"], ["\u3068", "\u3069"],
      ["\u3055", "\u3056"], ["\u3057", "\u3058"], ["\u3059", "\u305a"], ["\u305b", "\u305c"], ["\u305d", "\u305e"],
      ["\u306f", "\u3070"], ["\u3072", "\u3073"], ["\u3075", "\u3076"], ["\u3078", "\u3079"], ["\u307b", "\u307c"],
      ["\u30ab", "\u30ac"], ["\u30ad", "\u30ae"], ["\u30af", "\u30b0"], ["\u30b1", "\u30b2"], ["\u30b3", "\u30b4"],
      ["\u30bf", "\u30c0"], ["\u30c1", "\u30c2"], ["\u30c4", "\u30c5"], ["\u30c6", "\u30c7"], ["\u30c8", "\u30c9"],
      ["\u30b5", "\u30b6"], ["\u30b7", "\u30b8"], ["\u30b9", "\u30ba"], ["\u30bb", "\u30bc"], ["\u30bd", "\u30be"],
      ["\u30cf", "\u30d0"], ["\u30d2", "\u30d3"], ["\u30d5", "\u30d6"], ["\u30d8", "\u30d9"], ["\u30db", "\u30dc"]
    ];
    this.VKI_deadkey['~'] = [ // Tilde / Stroke
      ["a", "\u00e3"], ["l", "\u0142"], ["n", "\u00f1"], ["o", "\u00f5"],
      ["A", "\u00c3"], ["L", "\u0141"], ["N", "\u00d1"], ["O", "\u00d5"]
    ];
    this.VKI_deadkey['^'] = [ // Circumflex
      ["a", "\u00e2"], ["e", "\u00ea"], ["i", "\u00ee"], ["o", "\u00f4"], ["u", "\u00fb"], ["w", "\u0175"], ["y", "\u0177"],
      ["A", "\u00c2"], ["E", "\u00ca"], ["I", "\u00ce"], ["O", "\u00d4"], ["U", "\u00db"], ["W", "\u0174"], ["Y", "\u0176"]
    ];
    this.VKI_deadkey['\u02c7'] = [ // Baltic caron
      ["c", "\u010D"], ["d", "\u010f"], ["e", "\u011b"], ["s", "\u0161"], ["l", "\u013e"], ["n", "\u0148"], ["r", "\u0159"], ["t", "\u0165"], ["u", "\u01d4"], ["z", "\u017E"], ["\u00fc", "\u01da"],
      ["C", "\u010C"], ["D", "\u010e"], ["E", "\u011a"], ["S", "\u0160"], ["L", "\u013d"], ["N", "\u0147"], ["R", "\u0158"], ["T", "\u0164"], ["U", "\u01d3"], ["Z", "\u017D"], ["\u00dc", "\u01d9"]
    ];
    this.VKI_deadkey['\u02d8'] = [ // Romanian and Turkish breve
      ["a", "\u0103"], ["g", "\u011f"],
      ["A", "\u0102"], ["G", "\u011e"]
    ];
    this.VKI_deadkey['-'] = this.VKI_deadkey['\u00af'] = [ // Macron
      ["a", "\u0101"], ["e", "\u0113"], ["i", "\u012b"], ["o", "\u014d"], ["u", "\u016B"], ["y", "\u0233"], ["\u00fc", "\u01d6"],
      ["A", "\u0100"], ["E", "\u0112"], ["I", "\u012a"], ["O", "\u014c"], ["U", "\u016A"], ["Y", "\u0232"], ["\u00dc", "\u01d5"]
    ];
    this.VKI_deadkey['`'] = [ // Grave
      ["a", "\u00e0"], ["e", "\u00e8"], ["i", "\u00ec"], ["o", "\u00f2"], ["u", "\u00f9"], ["\u00fc", "\u01dc"],
      ["A", "\u00c0"], ["E", "\u00c8"], ["I", "\u00cc"], ["O", "\u00d2"], ["U", "\u00d9"], ["\u00dc", "\u01db"]
    ];
    this.VKI_deadkey["'"] = this.VKI_deadkey['\u00b4'] = this.VKI_deadkey['\u0384'] = [ // Acute / Greek Tonos
      ["a", "\u00e1"], ["e", "\u00e9"], ["i", "\u00ed"], ["o", "\u00f3"], ["u", "\u00fa"], ["y", "\u00fd"], ["\u03b1", "\u03ac"], ["\u03b5", "\u03ad"], ["\u03b7", "\u03ae"], ["\u03b9", "\u03af"], ["\u03bf", "\u03cc"], ["\u03c5", "\u03cd"], ["\u03c9", "\u03ce"], ["\u00fc", "\u01d8"],
      ["A", "\u00c1"], ["E", "\u00c9"], ["I", "\u00cd"], ["O", "\u00d3"], ["U", "\u00da"], ["Y", "\u00dd"], ["\u0391", "\u0386"], ["\u0395", "\u0388"], ["\u0397", "\u0389"], ["\u0399", "\u038a"], ["\u039f", "\u038c"], ["\u03a5", "\u038e"], ["\u03a9", "\u038f"], ["\u00dc", "\u01d7"]
    ];
    this.VKI_deadkey['\u02dd'] = [ // Hungarian Double Acute Accent
      ["o", "\u0151"], ["u", "\u0171"],
      ["O", "\u0150"], ["U", "\u0170"]
    ];
    this.VKI_deadkey['\u0385'] = [ // Greek Dialytika + Tonos
      ["\u03b9", "\u0390"], ["\u03c5", "\u03b0"]
    ];
    this.VKI_deadkey['\u00b0'] = this.VKI_deadkey['\u00ba'] = [ // Ring
      ["a", "\u00e5"], ["u", "\u016f"],
      ["A", "\u00c5"], ["U", "\u016e"]
    ];
    this.VKI_deadkey['\u02DB'] = [ // Ogonek
      ["a", "\u0106"], ["e", "\u0119"], ["i", "\u012f"], ["o", "\u01eb"], ["u", "\u0173"], ["y", "\u0177"],
      ["A", "\u0105"], ["E", "\u0118"], ["I", "\u012e"], ["O", "\u01ea"], ["U", "\u0172"], ["Y", "\u0176"]
    ];
    this.VKI_deadkey['\u02D9'] = [ // Dot-above
      ["c", "\u010B"], ["e", "\u0117"], ["g", "\u0121"], ["z", "\u017C"],
      ["C", "\u010A"], ["E", "\u0116"], ["G", "\u0120"], ["Z", "\u017B"]
    ];
    this.VKI_deadkey['\u00B8'] = this.VKI_deadkey['\u201a'] = [ // Cedilla
      ["c", "\u00e7"], ["s", "\u015F"],
      ["C", "\u00c7"], ["S", "\u015E"]
    ];
    this.VKI_deadkey[','] = [ // Comma
      ["s", (this.VKI_isIElt8) ? "\u015F" : "\u0219"], ["t", (this.VKI_isIElt8) ? "\u0163" : "\u021B"],
      ["S", (this.VKI_isIElt8) ? "\u015E" : "\u0218"], ["T", (this.VKI_isIElt8) ? "\u0162" : "\u021A"]
    ];
    this.VKI_deadkey['\u3002'] = [ // Hiragana/Katakana Point
      ["\u306f", "\u3071"], ["\u3072", "\u3074"], ["\u3075", "\u3077"], ["\u3078", "\u307a"], ["\u307b", "\u307d"],
      ["\u30cf", "\u30d1"], ["\u30d2", "\u30d4"], ["\u30d5", "\u30d7"], ["\u30d8", "\u30da"], ["\u30db", "\u30dd"]
    ];


    /* ***** Define Symbols **************************************** */
    this.VKI_symbol = {
      '\u200c': "ZW\r\nNJ", '\u200d': "ZW\r\nJ"
    };



    /* ****************************************************************
     * Attach the keyboard to an element
     *
     */
    this.VKI_attachKeyboard = VKI_attach = function(elem) {
      if (elem.VKI_attached) return false;
      var keybut = document.createElement('img');
          keybut.src = this.VKI_imageURI;
          keybut.alt = this.VKI_i18n['00'];
          keybut.className = "keyboardInputInitiator";
          keybut.title = this.VKI_i18n['01'];
          keybut.elem = elem;
          keybut.onclick = function() { self.VKI_show(this.elem); };
      elem.VKI_attached = true;
      elem.parentNode.insertBefore(keybut, (elem.dir == "rtl") ? elem : elem.nextSibling);
      if (this.VKI_isIE) {
        elem.onclick = elem.onselect = elem.onkeyup = function(e) {
          if ((e || event).type != "keyup" || !this.readOnly)
            this.range = document.selection.createRange();
        };
      }
    };


    /* ***** Find tagged input & textarea elements ***************** */
    var inputElems = [
      document.getElementsByTagName('input'),
      document.getElementsByTagName('textarea')
    ];
    for (var x = 0, elem; elem = inputElems[x++];)
      for (var y = 0, ex; ex = elem[y++];)
        if ((ex.nodeName == "TEXTAREA" || ex.type == "text" || ex.type == "password") && ex.className.indexOf("<?php echo $keyboard_class;?>") > -1)
          this.VKI_attachKeyboard(ex);


    /* ***** Build the keyboard interface ************************** */
    this.VKI_keyboard = document.createElement('table');
    this.VKI_keyboard.id = "keyboardInputMaster";
    this.VKI_keyboard.dir = "ltr";
    this.VKI_keyboard.cellSpacing = this.VKI_keyboard.border = "0";

    var thead = document.createElement('thead');
      var tr = document.createElement('tr');
        var th = document.createElement('th');
          var abbr = document.createElement('abbr');
              abbr.title = this.VKI_i18n['00'];
              abbr.appendChild(document.createTextNode(''));
            th.appendChild(abbr);

          var kblist = document.createElement('select');
              kblist.title = this.VKI_i18n['02'];
            for (ktype in this.VKI_layout) {
              if (typeof this.VKI_layout[ktype] == "object") {
                if (!this.VKI_layout[ktype].lang) this.VKI_layout[ktype].lang = [];
                var opt = document.createElement('option');
                    opt.value = ktype;
                    opt.appendChild(document.createTextNode(ktype));
                  kblist.appendChild(opt);
              }
            }
            if (kblist.options.length) {
                kblist.value = this.VKI_kt;
                kblist.onchange = function() {
                  self.VKI_kts = self.VKI_kt = this.value;
                  self.VKI_buildKeys();
                  self.VKI_position(true);
                };
              th.appendChild(kblist);
            }

          if (this.VKI_sizeAdj) {
            this.VKI_size = Math.min(5, Math.max(1, this.VKI_size));
            var kbsize = document.createElement('select');
                kbsize.title = this.VKI_i18n['10'];
              for (var x = 1; x <= 5; x++) {
                var opt = document.createElement('option');
                    opt.value = x;
                    opt.appendChild(document.createTextNode(x));
                  kbsize.appendChild(opt);
              } kbsize.value = this.VKI_size;
                kbsize.onchange = function() {
                  self.VKI_keyboard.className = self.VKI_keyboard.className.replace(/ ?keyboardInputSize\d ?/, "");
                  if (this.value != 2) self.VKI_keyboard.className += " keyboardInputSize" + this.value;
                  self.VKI_position(true);
                };
            th.appendChild(kbsize);
          }

            var label = document.createElement('label');
              var checkbox = document.createElement('input');
                  checkbox.type = "checkbox";
                  checkbox.title = this.VKI_i18n['03'] + ": " + ((this.VKI_deadkeysOn) ? this.VKI_i18n['04'] : this.VKI_i18n['05']);
                  checkbox.defaultChecked = this.VKI_deadkeysOn;
                  checkbox.onclick = function() {
                    self.VKI_deadkeysOn = this.checked;
                    this.title = self.VKI_i18n['03'] + ": " + ((this.checked) ? self.VKI_i18n['04'] : self.VKI_i18n['05']);
                    self.VKI_modify("");
                    return true;
                  };
                label.appendChild(this.VKI_deadkeysElem = checkbox);
                  checkbox.checked = this.VKI_deadkeysOn;
            th.appendChild(label);
          tr.appendChild(th);

        var td = document.createElement('td');
          var clearer = document.createElement('span');
              clearer.id = "keyboardInputClear";
              clearer.appendChild(document.createTextNode(this.VKI_i18n['07']));
              clearer.title = this.VKI_i18n['08'];
              clearer.onmousedown = function() { this.className = "pressed"; };
              clearer.onmouseup = function() { this.className = ""; };
              clearer.onclick = function() {
                self.VKI_target.value = "";
                self.VKI_target.focus();
                return false;
              };
            td.appendChild(clearer);

          var closer = document.createElement('strong');
              closer.id = "keyboardInputClose";
              closer.appendChild(document.createTextNode('X'));
              closer.title = this.VKI_i18n['06'];
              closer.onmousedown = function() { this.className = "pressed"; };
              closer.onmouseup = function() { this.className = ""; };
              closer.onclick = function() { self.VKI_close(); };
            td.appendChild(closer);

          tr.appendChild(td);
        thead.appendChild(tr);
    this.VKI_keyboard.appendChild(thead);

    var tbody = document.createElement('tbody');
      var tr = document.createElement('tr');
        var td = document.createElement('td');
            td.colSpan = "2";
          var div = document.createElement('div');
              div.id = "keyboardInputLayout";
            td.appendChild(div);
          if (this.VKI_showVersion) {
            var div = document.createElement('div');
              var ver = document.createElement('var');
                  ver.title = this.VKI_i18n['09'] + " " + this.VKI_version;
                  ver.appendChild(document.createTextNode("v" + this.VKI_version));
                div.appendChild(ver);
              td.appendChild(div);
          }
          tr.appendChild(td);
        tbody.appendChild(tr);
    this.VKI_keyboard.appendChild(tbody);

    if (this.VKI_isIE6) {
      this.VKI_iframe = document.createElement('iframe');
      this.VKI_iframe.style.position = "absolute";
      this.VKI_iframe.style.border = "0px none";
      this.VKI_iframe.style.filter = "mask()";
      this.VKI_iframe.style.zIndex = "999999";
      this.VKI_iframe.src = this.VKI_imageURI;
    }


    /* ****************************************************************
     * Build or rebuild the keyboard keys
     *
     */
    this.VKI_buildKeys = function() {
      this.VKI_shift = this.VKI_shiftlock = this.VKI_altgr = this.VKI_altgrlock = this.VKI_dead = false;
      this.VKI_deadkeysOn = (this.VKI_layout[this.VKI_kt].DDK) ? false : this.VKI_keyboard.getElementsByTagName('label')[0].getElementsByTagName('input')[0].checked;

      var container = this.VKI_keyboard.tBodies[0].getElementsByTagName('div')[0];
      while (container.firstChild) container.removeChild(container.firstChild);

      for (var x = 0, hasDeadKey = false, lyt; lyt = this.VKI_layout[this.VKI_kt][x++];) {
        var table = document.createElement('table');
            table.cellSpacing = table.border = "0";
        if (lyt.length <= this.VKI_keyCenter) table.className = "keyboardInputCenter";
          var tbody = document.createElement('tbody');
            var tr = document.createElement('tr');
            for (var y = 0, lkey; lkey = lyt[y++];) {
              var td = document.createElement('td');
                if (this.VKI_symbol[lkey[0]]) {
                  var span = document.createElement('span');
                      span.className = lkey[0];
                      span.appendChild(document.createTextNode(this.VKI_symbol[lkey[0]]));
                    td.appendChild(span);
                } else td.appendChild(document.createTextNode(lkey[0] || "\xa0"));

                var className = [];
                if (this.VKI_deadkeysOn)
                  for (key in this.VKI_deadkey)
                    if (key === lkey[0]) { className.push("alive"); break; }
                if (lyt.length > this.VKI_keyCenter && y == lyt.length) className.push("last");
                if (lkey[0] == " ") className.push("space");
                  td.className = className.join(" ");

                  td.VKI_clickless = 0;
                  if (!td.click) {
                    td.click = function() {
                      var evt = this.ownerDocument.createEvent('MouseEvents');
                      evt.initMouseEvent('click', true, true, this.ownerDocument.defaultView, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
                      this.dispatchEvent(evt);
                    };
                  }
                  td.onmouseover = function() {
                    if (self.VKI_clickless) {
                      var _self = this;
                      clearTimeout(this.VKI_clickless);
                      this.VKI_clickless = setTimeout(function() { _self.click(); }, self.VKI_clickless);
                    }
                    if ((this.firstChild.nodeValue || this.firstChild.className) != "\xa0") this.className += " hover";
                  };
                  td.onmouseout = function() {
                    if (self.VKI_clickless) clearTimeout(this.VKI_clickless);
                    this.className = this.className.replace(/ ?(hover|pressed)/g, "");
                  };
                  td.onmousedown = function() {
                    if (self.VKI_clickless) clearTimeout(this.VKI_clickless);
                    if ((this.firstChild.nodeValue || this.firstChild.className) != "\xa0") this.className += " pressed";
                  };
                  td.onmouseup = function() {
                    if (self.VKI_clickless) clearTimeout(this.VKI_clickless);
                    this.className = this.className.replace(/ ?pressed/g, "");
                  };
                  td.ondblclick = function() { return false; };

                switch (lkey[1]) {
                  case "<?php echo $keyname_caps ?>": case "<?php echo $keyname_shift ?>":
                  case "<?php echo $keyname_alt ?>": case "<?php echo $keyname_altgr ?>": case "<?php echo $keyname_altlk ?>":
                    td.onclick = (function(type) { return function() { self.VKI_modify(type); return false; }; })(lkey[1]);
                    break;
                  case "<?php echo $keyname_tab ?>":
                    td.onclick = function() { self.VKI_insert("\t"); return false; };
                    break;
                  case "<?php echo $keyname_bksp ?>":
                    td.onclick = function() {
                      self.VKI_target.focus();
                      if (self.VKI_target.setSelectionRange) {
                        if (self.VKI_target.readOnly && self.VKI_isWebKit) {
                          var rng = [self.VKI_target.selStart || 0, self.VKI_target.selEnd || 0];
                        } else var rng = [self.VKI_target.selectionStart, self.VKI_target.selectionEnd];
                        if (rng[0] < rng[1]) rng[0]++;
                        self.VKI_target.value = self.VKI_target.value.substr(0, rng[0] - 1) + self.VKI_target.value.substr(rng[1]);
                        self.VKI_target.setSelectionRange(rng[0] - 1, rng[0] - 1);
                        if (self.VKI_target.readOnly && self.VKI_isWebKit) {
                          var range = window.getSelection().getRangeAt(0);
                          self.VKI_target.selStart = range.startOffset;
                          self.VKI_target.selEnd = range.endOffset;
                        }
                      } else if (self.VKI_target.createTextRange) {
                        try {
                          self.VKI_target.range.select();
                        } catch(e) { self.VKI_target.range = document.selection.createRange(); }
                        if (!self.VKI_target.range.text.length) self.VKI_target.range.moveStart('character', -1);
                        self.VKI_target.range.text = "";
                      } else self.VKI_target.value = self.VKI_target.value.substr(0, self.VKI_target.value.length - 1);
                      if (self.VKI_shift) self.VKI_modify("<?php echo $keyname_shift ?>");
                      if (self.VKI_altgr) self.VKI_modify("<?php echo $keyname_altgr ?>");
                      self.VKI_target.focus();
                      return true;
                    };
                    break;
                  case "<?php echo $keyname_enter ?>":
                    td.onclick = function() {
                      if (self.VKI_target.nodeName != "TEXTAREA") {
                        self.VKI_close();
                        this.className = this.className.replace(/ ?(hover|pressed)/g, "");
                      } else self.VKI_insert("\n");
                      return true;
                    };
                    break;
                  default:
                    td.onclick = function() {
                      var character = this.firstChild.nodeValue || this.firstChild.className;
                      if (self.VKI_deadkeysOn && self.VKI_dead) {
                        if (self.VKI_dead != character) {
                          for (key in self.VKI_deadkey) {
                            if (key == self.VKI_dead) {
                              if (character != " ") {
                                for (var z = 0, rezzed = false, dk; dk = self.VKI_deadkey[key][z++];) {
                                  if (dk[0] == character) {
                                    self.VKI_insert(dk[1]);
                                    rezzed = true;
                                    break;
                                  }
                                }
                              } else {
                                self.VKI_insert(self.VKI_dead);
                                rezzed = true;
                              } break;
                            }
                          }
                        } else rezzed = true;
                      } self.VKI_dead = false;

                      if (!rezzed && character != "\xa0") {
                        if (self.VKI_deadkeysOn) {
                          for (key in self.VKI_deadkey) {
                            if (key == character) {
                              self.VKI_dead = key;
                              this.className += " dead";
                              if (self.VKI_shift) self.VKI_modify("<?php echo $keyname_shift ?>");
                              if (self.VKI_altgr) self.VKI_modify("<?php echo $keyname_altgr ?>");
                              break;
                            }
                          }
                          if (!self.VKI_dead) self.VKI_insert(character);
                        } else self.VKI_insert(character);
                      }

                      self.VKI_modify("");
                      if (self.VKI_isOpera) {
                        this.style.width = "50px";
                        var foo = this.offsetWidth;
                        this.style.width = "";
                      }
                      return false;
                    };

                }
                tr.appendChild(td);
              tbody.appendChild(tr);
            table.appendChild(tbody);

            for (var z = 0; z < 4; z++)
              if (this.VKI_deadkey[lkey[z] = lkey[z] || "\xa0"]) hasDeadKey = true;
        }
        container.appendChild(table);
      }
      this.VKI_deadkeysElem.style.display = (!this.VKI_layout[this.VKI_kt].DDK && hasDeadKey) ? "inline" : "none";
    };

    this.VKI_buildKeys();
    VKI_disableSelection(this.VKI_keyboard);


    /* ****************************************************************
     * Controls modifier keys
     *
     */
    this.VKI_modify = function(type) {
      switch (type) {
        case "<?php echo $keyname_alt ?>":
        case "<?php echo $keyname_altgr ?>": this.VKI_altgr = !this.VKI_altgr; break;
        case "<?php echo $keyname_altlk ?>": this.VKI_altgrlock = !this.VKI_altgrlock; break;
        case "<?php echo $keyname_caps ?>": this.VKI_shiftlock = !this.VKI_shiftlock; break;
        case "<?php echo $keyname_shift ?>": this.VKI_shift = !this.VKI_shift; break;
      } var vchar = 0;
      if (!this.VKI_shift != !this.VKI_shiftlock) vchar += 1;
      if (!this.VKI_altgr != !this.VKI_altgrlock) vchar += 2;

      var tables = this.VKI_keyboard.getElementsByTagName('table');
      for (var x = 0; x < tables.length; x++) {
        var tds = tables[x].getElementsByTagName('td');
        for (var y = 0; y < tds.length; y++) {
          var className = [], lkey = this.VKI_layout[this.VKI_kt][x][y];

          if (tds[y].className.indexOf('hover') > -1) className.push("hover");

          switch (lkey[1]) {
            case "<?php echo $keyname_alt ?>":
            case "<?php echo $keyname_altgr ?>":
              if (this.VKI_altgr) className.push("dead");
              break;
            case "<?php echo $keyname_altlk ?>":
              if (this.VKI_altgrlock) className.push("dead");
              break;
            case "<?php echo $keyname_shift ?>":
              if (this.VKI_shift) className.push("dead");
              break;
            case "<?php echo $keyname_caps ?>":
              if (this.VKI_shiftlock) className.push("dead");
              break;
            case "<?php echo $keyname_tab ?>": case "<?php echo $keyname_enter ?>": case "<?php echo $keyname_bksp ?>": break;
            default:
              if (type) {
                tds[y].removeChild(tds[y].firstChild);
                if (this.VKI_symbol[lkey[vchar]]) {
                  var span = document.createElement('span');
                      span.className = lkey[vchar];
                      span.appendChild(document.createTextNode(this.VKI_symbol[lkey[vchar]]));
                    tds[y].appendChild(span);
                } else tds[y].appendChild(document.createTextNode(lkey[vchar]));
              }
              if (this.VKI_deadkeysOn) {
                var character = tds[y].firstChild.nodeValue || tds[y].firstChild.className;
                if (this.VKI_dead) {
                  if (character == this.VKI_dead) className.push("dead");
                  for (var z = 0; z < this.VKI_deadkey[this.VKI_dead].length; z++) {
                    if (character == this.VKI_deadkey[this.VKI_dead][z][0]) {
                      className.push("target");
                      break;
                    }
                  }
                }
                for (key in this.VKI_deadkey)
                  if (key === character) { className.push("alive"); break; }
              }
          }

          if (y == tds.length - 1 && tds.length > this.VKI_keyCenter) className.push("last");
          if (lkey[0] == " ") className.push("space");
          tds[y].className = className.join(" ");
        }
      }
    };


    /* ****************************************************************
     * Insert text at the cursor
     *
     */
    this.VKI_insert = function(text) {
      this.VKI_target.focus();
      if (this.VKI_target.maxLength) this.VKI_target.maxlength = this.VKI_target.maxLength;
      if (typeof this.VKI_target.maxlength == "undefined" ||
          this.VKI_target.maxlength < 0 ||
          this.VKI_target.value.length < this.VKI_target.maxlength) {
        if (this.VKI_target.setSelectionRange) {
          if (this.VKI_target.readOnly && this.VKI_isWebKit) {
            var rng = [this.VKI_target.selStart || 0, this.VKI_target.selEnd || 0];
          } else var rng = [this.VKI_target.selectionStart, this.VKI_target.selectionEnd];
          this.VKI_target.value = this.VKI_target.value.substr(0, rng[0]) + text + this.VKI_target.value.substr(rng[1]);
          if (text == "\n" && window.opera) rng[0]++;
          this.VKI_target.setSelectionRange(rng[0] + text.length, rng[0] + text.length);
          if (this.VKI_target.readOnly && this.VKI_isWebKit) {
            var range = window.getSelection().getRangeAt(0);
            this.VKI_target.selStart = range.startOffset;
            this.VKI_target.selEnd = range.endOffset;
          }
        } else if (this.VKI_target.createTextRange) {
          try {
            this.VKI_target.range.select();
          } catch(e) { this.VKI_target.range = document.selection.createRange(); }
          this.VKI_target.range.text = text;
          this.VKI_target.range.collapse(true);
          this.VKI_target.range.select();
        } else this.VKI_target.value += text;
        if (this.VKI_shift) this.VKI_modify("<?php echo $keyname_shift ?>");
        if (this.VKI_altgr) this.VKI_modify("<?php echo $keyname_altgr ?>");
        this.VKI_target.focus();
      } else if (this.VKI_target.createTextRange && this.VKI_target.range)
        this.VKI_target.range.select();
    };


    /* ****************************************************************
     * Show the keyboard interface
     *
     */
    this.VKI_show = function(elem) {
      if (!this.VKI_target) {
        this.VKI_target = elem;
        if (this.VKI_langAdapt && this.VKI_target.lang) {
          var chg = false, sub = [];
          for (ktype in this.VKI_layout) {
            if (typeof this.VKI_layout[ktype] == "object") {
              for (var x = 0; x < this.VKI_layout[ktype].lang.length; x++) {
                if (this.VKI_layout[ktype].lang[x].toLowerCase() == this.VKI_target.lang.toLowerCase()) {
                  chg = kblist.value = this.VKI_kt = ktype;
                  break;
                } else if (this.VKI_layout[ktype].lang[x].toLowerCase().indexOf(this.VKI_target.lang.toLowerCase()) == 0)
                  sub.push([this.VKI_layout[ktype].lang[x], ktype]);
              }
            } if (chg) break;
          } if (sub.length) {
            sub.sort(function (a, b) { return a[0].length - b[0].length; });
            chg = kblist.value = this.VKI_kt = sub[0][1];
          } if (chg) this.VKI_buildKeys();
        }
        if (this.VKI_isIE) {
          if (!this.VKI_target.range) {
            this.VKI_target.range = this.VKI_target.createTextRange();
            this.VKI_target.range.moveStart('character', this.VKI_target.value.length);
          } this.VKI_target.range.select();
        }
        try { this.VKI_keyboard.parentNode.removeChild(this.VKI_keyboard); } catch (e) {}
        if (this.VKI_clearPasswords && this.VKI_target.type == "password") this.VKI_target.value = "";

        var elem = this.VKI_target;
        this.VKI_target.keyboardPosition = "absolute";
        do {
          if (VKI_getStyle(elem, "position") == "fixed") {
            this.VKI_target.keyboardPosition = "fixed";
            break;
          }
        } while (elem = elem.offsetParent);

        if (this.VKI_isIE6) document.body.appendChild(this.VKI_iframe);
        document.body.appendChild(this.VKI_keyboard);
        this.VKI_keyboard.style.position = this.VKI_target.keyboardPosition;
        if (this.VKI_isOpera) kblist.value = this.VKI_kt;

        this.VKI_position(true);
        if (self.VKI_isMoz || self.VKI_isWebKit) this.VKI_position(true);
        this.VKI_target.focus();
      } else this.VKI_close();
    };


    /* ****************************************************************
     * Position the keyboard
     *
     */
    this.VKI_position = function(force) {
      if (self.VKI_target) {
        var kPos = VKI_findPos(self.VKI_keyboard), wDim = VKI_innerDimensions(), sDis = VKI_scrollDist();
        var place = false, fudge = self.VKI_target.offsetHeight + 3;
        if (force !== true) {
          if (kPos[1] + self.VKI_keyboard.offsetHeight - sDis[1] - wDim[1] > 0) {
            place = true;
            fudge = -self.VKI_keyboard.offsetHeight - 3;
          } else if (kPos[1] - sDis[1] < 0) place = true;
        }
        if (place || force === true) {
          var iPos = VKI_findPos(self.VKI_target);
          self.VKI_keyboard.style.top = iPos[1] - ((self.VKI_target.keyboardPosition == "fixed" && !self.VKI_isIE && !self.VKI_isMoz) ? sDis[1] : 0) + fudge + "px";
          self.VKI_keyboard.style.left = Math.max(10, Math.min(wDim[0] - self.VKI_keyboard.offsetWidth - 25, iPos[0])) + "px";
          if (self.VKI_isIE6) {
            self.VKI_iframe.style.width = self.VKI_keyboard.offsetWidth + "px";
            self.VKI_iframe.style.height = self.VKI_keyboard.offsetHeight + "px";
            self.VKI_iframe.style.top = self.VKI_keyboard.style.top;
            self.VKI_iframe.style.left = self.VKI_keyboard.style.left;
          }
        }
        if (force === true) self.VKI_position();
      }
    };


    if (window.addEventListener) {
      window.addEventListener('resize', this.VKI_position, false);
      window.addEventListener('scroll', this.VKI_position, false);
    } else if (window.attachEvent) {
      window.attachEvent('onresize', this.VKI_position);
      window.attachEvent('onscroll', this.VKI_position);
    }


    /* ****************************************************************
     * Close the keyboard interface
     *
     */
    this.VKI_close = VKI_close = function() {
      if (this.VKI_target) {
        try {
          this.VKI_keyboard.parentNode.removeChild(this.VKI_keyboard);
          if (this.VKI_isIE6) this.VKI_iframe.parentNode.removeChild(this.VKI_iframe);
        } catch (e) {}
        if (this.VKI_kt != this.VKI_kts) {
          kblist.value = this.VKI_kt = this.VKI_kts;
          this.VKI_buildKeys();
        }
        this.VKI_target.focus();
        this.VKI_target = false;
      }
    };
  }

  function VKI_findPos(obj) {
    var curleft = curtop = 0;
    do {
      curleft += obj.offsetLeft;
      curtop += obj.offsetTop;
    } while (obj = obj.offsetParent);
    return [curleft, curtop];
  }

  function VKI_innerDimensions() {
    if (self.innerHeight) {
      return [self.innerWidth, self.innerHeight];
    } else if (document.documentElement && document.documentElement.clientHeight) {
      return [document.documentElement.clientWidth, document.documentElement.clientHeight];
    } else if (document.body)
      return [document.body.clientWidth, document.body.clientHeight];
    return [0, 0];
  }

  function VKI_scrollDist() {
    var html = document.getElementsByTagName('html')[0];
    if (html.scrollTop && document.documentElement.scrollTop) {
      return [html.scrollLeft, html.scrollTop];
    } else if (html.scrollTop || document.documentElement.scrollTop) {
      return [html.scrollLeft + document.documentElement.scrollLeft, html.scrollTop + document.documentElement.scrollTop];
    } else if (document.body.scrollTop)
      return [document.body.scrollLeft, document.body.scrollTop];
    return [0, 0];
  }

  function VKI_getStyle(obj, styleProp) {
    if (obj.currentStyle) {
      var y = obj.currentStyle[styleProp];
    } else if (window.getComputedStyle)
      var y = window.getComputedStyle(obj, null)[styleProp];
    return y;
  }

  function VKI_disableSelection(elem) {
    elem.onselectstart = function() { return false; };
    elem.unselectable = "on";
    elem.style.MozUserSelect = "none";
    elem.style.cursor = "default";
    if (window.opera) elem.onmousedown = function() { return false; };
  }


  /* ***** Attach this script to the onload event ****************** */
  if (window.addEventListener) {
    window.addEventListener('load', VKI_buildKeyboardInputs, false);
  } else if (window.attachEvent)
    window.attachEvent('onload', VKI_buildKeyboardInputs);
</script>
<div class="search<?php echo $params->get('moduleclass_sfx') ?>">