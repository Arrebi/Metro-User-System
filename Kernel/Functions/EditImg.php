<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

class Send
{
	public static function Profile()
	{
		if($_FILES['profile_image']['type'] == 'image/png' OR $_FILES['profile_image']['type'] == 'image/gif' OR $_FILES['profile_image']['type'] == 'image/jpeg')
		{
			$dir = './upload_images/';
			opendir($dir);
			$type = array('image/png' => 'png',
				          'image/gif' => 'gif',
				          'image/jpeg' => 'jpg');
			$name = Site::GeneRand(10).'.'.$type[''. $_FILES['profile_image']['type'] .''];
			move_uploaded_file($_FILES['profile_image']['tmp_name'], ''. $dir . ''. $name .'');
			mysqli_query(Site::$conn,"UPDATE users SET profile_image = '". $name ."' WHERE id = '". U::Logged('id') ."'");

			$text = '<a href="./profile.php?user='. U::Logged('id') .'">'. U::Logged('firstname') .' '. U::Logged('lastname') .'</a><font color="#C3C3C3"> ha cambiado la foto de su perfil.</font>';

			mysqli_query(Site::$conn,"INSERT INTO users_status SET autor = '". U::Logged('id') ."',
				                                      text = '". $text ."',
				                                      time = '". time() ."',
				                                      colour = '". rand(1,4) ."'");
			echo '<font color="#00A300">Imagen de perfil cambiada con exito</font>';
		}
		else
			echo '<font color="#C85305">Solo se permite archivos de formato <b>PNG</b>, <b>GIF</b>, o <b>JPG</b></font>';
	}
}

new Send;

Send::Profile();

?>