<?php 
namespace App;

class Line {
    private $message;
    private $delimiter;

    public function __construct(string $_message, string $_delimiter) {
        $this->message = $_message;
        $this->delimiter = $_delimiter;
    }

    public function getValue() {
        $res = explode($this->delimiter, $this->message);
        if (is_array( $res)) {
            foreach ($res as $key => $value) {
                $res[$key] = intval($value);
            }
            return $res;
        }

        $rounds = intval($res);
        return $rounds;
    }
}
?>