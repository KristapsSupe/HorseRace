<?php

$distance  = 10;
$minSpeed = 1;
$maxSpeed = 3;
$time = 1;

$players = explode(' ', readline('Enter players: '));


$track = [];


for ($i = 0; $i < count($players); $i++) {
    $track[$i] = array_fill(0, $distance, '-');
    $track[$i][0] = $players[$i];
}

$iterations = 0;

$winners = [];

while (count($winners) < count($players))
{
    system ('clear');

    for ($i = 0; $i < count($players); $i++) {
        $currentPosition = array_search($players[$i], $track[$i]);

        if ($currentPosition === false) continue;

        $step = rand($minSpeed, $maxSpeed);

        $nextPosition = $currentPosition  + $step;

        if ($nextPosition > $distance) {
            $nextPosition = $distance;
        }

        if (! in_array($players[$i], $winners)) {
            $track[$i][$nextPosition] = $players[$i];
            $track[$i][$currentPosition] = '-';
        }

        if ($nextPosition === $distance && ! in_array($players[$i], $winners)) {
            $winners[] = $players[$i];
        }

    }

    foreach ($track as $line) {
        echo implode('', $line);
        echo PHP_EOL;
    }

    $iterations++;

    sleep ($time);
}

foreach ($winners as $i => $player) {
    $place = $i + 1;
    echo "#{$place} - $player" . PHP_EOL;



}





