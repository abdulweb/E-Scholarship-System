<?php
session_start();
include('includes/config.php');

$testid=$_GET['testid'];
//timer
$qry=mysqli_query($bd,"select * from test_type_tb where Test_id='$testid'");
$numrows=mysqli_num_rows($qry);
if ($numrows>0){
    $row=mysqli_fetch_assoc($qry);
    
    $init=$row['Time'];
    $minute=floor(($init/60)%60);
    $sec=$init%60;

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <script src="assets/js/jquery-2.1.3.min.js" > </script>
    <script type="text/javascript" src="assest/js/jquery.countdown.pack.js"></script>
    <title>Home Page</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body onload="test()">
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['loggged in']!="")
{
 include('includes/menubar_test.php');
}
$Username = $_SESSION['loggged in'];
 ?>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-9">
        <div align="center">
        <div class="clock">
            <!--<span class="countdown">0</span>minutes-->
                <span align="center" style="font-size:24px; background:#FFF;"><span style="color:black;" class="min"><?php echo $minute; ?></span><span style="color:white;"> <span style="color:black"> : </span></span><span style="color:black;" class="sec"><?php echo $sec; ?></span></span>

            <table class=" table">
    

                 <tr><td>
                 
                 <div id="questions">
                  
                  </div>
                  <form action ="process_ans.php" name="form1" class="login" id="form1" >
                  <input name="qn" type="hidden" id="qn"/>
                  <input name="qnarray" type="hidden" id="qn1" />
                   <input name="qnarray2" type="hidden" id="qn2" />
                     <input  name="Preview" type="button" class="prev btn btn-info" value="Previous" onclick="prev()" />
                   <input  name="next" type="Button" class="nextq btn btn-info" value="Next"    onclick="test()"/> 
                      <input  name="Submit" type="button" class="sub btn btn-info" value="Submit" />
                 </form>
                </td></tr>
                </table>
        </div>
        </div>


    
        </div>
        
    </div>
    <?php   
//to count questions
$qry2=mysqli_query($bd,"select * from question_tb where Test_type='".$_SESSION['test']."'");
$numrows=mysqli_num_rows($qry2);



//echo $numrows;
?>
<!-- TAB ON ACRIPT -->
<script type="text/javascript">
var totalq = <?php echo $numrows; ?>
    
function countdown(){
        var m = $('.min');
        var s = $('.sec');
        if(m.html()==0 && parseInt(s.html()) <= 0){
            $('.clock').html('Time UP.');
            $('#questions').hide();
            $('.nextq').hide();
            $('.prev').hide();  
            submittest();
        }
        if(parseInt(s.html()) <=0 ){
            m.html(parseInt(m.html()-1));
            s.html(60);
        }
        if(parseInt(s.html()) <=0){
            $('.clock').html('<span class="sec">59</span> seconds. ');
        }
        s.html(parseInt(s.html()-1));
}
        setInterval ('countdown()', 1000);
        
        
        
        var inc = -1;
        
                for (var i = 1, ar = []; i <= totalq; i++) {
    ar[i] = i;
  }

  // randomize the array
  ar.sort(function () {
      return Math.random() - 0.5;
  });
// console.log(ar.pop());
//console.log(ar);
 
            
    
        

function test(){

  if(inc > totalq - 3){
   //  code
   //alert("Final")
  $('.nextq').fadeOut()
// $('.prev').fadeOut()
  }
  inc++;
$('#qn').val(inc);
$('#qn1').val(ar);
console.log(inc);
$('#qn2').val(ar[inc]); 
//alert(stclass);
// To process student answer 
var qn= $('#qn2').val();
var cor =$('#qn3').val();

$(document).ready(function(e){
    
    //alert(totalq);
     $('.prev').hide()
    var formData = jQuery(this).serialize();
                                $.ajax({
                                    type:"POST",
                                    url:"questions.php?qno="+ ar[inc],
                                    data:formData,
                                    success: function(html){            
                                    if(html==0){
                                
                                      //  alert("something is wrong at beg");
                                        
                                        return false;
                                            
                                        }else{
                                            //alert("everything is alright at beg");   
                                            //alert(ar[inc]);
                                            //alert(html);
                                            $('#questions').empty(html)
                                            $('#questions').append(html)
                                        
                                        }
                                }
                            }); 
    
    
    
    //to insert values into database on form load before updating on option click

    $.ajax({
        
        
                                    type:"POST",
                                    url:"process_ans.php?qno="+ ar[inc],
                                    data:formData,
                                    success: function(html){            
                                    if(html==0){
                            
                                        //alert("something is wrong in process_ans 2");
                                        
                                        return false;
                                            
                                        }else{
                                            //alert("everything is alright in process_ans 2");   
                                            //alert(ar[inc]);
                                            //alert(html);
                                                            
                                        }
                            }
                        }); 
    
    
    
jQuery(".nextq").click(function(e){
     $('.prev').show()
                                e.preventDefault();
                                //alert(totalq);
                                var formData = jQuery(this).serialize();
                                $.ajax({
                                    
                                    type:"POST",
                                    url:"questions.php?qno="+ ar[inc],
                                    data:formData,
                                    success: function(html){            
                                    if(html==0){
                                
                                        alert("something is wrong");
                                        //alert(ar[inc]);
                                        
                                        return false;
                                            
                                        }else{
                                            //alert("everything is alright");   
                                            //alert(ar[inc]);
                                            //alert(html);
                                            $('#questions').empty(html)
                                            $('#questions').append(html)
                                        
                                        }
                                }
                            });         
                            
});
});
}

//previous

function prev(){

  if(inc < 2){
   //  code
   //alert("Final")
 $('.prev').fadeOut()
  }
  inc--;
$('#qn').val(inc);
$('#qn1').val(ar);
console.log(inc);
$('#qn2').val(ar[inc]); 
//alert(stclass);
// To process student answer 
var qn= $('#qn2').val();
var cor =$('#qn3').val();

$(document).ready(function(e){
    
    //alert(totalq);
    
    var formData = jQuery(this).serialize();
                                $.ajax({
                                    type:"POST",
                                    url:"questions.php?qno="+ ar[inc],
                                    data:formData,
                                    success: function(html){            
                                    if(html==0){
                                
                                        //alert("something is wrong in questions 1");
                                        
                                        return false;
                                            
                                        }else{
                                          //  alert("everything is alright in questions 1");   
                                            //alert(ar[inc]);
                                            //alert(html);
                                            $('#questions').empty(html)
                                            $('#questions').append(html)
                                        
                                        }
                                }
                            }); 
    
    
    
    
    //to insert values into database on form load before updating on option click

    $.ajax({
        
        
                                    type:"POST",
                                    url:"process_ans.php?qno="+ ar[inc],
                                    data:formData,
                                    success: function(html){            
                                    if(html==0){
                            
                                        //alert("something is wrong in 2");
                                       //alert(ar[inc]);
                                        return false;
                                            
                                        }else{
                                            alert("everything is alright in 2");   
                                            alert(ar[inc]);
                                            //alert(html);
                                                            
                                        }
                            }
                        }); 
    
    
    
    
        
jQuery(".prev").click(function(e){
    
                                e.preventDefault();
                                //alert(totalq);
                                 $('.nextq').show()
                                var formData = jQuery(this).serialize();
                                $.ajax({
                                    
                                    type:"POST",
                                    url:"questions.php?qno="+ ar[inc],
                                    data:formData,
                                    success: function(html){            
                                    if(html==0){
                                
                                       // alert("something is wrong in questions 2");
                                        
                                        return false;
                                            
                                        }else{
                                        //    alert("everything is alright in questions 2");   
                                            //alert(ar[inc]);
                                            //alert(html);
                                            $('#questions').empty(html)
                                            $('#questions').append(html)
                                        
                                        }
                                }
                            });         
                            
});
});
}







//submit
jQuery(".sub").click(function(e){
    $('.prev').hide()
     $('.nextq').hide()
      $('.sub').hide()
                                e.preventDefault();
                                //alert(totalq);
                                var formData = jQuery(this).serialize();
                                $.ajax({
                                    
                                    type:"POST",
                                    url:"Submit.php",
                                    data:formData,
                                    success: function(html){            
                                    if(html==0){
                                
                                        alert("something is wrong in submit");
                                        
                                        return false;
                                            
                                        }else{
                                        //    alert("everything is alright in submit");   
                                            //alert(ar[inc]);
                                            //alert(html);
                                    
                                        $('#questions').fadeIn()
                                        $('#questions').text("THANKS FOR ATTEMPTING THE TEST, CLICK ON HOME ON THE DASHBOARD FOR YOUR SCORE!")
                                        
                                        var delay = 3000;
                                         setTimeout((function(){ window.location = 'cbt.php'  }), delay);
                                        
                                        
                                        }
                                }
                            });         
                            
});
</script>
    </div>
    
    
</div>

  
  
<div style="margin-top: 10px;"></div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>