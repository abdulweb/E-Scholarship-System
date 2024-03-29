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
                    echo '<h3 class="text-center text-success"> Your test has been submitted Successfuly </h3>';
                    echo '<h5 class="text-center text-success">Keep checking your Dashboard to know your status</h5>' ;
                        echo '<p class="text-center text-danger"> Contact your Local Gov'."'".'t Admin for any help </p>';
                    }
                    else{
                            
                        if ((isset($_POST['Submit_btn'])) ||($_SERVER['REQUEST_METHOD']=='POST')) {
                             $Selected_Answers = array();
                            $Question_IDs = array();
                            for ($i=0; $i < 3 ; $i++) 
                            { 
                                # code...
                                $btn = 'op'.$i;
                                $qstn = $i;
                                if ($_POST[$btn]=="Not Selected") {
                                    # code...

                                }else{
                                array_push($Selected_Answers, $_POST[$btn]);
                                array_push($Question_IDs, $_POST[$qstn]);
                            }
                        }
                            $object->storeTest($Question_IDs,$Selected_Answers,$_SESSION['user_id']);
                            
                        }
                    ?>

                    <div class="col-md-12">
                        <form method="POST" action="test.php" id="test_form" >
                        <?php $questions = $object->getTestQuestion($_SESSION['user_id']);
                            $counter = 1;
                            foreach ($questions as $key => $question) {
                                $questionID = $question['question_id'];
                                $qstn_id = $key;
                                $button_name = 'op'.$key;
                        ?>
                            <p class="ml-5 font-bold"> <span style="margin: 10px;"><?=$counter;?> </span> <?=$question['question'];?></p>
                            <div class="demo-radio-button">

                                    <input type="hidden" name="<?=$qstn_id?>" value = "<?=$questionID?>">
                                    <input type="hidden" name="<?=$button_name?>" value = "Not Selected">
                                    <input name="<?=$button_name?>" type="radio" id="<?=$key?>a" class="with-gap" value="A" />
                                    <label for="<?=$key?>a"><?=$question['option1'];?></label>
                                    <input name="<?=$button_name?>" type="radio" id="<?=$key?>b" class="with-gap" value="B" />
                                    <label for="<?=$key?>b"><?=$question['option2'];?></label>
                                    <input name="<?=$button_name?>" type="radio" class="with-gap" id="<?=$key?>c" value="C"/>
                                    <label for="<?=$key?>c"><?=$question['option3'];?></label>
                                    <input name="<?=$button_name?>" type="radio" id="<?=$key?>d" class="with-gap" value="D"/>
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
    
