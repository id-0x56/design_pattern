<?php

interface ICompression
{
    public function compress(): void;
}

class Zip implements ICompression
{
    public function compress(): void
    {
        echo 'compression method zip';
    }
}

class Rar implements ICompression
{
    public function compress(): void
    {
        echo 'compression method rar';
    }
}

class Compressor
{
    private $compression;

    public function __construct(ICompression $compression)
    {
        $this->compression = $compression;
    }

    public function setCompression(ICompression $compression): void
    {
        $this->compression = $compression;
    }

    public function compress(): void
    {
        $this->compression->compress();
    }
}

$compressor = new Compressor(new Zip());
$compressor->compress();

echo '<br>';
$compressor->setCompression(new Rar());
$compressor->compress();
