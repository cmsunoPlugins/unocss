<?php
if (!isset($_SESSION['cmsuno'])) exit();
?>
<?php
if(file_exists('data/'.$Ubusy.'/unocss.json'))
	{
	$q1 = file_get_contents('data/'.$Ubusy.'/unocss.json');
	$a1 = json_decode($q1,true);
	$Ustyle .= $a1['tex']."\r\n";
	}
?>
