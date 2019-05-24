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
        	<div class="card-title">Dashboard</div>
        	<div class="card-body">
        		<h3 class="text-justify">Welcome   </h3>
        	</div>
        </div>
        

    </div>
</section>
<?php
    include 'jslinks.php';
?>
    
