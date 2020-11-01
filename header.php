<?php
/**
 * Header File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
session_start();
require "config.php";

if (isset($_GET['action']) && ($_GET['action'] == 'logout')) {
    unset($_SESSION["data"]);
    header('Location: http://localhost/Training/Online_test/login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $title; ?>
    </title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div id="header">
        <h1 id="logo">Logo</h1>
        <nav>
            <ul id="menu">
                <?php 
                if ($title == "Dashboard" || $title == "Test") { ?>
                    <li><a href="user_dashboard.php">Dashboard</a></li>
                    <li><a href="http://localhost/Training/Online_test/login.php?action=logout">LogOut</a></li>
                <?php 
                } else {
                ?>
                    <li><a href="login.php">LogIn</a></li>
                    <li><a href="register.php">SignUp</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <div id="main">