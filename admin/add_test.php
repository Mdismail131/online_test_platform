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
$title = "Add Test";
require "header.php";
require "../config.php";
if (!isset($_SESSION['admin']) ) {

    header('Location: http://localhost/Training/Online_test/admin/login.php');

}
if (isset($_POST['add_test'])) {
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    
    if ($check !== false) {
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 0;
        } else {
        }
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //   echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
            //   echo "Sorry, there was an error uploading your file.";
        }
    }

    $test_name = $_POST['test_name'];

    $insert = "INSERT INTO `categories`(`category_name`, `category_image`) VALUES ('".$test_name."','".$_FILES["image"]["name"]."')";
    $res = mysqli_query($conn, $insert);

    $create = "CREATE TABLE ".$test_name." (
        ques_no int PRIMARY KEY,
        question text,
        chA varchar(100),
        chB varchar(100),
        chC varchar(100),
        chD varchar(100),
        answer varchar(100),
        button int
    )";
    $res1 = mysqli_query($conn, $create);

    header('Location: http://localhost/Training/Online_test/admin/admin_dashboard.php');
}
?>
<form method="post" enctype="multipart/form-data">

    <label>Image</label>
    <input class="text-input short-input" type="file"  name="image" required/>
    <label>Test Name</label>
    <input type="text" name="test_name">
    <input type="submit" name="add_test" value="Add Test" required>

</form>
<?php
require "footer.php";
?>