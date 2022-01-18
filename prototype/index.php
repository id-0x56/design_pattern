<?php

class Page
{
    private $title;

    private $body;

    public function __construct(string $title, string $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    public function __clone()
    {
        $this->title = 'Copy of ' . $this->title;
    }
}

$page = new Page('Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam atque autem consequuntur dolor doloribus earum est facere magnam minima, sequi unde voluptas! A eos esse harum quasi sapiente sequi.');
$draft = clone $page;

echo '<pre>';
print_r($page);
var_dump($draft);
echo '</pre>';
