<?php

declare(strict_types=1);

class Note
{
    public function __construct(private string $title, private string $content)
    {
        //
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }
}
