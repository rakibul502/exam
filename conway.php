<?php

$M = 10;
$N = 10;

// Initializing the grid.
$grid = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 1, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 1, 1, 0, 0, 0, 0, 0],
    [0, 0, 1, 1, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 1, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
];

// Displaying the grid
echo "</br>";

for ($i = 0; $i < $M; $i++) {
    for ($j = 0; $j < $N; $j++) {

        if ($grid[$i][$j] == 0) {
            echo ".";
        } else {
            echo "*";
        }
    }
    echo "</br>";
}
echo "</br>";


echo "<pre>";
print_r(nextGeneration($grid, $M, $N));
echo "</pre>";

function nextGeneration($grid, $M, $N)
{
    $future = array_fill(0, $M, array_fill(0, $N, 0));

    for ($l = 0; $l < $M; $l++) {
        for ($m = 0; $m < $N; $m++) {

            $aliveNeighbours = 0;
            for ($i = -1; $i < 2; $i++) {
                for ($j = -1; $j < 2; $j++) {
                    if (($l + $i >= 0 && $l + $i < $M) && ($m + $j >= 0 && $m + $j < $N))
                        $aliveNeighbours += $grid[$l + $i][$m + $j];
                }
            }

            $aliveNeighbours -= $grid[$l][$m];

            if (($grid[$l][$m] == 1) && ($aliveNeighbours < 2))
                $future[$l][$m] = 0;
            else if (($grid[$l][$m] == 1) && ($aliveNeighbours > 3))
                $future[$l][$m] = 0;
            else if (($grid[$l][$m] == 0) && ($aliveNeighbours == 3))
                $future[$l][$m] = 1;
            else
                $future[$l][$m] = $grid[$l][$m];
        }
    }

    echo "Next Generation", "</br>";
    for ($i = 0; $i < $M; $i++) {
        for ($j = 0; $j < $N; $j++) {
            if ($future[$i][$j] == 0) {
                echo ".";
            } else {
                echo "*";
            }
        }
        echo "</br>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anil_sir</title>
</head>

<body>

    <script>

    </script>

</body>

</html>