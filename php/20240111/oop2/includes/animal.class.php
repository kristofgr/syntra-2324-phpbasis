<?php
class Animal
{
    protected $name = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function move()
    {
        print $this->name . " is moving...<br>";
    }
}
