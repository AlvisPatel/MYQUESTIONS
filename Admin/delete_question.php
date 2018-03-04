<?php
include "../config.php";

$id = $_POST['id'];

// Delete record
$query = "update post set p_deletion_status = 1 where q_a_c_id = $id and p_type = 'q' ";
// $query = "insert into users values(NULL,'shankarpruthvi@gmail.com',1234);";

mysqli_query($con,$query) ;

echo true;
?>
