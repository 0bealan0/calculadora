<?php

spl_autoload_register(function ($clase) {
    require("$clase.php");
});
if (isset($_POST['submit'])) {
    $cadena = $_POST['cadena'];
    $tipo_operacion = Operacion::tipo_operacion($cadena);
    //Me devolverá error, real o racional (real->int   racional->fracción)
    switch ($tipo_operacion) {
        case Operacion::REAL: //accedo a la constante declarada en la clase operación
            $operacion = new OperacionReal($cadena);
            $resultado = $operacion->calcula();
            $html="<table class='table'>
                <tr>
                    <td>$operacion</td>
                    <td>$resultado</td>
                    <td>$cadena</td>
                    
                </tr>
            </table>";
            break;
        case Operacion::RACIONAL:
            $operacion = new OperacionRacional($cadena);
            $resultado = $operacion->calcula();
            $html="<table class='table'>
                <tr>
                    <th>RESULTADO</th>
                    <th>TIPO</th>    
                </tr>
                <tr>
                    <td>$resultado</td>
                    <td>Racional</td>
                </tr>
            </table>";
            break;
        case Operacion::ERROR:
            echo "Esta operación no es válida";
            break;
        default:
            echo "ningún caso anterior";
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body{
            margin:10rem;
            margin-top: 2rem;
        }
        form{
            margin-left:25rem;
        }
    </style>
</head>
<body>
<form method="POST" action="index.php">
    <fieldset>
        <legend>Qué quieres calcular?</legend>
        <label for="texto">Ingresa la operación</label>
        <input type="text" name="cadena" id="texto" value="">
        <button type="submit" class=" btn-success" name="submit" value="envia">Enviar</button>
    </fieldset>
</form>
<?=$html?>
</body>
</html>
