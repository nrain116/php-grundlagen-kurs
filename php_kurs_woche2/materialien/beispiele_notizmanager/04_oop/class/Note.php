<?php

declare(strict_types=1);

class Note
{/*  Öffentlich
    public string $title;
    public string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    } */

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
