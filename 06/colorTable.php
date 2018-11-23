<?php
echo '<table style="width:100%;height:100%;">' . PHP_EOL;
for ($i = 0; $i <= 20; $i++) {
    echo "<tr>" . PHP_EOL;
    for ($j = 0; $j <= 20; $j++) {
        echo "<td style='background-color: rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")'> </td>";
    }
    echo "</tr>" . PHP_EOL;
}
echo "</table>" . PHP_EOL;
