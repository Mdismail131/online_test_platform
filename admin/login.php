<?php 
/**
 * Login File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
$title = "LogIn";
require "header.php";
require "../config.php";

if (isset($_POST['submit'])) {
    $username = (isset($_POST['username'])) ? strtolower($_POST['username']) : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    
    //Select all data from DB table.
    $select = "SELECT * FROM user_data "; 
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($result);
    $search = '';
    foreach ($row as $val) {
        //check username and password match or not.
        if ($val[1] == $username && $val[2] == $password && $val[4] == "admin") {
            $search = 'match found';
            $arr['name'] = $username;
            $_SESSION['admin'] = $arr;
            header('Location: http://localhost/Training/Online_test/admin/login.php ');
        }
    }
    if ($search == '') { ?>
        <script>alert("User Doesn't Exist");</script>
    <?php 
    } else {
        header('Location: http://localhost/Training/Online_test/admin/admin_dashboard.php ');
    } 

    $_POST = array();
    
}
?>
<div id="login-form" class="aa-login-form">
    <form action="" method="POST">
        <p>
            <label for="username">Username: <input type="text" 
                    name="username" required></label>
        </p>
        <p>
            <label for="password">Password: <input type="password" 
                    name="password" required></label>
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>
</div>