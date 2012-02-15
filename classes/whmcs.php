<?php
class Whmcs 
{
	private $url;
	private $username;
	private $password;
	private $pf = Array();
	private $query;

	public function __construct( $user, $pass, $url = "http://dev.whmcs.snds.co/includes/api.php" )
	{
		$this->username = $user;
		$this->password = $pass;
		$this->url = $url;
		$this->pf["username"] = $this->username;
		$this->pf["password"] = md5( $this->password );
		$this->pf["responsetype"] = "json";
	}

	public function action( $array )
	{
		$this->prepare( $array );
		return $this->send();
	}

	private function prepare( $array )
	{
		$this->pf = array_merge( $this->pf, $array );
		$this->query = "";
		foreach ( $this->pf as $k => $v )
			$this->query .= "$k=" . urlencode( $v ) . "&";
	}

	private function send()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->query);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$jsondata = curl_exec($ch);
		if (curl_error($ch)) die("Connection Error: ".curl_errno($ch).' - '.curl_error($ch));
			curl_close($ch);
		return json_decode($jsondata);
	}
}
?>
