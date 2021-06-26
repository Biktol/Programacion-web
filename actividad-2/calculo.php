<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actividad 2</title>
	<style>
	a {
		text-decoration: none;
	}

	button {
		display: block;
		margin-top: 10px;
	}
</style>
</head>
<body>
<?php

if (isset($_POST["enviarDatos"])) {
	$radio = $_POST["valorRadio"];

    $resultado = 2 * sqrt(2) * pow($radio, 2);

    echo "El área del octágono dado el radio " . $radio . " es de " . $resultado;
}

?>
<a href="./index.html"><button>Volver</button></a>
</body>
</html>