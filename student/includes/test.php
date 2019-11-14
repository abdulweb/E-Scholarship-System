<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
    // echo $object->checkBioData($_SESSION['user_id']);
    if($object->checkBioData($_SESSION['user_id']) < 1)
    {
        header('location:application.php');
    }
 ?> 
<?php
    include 'headlink.php'; 
    include 'topbar.php';
    include 'sidebar.php';
?>

<body class="theme-teal">
    
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
        </div>
        <div class="card">
             <div class="header ">
                <h2 class="text-uppercase"><?=date('Y') ?> Schorlaship Aptitude Test</h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li>
                </ul>
            </div>
        	<div class="card-body">
        		<div class="row">
                    <div class="col-md-12 ">

                    <h3 class="text-center text-success">Zamfara <?=date('Y');?> Aptitude Test</h3>
                    </div> 
                    <?php
                    $checkTestNo = $object->checkTest($_SESSION['user_id']);
                    if ($checkTestNo > 0) {
                    echo '<h3 class="text-center text-success"> Your test has been submitted Successfuly</h3> 
                            <p class="text-center text-danger"> Contact your Local Gov'."'".'t Admin for any help </p>';
                    }
                    else{

                    
                        if (isset($_POST['Submit_btn'])) {
                            $option1 = $_POST['0'];
                            $option2 = $_POST['1'];
                            $option3 = $_POST['2'];
                            $option4 = $_POST['3'];
                            // print_r($option1);
                            //  print_r($option2);
                            //   print_r($option3);
                               // print_r($option1);
                            // $array [] = $option1;
                            // echo ($option1);
                        print_r($option1);
                        // echo count($option1);
                        for($i = 0; $i < count($option1); $i++)
                        {
                                print_r($option1[$i]);
                        }

                                //  echo $option1;
                                // echo  $option2;
                            // ($object->storeTest($option1, $_SESSION['user_id']));
                            // ($object->storeTest($option2, $_SESSION['user_id']));
                            // ($object->storeTest($option3, $_SESSION['user_id']));
                            // ($object->storeTest($option4, $_SESSION['user_id']));
                            // ($object->storeTest($option5, $_SESSION['user_id']));
                        }
                    ?>

                    <div class="col-md-12">
                        <form method="POST" action="test.php" id="test_form" >
                        <?php $questions = $object->getTestQuestion($_SESSION['user_id']);
                            $counter = 1;
                            foreach ($questions as $key => $question) {
                                $questionID = $question['question_id'];
                        ?>
                            <p class="ml-5 font-bold"> <span style="margin: 10px;"><?=$counter;?> </span> <?=$question['question'];?></p>
                            <div class="demo-radio-button">

                            
                                    <input name="<?=$key?>" type="radio" id="<?=$key?>a" class="with-gap" value="<?=array("1", "F")?>" />
                                    <label for="<?=$key?>a"><?=$question['option1'];?></label>
                                    <input name="<?=$key?>" type="radio" id="<?=$key?>b" class="with-gap" value="<?=array($questionID, B)?>" />
                                    <label for="<?=$key?>b"><?=$question['option2'];?></label>
                                    <input name="<?=$key?>" type="radio" class="with-gap" id="<?=$key?>c" value="<?=array($questionID, C)?>"/>
                                    <label for="<?=$key?>c"><?=$question['option3'];?></label>
                                    <input name="<?=$key?>" type="radio" id="<?=$key?>d" class="with-gap" value="<?=array($questionID, D)?>"/>
                                    <label for="<?=$key?>d"><?=$question['option4'];?></label>
                            </div>
                            <?php
                            ++$counter;}
                            ?>
                            <div>
                                <button class="btn btn-success btn-block mt-10" onclick="return confirm('Ready to Submit?');" type="submit" name="Submit_btn" style="margin-top: 20px;">Submit</button>
                            </div>
                        </form>

                    </div>
                    <?php }?>
                </div>
        	</div>
        </div>
        

    </div>
</section>
<?php
    include 'jslinks.php';
?>
    
