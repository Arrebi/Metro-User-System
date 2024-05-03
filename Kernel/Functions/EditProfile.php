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

class User
{
	public static function Edit()
	{
		if(!empty($_POST['firstname']) && !empty($_POST['lastname']))
		{
			mysqli_query(Site::$conn,"UPDATE users SET firstname = '". strip_tags($_POST['firstname']) ."',
										  lastname = '". strip_tags($_POST['lastname']) ."' WHERE id = '". U::Logged('id') ."'");
				echo '<font color="#00A300">Datos editados con exito</font>';
		}
		else
			echo 'No puedes dejar algun dato en blanco';
	}
}

new User;

User::Edit();

?>