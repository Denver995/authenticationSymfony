<?php
// src/EventListener/ExceptionListener.php
namespace App\EventListener;

use Some\Events\FooEvent;

class BarListener
{
    public function doSomething(FooEvent $event)
    {
        /* ... */
    }
}