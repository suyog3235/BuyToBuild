<?php include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
    <h1>Add Service</h1>

    <br><br>
    <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

    ?>
    <br><br>
    <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="Service Title"></td>
            </tr>
            <tr>
                <td>Select Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                </td>

            </tr>
            <tr>
                <td>Active:</td>
                <td>
                <input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No">No
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Service" class="btn-primary">
                </td>
            </tr>
        </table>


    </form>
    </div>

    <?php
        if(isset($_POST['submit']))
        {
            $title = $_POST['title'];
            
            if(isset($_POST['featured']))
            {

                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";
            }

        
            
            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }
           
            //check if image is selected or not
            if(isset($_FILES['image']['name']))
            {
               $image_name=$_FILES['image']['name'];

              if($image_name != "")
              {
                $ext = explode('.',$image_name);
                $extension =end($ext);
 
                //rename the image
 
                $image_name = "services_".$title.rand(000,999).'.'.$extension;
                
                $source_path=$_FILES['image']['tmp_name'];
                
                $destination_path="../services/".$image_name;
 
                //upload
 
                $upload = move_uploaded_file($source_path, $destination_path);
 
                //check
                if($upload==false)
                {
                    $_SESSION['upload']="failed to upload";
                    header('loaction:'.SITEURL.'admin/add-service.php');
                    die();
 
                }
              }
            }
            else
            {
                $image_name ="";
            }


            //sql query

            $sql = " INSERT INTO services SET
                     title='$title',
                     image_name='$image_name',
                     featured='$featured',
                     active='$active'
                     ";

            //execute
            $res = mysqli_query($conn, $sql);

            //check is query executed

            if($res==true)
            {
                $_SESSION['add']="Successfully added new service";
                header('location:'.SITEURL.'admin/manage-services.php');
            }
            else
            {
                $_SESSION['add']="Failed to add service";
                header('location:'.SITEURL.'admin/add-service.php');

            }
        }
        
    ?>

</div>



<?php include('partials/footer.php');?>