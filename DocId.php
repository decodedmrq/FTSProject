<?php

class DocId
{
  public $docIDTable;

  public function __construct()
  {

    $this->docIDTable = array();
    $this->set('test', 'D1');
    echo 'array is: ' . $this->docIDTable;

  }

  public function getDocNum()
  {
    return count($this->docIDTable);
  }

  public function set($term, $docID)
  {
    if (!isset($this->docIDTable[$term])) {
        $this->docIDTable[$term] = $docID;
        echo "\n This is : " . $this->docIDTable;
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

  }

  public function load($file)
  {

  }

}

$test = new DocId();
