<?php namespace FTS;

class Tokenizer
{
    public $engine;

    /**
     * @param $engine
     */
    public function __construct($engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param $statement
     * @param int $numChar
     * @return array
     */
    public static function split($statement, $numChar = 2)
    {
        $result = [];

        $length = mb_strlen($statement, 'UTF-8');
        $length = $length - ($length % $numChar);
        for ($i = 0; $i < $length; $i += $numChar) {
            $char = mb_substr($statement, $i, $numChar, 'UTF-8');
            $result[] = $char;
        }

        return $result;

    }


}
