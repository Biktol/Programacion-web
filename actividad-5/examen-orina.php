<?php
if (isset($_POST["enviarDatos"])) {
    include "./conexion.php";

    $densidad = $_POST["densidad"];
    $ph = $_POST["ph"];
    $glucosa = $_POST["glucosa"];
    $proteinas = $_POST["proteinas"];
    $hematies = $_POST["hematies"];
    $cetonas = $_POST["cetonas"];
    $urobilinogeno = $_POST["urobilinogeno"];
    $bilirrubina = $_POST["bilirrubina"];
    $nitrito = $_POST["nitrito"];
    $celulas_epiteliales = $_POST["celulas_epiteliales"];
    $cilindro_hematico = $_POST["cilindro_hematico"];
    $cilindro_leucocitario = $_POST["cilindro_leucocitario"];
    $cilindro_epitelial = $_POST["cilindro_epitelial"];
    $cilindro_gorduroso = $_POST["cilindro_gorduroso"];

    $sql = "UPDATE examenes_orina SET densidad = '$densidad', ph = '$ph', glucosa = '$glucosa',
    proteinas = '$proteinas', hematies = '$hematies', cetonas = '$cetonas', urobilinogeno = '$urobilinogeno',
    bilirrubina = '$bilirrubina', nitrito = '$nitrito', celulas_epiteliales = '$celulas_epiteliales',
    cilindro_hematico = '$cilindro_hematico', cilindro_leucocitario = '$cilindro_leucocitario',
    cilindro_epitelial = '$cilindro_epitelial', cilindro_gorduroso = '$cilindro_gorduroso'
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
    <title>Examen de Orina</title>
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
            Densidad:<input
              type="text"
              name="densidad"
              id="densidad"
            />
          </td>
        </tr>

        <tr>
          <td>
            PH:<input
              type="text"
              name="ph"
              id="ph"
            />
          </td>
        </tr>

        <tr>
          <td>
            Glucosa:<input
              type="text"
              name="glucosa"
              id="glucosa"
            />
          </td>
        </tr>


        <tr>
          <td>
            Proteinas:<input
              type="text"
              name="proteinas"
              id="proteinas"
            />
          </td>
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
            Cetonas:<input
              type="text"
              name="cetonas"
              id="cetonas"
            />
          </td>
        </tr>

        <tr>
          <td>
            Urobilinogeno:<input
              type="text"
              name="urobilinogeno"
              id="urobilinogeno"
            />
          </td>
        </tr>

        <tr>
          <td>
            Bilirrubina:<input
              type="text"
              name="bilirrubina"
              id="bilirrubina"
            />
          </td>
        </tr>

        <tr>
          <td>
            Nitrito:<input
              type="text"
              name="nitrito"
              id="nitrito"
            />
          </td>
        </tr>

        <tr>
          <td>
            Celulas Epiteliales:<input
              type="text"
              name="celulas_epiteliales"
              id="celulas_epiteliales"
            />
          </td>
        </tr>

        <tr>
          <td>
            Cilindro Hematico:<input
              type="text"
              name="cilindro_hematico"
              id="cilindro_hematico"
            />
          </td>
        </tr>

        <tr>
          <td>
            Cilindro Leucocitario:<input
              type="text"
              name="cilindro_leucocitario"
              id="cilindro_leucocitario"
            />
          </td>
        </tr>

        <tr>
          <td>
            Cilindro Epitelial:<input
              type="text"
              name="cilindro_epitelial"
              id="cilindro_epitelial"
            />
          </td>
        </tr>

        <tr>
          <td>
            Cilindro Gorduroso:<input
              type="text"
              name="cilindro_gorduroso"
              id="cilindro_gorduroso"
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