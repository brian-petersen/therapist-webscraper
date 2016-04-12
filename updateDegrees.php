<?php
require_once('simple_html_dom.php');

$connection = mysql_connect('localhost','root','');
if (!$connection){
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $connection);
$result = mysql_query("SELECT id,therapistURL FROM test ORDER BY id");

while($row = mysql_fetch_assoc($result)){
	$therapistURLs[] = $row;
}

foreach($therapistURLs as $therapist){
	$html = file_get_html($therapist['therapistURL']);
	$id = $therapist['id'];

	$degrees = $html->find('div[class=prof-name] em',0)->plaintext;
	$degrees = str_replace(',', '\t', $degrees);
	$degrees = str_replace(' ', '', $degrees);

	if(empty($degrees)==true){$degrees='';}
	
	$degrees = mysql_real_escape_string($degrees);
	
	mysql_query("UPDATE test SET degree = '$degrees' WHERE id = $id");
	
	flush();
	echo 'Just updated: '.$id.' to '.$degrees.'<br />';
}
echo '<br />done';
mysql_close($connection);
?>