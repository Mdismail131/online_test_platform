<?php
/**
 * Questions File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
$title = "Questions";
require "header.php";

if (!isset($_SESSION['admin']) ) {

    header('Location: http://localhost/Training/Online_test/admin/login.php');

}
if (isset($_POST['submit']) && $_POST['name'] == "Physics") {
    
    $_SESSION['admin']['subject'] = "Physics"; 
    
    
} elseif (isset($_POST['submit']) && $_POST['name'] == "Chemistry") {
    
    $_SESSION['admin']['subject'] = "Chemistry"; 
    
} else {
    
    $_SESSION['admin']['subject'] = "PHP"; 

}
$subject = $_SESSION['admin']['subject'];
$select = "SELECT * FROM ".$subject." " ;
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div class="sub">
    <p><?php echo $subject; ?></p>
</div>
<div class="ques">
<table>
    <thead>
        <tr>
            <th>Ques. No.</th>
            <th>Question</th>
            <th>choice A</th>
            <th>choice B</th>
            <th>choice C</th>
            <th>choice D</th>
            <th>Answer</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($row as $key => $val) {
?>
        <tr>
            <td><?php echo $val['ques_no'];?></td>
            <td><?php echo $val['question'];?></td>
            <td><?php echo $val['chA'];?></td>
            <td><?php echo $val['chB'];?></td>
            <td><?php echo $val['chC'];?></td>
            <td><?php echo $val['chD'];?></td>
            <td><?php echo $val['answer'];?></td>
        </tr>
<?php
}
?>
    </tbody>
</table>
</div>
<form method="post">
<div id="button">
    <input type="submit" name="button" value="Add Question">
</div>
</form>

