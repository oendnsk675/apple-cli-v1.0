<?php 
// error_reporting(0);

require_once 'vendor/autoload.php';
require_once 'vendor/fungsi.php';

$nc = nicePosting('apple');
if ($nc == false) {
	$climate->red(' Try again');
	die();
}


$climate = new League\CLImate\CLImate;
$climate->addArt('vendor\import');
$climate->draw('asc');
$climate->lightBlue()->out(" tool checker akun apple\n created by. Osyi cozy\n");
$climate->br();
$namaFile = $climate->input(" Masukkan Nama File Gayn :")->prompt();
$threads = 1;
// $threads = $climate->input(" Threads :")->prompt();
// $delay = $climate->input(" Delay :")->prompt();
// cek token
$token = file_get_contents("token.txt");
// buat tampungan hits
$hits = 0;
$live = "Rasult/".date('Y-m-d').'-Live.txt';
$die = "Rasult/".date('Y-m-d').'-Die.txt';
$unknown = "Rasult/".date('Y-m-d').'-Unknown.txt';
$dbug = "Dbug.txt";
$relay = $climate->confirm(" Select No If Your Internet Is Fast, To Avoid Ip Blocked, If The Checker Feels Slow Select Yes :");
if ($relay->confirmed()) {
	$delay2 = 0;
}else{
	$delay2 = 1;
}
$inputHapus = $climate->confirm(" Clear Rasult Sebelumnya ($live) y/n :");
if ($inputHapus->confirmed()) {
	file_put_contents("$live", "");
	file_put_contents("$dbug", "");
}

$climate->br();


// $proxyApi = getApiProxy();
$berhitung = count(file($namaFile));
if ($berhitung == 0) {
	$climate->red(' Empas kosong');
	die();
}
$climate->lightBlue()->out(" Nama File: ". $namaFile);
$climate->lightBlue()->out(" Jumlah Empas :".$berhitung);
$climate->lightBlue()->out(" Jumlah Threads :".$threads);
$climate->lightBlue()->out(" Tekan Ctrl + C Kalau Mau Keluar\n Proccessing Wait...\n");
$climate->br();

	// $count = count(file($namaFile));
$file = fopen($namaFile, "r");
for ($j = 0; $j < count(file($namaFile)); $j++) {
	$cekToken = cekToken($token);
	if ($cekToken == false) {
		$climate->red(' Token api key is not valid');
		die();
	}

	$string = trim(fgets($file));
	if ($string != "") {

		$string = str_replace("|", ":", $string);
		if (preg_match("/:/", $string)) {
			$good = explode(":", $string);
			$email = $good[0];
		}else{
			$email = $string;
		}
		
		$call = shell_exec("bash vendor/brentkozjak/hash-identify/src/c.sh $email");
		$dcode = json_decode($call, true);
		if($dcode == null){
			out($string, "live");
			tulis(null, $string, $live);
		}elseif ($dcode["serviceErrors"][0]["code"] == "appleIdNotSupported") {
			out($string, "die");
			tulis(null, $string, $die);
		}else{
			out($string, "something");
			die();
		}
		sleep($delay2);
		tulis("dbug", $string, $dbug);
		$hits++;
	}
	// hapus();
	if ($hits == 10) {
		sendHits($hits);
		$hits = 0;
	}
	
}	// sleep($delay);

shitPosting();

$climate->lightBlue()->out(" [Check Done]\n");
function hapus(){
	global $namaFile;
	$getsdas = file_get_contents($namaFile);
	$replace =  preg_replace('/^.+\n/', '', $getsdas);
	file_put_contents($namaFile, $replace);
}

?>