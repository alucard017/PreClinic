<?php
require 'connection.php';
require 'function.inc.php';
unset($_SESSION['email']);
redirect('index.php');