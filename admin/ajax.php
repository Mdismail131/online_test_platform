<?php
/**
 * Ajax.
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
require "../config.php";

$count = $_POST['cnt'];

$select = "SELECT * FROM categories" ; 
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($row as $value) {
    
    $update = "UPDATE `".$value['category_name']."` SET `".$value['category_name']."`.`button`='".$count."'";
    $res = mysqli_query($conn, $update);

}

echo $count;
?>