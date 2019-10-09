<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
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
                <h2 class="text-uppercase"><?=date('Y') ?> Schorlaship Application</h2>
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
                    <h3 class="text-center">Application Notice</h3>
                    <p class="text-danger m-l-10">Please Take Note of the following before applying for <span class="font-bold text-success"><?=date('Y')?></span> Scholarship.</p>
                    <ol>
                        <li>Make Sure You have Submitted ur Bio-data Before applying to avoid lost </li>
                        <li>If your document is find fake your application will be rejected</li>
                        <li>You will have to take simple Test for Verification</li>
                        <li>Fail to take the test simple mean you did not apply for this year scholarship</li>
                        <li>If you have agreed on the above the click on Apply button to start the test</li>
                    </ol>
                    <a class="btn btn-success btn-block" onclick ="return confirm('Read to take Test?');" href="test.php">Apply Now</a>

                </div>      
                </div>
        	</div>
        </div>
        

    </div>
</section>
<?php
    include 'jslinks.php';
?>
    
