<?php 

require __DIR__.'/vendor/autoload.php';

use App\Game;
use App\FileReader;
use App\Exceptions\NumberOutOfBoundaries;

const valueLimit = 10000;

$fileReader = new FileReader("input.txt");

$fileReader->readFileContent();
$lines = $fileReader->processContent();

$rounds = $lines[0]->getValue()[0];
$players = $lines[0]->getValue();

if ($rounds < 0 || $rounds > valueLimit) {
    throw new NumberOutOfBoundaries("The number " . $rounds . " is out of boundaries " . valueLimit);
} else {
    $scores = array_splice( $lines, 1, $rounds);
    
    $game = new Game( $rounds, 2, $scores );
    $winner = $game->getWinner();
    
    $result = $winner["player"]->getNumber() . " " . $winner["advantaje"];
    file_put_contents("output.txt", $result);
}


