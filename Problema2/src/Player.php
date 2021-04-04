<?php 
namespace App;

class Player {
    private $name;
    private $number;

    public function __construct(string $_name, string $_number) {
        $this->name = $_name;
        $this->number = $_number;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return intval($this->number);
    }
}
?>