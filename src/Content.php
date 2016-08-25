<?php

class Content
{
  $public contentTable;

  public function __construct()
  {
      $this->contentTable = array();
  }

  public function getContentNum()
  {
    return count($this->contentTable);
  }

  public function set($content)
  {
      $this->contentTable[$this->getContentNum] = $content;
      $currentIndex = $this->getContentNum - 1;
      return $currentIndex;
  }

  public function get($id)
  {
    return $this->contentTable[$id];

  }


}
