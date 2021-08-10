<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if (isset($_POST["enviarDatos"])) {

    require_once './vendor/autoload.php';
    include "./conexion.php";

    $queryEmail = $_POST["email"];
    $examen = $_POST["examen"];
    //echo $queryEmail;

    switch ($examen) {
        case 'Sangre':
            $sql = "SELECT * FROM examenes_sangre WHERE email = '$queryEmail'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {

                $mpdf = new \Mpdf\Mpdf();
                $data = '';
                $data = '<h1>Detalles del Examen<h1>';

                while ($row = $result->fetch_assoc()) {
                    $nombre = $row["nombre_completo"];
                    $sexo = $row["sexo"];
                    $email = $row["email"];
                    $creado = $row["creado"];
                    $hematies = $row["hematies"];
                    $hemoglobina = $row["hemoglobina"];
                    $hematocrito = $row["hematocrito"];
                    $vcm = $row["vcm"];
                    $hcm = $row["hcm"];
                    $linfocitos = $row["linfocitos"];
                    $leucocitos = $row["leucocitos"];
                    $neutrofilos = $row["neutrofilos"];
                    $eosinofilos = $row["eosinofilos"];
                    $plaquetas = $row["plaquetas"];
                    $vsg = $row["vsg"];
                }
                $data .= "Nombre del paciente : $nombre<br />";
                $data .= "Sexo del paciente: $sexo<br />";
                $data .= "Email del paciente: $email<br />";
                $data .= "Fecha del examen: $creado<br />";
                $data .= "Hematies: $hematies<br />";
                $data .= "Hemoglobina: $hemoglobina<br />";
                $data .= "Hematocrito: $hematocrito<br />";
                $data .= "VCM: $vcm<br />";
                $data .= "HCM: $hcm<br />";
                $data .= "Linfocitos: $linfocitos<br />";
                $data .= "Leucocitos: $leucocitos<br />";
                $data .= "Neutrofilos: $neutrofilos<br />";
                $data .= "Eosinofilos: $eosinofilos<br />";
                $data .= "Plaquetas: $plaquetas<br />";
                $data .= "VSG: $vsg<br />";

                $mpdf->WriteHTML($data);

                $pdf = $mpdf->Output('', 'S');

                function sendEmail($pdf, $email)
            {
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        //$mail->SMTPDebug = 2; //Enable verbose debug output
                        $mail->isSMTP(); //Send using SMTP
                        $mail->Host = 'ssl://smtp.gmail.com'; //Set the SMTP server to send through
                        $mail->SMTPAuth = true; //Enable SMTP authentication
                        $mail->Username = 'cuenta.paraba1@gmail.com'; //SMTP username
                        $mail->Password = 'vic28000121.'; //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('noreply@gmail.com', 'noreply');
                        $mail->addAddress("$email"); //Add a recipient

                        $mail->addStringAttachment($pdf, 'Examen-Sangre.pdf');

                        //Content
                        $mail->isHTML(true); //Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
                sendEmail($pdf, $email);
            } else {
                echo "No se encontró el email.";
            }

            $connection->close();
            break;

        case 'Orina':
            $sql = "SELECT * FROM examenes_orina WHERE email = '$queryEmail'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {

                $mpdf = new \Mpdf\Mpdf();
                $data = '';
                $data = '<h1>Detalles del Examen<h1>';

                while ($row = $result->fetch_assoc()) {
                    $nombre = $row["nombre_completo"];
                    $sexo = $row["sexo"];
                    $email = $row["email"];
                    $creado = $row["creado"];
                    $densidad = $row["densidad"];
                    $ph = $row["ph"];
                    $glucosa = $row["glucosa"];
                    $proteinas = $row["proteinas"];
                    $hematies = $row["hematies"];
                    $cetonas = $row["cetonas"];
                    $urobilinogeno = $row["urobilinogeno"];
                    $bilirrubina = $row["bilirrubina"];
                    $nitrito = $row["nitrito"];
                    $celulas_epiteliales = $row["celulas_epiteliales"];
                    $cilindro_hematico = $row["cilindro_hematico"];
                    $cilindro_leucocitario = $row["cilindro_leucocitario"];
                    $cilindro_epitelial = $row["cilindro_epitelial"];
                    $cilindro_gorduroso = $row["cilindro_gorduroso"];
                }
                $data .= "Nombre del paciente : $nombre<br />";
                $data .= "Sexo del paciente: $sexo<br />";
                $data .= "Email del paciente: $email<br />";
                $data .= "Fecha del examen: $creado<br />";
                $data .= "Densidad: $densidad<br />";
                $data .= "PH: $ph<br />";
                $data .= "Glucosa: $glucosa<br />";
                $data .= "Proteinas: $proteinas<br />";
                $data .= "Hematies: $hematies<br />";
                $data .= "Cetonas: $cetonas<br />";
                $data .= "Urobilinogeno: $urobilinogeno<br />";
                $data .= "Bilirrubina: $bilirrubina<br />";
                $data .= "Nitrito: $nitrito<br />";
                $data .= "Celulas Epiteliales: $celulas_epiteliales<br />";
                $data .= "Cilindro Hematico: $cilindro_hematico<br />";
                $data .= "Cilindro Leucocitario: $cilindro_leucocitario<br />";
                $data .= "Cilindro Epitelial: $cilindro_epitelial<br />";
                $data .= "Cilindro Gorduroso: $cilindro_gorduroso<br />";

                $mpdf->WriteHTML($data);

                $pdf = $mpdf->Output('', 'S');

                function sendEmail($pdf, $email)
            {
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        //$mail->SMTPDebug = 2; //Enable verbose debug output
                        $mail->isSMTP(); //Send using SMTP
                        $mail->Host = 'ssl://smtp.gmail.com'; //Set the SMTP server to send through
                        $mail->SMTPAuth = true; //Enable SMTP authentication
                        $mail->Username = 'cuenta.paraba1@gmail.com'; //SMTP username
                        $mail->Password = 'vic28000121.'; //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('noreply@gmail.com', 'noreply');
                        $mail->addAddress("$email"); //Add a recipient

                        $mail->addStringAttachment($pdf, 'Examen-Orina.pdf');

                        //Content
                        $mail->isHTML(true); //Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
                sendEmail($pdf, $email);
            } else {
                echo "No se encontró el email.";
            }

            $connection->close();
            break;

        default:
            echo "Error";
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
    <title>Solicitar Examen</title>
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
<h1>Solicitudes<h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <table width="80%">
        <tr>
          <th>Solicitar Examen:</th>
        </tr>

        <tr>
          <td>
            Email del paciente a solicitar:<input
              type="text"
              name="email"
              id="email"
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
</body>
</html>