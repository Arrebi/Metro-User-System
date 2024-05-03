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

if(isset($_SESSION['id']))
	header('Location: ./me.php');

require(Kernel.'/Tpl/Head.tpl');

?>

	<body align="center">
		<p><u>Bienvenido</u></p>

		<div class="login">
			<form action="" method="post" name="login">
				Correo Electronico</br>
				<input type="mail" name="email" /></br>
				Contrase&ntilde;a</br>
				<input type="password" name="password" /></br>

				<input type="submit" value="Entrar" />
			</form>

			<div class="resultLogin" style="color: #C85305;"></div>
		</div>
		<button class="greenButton" id="bRegister">Registrate</button>
		<button class="greenButton" id="bLogin" style="display: none;">Iniciar Sesi&oacute;n</button>

		<div class="register" style="display: none;">
			<form action="" method="post" name="register">
				Nombre</br>
				<input type="text" name="firstnameR" /></br>
				Apellido</br>
				<input type="text" name="lastnameR" /></br>
				Contrase&ntilde;a <i style="font-size: 70%; color:#5C5C5C;">Minimo 6 caracteres</i></br>
				<input type="password" name="passwordR" /></br>
				Repite Contrase&ntlde;a</br>
				<input type="password" name="r-passwordR" /></br>
				Correo Electronico</br>
				<input type="mail" name="emailR" /></br>

				<input type="submit" value="Registrar" />

				<div class="resultRegister" style="color: #C85305;"></div>
			</form>
		</div>
	</body>
</html>