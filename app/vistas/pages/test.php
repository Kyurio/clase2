<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>cálculo de hipotecas/préstamos</title>
</head>

<style>
form {width:250px;}
form>div>span {width:100px;display: inline-block;text-align:left;}
form input {width:150px;}
form>div {text-align:center;}
</style>

<body>
  <form action="" method="POST">
    <div>
        <span>Importe :</span>
        <span><input type="text" name="importe" maxlength=9 value=""></span>
    </div>
    <div>
        <span>Años :</span>
        <span><input type="text" name="anos" maxlength=2 value=""></span>
    </div>
    <div>
        <span>Interés :</span>
        <span><input type="text" name="interes" maxlength=9 value=""></span>
    </div>
    <div>
        <span>Interés :</span>
        <span><input type="text" name="gracia" maxlength=9 value=""></span>
    </div>
    <div>
        <p><input type="submit" value="Calcular"></p>
    </div>
</form>

<?php
if (isset($_POST["interes"])) {
    // Reemplazamos la posible coma por un punto.
    $_POST["interes"]=str_replace(",",".",$_POST["interes"]);
}

if (
    isset($_POST["importe"]) && is_numeric($_POST["importe"]) &&
    isset($_POST["anos"]) && is_numeric($_POST["anos"]) &&
    isset($_POST["gracia"]) && is_numeric($_POST["gracia"]) &&
    isset($_POST["interes"]) && is_numeric($_POST["interes"])
) {
    $gracia=$_POST["gracia"];
    $deuda=$_POST["importe"];
    $anos=$_POST["anos"];
    $interes=$_POST["interes"];
    $totalint=0;

    // hacemos los calculos...
    $interes=($interes/100);
    $m=($deuda*$interes*(pow((1+$interes),($anos * 12 + $gracia))))/((pow((1+$interes),($anos*12  )))-1);

    // calcula el porcentaje
    $porcentajealmonto = ($deuda * $interes);
    echo $porcentajealmonto;

    $montomasinteres = ($deuda + $porcentajealmonto);
    echo "total con interes".$montomasinteres;
  
    echo "<div>Capital Inicial: ".number_format($deuda,2,",",".")." ";
    echo "<br>Cuota a pagar mensualmente: ".number_format($m,2,",",".")." </div>";
    ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Mes</th>
            <th>Cuota</th>
            <th>Intereses</th>
            <th>Amortización</th>
            <th>Capital Pendiente</th>

        </tr>
        <?php
        // mostramos todos los meses...
        for ($i=1; $i<=$anos * 12; $i++) {
            echo "<tr>";
                echo "<td align=right>".$i."</td>";
                echo "<td align=right>".number_format($m, 2,",",".")."</td>";
                $totalint = $totalint + ( $montomasinteres * $interes );
                echo "<td align=right>".number_format( $montomasinteres * $interes ,2,",",".")."</td>";
                echo "<td align=right>".number_format( $m - ( $montomasinteres * $interes ),2,",",".")."</td>";

                $montomasinteres = $montomasinteres - ( $m - ($montomasinteres * $interes));
                if ($montomasinteres < 0) {
                    echo "<td align=right>0</td>";
                } else {
                    echo "<td align=right>".number_format($montomasinteres,2,",",".")."</td>";
                }
            echo "</tr>";
        }
        ?>
    </table>
    Pago total de intereses : <?php echo number_format($totalint,2,",",".")?>
    total leasing : <?php echo ($deuda * (1 + $interes) ** $gracia); ?>
    <?php
}
?>

</body>
</html>
