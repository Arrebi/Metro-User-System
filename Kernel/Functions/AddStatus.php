<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

require('../../Init.php');

class Send
{
	public static function Status()
	{
		if(isset($_SESSION['id']))
		{
			if(!empty($_POST['addstatus']))
			{
				mysqli_query(Site::$conn,"INSERT INTO users_status SET autor = '". U::Logged('id') ."',
													      text = '". strip_tags($_POST['addstatus']) ."',
													      time = '". time() ."',
													      colour = '". $_POST['color'] ."'");
			}
		}
	}
}

new Send;

Send::Status();

?>