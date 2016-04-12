<?php
require_once('simple_html_dom.php');

function setTarget($target, $id){
	return $target.$id;
}

$baseurl = 'http://therapists.psychologytoday.com'; //baseurl of the website
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Alabama.html';    //the target state you want to scrape
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Alaska.html';     //no counties
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Arizona.html';    //last id = 2105  error
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Arkansas.html';   //last id = 2570
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/California.html'; //last id = 5403  Fatal error: Call to a member function find() on a non-object in C:\xampp\htdocs\webscraper\getState.php on line 134
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Colorado.html'; // last id = 5936
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Connecticut.html'; // last id = 5973  Warning: A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.  Line 193 & 70. Fatal error: Call to a member function find() on a non-object in C:\xampp\htdocs\webscraper\getState.php on line 105
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Delaware.html'; // last id = 6871  done yahoo!
//**$stateurl = 'http://therapists.psychologytoday.com/rms/state/District+of+Columbia.html'; //no counties
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Florida.html'; // last id = 13995  done, no errors
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Georgia.html'; // last id = 18823  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Hawaii.html'; // last id = 19075  Error - failed to open stream: A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Idaho.html'; // last id = 19591  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Illinois.html'; // last id = 29219  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Indiana.html'; // last id = 33357  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Iowa.html'; // last id = 34600  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Kansas.html'; // last id = 35779 done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Kentucky.html'; // last id = 37566 done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Louisiana.html'; // last id = 39353  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Maine.html'; // last id = 42009 A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Maryland.html'; // last id = 44961   failed to open stream: HTTP request failed! HTTP/1.1 503 Try again later
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Massachusetts.html'; // last id = 53365  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Michigan.html'; // last id = 55723  Error  failed to open stream: HTTP request failed! HTTP/1.1 503 Try again later in  
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Minnesota.html'; // last id = 58883  Error   failed to open stream: No connection could be made because the target machine actively refused it. in C:\xampp\htdocs\webscraper\simple_html_dom.php on line 70
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Mississippi.html'; // last id = 60008  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Missouri.html'; // last id = 63582  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Montana.html'; // last id = 63826  Error computer rebooted
//tateurl = 'http://therapists.psychologytoday.com/rms/state/Nebraska.html'; // last id = 64935  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Nevada.html'; // last id = 65429  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/New+Hampshire.html'; // last id = 68246  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/New+Jersey.html'; //last id = 68282  Error   failed to open stream: No connection could be made because the target machine actively refused it. in C:\xampp\htdocs\webscraper\simple_html_dom.php on line 70
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/New+Mexico.html'; // last id = 69875  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/New+York.html'; // last id = 78776  Error  A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/North+Carolina.html'; // last id = 84408  done
//**$stateurl = 'http://therapists.psychologytoday.com/rms/state/North+Dakota.html'; //no counties
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Ohio.html'; // last id = 90363  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Oklahoma.html'; // last id = 91172  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Oregon.html'; // last id = 95268  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Pennsylvania.html'; // last id = 98823  Error A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Rhode+Island.html'; last id = 99552  ended when PC rebooted itself
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/South+Carolina.html'; // last id = 99949  Error  failed to open stream: HTTP request failed! HTTP/1.1 503 Try again later
//**$stateurl = 'http://therapists.psychologytoday.com/rms/state/South+Dakota.html'; // no counties
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Tennessee.html'; // last id = 104538  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Texas.html'; // last id = 105135  Error Call to a member function find() on a non-object in C:\xampp\htdocs\webscraper\getState.php on line 134
//**$stateurl = 'http://therapists.psychologytoday.com/rms/state/Utah.html'; 
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Vermont.html'; // last id = 107431  Error Apache server died
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Virginia.html'; // last id = 112267  done
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Washington.html'; // last id = 114678  Error  failed to open stream: A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.
//**$stateurl = 'http://therapists.psychologytoday.com/rms/state/West+Virginia.html'; // no counties
//$stateurl = 'http://therapists.psychologytoday.com/rms/state/Wisconsin.html'; // last id = 115298  rebooted
//**$stateurl = 'http://therapists.psychologytoday.com/rms/state/Wyoming.html'; // no counties

$html = file_get_html($stateurl);

$select = $html->find('table[id=citycounties] a'); //get all counties from the state view

foreach($select as $row){
	if(!strstr($row->href,'county')){
		$currenthtml = file_get_html($baseurl.$row->href);
		$firstProfile = file_get_html(str_replace('amp;','',$baseurl.$currenthtml->find('a[class=resultsActions]',0)->href));
		$linkStructure = $baseurl.$firstProfile->find('div[class=contextual-left] a',1)->href.'&rec_next=';
		$cityURLs[] = $linkStructure;
	}
}

foreach($cityURLs as $cityurl){ //get all cities from the county
	$pgID = 1;
	while(true){
		$currentURL = setTarget($cityurl,$pgID);
		$targetURLs[] = $currentURL;
		
		$pgID += 20;
		$html = file_get_html($currentURL);
		$exitTest = $html->find('a[rel=Next]');
		
		if(empty($exitTest)==true){
			break;
		}
	}
}

foreach($targetURLs as $currentURL){ //get a list of all the therapist urls
	$currenthtml = file_get_html($currentURL);
	$messyURLs = $currenthtml->find('a[class=resultsActions]');

	foreach($messyURLs as $url){
		global $baseurl;
		
		$therapistURL = $baseurl.$url->href;
		$therapistURLs[] = $therapistURL;
	}
}

foreach($therapistURLs as $therapistURL){ //get all therapist data, insert it into the database, download image, and move onto the next therapist
	$therapisthtml = file_get_html($therapistURL);
	
	if($therapisthtml->find('div[class=prof-name] h2',0)->innertext == 'Treatment Facility'){
		continue;
	}
	
	$profilePictureURL = $baseurl.$therapisthtml->find('img[itemprop=photo]',0)->src;

	$name = $therapisthtml->find('h1[itemprop=name]',0)->innertext;

	$degrees = $html->find('div[class=prof-name] em',0)->plaintext;
	$degrees = str_replace(',', '\t', $degrees);
	$degrees = str_replace(' ', '', $degrees);

	$bio = $therapisthtml->find('div[class=prof-statement]',0)->innertext; $bio = str_replace('</p>','\n',$bio); $bio = strip_tags($bio);

	$tel = $therapisthtml->find('span[itemprop=tel]',0)->innertext;

	$additionalTel = $therapisthtml->find('div[class=prof-contact]',1)->plaintext;
	$additionalTel = trim(str_replace(':','',strstr($additionalTel,':')));

	$specialtiesList = $therapisthtml->find('li[class=highlight]');
	$specialties = '';
	foreach($specialtiesList as $row){
		if($specialties == '' ? $specialties = $row->innertext : $specialties = $specialties.'\t'.$row->innertext);
	}

	$office = $therapisthtml->find('div[class=prof-office]',0)->plaintext;
	$office = trim(html_entity_decode(str_replace(array('Show map','Visit my website'),'',$office)));

	$qualifications = $therapisthtml->find('div[class=prof-detail-left]',0);
	$qualifications = $qualifications->find('ul li');
	foreach($qualifications as $test){
		$qualificationsFilter[] = html_entity_decode($test->plaintext);
	}

	foreach($qualificationsFilter as $key=>$item){
		$schoolFlag = strpos($item, 'School');
		$avgCostFlag = strpos($item, 'Avg');
		$licenseFlag = strpos($item, 'License');
		$yearFlag = strpos($item, 'Year');
		
		if($schoolFlag !== false){$school = trim(strstr($item,' '));}
		if($avgCostFlag !== false){$avgCost = trim(strstr($item,'$'));}
		if($licenseFlag !== false){$license = trim(str_replace(':','',strstr($item,':')));}
		if($yearFlag !== false){$year = trim(str_replace(':','',strstr($item,':')));}
	}
	$licenseExplode = explode("&nbsp;", htmlentities($license));
	$licenseID = $licenseExplode[0];
	$licenseState = $licenseExplode[1];

	if(empty($name)==true){$name='';}
	if(empty($degrees)==true){$degrees='';}
	if(empty($bio)==true){$bio='';}
	if(empty($tel)==true){$tel='';}
	if(empty($additionalTel)==true){$additionalTel='';}
	if(empty($specialties)==true){$specialties='';}
	if(empty($office)==true){$office='';}
	if(empty($school)==true){$school='';}
	if(empty($avgCost)==true){$avgCost='';}
	if(empty($licenseID)==true){$licenseID='';}
	if(empty($licenseState)==true){$licenseState='';}
	if(empty($year)==true){$year='';}
	
	$name = mysql_real_escape_string($name);
	$degrees = mysql_real_escape_string($degrees);
	$bio = mysql_real_escape_string($bio);
	$tel = mysql_real_escape_string($tel);
	$additionalTel = mysql_real_escape_string($additionalTel);
	$specialties = mysql_real_escape_string($specialties);
	$office = mysql_real_escape_string($office);
	$school = mysql_real_escape_string($school);
	$avgCost = mysql_real_escape_string($avgCost);
	$licenseID = mysql_real_escape_string($licenseID);
	$licenseState = mysql_real_escape_string($licenseState);
	$year = mysql_real_escape_string($year);
	
	
	$connection = mysql_connect("localhost","root","");
	if(!$connection){exit();}

	mysql_select_db("test", $connection);

	$sql = "INSERT INTO test (name, degree, bio, telephone, additionalTelephone, specialties, office, school, averageCost, licenseID, licenseState, graduationYear, profilePictureURL, therapistURL)
	VALUES
	('$name', '$degrees', '$bio', '$tel', '$additionalTel', '$specialties', '$office', '$school', '$avgCost', '$licenseID', '$licenseState', '$year', '$profilePictureURL', '$therapistURL')";

	if(!mysql_query($sql,$connection)){die('Error: '.mysql_error());}
	
	$img = './images/'.mysql_insert_id().'.jpg';
	file_put_contents($img, file_get_contents($profilePictureURL));
	
	mysql_close($connection);
}
echo 'done';
?>