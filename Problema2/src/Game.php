<?php 
namespace App;

class Game {
    private $rounds = array();

    public function __construct(int $_rounds, int $_players, $scores) {
        for ($i = 0; $i  < $_rounds; $i ++) { 
            array_push($this->rounds, new Round($_players, $scores[$i]));
        }

    }

    public function getWinner() {
        $highest = 0;
        $highestKey = 0;
        
        foreach ($this->rounds as $key => $round) {
            $roundAdvantaje = $round->getWinner()["advantaje"];
            if ($roundAdvantaje > $highest) {
                $highest = $roundAdvantaje;
                $highestKey = $key;
            }
        }

        return $this->rounds[$highestKey]->getWinner();
    }
}
?>