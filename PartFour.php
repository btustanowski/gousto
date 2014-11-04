<?php
require_once('src/Lis.php');

$hello = new Lis();
print_r($hello->run([0, 7, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15]));