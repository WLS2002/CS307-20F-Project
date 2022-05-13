<?php
require './functions.php';
require './classes.php';
session_start();

echo (crypt("4", 'ls'));