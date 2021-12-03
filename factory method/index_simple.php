<?php

interface ILog
{
    public function print(): void;
}

class StdoutLog implements ILog
{
    public function print(): void
    {
        echo 'Print log with stdout';
    }
}

class FileLog implements ILog
{
    public function print(): void
    {
        echo 'Print log with file';
    }
}

interface ILogFactory
{
    public function create(): ILog;
}

class StdoutLogFactory implements ILogFactory
{
    public function create(): ILog
    {
        return new StdoutLog();
    }
}

class FileLogFactory implements ILogFactory
{
    public function create(): ILog
    {
        return new FileLog();
    }
}

$logFactoryName = 'FileLog';
$logFactoryType = $logFactoryName === 'StdoutLog' ?
    new StdoutLogFactory() :
    new FileLogFactory();

$logFactoryType->create()->print();
