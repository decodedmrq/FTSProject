<?php namespace FTS;

class Content
{
    public $contentTable;

    /**
     *
     */
    public function __construct()
    {
        $this->contentTable = [];
    }

    /**
     * @return int
     */
    public function getContentNum()
    {
        return count($this->contentTable);
    }

    /**
     * @param $content
     * @return mixed
     */
    public function set($content)
    {
        $this->contentTable[$this->getContentNum()] = $content;
        $currentIndex = $this->getContentNum() - 1;

        return $currentIndex;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->contentTable[$id];

    }


}
