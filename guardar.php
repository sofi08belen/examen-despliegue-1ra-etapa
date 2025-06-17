<?php
$correo $_POST["email"];
$contra $_POST["contra"];

include "conexion.php"

$sql = "INSER INTO usuarios (email, contrasenha) values ('$correo' , '$contra')";

$conexion->query ($sql);

echo "Registro guardado"