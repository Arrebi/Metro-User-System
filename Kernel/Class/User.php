<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

class U
{
	public static function Logged($name)
	{
		if(isset($_SESSION['id']))
		{
			$q = mysqli_query(Site::$conn, "SELECT * FROM users WHERE id = '". $_SESSION['id'] ."'");
			$u = mysqli_fetch_assoc($q);

			return utf8_decode($u[''. $name .'']);
		}
	}
}


new U;

?>