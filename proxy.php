<?php
header('Content-type: application/json');
if (isset($_GET['exam'])){
	$url = "http://teletalk.comdexbd.com/boardresult/api_test/allresult?exam=".$_GET['exam']."&year=".$_GET['year']."&board=".$_GET['board']."&roll=".$_GET['roll'];
	$json=file_get_contents($url);
	echo $json;
}

?>