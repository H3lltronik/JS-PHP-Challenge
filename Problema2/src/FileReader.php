<?php 
namespace App;

use App\Exceptions\FileNotFoundException;

class FileReader {

    private $filename;
    private $filecontent;
    // private array $lines;

    public function __construct(string $_filename) {
        $this->filename = $_filename;
    }

    public function readFileContent() {
        if (!file_exists($this->filename))
            throw new FileNotFoundException(
                str_replace ("%s", "The file was not found %s", $this->filename)
            );

        $this->filecontent = file_get_contents($this->filename);
    }

    public function processContent() {
        $lines = preg_split('/\n|\r\n?/', $this->filecontent);
        $linesObj = array();
        foreach ($lines as $key => $value) {
            array_push($linesObj, new Line($value, " "));
        }
        
        return $linesObj;
    }

    /**
     * Get the value of filecontent
     */ 
    public function getFilecontent()
    {
        return $this->filecontent;
    }
}
?>