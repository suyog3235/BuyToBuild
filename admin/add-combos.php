<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Combos</h1>
        
        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            
            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="title"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" cols="25" rows="5" placeholder="description"></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" ></td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                
                <tr>
                    <td>Featured:</td>
                    <td><input type="radio" name="featured" value="Yes">Yes
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
                    <input type="submit" name="submit" value="Add combo" class="btn-secondary">
                    </td>
                </tr>


            </table>
        
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price=$_POST['price'];
                $category=$_POST['category'];

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

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $ext = explode('.',$image_name);
                        $extension = end($ext);

                        $image_name = "combo-name_".$title.rand(000,999).'.'.$extension;

                        $src=$_FILES['image']['tmp_name'];
                
                        $dst="../combos/".$image_name;

                        $upload = move_uploaded_file($src, $dst);
 
                        //check
                        if($upload==false)
                        {
                            $_SESSION['upload']="failed to upload";
                            header('loaction:'.SITEURL.'admin/add-combos.php');
                            die();
         
                        }
                    }
                }
                else
                {
                    $image_name = ""; //set default value as blank
                }

                $sql2 = "INSERT INTO combo SET
                            title ='$title',
                            description ='$description',
                            price = $price,
                            image_name='$image_name',
                            featured='$featured',
                            active='$active' ";

                $res2 = mysqli_query($conn,$sql2);

                if($res2 == true)
                {
                    $_SESSION['add']=" combo added successfully";
                    header('location:'.SITEURL.'admin/manage-combos.php');
                }
                else
                {
                    $_SESSION['add']="failed to add combo";
                    header('location:'.SITEURL.'admin/manage-combos.php');
                }

            }
        ?>
        
    </div>
</div>


<?php include('partials/footer.php');?>





