<?php

/**
 * Receiver class
 */
class Receiver
{
    public function turnOn(): void
    {
        echo 'Turn ON';
    }

    public function turnOff(): void
    {
        echo 'Turn OFF';
    }
}

/**
 * Command interface
 */
interface ICommand
{
    public function execute(): void;
}

/**
 * TurnOn command
 */
class TurnOnCommand implements ICommand
{
    private $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(): void
    {
        $this->receiver->turnOn();
    }
}

/**
 * TurnOff command
 */
class TurnOffCommand implements ICommand
{
    private $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(): void
    {
        $this->receiver->turnOff();
    }
}

/**
 * Invoker class
 */
class Invoker
{
    private $command;

    public function setCommand(ICommand $command)
    {
        $this->command = $command;
    }

    public function run(): void
    {
        $this->command->execute();
    }
}

$receiver = new Receiver();
$invoker = new Invoker();

$invoker->setCommand(new TurnOnCommand($receiver));
$invoker->run();

$invoker->setCommand(new TurnOffCommand($receiver));
$invoker->run();
