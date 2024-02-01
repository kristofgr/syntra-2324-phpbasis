<?php

require('includes/animal.class.php');
require('includes/bird.class.php');

$a = new Animal('Dog');
$b = new Animal('Zebra');
$c = new Animal('Platypus');
$d = new Animal('Shark');
$e = new Bird('Eagle');

print '<pre>';
print_r($a);
print_r($b);
print_r($c);
print_r($d);
print_r($e);


$a->move();
$b->move();
$c->move();
$d->move();
$e->fly();
$e->move();
