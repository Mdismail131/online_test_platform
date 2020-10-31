<?php
/**
 * Footer.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
?>
</div>
</body>
<script>
    $('.toggle_btn').on('click',function(){
        $( ".toggle_btn" ).toggle();
        var tog = $(this).html();
        var count;
        if(tog == "Active Next/Prev") {
            count = 0;
        } else {
            count = 1;
        }
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: { 
                    cnt: count
            },
            success:function(response){

            console.log(response);
                
            }
        });
    });
</script>
</html>