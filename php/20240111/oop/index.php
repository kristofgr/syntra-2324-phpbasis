<?php

include('includes/person.class.php');

$phebe = new Person('Phebe', 'Dullers', 'f');
$wouter = new Person('Wouter', 'Vdb');
$p = new Person('P', 'Vdb');
$wouter->setZipcode('3128');

$wouter->setDob(strtotime('11 dec 1999'));


print '<pre>';
print_r($phebe);
print_r($wouter);
print_r($p);

print $wouter->getAge();
