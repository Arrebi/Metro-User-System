<?php
#####################################
#####################################
### Programador: Juan Arrebillaga.###
###  Diseñador: Juan Arrebillaga. ###
###  Colaborador: Daniel Márquez. ###
###    Metro UserSystem V 1.0     ###
#####################################
#####################################

#Inicio de Sesión
session_start();

#Constantes
define('Kernel', dirname(__FILE__).'/Kernel');

#Clases
require(Kernel.'/Class/Site.php');
require(Kernel.'/Class/User.php');

#Mysql y Configuraciones
require(Kernel.'/Config.php');
Site::Mysql();

#Actualizacion de Coneccion
if(isset($_SESSION['id']))
	mysqli_query(Site::$conn, "UPDATE users SET lastacces = '". time() ."' WHERE id = '". U::Logged('id') ."'");

?>