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
	public static function SignIn()
	{
		if(!empty($_POST['firstnameR']) && !empty($_POST['lastnameR']) && !empty($_POST['passwordR']) && !empty($_POST['r-passwordR']) && !empty($_POST['emailR']))
		{
			if(strlen($_POST['emailR']) > 7)
			{
				$qMailExist = mysqli_query(Site::$conn, "SELECT * FROM users WHERE email = '". $_POST['emailR'] ."'");
				if(!mysqli_num_rows($qMailExist))
				{
					if(strlen($_POST['passwordR']) >= 6)
					{
						if($_POST['passwordR'] == $_POST['r-passwordR'])
						{
							mysqli_query(Site::$conn, "INSERT INTO users SET firstname = '". strip_tags($_POST['firstnameR']) ."',
															   lastname = '". strip_tags($_POST['lastnameR']) ."',
															   password = '". sha1($_POST['passwordR']) ."',
															   email = '". strip_tags($_POST['emailR']) ."',
															   lastacces = '". time() ."',
															   registerdate = '". time() ."'");
							echo '<font color="00A300">Bienvenido <b>'. $_POST['firstnameR'] .'</b> ya puedes iniciar sesión</font>';
						}
						else
							echo 'Las contraseñas no coinciden';
					}
						else
						echo 'La contraseña debe tener minimo 6 caracteres';
				}
				else
					echo 'El email ya esta en uso';
			}
		}
		else
			echo 'Algunos campos se encuentran en blanco';
	}
}

new User;

User::SignIn();

?>