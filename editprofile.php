<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

require('./Init.php'); 

if(!isset($_SESSION['id']))
	header('Location: ./index.php');

require(Kernel.'/Tpl/Head.tpl');

?>
	<body>
		<?php require(Kernel.'/Tpl/Nav.tpl'); ?>
		<center><h2>Editar Datos</h2>

			<form action="" method="post" name="editprofile">
				Nombre</br>
				<input type="text" name="firstname" value="<?=U::Logged('firstname');?>" /></br>
				Apellido</br>
				<input type="text" name="lastname" value="<?=U::Logged('lastname');?>" /></br>

				<input type="submit" value="Cambiar Datos" name="updatep" />

				<div class="resultEdit" style="color: #C85305;"></div>
			</form>

			<h2>Editar Contrase&ntilde;a</h2>

			<form action="" method="post" name="editpass">
				Contrase&ntilde;a nueva</br>
				<input type="password" name="password" /></br>
				Repite Contrase&ntilde;a nueva</br>
				<input type="password" name="r-password" /></br>
				Contrase&ntilde;a antigua</br>
				<input type="password" name="v-password" /></br>

				<input type="submit" value="Editar Contrase&ntilde;a" />

				<div class="resultPass" style="color: #C85305"></div>
			</form>

			<h2>Editar Imagen de Perfil</h2>

			<i>Actual:</i>
			<center>
				<img src="./upload_images/<?=U::Logged('profile_image');?>" style="width: 115px; height: 115px; box-shadow: 1px 1px 2px rgba(0,0,0,0.4), -1px -1px 2px rgba(0,0,0,0.4);" />

				<form action="" method="post" enctype="multipart/form-data">
					<input type="file" name="profile_image" /></br>

					<input type="submit" name="UpdateImg" value="Cambiar Imagen" />
				</form>
				<?php
				if(isset($_POST['UpdateImg']))
				{
					require(Kernel.'/Functions/EditImg.php');
				}
				?>
			</center>
		</center>
	</body>
</html>