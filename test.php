<?php
/**
 * Test File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
$title = "Test";
require "header.php";

$offset = "";
$page_num = 1;

if (!isset($_SESSION['data']) ) {

    header('Location: http://localhost/Training/Online_test/login.php');

}

if (isset($_GET['page_num']) && $_GET['page_num'] != "") {

    $page_num = $_GET['page_num'];
    $page = $page_num - 1 ;
    $offset = " OFFSET ".$page."";
    
}

if (isset($_POST['submit'])) {
  
    $_SESSION['data']['subject'] = $_POST['name'];

}

$subject = $_SESSION['data']['subject'];
$select1 = "SELECT * FROM ".$subject." LIMIT 1 ".$offset." " ;
$result1 = mysqli_query($conn, $select1);
$row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

$select = "SELECT * FROM ".$subject." " ;
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
$len = mysqli_num_rows($result);

if (isset($_POST['sub_button'])) {
    $correct = 0;
    $ans = $_SESSION['test'];
    foreach ($ans as $qno => $answer) {
        foreach ($row as $key => $val) {
            if ($qno == $val['ques_no']) {
                if ($answer == $val['answer']) {
                    $correct++;
                }
            }   
        }
    }
    echo "<p id='msg' >you give ".$correct." correct answers out of  ".$len." questions</p>";
    $percent = $correct/$len;
    $perc = number_format($percent * 100, 2);
    if ($perc<50) {
    ?>
    <script>
    var per = <?php echo $perc ?>; 
    alert("you failed in this exam/test,as you scored "+per+"% marks");
    window.location.href = "http://localhost/Training/Online_test/user_dashboard.php";
    </script>
    <?php 
    } else {
    ?>
    <script>
    var per = <?php echo $perc ?>; 
    alert("You passed this exam/test,as you scored "+per+"% marks");
    window.location.href = "http://localhost/Training/Online_test/user_dashboard.php";
    </script> 
    <?php
    }
}

if (!isset($_SESSION['data'])) {

    header('Location: http://localhost/Training/Online_test/login.php');

}
$arr = array();

if (isset($_SESSION['data'])) {

    $arr = $_SESSION['data'];
    

}
echo "<h3>welcome '".$arr['name']."' you can quit this ".$_SESSION['data']['subject']."      test any time by pressing this logout link  <a href='http://localhost/Training/Online_test/login.php?action=logout'>Logout </a></h3>";

?>
<div class="result">
    <form method="POST" id="my_form">
        <p id="qno">Question: <?php echo $row1[0]['ques_no']; ?></p>
        <p style="text-align: center;"><?php echo $row1[0]['question']; ?></p>
        <div class="table">
            <table>
                <tr>
                    <td><input type="radio" name="choice" data-qno="<?php echo $row1[0]['ques_no']; ?>" value="<?php echo $row1[0]['chA']; ?>"><?php echo $row1[0]['chA']; ?></td>
                    <td><input type="radio" name="choice" data-qno="<?php echo $row1[0]['ques_no']; ?>" value="<?php echo $row1[0]['chB']; ?>"><?php echo $row1[0]['chB']; ?></td>
                </tr>
                <tr>
                    <td><input type="radio" name="choice" data-qno="<?php echo $row1[0]['ques_no']; ?>" value="<?php echo $row1[0]['chC']; ?>"><?php echo $row1[0]['chC']; ?></td>
                    <td><input type="radio" name="choice" data-qno="<?php echo $row1[0]['ques_no']; ?>" value="<?php echo $row1[0]['chD']; ?>"><?php echo $row1[0]['chD']; ?></td>
                </tr>
            </table>
        </div>
        <?php
        
        if ($row1[0]['ques_no'] == 1) {
        
            ?>
            <div class="buttons">
            <?php
            if ($row[0]['button'] == "0") {
            ?>
                <a href="http://localhost/Training/Online_test/test.php?page_num=<?php echo $page_num + 1?>" id="next" >Next</a>
            <?php
            } else {
            ?>
                <a href="javascript:void(0)" id="next" >Next</a>
            <?php
            }
            ?>
            </div>
            <?php
            
        } elseif ($row1[0]['ques_no'] == $len) {
        
        ?>
            <div class="buttons">
                <a href="http://localhost/Training/Online_test/test.php?page_num=<?php echo $page_num - 1?>" id="prev" >Previous</a>
                <input type="submit" name="sub_button" id="next" value="Submit">
            </div>
        <?php
        
        } else {
        
        ?>
            <div class="buttons">
                <?php
                if ($row[0]['button'] == "0") {
                ?>
                    <a href="http://localhost/Training/Online_test/test.php?page_num=<?php echo $page_num - 1?>" id="prev" >Previous</a>
                    <a href="http://localhost/Training/Online_test/test.php?page_num=<?php echo $page_num + 1?>" id="next" >Next</a>
                <?php
                } else {
                ?>
                    <a href="javascript:void(0)" id="prev" >Previous</a>
                    <a href="javascript:void(0)" id="next" >Next</a>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </form>
</div>
<?php
require "footer.php";
?>