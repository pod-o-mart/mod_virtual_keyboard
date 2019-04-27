<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_virtual_keyboard
 *
 * Copyright (C) 2019 Martin Podolak
 * Licenced for free distribution under the BSDL http://www.opensource.org/licenses/bsd-license.php
 * 
 * HTML Virtual Keyboard Interface Script - v1.49
 *   Copyright (c) 2011 - GreyWyvern
 */

defined('_JEXEC') or die;
?>
<div class="virtual_keyboard<?php echo $moduleclass_sfx; ?>">
<input class="keyboardInput" type="text">

<?php
if ($params->get('apply_keyboard')=='1')
{ ?>
<script>
<!-- apply to all fields -->
var y=document.getElementsByTagName('TEXTAREA');
var j;
for(j=0;j<y.length;j++)
	{y[j].classList.add('<?php echo $params->get('apply_specific_classname'); ?>');}

var x=document.querySelectorAll('INPUT');
var i;
for(i=0;i<x.length;i++)
	{x[i].classList.add('<?php echo $params->get('apply_specific_classname'); ?>');}

var w=document.getElementsByTagName('INPUT');
var l;
for(l=0;l<w.length;l++)
	{
	if(w[l].getAttribute('type')==='email')
		{
		w[l].setAttribute('type','text');
		}
	if(w[l].getAttribute('type')==='search')
		{
		w[l].setAttribute('type','text');
		}
	}
</script>
<?php }

if ($params->get('apply_keyboard')=='2')
{ ?>
<script>
<!-- apply to specific input field -->
var w=document.getElementsByClassName('<?php echo $params->get('apply_specific_classname'); ?>');
var l;
for(l=0;l<w.length;l++)
	{
	if(w[l].getAttribute('type')==='email')
		{
		w[l].setAttribute('type','text');
		}
	if(w[l].getAttribute('type')==='search')
		{
		w[l].setAttribute('type','text');
		}
	}
</script>
<?php }

if ($params->get('vki_responsive')=='1')
{ ?>
<script>
<!-- responsive -->
var m=document.getElementsByClassName('<?php echo $params->get('apply_specific_classname'); ?>');
var n;
for(n=0;n<m.length;n++)
	{
	m[n].setAttribute('data-disable-touch-keyboard','');
	}
    $(document).ready(function() {
  if (Modernizr.touch) {
	$('[data-disable-touch-keyboard]').attr('readonly', 'readonly');
	$("head").append($("<link rel='stylesheet' href='/modules/mod_virtual_keyboard/styles/keyboard-touch.css' type='text/css' media='screen' />"));
  }
});
</script>
<?php } ?>

<script>
var VKI_attach, VKI_close;
(function() {
  var self = this;
  this.VKI_version = "1.49";
  this.VKI_showVersion = false;
  this.VKI_target = false;
  this.VKI_shift = this.VKI_shiftlock = false;
  this.VKI_altgr = this.VKI_altgrlock = false;
  this.VKI_dead = false;
  this.VKI_deadBox = <?php if ($params->get('keyboard_am')=='1' ){echo 'true';}
else {
	if (($params->get('deadkeys')=='1') OR ($params->get('deadkeys')=='2') OR ($params->get('keyboard_am', 1)) OR ($params->get('default_keyboard')=='am')){echo 'true';}
	else {echo 'false';}
	} ?>; // Show the dead keys checkbox
  this.VKI_deadkeysOn = <?php if (($params->get('keyboard_am', 1)) OR ($params->get('default_keyboard')=='am')){echo 'true';}
  
else {
	if ($params->get('deadkeys')=='2'){echo 'true';}
	else {echo 'false';}
	} ?>;  // Turn dead keys on by default
  this.VKI_numberPad = <?php if (($params->get('numpad')=='1') OR ($params->get('numpad')=='2' )){echo 'true';} ELSE {echo 'false';} ?>;  // Allow user to open and close the number pad
  this.VKI_numberPadOn = <?php if ($params->get('numpad')=='2'){echo 'true';} ELSE {echo 'false';} ?>;  // Show number pad by default
  this.VKI_kts = this.VKI_kt = "<?php
    if ($params->get('default_keyboard')=='am') {echo $params->get('keyboard_am_name_original');}
elseif ($params->get('default_keyboard')=='ar') {echo $params->get('keyboard_ar_name_original');}
elseif ($params->get('default_keyboard')=='as') {echo $params->get('keyboard_as_name_original');}
elseif ($params->get('default_keyboard')=='az-Cyrl') {echo $params->get('keyboard_az-Cyrl_name_original');}
elseif ($params->get('default_keyboard')=='az') {echo $params->get('keyboard_az_name_original');}
elseif ($params->get('default_keyboard')=='be') {echo $params->get('keyboard_be_name_original');}
elseif ($params->get('default_keyboard')=='nl-BE') {echo $params->get('keyboard_nl-BE_name_original');}
elseif ($params->get('default_keyboard')=='bg1') {echo $params->get('keyboard_bg1_name_original');}
elseif ($params->get('default_keyboard')=='bg2') {echo $params->get('keyboard_bg2_name_original');}
elseif ($params->get('default_keyboard')=='bn') {echo $params->get('keyboard_bn_name_original');}
elseif ($params->get('default_keyboard')=='fr-CA') {echo $params->get('keyboard_fr-CA_name_original');}
elseif ($params->get('default_keyboard')=='cs') {echo $params->get('keyboard_cs_name_original');}
elseif ($params->get('default_keyboard')=='da') {echo $params->get('keyboard_da_name_original');}
elseif ($params->get('default_keyboard')=='de') {echo $params->get('keyboard_de_name_original');}
elseif ($params->get('default_keyboard')=='db') {echo $params->get('keyboard_db_name_original');}
elseif ($params->get('default_keyboard')=='dv') {echo $params->get('keyboard_dv_name_original');}
elseif ($params->get('default_keyboard')=='dk') {echo $params->get('keyboard_dk_name_original');}
elseif ($params->get('default_keyboard')=='el') {echo $params->get('keyboard_el_name_original');}
elseif ($params->get('default_keyboard')=='en') {echo $params->get('keyboard_en_name_original');}
elseif ($params->get('default_keyboard')=='en-gb') {echo $params->get('keyboard_en-gb_name_original');}
elseif ($params->get('default_keyboard')=='en-us') {echo $params->get('keyboard_en-us_name_original');}
elseif ($params->get('default_keyboard')=='et') {echo $params->get('keyboard_et_name_original');}
elseif ($params->get('default_keyboard')=='es') {echo $params->get('keyboard_es_name_original');}
elseif ($params->get('default_keyboard')=='fa-AF') {echo $params->get('keyboard_fa-AF_name_original');}
elseif ($params->get('default_keyboard')=='fa') {echo $params->get('keyboard_fa_name_original');}
elseif ($params->get('default_keyboard')=='fo') {echo $params->get('keyboard_fo_name_original');}
elseif ($params->get('default_keyboard')=='fr') {echo $params->get('keyboard_fr_name_original');}
elseif ($params->get('default_keyboard')=='ga') {echo $params->get('keyboard_ga_name_original');}
elseif ($params->get('default_keyboard')=='gu') {echo $params->get('keyboard_gu_name_original');}
elseif ($params->get('default_keyboard')=='he') {echo $params->get('keyboard_he_name_original');}
elseif ($params->get('default_keyboard')=='hi-Deva') {echo $params->get('keyboard_hi-Deva_name_original');}
elseif ($params->get('default_keyboard')=='hi') {echo $params->get('keyboard_hi_name_original');}
elseif ($params->get('default_keyboard')=='hy-arevmda') {echo $params->get('keyboard_hy-arevmda_name_original');}
elseif ($params->get('default_keyboard')=='hy') {echo $params->get('keyboard_hy_name_original');}
elseif ($params->get('default_keyboard')=='is') {echo $params->get('keyboard_is_name_original');}
elseif ($params->get('default_keyboard')=='it') {echo $params->get('keyboard_it_name_original');}
elseif ($params->get('default_keyboard')=='ja') {echo $params->get('keyboard_ja_name_original');}
elseif ($params->get('default_keyboard')=='ka') {echo $params->get('keyboard_ka_name_original');}
elseif ($params->get('default_keyboard')=='kk') {echo $params->get('keyboard_kk_name_original');}
elseif ($params->get('default_keyboard')=='km') {echo $params->get('keyboard_km_name_original');}
elseif ($params->get('default_keyboard')=='kn') {echo $params->get('keyboard_kn_name_original');}
elseif ($params->get('default_keyboard')=='ko') {echo $params->get('keyboard_ko_name_original');}
elseif ($params->get('default_keyboard')=='ku') {echo $params->get('keyboard_ku_name_original');}
elseif ($params->get('default_keyboard')=='ky') {echo $params->get('keyboard_ky_name_original');}
elseif ($params->get('default_keyboard')=='lv') {echo $params->get('keyboard_lv_name_original');}
elseif ($params->get('default_keyboard')=='lt') {echo $params->get('keyboard_lt_name_original');}
elseif ($params->get('default_keyboard')=='hu') {echo $params->get('keyboard_hu_name_original');}
elseif ($params->get('default_keyboard')=='mt') {echo $params->get('keyboard_mt_name_original');}
elseif ($params->get('default_keyboard')=='mk') {echo $params->get('keyboard_mk_name_original');}
elseif ($params->get('default_keyboard')=='ml') {echo $params->get('keyboard_ml_name_original');}
elseif ($params->get('default_keyboard')=='misc') {echo $params->get('keyboard_misc_name_original');}
elseif ($params->get('default_keyboard')=='mn') {echo $params->get('keyboard_mn_name_original');}
elseif ($params->get('default_keyboard')=='mr') {echo $params->get('keyboard_mr_name_original');}
elseif ($params->get('default_keyboard')=='my') {echo $params->get('keyboard_my_name_original');}
elseif ($params->get('default_keyboard')=='nl') {echo $params->get('keyboard_nl_name_original');}
elseif ($params->get('default_keyboard')=='no') {echo $params->get('keyboard_no_name_original');}
elseif ($params->get('default_keyboard')=='ps') {echo $params->get('keyboard_ps_name_original');}
elseif ($params->get('default_keyboard')=='pa') {echo $params->get('keyboard_pa_name_original');}
elseif ($params->get('default_keyboard')=='zh-Latn') {echo $params->get('keyboard_zh-Latn_name_original');}
elseif ($params->get('default_keyboard')=='pl1') {echo $params->get('keyboard_pl1_name_original');}
elseif ($params->get('default_keyboard')=='pl2') {echo $params->get('keyboard_pl2_name_original');}
elseif ($params->get('default_keyboard')=='pt-BR') {echo $params->get('keyboard_pt-BR_name_original');}
elseif ($params->get('default_keyboard')=='pt') {echo $params->get('keyboard_pt_name_original');}
elseif ($params->get('default_keyboard')=='ro') {echo $params->get('keyboard_ro_name_original');}
elseif ($params->get('default_keyboard')=='ru') {echo $params->get('keyboard_ru_name_original');}
elseif ($params->get('default_keyboard')=='de-CH') {echo $params->get('keyboard_de-CH_name_original');}
elseif ($params->get('default_keyboard')=='sq') {echo $params->get('keyboard_sq_name_original');}
elseif ($params->get('default_keyboard')=='sk') {echo $params->get('keyboard_sk_name_original');}
elseif ($params->get('default_keyboard')=='sh') {echo $params->get('keyboard_sh_name_original');}
elseif ($params->get('default_keyboard')=='sr') {echo $params->get('keyboard_sr_name_original');}
elseif ($params->get('default_keyboard')=='fi') {echo $params->get('keyboard_fi_name_original');}
elseif ($params->get('default_keyboard')=='sv') {echo $params->get('keyboard_sv_name_original');}
elseif ($params->get('default_keyboard')=='fr-CH') {echo $params->get('keyboard_fr-CH_name_original');}
elseif ($params->get('default_keyboard')=='syc') {echo $params->get('keyboard_syc_name_original');}
elseif ($params->get('default_keyboard')=='ta') {echo $params->get('keyboard_ta_name_original');}
elseif ($params->get('default_keyboard')=='te') {echo $params->get('keyboard_te_name_original');}
elseif ($params->get('default_keyboard')=='vi') {echo $params->get('keyboard_vi_name_original');}
elseif ($params->get('default_keyboard')=='th1') {echo $params->get('keyboard_th1_name_original');}
elseif ($params->get('default_keyboard')=='th2') {echo $params->get('keyboard_th2_name_original');}
elseif ($params->get('default_keyboard')=='tt') {echo $params->get('keyboard_tt_name_original');}
elseif ($params->get('default_keyboard')=='trf') {echo $params->get('keyboard_trf_name_original');}
elseif ($params->get('default_keyboard')=='trq') {echo $params->get('keyboard_trq_name_original');}
elseif ($params->get('default_keyboard')=='uk') {echo $params->get('keyboard_uk_name_original');}
elseif ($params->get('default_keyboard')=='ur1') {echo $params->get('keyboard_ur1_name_original');}
elseif ($params->get('default_keyboard')=='ur2') {echo $params->get('keyboard_ur2_name_original');}
elseif ($params->get('default_keyboard')=='uz') {echo $params->get('keyboard_uz_name_original');}
elseif ($params->get('default_keyboard')=='yi1') {echo $params->get('keyboard_yi1_name_original');}
elseif ($params->get('default_keyboard')=='yi2') {echo $params->get('keyboard_yi2_name_original');}
elseif ($params->get('default_keyboard')=='zh-Bopo') {echo $params->get('keyboard_zh-Bopo_name_original');}
elseif ($params->get('default_keyboard')=='zh') {echo $params->get('keyboard_zh_name_original');}
elseif ($params->get('default_keyboard')=='custom') {echo $params->get('keyboard_custom_name_original');}
 ?>";  // Default keyboard layout
  this.VKI_langAdapt = true;  // Use lang attribute of input to select keyboard
  this.VKI_size = <?php echo $params->get('vki_size'); ?>;  // Default keyboard size (1-5)
  this.VKI_sizeAdj = <?php if ($params->get('vki_sizeadj')=='1'){echo 'true';} else {echo 'false';} ?>;  // Allow user to adjust keyboard size
  this.VKI_clearPasswords = false;  // Clear password fields on focus
  this.VKI_imageURI = "<?php if ($params->get('vki_imageless')=='1' ){echo '';} else {echo $params->get('vki_imageuri');} ?>";  // If empty string, use imageless mode
  this.VKI_clickless = <?php echo $params->get('vki_clickless'); ?>;  // 0 = disabled, > 0 = delay in ms
  this.VKI_activeTab = 0;  // Tab moves to next: 1 = element, 2 = keyboard enabled element
  this.VKI_enterSubmit = <?php if ($params->get('vki_entersubmit')=='1'){echo 'true';} else {echo 'false';} ?>;  // Submit forms when Enter is pressed
  this.VKI_keyCenter = 3;

  this.VKI_isIE = /*@cc_on!@*/false;
  this.VKI_isIE6 = /*@if(@_jscript_version == 5.6)!@end@*/false;
  this.VKI_isIElt8 = /*@if(@_jscript_version < 5.8)!@end@*/false;
  this.VKI_isWebKit = RegExp("KHTML").test(navigator.userAgent);
  this.VKI_isOpera = RegExp("Opera").test(navigator.userAgent);
  this.VKI_isMoz = (!this.VKI_isWebKit && navigator.product == "Gecko");

  /* ***** i18n text strings ************************************* */
  this.VKI_i18n = {
    '00': "<?php echo $params->get('vki_i18n_00'); ?>",
    '01': "<?php echo $params->get('vki_i18n_01'); ?>",
    '02': "<?php echo $params->get('vki_i18n_02'); ?>",
    '03': "<?php echo $params->get('vki_i18n_03'); ?>",
    '04': "<?php echo $params->get('vki_i18n_04'); ?>",
    '05': "<?php echo $params->get('vki_i18n_05'); ?>",
    '06': "<?php echo $params->get('vki_i18n_06'); ?>",
    '07': "<?php echo $params->get('vki_i18n_07'); ?>",
    '08': "<?php echo $params->get('vki_i18n_08'); ?>",
    '09': "Version",
    '10': "<?php echo $params->get('vki_i18n_10'); ?>",
    '11': "<?php echo $params->get('vki_i18n_11'); ?>"
  };

  /* ***** Create keyboards ************************************** */
  this.VKI_layout = {};
  
<?php if (($params->get('keyboard_am', 1)) OR ($params->get('default_keyboard')=='am'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_am_name_original'); ?>'] = { // Dead keys checkbox must be active (recommended turned on by default).
    'name': "<?php echo $params->get('keyboard_de_name_site'); ?>", 'keys': [
      [["\u{1369}", "\u{A1}"], ["1", "!"], ["2", "@"], ["3", ","], ["4", "$"], ["5", "%"], ["6", "."], ["7", "/"], ["8", "?"], ["9", "("], ["0", ")"], ["-", "\u{135F}"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u{1200}", "\u{1210}"], ["\u{1260}", "\u{1268}"], ["\u{1290}", "\u{1298}"], ["\u{1218}", "\u{1238}"], ["\u{12C8}", "\u{12D0}"], ["\u{1320}", "\u{1328}"], ["\u{1270}", "\u{1340}"], ["\u{1208}", "\u{1338}"], ["\u{1228}", "\u{1280}"], ["\u{12E8}", "\u{1288}"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u{12A3}", "\u{1364}"], ["\u{12A1}", "\u{1366}"], ["\u{12A0}", "\u{AB}"], ["\u{12A5}", "\u{1361}"], ["\u{12A4}", "\u{1368}"], ["\u{12A7}", "\u{1367}"], ["\u{12A5}", "\u{1363}"], ["\u{12A0}", "\u{BB}"], ["\u{12A6}", "\u{1365}"], ["\u{12A2}", "\u{1362}"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u{1250}", "\u{1258}"], ["\u{1240}", "\u{1248}"], ["\u{12A8}", "\u{12B0}"], ["\u{12F0}", "\u{1300}"], ["\u{12B8}", "\u{12C0}"], ["\u{1308}", "\u{1310}"], ["\u{1230}", "\u{1220}"], ["\u{1278}", "\u{1330}"], ["\u{12D8}", "\u{12E0}"], ["\u{1348}", "\u{1350}"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["am"] };
<?php } ?>
<?php if (($params->get('keyboard_ar', 1)) OR ($params->get('default_keyboard')=='ar'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_ar_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_ar_name_site'); ?>", 'keys': [
      [["\u0630", "\u0651 "], ["1", "!", "\u00a1", "\u00b9"], ["2", "@", "\u00b2"], ["3", "#", "\u00b3"], ["4", "$", "\u00a4", "\u00a3"], ["5", "%", "\u20ac"], ["6", "^", "\u00bc"], ["7", "&", "\u00bd"], ["8", "*", "\u00be"], ["9", "(", "\u2018"], ["0", ")", "\u2019"], ["-", "_", "\u00a5"], ["=", "+", "\u00d7", "\u00f7"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["ሀ", "\u064e"], ["\u0635", "\u064b"], ["\u062b", "\u064f"], ["\u0642", "\u064c"], ["\u0641", "\u0644"], ["\u063a", "\u0625"], ["\u0639", "\u2018"], ["\u0647", "\u00f7"], ["\u062e", "\u00d7"], ["\u062d", "\u061b"], ["\u062c", "<"], ["\u062f", ">"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0634", "\u0650"], ["\u0633", "\u064d"], ["\u064a", "]"], ["\u0628", "["], ["\u0644", "\u0644"], ["\u0627", "\u0623"], ["\u062a", "\u0640"], ["\u0646", "\u060c"], ["\u0645", "/"], ["\u0643", ":"], ["\u0637", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0626", "~"], ["\u0621", "\u0652"], ["\u0624", "}"], ["\u0631", "{"], ["\u0644", "\u0644"], ["\u0649", "\u0622"], ["\u0629", "\u2019"], ["\u0648", ","], ["\u0632", "."], ["\u0638", "\u061f"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["ar"] };
 <?php } ?>
 <?php if (($params->get('keyboard_as', 1)) OR ($params->get('default_keyboard')=='as'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_as_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_as_name_site'); ?>", 'keys': [
      [["+", "?"], ["\u09E7", "{", "\u09E7"], ["\u09E8", "}", "\u09E8"], ["\u09E9", "\u09CD\u09F0", "\u09E9"], ["\u09EA", "\u09F0\u09CD", "\u09EA"], ["\u09EB", "\u099C\u09CD\u09F0", "\u09EB"], ["\u09EC", "\u0995\u09CD\u09B7", "\u09EC"], ["\u09ED", "\u0995\u09CD\u09F0", "\u09ED"], ["\u09EE", "\u09B6\u09CD\u09F0", "\u09EE"], ["\u09EF", "(", "\u09EF"], ["\u09E6", ")", "\u09E6"], ["-", ""], ["\u09C3", "\u098B", "\u09E2", "\u09E0"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u09CC", "\u0994", "\u09D7"], ["\u09C8", "\u0990"], ["\u09BE", "\u0986"], ["\u09C0", "\u0988", "\u09E3", "\u09E1"], ["\u09C2", "\u098A"], ["\u09F1", "\u09AD"], ["\u09B9", "\u0999"], ["\u0997", "\u0998"], ["\u09A6", "\u09A7"], ["\u099C", "\u099D"], ["\u09A1", "\u09A2", "\u09DC", "\u09DD"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u09CB", "\u0993", "\u09F4", "\u09F5"], ["\u09C7", "\u098F", "\u09F6", "\u09F7"], ["\u09CD", "\u0985", "\u09F8", "\u09F9"], ["\u09BF", "\u0987", "\u09E2", "\u098C"], ["\u09C1", "\u0989"], ["\u09AA", "\u09AB"], ["\u09F0", "", "\u09F0", "\u09F1"], ["\u0995", "\u0996"], ["\u09A4", "\u09A5"], ["\u099A", "\u099B"], ["\u099F", "\u09A0"], ["\u09BC", "\u099E"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u09CE", "\u0983"], ["\u0982", "\u0981", "\u09FA"], ["\u09AE", "\u09A3"], ["\u09A8", "\u09F7"], ["\u09AC", "\""], ["\u09B2", "'"], ["\u09B8", "\u09B6"], [",", "\u09B7"], [".", ";"], ["\u09AF", "\u09DF"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["as"] };
<?php } ?>
<?php if (($params->get('keyboard_az-Cyrl', 1)) OR ($params->get('default_keyboard')=='az-Cyrl'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_az-Cyrl_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_az-Cyrl_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!"], ["2", '"'], ["3", "\u2116"], ["4", ";"], ["5", "%"], ["6", ":"], ["7", "?"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0458", "\u0408"], ["\u04AF", "\u04AE"], ["\u0443", "\u0423"], ["\u043A", "\u041A"], ["\u0435", "\u0415"], ["\u043D", "\u041D"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u04BB", "\u04BA"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["\u04B9", "\u04B8"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u044B", "\u042B"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043F", "\u041F"], ["\u0440", "\u0420"], ["\u043E", "\u041E"], ["\u043B", "\u041B"], ["\u0434", "\u0414"], ["\u0436", "\u0416"], ["\u049D", "\u049C"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|"], ["\u04D9", "\u04D8"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043C", "\u041C"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u0493", "\u0492"], ["\u0431", "\u0411"], ["\u04E9", "\u04E8"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["az-Cyrl"] };
<?php } ?>
<?php if (($params->get('keyboard_az', 1)) OR ($params->get('default_keyboard')=='az'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_az_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_az_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!"], ["2", '"'], ["3", "\u2166"], ["4", ";"], ["5", "%"], ["6", ":"], ["7", "?"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["\u00FC", "\u00DC"], ["e", "E"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "\u0130"], ["o", "O"], ["p", "P"], ["\u00F6", "\u00D6"], ["\u011F", "\u011E"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u0131", "I"], ["\u0259", "\u018F"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], ["\u00E7", "\u00C7"], ["\u015F", "\u015E"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["az"] };
<?php } ?>
<?php if (($params->get('keyboard_be', 1)) OR ($params->get('default_keyboard')=='be'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_be_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_be_name_site'); ?>", 'keys': [
      [["\u0451", "\u0401"], ["1", "!"], ["2", '"'], ["3", "\u2116"], ["4", ";"], ["5", "%"], ["6", ":"], ["7", "?"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0439", "\u0419"], ["\u0446", "\u0426"], ["\u0443", "\u0423"], ["\u043a", "\u041a"], ["\u0435", "\u0415"], ["\u043d", "\u041d"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u045e", "\u040e"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["'", "'"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u044b", "\u042b"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043f", "\u041f"], ["\u0440", "\u0420"], ["\u043e", "\u041e"], ["\u043b", "\u041b"], ["\u0434", "\u0414"], ["\u0436", "\u0416"], ["\u044d", "\u042d"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["/", "|"], ["\u044f", "\u042f"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043c", "\u041c"], ["\u0456", "\u0406"], ["\u0442", "\u0422"], ["\u044c", "\u042c"], ["\u0431", "\u0411"], ["\u044e", "\u042e"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["be"] };
<?php } ?>
<?php if (($params->get('keyboard_nl-BE', 1)) OR ($params->get('default_keyboard')=='nl-BE'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_nl-BE_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_nl-BE_name_site'); ?>", 'keys': [
      [["\u00b2", "\u00b3"], ["&", "1", "|"], ["\u00e9", "2", "@"], ['"', "3", "#"], ["'", "4"], ["(", "5"], ["\u00a7", "6", "^"], ["\u00e8", "7"], ["!", "8"], ["\u00e7", "9", "{"], ["\u00e0", "0", "}"], [")", "\u00b0"], ["-", "_"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["a", "A"], ["z", "Z"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["^", "\u00a8", "["], ["$", "*", "]"], ["\u03bc", "\u00a3", "`"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["q", "Q"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["m", "M"], ["\u00f9", "%", "\u00b4"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "\\"], ["w", "W"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], [",", "?"], [";", "."], [":", "/"], ["=", "+", "~"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["nl-BE", "fr-BE"] };
<?php } ?>
<?php if (($params->get('keyboard_bg1', 1)) OR ($params->get('default_keyboard')=='bg1'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_bg1_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_bg1_name_site'); ?>", 'keys': [
      [["\u0447", "\u0427"], ["1", "!"], ["2", "@"], ["3", "#"], ["4", "$"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u044F", "\u042F"], ["\u0432", "\u0412"], ["\u0435", "\u0415"], ["\u0440", "\u0420"], ["\u0442", "\u0422"], ["\u044A", "\u042A"], ["\u0443", "\u0423"], ["\u0438", "\u0418"], ["\u043E", "\u041E"], ["\u043F", "\u041F"], ["\u0448", "\u0428"], ["\u0449", "\u0429"], ["\u044E", "\u042E"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0430", "\u0410"], ["\u0441", "\u0421"], ["\u0434", "\u0414"], ["\u0444", "\u0424"], ["\u0433", "\u0413"], ["\u0445", "\u0425"], ["\u0439", "\u0419"], ["\u043A", "\u041A"], ["\u043B", "\u041B"], [";", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0437", "\u0417"], ["\u044C", "\u042C"], ["\u0446", "\u0426"], ["\u0436", "\u0416"], ["\u0431", "\u0411"], ["\u043D", "\u041D"], ["\u043C", "\u041C"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["bg"] };
<?php } ?>
<?php if (($params->get('keyboard_bg2', 1)) OR ($params->get('default_keyboard')=='bg2'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_bg2_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_bg2_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "?"], ["3", "+"], ["4", '"'], ["5", "%"], ["6", "="], ["7", ":"], ["8", "/"], ["9", "_"], ["0", "\u2116"], ["-", "\u0406"], ["=", "V"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], [",", "\u044b"], ["\u0443", "\u0423"], ["\u0435", "\u0415"], ["\u0438", "\u0418"], ["\u0448", "\u0428"], ["\u0449", "\u0429"], ["\u043a", "\u041a"], ["\u0441", "\u0421"], ["\u0434", "\u0414"], ["\u0437", "\u0417"], ["\u0446", "\u0426"], [";", "\u00a7"], ["(", ")"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u044c", "\u042c"], ["\u044f", "\u042f"], ["\u0430", "\u0410"], ["\u043e", "\u041e"], ["\u0436", "\u0416"], ["\u0433", "\u0413"], ["\u0442", "\u0422"], ["\u043d", "\u041d"], ["\u0432", "\u0412"], ["\u043c", "\u041c"], ["\u0447", "\u0427"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u044e", "\u042e"], ["\u0439", "\u0419"], ["\u044a", "\u042a"], ["\u044d", "\u042d"], ["\u0444", "\u0424"], ["\u0445", "\u0425"], ["\u043f", "\u041f"], ["\u0440", "\u0420"], ["\u043b", "\u041b"], ["\u0431", "\u0411"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ]};
<?php } ?>
<?php if (($params->get('keyboard_bn', 1)) OR ($params->get('default_keyboard')=='bn'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_bn_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_bn_name_site'); ?>", 'keys': [
      [[""], ["1", "", "\u09E7"], ["2", "", "\u09E8"], ["3", "\u09CD\u09B0", "\u09E9"], ["4", "\u09B0\u09CD", "\u09EA"], ["5", "\u099C\u09CD\u09B0", "\u09EB"], ["6", "\u09A4\u09CD\u09B7", "\u09EC"], ["7", "\u0995\u09CD\u09B0", "\u09ED"], ["8", "\u09B6\u09CD\u09B0", "\u09EE"], ["9", "(", "\u09EF"], ["0", ")", "\u09E6"], ["-", "\u0983"], ["\u09C3", "\u098B", "\u09E2", "\u09E0"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u09CC", "\u0994", "\u09D7"], ["\u09C8", "\u0990"], ["\u09BE", "\u0986"], ["\u09C0", "\u0988", "\u09E3", "\u09E1"], ["\u09C2", "\u098A"], ["\u09AC", "\u09AD"], ["\u09B9", "\u0999"], ["\u0997", "\u0998"], ["\u09A6", "\u09A7"], ["\u099C", "\u099D"], ["\u09A1", "\u09A2", "\u09DC", "\u09DD"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u09CB", "\u0993", "\u09F4", "\u09F5"], ["\u09C7", "\u098F", "\u09F6", "\u09F7"], ["\u09CD", "\u0985", "\u09F8", "\u09F9"], ["\u09BF", "\u0987", "\u09E2", "\u098C"], ["\u09C1", "\u0989"], ["\u09AA", "\u09AB"], ["\u09B0", "", "\u09F0", "\u09F1"], ["\u0995", "\u0996"], ["\u09A4", "\u09A5"], ["\u099A", "\u099B"], ["\u099F", "\u09A0"], ["\u09BC", "\u099E"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], [""], ["\u0982", "\u0981", "\u09FA"], ["\u09AE", "\u09A3"], ["\u09A8"], ["\u09AC"], ["\u09B2"], ["\u09B8", "\u09B6"], [",", "\u09B7"], [".", "{"], ["\u09AF", "\u09DF"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["bn"] };
<?php } ?>
<?php if (($params->get('keyboard_fr-CA', 1)) OR ($params->get('default_keyboard')=='fr-CA'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_fr-CA_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_fr-CA_name_site'); ?>", 'keys': [
      [["#", "|", "\\"], ["1", "!", "\u00B1"], ["2", '"', "@"], ["3", "/", "\u00A3"], ["4", "$", "\u00A2"], ["5", "%", "\u00A4"], ["6", "?", "\u00AC"], ["7", "&", "\u00A6"], ["8", "*", "\u00B2"], ["9", "(", "\u00B3"], ["0", ")", "\u00BC"], ["-", "_", "\u00BD"], ["=", "+", "\u00BE"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O", "\u00A7"], ["p", "P", "\u00B6"], ["^", "^", "["], ["\u00B8", "\u00A8", "]"], ["<", ">", "}"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], [";", ":", "~"], ["`", "`", "{"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u00AB", "\u00BB", "\u00B0"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u00B5"], [",", "'", "\u00AF"], [".", ".", "\u00AD"], ["\u00E9", "\u00C9", "\u00B4"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["fr-CA"] };
<?php } ?>
<?php if (($params->get('keyboard_cs', 1)) OR ($params->get('default_keyboard')=='cs'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_cs_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_cs_name_site'); ?>", 'keys': [
      [[";", "\u00b0", "`", "~"], ["+", "1", "!"], ["\u011B", "2", "@"], ["\u0161", "3", "#"], ["\u010D", "4", "$"], ["\u0159", "5", "%"], ["\u017E", "6", "^"], ["\u00FD", "7", "&"], ["\u00E1", "8", "*"], ["\u00ED", "9", "("], ["\u00E9", "0", ")"], ["=", "%", "-", "_"], ["\u00B4", "\u02c7", "=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00FA", "/", "[", "{"], [")", "(", "]", "}"], ["\u00A8", "'", "\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u016F", '"', ";", ":"], ["\u00A7", "!", "\u00a4", "^"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|", "", "\u02dd"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "?", "<", "\u00d7"], [".", ":", ">", "\u00f7"], ["-", "_", "/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["cs"] };
<?php } ?>
<?php if (($params->get('keyboard_da', 1)) OR ($params->get('default_keyboard')=='da'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_da_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_da_name_site'); ?>", 'keys': [
      [["\u00bd", "\u00a7"], ["1", "!"], ["2", '"', "@"], ["3", "#", "\u00a3"], ["4", "\u00a4", "$"], ["5", "%", "\u20ac"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["+", "?"], ["\u00b4", "`", "|"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00e5", "\u00c5"], ["\u00a8", "^", "~"], ["'", "*"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00e6", "\u00c6"], ["\u00f8", "\u00d8"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "\\"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u03bc", "\u039c"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["da"] };
<?php } ?>

<?php if (($params->get('keyboard_de', 1)) OR ($params->get('default_keyboard')=='de'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_de_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_de_name_site'); ?>", 'keys': [
      [["^", "\u00b0"], ["1", "!"], ["2", '"', "\u00b2"], ["3", "\u00a7", "\u00b3"], ["4", "$"], ["5", "%"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["\u00df", "?", "\\"], ["\u00b4", "`"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "@"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00fc", "\u00dc"], ["+", "*", "~"], ["#", "'"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00f6", "\u00d6"], ["\u00e4", "\u00c4"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "\u00a6"], ["y", "Y"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u00b5"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["de"] };
<?php } ?>
<?php if (($params->get('keyboard_db', 1)) OR ($params->get('default_keyboard')=='db'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_db_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_db_name_site'); ?>", 'keys': [
      [["\u2764", "\u2765", "\u2766", "\u2767"], ["\u278a", "\u2780", "\u2776", "\u2768"], ["\u278b", "\u2781", "\u2777", "\u2769"], ["\u278c", "\u2782", "\u2778", "\u276a"], ["\u278d", "\u2783", "\u2779", "\u276b"], ["\u278e", "\u2784", "\u277a", "\u276c"], ["\u278f", "\u2785", "\u277b", "\u276d"], ["\u2790", "\u2786", "\u277c", "\u276e"], ["\u2791", "\u2787", "\u277d", "\u276f"], ["\u2792", "\u2788", "\u277e", "\u2770"], ["\u2793", "\u2789", "\u277f", "\u2771"], ["\u2795", "\u2796", "\u274c", "\u2797"], ["\u2702", "\u2704", "\u2701", "\u2703"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u2714", "\u2705", "\u2713"], ["\u2718", "\u2715", "\u2717", "\u2716"], ["\u271a", "\u2719", "\u271b", "\u271c"], ["\u271d", "\u271e", "\u271f", "\u2720"], ["\u2722", "\u2723", "\u2724", "\u2725"], ["\u2726", "\u2727", "\u2728", "\u2756"], ["\u2729", "\u272a", "\u272d", "\u2730"], ["\u272c", "\u272b", "\u272e", "\u272f"], ["\u2736", "\u2731", "\u2732", "\u2749"], ["\u273b", "\u273c", "\u273d", "\u273e"], ["\u2744", "\u2745", "\u2746", "\u2743"], ["\u2733", "\u2734", "\u2735", "\u2721"], ["\u2737", "\u2738", "\u2739", "\u273a"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u2799", "\u279a", "\u2798", "\u2758"], ["\u27b5", "\u27b6", "\u27b4", "\u2759"], ["\u27b8", "\u27b9", "\u27b7", "\u275a"], ["\u2794", "\u279c", "\u27ba", "\u27bb"], ["\u279d", "\u279e", "\u27a1", "\u2772"], ["\u27a9", "\u27aa", "\u27ab", "\u27ac"], ["\u27a4", "\u27a3", "\u27a2", "\u279b"], ["\u27b3", "\u27bc", "\u27bd", "\u2773"], ["\u27ad", "\u27ae", "\u27af", "\u27b1"], ["\u27a8", "\u27a6", "\u27a5", "\u27a7"], ["\u279f", "\u27a0", "\u27be", "\u27b2"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"],  ["\u270c", "\u270b", "\u270a", "\u270d"], ["\u274f", "\u2750", "\u2751", "\u2752"], ["\u273f", "\u2740", "\u2741", "\u2742"], ["\u2747", "\u2748", "\u274a", "\u274b"], ["\u2757", "\u2755", "\u2762", "\u2763"], ["\u2753", "\u2754", "\u27b0", "\u27bf"], ["\u270f", "\u2710", "\u270e", "\u2774"], ["\u2712", "\u2711", "\u274d", "\u274e"], ["\u2709", "\u2706", "\u2708", "\u2707"], ["\u275b", "\u275d", "\u2761", "\u2775"], ["\u275c", "\u275e", "\u275f", "\u2760"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [["<?php echo $params->get('vki_altlk'); ?>", "<?php echo $params->get('vki_altlk'); ?>"], [" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ]};
<?php } ?>
<?php if (($params->get('keyboard_dv', 1)) OR ($params->get('default_keyboard')=='dv'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_dv_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_dv_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "@"], ["3", "#"], ["4", "$"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", ")"], ["0", "("], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u07ab", "\u00d7"], ["\u07ae", "\u2019"], ["\u07a7", "\u201c"], ["\u07a9", "/"], ["\u07ad", ":"], ["\u078e", "\u07a4"], ["\u0783", "\u079c"], ["\u0789", "\u07a3"], ["\u078c", "\u07a0"], ["\u0780", "\u0799"], ["\u078d", "\u00f7"], ["[", "{"], ["]", "}"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u07a8", "<"], ["\u07aa", ">"], ["\u07b0", ".", ",", ","], ["\u07a6", "\u060c"], ["\u07ac", '"'], ["\u0788", "\u07a5"], ["\u0787", "\u07a2"], ["\u0782", "\u0798"], ["\u0786", "\u079a"], ["\u078a", "\u07a1"], ["\ufdf2", "\u061b", ";", ";"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|"], ["\u0792", "\u0796"], ["\u0791", "\u0795"], ["\u0790", "\u078f"], ["\u0794", "\u0797", "\u200D"], ["\u0785", "\u079f", "\u200C"], ["\u078b", "\u079b", "\u200E"], ["\u0784", "\u079D", "\u200F"], ["\u0781", "\\"], ["\u0793", "\u079e"], ["\u07af", "\u061f"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["dv"] };
<?php } ?>
<?php if (($params->get('keyboard_dk', 1)) OR ($params->get('default_keyboard')=='dk'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_dk_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_dk_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "@"], ["3", "#"], ["4", "$"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["[", "{"], ["]", "}"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["'", '"'], [",", "<"], [".", ">"], ["p", "P"], ["y", "Y"], ["f", "F"], ["g", "G"], ["c", "C"], ["r", "R"], ["l", "L"], ["/", "?"], ["=", "+"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["o", "O"], ["e", "E"], ["u", "U"], ["i", "I"], ["d", "D"], ["h", "H"], ["t", "T"], ["n", "N"], ["s", "S"], ["-", "_"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], [";", ":"], ["q", "Q"], ["j", "J"], ["k", "K"], ["x", "X"], ["b", "B"], ["m", "M"], ["w", "W"], ["v", "V"], ["z", "Z"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ]};
<?php } ?>
<?php if (($params->get('keyboard_el', 1)) OR ($params->get('default_keyboard')=='el'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_el_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_el_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "@", "\u00b2"], ["3", "#", "\u00b3"], ["4", "$", "\u00a3"], ["5", "%", "\u00a7"], ["6", "^", "\u00b6"], ["7", "&"], ["8", "*", "\u00a4"], ["9", "(", "\u00a6"], ["0", ")", "\u00ba"], ["-", "_", "\u00b1"], ["=", "+", "\u00bd"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], [";", ":"], ["\u03c2", "^"], ["\u03b5", "\u0395"], ["\u03c1", "\u03a1"], ["\u03c4", "\u03a4"], ["\u03c5", "\u03a5"], ["\u03b8", "\u0398"], ["\u03b9", "\u0399"], ["\u03bf", "\u039f"], ["\u03c0", "\u03a0"], ["[", "{", "\u201c"], ["]", "}", "\u201d"], ["\\", "|", "\u00ac"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u03b1", "\u0391"], ["\u03c3", "\u03a3"], ["\u03b4", "\u0394"], ["\u03c6", "\u03a6"], ["\u03b3", "\u0393"], ["\u03b7", "\u0397"], ["\u03be", "\u039e"], ["\u03ba", "\u039a"], ["\u03bb", "\u039b"], ["\u0384", "\u00a8", "\u0385"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["\u03b6", "\u0396"], ["\u03c7", "\u03a7"], ["\u03c8", "\u03a8"], ["\u03c9", "\u03a9"], ["\u03b2", "\u0392"], ["\u03bd", "\u039d"], ["\u03bc", "\u039c"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["el"] };
<?php } ?>
<?php if (($params->get('keyboard_et', 1)) OR ($params->get('default_keyboard')=='et'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_et_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_et_name_site'); ?>", 'keys': [
      [["\u02C7", "~"], ["1", "!"], ["2", '"', "@", "@"], ["3", "#", "\u00A3", "\u00A3"], ["4", "\u00A4", "$", "$"], ["5", "%", "\u20AC"], ["6", "&"], ["7", "/", "{", "{"], ["8", "(", "[", "["], ["9", ")", "]", "]"], ["0", "=", "}", "}"], ["+", "?", "\\", "\\"], ["\u00B4", "`"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00FC", "\u00DC"], ["\u00F5", "\u00D5", "\u00A7", "\u00A7"], ["'", "*", "\u00BD", "\u00BD"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S", "\u0161", "\u0160"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00F6", "\u00D6"], ["\u00E4", "\u00C4", "^", "^"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "|", "|"], ["z", "Z", "\u017E", "\u017D"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["et"] };
<?php } ?>
<?php if (($params->get('keyboard_en', 1)) OR ($params->get('default_keyboard')=='en'))
{ ?>
   this.VKI_layout['<?php echo $params->get('keyboard_en_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_en_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!", "\u00a1", "\u00b9"], ["2", "@", "\u00b2"], ["3", "#", "\u00b3"], ["4", "$", "\u00a4", "\u00a3"], ["5", "%", "\u20ac"], ["6", "^", "\u00bc"], ["7", "&", "\u00bd"], ["8", "*", "\u00be"], ["9", "(", "\u2018"], ["0", ")", "\u2019"], ["-", "_", "\u00a5"], ["=", "+", "\u00d7", "\u00f7"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\u00e4", "\u00c4"], ["w", "W", "\u00e5", "\u00c5"], ["e", "E", "\u00e9", "\u00c9"], ["r", "R", "\u00ae"], ["t", "T", "\u00fe", "\u00de"], ["y", "Y", "\u00fc", "\u00dc"], ["u", "U", "\u00fa", "\u00da"], ["i", "I", "\u00ed", "\u00cd"], ["o", "O", "\u00f3", "\u00d3"], ["p", "P", "\u00f6", "\u00d6"], ["[", "{", "\u00ab"], ["]", "}", "\u00bb"], ["\\", "|", "\u00ac", "\u00a6"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u00e1", "\u00c1"], ["s", "S", "\u00df", "\u00a7"], ["d", "D", "\u00f0", "\u00d0"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L", "\u00f8", "\u00d8"], [";", ":", "\u00b6", "\u00b0"], ["'", '"', "\u00b4", "\u00a8"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["z", "Z", "\u00e6", "\u00c6"], ["x", "X"], ["c", "C", "\u00a9", "\u00a2"], ["v", "V"], ["b", "B"], ["n", "N", "\u00f1", "\u00d1"], ["m", "M", "\u00b5"], [",", "<", "\u00e7", "\u00c7"], [".", ">"], ["/", "?", "\u00bf"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["en"] };
<?php } ?>
<?php if (($params->get('keyboard_en-gb', 1)) OR ($params->get('default_keyboard')=='en-gb'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_en-gb_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_en-gb_name_site'); ?>", 'keys': [
      [["`", "\u00ac", "\u00a6"], ["1", "!"], ["2", '"'], ["3", "\u00a3"], ["4", "$", "\u20ac"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u00e9", "\u00c9"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U", "\u00fa", "\u00da"], ["i", "I", "\u00ed", "\u00cd"], ["o", "O", "\u00f3", "\u00d3"], ["p", "P"], ["[", "{"], ["]", "}"], ["#", "~"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u00e1", "\u00c1"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], [";", ":"], ["'", "@"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["en-gb"] };
<?php } ?>
<?php if (($params->get('keyboard_en-us', 1)) OR ($params->get('default_keyboard')=='en-us'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_en-us_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_en-us_name_site'); ?>", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "@"], ["3", "#"], ["4", "$"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], [";", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["en-us"] };
<?php } ?>
<?php if (($params->get('keyboard_es', 1)) OR ($params->get('default_keyboard')=='es'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_es_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_es_name_site'); ?>", 'keys': [
      [["\u00ba", "\u00aa", "\\"], ["1", "!", "|"], ["2", '"', "@"], ["3", "'", "#"], ["4", "$", "~"], ["5", "%", "\u20ac"], ["6", "&", "\u00ac"], ["7", "/"], ["8", "("], ["9", ")"], ["0", "="], ["'", "?"], ["\u00a1", "\u00bf"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["`", "^", "["], ["+", "*", "]"], ["\u00e7", "\u00c7", "}"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00f1", "\u00d1"], ["\u00b4", "\u00a8", "{"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["es"] };
<?php } ?>
<?php if (($params->get('keyboard_fa-AF', 1)) OR ($params->get('default_keyboard')=='fa-AF'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_fa-AF_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_fa-AF_name_site'); ?>", 'keys': [
      [["\u200D", "\u00F7", "~"], ["\u06F1", "!", "`"], ["\u06F2", "\u066C", "@"], ["\u06F3", "\u066B", "#"], ["\u06F4", "\u060B", "$"], ["\u06F5", "\u066A", "%"], ["\u06F6", "\u00D7", "^"], ["\u06F7", "\u060C", "&"], ["\u06F8", "*", "\u2022"], ["\u06F9", ")", "\u200E"], ["\u06F0", "(", "\u200F"], ["-", "\u0640", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0636", "\u0652", "\u00B0"], ["\u0635", "\u064C"], ["\u062B", "\u064D", "\u20AC"], ["\u0642", "\u064B", "\uFD3E"], ["\u0641", "\u064F", "\uFD3F"], ["\u063A", "\u0650", "\u0656"], ["\u0639", "\u064E", "\u0659"], ["\u0647", "\u0651", "\u0655"], ["\u062E", "]", "'"], ["\u062D", "[", '"'], ["\u062C", "}", "\u0681"], ["\u0686", "{", "\u0685"], ["\\", "|", "?"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0634", "\u0624", "\u069A"], ["\u0633", "\u0626", "\u06CD"], ["\u06CC", "\u064A", "\u0649"], ["\u0628", "\u0625", "\u06D0"], ["\u0644", "\u0623", "\u06B7"], ["\u0627", "\u0622", "\u0671"], ["\u062A", "\u0629", "\u067C"], ["\u0646", "\u00BB", "\u06BC"], ["\u0645", "\u00AB", "\u06BA"], ["\u06A9", ":", ";"], ["\u06AF", "\u061B", "\u06AB"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0638", "\u0643", "\u06D2"], ["\u0637", "\u0653", "\u0691"], ["\u0632", "\u0698", "\u0696"], ["\u0631", "\u0670", "\u0693"], ["\u0630", "\u200C", "\u0688"], ["\u062F", "\u0654", "\u0689"], ["\u067E", "\u0621", "\u0679"], ["\u0648", ">", ","], [".", "<", "\u06C7"], ["/", "\u061F", "\u06C9"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["fa-AF"] };
<?php } ?>
<?php if (($params->get('keyboard_fa', 1)) OR ($params->get('default_keyboard')=='fa'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_fa_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_fa_name_site'); ?>", 'keys': [
      [["\u067e", "\u0651 "], ["1", "!", "\u00a1", "\u00b9"], ["2", "@", "\u00b2"], ["3", "#", "\u00b3"], ["4", "$", "\u00a4", "\u00a3"], ["5", "%", "\u20ac"], ["6", "^", "\u00bc"], ["7", "&", "\u00bd"], ["8", "*", "\u00be"], ["9", "(", "\u2018"], ["0", ")", "\u2019"], ["-", "_", "\u00a5"], ["=", "+", "\u00d7", "\u00f7"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0636", "\u064e"], ["\u0635", "\u064b"], ["\u062b", "\u064f"], ["\u0642", "\u064c"], ["\u0641", "\u0644"], ["\u063a", "\u0625"], ["\u0639", "\u2018"], ["\u0647", "\u00f7"], ["\u062e", "\u00d7"], ["\u062d", "\u061b"], ["\u062c", "<"], ["\u0686", ">"], ["\u0698", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0634", "\u0650"], ["\u0633", "\u064d"], ["\u064a", "]"], ["\u0628", "["], ["\u0644", "\u0644"], ["\u0627", "\u0623"], ["\u062a", "\u0640"], ["\u0646", "\u060c"], ["\u0645", "\\"], ["\u06af", ":"], ["\u0643", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0638", "~"], ["\u0637", "\u0652"], ["\u0632", "}"], ["\u0631", "{"], ["\u0630", "\u0644"], ["\u062f", "\u0622"], ["\u0626", "\u0621"], ["\u0648", ","], [".", "."], ["/", "\u061f"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["fa"] };
<?php } ?>
<?php if (($params->get('keyboard_fo', 1)) OR ($params->get('default_keyboard')=='fo'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_fo_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_fo_name_site'); ?>", 'keys': [
      [["\u00BD", "\u00A7"], ["1", "!"], ["2", '"', "@"], ["3", "#", "\u00A3"], ["4", "\u00A4", "$"], ["5", "%", "\u20AC"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["+", "?"], ["\u00B4", "`", "|"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00E5", "\u00C5", "\u00A8"], ["\u00F0", "\u00D0", "~"], ["'", "*"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00E6", "\u00C6"], ["\u00F8", "\u00D8", "^"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "\\"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u00B5"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["fo"] };
<?php } ?>
<?php if (($params->get('keyboard_fr', 1)) OR ($params->get('default_keyboard')=='fr'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_fr_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_fr_name_site'); ?>", 'keys': [
      [["\u00b2", "\u00b3"], ["&", "1"], ["\u00e9", "2", "~"], ['"', "3", "#"], ["'", "4", "{"], ["(", "5", "["], ["-", "6", "|"], ["\u00e8", "7", "`"], ["_", "8", "\\"], ["\u00e7", "9", "^"], ["\u00e0", "0", "@"], [")", "\u00b0", "]"], ["=", "+", "}"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["a", "A"], ["z", "Z"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["^", "\u00a8"], ["$", "\u00a3", "\u00a4"], ["*", "\u03bc"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["q", "Q"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["m", "M"], ["\u00f9", "%"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["w", "W"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], [",", "?"], [";", "."], [":", "/"], ["!", "\u00a7"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["fr"] };
<?php } ?>
<?php if (($params->get('keyboard_ga', 1)) OR ($params->get('default_keyboard')=='ga'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_ga_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_ga_name_site'); ?>", 'keys': [
      [["`", "\u00AC", "\u00A6", "\u00A6"], ["1", "!"], ["2", '"'], ["3", "\u00A3"], ["4", "$", "\u20AC"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u00E9", "\u00C9"], ["r", "R"], ["t", "T"], ["y", "Y", "\u00FD", "\u00DD"], ["u", "U", "\u00FA", "\u00DA"], ["i", "I", "\u00ED", "\u00CD"], ["o", "O", "\u00F3", "\u00D3"], ["p", "P"], ["[", "{"], ["]", "}"], ["#", "~"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u00E1", "\u00C1"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], [";", ":"], ["'", "@", "\u00B4", "`"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["ga", "gd"] };
<?php } ?>
<?php if (($params->get('keyboard_gu', 1)) OR ($params->get('default_keyboard')=='gu'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_gu_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_gu_name_site'); ?>", 'keys': [
      [[""], ["1", "\u0A8D", "\u0AE7"], ["2", "\u0AC5", "\u0AE8"], ["3", "\u0ACD\u0AB0", "\u0AE9"], ["4", "\u0AB0\u0ACD", "\u0AEA"], ["5", "\u0A9C\u0ACD\u0A9E", "\u0AEB"], ["6", "\u0AA4\u0ACD\u0AB0", "\u0AEC"], ["7", "\u0A95\u0ACD\u0AB7", "\u0AED"], ["8", "\u0AB6\u0ACD\u0AB0", "\u0AEE"], ["9", "(", "\u0AEF"], ["0", ")", "\u0AE6"], ["-", "\u0A83"], ["\u0AC3", "\u0A8B", "\u0AC4", "\u0AE0"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0ACC", "\u0A94"], ["\u0AC8", "\u0A90"], ["\u0ABE", "\u0A86"], ["\u0AC0", "\u0A88"], ["\u0AC2", "\u0A8A"], ["\u0AAC", "\u0AAD"], ["\u0AB9", "\u0A99"], ["\u0A97", "\u0A98"], ["\u0AA6", "\u0AA7"], ["\u0A9C", "\u0A9D"], ["\u0AA1", "\u0AA2"], ["\u0ABC", "\u0A9E"], ["\u0AC9", "\u0A91"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0ACB", "\u0A93"], ["\u0AC7", "\u0A8F"], ["\u0ACD", "\u0A85"], ["\u0ABF", "\u0A87"], ["\u0AC1", "\u0A89"], ["\u0AAA", "\u0AAB"], ["\u0AB0"], ["\u0A95", "\u0A96"], ["\u0AA4", "\u0AA5"], ["\u0A9A", "\u0A9B"], ["\u0A9F", "\u0AA0"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], [""], ["\u0A82", "\u0A81", "", "\u0AD0"], ["\u0AAE", "\u0AA3"], ["\u0AA8"], ["\u0AB5"], ["\u0AB2", "\u0AB3"], ["\u0AB8", "\u0AB6"], [",", "\u0AB7"], [".", "\u0964", "\u0965", "\u0ABD"], ["\u0AAF"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["gu"] };
<?php } ?>
<?php if (($params->get('keyboard_he', 1)) OR ($params->get('default_keyboard')=='he'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_he_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_he_name_site'); ?>", 'keys': [
      [["~", "`"], ["1", "!"], ["2", "@"], ["3", "#"], ["4" , "$", "\u20aa"], ["5" , "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", ")"], ["0", "("], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["/", "Q"], ["'", "W"], ["\u05e7", "E", "\u20ac"], ["\u05e8", "R"], ["\u05d0", "T"], ["\u05d8", "Y"], ["\u05d5", "U", "\u05f0"], ["\u05df", "I"], ["\u05dd", "O"], ["\u05e4", "P"], ["\\", "|"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u05e9", "A"], ["\u05d3", "S"], ["\u05d2", "D"], ["\u05db", "F"], ["\u05e2", "G"], ["\u05d9", "H", "\u05f2"], ["\u05d7", "J", "\u05f1"], ["\u05dc", "K"], ["\u05da", "L"], ["\u05e3", ":"], ["," , '"'], ["]", "}"], ["[", "{"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u05d6", "Z"], ["\u05e1", "X"], ["\u05d1", "C"], ["\u05d4", "V"], ["\u05e0", "B"], ["\u05de", "N"], ["\u05e6", "M"], ["\u05ea", ">"], ["\u05e5", "<"], [".", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["he"] };
<?php } ?>
<?php if (($params->get('keyboard_hi-Deva', 1)) OR ($params->get('default_keyboard')=='hi-Deva'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_hi-Deva_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_hi-Deva_name_site'); ?>", 'keys': [
      [["\u094A", "\u0912"], ["1", "\u090D", "\u0967"], ["2", "\u0945", "\u0968"], ["3", "\u094D\u0930", "\u0969"], ["4", "\u0930\u094D", "\u096A"], ["5", "\u091C\u094D\u091E", "\u096B"], ["6", "\u0924\u094D\u0930", "\u096C"], ["7", "\u0915\u094D\u0937", "\u096D"], ["8", "\u0936\u094D\u0930", "\u096E"], ["9", "(", "\u096F"], ["0", ")", "\u0966"], ["-", "\u0903"], ["\u0943", "\u090B", "\u0944", "\u0960"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u094C", "\u0914"], ["\u0948", "\u0910"], ["\u093E", "\u0906"], ["\u0940", "\u0908", "\u0963", "\u0961"], ["\u0942", "\u090A"], ["\u092C", "\u092D"], ["\u0939", "\u0919"], ["\u0917", "\u0918", "\u095A"], ["\u0926", "\u0927"], ["\u091C", "\u091D", "\u095B"], ["\u0921", "\u0922", "\u095C", "\u095D"], ["\u093C", "\u091E"], ["\u0949", "\u0911"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u094B", "\u0913"], ["\u0947", "\u090F"], ["\u094D", "\u0905"], ["\u093F", "\u0907", "\u0962", "\u090C"], ["\u0941", "\u0909"], ["\u092A", "\u092B", "", "\u095E"], ["\u0930", "\u0931"], ["\u0915", "\u0916", "\u0958", "\u0959"], ["\u0924", "\u0925"], ["\u091A", "\u091B", "\u0952"], ["\u091F", "\u0920", "", "\u0951"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0946", "\u090E", "\u0953"], ["\u0902", "\u0901", "", "\u0950"], ["\u092E", "\u0923", "\u0954"], ["\u0928", "\u0929"], ["\u0935", "\u0934"], ["\u0932", "\u0933"], ["\u0938", "\u0936"], [",", "\u0937", "\u0970"], [".", "\u0964", "\u0965", "\u093D"], ["\u092F", "\u095F"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["hi-Deva"] };
<?php } ?>
<?php if (($params->get('keyboard_hi', 1)) OR ($params->get('default_keyboard')=='hi'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_hi_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_hi_name_site'); ?>", 'keys': [
      [["\u200d", "\u200c", "`", "~"], ["1", "\u090D", "\u0967", "!"], ["2", "\u0945", "\u0968", "@"], ["3", "\u094D\u0930", "\u0969", "#"], ["4", "\u0930\u094D", "\u096A", "$"], ["5", "\u091C\u094D\u091E", "\u096B", "%"], ["6", "\u0924\u094D\u0930", "\u096C", "^"], ["7", "\u0915\u094D\u0937", "\u096D", "&"], ["8", "\u0936\u094D\u0930", "\u096E", "*"], ["9", "(", "\u096F", "("], ["0", ")", "\u0966", ")"], ["-", "\u0903", "-", "_"], ["\u0943", "\u090B", "=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u094C", "\u0914"], ["\u0948", "\u0910"], ["\u093E", "\u0906"], ["\u0940", "\u0908"], ["\u0942", "\u090A"], ["\u092C", "\u092D"], ["\u0939", "\u0919"], ["\u0917", "\u0918"], ["\u0926", "\u0927"], ["\u091C", "\u091D"], ["\u0921", "\u0922", "[", "{"], ["\u093C", "\u091E", "]", "}"], ["\u0949", "\u0911", "\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u094B", "\u0913"], ["\u0947", "\u090F"], ["\u094D", "\u0905"], ["\u093F", "\u0907"], ["\u0941", "\u0909"], ["\u092A", "\u092B"], ["\u0930", "\u0931"], ["\u0915", "\u0916"], ["\u0924", "\u0925"], ["\u091A", "\u091B", ";", ":"], ["\u091F", "\u0920", "'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], [""], ["\u0902", "\u0901", "", "\u0950"], ["\u092E", "\u0923"], ["\u0928"], ["\u0935"], ["\u0932", "\u0933"], ["\u0938", "\u0936"], [",", "\u0937", ",", "<"], [".", "\u0964", ".", ">"], ["\u092F", "\u095F", "/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["hi"] };
<?php } ?>
<?php if (($params->get('keyboard_hy-arevmda', 1)) OR ($params->get('default_keyboard')=='hy-arevmda'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_hy-arevmda_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_hy-arevmda_name_site'); ?>", 'keys': [
      [["\u055D", "\u055C"], [":", "1"], ["\u0571", "\u0541"], ["\u0575", "\u0545"], ["\u055B", "3"], [",", "4"], ["-", "9"], [".", "\u0587"], ["\u00AB", "("], ["\u00BB", ")"], ["\u0585", "\u0555"], ["\u057C", "\u054C"], ["\u056A", "\u053A"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u056D", "\u053D"], ["\u057E", "\u054E"], ["\u0567", "\u0537"], ["\u0580", "\u0550"], ["\u0564", "\u0534"], ["\u0565", "\u0535"], ["\u0568", "\u0538"], ["\u056B", "\u053B"], ["\u0578", "\u0548"], ["\u0562", "\u0532"], ["\u0579", "\u0549"], ["\u057B", "\u054B"], ["'", "\u055E"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0561", "\u0531"], ["\u057D", "\u054D"], ["\u057F", "\u054F"], ["\u0586", "\u0556"], ["\u056F", "\u053F"], ["\u0570", "\u0540"], ["\u0573", "\u0543"], ["\u0584", "\u0554"], ["\u056C", "\u053C"], ["\u0569", "\u0539"], ["\u0583", "\u0553"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0566", "\u0536"], ["\u0581", "\u0551"], ["\u0563", "\u0533"], ["\u0582", "\u0552"], ["\u057A", "\u054A"], ["\u0576", "\u0546"], ["\u0574", "\u0544"], ["\u0577", "\u0547"], ["\u0572", "\u0542"], ["\u056E", "\u053E"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["hy-arevmda"] };
<?php } ?>
<?php if (($params->get('keyboard_hy', 1)) OR ($params->get('default_keyboard')=='hy'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_hy_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_hy_name_site'); ?>", 'keys': [
      [["\u055D", "\u055C"], [":", "1"], ["\u0571", "\u0541"], ["\u0575", "\u0545"], ["\u055B", "3"], [",", "4"], ["-", "9"], [".", "\u0587"], ["\u00AB", "("], ["\u00BB", ")"], ["\u0585", "\u0555"], ["\u057C", "\u054C"], ["\u056A", "\u053A"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u056D", "\u053D"], ["\u0582", "\u0552"], ["\u0567", "\u0537"], ["\u0580", "\u0550"], ["\u057F", "\u054F"], ["\u0565", "\u0535"], ["\u0568", "\u0538"], ["\u056B", "\u053B"], ["\u0578", "\u0548"], ["\u057A", "\u054A"], ["\u0579", "\u0549"], ["\u057B", "\u054B"], ["'", "\u055E"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0561", "\u0531"], ["\u057D", "\u054D"], ["\u0564", "\u0534"], ["\u0586", "\u0556"], ["\u0584", "\u0554"], ["\u0570", "\u0540"], ["\u0573", "\u0543"], ["\u056F", "\u053F"], ["\u056C", "\u053C"], ["\u0569", "\u0539"], ["\u0583", "\u0553"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0566", "\u0536"], ["\u0581", "\u0551"], ["\u0563", "\u0533"], ["\u057E", "\u054E"], ["\u0562", "\u0532"], ["\u0576", "\u0546"], ["\u0574", "\u0544"], ["\u0577", "\u0547"], ["\u0572", "\u0542"], ["\u056E", "\u053E"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["hy"] };
<?php } ?>
<?php if (($params->get('keyboard_is', 1)) OR ($params->get('default_keyboard')=='is'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_is_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_is_name_site'); ?>", 'keys': [
      [["\u00B0", "\u00A8", "\u00B0"], ["1", "!"], ["2", '"'], ["3", "#"], ["4", "$"], ["5", "%", "\u20AC"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["\u00F6", "\u00D6", "\\"], ["-", "_"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "@"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00F0", "\u00D0"], ["'", "?", "~"], ["+", "*", "`"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00E6", "\u00C6"], ["\u00B4", "'", "^"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "|"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u00B5"], [",", ";"], [".", ":"], ["\u00FE", "\u00DE"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["is"] };
<?php } ?>
<?php if (($params->get('keyboard_it', 1)) OR ($params->get('default_keyboard')=='it'))
{ ?>
  this.VKI_layout['<?php echo $params->get('keyboard_it_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_it_name_site'); ?>", 'keys': [
      [["\\", "|"], ["1", "!"], ["2", '"'], ["3", "\u00a3"], ["4", "$", "\u20ac"], ["5", "%"], ["6", "&"], ["7", "/"], ["8", "("], ["9", ")"], ["0", "="], ["'", "?"], ["\u00ec", "^"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00e8", "\u00e9", "[", "{"], ["+", "*", "]", "}"], ["\u00f9", "\u00a7"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00f2", "\u00e7", "@"], ["\u00e0", "\u00b0", "#"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["it"] };
<?php } ?>

  this.VKI_layout['\u65e5\u672c\u8a9e'] = {
    'name': "Japanese Hiragana/Katakana", 'keys': [
      [["\uff5e"], ["\u306c", "\u30cc"], ["\u3075", '\u30d5'], ["\u3042", "\u30a2", "\u3041", "\u30a1"], ["\u3046", "\u30a6", "\u3045", "\u30a5"], ["\u3048", "\u30a8", "\u3047", "\u30a7"], ["\u304a", "\u30aa", "\u3049", "\u30a9"], ["\u3084", "\u30e4", "\u3083", "\u30e3"], ["\u3086", "\u30e6", "\u3085", "\u30e5"], ["\u3088", "\u30e8", "\u3087", "\u30e7"], ["\u308f", "\u30ef", "\u3092", "\u30f2"], ["\u307b", "\u30db", "\u30fc", "\uff1d"], ["\u3078", "\u30d8" , "\uff3e", "\uff5e"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u305f", "\u30bf"], ["\u3066", "\u30c6"], ["\u3044", "\u30a4", "\u3043", "\u30a3"], ["\u3059", "\u30b9"], ["\u304b", "\u30ab"], ["\u3093", "\u30f3"], ["\u306a", "\u30ca"], ["\u306b", "\u30cb"], ["\u3089", "\u30e9"], ["\u305b", "\u30bb"], ["\u3001", "\u3001", "\uff20", "\u2018"], ["\u3002", "\u3002", "\u300c", "\uff5b"], ["\uffe5", "", "", "\uff0a"], ['\u309B', '"', "\uffe5", "\uff5c"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u3061", "\u30c1"], ["\u3068", "\u30c8"], ["\u3057", "\u30b7"], ["\u306f", "\u30cf"], ["\u304d", "\u30ad"], ["\u304f", "\u30af"], ["\u307e", "\u30de"], ["\u306e", "\u30ce"], ["\u308c", "\u30ec", "\uff1b", "\uff0b"], ["\u3051", "\u30b1", "\uff1a", "\u30f6"], ["\u3080", "\u30e0", "\u300d", "\uff5d"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u3064", "\u30c4"], ["\u3055", "\u30b5"], ["\u305d", "\u30bd"], ["\u3072", "\u30d2"], ["\u3053", "\u30b3"], ["\u307f", "\u30df"], ["\u3082", "\u30e2"], ["\u306d", "\u30cd", "\u3001", "\uff1c"], ["\u308b", "\u30eb", "\u3002", "\uff1e"], ["\u3081", "\u30e1", "\u30fb", "\uff1f"], ["\u308d", "\u30ed", "", "\uff3f"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [["<?php echo $params->get('vki_altlk'); ?>", "<?php echo $params->get('vki_altlk'); ?>"], [" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["ja"] };

  this.VKI_layout['\u10e5\u10d0\u10e0\u10d7\u10e3\u10da\u10d8'] = {
    'name': "Georgian", 'keys': [
      [["\u201E", "\u201C"], ["!", "1"], ["?", "2"], ["\u2116", "3"], ["\u00A7", "4"], ["%", "5"], [":", "6"], [".", "7"], [";", "8"], [",", "9"], ["/", "0"], ["\u2013", "-"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u10E6", "\u10E6"], ["\u10EF", "\u10EF"], ["\u10E3", "\u10E3"], ["\u10D9", "\u10D9"], ["\u10D4", "\u10D4", "\u10F1"], ["\u10DC", "\u10DC"], ["\u10D2", "\u10D2"], ["\u10E8", "\u10E8"], ["\u10EC", "\u10EC"], ["\u10D6", "\u10D6"], ["\u10EE", "\u10EE", "\u10F4"], ["\u10EA", "\u10EA"], ["(", ")"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u10E4", "\u10E4", "\u10F6"], ["\u10EB", "\u10EB"], ["\u10D5", "\u10D5", "\u10F3"], ["\u10D7", "\u10D7"], ["\u10D0", "\u10D0"], ["\u10DE", "\u10DE"], ["\u10E0", "\u10E0"], ["\u10DD", "\u10DD"], ["\u10DA", "\u10DA"], ["\u10D3", "\u10D3"], ["\u10DF", "\u10DF"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u10ED", "\u10ED"], ["\u10E9", "\u10E9"], ["\u10E7", "\u10E7"], ["\u10E1", "\u10E1"], ["\u10DB", "\u10DB"], ["\u10D8", "\u10D8", "\u10F2"], ["\u10E2", "\u10E2"], ["\u10E5", "\u10E5"], ["\u10D1", "\u10D1"], ["\u10F0", "\u10F0", "\u10F5"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["ka"] };

  this.VKI_layout['\u049a\u0430\u0437\u0430\u049b\u0448\u0430'] = {
    'name': "Kazakh", 'keys': [
      [["(", ")"], ['"', "!"], ["\u04d9", "\u04d8"], ["\u0456", "\u0406"], ["\u04a3", "\u04a2"], ["\u0493", "\u0492"], [",", ";"], [".", ":"], ["\u04af", "\u04ae"], ["\u04b1", "\u04b0"], ["\u049b", "\u049a"], ["\u04e9", "\u04e8"], ["\u04bb", "\u04ba"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0439", "\u0419"], ["\u0446", "\u0426"], ["\u0443", "\u0423"], ["\u043A", "\u041A"], ["\u0435", "\u0415"], ["\u043D", "\u041D"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u0449", "\u0429"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["\u044A", "\u042A"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u044B", "\u042B"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043F", "\u041F"], ["\u0440", "\u0420"], ["\u043E", "\u041E"], ["\u043B", "\u041B"], ["\u0434", "\u0414"], ["\u0436", "\u0416"], ["\u044D", "\u042D"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|"], ["\u044F", "\u042F"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043C", "\u041C"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u044C", "\u042C"], ["\u0431", "\u0411"], ["\u044E", "\u042E"], ["\u2116", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["kk"] };

  this.VKI_layout['\u1797\u17b6\u179f\u17b6\u1781\u17d2\u1798\u17c2\u179a'] = {
    'name': "Khmer", 'keys': [
      [["\u00AB", "\u00BB","\u200D"], ["\u17E1", "!","\u200C","\u17F1"], ["\u17E2", "\u17D7", "@", "\u17F2"], ["\u17E3", '"', "\u17D1", "\u17F3"], ["\u17E4", "\u17DB", "$", "\u17F4"], ["\u17E5", "%" ,"\u20AC", "\u17F5"], ["\u17E6", "\u17CD", "\u17D9", "\u17F6"], ["\u17E7", "\u17D0", "\u17DA", "\u17F7"], ["\u17E8", "\u17CF", "*", "\u17F8"], ["\u17E9", "(", "{", "\u17F9"], ["\u17E0", ")", "}", "\u17F0"], ["\u17A5", "\u17CC", "x"], ["\u17B2", "=", "\u17CE"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u1786", "\u1788", "\u17DC", "\u19E0"], ["\u17B9", "\u17BA", "\u17DD", "\u19E1"], ["\u17C1", "\u17C2", "\u17AF", "\u19E2"], ["\u179A", "\u17AC", "\u17AB", "\u19E3"], ["\u178F", "\u1791", "\u17A8", "\u19E4"], ["\u1799", "\u17BD", "\u1799\u17BE\u1784", "\u19E5"], ["\u17BB", "\u17BC", "", "\u19E6"], ["\u17B7", "\u17B8", "\u17A6", "\u19E7"], ["\u17C4", "\u17C5", "\u17B1", "\u19E8"], ["\u1795", "\u1797", "\u17B0", "\u19E9"], ["\u17C0", "\u17BF", "\u17A9", "\u19EA"], ["\u17AA", "\u17A7", "\u17B3", "\u19EB"], ["\u17AE", "\u17AD", "\\"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u17B6", "\u17B6\u17C6", "\u17B5", "\u19EC"], ["\u179F", "\u17C3", "", "\u19ED"], ["\u178A", "\u178C", "\u17D3", "\u19EE"], ["\u1790", "\u1792", "", "\u19EF"], ["\u1784", "\u17A2", "\u17A4", "\u19F0"], ["\u17A0", "\u17C7", "\u17A3", "\u19F1"], ["\u17D2", "\u1789", "\u17B4", "\u19F2"], ["\u1780", "\u1782", "\u179D", "\u19F3"], ["\u179B", "\u17A1", "\u17D8", "\u19F4"], ["\u17BE", "\u17C4\u17C7", "\u17D6", "\u19F5"], ["\u17CB", "\u17C9", "\u17C8", "\u19F6"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u178B", "\u178D", "|", "\u19F7"], ["\u1781", "\u1783", "\u1781\u17D2\u1789\u17BB\u17C6", "\u19F8"], ["\u1785", "\u1787", "-", "\u19F9"], ["\u179C", "\u17C1\u17C7", "+", "\u19FA"], ["\u1794", "\u1796", "\u179E", "\u19FB"], ["\u1793", "\u178E", "[", "\u19FC"], ["\u1798", "\u17C6", "]", "\u19FD"], ["\u17BB\u17C6", "\u17BB\u17C7", ",", "\u19FE"], ["\u17D4", "\u17D5", ".", "\u19FF"], ["\u17CA", "?", "/"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [["\u200B", " ", "\u00A0", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["km"] };

  this.VKI_layout['\u0c95\u0ca8\u0ccd\u0ca8\u0ca1'] = {
    'name': "Kannada", 'keys': [
      [["\u0CCA", "\u0C92"], ["1", "", "\u0CE7"], ["2", "", "\u0CE8"], ["3", "\u0CCD\u0CB0", "\u0CE9"], ["4", "\u0CB0\u0CCD", "\u0CEA"], ["5", "\u0C9C\u0CCD\u0C9E", "\u0CEB"], ["6", "\u0CA4\u0CCD\u0CB0", "\u0CEC"], ["7", "\u0C95\u0CCD\u0CB7", "\u0CED"], ["8", "\u0CB6\u0CCD\u0CB0", "\u0CEE"], ["9", "(", "\u0CEF"], ["0", ")", "\u0CE6"], ["-", "\u0C83"], ["\u0CC3", "\u0C8B", "\u0CC4", "\u0CE0"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0CCC", "\u0C94"], ["\u0CC8", "\u0C90", "\u0CD6"], ["\u0CBE", "\u0C86"], ["\u0CC0", "\u0C88", "", "\u0CE1"], ["\u0CC2", "\u0C8A"], ["\u0CAC", "\u0CAD"], ["\u0CB9", "\u0C99"], ["\u0C97", "\u0C98"], ["\u0CA6", "\u0CA7"], ["\u0C9C", "\u0C9D"], ["\u0CA1", "\u0CA2"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0CCB", "\u0C93"], ["\u0CC7", "\u0C8F", "\u0CD5"], ["\u0CCD", "\u0C85"], ["\u0CBF", "\u0C87", "", "\u0C8C"], ["\u0CC1", "\u0C89"], ["\u0CAA", "\u0CAB", "", "\u0CDE"], ["\u0CB0", "\u0CB1"], ["\u0C95", "\u0C96"], ["\u0CA4", "\u0CA5"], ["\u0C9A", "\u0C9B"], ["\u0C9F", "\u0CA0"], ["", "\u0C9E"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0CC6", "\u0C8F"], ["\u0C82"], ["\u0CAE", "\u0CA3"], ["\u0CA8"], ["\u0CB5"], ["\u0CB2", "\u0CB3"], ["\u0CB8", "\u0CB6"], [",", "\u0CB7"], [".", "|"], ["\u0CAF"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["kn"] };

  this.VKI_layout['\ud55c\uad6d\uc5b4'] = {
    'name': "Korean", 'keys': [
      [["`", "~", "`", "~"], ["1", "!", "1", "!"], ["2", "@", "2", "@"], ["3", "#", "3", "#"], ["4", "$", "4", "$"], ["5", "%", "5", "%"], ["6", "^", "6", "^"], ["7", "&", "7", "&"], ["8", "*", "8", "*"], ["9", ")", "9", ")"], ["0", "(", "0", "("], ["-", "_", "-", "_"], ["=", "+", "=", "+"], ["\u20A9", "|", "\u20A9", "|"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u1107", "\u1108", "q", "Q"], ["\u110C", "\u110D", "w", "W"], ["\u1103", "\u1104", "e", "E"], ["\u1100", "\u1101", "r", "R"], ["\u1109", "\u110A", "t", "T"], ["\u116D", "", "y", "Y"], ["\u1167", "", "u", "U"], ["\u1163", "", "i", "I"], ["\u1162", "\u1164", "o", "O"], ["\u1166", "\u1168", "p", "P"], ["[", "{", "[", "{"], ["]", "}", "]", "}"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u1106", "", "a", "A"], ["\u1102", "", "s", "S"], ["\u110B", "", "d", "D"], ["\u1105", "", "f", "F"], ["\u1112", "", "g", "G"], ["\u1169", "", "h", "H"], ["\u1165", "", "j", "J"], ["\u1161", "", "k", "K"], ["\u1175", "", "l", "L"], [";", ":", ";", ":"], ["'", '"', "'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u110F", "", "z", "Z"], ["\u1110", "", "x", "X"], ["\u110E", "", "c", "C"], ["\u1111", "", "v", "V"], ["\u1172", "", "b", "B"], ["\u116E", "", "n", "N"], ["\u1173", "", "m", "M"], [",", "<", ",", "<"], [".", ">", ".", ">"], ["/", "?", "/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["Kor", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["ko"] };

  this.VKI_layout['Kurd\u00ee'] = {
    'name': "Kurdish", 'keys': [
      [["\u20ac", "~"], ["\u0661", "!"], ["\u0662", "@"], ["\u0663", "#"], ["\u0664", "$"], ["\u0665", "%"], ["\u0666", "^"], ["\u0667", "&"], ["\u0668", "*"], ["\u0669", "("], ["\u0660", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0642", "`"], ["\u0648", "\u0648\u0648"], ["\u06d5", "\u064a"], ["\u0631", "\u0695"], ["\u062a", "\u0637"], ["\u06cc", "\u06ce"], ["\u0626", "\u0621"], ["\u062d", "\u0639"], ["\u06c6", "\u0624"], ["\u067e", "\u062b"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0627", "\u0622"], ["\u0633", "\u0634"], ["\u062f", "\u0630"], ["\u0641", "\u0625"], ["\u06af", "\u063a"], ["\u0647", "\u200c"], ["\u0698", "\u0623"], ["\u06a9", "\u0643"], ["\u0644", "\u06b5"], ["\u061b", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0632", "\u0636"], ["\u062e", "\u0635"], ["\u062c", "\u0686"], ["\u06a4", "\u0638"], ["\u0628", "\u0649"], ["\u0646", "\u0629"], ["\u0645", "\u0640"], ["\u060c", "<"], [".", ">"], ["/", "\u061f"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["ku"] };

  this.VKI_layout['\u041a\u044b\u0440\u0433\u044b\u0437\u0447\u0430'] = {
    'name': "Kyrgyz", 'keys': [
      [["\u0451", "\u0401"], ["1", "!"], ["2", '"'], ["3", "\u2116"], ["4", ";"], ["5", "%"], ["6", ":"], ["7", "?"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0439", "\u0419"], ["\u0446", "\u0426"], ["\u0443", "\u0423", "\u04AF", "\u04AE"], ["\u043A", "\u041A"], ["\u0435", "\u0415"], ["\u043D", "\u041D", "\u04A3", "\u04A2"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u0449", "\u0429"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["\u044A", "\u042A"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u044B", "\u042B"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043F", "\u041F"], ["\u0440", "\u0420"], ["\u043E", "\u041E", "\u04E9", "\u04E8"], ["\u043B", "\u041B"], ["\u0434", "\u0414"], ["\u0436", "\u0416"], ["\u044D", "\u042D"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u044F", "\u042F"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043C", "\u041C"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u044C", "\u042C"], ["\u0431", "\u0411"], ["\u044E", "\u042E"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["ky"] };

  this.VKI_layout['Latvie\u0161u'] = {
    'name': "Latvian", 'keys': [
      [["\u00AD", "?"], ["1", "!", "\u00AB"], ["2", "\u00AB", "", "@"], ["3", "\u00BB", "", "#"], ["4", "$", "\u20AC", "$"], ["5", "%", '"', "~"], ["6", "/", "\u2019", "^"], ["7", "&", "", "\u00B1"], ["8", "\u00D7", ":"], ["9", "("], ["0", ")"], ["-", "_", "\u2013", "\u2014"], ["f", "F", "=", ";"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u016B", "\u016A", "q", "Q"], ["g", "G", "\u0123", "\u0122"], ["j", "J"], ["r", "R", "\u0157", "\u0156"], ["m", "M", "w", "W"], ["v", "V", "y", "Y"], ["n", "N"], ["z", "Z"], ["\u0113", "\u0112"], ["\u010D", "\u010C"], ["\u017E", "\u017D", "[", "{"], ["h", "H", "]", "}"], ["\u0137", "\u0136"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0161", "\u0160"], ["u", "U"], ["s", "S"], ["i", "I"], ["l", "L"], ["d", "D"], ["a", "A"], ["t", "T"], ["e", "E", "\u20AC"], ["c", "C"], ["\u00B4", "\u00B0", "\u00B4", "\u00A8"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0146", "\u0145"], ["b", "B", "x", "X"], ["\u012B", "\u012A"], ["k", "K", "\u0137", "\u0136"], ["p", "P"], ["o", "O", "\u00F5", "\u00D5"], ["\u0101", "\u0100"], [",", ";", "<"], [".", ":", ">"], ["\u013C", "\u013B"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["lv"] };

  this.VKI_layout['Lietuvi\u0173'] = {
    'name': "Lithuanian", 'keys': [
      [["`", "~"], ["\u0105", "\u0104"], ["\u010D", "\u010C"], ["\u0119", "\u0118"], ["\u0117", "\u0116"], ["\u012F", "\u012E"], ["\u0161", "\u0160"], ["\u0173", "\u0172"], ["\u016B", "\u016A"], ["\u201E", "("], ["\u201C", ")"], ["-", "_"], ["\u017E", "\u017D"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], [";", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u2013", "\u20AC"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["lt"] };

  this.VKI_layout['Magyar'] = {
    'name': "Hungarian", 'keys': [
      [["0", "\u00a7"], ["1", "'", "~"], ["2", '"', "\u02c7"], ["3", "+", "\u02c6"], ["4", "!", "\u02d8"], ["5", "%", "\u00b0"], ["6", "/", "\u02db"], ["7", "=", "`"], ["8", "(", "\u02d9"], ["9", ")", "\u00b4"], ["\u00f6", "\u00d6", "\u02dd"], ["\u00fc", "\u00dc", "\u00a8"], ["\u00f3", "\u00d3", "\u00b8"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\\"], ["w", "W", "|"], ["e", "E", "\u00c4"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U", "\u20ac"], ["i", "I", "\u00cd"], ["o", "O"], ["p", "P"], ["\u0151", "\u0150", "\u00f7"], ["\u00fa", "\u00da", "\u00d7"], ["\u0171", "\u0170", "\u00a4"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u00e4"], ["s", "S", "\u0111"], ["d", "D", "\u0110"], ["f", "F", "["], ["g", "G", "]"], ["h", "H"], ["j", "J", "\u00ed"], ["k", "K", "\u0141"], ["l", "L", "\u0142"], ["\u00e9", "\u00c9", "$"], ["\u00e1", "\u00c1", "\u00df"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u00ed", "\u00cd", "<"], ["y", "Y", ">"], ["x", "X", "#"], ["c", "C", "&"], ["v", "V", "@"], ["b", "B", "{"], ["n", "N", "}"], ["m", "M", "<"], [",", "?", ";"], [".", ":", ">"], ["-", "_", "*"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["hu"] };

  this.VKI_layout['Malti'] = {
    'name': "Maltese 48", 'keys': [
      [["\u010B", "\u010A", "`"], ["1", "!"], ["2", '"'], ["3", "\u20ac", "\u00A3"], ["4", "$"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u00E8", "\u00C8"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U", "\u00F9", "\u00D9"], ["i", "I", "\u00EC", "\u00cc"], ["o", "O", "\u00F2", "\u00D2"], ["p", "P"], ["\u0121", "\u0120", "[", "{"], ["\u0127", "\u0126", "]", "}"], ["#", "\u017e"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u00E0", "\u00C0"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], [";", ":"], ["'", "@"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u017c", "\u017b", "\\", "|"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "<"], [".", ">"], ["/", "?", "", "`"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["mt"] };

  this.VKI_layout['\u041c\u0430\u043a\u0435\u0434\u043e\u043d\u0441\u043a\u0438'] = {
    'name': "Macedonian", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "\u201E"], ["3", "\u201C"], ["4", "\u2019"], ["5", "%"], ["6", "\u2018"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0459", "\u0409"], ["\u045A", "\u040A"], ["\u0435", "\u0415", "\u20AC"], ["\u0440", "\u0420"], ["\u0442", "\u0422"], ["\u0455", "\u0405"], ["\u0443", "\u0423"], ["\u0438", "\u0418"], ["\u043E", "\u041E"], ["\u043F", "\u041F"], ["\u0448", "\u0428", "\u0402"], ["\u0453", "\u0403", "\u0452"], ["\u0436", "\u0416"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0430", "\u0410"], ["\u0441", "\u0421"], ["\u0434", "\u0414"], ["\u0444", "\u0424", "["], ["\u0433", "\u0413", "]"], ["\u0445", "\u0425"], ["\u0458", "\u0408"], ["\u043A", "\u041A"], ["\u043B", "\u041B"], ["\u0447", "\u0427", "\u040B"], ["\u045C", "\u040C", "\u045B"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0451", "\u0401"], ["\u0437", "\u0417"], ["\u045F", "\u040F"], ["\u0446", "\u0426"], ["\u0432", "\u0412", "@"], ["\u0431", "\u0411", "{"], ["\u043D", "\u041D", "}"], ["\u043C", "\u041C", "\u00A7"], [",", ";"], [".", ":"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["mk"] };

  this.VKI_layout['\u0d2e\u0d32\u0d2f\u0d3e\u0d33\u0d02'] = {
    'name': "Malayalam", 'keys': [
      [["\u0D4A", "\u0D12"], ["1", "", "\u0D67"], ["2", "", "\u0D68"], ["3", "\u0D4D\u0D30", "\u0D69"], ["4", "", "\u0D6A"], ["5", "", "\u0D6B"], ["6", "", "\u0D6C"], ["7", "\u0D15\u0D4D\u0D37", "\u0D6D"], ["8", "", "\u0D6E"], ["9", "(", "\u0D6F"], ["0", ")", "\u0D66"], ["-", "\u0D03"], ["\u0D43", "\u0D0B", "", "\u0D60"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0D4C", "\u0D14", "\u0D57"], ["\u0D48", "\u0D10"], ["\u0D3E", "\u0D06"], ["\u0D40", "\u0D08", "", "\u0D61"], ["\u0D42", "\u0D0A"], ["\u0D2C", "\u0D2D"], ["\u0D39", "\u0D19"], ["\u0D17", "\u0D18"], ["\u0D26", "\u0D27"], ["\u0D1C", "\u0D1D"], ["\u0D21", "\u0D22"], ["", "\u0D1E"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0D4B", "\u0D13"], ["\u0D47", "\u0D0F"], ["\u0D4D", "\u0D05", "", "\u0D0C"], ["\u0D3F", "\u0D07"], ["\u0D41", "\u0D09"], ["\u0D2A", "\u0D2B"], ["\u0D30", "\u0D31"], ["\u0D15", "\u0D16"], ["\u0D24", "\u0D25"], ["\u0D1A", "\u0D1B"], ["\u0D1F", "\u0D20"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0D46", "\u0D0F"], ["\u0D02"], ["\u0D2E", "\u0D23"], ["\u0D28"], ["\u0D35", "\u0D34"], ["\u0D32", "\u0D33"], ["\u0D38", "\u0D36"], [",", "\u0D37"], ["."], ["\u0D2F"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["ml"] };

  this.VKI_layout['Misc. Symbols'] = {
    'name': "Misc. Symbols", 'keys': [
      [["\u2605", "\u2606", "\u260e", "\u260f"], ["\u2648", "\u2673", "\u2659", "\u2630"], ["\u2649", "\u2674", "\u2658", "\u2631"], ["\u264a", "\u2675", "\u2657", "\u2632"], ["\u264b", "\u2676", "\u2656", "\u2633"], ["\u264c", "\u2677", "\u2655", "\u2634"], ["\u264d", "\u2678", "\u2654", "\u2635"], ["\u264e", "\u2679", "\u265f", "\u2636"], ["\u264f", "\u267a", "\u265e", "\u2637"], ["\u2650", "\u267b", "\u265d", "\u2686"], ["\u2651", "\u267c", "\u265c", "\u2687"], ["\u2652", "\u267d", "\u265b", "\u2688"], ["\u2653", "\u2672", "\u265a", "\u2689"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["\u263f", "\u2680", "\u268a", "\u26a2"], ["\u2640", "\u2681", "\u268b", "\u26a3"], ["\u2641", "\u2682", "\u268c", "\u26a4"], ["\u2642", "\u2683", "\u268d", "\u26a5"], ["\u2643", "\u2684", "\u268e", "\u26a6"], ["\u2644", "\u2685", "\u268f", "\u26a7"], ["\u2645", "\u2620", "\u26ff", "\u26a8"], ["\u2646", "\u2622", "\u2692", "\u26a9"], ["\u2647", "\u2623", "\u2693", "\u26b2"], ["\u2669", "\u266d", "\u2694", "\u26ac"], ["\u266a", "\u266e", "\u2695", "\u26ad"], ["\u266b", "\u266f", "\u2696", "\u26ae"], ["\u266c", "\u2607", "\u2697", "\u26af"], ["\u26f9", "\u2608", "\u2698", "\u26b0"], ["\u267f", "\u262e", "\u2638", "\u2609"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u261e", "\u261c", "\u261d", "\u261f"], ["\u261b", "\u261a", "\u2618", "\u2619"], ["\u2602", "\u2614", "\u26f1", "\u26d9"], ["\u2615", "\u2668", "\u26fe", "\u26d8"], ["\u263a", "\u2639", "\u263b", "\u26dc"], ["\u2617", "\u2616", "\u26ca", "\u26c9"], ["\u2660", "\u2663", "\u2665", "\u2666"], ["\u2664", "\u2667", "\u2661", "\u2662"], ["\u26c2", "\u26c0", "\u26c3", "\u26c1"], ["\u2624", "\u2625", "\u269a", "\u26b1"], ["\u2610", "\u2611", "\u2612", "\u2613"], ["\u2628", "\u2626", "\u2627", "\u2629"], ["\u262a", "\u262b", "\u262c", "\u262d"], ["\u26fa", "\u26fb", "\u26fc", "\u26fd"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u262f", "\u2670", "\u2671", "\u267e"], ["\u263c", "\u2699", "\u263d", "\u263e"], ["\u26c4", "\u2603", "\u26c7", "\u26c6"], ["\u26a0", "\u26a1", "\u2621", "\u26d4"], ["\u26e4", "\u26e5", "\u26e6", "\u26e7"], ["\u260a", "\u260b", "\u260c", "\u260d"], ["\u269c", "\u269b", "\u269d", "\u2604"], ["\u26b3", "\u26b4", "\u26b5", "\u26b6"], ["\u26b7", "\u26bf", "\u26b8", "\u26f8"], ["\u26b9", "\u26ba", "\u26bb", "\u26bc"], ["\u26bd", "\u26be", "\u269f", "\u269e"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u2600", "\u2601", "\u26c5", "\u26c8"], ["\u2691", "\u2690", "\u26ab", "\u26aa"], ["\u26cb", "\u26cc", "\u26cd", "\u26ce"], ["\u26cf", "\u26d0", "\u26d1", "\u26d2"], ["\u26d3", "\u26d5", "\u26d6", "\u26d7"], ["\u26da", "\u26db", "\u26dd", "\u26de"], ["\u26df", "\u26e0", "\u26e1", "\u26e2"], ["\u26e3", "\u26e8", "\u26e9", "\u26ea"], ["\u26eb", "\u26ec", "\u26ed", "\u26ee"], ["\u26ef", "\u26f0", "\u26f2", "\u26f3"], ["\u26f4", "\u26f5", "\u26f6", "\u26f7"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [["<?php echo $params->get('vki_altlk'); ?>", "<?php echo $params->get('vki_altlk'); ?>"], [" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ]};

  this.VKI_layout['\u041c\u043e\u043d\u0433\u043e\u043b'] = {
    'name': "Mongolian Cyrillic", 'keys': [
      [["=", "+"], ["\u2116", "1"], ["-", "2"], ['"', "3"], ["\u20AE", "4"], [":", "5"], [".", "6"], ["_", "7"], [",", "8"], ["%", "9"], ["?", "0"], ["\u0435", "\u0415"], ["\u0449", "\u0429"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0444", "\u0424"], ["\u0446", "\u0426"], ["\u0443", "\u0423"], ["\u0436", "\u0416"], ["\u044d", "\u042d"], ["\u043D", "\u041D"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u04af", "\u04AE"], ["\u0437", "\u0417"], ["\u043A", "\u041a"], ["\u044A", "\u042A"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0439", "\u0419"], ["\u044B", "\u042B"], ["\u0431", "\u0411"], ["\u04e9", "\u04e8"], ["\u0430", "\u0410"], ["\u0445", "\u0425"], ["\u0440", "\u0420"], ["\u043e", "\u041e"], ["\u043B", "\u041b"], ["\u0434", "\u0414"], ["\u043f", "\u041f"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u044F", "\u042F"], ["\u0447", "\u0427"], ["\u0451", "\u0401"], ["\u0441", "\u0421"], ["\u043c", "\u041c"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u044c", "\u042c"], ["\u0432", "\u0412"], ["\u044e", "\u042e"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["mn"] };

  this.VKI_layout['\u092e\u0930\u093e\u0920\u0940'] = {
    'name': "Marathi", 'keys': [
      [["", "", "`", "~"], ["\u0967", "\u090D", "1", "!"], ["\u0968", "\u0945", "2", "@"], ["\u0969", "\u094D\u0930", "3", "#"], ["\u096A", "\u0930\u094D", "4", "$"], ["\u096B", "\u091C\u094D\u091E", "5", "%"], ["\u096C", "\u0924\u094D\u0930", "6", "^"], ["\u096D", "\u0915\u094D\u0937", "7", "&"], ["\u096E", "\u0936\u094D\u0930", "8", "*"], ["\u096F", "(", "9", "("], ["\u0966", ")", "0", ")"], ["-", "\u0903", "-", "_"], ["\u0943", "\u090B", "=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u094C", "\u0914"], ["\u0948", "\u0910"], ["\u093E", "\u0906"], ["\u0940", "\u0908"], ["\u0942", "\u090A"], ["\u092C", "\u092D"], ["\u0939", "\u0919"], ["\u0917", "\u0918"], ["\u0926", "\u0927"], ["\u091C", "\u091D"], ["\u0921", "\u0922", "[", "{"], ["\u093C", "\u091E", "]", "}"], ["\u0949", "\u0911", "\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u094B", "\u0913"], ["\u0947", "\u090F"], ["\u094D", "\u0905"], ["\u093F", "\u0907"], ["\u0941", "\u0909"], ["\u092A", "\u092B"], ["\u0930", "\u0931"], ["\u0915", "\u0916"], ["\u0924", "\u0925"], ["\u091A", "\u091B", ";", ":"], ["\u091F", "\u0920", "'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], [""], ["\u0902", "\u0901", "", "\u0950"], ["\u092E", "\u0923"], ["\u0928"], ["\u0935"], ["\u0932", "\u0933"], ["\u0938", "\u0936"], [",", "\u0937", ",", "<"], [".", "\u0964", ".", ">"], ["\u092F", "\u095F", "/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["mr"] };

  this.VKI_layout['\u1019\u103c\u1014\u103a\u1019\u102c\u1018\u102c\u101e\u102c'] = {
    'name': "Burmese", 'keys': [
      [["\u1039`", "~"], ["\u1041", "\u100D"], ["\u1042", "\u100E"], ["\u1043", "\u100B"], ["\u1044", "\u1000\u103B\u1015\u103A"], ["\u1045", "%"], ["\u1046", "/"], ["\u1047", "\u101B"], ["\u1048", "\u1002"], ["\u1049", "("], ["\u1040", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u1006", "\u1029"], ["\u1010", "\u1040"], ["\u1014", "\u103F"], ["\u1019", "\u1023"], ["\u1021", "\u1024"], ["\u1015", "\u104C"], ["\u1000", "\u1009"], ["\u1004", "\u104D"], ["\u101E", "\u1025"], ["\u1005", "\u100F"], ["\u101F", "\u1027"], ["\u2018", "\u2019"], ["\u104F", "\u100B\u1039\u100C"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u200B\u1031", "\u1017"], ["\u200B\u103B", "\u200B\u103E"], ["\u200B\u102D", "\u200B\u102E"], ["\u200B\u103A", "\u1004\u103A\u1039\u200B"], ["\u200B\u102B", "\u200B\u103D"], ["\u200B\u1037", "\u200B\u1036"], ["\u200B\u103C", "\u200B\u1032"], ["\u200B\u102F", "\u200B\u102F"], ["\u200B\u1030", "\u200B\u1030"], ["\u200B\u1038", "\u200B\u102B\u103A"], ["\u1012", "\u1013"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u1016", "\u1007"], ["\u1011", "\u100C"], ["\u1001", "\u1003"], ["\u101C", "\u1020"], ["\u1018", "\u1026"], ["\u100A", "\u1008"], ["\u200B\u102C", "\u102A"], ["\u101A", "\u101B"], [".", "\u101B"], ["\u104B", "\u104A"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["my"] };

  this.VKI_layout['Nederlands'] = {
    'name': "Dutch", 'keys': [
      [["@", "\u00a7", "\u00ac"], ["1", "!", "\u00b9"], ["2", '"', "\u00b2"], ["3", "#", "\u00b3"], ["4", "$", "\u00bc"], ["5", "%", "\u00bd"], ["6", "&", "\u00be"], ["7", "_", "\u00a3"], ["8", "(", "{"], ["9", ")", "}"], ["0", "'"], ["/", "?", "\\"], ["\u00b0", "~", "\u00b8"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R", "\u00b6"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00a8", "^"], ["*", "|"], ["<", ">"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S", "\u00df"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["+", "\u00b1"], ["\u00b4", "`"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["]", "[", "\u00a6"], ["z", "Z", "\u00ab"], ["x", "X", "\u00bb"], ["c", "C", "\u00a2"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u00b5"], [",", ";"], [".", ":", "\u00b7"], ["-", "="], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["nl"] };

  this.VKI_layout['Norsk'] = {
    'name': "Norwegian", 'keys': [
      [["|", "\u00a7"], ["1", "!"], ["2", '"', "@"], ["3", "#", "\u00a3"], ["4", "\u00a4", "$"], ["5", "%"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["+", "?"], ["\\", "`", "\u00b4"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00e5", "\u00c5"], ["\u00a8", "^", "~"], ["'", "*"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00f8", "\u00d8"], ["\u00e6", "\u00c6"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u03bc", "\u039c"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["no", "nb", "nn"] };

  this.VKI_layout['\u067e\u069a\u062a\u0648'] = {
    'name': "Pashto", 'keys': [
      [["\u200d", "\u00f7", "`"], ["\u06f1", "!", "`"], ["\u06f2", "\u066c", "@"], ["\u06f3", "\u066b", "\u066b"], ["\u06f4", "\u00a4", "\u00a3"], ["\u06f5", "\u066a", "%"], ["\u06f6", "\u00d7", "^"], ["\u06f7", "\u00ab", "&"], ["\u06f8", "\u00bb", "*"], ["\u06f9", "(", "\ufdf2"], ["\u06f0", ")", "\ufefb"], ["-", "\u0640", "_"], ["=", "+", "\ufe87", "\u00f7"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0636", "\u0652", "\u06d5"], ["\u0635", "\u064c", "\u0653"], ["\u062b", "\u064d", "\u20ac"], ["\u0642", "\u064b", "\ufef7"], ["\u0641", "\u064f", "\ufef5"], ["\u063a", "\u0650", "'"], ["\u0639", "\u064e", "\ufe84"], ["\u0647", "\u0651", "\u0670"], ["\u062e", "\u0681", "'"], ["\u062d", "\u0685", '"'], ["\u062c", "]", "}"], ["\u0686", "[", "{"], ["\\", "\u066d", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0634", "\u069a", "\ufbb0"], ["\u0633", "\u06cd", "\u06d2"], ["\u06cc", "\u064a", "\u06d2"], ["\u0628", "\u067e", "\u06ba"], ["\u0644", "\u0623", "\u06b7"], ["\u0627", "\u0622", "\u0671"], ["\u062a", "\u067c", "\u0679"], ["\u0646", "\u06bc", "<"], ["\u0645", "\u0629", ">"], ["\u06a9", ":", "\u0643"], ["\u06af", "\u061b", "\u06ab"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0638", "\u0626", "?"], ["\u0637", "\u06d0", ";"], ["\u0632", "\u0698", "\u0655"], ["\u0631", "\u0621", "\u0654"], ["\u0630", "\u200c", "\u0625"], ["\u062f", "\u0689", "\u0688"], ["\u0693", "\u0624", "\u0691"], ["\u0648", "\u060c", ","], ["\u0696", ".", "\u06c7"], ["/", "\u061f", "\u06c9"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>", "\u064d"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["ps"] };

  this.VKI_layout['\u0a2a\u0a70\u0a1c\u0a3e\u0a2c\u0a40'] = {
    'name': "Punjabi (Gurmukhi)", 'keys': [
      [[""], ["1", "\u0A4D\u0A35", "\u0A67", "\u0A67"], ["2", "\u0A4D\u0A2F", "\u0A68", "\u0A68"], ["3", "\u0A4D\u0A30", "\u0A69", "\u0A69"], ["4", "\u0A71", "\u0A6A", "\u0A6A"], ["5", "", "\u0A6B", "\u0A6B"], ["6", "", "\u0A6C", "\u0A6C"], ["7", "", "\u0A6D", "\u0A6D"], ["8", "", "\u0A6E", "\u0A6E"], ["9", "(", "\u0A6F", "\u0A6F"], ["0", ")", "\u0A66", "\u0A66"], ["-"], [""], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0A4C", "\u0A14"], ["\u0A48", "\u0A10"], ["\u0A3E", "\u0A06"], ["\u0A40", "\u0A08"], ["\u0A42", "\u0A0A"], ["\u0A2C", "\u0A2D"], ["\u0A39", "\u0A19"], ["\u0A17", "\u0A18", "\u0A5A", "\u0A5A"], ["\u0A26", "\u0A27"], ["\u0A1C", "\u0A1D", "\u0A5B", "\u0A5B"], ["\u0A21", "\u0A22", "\u0A5C", "\u0A5C"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0A4B", "\u0A13"], ["\u0A47", "\u0A0F"], ["\u0A4D", "\u0A05"], ["\u0A3F", "\u0A07"], ["\u0A41", "\u0A09"], ["\u0A2A", "\u0A2B", "\u0A5E", "\u0A5E"], ["\u0A30"], ["\u0A15", "\u0A16", "\u0A59", "\u0A59"], ["\u0A24", "\u0A25"], ["\u0A1A", "\u0A1B"], ["\u0A1F", "\u0A20"], ["\u0A3C", "\u0A1E"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], [""], ["\u0A02", "\u0A02"], ["\u0A2E", "\u0A23"], ["\u0A28"], ["\u0A35", "\u0A72", "\u0A73", "\u0A73"], ["\u0A32", "\u0A33"], ["\u0A38", "\u0A36"], [","], [".", "|", "\u0965", "\u0965"], ["\u0A2F"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["pa"] };

  this.VKI_layout['\u62fc\u97f3 (Pinyin)'] = {
    'name': "Pinyin", 'keys': [
      [["`", "~", "\u4e93", "\u301C"], ["1", "!", "\uFF62"], ["2", "@", "\uFF63"], ["3", "#", "\u301D"], ["4", "$", "\u301E"], ["5", "%", "\u301F"], ["6", "^", "\u3008"], ["7", "&", "\u3009"], ["8", "*", "\u302F"], ["9", "(", "\u300A"], ["0", ")", "\u300B"], ["-", "_", "\u300E"], ["=", "+", "\u300F"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\u0101", "\u0100"], ["w", "W", "\u00E1", "\u00C1"], ["e", "E", "\u01CE", "\u01CD"], ["r", "R", "\u00E0", "\u00C0"], ["t", "T", "\u0113", "\u0112"], ["y", "Y", "\u00E9", "\u00C9"], ["u", "U", "\u011B", "\u011A"], ["i", "I", "\u00E8", "\u00C8"], ["o", "O", "\u012B", "\u012A"], ["p", "P", "\u00ED", "\u00CD"], ["[", "{", "\u01D0", "\u01CF"], ["]", "}", "\u00EC", "\u00CC"], ["\\", "|", "\u3020"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u014D", "\u014C"], ["s", "S", "\u00F3", "\u00D3"], ["d", "D", "\u01D2", "\u01D1"], ["f", "F", "\u00F2", "\u00D2"], ["g", "G", "\u00fc", "\u00dc"], ["h", "H", "\u016B", "\u016A"], ["j", "J", "\u00FA", "\u00DA"], ["k", "K", "\u01D4", "\u01D3"], ["l", "L", "\u00F9", "\u00D9"], [";", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["z", "Z", "\u01D6", "\u01D5"], ["x", "X", "\u01D8", "\u01D7"], ["c", "C", "\u01DA", "\u01D9"], ["v", "V", "\u01DC", "\u01DB"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "<", "\u3001"], [".", ">", "\u3002"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [["<?php echo $params->get('vki_altlk'); ?>", "<?php echo $params->get('vki_altlk'); ?>"], [" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["zh-Latn"] };

  this.VKI_layout['Polski'] = {
    'name': "Polish (214)", 'keys': [
      [["\u02DB", "\u00B7"], ["1", "!", "~"], ["2", '"', "\u02C7"], ["3", "#", "^"], ["4", "\u00A4", "\u02D8"], ["5", "%", "\u00B0"], ["6", "&", "\u02DB"], ["7", "/", "`"], ["8", "(", "\u00B7"], ["9", ")", "\u00B4"], ["0", "=", "\u02DD"], ["+", "?", "\u00A8"], ["'", "*", "\u00B8"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\\"], ["w", "W", "\u00A6"], ["e", "E"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U", "\u20AC"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u017C", "\u0144", "\u00F7"], ["\u015B", "\u0107", "\u00D7"], ["\u00F3", "\u017A"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S", "\u0111"], ["d", "D", "\u0110"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u0142", "\u0141", "$"], ["\u0105", "\u0119", "\u00DF"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["y", "Y"], ["x", "X"], ["c", "C"], ["v", "V", "@"], ["b", "B", "{"], ["n", "N", "}"], ["m", "M", "\u00A7"], [",", ";", "<"], [".", ":", ">"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ]};

  this.VKI_layout['Polski Programisty'] = {
    'name': "Polish Programmers", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "@"], ["3", "#"], ["4", "$"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u0119", "\u0118"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O", "\u00f3", "\u00d3"], ["p", "P"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u0105", "\u0104"], ["s", "S", "\u015b", "\u015a"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L", "\u0142", "\u0141"], [";", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["z", "Z", "\u017c", "\u017b"], ["x", "X", "\u017a", "\u0179"], ["c", "C", "\u0107", "\u0106"], ["v", "V"], ["b", "B"], ["n", "N", "\u0144", "\u0143"], ["m", "M"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["pl"] };

  this.VKI_layout['Portugu\u00eas Brasileiro'] = {
    'name': "Portuguese (Brazil)", 'keys': [
      [["'", '"'], ["1", "!", "\u00b9"], ["2", "@", "\u00b2"], ["3", "#", "\u00b3"], ["4", "$", "\u00a3"], ["5", "%", "\u00a2"], ["6", "\u00a8", "\u00ac"], ["7", "&"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+", "\u00a7"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "/"], ["w", "W", "?"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00b4", "`"], ["[", "{", "\u00aa"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00e7", "\u00c7"], ["~", "^"], ["]", "}", "\u00ba"], ["/", "?"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|"], ["z", "Z"], ["x", "X"], ["c", "C", "\u20a2"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", "<"], [".", ">"], [":", ":"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["pt-BR"] };

  this.VKI_layout['Portugu\u00eas'] = {
    'name': "Portuguese", 'keys': [
      [["\\", "|"], ["1", "!"], ["2", '"', "@"], ["3", "#", "\u00a3"], ["4", "$", "\u00a7"], ["5", "%"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["'", "?"], ["\u00ab", "\u00bb"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["+", "*", "\u00a8"], ["\u00b4", "`"], ["~", "^"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00e7", "\u00c7"], ["\u00ba", "\u00aa"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "\\"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["pt"] };

  this.VKI_layout['Rom\u00e2n\u0103'] = {
    'name': "Romanian", 'keys': [
      [["\u201E", "\u201D", "`", "~"], ["1", "!", "~"], ["2", "@", "\u02C7"], ["3", "#", "^"], ["4", "$", "\u02D8"], ["5", "%", "\u00B0"], ["6", "^", "\u02DB"], ["7", "&", "`"], ["8", "*", "\u02D9"], ["9", "(", "\u00B4"], ["0", ")", "\u02DD"], ["-", "_", "\u00A8"], ["=", "+", "\u00B8", "\u00B1"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P", "\u00A7"], ["\u0103", "\u0102", "[", "{"], ["\u00EE", "\u00CE", "]", "}"], ["\u00E2", "\u00C2", "\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S", "\u00df"], ["d", "D", "\u00f0", "\u00D0"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L", "\u0142", "\u0141"], [(this.VKI_isIElt8) ? "\u015F" : "\u0219", (this.VKI_isIElt8) ? "\u015E" : "\u0218", ";", ":"], [(this.VKI_isIElt8) ? "\u0163" : "\u021B", (this.VKI_isIElt8) ? "\u0162" : "\u021A", "\'", "\""], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\\", "|"], ["z", "Z"], ["x", "X"], ["c", "C", "\u00A9"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", ";", "<", "\u00AB"], [".", ":", ">", "\u00BB"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["ro"] };

  this.VKI_layout['\u0420\u0443\u0441\u0441\u043a\u0438\u0439'] = {
    'name': "Russian", 'keys': [
      [["\u0451", "\u0401"], ["1", "!"], ["2", '"'], ["3", "\u2116"], ["4", ";"], ["5", "%"], ["6", ":"], ["7", "?"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0439", "\u0419"], ["\u0446", "\u0426"], ["\u0443", "\u0423"], ["\u043A", "\u041A"], ["\u0435", "\u0415"], ["\u043D", "\u041D"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u0449", "\u0429"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["\u044A", "\u042A"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u044B", "\u042B"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043F", "\u041F"], ["\u0440", "\u0420"], ["\u043E", "\u041E"], ["\u043B", "\u041B"], ["\u0434", "\u0414"], ["\u0436", "\u0416"], ["\u044D", "\u042D"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["/", "|"], ["\u044F", "\u042F"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043C", "\u041C"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u044C", "\u042C"], ["\u0431", "\u0411"], ["\u044E", "\u042E"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["ru"] };

  this.VKI_layout['Schweizerdeutsch'] = {
    'name': "Swiss German", 'keys': [
      [["\u00A7", "\u00B0"], ["1", "+", "\u00A6"], ["2", '"', "@"], ["3", "*", "#"], ["4", "\u00E7", "\u00B0"], ["5", "%", "\u00A7"], ["6", "&", "\u00AC"], ["7", "/", "|"], ["8", "(", "\u00A2"], ["9", ")"], ["0", "="], ["'", "?", "\u00B4"], ["^", "`", "~"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00FC", "\u00E8", "["], ["\u00A8", "!", "]"], ["$", "\u00A3", "}"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00F6", "\u00E9"], ["\u00E4", "\u00E0", "{"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "\\"], ["y", "Y"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["de-CH"] };

  this.VKI_layout['Shqip'] = {
    'name': "Albanian", 'keys': [
      [["\\", "|"], ["1", "!", "~"], ["2", '"', "\u02C7"], ["3", "#", "^"], ["4", "$", "\u02D8"], ["5", "%", "\u00B0"], ["6", "^", "\u02DB"], ["7", "&", "`"], ["8", "*", "\u02D9"], ["9", "(", "\u00B4"], ["0", ")", "\u02DD"], ["-", "_", "\u00A8"], ["=", "+", "\u00B8"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\\"], ["w", "W", "|"], ["e", "E"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00E7", "\u00C7", "\u00F7"], ["[", "{", "\u00DF"], ["]", "}", "\u00A4"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S", "\u0111"], ["d", "D", "\u0110"], ["f", "F", "["], ["g", "G", "]"], ["h", "H"], ["j", "J"], ["k", "K", "\u0142"], ["l", "L", "\u0141"], ["\u00EB", "\u00CB", "$"], ["@", "'", "\u00D7"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["y", "Y"], ["x", "X"], ["c", "C"], ["v", "V", "@"], ["b", "B", "{"], ["n", "N", "}"], ["m", "M", "\u00A7"], [",", ";", "<"], [".", ":", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["sq"] };

  this.VKI_layout['Sloven\u010dina'] = {
    'name': "Slovak", 'keys': [
      [[";", "\u00b0"], ["+", "1", "~"], ["\u013E", "2", "\u02C7"], ["\u0161", "3", "^"], ["\u010D", "4", "\u02D8"], ["\u0165", "5", "\u00B0"], ["\u017E", "6", "\u02DB"], ["\u00FD", "7", "`"], ["\u00E1", "8", "\u02D9"], ["\u00ED", "9", "\u00B4"], ["\u00E9", "0", "\u02DD"], ["=", "%", "\u00A8"], ["\u00B4", "\u02c7", "\u00B8"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\\"], ["w", "W", "|"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P", "'"], ["\u00FA", "/", "\u00F7"], ["\u00E4", "(", "\u00D7"], ["\u0148", ")", "\u00A4"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S", "\u0111"], ["d", "D", "\u0110"], ["f", "F", "["], ["g", "G", "]"], ["h", "H"], ["j", "J"], ["k", "K", "\u0142"], ["l", "L", "\u0141"], ["\u00F4", '"', "$"], ["\u00A7", "!", "\u00DF"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["&", "*", "<"], ["y", "Y", ">"], ["x", "X", "#"], ["c", "C", "&"], ["v", "V", "@"], ["b", "B", "{"], ["n", "N", "}"], ["m", "M"], [",", "?", "<"], [".", ":", ">"], ["-", "_", "*", ], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["sk"] };

  this.VKI_layout['Srpskohrvatski'] = {
    'name': "Serbocroatian", 'keys': [
      [["\u00B8", "\u00A8"], ["1", "!", "~"], ["2", '"', "\u02C7"], ["3", "#", "^"], ["4", "$", "\u02D8"], ["5", "%", "\u00B0"], ["6", "&", "\u02DB"], ["7", "/", "`"], ["8", "(", "\u02D9"], ["9", ")", "\u00B4"], ["0", "=", "\u02DD"], ["'", "?", "\u00A8"], ["+", "*", "\u00B8"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\\"], ["w", "W", "|"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u0161", "\u0160", "\u00F7"], ["\u0111", "\u0110", "\u00D7"], ["\u017E", "\u017D", "\u00A4"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F", "["], ["g", "G", "]"], ["h", "H"], ["j", "J"], ["k", "K", "\u0142"], ["l", "L", "\u0141"], ["\u010D", "\u010C"], ["\u0107", "\u0106", "\u00DF"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["y", "Y"], ["x", "X"], ["c", "C"], ["v", "V", "@"], ["b", "B", "{"], ["n", "N", "}"], ["m", "M", "\u00A7"], [",", ";", "<"], [".", ":", ">"], ["-", "_", "\u00A9"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["sh"] };

  this.VKI_layout['\u0421\u0440\u043f\u0441\u043a\u0438'] = {
    'name': "Serbian", 'keys': [
      [["`", "~"], ["1", "!"], ["2", '"'], ["3", "#"], ["4", "$"], ["5", "%"], ["6", "&"], ["7", "/"], ["8", "("], ["9", ")"], ["0", "="], ["'", "?"], ["+", "*"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0459", "\u0409"], ["\u045a", "\u040a"], ["\u0435", "\u0415", "\u20ac"], ["\u0440", "\u0420"], ["\u0442", "\u0422"], ["\u0437", "\u0417"], ["\u0443", "\u0423"], ["\u0438", "\u0418"], ["\u043e", "\u041e"], ["\u043f", "\u041f"], ["\u0448", "\u0428"], ["\u0452", "\u0402"], ["\u0436", "\u0416"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0430", "\u0410"], ["\u0441", "\u0421"], ["\u0434", "\u0414"], ["\u0444", "\u0424"], ["\u0433", "\u0413"], ["\u0445", "\u0425"], ["\u0458", "\u0408"], ["\u043a", "\u041a"], ["\u043b", "\u041b"], ["\u0447", "\u0427"], ["\u045b", "\u040b"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">"], ["\u0455", "\u0405"], ["\u045f", "\u040f"], ["\u0446", "\u0426"], ["\u0432", "\u0412"], ["\u0431", "\u0411"], ["\u043d", "\u041d"], ["\u043c", "\u041c"], [",", ";", "<"], [".", ":", ">"], ["-", "_", "\u00a9"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["sr"] };

  this.VKI_layout['Suomi'] = {
    'name': "Finnish", 'keys': [
      [["\u00a7", "\u00BD"], ["1", "!"], ["2", '"', "@"], ["3", "#", "\u00A3"], ["4", "\u00A4", "$"], ["5", "%", "\u20AC"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["+", "?", "\\"], ["\u00B4", "`"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "\u00E2", "\u00C2"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T", "\u0167", "\u0166"], ["y", "Y"], ["u", "U"], ["i", "I", "\u00ef", "\u00CF"], ["o", "O", "\u00f5", "\u00D5"], ["p", "P"], ["\u00E5", "\u00C5"], ["\u00A8", "^", "~"], ["'", "*"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u00E1", "\u00C1"], ["s", "S", "\u0161", "\u0160"], ["d", "D", "\u0111", "\u0110"], ["f", "F", "\u01e5", "\u01E4"], ["g", "G", "\u01E7", "\u01E6"], ["h", "H", "\u021F", "\u021e"], ["j", "J"], ["k", "K", "\u01e9", "\u01E8"], ["l", "L"], ["\u00F6", "\u00D6", "\u00F8", "\u00D8"], ["\u00E4", "\u00C4", "\u00E6", "\u00C6"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "|"], ["z", "Z", "\u017E", "\u017D"], ["x", "X"], ["c", "C", "\u010d", "\u010C"], ["v", "V", "\u01EF", "\u01EE"], ["b", "B", "\u0292", "\u01B7"], ["n", "N", "\u014B", "\u014A"], ["m", "M", "\u00B5"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"], [" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["fi"] };

  this.VKI_layout['Svenska'] = {
    'name': "Swedish", 'keys': [
      [["\u00a7", "\u00bd"], ["1", "!"], ["2", '"', "@"], ["3", "#", "\u00a3"], ["4", "\u00a4", "$"], ["5", "%", "\u20ac"], ["6", "&"], ["7", "/", "{"], ["8", "(", "["], ["9", ")", "]"], ["0", "=", "}"], ["+", "?", "\\"], ["\u00b4", "`"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00e5", "\u00c5"], ["\u00a8", "^", "~"], ["'", "*"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00f6", "\u00d6"], ["\u00e4", "\u00c4"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "|"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M", "\u03bc", "\u039c"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["sv"] };

  this.VKI_layout['Swiss Fran\u00e7ais'] = {
    'name': "Swiss French", 'keys': [
      [["\u00A7", "\u00B0"], ["1", "+", "\u00A6"], ["2", '"', "@"], ["3", "*", "#"], ["4", "\u00E7", "\u00B0"], ["5", "%", "\u00A7"], ["6", "&", "\u00AC"], ["7", "/", "|"], ["8", "(", "\u00A2"], ["9", ")"], ["0", "="], ["'", "?", "\u00B4"], ["^", "`", "~"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q"], ["w", "W"], ["e", "E", "\u20AC"], ["r", "R"], ["t", "T"], ["z", "Z"], ["u", "U"], ["i", "I"], ["o", "O"], ["p", "P"], ["\u00E8", "\u00FC", "["], ["\u00A8", "!", "]"], ["$", "\u00A3", "}"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A"], ["s", "S"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u00E9", "\u00F6"], ["\u00E0", "\u00E4", "{"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "\\"], ["y", "Y"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], [",", ";"], [".", ":"], ["-", "_"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["fr-CH"] };

  this.VKI_layout['\u0723\u0718\u072a\u071d\u071d\u0710'] = {
    'name': "Syriac", 'keys': [
      [["\u070f", "\u032e", "\u0651", "\u0651"], ["1", "!", "\u0701", "\u0701"], ["2", "\u030a", "\u0702", "\u0702"], ["3", "\u0325", "\u0703", "\u0703"], ["4", "\u0749", "\u0704", "\u0704"], ["5", "\u2670", "\u0705", "\u0705"], ["6", "\u2671", "\u0708", "\u0708"], ["7", "\u070a", "\u0709", "\u0709"], ["8", "\u00bb", "\u070B", "\u070B"], ["9", ")", "\u070C", "\u070C"], ["0", "(", "\u070D", "\u070D"], ["-", "\u00ab", "\u250C", "\u250C"], ["=", "+", "\u2510", "\u2510"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0714", "\u0730", "\u064E", "\u064E"], ["\u0728", "\u0733", "\u064B", "\u064B"], ["\u0716", "\u0736", "\u064F", "\u064F"], ["\u0729", "\u073A", "\u064C", "\u064C"], ["\u0726", "\u073D", "\u0653", "\u0653"], ["\u071c", "\u0740", "\u0654", "\u0654"], ["\u0725", "\u0741", "\u0747", "\u0747"], ["\u0717", "\u0308", "\u0743", "\u0743"], ["\u071e", "\u0304", "\u0745", "\u0745"], ["\u071a", "\u0307", "\u032D", "\u032D"], ["\u0713", "\u0303"], ["\u0715", "\u074A"], ["\u0706", ":"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u072b", "\u0731", "\u0650", "\u0650"], ["\u0723", "\u0734", "\u064d", "\u064d"], ["\u071d", "\u0737"], ["\u0712", "\u073b", "\u0621", "\u0621"], ["\u0720", "\u073e", "\u0655", "\u0655"], ["\u0710", "\u0711", "\u0670", "\u0670"], ["\u072c", "\u0640", "\u0748", "\u0748"], ["\u0722", "\u0324", "\u0744", "\u0744"], ["\u0721", "\u0331", "\u0746", "\u0746"], ["\u071f", "\u0323"], ["\u071b", "\u0330"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["]", "\u0732"], ["[", "\u0735", "\u0652", "\u0652"], ["\u0724", "\u0738"], ["\u072a", "\u073c", "\u200D"], ["\u0727", "\u073f", "\u200C"], ["\u0700", "\u0739", "\u200E"], [".", "\u0742", "\u200F"], ["\u0718", "\u060c"], ["\u0719", "\u061b"], ["\u0707", "\u061F"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["syc"] };

  this.VKI_layout['\u0ba4\u0bae\u0bbf\u0bb4\u0bcd'] = {
    'name': "Tamil", 'keys': [
      [["\u0BCA", "\u0B92"], ["1", "", "\u0BE7"], ["2", "", "\u0BE8"], ["3", "", "\u0BE9"], ["4", "", "\u0BEA"], ["5", "", "\u0BEB"], ["6", "\u0BA4\u0BCD\u0BB0", "\u0BEC"], ["7", "\u0B95\u0BCD\u0BB7", "\u0BED"], ["8", "\u0BB7\u0BCD\u0BB0", "\u0BEE"], ["9", "", "\u0BEF"], ["0", "", "\u0BF0"], ["-", "\u0B83", "\u0BF1"], ["", "", "\u0BF2"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0BCC", "\u0B94"], ["\u0BC8", "\u0B90"], ["\u0BBE", "\u0B86"], ["\u0BC0", "\u0B88"], ["\u0BC2", "\u0B8A"], ["\u0BAA", "\u0BAA"], ["\u0BB9", "\u0B99"], ["\u0B95", "\u0B95"], ["\u0BA4", "\u0BA4"], ["\u0B9C", "\u0B9A"], ["\u0B9F", "\u0B9F"], ["\u0B9E"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0BCB", "\u0B93"], ["\u0BC7", "\u0B8F"], ["\u0BCD", "\u0B85"], ["\u0BBF", "\u0B87"], ["\u0BC1", "\u0B89"], ["\u0BAA", "\u0BAA"], ["\u0BB0", "\u0BB1"], ["\u0B95", "\u0B95"], ["\u0BA4", "\u0BA4"], ["\u0B9A", "\u0B9A"], ["\u0B9F", "\u0B9F"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0BC6", "\u0B8E"], [""], ["\u0BAE", "\u0BA3"], ["\u0BA8", "\u0BA9"], ["\u0BB5", "\u0BB4"], ["\u0BB2", "\u0BB3"], ["\u0BB8", "\u0BB7"], [",", "\u0BB7"], [".", "\u0BB8\u0BCD\u0BB0\u0BC0"], ["\u0BAF", "\u0BAF"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["ta"] };

  this.VKI_layout['\u0c24\u0c46\u0c32\u0c41\u0c17\u0c41'] = {
    'name': "Telugu", 'keys': [
      [["\u0C4A", "\u0C12"], ["1", "", "\u0C67"], ["2", "", "\u0C68"], ["3", "\u0C4D\u0C30", "\u0C69"], ["4", "", "\u0C6A"], ["5", "\u0C1C\u0C4D\u0C1E", "\u0C6B"], ["6", "\u0C24\u0C4D\u0C30", "\u0C6C"], ["7", "\u0C15\u0C4D\u0C37", "\u0C6D"], ["8", "\u0C36\u0C4D\u0C30", "\u0C6E"], ["9", "(", "\u0C6F"], ["0", ")", "\u0C66"], ["-", "\u0C03"], ["\u0C43", "\u0C0B", "\u0C44"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0C4C", "\u0C14"], ["\u0C48", "\u0C10", "\u0C56"], ["\u0C3E", "\u0C06"], ["\u0C40", "\u0C08", "", "\u0C61"], ["\u0C42", "\u0C0A"], ["\u0C2C"], ["\u0C39", "\u0C19"], ["\u0C17", "\u0C18"], ["\u0C26", "\u0C27"], ["\u0C1C", "\u0C1D"], ["\u0C21", "\u0C22"], ["", "\u0C1E"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0C4B", "\u0C13"], ["\u0C47", "\u0C0F", "\u0C55"], ["\u0C4D", "\u0C05"], ["\u0C3F", "\u0C07", "", "\u0C0C"], ["\u0C41", "\u0C09"], ["\u0C2A", "\u0C2B"], ["\u0C30", "\u0C31"], ["\u0C15", "\u0C16"], ["\u0C24", "\u0C25"], ["\u0C1A", "\u0C1B"], ["\u0C1F", "\u0C25"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0C46", "\u0C0E"], ["\u0C02", "\u0C01"], ["\u0C2E", "\u0C23"], ["\u0C28", "\u0C28"], ["\u0C35"], ["\u0C32", "\u0C33"], ["\u0C38", "\u0C36"], [",", "\u0C37"], ["."], ["\u0C2F"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["te"] };

  this.VKI_layout['Ti\u1ebfng Vi\u1ec7t'] = {
    'name': "Vietnamese", 'keys': [
      [["`", "~", "`", "~"], ["\u0103", "\u0102", "1", "!"], ["\u00E2", "\u00C2", "2", "@"], ["\u00EA", "\u00CA", "3", "#"], ["\u00F4", "\u00D4", "4", "$"], ["\u0300", "\u0300", "5", "%"], ["\u0309", "\u0309", "6", "^"], ["\u0303", "\u0303", "7", "&"], ["\u0301", "\u0301", "8", "*"], ["\u0323", "\u0323", "9", "("], ["\u0111", "\u0110", "0", ")"], ["-", "_", "-", "_"], ["\u20AB", "+", "=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "q", "Q"], ["w", "W", "w", "W"], ["e", "E", "e", "E"], ["r", "R", "r", "R"], ["t", "T", "t", "T"], ["y", "Y", "y", "Y"], ["u", "U", "u", "U"], ["i", "I", "i", "I"], ["o", "O", "o", "O"], ["p", "P", "p", "P"], ["\u01B0", "\u01AF", "[", "{"], ["\u01A1", "\u01A0", "]", "}"], ["\\", "|", "\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "a", "A"], ["s", "S", "s", "S"], ["d", "D", "d", "D"], ["f", "F", "f", "F"], ["g", "G", "g", "G"], ["h", "H", "h", "H"], ["j", "J", "j", "J"], ["k", "K", "k", "K"], ["l", "L", "l", "L"], [";", ":", ";", ":"], ["'", '"', "'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["z", "Z", "z", "Z"], ["x", "X", "x", "X"], ["c", "C", "c", "C"], ["v", "V", "v", "V"], ["b", "B", "b", "B"], ["n", "N", "n", "N"], ["m", "M", "m", "M"], [",", "<", ",", "<"], [".", ">", ".", ">"], ["/", "?", "/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["vi"] };

  this.VKI_layout['\u0e44\u0e17\u0e22 Kedmanee'] = {
    'name': "Thai Kedmanee", 'keys': [
      [["_", "%"], ["\u0E45", "+"], ["/", "\u0E51"], ["-", "\u0E52"], ["\u0E20", "\u0E53"], ["\u0E16", "\u0E54"], ["\u0E38", "\u0E39"], ["\u0E36", "\u0E3F"], ["\u0E04", "\u0E55"], ["\u0E15", "\u0E56"], ["\u0E08", "\u0E57"], ["\u0E02", "\u0E58"], ["\u0E0A", "\u0E59"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0E46", "\u0E50"], ["\u0E44", '"'], ["\u0E33", "\u0E0E"], ["\u0E1E", "\u0E11"], ["\u0E30", "\u0E18"], ["\u0E31", "\u0E4D"], ["\u0E35", "\u0E4A"], ["\u0E23", "\u0E13"], ["\u0E19", "\u0E2F"], ["\u0E22", "\u0E0D"], ["\u0E1A", "\u0E10"], ["\u0E25", ","], ["\u0E03", "\u0E05"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0E1F", "\u0E24"], ["\u0E2B", "\u0E06"], ["\u0E01", "\u0E0F"], ["\u0E14", "\u0E42"], ["\u0E40", "\u0E0C"], ["\u0E49", "\u0E47"], ["\u0E48", "\u0E4B"], ["\u0E32", "\u0E29"], ["\u0E2A", "\u0E28"], ["\u0E27", "\u0E0B"], ["\u0E07", "."], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0E1C", "("], ["\u0E1B", ")"], ["\u0E41", "\u0E09"], ["\u0E2D", "\u0E2E"], ["\u0E34", "\u0E3A"], ["\u0E37", "\u0E4C"], ["\u0E17", "?"], ["\u0E21", "\u0E12"], ["\u0E43", "\u0E2C"], ["\u0E1D", "\u0E26"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["th"] };

  this.VKI_layout['\u0e44\u0e17\u0e22 Pattachote'] = {
    'name': "Thai Pattachote", 'keys': [
      [["_", "\u0E3F"], ["=", "+"], ["\u0E52", '"'], ["\u0E53", "/"], ["\u0E54", ","], ["\u0E55", "?"], ["\u0E39", "\u0E38"], ["\u0E57", "_"], ["\u0E58", "."], ["\u0E59", "("], ["\u0E50", ")"], ["\u0E51", "-"], ["\u0E56", "%"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0E47", "\u0E4A"], ["\u0E15", "\u0E24"], ["\u0E22", "\u0E46"], ["\u0E2D", "\u0E0D"], ["\u0E23", "\u0E29"], ["\u0E48", "\u0E36"], ["\u0E14", "\u0E1D"], ["\u0E21", "\u0E0B"], ["\u0E27", "\u0E16"], ["\u0E41", "\u0E12"], ["\u0E43", "\u0E2F"], ["\u0E0C", "\u0E26"], ["\uF8C7", "\u0E4D"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0E49", "\u0E4B"], ["\u0E17", "\u0E18"], ["\u0E07", "\u0E33"], ["\u0E01", "\u0E13"], ["\u0E31", "\u0E4C"], ["\u0E35", "\u0E37"], ["\u0E32", "\u0E1C"], ["\u0E19", "\u0E0A"], ["\u0E40", "\u0E42"], ["\u0E44", "\u0E06"], ["\u0E02", "\u0E11"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0E1A", "\u0E0E"], ["\u0E1B", "\u0E0F"], ["\u0E25", "\u0E10"], ["\u0E2B", "\u0E20"], ["\u0E34", "\u0E31"], ["\u0E04", "\u0E28"], ["\u0E2A", "\u0E2E"], ["\u0E30", "\u0E1F"], ["\u0E08", "\u0E09"], ["\u0E1E", "\u0E2C"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ]};

  this.VKI_layout['\u0422\u0430\u0442\u0430\u0440\u0447\u0430'] = {
    'name': "Tatar", 'keys': [
      [["\u04BB", "\u04BA", "\u0451", "\u0401"], ["1", "!"], ["2", '"', "@"], ["3", "\u2116", "#"], ["4", ";", "$"], ["5", "%"], ["6", ":"], ["7", "?", "["], ["8", "*", "]"], ["9", "(", "{"], ["0", ")", "}"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0439", "\u0419"], ["\u04E9", "\u04E8", "\u0446", "\u0426"], ["\u0443", "\u0423"], ["\u043A", "\u041A"], ["\u0435", "\u0415"], ["\u043D", "\u041D"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u04D9", "\u04D8", "\u0449", "\u0429"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["\u04AF", "\u04AE", "\u044A", "\u042A"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u044B", "\u042B"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043F", "\u041F"], ["\u0440", "\u0420"], ["\u043E", "\u041E"], ["\u043B", "\u041B"], ["\u0434", "\u0414"], ["\u04A3", "\u04A2", "\u0436", "\u0416"], ["\u044D", "\u042D", "'"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0491", "\u0490"], ["\u044F", "\u042F"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043C", "\u041C"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u0497", "\u0496", "\u044C", "\u042C"], ["\u0431", "\u0411", "<"], ["\u044E", "\u042E", ">"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["tt"] };

  this.VKI_layout['T\u00fcrk\u00e7e F'] = {
    'name': "Turkish F", 'keys': [
      [['+', "*", "\u00ac"], ["1", "!", "\u00b9", "\u00a1"], ["2", '"', "\u00b2"], ["3", "^", "#", "\u00b3"], ["4", "$", "\u00bc", "\u00a4"], ["5", "%", "\u00bd"], ["6", "&", "\u00be"], ["7", "'", "{"], ["8", "(", '['], ["9", ")", ']'], ["0", "=", "}"], ["/", "?", "\\", "\u00bf"], ["-", "_", "|"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["f", "F", "@"], ["g", "G"], ["\u011f", "\u011e"], ["\u0131", "I", "\u00b6", "\u00ae"], ["o", "O"], ["d", "D", "\u00a5"], ["r", "R"], ["n", "N"], ["h", "H", "\u00f8", "\u00d8"], ["p", "P", "\u00a3"], ["q", "Q", "\u00a8"], ["w", "W", "~"], ["x", "X", "`"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["u", "U", "\u00e6", "\u00c6"], ["i", "\u0130", "\u00df", "\u00a7"], ["e", "E", "\u20ac"], ["a", "A", " ", "\u00aa"], ["\u00fc", "\u00dc"], ["t", "T"], ["k", "K"], ["m", "M"], ["l", "L"], ["y", "Y", "\u00b4"], ["\u015f", "\u015e"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "|", "\u00a6"], ["j", "J", "\u00ab", "<"], ["\u00f6", "\u00d6", "\u00bb", ">"], ["v", "V", "\u00a2", "\u00a9"], ["c", "C"], ["\u00e7", "\u00c7"], ["z", "Z"], ["s", "S", "\u00b5", "\u00ba"], ["b", "B", "\u00d7"], [".", ":", "\u00f7"], [",", ";", "-"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "],  ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ]};

  this.VKI_layout['T\u00fcrk\u00e7e Q'] = {
    'name': "Turkish Q", 'keys': [
      [['"', "\u00e9", "<"], ["1", "!", ">"], ["2", "'", "\u00a3"], ["3", "^", "#"], ["4", "+", "$"], ["5", "%", "\u00bd"], ["6", "&"], ["7", "/", "{"], ["8", "(", '['], ["9", ")", ']'], ["0", "=", "}"], ["*", "?", "\\"], ["-", "_", "|"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["q", "Q", "@"], ["w", "W"], ["e", "E", "\u20ac"], ["r", "R"], ["t", "T"], ["y", "Y"], ["u", "U"], ["\u0131", "I", "i", "\u0130"], ["o", "O"], ["p", "P"], ["\u011f", "\u011e", "\u00a8"], ["\u00fc", "\u00dc", "~"], [",", ";", "`"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["a", "A", "\u00e6", "\u00c6"], ["s", "S", "\u00df"], ["d", "D"], ["f", "F"], ["g", "G"], ["h", "H"], ["j", "J"], ["k", "K"], ["l", "L"], ["\u015f", "\u015e", "\u00b4"], ["i", "\u0130"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["<", ">", "|"], ["z", "Z"], ["x", "X"], ["c", "C"], ["v", "V"], ["b", "B"], ["n", "N"], ["m", "M"], ["\u00f6", "\u00d6"], ["\u00e7", "\u00c7"], [".", ":"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "],  ["<?php echo $params->get('vki_altgr'); ?>", "<?php echo $params->get('vki_altgr'); ?>"]]
    ], 'lang': ["tr"] };

  this.VKI_layout['\u0423\u043a\u0440\u0430\u0457\u043d\u0441\u044c\u043a\u0430'] = {
    'name': "Ukrainian", 'keys': [
      [["\u00b4", "~"], ["1", "!"], ["2", '"'], ["3", "\u2116"], ["4", ";"], ["5", "%"], ["6", ":"], ["7", "?"], ["8", "*"], ["9", "("], ["0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0439", "\u0419"], ["\u0446", "\u0426"], ["\u0443", "\u0423"], ["\u043A", "\u041A"], ["\u0435", "\u0415"], ["\u043D", "\u041D"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u0449", "\u0429"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["\u0457", "\u0407"], ["\u0491", "\u0490"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u0456", "\u0406"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043F", "\u041F"], ["\u0440", "\u0420"], ["\u043E", "\u041E"], ["\u043B", "\u041B"], ["\u0434", "\u0414"], ["\u0436", "\u0416"], ["\u0454", "\u0404"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u044F", "\u042F"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043C", "\u041C"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u044C", "\u042C"], ["\u0431", "\u0411"], ["\u044E", "\u042E"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["uk"] };

  this.VKI_layout['\u0627\u0631\u062f\u0648'] = {
    'name': "Urdu", 'keys': [
      [["`", "~"], ["1", "!"], ["2", "@"], ["3", "#"], ["4", "$"], ["5", "\u066A"], ["6", "^"], ["7", "\u06D6"], ["8", "\u066D"], ["9", ")"], ["0", "("], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0637", "\u0638"], ["\u0635", "\u0636"], ["\u06be", "\u0630"], ["\u062f", "\u0688"], ["\u0679", "\u062B"], ["\u067e", "\u0651"], ["\u062a", "\u06C3"], ["\u0628", "\u0640"], ["\u062c", "\u0686"], ["\u062d", "\u062E"], ["]", "}"], ["[", "{"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0645", "\u0698"], ["\u0648", "\u0632"], ["\u0631", "\u0691"], ["\u0646", "\u06BA"], ["\u0644", "\u06C2"], ["\u06c1", "\u0621"], ["\u0627", "\u0622"], ["\u06A9", "\u06AF"], ["\u06CC", "\u064A"], ["\u061b", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0642", "\u200D"], ["\u0641", "\u200C"], ["\u06D2", "\u06D3"], ["\u0633", "\u200E"], ["\u0634", "\u0624"], ["\u063a", "\u0626"], ["\u0639", "\u200F"], ["\u060C", ">"], ["\u06D4", "<"], ["/", "\u061F"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["ur"] };

  this.VKI_layout['\u0627\u0631\u062f\u0648 Phonetic'] = {
    'name': "Urdu Phonetic", 'keys': [
      [["\u064D", "\u064B", "~"], ["\u06F1", "1", "!"], ["\u06F2", "2", "@"], ["\u06F3", "3", "#"], ["\u06F4", "4", "$"], ["\u06F5", "5", "\u066A"], ["\u06F6", "6", "^"], ["\u06F7", "7", "&"], ["\u06F8", "8", "*"], ["\u06F9", "9", "("], ["\u06F0", "0", ")"], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0642", "\u0652"], ["\u0648", "\u0651", "\u0602"], ["\u0639", "\u0670", "\u0656"], ["\u0631", "\u0691", "\u0613"], ["\u062A", "\u0679", "\u0614"], ["\u06D2", "\u064E", "\u0601"], ["\u0621", "\u0626", "\u0654"], ["\u06CC", "\u0650", "\u0611"], ["\u06C1", "\u06C3"], ["\u067E", "\u064F", "\u0657"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0627", "\u0622", "\uFDF2"], ["\u0633", "\u0635", "\u0610"], ["\u062F", "\u0688", "\uFDFA"], ["\u0641"], ["\u06AF", "\u063A"], ["\u062D", "\u06BE", "\u0612"], ["\u062C", "\u0636", "\uFDFB"], ["\u06A9", "\u062E"], ["\u0644"], ["\u061B", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u0632", "\u0630", "\u060F"], ["\u0634", "\u0698", "\u060E"], ["\u0686", "\u062B", "\u0603"], ["\u0637", "\u0638"], ["\u0628", "", "\uFDFD"], ["\u0646", "\u06BA", "\u0600"], ["\u0645", "\u0658"], ["\u060C", "", "<"], ["\u06D4", "\u066B", ">"], ["/", "\u061F"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ]};

  this.VKI_layout['\u040e\u0437\u0431\u0435\u043a\u0447\u0430'] = {
    'name': "Uzbek", 'keys': [
      [["\u0451", "\u0401"], ["1", "!"], ["2", '"'], ["3", "\u2116"], ["4", ";"], ["5", "%"], ["6", ":"], ["7", "?"], ["8", "*"], ["9", "("], ["0", ")"], ["\u0493", "\u0492"], ["\u04B3", "\u04B2"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u0439", "\u0419"], ["\u0446", "\u0426"], ["\u0443", "\u0423"], ["\u043A", "\u041A"], ["\u0435", "\u0415"], ["\u043D", "\u041D"], ["\u0433", "\u0413"], ["\u0448", "\u0428"], ["\u045E", "\u040E"], ["\u0437", "\u0417"], ["\u0445", "\u0425"], ["\u044A", "\u042A"], ["\\", "/"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u0444", "\u0424"], ["\u049B", "\u049A"], ["\u0432", "\u0412"], ["\u0430", "\u0410"], ["\u043F", "\u041F"], ["\u0440", "\u0420"], ["\u043E", "\u041E"], ["\u043B", "\u041B"], ["\u0434", "\u0414"], ["\u0436", "\u0416"], ["\u044D", "\u042D"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u044F", "\u042F"], ["\u0447", "\u0427"], ["\u0441", "\u0421"], ["\u043C", "\u041C"], ["\u0438", "\u0418"], ["\u0442", "\u0422"], ["\u044C", "\u042C"], ["\u0431", "\u0411"], ["\u044E", "\u042E"], [".", ","], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["uz"] };

  this.VKI_layout['\u05d9\u05d9\u05b4\u05d3\u05d9\u05e9'] = { // from http://www.yv.org/uyip/hebyidkbd.txt http://uyip.org/keyboards.html
    'name': "Yiddish", 'keys': [
      [[";", "~", "\u05B0"], ["1", "!", "\u05B1"], ["2", "@", "\u05B2"], ["3", "#", "\u05B3"], ["4", "$", "\u05B4"], ["5", "%", "\u05B5"], ["6", "^", "\u05B6"], ["7", "*", "\u05B7"], ["8", "&", "\u05B8"], ["9", "(", "\u05C2"], ["0", ")", "\u05C1"], ["-", "_", "\u05B9"], ["=", "+", "\u05BC"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["/", "\u201F", "\u201F"], ["'", "\u201E", "\u201E"], ["\u05E7", "`", "`"], ["\u05E8", "\uFB2F", "\uFB2F"], ["\u05D0", "\uFB2E", "\uFB2E"], ["\u05D8", "\u05F0", "\u05F0"], ["\u05D5", "\uFB35", "\uFB35"], ["\u05DF", "\uFB4B", "\uFB4B"], ["\u05DD", "\uFB4E", "\uFB4E"], ["\u05E4", "\uFB44", "\uFB44"], ["[", "{", "\u05BD"], ["]", "}", "\u05BF"], ["\\", "|", "\u05BB"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u05E9", "\uFB2A", "\uFB2A"], ["\u05D3", "\uFB2B", "\uFB2B"], ["\u05D2"], ["\u05DB", "\uFB3B", "\uFB3B"], ["\u05E2", "\u05F1", "\u05F1"], ["\u05D9", "\uFB1D", "\uFB1D"], ["\u05D7", "\uFF1F", "\uFF1F"], ["\u05DC", "\u05F2", "\u05F2"], ["\u05DA"], ["\u05E3", ":", "\u05C3"], [",", '"', "\u05C0"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u05D6", "\u2260", "\u2260"], ["\u05E1", "\uFB4C", "\uFB4C"], ["\u05D1", "\uFB31", "\uFB31"], ["\u05D4", "\u05BE", "\u05BE"], ["\u05E0", "\u2013", "\u2013"], ["\u05DE", "\u2014", "\u2014"], ["\u05E6", "\uFB4A", "\uFB4A"], ["\u05EA", "<", "\u05F3"], ["\u05E5", ">", "\u05F4"], [".", "?", "\u20AA"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["yi"] };

  this.VKI_layout['\u05d9\u05d9\u05b4\u05d3\u05d9\u05e9 \u05dc\u05e2\u05d1\u05d8'] = { // from http://jidysz.net/ 
    'name': "Yiddish (Yidish Lebt)", 'keys': [
      [[";", "~"], ["1", "!", "\u05B2", "\u05B2"], ["2", "@", "\u05B3", "\u05B3"], ["3", "#", "\u05B1", "\u05B1"], ["4", "$", "\u05B4", "\u05B4"], ["5", "%", "\u05B5", "\u05B5"], ["6", "^", "\u05B7", "\u05B7"], ["7", "&", "\u05B8", "\u05B8"], ["8", "*", "\u05BB", "\u05BB"], ["9", ")", "\u05B6", "\u05B6"], ["0", "(", "\u05B0", "\u05B0"], ["-", "_", "\u05BF", "\u05BF"], ["=", "+", "\u05B9", "\u05B9"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["/", "", "\u05F4", "\u05F4"], ["'", "", "\u05F3", "\u05F3"], ["\u05E7", "", "\u20AC"], ["\u05E8"], ["\u05D0", "", "\u05D0\u05B7", "\uFB2E"], ["\u05D8", "", "\u05D0\u05B8", "\uFB2F"], ["\u05D5", "\u05D5\u05B9", "\u05D5\u05BC", "\uFB35"], ["\u05DF", "", "\u05D5\u05D5", "\u05F0"], ["\u05DD", "", "\u05BC"], ["\u05E4", "", "\u05E4\u05BC", "\uFB44"], ["]", "}", "\u201E", "\u201D"], ["[", "{", "\u201A", "\u2019"], ["\\", "|", "\u05BE", "\u05BE"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u05E9", "\u05E9\u05C1", "\u05E9\u05C2", "\uFB2B"], ["\u05D3", "", "\u20AA"], ["\u05D2", "\u201E"], ["\u05DB", "", "\u05DB\u05BC", "\uFB3B"], ["\u05E2", "", "", "\uFB20"], ["\u05D9", "", "\u05D9\u05B4", "\uFB1D"], ["\u05D7", "", "\u05F2\u05B7", "\uFB1F"], ["\u05DC", "\u05DC\u05B9", "\u05D5\u05D9", "\u05F1"], ["\u05DA", "", "", "\u05F2"], ["\u05E3", ":", "\u05E4\u05BF", "\uFB4E"], [",", '"', ";", "\u05B2"], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u05D6", "", "\u2013", "\u2013"], ["\u05E1", "", "\u2014", "\u2014"], ["\u05D1", "\u05DC\u05B9", "\u05D1\u05BF", "\uFB4C"], ["\u05D4", "", "\u201D", "\u201C"], ["\u05E0", "", "\u059C", "\u059E"], ["\u05DE", "", "\u2019", "\u2018"], ["\u05E6", "", "\u05E9\u05C1", "\uFB2A"], ["\u05EA", ">", "\u05EA\u05BC", "\uFB4A"], ["\u05E5", "<"], [".", "?", "\u2026"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " ", " ", " "], ["<?php echo $params->get('vki_alt'); ?>", "<?php echo $params->get('vki_alt'); ?>"]]
    ], 'lang': ["yi"] };

  this.VKI_layout['\u4e2d\u6587\u6ce8\u97f3\u7b26\u53f7'] = {
    'name': "Chinese Bopomofo IME", 'keys': [
      [["\u20AC", "~"], ["\u3105", "!"], ["\u3109", "@"], ["\u02C7", "#"], ["\u02CB", "$"], ["\u3113", "%"], ["\u02CA", "^"], ["\u02D9", "&"], ["\u311A", "*"], ["\u311E", ")"], ["\u3122", "("], ["\u3126", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u3106", "q"], ["\u310A", "w"], ["\u310D", "e"], ["\u3110", "r"], ["\u3114", "t"], ["\u3117", "y"], ["\u3127", "u"], ["\u311B", "i"], ["\u311F", "o"], ["\u3123", "p"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u3107", "a"], ["\u310B", "s"], ["\u310E", "d"], ["\u3111", "f"], ["\u3115", "g"], ["\u3118", "h"], ["\u3128", "j"], ["\u311C", "k"], ["\u3120", "l"], ["\u3124", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\u3108", "z"], ["\u310C", "x"], ["\u310F", "c"], ["\u3112", "v"], ["\u3116", "b"], ["\u3119", "n"], ["\u3129", "m"], ["\u311D", "<"], ["\u3121", ">"], ["\u3125", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["zh-Bopo"] };

  this.VKI_layout['\u4e2d\u6587\u4ed3\u9889\u8f93\u5165\u6cd5'] = {
    'name': "Chinese Cangjie IME", 'keys': [
      [["\u20AC", "~"], ["1", "!"], ["2", "@"], ["3", "#"], ["4", "$"], ["5", "%"], ["6", "^"], ["7", "&"], ["8", "*"], ["9", ")"], ["0", "("], ["-", "_"], ["=", "+"], ["<?php echo $params->get('vki_bksp'); ?>", "<?php echo $params->get('vki_bksp'); ?>"]],
      [["<?php echo $params->get('vki_tab'); ?>", "<?php echo $params->get('vki_tab'); ?>"], ["\u624B", "q"], ["\u7530", "w"], ["\u6C34", "e"], ["\u53E3", "r"], ["\u5EFF", "t"], ["\u535C", "y"], ["\u5C71", "u"], ["\u6208", "i"], ["\u4EBA", "o"], ["\u5FC3", "p"], ["[", "{"], ["]", "}"], ["\\", "|"]],
      [["<?php echo $params->get('vki_caps'); ?>", "<?php echo $params->get('vki_caps'); ?>"], ["\u65E5", "a"], ["\u5C38", "s"], ["\u6728", "d"], ["\u706B", "f"], ["\u571F", "g"], ["\u7AF9", "h"], ["\u5341", "j"], ["\u5927", "k"], ["\u4E2D", "l"], [";", ":"], ["'", '"'], ["<?php echo $params->get('vki_enter'); ?>", "<?php echo $params->get('vki_enter'); ?>"]],
      [["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"], ["\uFF3A", "z"], ["\u96E3", "x"], ["\u91D1", "c"], ["\u5973", "v"], ["\u6708", "b"], ["\u5F13", "n"], ["\u4E00", "m"], [",", "<"], [".", ">"], ["/", "?"], ["<?php echo $params->get('vki_shift'); ?>", "<?php echo $params->get('vki_shift'); ?>"]],
      [[" ", " "]]
    ], 'lang': ["zh"] };
    
<?php if (($params->get('keyboard_custom', 1)) OR ($params->get('default_keyboard')=='custom'))
{ ?>
 this.VKI_layout['<?php echo $params->get('keyboard_custom_name_original'); ?>'] = {
    'name': "<?php echo $params->get('keyboard_custom_name_site'); ?>", 'keys': [
      <?php echo $params->get('keyboard_custom_codepage'); ?>
    ], 'lang': ["custom"] };
<?php } ?>

  /* ***** Define Dead Keys ************************************** */
  this.VKI_deadkey = {};

  // - Lay out each dead key set as an object of property/value
  //   pairs.  The rows below are wrapped so uppercase letters are
  //   below their lowercase equivalents.
  //
  // - The property name is the letter pressed after the diacritic.
  //   The property value is the letter this key-combo will generate.
  //
  // - Note that if you have created a new keyboard layout and want
  //   it included in the distributed script, PLEASE TELL ME if you
  //   have added additional dead keys to the ones below.

  this.VKI_deadkey['"'] = this.VKI_deadkey['\u00a8'] = this.VKI_deadkey['\u309B'] = { // Umlaut / Diaeresis / Greek Dialytika / Hiragana/Katakana Voiced Sound Mark
    'a': "\u00e4", 'e': "\u00eb", 'i': "\u00ef", 'o': "\u00f6", 'u': "\u00fc", 'y': "\u00ff", '\u03b9': "\u03ca", '\u03c5': "\u03cb", '\u016B': "\u01D6", '\u00FA': "\u01D8", '\u01D4': "\u01DA", '\u00F9': "\u01DC",
    'A': "\u00c4", 'E': "\u00cb", 'I': "\u00cf", 'O': "\u00d6", 'U': "\u00dc", 'Y': "\u0178", '\u0399': "\u03aa", '\u03a5': "\u03ab", '\u016A': "\u01D5", '\u00DA': "\u01D7", '\u01D3': "\u01D9", '\u00D9': "\u01DB",
    '\u304b': "\u304c", '\u304d': "\u304e", '\u304f': "\u3050", '\u3051': "\u3052", '\u3053': "\u3054", '\u305f': "\u3060", '\u3061': "\u3062", '\u3064': "\u3065", '\u3066': "\u3067", '\u3068': "\u3069",
    '\u3055': "\u3056", '\u3057': "\u3058", '\u3059': "\u305a", '\u305b': "\u305c", '\u305d': "\u305e", '\u306f': "\u3070", '\u3072': "\u3073", '\u3075': "\u3076", '\u3078': "\u3079", '\u307b': "\u307c",
    '\u30ab': "\u30ac", '\u30ad': "\u30ae", '\u30af': "\u30b0", '\u30b1': "\u30b2", '\u30b3': "\u30b4", '\u30bf': "\u30c0", '\u30c1': "\u30c2", '\u30c4': "\u30c5", '\u30c6': "\u30c7", '\u30c8': "\u30c9",
    '\u30b5': "\u30b6", '\u30b7': "\u30b8", '\u30b9': "\u30ba", '\u30bb': "\u30bc", '\u30bd': "\u30be", '\u30cf': "\u30d0", '\u30d2': "\u30d3", '\u30d5': "\u30d6", '\u30d8': "\u30d9", '\u30db': "\u30dc"
  };
  this.VKI_deadkey['~'] = { // Tilde / Stroke
    'a': "\u00e3", 'l': "\u0142", 'n': "\u00f1", 'o': "\u00f5",
    'A': "\u00c3", 'L': "\u0141", 'N': "\u00d1", 'O': "\u00d5"
  };
  this.VKI_deadkey['^'] = { // Circumflex
    'a': "\u00e2", 'e': "\u00ea", 'i': "\u00ee", 'o': "\u00f4", 'u': "\u00fb", 'w': "\u0175", 'y': "\u0177",
    'A': "\u00c2", 'E': "\u00ca", 'I': "\u00ce", 'O': "\u00d4", 'U': "\u00db", 'W': "\u0174", 'Y': "\u0176"
  };
  this.VKI_deadkey['\u02c7'] = { // Baltic caron
    'c': "\u010D", 'd': "\u010f", 'e': "\u011b", 's': "\u0161", 'l': "\u013e", 'n': "\u0148", 'r': "\u0159", 't': "\u0165", 'u': "\u01d4", 'z': "\u017E", '\u00fc': "\u01da",
    'C': "\u010C", 'D': "\u010e", 'E': "\u011a", 'S': "\u0160", 'L': "\u013d", 'N': "\u0147", 'R': "\u0158", 'T': "\u0164", 'U': "\u01d3", 'Z': "\u017D", '\u00dc': "\u01d9"
  };
  this.VKI_deadkey['\u02d8'] = { // Romanian and Turkish breve
    'a': "\u0103", 'g': "\u011f",
    'A': "\u0102", 'G': "\u011e"
  };
  this.VKI_deadkey['-'] = this.VKI_deadkey['\u00af'] = { // Macron
    'a': "\u0101", 'e': "\u0113", 'i': "\u012b", 'o': "\u014d", 'u': "\u016B", 'y': "\u0233", '\u00fc': "\u01d6",
    'A': "\u0100", 'E': "\u0112", 'I': "\u012a", 'O': "\u014c", 'U': "\u016A", 'Y': "\u0232", '\u00dc': "\u01d5"
  };
  this.VKI_deadkey['`'] = { // Grave
    'a': "\u00e0", 'e': "\u00e8", 'i': "\u00ec", 'o': "\u00f2", 'u': "\u00f9", '\u00fc': "\u01dc",
    'A': "\u00c0", 'E': "\u00c8", 'I': "\u00cc", 'O': "\u00d2", 'U': "\u00d9", '\u00dc': "\u01db"
  };
  this.VKI_deadkey["'"] = this.VKI_deadkey['\u00b4'] = this.VKI_deadkey['\u0384'] = { // Acute / Greek Tonos
    'a': "\u00e1", 'e': "\u00e9", 'i': "\u00ed", 'o': "\u00f3", 'u': "\u00fa", 'y': "\u00fd", '\u03b1': "\u03ac", '\u03b5': "\u03ad", '\u03b7': "\u03ae", '\u03b9': "\u03af", '\u03bf': "\u03cc", '\u03c5': "\u03cd", '\u03c9': "\u03ce", '\u00fc': "\u01d8",
    'A': "\u00c1", 'E': "\u00c9", 'I': "\u00cd", 'O': "\u00d3", 'U': "\u00da", 'Y': "\u00dd", '\u0391': "\u0386", '\u0395': "\u0388", '\u0397': "\u0389", '\u0399': "\u038a", '\u039f': "\u038c", '\u03a5': "\u038e", '\u03a9': "\u038f", '\u00dc': "\u01d7"
  };
  this.VKI_deadkey['\u02dd'] = { // Hungarian Double Acute Accent
    'o': "\u0151", 'u': "\u0171",
    'O': "\u0150", 'U': "\u0170"
  };
  this.VKI_deadkey['\u0385'] = { // Greek Dialytika + Tonos
    '\u03b9': "\u0390", '\u03c5': "\u03b0"
  };
  this.VKI_deadkey['\u00b0'] = this.VKI_deadkey['\u00ba'] = { // Ring
    'a': "\u00e5", 'u': "\u016f",
    'A': "\u00c5", 'U': "\u016e"
  };
  this.VKI_deadkey['\u02DB'] = { // Ogonek
    'a': "\u0106", 'e': "\u0119", 'i': "\u012f", 'o': "\u01eb", 'u': "\u0173", 'y': "\u0177",
    'A': "\u0105", 'E': "\u0118", 'I': "\u012e", 'O': "\u01ea", 'U': "\u0172", 'Y': "\u0176"
  };
  this.VKI_deadkey['\u02D9'] = { // Dot-above
    'c': "\u010B", 'e': "\u0117", 'g': "\u0121", 'z': "\u017C",
    'C': "\u010A", 'E': "\u0116", 'G': "\u0120", 'Z': "\u017B"
  };
  this.VKI_deadkey['\u00B8'] = this.VKI_deadkey['\u201a'] = { // Cedilla
    'c': "\u00e7", 's': "\u015F",
    'C': "\u00c7", 'S': "\u015E"
  };
  this.VKI_deadkey[','] = { // Comma
    's': (this.VKI_isIElt8) ? "\u015F" : "\u0219", 't': (this.VKI_isIElt8) ? "\u0163" : "\u021B",
    'S': (this.VKI_isIElt8) ? "\u015E" : "\u0218", 'T': (this.VKI_isIElt8) ? "\u0162" : "\u021A"
  };
  this.VKI_deadkey['\u3002'] = { // Hiragana/Katakana Point
    '\u306f': "\u3071", '\u3072': "\u3074", '\u3075': "\u3077", '\u3078': "\u307a", '\u307b': "\u307d",
    '\u30cf': "\u30d1", '\u30d2': "\u30d4", '\u30d5': "\u30d7", '\u30d8': "\u30da", '\u30db': "\u30dd"
  };
<?php if (($params->get('keyboard_am', 1)) OR ($params->get('default_keyboard')=='am'))
{ ?>
 // Ethiopic
this.VKI_deadkey['\u{1369}'] = {'1': "\u{1369}", '2': "\u{136A}", '3': "\u{136B}", '4': "\u{136C}", '5': "\u{136D}", '6': "\u{136E}", '7': "\u{136F}", '8': "\u{1370}", '9': "\u{1371}", '0': "\u{137B}"};
this.VKI_deadkey['\u{1200}'] = {'\u{12A3}': "\u{1203}", '\u{12A1}': "\u{1201}", '\u{12A0}': "\u{1200}", '\u{12A5}': "\u{1205}", '\u{12A4}': "\u{1204}", '\u{12A5}': "\u{1205}", '\u{12A0}': "\u{1200}", '\u{12A6}': "\u{1206}", '\u{12A2}': "\u{1202}"};
this.VKI_deadkey['\u{1260}'] = {'\u{12A3}': "\u{1263}",'\u{12A1}': "\u{1261}", '\u{12A0}': "\u{1260}", '\u{12A5}': "\u{1265}", '\u{12A4}': "\u{1264}", '\u{12A7}': "\u{1267}", '\u{12A5}': "\u{1265}", '\u{12A0}': "\u{1260}", '\u{12A6}': "\u{1266}", '\u{12A2}': "\u{1262}"};
this.VKI_deadkey['\u{1290}'] = {'\u{12A3}': "\u{1293}", '\u{12A1}': "\u{1291}", '\u{12A0}': "\u{1290}", '\u{12A5}': "\u{1295}", '\u{12A4}': "\u{1294}", '\u{12A7}': "\u{1297}", '\u{12A5}': "\u{1295}", '\u{12A0}': "\u{1290}", '\u{12A6}': "\u{1296}", '\u{12A2}': "\u{1292}"};
this.VKI_deadkey['\u{1218}'] = {'\u{12A3}': "\u{121B}", '\u{12A1}': "\u{1219}", '\u{12A0}': "\u{1218}", '\u{12A5}': "\u{121D}", '\u{12A4}': "\u{121C}", '\u{12A7}': "\u{121F}", '\u{12A5}': "\u{121D}", '\u{12A0}': "\u{1218}", '\u{12A6}': "\u{121E}", '\u{12A2}': "\u{121A}"};
this.VKI_deadkey['\u{12C8}'] = {'\u{12A3}': "\u{12CB}", '\u{12A1}': "\u{12C9}", '\u{12A0}': "\u{12C8}", '\u{12A5}': "\u{12CD}", '\u{12A4}': "\u{12CC}", '\u{12A5}': "\u{12CD}", '\u{12A0}': "\u{12C8}", '\u{12A6}': "\u{12CE}", '\u{12A2}': "\u{12CA}"};
this.VKI_deadkey['\u{1320}'] = {'\u{12A3}': "\u{1323}", '\u{12A1}': "\u{1321}", '\u{12A0}': "\u{1320}", '\u{12A5}': "\u{1325}", '\u{12A4}': "\u{1324}", '\u{12A7}': "\u{1327}", '\u{12A5}': "\u{1325}", '\u{12A0}': "\u{1320}", '\u{12A6}': "\u{1326}", '\u{12A2}': "\u{1322}"};
this.VKI_deadkey['\u{1270}'] = {'\u{12A3}': "\u{1273}", '\u{12A1}': "\u{1271}", '\u{12A0}': "\u{1270}",	'\u{12A5}': "\u{1275}", '\u{12A4}': "\u{1274}", '\u{12A7}': "\u{1277}", '\u{12A5}': "\u{1275}", '\u{12A0}': "\u{1270}", '\u{12A6}': "\u{1276}", '\u{12A2}': "\u{1272}"};
this.VKI_deadkey['\u{1208}'] = {'\u{12A3}': "\u{120B}", '\u{12A1}': "\u{1209}", '\u{12A0}': "\u{1208}", '\u{12A5}': "\u{120D}", '\u{12A4}': "\u{120C}", '\u{12A7}': "\u{120F}", '\u{12A5}': "\u{120D}", '\u{12A0}': "\u{1208}", '\u{12A6}': "\u{120E}", '\u{12A2}': "\u{120A}"};
this.VKI_deadkey['\u{1228}'] = {'\u{12A3}': "\u{122B}", '\u{12A1}': "\u{1229}", '\u{12A0}': "\u{1228}", '\u{12A5}': "\u{122D}", '\u{12A4}': "\u{122C}", '\u{12A7}': "\u{122F}", '\u{12A5}': "\u{122D}", '\u{12A0}': "\u{1228}", '\u{12A6}': "\u{122E}", '\u{12A2}': "\u{122A}"};
this.VKI_deadkey['\u{12E8}'] = {'\u{12A3}': "\u{12EB}", '\u{12A1}': "\u{12E9}", '\u{12A0}': "\u{12E8}", '\u{12A5}': "\u{12ED}", '\u{12A4}': "\u{12EC}", '\u{12A5}': "\u{12ED}", '\u{12A0}': "\u{12E8}", '\u{12A6}': "\u{12EE}", '\u{12A2}': "\u{12EA}"};
this.VKI_deadkey['\u{1250}'] = {'\u{12A3}': "\u{1253}", '\u{12A1}': "\u{1251}", '\u{12A0}': "\u{1250}", '\u{12A5}': "\u{1255}", '\u{12A4}': "\u{1254}", '\u{12A7}': "\u{125B}", '\u{12A5}': "\u{1255}", '\u{12A0}': "\u{1250}", '\u{12A6}': "\u{1256}", '\u{12A2}': "\u{1252}"};
this.VKI_deadkey['\u{1240}'] = {'\u{12A3}': "\u{1243}", '\u{12A1}': "\u{1241}", '\u{12A0}': "\u{1240}", '\u{12A5}': "\u{1245}", '\u{12A4}': "\u{1244}", '\u{12A7}': "\u{124B}", '\u{12A5}': "\u{1245}", '\u{12A0}': "\u{1240}", '\u{12A6}': "\u{1246}", '\u{12A2}': "\u{1242}"};
this.VKI_deadkey['\u{12A8}'] = {'\u{12A3}': "\u{12AB}", '\u{12A1}': "\u{12A9}", '\u{12A0}': "\u{12A8}", '\u{12A5}': "\u{12AD}", '\u{12A4}': "\u{12AC}", '\u{12A7}': "\u{12B3}", '\u{12A5}': "\u{12AD}", '\u{12A0}': "\u{12A8}", '\u{12A6}': "\u{12AE}", '\u{12A2}': "\u{12AA}"};
this.VKI_deadkey['\u{12F0}'] = {'\u{12A3}': "\u{12F3}", '\u{12A1}': "\u{12F1}", '\u{12A0}': "\u{12F0}", '\u{12A5}': "\u{12F5}", '\u{12A4}': "\u{12F4}", '\u{12A7}': "\u{12F7}", '\u{12A5}': "\u{12F5}", '\u{12A0}': "\u{12F0}", '\u{12A6}': "\u{12F6}", '\u{12A2}': "\u{12F2}"};
this.VKI_deadkey['\u{12B8}'] = {'\u{12A3}': "\u{12BB}", '\u{12A1}': "\u{12B9}", '\u{12A0}': "\u{12B8}", '\u{12A5}': "\u{12C3}", '\u{12A4}': "\u{12BC}", '\u{12A5}': "\u{12C3}", '\u{12A0}': "\u{12B8}", '\u{12A6}': "\u{12BE}", '\u{12A2}': "\u{12BA}"};
this.VKI_deadkey['\u{1308}'] = {'\u{12A3}': "\u{130B}", '\u{12A1}': "\u{1309}", '\u{12A0}': "\u{1308}", '\u{12A5}': "\u{130D}", '\u{12A4}': "\u{130C}", '\u{12A7}': "\u{1313}", '\u{12A5}': "\u{130D}", '\u{12A0}': "\u{1308}", '\u{12A6}': "\u{130E}", '\u{12A2}': "\u{130A}"};
this.VKI_deadkey['\u{1230}'] = {'\u{12A3}': "\u{1233}", '\u{12A1}': "\u{1231}", '\u{12A0}': "\u{1230}", '\u{12A5}': "\u{1235}", '\u{12A4}': "\u{1234}", '\u{12A7}': "\u{1237}", '\u{12A5}': "\u{1235}", '\u{12A0}': "\u{1230}", '\u{12A6}': "\u{1236}", '\u{12A2}': "\u{1232}"};
this.VKI_deadkey['\u{1278}'] = {'\u{12A3}': "\u{127B}", '\u{12A1}': "\u{1279}", '\u{12A0}': "\u{1278}", '\u{12A5}': "\u{127D}", '\u{12A4}': "\u{127C}", '\u{12A7}': "\u{127F}", '\u{12A5}': "\u{127D}", '\u{12A0}': "\u{1278}", '\u{12A6}': "\u{127E}", '\u{12A2}': "\u{127A}"};
this.VKI_deadkey['\u{12D8}'] = {'\u{12A3}': "\u{12DB}", '\u{12A1}': "\u{12D9}", '\u{12A0}': "\u{12D8}", '\u{12A5}': "\u{12DD}", '\u{12A4}': "\u{12DC}", '\u{12A7}': "\u{12DF}", '\u{12A5}': "\u{12DD}", '\u{12A0}': "\u{12D8}", '\u{12A6}': "\u{12DE}", '\u{12A2}': "\u{12DA}"};
this.VKI_deadkey['\u{1348}'] = {'\u{12A3}': "\u{134B}", '\u{12A1}': "\u{1349}", '\u{12A0}': "\u{1348}", '\u{12A5}': "\u{134D}", '\u{12A4}': "\u{134C}", '\u{12A7}': "\u{134F}", '\u{12A5}': "\u{134D}", '\u{12A0}': "\u{1348}", '\u{12A6}': "\u{134E}", '\u{12A2}': "\u{134A}"};
this.VKI_deadkey['\u{1210}'] = {'\u{12A3}': "\u{1213}", '\u{12A1}': "\u{1211}", '\u{12A0}': "\u{1210}", '\u{12A5}': "\u{1215}", '\u{12A4}': "\u{1214}", '\u{12A7}': "\u{1217}", '\u{12A5}': "\u{1215}", '\u{12A0}': "\u{1210}", '\u{12A6}': "\u{1216}", '\u{12A2}': "\u{1212}",'\u{1364}': "\u{1213}", '\u{1366}': "\u{1211}", '\u{AB}': "\u{1210}", '\u{1361}': "\u{1215}", '\u{1368}': "\u{1214}", '\u{1367}': "\u{1217}", '\u{1363}': "\u{1215}", '\u{BB}': "\u{1210}", '\u{1365}': "\u{1216}", '\u{1362}': "\u{1212}"};
this.VKI_deadkey['\u{1268}'] = {'\u{12A3}': "\u{126B}", '\u{12A1}': "\u{1269}", '\u{12A0}': "\u{1268}", '\u{12A5}': "\u{126D}", '\u{12A4}': "\u{126C}", '\u{12A7}': "\u{126F}", '\u{12A5}': "\u{126D}", '\u{12A0}': "\u{1268}", '\u{12A6}': "\u{126E}", '\u{12A2}': "\u{126A}", '\u{1364}': "\u{126B}", '\u{1366}': "\u{1269}", '\u{AB}': "\u{1268}", '\u{1361}': "\u{126D}", '\u{1368}': "\u{126C}", '\u{1367}': "\u{126F}", '\u{1363}': "\u{126D}", '\u{BB}': "\u{1268}", '\u{1365}': "\u{126E}", '\u{1362}': "\u{126A}"};
this.VKI_deadkey['\u{1298}'] = {'\u{12A3}': "\u{129B}", '\u{12A1}': "\u{1299}", '\u{12A0}': "\u{1298}", '\u{12A5}': "\u{129D}", '\u{12A4}': "\u{129C}", '\u{12A7}': "\u{129F}", '\u{12A5}': "\u{129D}", '\u{12A0}': "\u{1298}", '\u{12A6}': "\u{129E}", '\u{12A2}': "\u{129A}", '\u{1364}': "\u{129B}", '\u{1366}': "\u{1299}", '\u{AB}': "\u{1298}", '\u{1361}': "\u{129D}", '\u{1368}': "\u{129C}", '\u{1367}': "\u{129F}", '\u{1363}': "\u{129D}", '\u{BB}': "\u{1298}", '\u{1365}': "\u{129E}", '\u{1362}': "\u{129A}"};
this.VKI_deadkey['\u{1238}'] = {'\u{12A3}': "\u{123B}", '\u{12A1}': "\u{1239}", '\u{12A0}': "\u{1238}", '\u{12A5}': "\u{123D}", '\u{12A4}': "\u{123C}", '\u{12A7}': "\u{123F}", '\u{12A5}': "\u{123D}", '\u{12A0}': "\u{1238}", '\u{12A6}': "\u{123E}", '\u{12A2}': "\u{123A}", '\u{1364}': "\u{123B}", '\u{1366}': "\u{1239}", '\u{AB}': "\u{1238}", '\u{1361}': "\u{123D}", '\u{1368}': "\u{123C}", '\u{1367}': "\u{123F}", '\u{1363}': "\u{123D}", '\u{BB}': "\u{1238}", '\u{1365}': "\u{123E}", '\u{1362}': "\u{123A}"};
this.VKI_deadkey['\u{12D0}'] = {'\u{12A3}': "\u{12D3}", '\u{12A1}': "\u{12D1}", '\u{12A0}': "\u{12D0}", '\u{12A5}': "\u{12D5}", '\u{12A4}': "\u{12D4}", '\u{12A5}': "\u{12D5}", '\u{12A0}': "\u{12D0}", '\u{12A6}': "\u{12D6}", '\u{12A2}': "\u{12D2}", '\u{1364}': "\u{12D3}", '\u{1366}': "\u{12D1}", '\u{AB}': "\u{12D0}", '\u{1361}': "\u{12D5}", '\u{1368}': "\u{12D4}", '\u{1363}': "\u{12D5}", '\u{BB}': "\u{12D0}", '\u{1365}': "\u{12D6}", '\u{1362}': "\u{12D2}"};
this.VKI_deadkey['\u{1328}'] = {'\u{12A3}': "\u{132B}", '\u{12A1}': "\u{1329}", '\u{12A0}': "\u{1328}", '\u{12A5}': "\u{132D}", '\u{12A4}': "\u{132C}", '\u{12A7}': "\u{132F}", '\u{12A5}': "\u{132D}", '\u{12A0}': "\u{1328}", '\u{12A6}': "\u{132E}", '\u{12A2}': "\u{132A}", '\u{1364}': "\u{132B}", '\u{1366}': "\u{1329}", '\u{AB}': "\u{1328}", '\u{1361}': "\u{132D}", '\u{1368}': "\u{132C}", '\u{1367}': "\u{132F}", '\u{1363}': "\u{132D}", '\u{BB}': "\u{1328}", '\u{1365}': "\u{132E}", '\u{1362}': "\u{132A}"};
this.VKI_deadkey['\u{1340}'] = {'\u{12A3}': "\u{1343}", '\u{12A1}': "\u{1341}", '\u{12A0}': "\u{1340}", '\u{12A5}': "\u{1345}", '\u{12A4}': "\u{1344}", '\u{12A5}': "\u{1345}", '\u{12A0}': "\u{1340}", '\u{12A6}': "\u{1346}", '\u{12A2}': "\u{1342}", '\u{1364}': "\u{1343}", '\u{1366}': "\u{1341}",'\u{AB}': "\u{1340}", '\u{1361}': "\u{1345}", '\u{1368}': "\u{1344}", '\u{1363}': "\u{1345}", '\u{BB}': "\u{1340}", '\u{1365}': "\u{1346}", '\u{1362}': "\u{1342}"};
this.VKI_deadkey['\u{1338}'] = {'\u{12A3}': "\u{133A}", '\u{12A1}': "\u{1339}", '\u{12A0}': "\u{1338}", '\u{12A5}': "\u{133D}", '\u{12A4}': "\u{133C}", '\u{12A7}': "\u{133F}", '\u{12A5}': "\u{133D}", '\u{12A0}': "\u{1338}", '\u{12A6}': "\u{133E}", '\u{12A2}': "\u{133A}", '\u{1364}': "\u{133A}", '\u{1366}': "\u{1339}", '\u{AB}': "\u{1338}", '\u{1361}': "\u{133D}", '\u{1368}': "\u{133C}", '\u{1367}': "\u{133F}", '\u{1363}': "\u{133D}", '\u{BB}': "\u{1338}", '\u{1365}': "\u{133E}", '\u{1362}': "\u{133A}"};
this.VKI_deadkey['\u{1280}'] = {'\u{12A3}': "\u{1283}", '\u{12A1}': "\u{1281}", '\u{12A0}': "\u{1280}", '\u{12A5}': "\u{1285}", '\u{12A4}': "\u{1284}", '\u{12A7}': "\u{128B}", '\u{12A5}': "\u{1285}", '\u{12A0}': "\u{1280}", '\u{12A6}': "\u{1286}", '\u{12A2}': "\u{128A}", '\u{1364}': "\u{1283}", '\u{1366}': "\u{1281}", '\u{AB}': "\u{1280}", '\u{1361}': "\u{1285}", '\u{1368}': "\u{1284}", '\u{1367}': "\u{128B}", '\u{1363}': "\u{1285}", '\u{BB}': "\u{1280}", '\u{1365}': "\u{1286}", '\u{1362}': "\u{128A}"};
this.VKI_deadkey['\u{1288}'] = {'\u{12A3}': "\u{128B}", '\u{12A0}': "\u{1288}", '\u{12A5}': "\u{128D}", '\u{12A4}': "\u{128C}", '\u{12A5}': "\u{128D}", '\u{12A0}': "\u{1288}", '\u{12A2}': "\u{128A}", '\u{1364}': "\u{128B}", '\u{AB}': "\u{1288}", '\u{1361}': "\u{128D}", '\u{1368}': "\u{128C}", '\u{1363}': "\u{128D}", '\u{BB}': "\u{1288}", '\u{1362}': "\u{128A}"};
this.VKI_deadkey['\u{1258}'] = {'\u{12A3}': "\u{125B}", '\u{12A0}': "\u{1258}", '\u{12A5}': "\u{125D}", '\u{12A4}': "\u{125C}", '\u{12A5}': "\u{125D}", '\u{12A0}': "\u{1258}", '\u{12A2}': "\u{125A}", '\u{1364}': "\u{125B}", '\u{AB}': "\u{1258}", '\u{1361}': "\u{125D}", '\u{1368}': "\u{125C}", '\u{1363}': "\u{125D}", '\u{BB}': "\u{1258}", '\u{1362}': "\u{125A}"};
this.VKI_deadkey['\u{1248}'] = {'\u{12A3}': "\u{124B}", '\u{12A0}': "\u{1248}", '\u{12A5}': "\u{124D}", '\u{12A4}': "\u{124C}", '\u{12A5}': "\u{124D}", '\u{12A0}': "\u{1248}", '\u{12A2}': "\u{124A}", '\u{1364}': "\u{124B}", '\u{AB}': "\u{1248}", '\u{1361}': "\u{124D}", '\u{1368}': "\u{124C}", '\u{1363}': "\u{124D}", '\u{BB}': "\u{1248}", '\u{1362}': "\u{124A}"};
this.VKI_deadkey['\u{12B0}'] = {'\u{12A3}': "\u{12B3}", '\u{12A0}': "\u{12B0}", '\u{12A5}': "\u{12B5}", '\u{12A4}': "\u{12B4}", '\u{12A5}': "\u{12B5}", '\u{12A0}': "\u{12B0}", '\u{12A2}': "\u{12B2}", '\u{1364}': "\u{12B3}", '\u{AB}': "\u{12B0}", '\u{1361}': "\u{12B5}", '\u{1368}': "\u{12B4}", '\u{1363}': "\u{12B5}", '\u{BB}': "\u{12B0}", '\u{1362}': "\u{12B2}"};
this.VKI_deadkey['\u{1300}'] = {'\u{12A3}': "\u{1303}", '\u{12A1}': "\u{1301}", '\u{12A0}': "\u{1300}", '\u{12A5}': "\u{1305}", '\u{12A4}': "\u{1304}", '\u{12A7}': "\u{1307}", '\u{12A5}': "\u{1305}", '\u{12A0}': "\u{1300}", '\u{12A6}': "\u{1306}", '\u{12A2}': "\u{1302}", '\u{1364}': "\u{1303}", '\u{1366}': "\u{1301}", '\u{AB}': "\u{1300}", '\u{1361}': "\u{1305}", '\u{1368}': "\u{1304}", '\u{1367}': "\u{1307}", '\u{1363}': "\u{1305}", '\u{BB}': "\u{1300}", '\u{1365}': "\u{1306}", '\u{1362}': "\u{1302}"};
this.VKI_deadkey['\u{12C0}'] = {'\u{12A3}': "\u{12C3}", '\u{12A0}': "\u{12C0}", '\u{12A5}': "\u{12C5}", '\u{12A4}': "\u{12C4}", '\u{12A5}': "\u{12C5}", '\u{12A0}': "\u{12C0}", '\u{12A2}': "\u{12C2}", '\u{1364}': "\u{12C3}", '\u{AB}': "\u{12C0}", '\u{1361}': "\u{12C5}", '\u{1368}': "\u{12C4}", '\u{1363}': "\u{12C5}", '\u{BB}': "\u{12C0}", '\u{1362}': "\u{12C2}"};
this.VKI_deadkey['\u{1310}'] = {'\u{12A3}': "\u{1313}", '\u{12A0}': "\u{1310}", '\u{12A5}': "\u{1315}", '\u{12A4}': "\u{1314}", '\u{12A5}': "\u{1315}", '\u{12A0}': "\u{1310}", '\u{12A2}': "\u{1312}", '\u{1364}': "\u{1313}", '\u{AB}': "\u{1310}", '\u{1361}': "\u{1315}", '\u{1368}': "\u{1314}", '\u{1363}': "\u{1315}", '\u{BB}': "\u{1310}", '\u{1362}': "\u{1312}"};
this.VKI_deadkey['\u{1220}'] = {'\u{12A3}': "\u{1223}", '\u{12A1}': "\u{1221}", '\u{12A0}': "\u{1220}", '\u{12A5}': "\u{1225}", '\u{12A4}': "\u{1224}", '\u{12A7}': "\u{1227}", '\u{12A5}': "\u{1225}", '\u{12A0}': "\u{1220}", '\u{12A6}': "\u{1226}", '\u{12A2}': "\u{1222}", '\u{1364}': "\u{1223}", '\u{1366}': "\u{1221}", '\u{AB}': "\u{1220}", '\u{1361}': "\u{1225}", '\u{1368}': "\u{1224}", '\u{1367}': "\u{1227}", '\u{1363}': "\u{1225}", '\u{BB}': "\u{1220}", '\u{1365}': "\u{1226}", '\u{1362}': "\u{1222}"};
this.VKI_deadkey['\u{1330}'] = {'\u{12A3}': "\u{1333}", '\u{12A1}': "\u{1331}", '\u{12A0}': "\u{1330}", '\u{12A5}': "\u{1335}", '\u{12A4}': "\u{1334}", '\u{12A7}': "\u{1337}", '\u{12A5}': "\u{1335}", '\u{12A0}': "\u{1330}", '\u{12A6}': "\u{1336}", '\u{12A2}': "\u{1332}", '\u{1364}': "", '\u{1366}': "\u{1331}", '\u{AB}': "\u{1330}", '\u{1361}': "\u{1335}", '\u{1368}': "\u{1334}", '\u{1367}': "\u{1337}", '\u{1363}': "\u{1335}", '\u{BB}': "\u{1330}", '\u{1365}': "\u{1336}", '\u{1362}': "\u{1332}"};
this.VKI_deadkey['\u{12E0}'] = {'\u{12A3}': "\u{12E3}", '\u{12A1}': "\u{12E1}", '\u{12A0}': "\u{12E0}", '\u{12A5}': "\u{12E5}", '\u{12A4}': "\u{12E4}", '\u{12A7}': "\u{12E7}", '\u{12A5}': "\u{12E5}", '\u{12A0}': "\u{12E0}", '\u{12A6}': "\u{12E6}", '\u{12A2}': "\u{12E2}", '\u{1364}': "\u{12E3}", '\u{1366}': "\u{12E1}", '\u{AB}': "\u{12E0}", '\u{1361}': "\u{12E5}", '\u{1368}': "\u{12E4}", '\u{1367}': "\u{12E7}", '\u{1363}': "\u{12E5}", '\u{BB}': "\u{12E0}", '\u{1365}': "\u{12E6}", '\u{1362}': "\u{12E2}"};
this.VKI_deadkey['\u{1350}'] = {'\u{12A3}': "\u{1353}", '\u{12A1}': "\u{1351}", '\u{12A0}': "\u{1350}", '\u{12A5}': "\u{1350}", '\u{12A4}': "\u{1354}", '\u{12A7}': "\u{1357}", '\u{12A5}': "\u{1355}", '\u{12A0}': "\u{1350}", '\u{12A6}': "\u{1356}", '\u{12A2}': "\u{1352}", '\u{1364}': "\u{1353}", '\u{1366}': "\u{1351}", '\u{AB}': "\u{1350}", '\u{1361}': "\u{1350}", '\u{1368}': "\u{1354}", '\u{1367}': "\u{1357}", '\u{1363}': "\u{1355}", '\u{BB}': "\u{1350}", '\u{1365}': "\u{1356}", '\u{1362}': "\u{1352}"};
<?php } ?>

  /* ***** Define Symbols **************************************** */
  this.VKI_symbol = {
    '\u00a0': "NB\nSP", '\u200b': "ZW\nSP", '\u200c': "ZW\nNJ", '\u200d': "ZW\nJ"
  };


  /* ***** Layout Number Pad ************************************* */
  this.VKI_numpad = [
    [["$"], ["\u00a3"], ["\u20ac"], ["\u00a5"]],
    [["7"], ["8"], ["9"], ["/"]],
    [["4"], ["5"], ["6"], ["*"]],
    [["1"], ["2"], ["3"], ["-"]],
    [["0"], ["."], ["="], ["+"]]
  ];


  /* ****************************************************************
   * Attach the keyboard to an element
   *
   */
  VKI_attach = function(elem) {
    if (elem.getAttribute("VKI_attached")) return false;
    if (self.VKI_imageURI) {
      var keybut = document.createElement('img');
          keybut.src = self.VKI_imageURI;
          keybut.alt = self.VKI_i18n['01'];
          keybut.className = "keyboardInputInitiator";
          keybut.title = self.VKI_i18n['01'];
          keybut.elem = elem;
          keybut.onclick = function(e) {
            e = e || event;
            if (e.stopPropagation) { e.stopPropagation(); } else e.cancelBubble = true;
            self.VKI_show(this.elem);
          };
      elem.parentNode.insertBefore(keybut, (elem.dir == "rtl") ? elem : elem.nextSibling);
    } else {
      elem.onfocus = function() {
        if (self.VKI_target != this) {
          if (self.VKI_target) self.VKI_close();
          self.VKI_show(this);
        }
      };
      elem.onclick = function() {
        if (!self.VKI_target) self.VKI_show(this);
      }
    }
    elem.setAttribute("VKI_attached", 'true');
    if (self.VKI_isIE) {
      elem.onclick = elem.onselect = elem.onkeyup = function(e) {
        if ((e || event).type != "keyup" || !this.readOnly)
          this.range = document.selection.createRange();
      };
    }
    VKI_addListener(elem, 'click', function(e) {
      if (self.VKI_target == this) {
        e = e || event;
        if (e.stopPropagation) { e.stopPropagation(); } else e.cancelBubble = true;
      } return false;
    }, false);
    if (self.VKI_isMoz)
      elem.addEventListener('blur', function() { this.setAttribute('_scrollTop', this.scrollTop); }, false);
  };


  /* ***** Find tagged input & textarea elements ***************** */
  function VKI_buildKeyboardInputs() {
    var inputElems = [
      document.getElementsByTagName('input'),
      document.getElementsByTagName('textarea')
    ];
    for (var x = 0, elem; elem = inputElems[x++];)
      for (var y = 0, ex; ex = elem[y++];)
        if (ex.nodeName == "TEXTAREA" || ex.type == "text" || ex.type == "password")
				  if (ex.className.indexOf("<?php echo $params->get('apply_specific_classname'); ?>") > -1) VKI_attach(ex);

    VKI_addListener(document.documentElement, 'click', function(e) { self.VKI_close(); }, false);
  }


  /* ****************************************************************
   * Common mouse event actions
   *
   */
  function VKI_mouseEvents(elem) {
    if (elem.nodeName == "TD") {
      if (!elem.click) elem.click = function() {
        var evt = this.ownerDocument.createEvent('MouseEvents');
        evt.initMouseEvent('click', true, true, this.ownerDocument.defaultView, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
        this.dispatchEvent(evt);
      };
      elem.VKI_clickless = 0;
      VKI_addListener(elem, 'dblclick', function() { return false; }, false);
    }
    VKI_addListener(elem, 'mouseover', function() {
      if (this.nodeName == "TD" && self.VKI_clickless) {
        var _self = this;
        clearTimeout(this.VKI_clickless);
        this.VKI_clickless = setTimeout(function() { _self.click(); }, self.VKI_clickless);
      }
      if (self.VKI_isIE) this.className += " hover";
    }, false);
    VKI_addListener(elem, 'mouseout', function() {
      if (this.nodeName == "TD") clearTimeout(this.VKI_clickless);
      if (self.VKI_isIE) this.className = this.className.replace(/ ?(hover|pressed) ?/g, "");
    }, false);
    VKI_addListener(elem, 'mousedown', function() {
      if (this.nodeName == "TD") clearTimeout(this.VKI_clickless);
      if (self.VKI_isIE) this.className += " pressed";
    }, false);
    VKI_addListener(elem, 'mouseup', function() {
      if (this.nodeName == "TD") clearTimeout(this.VKI_clickless);
      if (self.VKI_isIE) this.className = this.className.replace(/ ?pressed ?/g, "");
    }, false);
  }


  /* ***** Build the keyboard interface ************************** */
  this.VKI_keyboard = document.createElement('table');
  this.VKI_keyboard.id = "keyboardInputMaster";
  this.VKI_keyboard.dir = "ltr";
  this.VKI_keyboard.cellSpacing = "0";
  this.VKI_keyboard.reflow = function() {
    this.style.width = "50px";
    var foo = this.offsetWidth;
    this.style.width = "";
  };
  VKI_addListener(this.VKI_keyboard, 'click', function(e) {
    e = e || event;
    if (e.stopPropagation) { e.stopPropagation(); } else e.cancelBubble = true;
    return false;
  }, false);

  if (!this.VKI_layout[this.VKI_kt])
    return alert('No keyboard named "' + this.VKI_kt + '"');

  this.VKI_langCode = {};
  var thead = document.createElement('thead');
    var tr = document.createElement('tr');
      var th = document.createElement('th');
          th.colSpan = "2";

        var kbSelect = document.createElement('div');
            kbSelect.title = this.VKI_i18n['02'];
          VKI_addListener(kbSelect, 'click', function() {
            var ol = this.getElementsByTagName('ol')[0];
            if (!ol.style.display) {
                ol.style.display = "block";
              var li = ol.getElementsByTagName('li');
              for (var x = 0, scr = 0; x < li.length; x++) {
                if (VKI_kt == li[x].firstChild.nodeValue) {
                  li[x].className = "selected";
                  scr = li[x].offsetTop - li[x].offsetHeight * 2;
                } else li[x].className = "";
              } setTimeout(function() { ol.scrollTop = scr; }, 0);
            } else ol.style.display = "";
          }, false);
            kbSelect.appendChild(document.createTextNode(this.VKI_kt));
            kbSelect.appendChild(document.createTextNode(this.VKI_isIElt8 ? " \u2193" : " \u25be"));
            kbSelect.langCount = 0;
          var ol = document.createElement('ol');
            for (ktype in this.VKI_layout) {
              if (typeof this.VKI_layout[ktype] == "object") {
                if (!this.VKI_layout[ktype].lang) this.VKI_layout[ktype].lang = [];
                for (var x = 0; x < this.VKI_layout[ktype].lang.length; x++)
                  this.VKI_langCode[this.VKI_layout[ktype].lang[x].toLowerCase().replace(/-/g, "_")] = ktype;
                var li = document.createElement('li');
                    li.title = this.VKI_layout[ktype].name;
                  VKI_addListener(li, 'click', function(e) {
                    e = e || event;
                    if (e.stopPropagation) { e.stopPropagation(); } else e.cancelBubble = true;
                    this.parentNode.style.display = "";
                    self.VKI_kts = self.VKI_kt = kbSelect.firstChild.nodeValue = this.firstChild.nodeValue;
                    self.VKI_buildKeys();
                    self.VKI_position(true);
                  }, false);
                  VKI_mouseEvents(li);
                    li.appendChild(document.createTextNode(ktype));
                  ol.appendChild(li);
                kbSelect.langCount++;
              }
            } kbSelect.appendChild(ol);
          if (kbSelect.langCount > 1) th.appendChild(kbSelect);
        this.VKI_langCode.index = [];
        for (prop in this.VKI_langCode)
          if (prop != "index" && typeof this.VKI_langCode[prop] == "string")
            this.VKI_langCode.index.push(prop);
        this.VKI_langCode.index.sort();
        this.VKI_langCode.index.reverse();

        if (this.VKI_numberPad) {
          var span = document.createElement('span');
              span.appendChild(document.createTextNode("#"));
              span.title = this.VKI_i18n['00'];
            VKI_addListener(span, 'click', function() {
              kbNumpad.style.display = (!kbNumpad.style.display) ? "none" : "";
              self.VKI_position(true);
            }, false);
            VKI_mouseEvents(span);
            th.appendChild(span);
        }

        this.VKI_kbsize = function(e) {
          self.VKI_size = Math.min(5, Math.max(1, self.VKI_size));
          self.VKI_keyboard.className = self.VKI_keyboard.className.replace(/ ?keyboardInputSize\d ?/, "");
          if (self.VKI_size != 2) self.VKI_keyboard.className += " keyboardInputSize" + self.VKI_size;
          self.VKI_position(true);
          if (self.VKI_isOpera) self.VKI_keyboard.reflow();
        };
        if (this.VKI_sizeAdj) {
          var small = document.createElement('small');
              small.title = this.VKI_i18n['10'];
            VKI_addListener(small, 'click', function() {
              --self.VKI_size;
              self.VKI_kbsize();
            }, false);
            VKI_mouseEvents(small);
              small.appendChild(document.createTextNode(this.VKI_isIElt8 ? "\u2193" : "\u21d3"));
            th.appendChild(small);
          var big = document.createElement('big');
              big.title = this.VKI_i18n['11'];
            VKI_addListener(big, 'click', function() {
              ++self.VKI_size;
              self.VKI_kbsize();
            }, false);
            VKI_mouseEvents(big);
              big.appendChild(document.createTextNode(this.VKI_isIElt8 ? "\u2191" : "\u21d1"));
            th.appendChild(big);
        }

        var span = document.createElement('span');
            span.appendChild(document.createTextNode(this.VKI_i18n['07']));
            span.title = this.VKI_i18n['08'];
          VKI_addListener(span, 'click', function() {
            self.VKI_target.value = "";
            self.VKI_target.focus();
            return false;
          }, false);
          VKI_mouseEvents(span);
          th.appendChild(span);

        var strong = document.createElement('strong');
            strong.appendChild(document.createTextNode('X'));
            strong.title = this.VKI_i18n['06'];
          VKI_addListener(strong, 'click', function() { self.VKI_close(); }, false);
          VKI_mouseEvents(strong);
          th.appendChild(strong);

        tr.appendChild(th);
      thead.appendChild(tr);
  this.VKI_keyboard.appendChild(thead);

  var tbody = document.createElement('tbody');
    var tr = document.createElement('tr');
      var td = document.createElement('td');
        var div = document.createElement('div');

        if (this.VKI_deadBox) {
          var label = document.createElement('label');
            var checkbox = document.createElement('input');
                checkbox.type = "checkbox";
                checkbox.title = this.VKI_i18n['03'] + ": " + ((this.VKI_deadkeysOn) ? this.VKI_i18n['04'] : this.VKI_i18n['05']);
                checkbox.defaultChecked = this.VKI_deadkeysOn;
              VKI_addListener(checkbox, 'click', function() {
                this.title = self.VKI_i18n['03'] + ": " + ((this.checked) ? self.VKI_i18n['04'] : self.VKI_i18n['05']);
                self.VKI_modify("");
                return true;
              }, false);
              label.appendChild(checkbox);
                checkbox.checked = this.VKI_deadkeysOn;
            div.appendChild(label);
          this.VKI_deadkeysOn = checkbox;
        } else this.VKI_deadkeysOn.checked = this.VKI_deadkeysOn;

        if (this.VKI_showVersion) {
          var vr = document.createElement('var');
              vr.title = this.VKI_i18n['09'] + " " + this.VKI_version;
              vr.appendChild(document.createTextNode("v" + this.VKI_version));
            div.appendChild(vr);
        } td.appendChild(div);
        tr.appendChild(td);

      var kbNumpad = document.createElement('td');
          kbNumpad.id = "keyboardInputNumpad";
        if (!this.VKI_numberPadOn) kbNumpad.style.display = "none";
        var ntable = document.createElement('table');
            ntable.cellSpacing = "0";
          var ntbody = document.createElement('tbody');
            for (var x = 0; x < this.VKI_numpad.length; x++) {
              var ntr = document.createElement('tr');
                for (var y = 0; y < this.VKI_numpad[x].length; y++) {
                  var ntd = document.createElement('td');
                    VKI_addListener(ntd, 'click', VKI_keyClick, false);
                    VKI_mouseEvents(ntd);
                      ntd.appendChild(document.createTextNode(this.VKI_numpad[x][y]));
                    ntr.appendChild(ntd);
                } ntbody.appendChild(ntr);
            } ntable.appendChild(ntbody);
          kbNumpad.appendChild(ntable);
        tr.appendChild(kbNumpad);
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
   * Private table cell attachment function for generic characters
   *
   */
  function VKI_keyClick() {
    var done = false, character = "\xa0";
    if (this.firstChild.nodeName.toLowerCase() != "small") {
      if ((character = this.firstChild.nodeValue) == "\xa0") return false;
    } else character = this.firstChild.getAttribute('char');
    if (self.VKI_deadkeysOn.checked && self.VKI_dead) {
      if (self.VKI_dead != character) {
        if (character != " ") {
          if (self.VKI_deadkey[self.VKI_dead][character]) {
            self.VKI_insert(self.VKI_deadkey[self.VKI_dead][character]);
            done = true;
          }
        } else {
          self.VKI_insert(self.VKI_dead);
          done = true;
        }
      } else done = true;
    } self.VKI_dead = false;

    if (!done) {
      if (self.VKI_deadkeysOn.checked && self.VKI_deadkey[character]) {
        self.VKI_dead = character;
        this.className += " dead";
        if (self.VKI_shift) self.VKI_modify("<?php echo $params->get('vki_shift'); ?>");
        if (self.VKI_altgr) self.VKI_modify("<?php echo $params->get('vki_altgr'); ?>");
      } else self.VKI_insert(character);
    } self.VKI_modify("");
    return false;
  }


  /* ****************************************************************
   * Build or rebuild the keyboard keys
   *
   */
  this.VKI_buildKeys = function() {
    this.VKI_shift = this.VKI_shiftlock = this.VKI_altgr = this.VKI_altgrlock = this.VKI_dead = false;
    var container = this.VKI_keyboard.tBodies[0].getElementsByTagName('div')[0];
    var tables = container.getElementsByTagName('table');
    for (var x = tables.length - 1; x >= 0; x--) container.removeChild(tables[x]);

    for (var x = 0, hasDeadKey = false, lyt; lyt = this.VKI_layout[this.VKI_kt].keys[x++];) {
      var table = document.createElement('table');
          table.cellSpacing = "0";
        if (lyt.length <= this.VKI_keyCenter) table.className = "keyboardInputCenter";
        var tbody = document.createElement('tbody');
          var tr = document.createElement('tr');
            for (var y = 0, lkey; lkey = lyt[y++];) {
              var td = document.createElement('td');
                if (this.VKI_symbol[lkey[0]]) {
                  var text = this.VKI_symbol[lkey[0]].split("\n");
                  var small = document.createElement('small');
                      small.setAttribute('char', lkey[0]);
                  for (var z = 0; z < text.length; z++) {
                    if (z) small.appendChild(document.createElement("br"));
                    small.appendChild(document.createTextNode(text[z]));
                  } td.appendChild(small);
                } else td.appendChild(document.createTextNode(lkey[0] || "\xa0"));

                var className = [];
                if (this.VKI_deadkeysOn.checked)
                  for (key in this.VKI_deadkey)
                    if (key === lkey[0]) { className.push("deadkey"); break; }
                if (lyt.length > this.VKI_keyCenter && y == lyt.length) className.push("last");
                if (lkey[0] == " " || lkey[1] == " ") className.push("space");
                  td.className = className.join(" ");

                switch (lkey[1]) {
                  case "<?php echo $params->get('vki_caps'); ?>": case "<?php echo $params->get('vki_shift'); ?>":
                  case "<?php echo $params->get('vki_alt'); ?>": case "<?php echo $params->get('vki_altgr'); ?>": case "<?php echo $params->get('vki_altlk'); ?>":
                    VKI_addListener(td, 'click', (function(type) { return function() { self.VKI_modify(type); return false; }})(lkey[1]), false);
                    break;
                  case "<?php echo $params->get('vki_tab'); ?>":
                    VKI_addListener(td, 'click', function() {
                      if (self.VKI_activeTab) {
                        if (self.VKI_target.form) {
                          var target = self.VKI_target, elems = target.form.elements;
                          self.VKI_close();
                          for (var z = 0, me = false, j = -1; z < elems.length; z++) {
                            if (j == -1 && elems[z].getAttribute("VKI_attached")) j = z;
                            if (me) {
                              if (self.VKI_activeTab == 1 && elems[z]) break;
                              if (elems[z].getAttribute("VKI_attached")) break;
                            } else if (elems[z] == target) me = true;
                          } if (z == elems.length) z = Math.max(j, 0);
                          if (elems[z].getAttribute("VKI_attached")) {
                            self.VKI_show(elems[z]);
                          } else elems[z].focus();
                        } else self.VKI_target.focus();
                      } else self.VKI_insert("\t");
                      return false;
                    }, false);
                    break;
                  case "<?php echo $params->get('vki_bksp'); ?>":
                    VKI_addListener(td, 'click', function() {
                      self.VKI_target.focus();
                      if (self.VKI_target.setSelectionRange && !self.VKI_target.readOnly) {
                        var rng = [self.VKI_target.selectionStart, self.VKI_target.selectionEnd];
                        if (rng[0] < rng[1]) rng[0]++;
                        self.VKI_target.value = self.VKI_target.value.substr(0, rng[0] - 1) + self.VKI_target.value.substr(rng[1]);
                        self.VKI_target.setSelectionRange(rng[0] - 1, rng[0] - 1);
                      } else if (self.VKI_target.createTextRange && !self.VKI_target.readOnly) {
                        try {
                          self.VKI_target.range.select();
                        } catch(e) { self.VKI_target.range = document.selection.createRange(); }
                        if (!self.VKI_target.range.text.length) self.VKI_target.range.moveStart('character', -1);
                        self.VKI_target.range.text = "";
                      } else self.VKI_target.value = self.VKI_target.value.substr(0, self.VKI_target.value.length - 1);
                      if (self.VKI_shift) self.VKI_modify("<?php echo $params->get('vki_shift'); ?>");
                      if (self.VKI_altgr) self.VKI_modify("<?php echo $params->get('vki_altgr'); ?>");
                      self.VKI_target.focus();
                      return true;
                    }, false);
                    break;
                  case "<?php echo $params->get('vki_enter'); ?>":
                    VKI_addListener(td, 'click', function() {
                      if (self.VKI_target.nodeName != "TEXTAREA") {
                        if (self.VKI_enterSubmit && self.VKI_target.form) {
                          for (var z = 0, subm = false; z < self.VKI_target.form.elements.length; z++)
                            if (self.VKI_target.form.elements[z].type == "submit") subm = true;
                          if (!subm) self.VKI_target.form.submit();
                        }
                        self.VKI_close();
                      } else self.VKI_insert("\n");
                      return true;
                    }, false);
                    break;
                  default:
                    VKI_addListener(td, 'click', VKI_keyClick, false);

                } VKI_mouseEvents(td);
                tr.appendChild(td);
              for (var z = 0; z < 4; z++)
                if (this.VKI_deadkey[lkey[z] = lkey[z] || ""]) hasDeadKey = true;
            } tbody.appendChild(tr);
          table.appendChild(tbody);
        container.appendChild(table);
    }
    if (this.VKI_deadBox)
      this.VKI_deadkeysOn.style.display = (hasDeadKey) ? "inline" : "none";
    if (this.VKI_isIE6) {
      this.VKI_iframe.style.width = this.VKI_keyboard.offsetWidth + "px";
      this.VKI_iframe.style.height = this.VKI_keyboard.offsetHeight + "px";
    }
  };

  this.VKI_buildKeys();
  VKI_addListener(this.VKI_keyboard, 'selectstart', function() { return false; }, false);
  this.VKI_keyboard.unselectable = "on";
  if (this.VKI_isOpera)
    VKI_addListener(this.VKI_keyboard, 'mousedown', function() { return false; }, false);


  /* ****************************************************************
   * Controls modifier keys
   *
   */
  this.VKI_modify = function(type) {
    switch (type) {
      case "<?php echo $params->get('vki_alt'); ?>":
      case "<?php echo $params->get('vki_altgr'); ?>": this.VKI_altgr = !this.VKI_altgr; break;
      case "<?php echo $params->get('vki_altlk'); ?>": this.VKI_altgr = 0; this.VKI_altgrlock = !this.VKI_altgrlock; break;
      case "<?php echo $params->get('vki_caps'); ?>": this.VKI_shift = 0; this.VKI_shiftlock = !this.VKI_shiftlock; break;
      case "<?php echo $params->get('vki_shift'); ?>": this.VKI_shift = !this.VKI_shift; break;
    } var vchar = 0;
    if (!this.VKI_shift != !this.VKI_shiftlock) vchar += 1;
    if (!this.VKI_altgr != !this.VKI_altgrlock) vchar += 2;

    var tables = this.VKI_keyboard.tBodies[0].getElementsByTagName('div')[0].getElementsByTagName('table');
    for (var x = 0; x < tables.length; x++) {
      var tds = tables[x].getElementsByTagName('td');
      for (var y = 0; y < tds.length; y++) {
        var className = [], lkey = this.VKI_layout[this.VKI_kt].keys[x][y];

        switch (lkey[1]) {
          case "<?php echo $params->get('vki_alt'); ?>":
          case "<?php echo $params->get('vki_altgr'); ?>":
            if (this.VKI_altgr) className.push("pressed");
            break;
          case "<?php echo $params->get('vki_altlk'); ?>":
            if (this.VKI_altgrlock) className.push("pressed");
            break;
          case "<?php echo $params->get('vki_shift'); ?>":
            if (this.VKI_shift) className.push("pressed");
            break;
          case "<?php echo $params->get('vki_caps'); ?>":
            if (this.VKI_shiftlock) className.push("pressed");
            break;
          case "<?php echo $params->get('vki_tab'); ?>": case "<?php echo $params->get('vki_enter'); ?>": case "<?php echo $params->get('vki_bksp'); ?>": break;
          default:
            if (type) {
              tds[y].removeChild(tds[y].firstChild);
              if (this.VKI_symbol[lkey[vchar]]) {
                var text = this.VKI_symbol[lkey[vchar]].split("\n");
                var small = document.createElement('small');
                    small.setAttribute('char', lkey[vchar]);
                for (var z = 0; z < text.length; z++) {
                  if (z) small.appendChild(document.createElement("br"));
                  small.appendChild(document.createTextNode(text[z]));
                } tds[y].appendChild(small);
              } else tds[y].appendChild(document.createTextNode(lkey[vchar] || "\xa0"));
            }
            if (this.VKI_deadkeysOn.checked) {
              var character = tds[y].firstChild.nodeValue || tds[y].firstChild.className;
              if (this.VKI_dead) {
                if (character == this.VKI_dead) className.push("pressed");
                if (this.VKI_deadkey[this.VKI_dead][character]) className.push("target");
              }
              if (this.VKI_deadkey[character]) className.push("deadkey");
            }
        }

        if (y == tds.length - 1 && tds.length > this.VKI_keyCenter) className.push("last");
        if (lkey[0] == " " || lkey[1] == " ") className.push("space");
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
      if (this.VKI_target.setSelectionRange && !this.VKI_target.readOnly && !this.VKI_isIE) {
        var rng = [this.VKI_target.selectionStart, this.VKI_target.selectionEnd];
        this.VKI_target.value = this.VKI_target.value.substr(0, rng[0]) + text + this.VKI_target.value.substr(rng[1]);
        if (text == "\n" && this.VKI_isOpera) rng[0]++;
        this.VKI_target.setSelectionRange(rng[0] + text.length, rng[0] + text.length);
      } else if (this.VKI_target.createTextRange && !this.VKI_target.readOnly) {
        try {
          this.VKI_target.range.select();
        } catch(e) { this.VKI_target.range = document.selection.createRange(); }
        this.VKI_target.range.text = text;
        this.VKI_target.range.collapse(true);
        this.VKI_target.range.select();
      } else this.VKI_target.value += text;
      if (this.VKI_shift) this.VKI_modify("<?php echo $params->get('vki_shift'); ?>");
      if (this.VKI_altgr) this.VKI_modify("<?php echo $params->get('vki_altgr'); ?>");
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
        var chg = false, sub = [], lang = this.VKI_target.lang.toLowerCase().replace(/-/g, "_");
        for (var x = 0, chg = false; !chg && x < this.VKI_langCode.index.length; x++)
          if (lang.indexOf(this.VKI_langCode.index[x]) == 0)
            chg = kbSelect.firstChild.nodeValue = this.VKI_kt = this.VKI_langCode[this.VKI_langCode.index[x]];
        if (chg) this.VKI_buildKeys();
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
      if (this.VKI_isOpera) this.VKI_keyboard.reflow();

      this.VKI_position(true);
      if (self.VKI_isMoz || self.VKI_isWebKit) this.VKI_position(true);
      this.VKI_target.blur();
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
        var iPos = VKI_findPos(self.VKI_target), scr = self.VKI_target;
        while (scr = scr.parentNode) {
          if (scr == document.body) break;
          if (scr.scrollHeight > scr.offsetHeight || scr.scrollWidth > scr.offsetWidth) {
            if (!scr.getAttribute("VKI_scrollListener")) {
              scr.setAttribute("VKI_scrollListener", true);
              VKI_addListener(scr, 'scroll', function() { self.VKI_position(true); }, false);
            } // Check if the input is in view
            var pPos = VKI_findPos(scr), oTop = iPos[1] - pPos[1], oLeft = iPos[0] - pPos[0];
            var top = oTop + self.VKI_target.offsetHeight;
            var left = oLeft + self.VKI_target.offsetWidth;
            var bottom = scr.offsetHeight - oTop - self.VKI_target.offsetHeight;
            var right = scr.offsetWidth - oLeft - self.VKI_target.offsetWidth;
            self.VKI_keyboard.style.display = (top < 0 || left < 0 || bottom < 0 || right < 0) ? "none" : "";
            if (self.VKI_isIE6) self.VKI_iframe.style.display = (top < 0 || left < 0 || bottom < 0 || right < 0) ? "none" : "";
          }
        }
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
        kbSelect.firstChild.nodeValue = this.VKI_kt = this.VKI_kts;
        this.VKI_buildKeys();
      } kbSelect.getElementsByTagName('ol')[0].style.display = "";;
      this.VKI_target.focus();
      if (this.VKI_isIE) {
        setTimeout(function() { self.VKI_target = false; }, 0);
      } else this.VKI_target = false;
    }
  };


  /* ***** Private functions *************************************** */
  function VKI_addListener(elem, type, func, cap) {
    if (elem.addEventListener) {
      elem.addEventListener(type, function(e) { func.call(elem, e); }, cap);
    } else if (elem.attachEvent)
      elem.attachEvent('on' + type, function() { func.call(elem); });
  }

  function VKI_findPos(obj) {
    var curleft = curtop = 0, scr = obj;
    while ((scr = scr.parentNode) && scr != document.body) {
      curleft -= scr.scrollLeft || 0;
      curtop -= scr.scrollTop || 0;
    }
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

  VKI_addListener(window, 'resize', this.VKI_position, false);
  VKI_addListener(window, 'scroll', this.VKI_position, false);
  this.VKI_kbsize();
  VKI_addListener(window, 'load', VKI_buildKeyboardInputs, false);
  // VKI_addListener(window, 'load', function() {
  //   setTimeout(VKI_buildKeyboardInputs, 5);
  // }, false);
})();
</script>
</div>

