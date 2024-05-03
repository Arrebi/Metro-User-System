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
	public static function Pass()
	{
		if(!empty($_POST['password']) && !empty($_POST['r-password']) && !empty($_POST['v-password']))
		{
			$qPassV = mysqli_query(Site::$conn,"SELECT * FROM users WHERE id = '". U::Logged('id') ."'");
			$PassV = mysqli_fetch_assoc($qPassV);
			if($PassV['password'] == sha1($_POST['v-password']))
			{
				if(strlen($_POST['password']) >= 6)
				{
					if($_POST['password'] == $_POST['r-password'])
					{
						mysqli_query(Site::$conn,"UPDATE users SET password = '". sha1($_POST['password']) ."' WHERE id = '". U::Logged('id') ."'");
							echo '<font color="#00A300">Contraseña editada con exito</font>';
					}
					else
						echo 'La contraseñas nuevas no coinciden';
				}
				else
					echo 'La contraseña nueva debe tener minimo 6 caracteres';
			}
			else
				echo 'La contraseña antigua es incorrecta';
		}
		else
			echo 'No puedes dejar campos vacios';
	}
}

new User;

User::Pass();

?>