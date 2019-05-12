<?php
include 'includes/dbh.php';
 include 'includes/user.php';
if(isset($_POST['edit_row']))
{
 $id=$_POST['row_id'];
 $name=$_POST['name'];

 $object = $object->update_row($name,$id);
 // $stmt = "UPDATE lga set name='$name' where id='$id'";
 // $result = $this->connect()->query($stmt);
 // echo "success";
 // exit();
}

?>