<?php
require 'baseRecord.class.php';
require 'User.class.php';

$user = new User('Facundo', 'Capua');

$user->save();

?>