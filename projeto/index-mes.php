<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
        .weekend { color: red; }
        .today { font-weight: bold; }
    </style>
</head>
<body>
<h1><?php echo "AGENDA"; ?></h1>

<table border="1">
<tr>
    <th>Seg</th>
    <th>Ter</th>
    <th>Qua</th>
    <th>Qui</th>
    <th>Sex</th>
    <th class="weekend">Sab</th>
    <th class="weekend">Dom</th>
</tr>
<?php
    function linha($semana, $hoje){
        $linha = '<tr>';
        for ($i = 0; $i < 7; $i++){
            $class = '';
            if ($i == 5) {
                $class = 'weekend';
            }
            if ($i == 6) {
                $class .= ($class ? ' ' : '') . 'weekend';
            }
            if (isset($semana[$i]) && $semana[$i] == $hoje) {
                $class .= ($class ? ' ' : '') . 'today';
            }
            $linha .= "<td class='{$class}'>".($semana[$i] ?? '')."</td>";
        }
        $linha .= '</tr>';
        return $linha;
    }
    function calendario(){
        $hoje = date('j'); // Get today's date as day of the month
        $inicioMes = date('N', strtotime(date('Y-m-01'))); // Day of the week for the first day of the month
        $calendario = '';
        $dia = 1 - ($inicioMes - 1);
        $semana = [];

        while ($dia <= 31){
            if ($dia > 0) {
                array_push($semana, $dia);
            } else {
                array_push($semana, null);
            }

            if (count($semana) == 7) {
                $calendario .= linha($semana, $hoje);
                $semana = [];
            }

            $dia++;
        }
        if (count($semana) > 0) {
            $calendario .= linha($semana, $hoje); // Print remaining days
        }

        return $calendario;
    }
?>

<?php echo calendario(); ?>
</table>

</body>
</html>
