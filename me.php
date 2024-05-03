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
		<form action="" method="post" name="status">
			<input type="text" style="width: 886px;" name="addstatus" placeholder="&iquest;Qu&eacute; est&aacute;s haciendo?"></input>
			<div style="background: #f2f2f2; width: 888px; padding: 5px; margin-top: -5px; border: 1px solid #c3c3c3; margin-bottom: 5px;">
				<select style="float: left;" name="color">
					<option value="1">Azul</option>
					<option value="2">Violeta</option>
					<option value="3">Verde</option>
					<option value="4">Amarillo</option>
				</select>
				<input type="submit" value="Publicar" style="float: right;" />
			</div>
		</form>

		<div class="status">
			<center><img src="./img/load.gif" /></center>
		</div>
	</body>
</html>