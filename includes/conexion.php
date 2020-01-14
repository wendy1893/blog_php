<?php

//Conexión
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'blog_master';

$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

//Iniciar la sesión
session_start();

