<?php

trait Singleton {
    private static $instance = null;

    private function __construct()
    {
        //
    }

    private function __clone()
    {
        //
    }

    private function __wakeup()
    {
        //
    }

    public static function getInstance() {
        return self::$instance === null ? self::$instance = new static() : self::$instance;
    }
}

class Test {
    use Singleton;

    public function test()
    {
        echo '<pre>';
            var_dump($this);
        echo '</pre>';
    }
}

$obj_0 = Test::getInstance();
$obj_0->test();

//$obj_1 = new Singleton();
//$obj_1->test();

//$obj_2 = clone $obj_0;
//$obj_2->test();
