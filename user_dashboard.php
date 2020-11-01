<?php
/**
 * Users Dashboard.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
$title = "Dashboard";
require "header.php";
require "config.php";

if (!isset($_SESSION['data']) ) {

    header('Location: http://localhost/Training/Online_test/login.php');

}

$arr = array();

if (isset($_SESSION['data'])) {

    $arr = $_SESSION['data'];
    

}

if (isset($arr['name'])) {
    echo "<h3>welcome '".$arr['name']."'<a href='http://localhost/Training/Online_test/login.php?action=logout'>Logout </a></h3>";
    $select = "SELECT * FROM categories" ; 
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($row as $key => $values) {
        echo "<form action='test.php' method='POST'>";
        echo '<div id="product-101" class="product">';
        echo "<input type='hidden' name='image' value='".$values['category_image']."'>";
        echo '<img src="admin/image/'.$values['category_image'].'" >';
        echo "<input type='hidden' name='name' value='".$values['category_name']."'>";
        echo '<input type="submit" name="submit" class="submit" value="'.$values['category_name'].'">';
        echo '</div></form>';
    }
}

?>
<?php

require "footer.php";

?>