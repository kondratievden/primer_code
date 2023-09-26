<?php
	$url = "https://www.atrucks.su/user/login/";
	$username = "userrrrrrr";
	$password = "pass";
	
	$csrf_token_field_name = "csrfmiddlewaretoken";
	$params = array(
					"username" => $username,
					"password" => $password,
					"another_mendatory_field" => "value"
					);
					
	$token_cookie= realpath("test.txt");
    $csf_cookie=realpath("anothercookie.txt");
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $token_cookie);
    //curl_setopt($ch, CURLOPT_COOKIEFILE, $token_cookie);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	
	/* print_r($response); */
	
	if (curl_errno($ch)) die(curl_error($ch));
	libxml_use_internal_errors(true);
	$dom = new DomDocument();
	$dom->loadHTML($response);
	libxml_use_internal_errors(false);
	$tokens = $dom->getElementsByTagName("input");
	for ($i = 0; $i < $tokens->length; $i++) 
	{
		$meta = $tokens->item($i);
		if($meta->getAttribute('name') == 'csrfmiddlewaretoken')
			$t = $meta->getAttribute('value');
	}
	if($t) {
		$csrf_token = file_get_contents(realpath($token_cookie));
		$postinfo = "";
		foreach($params as $param_key => $param_value) 
		{
			$postinfo .= $param_key ."=". $param_value . "&";	
		}
		$postinfo .= $csrf_token_field_name ."=". $t;
		
		$headers = array();
		
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Keep-Alive: 300";
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$header[] = "Accept-Language: en-us,en;q=0.5";
		$header[] = "Pragma1: ";
		$headers[] = "X-CSRF-Token: $t";
		$headers[] = "Cookie: $token_cookie";
        $url1 = 'https://www.atrucks.su/carrier/auctions/lots/general/quick/?page=1&per_page=300&sort[]=load_range&ids=&mds=';
		curl_setopt($ch, CURLOPT_URL, $url1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36");
		curl_setopt($ch, CURLOPT_COOKIEJAR, $token_cookie);
	    curl_setopt($ch, CURLOPT_COOKIEFILE, $token_cookie);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_REFERER, $url);
		curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 260);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		$response = curl_exec($ch);
		
		// Decoding JSON data
    $decodedData =
        json_decode($response, true);
	
		
/**
 * @param string $searchKey Ключ который ищим
 * @param array $arr Массив в котором ищем
 * @param array $result Массив в который будет складываться результат (передается по ссылке)
 */
function search_key($searchKey, array $arr, array &$result)
{
    // Если в массиве есть элемент с ключем $searchKey, то ложим в результат
    if (isset($arr[$searchKey])) {
        $result[] = $arr[$searchKey];
    }
    // Обходим все элементы массива в цикле
    foreach ($arr as $key => $param) {
        // Если эллемент массива есть массив, то вызываем рекурсивно эту функцию
        if (is_array($param)) {
            search_key($searchKey, $param, $result);
        }
    }
}
$result = [];
search_key('id', $decodedData, $result);
//print_r($result);
$array = $result;

for($i = 0, $size = count($array); $i < $size; ++$i) {
    $url3 = "https://www.atrucks.su/carrier/auctions/geo/coords/$array[$i]/";
	echo'<a href="'.$url3.'">  '.$array[$i].'</a>';
     
	}

		
		if (curl_errno($ch)) print curl_error($ch);
		
		curl_close($ch); 

	}

$url = "https://www.atrucks.su/user/login/";
	$username = "userrrrrrrr";
	$password = "pass";
	
	$csrf_token_field_name = "csrfmiddlewaretoken";
	$params = array(
					"username" => $username,
					"password" => $password,
					"another_mendatory_field" => "value"
					);
					
	$token_cookie= realpath("test.txt");
    $csf_cookie=realpath("anothercookie.txt");
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $token_cookie);
    //curl_setopt($ch, CURLOPT_COOKIEFILE, $token_cookie);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	
	// print_r($response); 
	
	if (curl_errno($ch)) die(curl_error($ch));
	libxml_use_internal_errors(true);
	$dom = new DomDocument();
	$dom->loadHTML($response);
	libxml_use_internal_errors(false);
	$tokens = $dom->getElementsByTagName("input");
	for ($i = 0; $i < $tokens->length; $i++) 
	{
		$meta = $tokens->item($i);
		if($meta->getAttribute('name') == 'csrfmiddlewaretoken')
			$t = $meta->getAttribute('value');
	}
	if($t) {
		$csrf_token = file_get_contents(realpath($token_cookie));
		$postinfo = "";
		foreach($params as $param_key => $param_value) 
		{
			$postinfo .= $param_key ."=". $param_value . "&";	
		}
		$postinfo .= $csrf_token_field_name ."=". $t;
		
		$headers = array();
		
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Keep-Alive: 300";
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$header[] = "Accept-Language: en-us,en;q=0.5";
		$header[] = "Pragma: ";
		$headers[] = "X-CSRF-Token: $t";
		$headers[] = "Cookie: $token_cookie";
        $url2= 'https://www.atrucks.su/carrier/auctions/geo/coords/4358885/';
		for($i = 0, $size = count($array); $i < $size; ++$i) {
        $url3 = "https://www.atrucks.su/carrier/auctions/geo/coords/$array[$i]/";
		curl_setopt($ch, CURLOPT_URL, $url3);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
		curl_setopt($ch, CURLOPT_COOKIEJAR, $token_cookie);
	    curl_setopt($ch, CURLOPT_COOKIEFILE, $token_cookie);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_REFERER, $url);
		curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 260);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		$response = curl_exec($ch);	
		// Decoding JSON data
    $decodedData =
        json_decode($response, true);
echo '<pre>';
	 	
print_r($decodedData);

     echo '</pre>';
	// используем для подключения к базе данных MySQL
$link = mysqli_connect("localhost", "root","","geonames_cities");
 
    
    //convert json object to php associative array
    
    
    //get the employee details
	$id = $array[$i];
	$id1 = $array[$i] + '0';
	$id2 = $array[$i] + '1';
	$name = $decodedData['origins']['0']['str'];
    $shir = $decodedData['origins']['0']['geo_lon'];
    $dolgt= $decodedData['origins']['0']['geo_lat'];
	$in = 'откуда';
    $streetaddress = $decodedData['destinations']['0']['str'];
    $shir1 = $decodedData['destinations']['0']['geo_lon'];
    $dolgt1 = $decodedData['destinations']['0']['geo_lat'];
	$v1 = 'куда';
    $streetaddress1 = $decodedData['destinations']['1']['str'];	
    $shir2 = $decodedData['destinations']['1']['geo_lon'];
	$dolgt2 = $decodedData['destinations']['1']['geo_lat'];
	$v2 = 'куда';
	
    //insert into mysql table
	
	$sql = "INSERT INTO geo2(id, str, mesto, geo_lon, geo_lat)
    VALUES('$id', '$in', '$name', '$shir', '$dolgt'),('$id1','$v1', '$streetaddress', '$shir1', '$dolgt1'),('$id2', '$v2'," . (($streetaddress1=='')?"NULL":("'".$streetaddress1."'")) . ",". (($shir2=='')?"NULL":("'".$shir2."'")) . ",". (($dolgt2=='')?"NULL":("'".$dolgt2."'")) . ")";
    if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
		}
		
		if (curl_errno($ch)) print curl_error($ch);
		
		curl_close($ch); 

	}	

?>