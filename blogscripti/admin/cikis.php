<?php
/**
 * Created by PhpStorm.
 * User: Musty
 * Date: 8.03.2018
 * Time: 15:27
 */

session_start();
session_destroy();

header("Location: login.php");