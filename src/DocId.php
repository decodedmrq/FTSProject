<?php

class DocId
{
  public $docIDTable;

  public function __construct()
  {
    $this->docIDTable = array();

  }

  public function getDocNum()
  {
    return count($this->docIDTable);
  }

  public function set($term, $docID)
  {
    if (array_key_exists($term, $this->docIDTable)) {
        if (!in_array($docID, $this->docIDTable[$term])) {
            $this->docIDTable[$term][] = $docID;
        }
    } else {
        $this->docIDTable[$term][] = $docID;
    }
  }

  public function get($term)
  {
    return $this->docIDTable[$term];
  }

  public function dump($file)
  {
      $data = file_get_contents($file);
      file_put_contents($file, json_encode($this->docIDTable));
  }

/**
* Put content to file if dir isn't exist
*
*/
  private function file_force_contents($dir, $contents){
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = '';
        foreach($parts as $part)
            if(!is_dir($dir .= "/$part")) mkdir($dir);
        file_put_contents("$dir/$file", $contents);
  }

  public function load($file)
  {
      $data = file_get_contents($file);
      return json_decode($data, true);
  }

}
