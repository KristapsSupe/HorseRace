<?php

$distance  = 10;
$minSpeed = 1;
$maxSpeed = 3;
$time = 1;

$betFirstPlace = 4;
$betSecondPlace = 3;
$betThirdPlace = 2;


$players = explode(' ', readline('Enter players: '));

$chooseWinner = readline('Choose winner: ');

$bet = (int) readline('And place a bet: ');

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

$finishers = [];

foreach ($winners as $i => $player) {
    $place = $i + 1;
    echo "$place - $player";
    echo PHP_EOL;

    $finishers[] = [$place, $player];
}

if($chooseWinner === $finishers[0][1]){
    echo "You choose Winner";
    echo PHP_EOL;
    echo "You win " . $bet * $betFirstPlace . "EUR";
    echo PHP_EOL;
}

if($chooseWinner === $finishers[1][1]){
    echo "Your player finished 2nd";
    echo PHP_EOL;
    echo "You win " . $bet * $betSecondPlace  . "EUR";
    echo PHP_EOL;
}

if($chooseWinner === $finishers[2][1]){
    echo "Your player finished 3rd";
    echo PHP_EOL;
    echo "You win " . $bet * $betThirdPlace   . "EUR";
    echo PHP_EOL;
}

echo "Better luck next time!";











