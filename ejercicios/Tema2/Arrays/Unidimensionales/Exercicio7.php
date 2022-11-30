<?php

    $notas = [3,5,4,6,8,4];
    $suma = 0;
    $total = count($notas);
    
    echo "<table border='1'>";

    foreach ($notas as $digi) {
        $suma += $digi;
        echo "<tr><td>Nota</td><td>$digi</td></tr>";
    }

    $media = $suma / $total;
    echo "<tr><th>Media</th><th>$media</th></tr></table>"
?>