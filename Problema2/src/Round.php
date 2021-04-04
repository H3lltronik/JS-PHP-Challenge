<?php 
namespace App;

class Round {
    private $players = array();

    public function __construct(int $_players, $scores) {
        $this->scores = $scores->getValue();
        for ($i = 0; $i  < $_players; $i ++) { 
            array_push (
                $this->players, 
                array (
                    "player" => new Player("Player " . ($i + 1), ($i + 1) ),
                    "score" => $this->scores[$i]
                ) 
            );
        }
    }

    public function getWinner() {
        $player1Score = $this->players[0]["score"];
        $player2Score = $this->players[1]["score"];
        $advantaje = abs($player1Score - $player2Score);
        $winnerInx = -1;
        
        if ($player1Score > $player2Score) {
            $winnerInx = 0;
        } else if ($player1Score < $player2Score) {
            $winnerInx = 1;    
        }

        return array (
            "player" => $this->players[$winnerInx]["player"],
            "advantaje" => $advantaje
        );
    }

    /**
     * Get the value of players
     */ 
    public function getPlayers()
    {
        return $this->players;
    }
}
?>