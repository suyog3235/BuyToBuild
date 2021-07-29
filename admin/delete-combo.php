<?php

    include('../config/constants.php');


    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path="../combos/".$image_name;

            $remove =unlink($path);

            if($remove == false)
            {
                $_SESSION['upload']="failed to remove image";
                header('location:'.SITEURL.'admin/manage-combos.php');
                die();

            }
        }

        $sql ="DELETE FROM combo WHERE id=$id";

        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            $_SESSION['delete']="combo deleted successfully";
            header('location:'.SITEURL.'admin/manage-combos.php');
        }
        else
        {
            $_SESSION['delete']="failed to delete combo";
            header('location:'.SITEURL.'admin/manage-combos.php');
        }
        
    }
    else
    {
        $_SESSION['unauth']="no access";
        header('location:'.SITEURL.'admin/manage-combos.php');
    }

?>