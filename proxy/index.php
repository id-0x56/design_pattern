<?php

interface IData
{
    public function getData(string $url): string;
}

class SimpleProxyData implements IData
{
    public function getData(string $url): string
    {
        echo 'Get data from simple proxy data' . PHP_EOL;
        $result = strtolower($url);

        return $result;
    }
}

class CacheProxyData implements IData
{
    private $data;

    private $cache;

    public function __construct(SimpleProxyData $data)
    {
        $this->data = $data;
    }

    public function getData(string $url): string
    {
        if (!isset($this->cache)) {
            $result = $this->data->getData($url);
            $this->cache = $result;
        } else {
            echo 'Cached simple proxy data' . PHP_EOL;
        }
        return $this->cache;
    }
}

$realSubject = new SimpleProxyData();
$realSubject->getData('http://example.com');

$proxy = new CacheProxyData($realSubject);
$proxy->getData('http://example.com');
$proxy->getData('http://example.com');
