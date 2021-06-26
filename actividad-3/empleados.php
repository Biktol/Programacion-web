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
    $empleados = array(
        "Empleado 1" => array(
			"Nombre Completo" => $_POST["nombre1"], 
			"Cedula" => $_POST["cedula1"], "Sueldo" => $_POST["sueldo1"], 
			"Departamento" => $_POST["departamento1"], 
			"Lugar De Trabajo" => $_POST["lugarDeTrabajo1"]),
        "Empleado 2" => array(
			"Nombre Completo" => $_POST["nombre2"], 
			"Cedula" => $_POST["cedula2"], 
			"Sueldo" => $_POST["sueldo2"], 
			"Departamento" => $_POST["departamento2"], 
			"Lugar De Trabajo" => $_POST["lugarDeTrabajo2"]),
        "Empleado 3" => array(
			"Nombre Completo" => $_POST["nombre3"], 
			"Cedula" => $_POST["cedula3"], 
			"Sueldo" => $_POST["sueldo3"], 
			"Departamento" => $_POST["departamento3"], 
			"Lugar De Trabajo" => $_POST["lugarDeTrabajo3"])
    );

    foreach ($empleados as $key => $value) {
        
        echo "$key:<br />";

        while (list($keyList, $valueList) = each($value)) {
            echo "$keyList = $valueList<br />";
        }
        echo "<br />";
    }
}
?>
<a href="./index.html"><button>Volver</button></a>
</body>
</html>