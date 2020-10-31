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
    
$qno = $_POST['questn_no'];
$answer = $_POST['answer'];
$_SESSION['test'][$qno] = $answer;
$ans = $_SESSION['test'];

echo json_encode(array($ans));

?>