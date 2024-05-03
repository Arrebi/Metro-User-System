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
	public static function LogIn()
	{
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			$qMailExist = mysqli_query(Site::$conn, "SELECT * FROM users WHERE email = '". $_POST['email'] ."'");
			if(mysqli_num_rows($qMailExist))
			{
				$User = mysqli_fetch_assoc($qMailExist);
				if($User['password'] == sha1($_POST['password']))
				{
					$_SESSION['id'] = $User['id'];
					echo '<font color="#00A300">¡Logueado con exito!</font>';
					echo '<meta http-equiv="refresh" content="1" url="./me.php" />';
				}
				else
					echo 'Contraseña incorrecta';
			}
			else
				echo 'El Correo es invalido';
		}
		else
			echo 'Se encontraron campos vacios.';
	}
}

new User;
User::LogIn();

?>