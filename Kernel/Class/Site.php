<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

class Site
{
	public static $conn;

	public static function Mysql()
	{
		global $Mysql;
		Site::$conn = mysqli_connect($Mysql['host'], $Mysql['user'], $Mysql['pass'], $Mysql['db']) or die('Error al conectar: ' . mysqli_connect_error());
		if (!Site::$conn) {
			die('Error al conectar: ' . mysqli_connect_error());
		}
	}

	public static function HoraU($time)
	{
		$seconds = time() - $time;

		if($seconds <= 60)
		{
			echo 'Hace '. $seconds .' Segundo(s)';
		}
		elseif($seconds >= 60 && $seconds <= 3600)
		{
			echo 'Hace '. floor($seconds/60) .' Minuto(s)';
		}
		elseif($seconds >= 3600 && $seconds <= 86400)
		{
			echo 'Hace '. floor($seconds/60/60) .' Hora(s)';
		}
		elseif($seconds >= 86400 && $seconds <= 604800)
		{
			echo 'Hace '. floor($seconds/60/60/24) .' Dia(s)';
		}
		elseif($seconds >= 604800 && $seconds <= 2419200)
		{
			echo 'Hace '. floor($seconds/60/60/24/7) .' Semana(s)';
		}
		elseif($seconds >= 2419200 && $seconds <= 29030400)
		{
			echo 'Hace '. floor($seconds/60/60/24/7/4) .' Meses';
		}
		elseif($seconds >= 29030400)
		{
			echo 'Hace '. floor($seconds/60/60/24/7/4/12) .' Año(s)';
		}
	}

	public static function Smiles($code)
	{	
		$html = [];
		$smile = [];

		$html[] = ':)'; $smile[] = '<img src="../../img/smiles/1.png" />';
		$html[] = ';)'; $smile[] = '<img src="../../img/smiles/2.png" />';
		$html[] = ':D'; $smile[] = '<img src="../../img/smiles/4.png" />';
		$html[] = ':@'; $smile[] = '<img src="../../img/smiles/5.png" />';
		$html[] = ':('; $smile[] = '<img src="../../img/smiles/6.png" />';
		$html[] = ':O'; $smile[] = '<img src="../../img/smiles/7.png" />';
		$html[] = ':o'; $smile[] = '<img src="../../img/smiles/7.png" />';
		$html[] = '8-)'; $smile[] = '<img src="../../img/smiles/8.png" />';
		$html[] = ':P'; $smile[] = '<img src="../../img/smiles/11.png" />';
		$html[] = ':p'; $smile[] = '<img src="../../img/smiles/11.png" />';
		$html[] = ':$'; $smile[] = '<img src="../../img/smiles/12.png" />';
		$html[] = ':/'; $smile[] = '<img src="../../img/smiles/14.png" />';
		$html[] = ':*'; $smile[] = '<img src="../../img/smiles/15.png" />';
		$html[] = ':_('; $smile[] = '<img src="../../img/smiles/16.png" />';
		return str_replace($html, $smile, $code);
	}

	public static function GeneRand($n)
	{
		$s = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$c = '';

		for ($i=0; $i < $n; $i++) { 
			$c .= $s[rand(0, strlen($s)-1)];
		}

		return $c;
	}
}

$Site = new Site;

?>