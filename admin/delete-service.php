<?php

include('../config/constants.php');


if(isset($_GET['id']) && isset($_GET['image_name']))
{
    $id =$_GET['id'];
    $image_name = $_GET['image_name'];


    //remove img

    if($image_name != "")
    {
        $path ="../services/".$image_name;

        $remove = unlink($path);

        if($remove == false)
        {
            $_SESSION['remove']="";
            header('location:'.SITEURL.'admin/manage-services.php');
            die();
        }
    }

    $sql = "DELETE FROM services WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['delete']="Deleted successfully";
        header('location:'.SITEURL.'admin/manage-services.php');
    }
    else
    {
        $_SESSION['delete']="Failed to delete";
        header('location:'.SITEURL.'admin/manage-services.php');
    }
}
else
{
    header('location:'.SITEURL.'admin/manage-services.php');
}
?>