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
                    <h3 class="text-center">Application Status</h3>
                    <p>
                        <?php
                            
                            if ($object->applicantStatus($_SESSION['user_id']) == 1) {
                               echo "<p class='text-success text-center'>Congratulation you have been shortlisted for the ".date('Y') ." Schorlaship programme </p>";
                            }
                            else if ($object->applicantStatus($_SESSION['user_id']) == 0) {
                               echo "<p>Application is under review... Please check back later </p>";
                            }
                            else{
                                echo "Application Rejected due to rule voilent";
                            }

                         ?>
                    </p>

                </div>      
                </div>
        	</div>
        </div>
        

    </div>
</section>
<?php
    include 'jslinks.php';
?>
    
