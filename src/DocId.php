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
      $fp = fopen($file, 'w');
      fwrite($fp, json_encode($this->docIDTable));
      fclose($fp);
  }

  public function load($file)
  {//TODO
    $handle = fopen($file, 'r');
    $contents  = fread($handle, filesize($file));
    echo $contents;
    fclose($handle);
  }

}

$test = new DocId();
$test->set('this', 'D1');
$test->set('is', 'D2');
$test->set('1235', 'D1');
$test->dump('dump.json');
var_dump($test->docIDTable);
