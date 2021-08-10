<?php
if (isset($_POST["enviarDatos"])) {
    include "./conexion.php";

    $hematies = $_POST["hematies"];
    $hemoglobina = $_POST["hemoglobina"];
    $hematocrito = $_POST["hematocrito"];
    $vcm = $_POST["vcm"];
    $hcm = $_POST["hcm"];
    $linfocitos = $_POST["linfocitos"];
    $leucocitos = $_POST["leucocitos"];
    $neutrofilos = $_POST["neutrofilos"];
    $eosinofilos = $_POST["eosinofilos"];
    $plaquetas = $_POST["plaquetas"];
    $vsg = $_POST["vsg"];

    $sql = "UPDATE examenes_sangre SET hematies = '$hematies', hemoglobina = '$hemoglobina', hematocrito = '$hematocrito',
    vcm = '$vcm', hcm = '$hcm', linfocitos = '$linfocitos', leucocitos = '$leucocitos', neutrofilos = '$neutrofilos',
    eosinofilos = '$eosinofilos', plaquetas = '$plaquetas', vsg = '$vsg'
    WHERE creado = (SELECT MAX(creado))";

    if ($connection->query($sql) === true) {
        $connection->close();
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
        $connection->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de Sangre</title>
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
    <h1>Datos del Examen<h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <table width="80%">
        <tr>
          <th>Ingrese los datos del examen:</th>
        </tr>

        <tr>
          <td>
            Hematies:<input
              type="text"
              name="hematies"
              id="hematies"
            />
          </td>
        </tr>

        <tr>
          <td>
            Hemoglobina:<input
              type="text"
              name="hemoglobina"
              id="hemoglobina"
            />
          </td>
        </tr>

        <tr>
          <td>
            Hematocritos:<input
              type="text"
              name="hematocrito"
              id="hematocrito"
            />
          </td>
        </tr>


        <tr>
          <td>
            VCM:<input
              type="text"
              name="vcm"
              id="vcm"
            />
          </td>
        </tr>

        <tr>
          <td>
            HCM:<input
              type="text"
              name="hcm"
              id="hcm"
            />
          </td>
        </tr>

        <tr>
          <td>
            Linfocitos:<input
              type="text"
              name="linfocitos"
              id="linfocitos"
            />
          </td>
        </tr>

        <tr>
          <td>
            Leucocitos:<input
              type="text"
              name="leucocitos"
              id="leucocitos"
            />
          </td>
        </tr>

        <tr>
          <td>
            Neutrofilos:<input
              type="text"
              name="neutrofilos"
              id="neutrofilos"
            />
          </td>
        </tr>

        <tr>
          <td>
            Eosinofilos:<input
              type="text"
              name="eosinofilos"
              id="eosinofilos"
            />
          </td>
        </tr>

        <tr>
          <td>
            Plaquetas:<input
              type="text"
              name="plaquetas"
              id="plaquetas"
            />
          </td>
        </tr>

        <tr>
          <td>
            VSG:<input
              type="text"
              name="vsg"
              id="vsg"
            />
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