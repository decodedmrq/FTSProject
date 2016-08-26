<?php namespace FTS;

class Indexer
{
    private $tokenizer;
    private $docID;
    private $content;
    private $nGram;

    /**
     * @param $nGram
     */
    public function __construct($nGram)
    {
        $this->tokenizer = new Tokenizer('ma');
        $this->docID = new DocId();
        $this->content = new Content();
        $this->nGram = $nGram;
    }

    /**
     * @param $statement
     */
    public function tokenize($statement)
    {
        return $this->tokenizer->split($statement);
    }

    /**
     * @param $term
     * @param $docID
     */
    public function appendDoc($term, $docID)
    {
        return $this->docID->set($term, $docID);
    }

    /**
     * @param $statement
     * @return mixed
     */
    public function setContent($statement)
    {
        return $this->content->set($statement);
    }

    /**
     * @param $statement
     */
    public function append($statement)
    {
        $tokenizedStr = $this->tokenize($statement);
        $docID = $this->setContent($statement);

        foreach ($tokenizedStr as $token) {
            $this->appendDoc($token, $docID);
        }
    }

    public function dump()
    {
        $fileName = "dump.json";
        $this->docID->dump($fileName);
    }
}
