<?php 
/**
 * Registration page.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
$title = "Register";
require "header.php";
require "config.php";

if (isset($_POST['submit'])) {
    $username = (isset($_POST['username'])) ? strtolower($_POST['username']) : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    $repassword = (isset($_POST['re-password'])) ? $_POST['re-password'] : "";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    
    //select all data form Database table.
    $select = "SELECT * FROM `user_data` ";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($result);
    $search = '';
    foreach ($row as $val) {
        if ($val[1] == $username && $val[3] == $email) {
            $search = 'match found';
        } else if ($val[3] == $email) {
            $search = 'match found';
        }
    }
    if ($search == '') {
        //Insert data into a Database table.
        $insert = "INSERT INTO `user_data`(`user_name`, `user_pass`, `user_email`, `user_role`) 
		           VALUES ('".$username."', '".$password."', '".$email."', 'user' ) ";
        $results = mysqli_query($conn, $insert);
        if ($results) { ?>
            <script>alert("New record created successfully Go for Login");</script>
        <?php }
    } else { ?>
        <script>alert("User Already Exist");</script>
    <?php }

    $_POST = array();
}
?>
<div id="signup-form">
    <form action="" method="POST" class="aa-login-form">
        <p>
            <label for="username">Username: <input type="text" 
                    name="username" required></label>
        </p>
        <p>
            <label for="password">Password: <input type="password" 
                    name="password" required></label>
        </p>
        <p>
            <label for="password2">Re-Password: <input type="password" 
                    name="re-password" required></label>
        </p>
        <p>
            <label for="email">Email: <input type="email" 
                    name="email" required></label>
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>
</div>
<?php
require "footer.php";
?>