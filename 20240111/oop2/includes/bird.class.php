<?php
class Bird extends Animal
{
    public function fly()
    {
        print $this->name . " is FLYING...<br>";
    }
}
