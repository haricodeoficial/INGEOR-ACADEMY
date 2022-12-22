<?php
require_once "controladores/academy.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "modelos/academy.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ruta.php";
require_once "PHPMailer/PHPMailerAutoload.php";
$plantilla = new controladorAcademy();
$plantilla -> plantilla(); 
