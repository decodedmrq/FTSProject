<?php namespace FTS;

class DocId
{
    public $docIDTable;

    public function __construct()
    {
        $this->docIDTable = [];

    }

    /**
     * @return int
     */
    public function getDocNum()
    {
        return count($this->docIDTable);
    }


    /**
     * @param $term
     * @param $docID
     */
    public function set($term, $docID)
    {
        if (array_key_exists($term, $this->docIDTable)) {
            if (!in_array($docID, $this->docIDTable[$term])) {
                $this->docIDTable[$term][] = $docID;
            }
        } else {
            $this->docIDTable[$term][] = $docID;
        }

        return true;
    }

    /**
     * @param $term
     * @return mixed
     */
    public function get($term)
    {
        return $this->docIDTable[$term];
    }

    /**
     * @param $file
     */
    public function dump($file)
    {
        file_put_contents($file, json_encode($this->docIDTable));
    }

    /**
     * Put content to file if dir isn't exist
     *
     */
    private function file_force_contents($dir, $contents)
    {
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = '';
        foreach ($parts as $part)
            if (!is_dir($dir .= "/$part")) mkdir($dir);
        file_put_contents("$dir/$file", $contents);
    }

    /**
     * @param $file
     * @return mixed
     */
    public function load($file)
    {
        $data = file_get_contents($file);

        return json_decode($data, true);
    }

}


//self-test
/*
$docID = new DocId();
$docID->set("term1", "D1");
$docID->set("term2", "D99999");
$docID->set("term2", "D2");
$docID->set("term2", "D3");
$docID->set("term2", "D4");

$docID->dump("dump.json");
var_dump($docID->load("dump.json"));*/
