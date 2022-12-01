<?php
session_start(); 
if(!isset($_POST['unox']) || $_POST['unox']!=$_SESSION['unox']) {sleep(2);exit;} // appel depuis uno.php
?>
<?php
include('../../config.php');
include('lang/lang.php');
$busy = (isset($_POST['ubusy'])?preg_replace("/[^A-Za-z0-9-_]/",'',$_POST['ubusy']):'index');
if(!file_exists('../../data/'.$busy.'/unocss.json')) file_put_contents('../../data/'.$busy.'/unocss.json', '{}');
// ********************* actions *************************************************************************
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		// ********************************************************************************************
		case 'plugin': ?>
		<div class="blocForm">
			<h2><?php echo T_("Uno CSS");?></h2>
			<p><?php echo T_("This plugin allows you to add custom CSS to the website without having to modify the template.");?></p>
			<p><?php echo T_("The code will be installed at the top of the page, in the /head/.");?></p>
			<table class="hForm">
				<tr>
					<td><label><?php echo T_("CSS Styles");?></label></td>
					<td><textarea name="inputCSS" id="inputCSS" style="width:100%;"></textarea></td>
					<td><em><?php echo T_("Write CSS");?>&nbsp;<span style='text-decoration:underline;'><?php echo T_("without");?></span>&nbsp;<?php echo T_("the two opening and closing styles tags.");?></em></td>
				</tr>
			</table>
			<div class="bouton fr" onClick="f_cssuno();" title="<?php echo T_("Save settings");?>"><?php echo T_("Save");?></div>
			<div class="clear"></div>
		</div>
		<?php break;
		// ********************************************************************************************
		case 'save':
		$a = array();
		$a['tex'] = strip_tags($_POST['css']);
		$out = json_encode($a);
		if(file_put_contents('../../data/'.$busy.'/unocss.json', $out)) echo T_('Backup performed');
		else echo '!'.T_('Impossible backup');
		break;
		// ********************************************************************************************
	}
	clearstatcache();
	exit;
}
?>
