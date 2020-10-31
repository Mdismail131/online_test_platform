<?php
/**
 * Footer File.
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>
    //jquery for checking the Password and Re-password matches or not.
    jQuery('input[name="re-password"]').blur(function(){
        var password = jQuery('input[name="password"]').val();
        var repassword = jQuery('input[name="re-password"]').val();
        if(repassword != password){
            alert('Please enter the same password.');
            jQuery('input[name="re-password"]').val('');
        }
    });
    $(document).ready(function(){
        $('input[name="choice"]').on('click',function(){
            
            if($('input[name="choice"]').is(':checked')){
                var answer = $(this).val();  
                // alert(value);
                // console.log($(this).data('qno'));
                var q_no = $(this).data('qno');
                // alert(answer);
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: { 
                            questn_no: q_no,
                            answer: answer
                    },
                    success:function(response){

                    console.log(response);
                        
                    }
                });
            }

        });
    });
    
</script>
</body>
</html>