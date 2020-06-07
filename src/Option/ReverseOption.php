<?php

namespace App\Option;

class ReverseOption
{
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function __toString()
    {
        return strrev($this->content);
    }
}
