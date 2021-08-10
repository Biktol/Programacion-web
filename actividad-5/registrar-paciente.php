<?php

if (isset($_POST["enviarDatos"])) {
    include "./conexion.php";

    $examen = $_POST["examen"];
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $email = $_POST["correo"];
    date_default_timezone_set("America/Caracas");
    $creado = date('Y-m-d H:i:s');

    switch ($examen) {
        case 'Sangre':
            $sql = "INSERT INTO examenes_sangre (nombre_completo, sexo, email, creado)
        VALUES ('$nombre', ' $sexo', '$email', '$creado')";

            if ($connection->query($sql) === true) {
                $connection->close();
                header("Location: examen-sangre.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
                $connection->close();
            }
            break;

        case 'Orina':
            $sql = "INSERT INTO examenes_orina (nombre_completo, sexo, email, creado)
        VALUES ('$nombre', ' $sexo', '$email', '$creado')";

            if ($connection->query($sql) === true) {
                $connection->close();
                header("Location: examen-orina.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
                $connection->close();
            }
            break;

        default:
            echo "Error al insertar datos.";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Paciente</title>
    <style>
      h1 {
        text-align: center;
      }

      table {
        margin-left: auto;
        margin-right: auto;
        background-color: #ffc;
        padding: 5px;
        border: #666 5px solid;
      }

      th {
        padding: 10px;
      }

      td {
        text-align: center;
        font-size: 24px;
      }

      input, select {
        display: block;
        margin: 20px auto;
        font-size: 18px;
      }

      select {
          width: 50%;
          max-width: 200px;
      }

      .submit-button {
        margin-top: 20px;
        width: 100px;
        height: 50px;
      }
    </style>
</head>
<body>
    <h1>Registrar paciente<h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <table width="80%">
        <tr>
          <th>Ingrese los datos del paciente:</th>
        </tr>

        <tr>
          <td>
            Nombre y epellido:<input
              type="text"
              name="nombre"
              id="nombre"
            />
          </td>
        </tr>

        <tr>
          <td>
            Seleccione el sexo del paciente:
            <select name="sexo" id="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            </select>
          </td>
        </tr>

        <tr>
          <td>
            Correo electrónico:<input
              type="text"
              name="correo"
              id="correo"
            />
          </td>
        </tr>


        <tr>
          <td>
            Seleccione el tipo de examen:
            <select name="examen" id="examen">
            <option value="Sangre">Sangre</option>
            <option value="Orina">Orina</option>
            </select>
          </td>
        </tr>

       <tr>
          <td colspan="3">
            <input
              type="submit"
              name="enviarDatos"
              id="enviarDatos"
              value="Enviar"
              class="submit-button"
            />
          </td>
        </tr>
      </table>
    </form>
</body>
</html>