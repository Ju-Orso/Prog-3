<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calendário Anual</title>
    <style>
        .weekend { color: red; }
        .today { font-weight: bold; }
        table { border-collapse: collapse; margin: 10px; }
        th, td { border: 1px solid black; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h1>Calendário Anual</h1>

<?php
function build_calendar($month, $year) {
    $daysOfWeek = array('Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom');

    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'] - 1;


    if($dayOfWeek < 0){
        $dayOfWeek = 6;
    }

    $dateToday = date('Y-m-d');

    $calendar = "<h2>$monthName $year</h2>";
    $calendar .= "<table>";
    $calendar .= "<tr>";


    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    } 
    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar .= "<td></td>"; 
        }
    }
    
    $currentDay = 1;

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {

        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $today = $date == $dateToday ? "today" : "";

        $weekend = ($dayOfWeek == 5 || $dayOfWeek == 6) ? "weekend" : "";

        $calendar .= "<td class='$today $weekend'>$currentDay</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if ($dayOfWeek != 7) { 
        $remainingDays = 7 - $dayOfWeek;
        for($l=0;$l<$remainingDays;$l++){
            $calendar .= "<td></td>"; 
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    return $calendar;
}

$year = date('Y');

for($i = 1; $i <= 12; $i++){
    echo build_calendar($i, $year);
}
?>
</body>
</html>
