<?php
//get the config for conn

include('../config/constants.php');

//get the id of admin to delete

$id = $_GET['id'];

//query to delete admin

$sql = "DELETE FROM admin WHERE id=$id";

//execute the query

$res = mysqli_query($conn, $sql);

//check weather the query is executed successfully or not

if($res == TRUE)
{
    //echo"admin deleted successfully";

    $_SESSION['delete'] = "Admin Deleted Successfully.";

    //redirect

    header('location:'.SITEURL.'admin/manage-admin.php');
    
}
else
{
    //echo"failed to delete";

    $_SESSION['delete'] = "Failed To Delete Try Again.";
   
     //redirect
   
    header('location:'.SITEURL.'admin/manage-admin.php');
   

}
//redirect to manage admin page with msg (Success/error)



?>