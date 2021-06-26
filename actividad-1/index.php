<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de hipotenusa</title>
</head>
<body>
    <?php

        $ladoA = 3;
        $ladoB = 4;

        $ladoC = sqrt((pow(3, 2) + pow(4, 2)));

        echo "El valor de la hipotenusa dados los lados 3cm y 4cm es: " . $ladoC;

    ?>
</body>
</html>