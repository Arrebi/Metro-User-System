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
	public static function Message()
	{
		if(!empty($_POST['form']) && !empty($_POST['content']))
		{
			$qVe = mysqli_query(Site::$conn,"SELECT * FROM users WHERE email = '". $_POST['form'] ."'");
			if(mysqli_num_rows($qVe))
			{
				$Ve = mysqli_fetch_assoc($qVe);
				if($Ve['email'] != U::Logged('email'))
				{
					$time = time() - 300;
					$qT = mysqli_query(Site::$conn,"SELECT * FROM users_messages WHERE toM = '". U::Logged('id') ."' AND form = '". $Ve['id'] ."' ORDER BY id DESC");
					$T = mysqli_fetch_assoc($qT);
					if($T['time'] <= $time)
					{
						mysqli_query(Site::$conn,"INSERT INTO users_messages SET toM = '". U::Logged('id') ."',
																	form = '". $Ve['id'] ."',
																	content = '". strip_tags($_POST['content']) ."',
																	time = '". time() ."'");
							echo '<font color="#00A300">Mensaje Enviado con exito</font>';
					}
					else
						echo 'Debes esperar 5 minutos para poder enviar otro mensaje';
				}
				else
					echo '¿Automensaje?, aquí imposible';
			}
			else
				echo 'No existe nigun usuario con ese email';
		}
		else
			echo 'Lo sentimos no puedes dejar campos vacios';
	}
}

new Send;

Send::Message();

?>