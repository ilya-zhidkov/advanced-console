<?php

namespace App\Option;

class UppercaseOption
{
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function __toString()
    {
        return strtoupper($this->content);
    }
}
