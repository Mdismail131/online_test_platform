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
require "../config.php";

if (isset($_GET['action']) && ($_GET['action'] == 'logout')) {
    unset($_SESSION["admin"]);
    header('Location: http://localhost/Training/Online_test/admin/login.php');
}

if (isset($_POST['add_ques'])) {
    $qno = $_POST['qno'];
    $ques = $_POST['questn'];
    $ch1 = $_POST['ch1'];
    $ch2 = $_POST['ch2'];
    $ch3 = $_POST['ch3'];
    $ch4 = $_POST['ch4'];
    $ans = $_POST['answer'];
        
    $subject = $_SESSION['admin']['subject'];
    $insert = "INSERT INTO `".$subject."`(`ques_no`,`question`, `chA`, `chB`, `chC`, `chD`, `answer`, `button`) VALUES ('".$qno."','".$ques."','".$ch1."','".$ch2."','".$ch3."','".$ch4."','".$ans."', '0')";
    $result1 = mysqli_query($conn, $insert);
    header('Location: http://localhost/Training/Online_test/admin/questions.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $title; ?>
    </title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
    <div id="header">
        <h1 id="logo">Admin Pannel</h1>
        <nav>
            <ul id="menu">
                <?php
                if ($title == "LogIn") {
                ?>
                <li><a href="login.php">Login</a></li>
                <?php
                } else {
                ?>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="http://localhost/Training/Online_test/admin/login.php?action=logout">Logout</a></li>
                <?php
                $select1 = "SELECT * FROM Physics " ;
                $result1 = mysqli_query($conn, $select1);
                $row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
                if ($row1[0]['button'] == "0") {
                ?>
                    <li><a href="javascript:void(0)" class="toggle_btn" style="display: none">Active Next/Prev</a></li>
                    <li><a href="javascript:void(0)" class="toggle_btn">Deactive Next/Prev</a></li>
                <?php
                } else {
                ?>
                    <li><a href="javascript:void(0)" class="toggle_btn">Active Next/Prev</a></li>
                    <li><a href="javascript:void(0)" class="toggle_btn" style="display: none">Deactive Next/Prev</a></li>
                <?php
                }
                }  
                ?>
                <li><a href="add_test.php">Add Test</a></li>
            </ul>
        </nav>
    </div>
    <?php
    
    if (isset($_POST['button'])) {
    ?>
    <div class="add">
        <form method="post">
            <label for="qno">Ques. no.:</label>
            <input type="number" name="qno" required>
            <label for="question">Question:</label>
            <input type="text" name="questn" size="100" required><br>
            <label for="ch1">Choice 1:</label>
            <input type="text" name="ch1" required>
            <label for="ch2">Choice 2:</label>
            <input type="text" name="ch2" required>
            <label for="ch3">Choice 3:</label>
            <input type="text" name="ch3" required>
            <label for="ch4">Choice 4:</label>
            <input type="text" name="ch4" required>
            <label for="answer">Answer:</label>
            <input type="text" name="answer" required>
            <input type="submit" name="add_ques" id="add_ques" value="Add">
        </form>
    </div>
    <?php
    }

    ?>
    <div id="main">