<?php
require_once('DocId');
require_once('Content');
require_once('Tokenizer');

class Indexer
{
    $private $tokenizer;
    $private $docID;
    $private $content;
    $private $ngram;

    public function __construct($ngram)
    {
        $this->tokenizer = new Tokenizer();
        $this->docID = new DocId();
        $this->content = new Content();
        $this->ngram = $ngram;
    }

    public function tokenize($statement) {
        $this->tokenizer->split($statement);
    }



}
