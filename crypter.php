<?php 

$a = new Crypton();
$a->decrypt("lo_que_vas_a_encriptar_o_desencriptar");

class Crypton 
{
	function decrypt($string) {
		$key = 'tu contrasena';
		$result = '';
		$string = base64_decode($string);
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			echo $result.=$char;
		}
		return $result;
	}
	function encrypt($string) {
		$key = 'tu contrasena';
		$result = '';
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return base64_encode($result);
	}
}
 ?>