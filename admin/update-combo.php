<?php include('partials/menu.php')?>


<?php 

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM combo WHERE id=$id";

        $res2 = mysqli_query($conn,$sql2);

        $row = mysqli_fetch_assoc($res2);

        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    }
    else
    {
        header('locaion:'.SITEURL.'admin/manage-combos.php');
    }


?>

<div class="main-content">

    <div class="wrapper">
    <h1>Update Combo</h1>
    <br><br>


    <form action="" method="POST" enctype="multipart/form-data">
    
    <table class="tbl-30">
    
    <tr>
        <td>Title:</td>
        <td>
            <input type="text" name="title" value="<?php echo $title;?>">
        </td>
    </tr>
    <tr>
    <td>Description:</td>
    <td>
        <textarea name="description" cols="30" rows="5"><?php echo $description;?></textarea>
    </td>
    </tr>
    <tr>
    <td>Price:</td>
    <td>
        <input type="number" name="price" value="<?php echo $price;?>">
    </td>
    </tr>
    <tr>
    <td>Current Image:</td>
    <td>
            <?php
            
            if($current_image == "")
            {
                echo"Image not available for this combo";
            }
            else
            {
                ?>
                    <img src="../combos/<?php echo $current_image;?>" alt="combo" width="100px">
                <?php
            }
            
            
            ?>
    </td>
    </tr>
    <tr>
    <td>Select Image:</td>
    <td><input type="file" name="image"></td>
    </tr>
    <tr>
    <td>Featured:</td>
    <td>
        <input <?php if($featured == "Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
        <input <?php if($featured == "No"){echo "checked";}?> type="radio" name="featured" value="No">No
    </td>
    </tr>
    <tr>
    <td>Active:</td>
    <td>
        <input <?php if($active == "Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
        <input <?php if($active == "No"){echo "checked";}?> type="radio" name="active" value="No">No
    </td>
    </tr>
    <tr>
        <td>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">

            <input type="submit" name="submit" value="Update combo" class="btn-secondary">
        </td>
    </tr>

    </table>
    
    </form>

    <?php
    
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];


        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name != "")
            {
                $ext = explode('.', $image_name);
                $extension = end($ext);
                
                $image_name = "combo_".$title.rand(0000, 9999).'.'.$extension;

                $src_path = $_FILES['image']['tmp_name'];
                $dest_path = "../combos/".$image_name;

                $upload = move_uploaded_file($src_path, $dest_path);

                if($upload == FALSE)
                {
                    $_SESSION['upload'] = "failed to upload new image";
                    header('loaction:'.SITEURL.'admin/manage-combos.php');
                    die();

                }
                if($current_image != "")
                {
                    $remove_path = "../combos/".$current_image;

                    $remove = unlink($remove_path);

                    if($remove==FALSE)
                    {
                        $_SESSION['remove-failed']="failed to remove the image";
                        header('location:'.SITEURL.'admin/manage-combos.php');
                    }
                }
            }
            else
            {
                $image_name = $current_image;
            }
        }
        else
        {
            $image_name = $current_image;
        }


        $sql3 = "UPDATE combo SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                featured = '$featured',
                active = '$active' WHERE id = $id
                ";

        $res3 = mysqli_query($conn, $sql3);

        if($res3 == TRUE)
        {
            $_SESSION['updated'] = "successfully updated combo";
            header('location:'.SITEURL.'admin/manage-combos.php');
        }
        else
        {
            $_SESSION['updated'] = "failed to update combo";
            header('location:'.SITEURL.'admin/manage-combos.php');
        }

    }
    
    
    ?>
    
    
    </div>

</div>

<?php include('partials/footer.php')?>









