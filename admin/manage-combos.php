<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
         <h1>Manage Combos</h1>

         <br><br>

         <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['unauth']))
                {
                    echo $_SESSION['unauth'];
                    unset($_SESSION['unauth']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['remove-failed']))
                {
                    echo $_SESSION['remove-failed'];
                    unset($_SESSION['remove-failed']);
                }

                if(isset($_SESSION['updated']))
                {
                    echo $_SESSION['updated'];
                    unset($_SESSION['updated']);
                }
         ?>
         <br><br>
            <!--button to add admin--->
            <a href="<?php echo SITEURL;?>admin/add-combos.php" class="btn-primary">Add Combos</a>
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                    <?php
                        $sql = "SELECT * FROM combo";

                        $res=mysqli_query($conn,$sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;
                        
                        if($count>0)
                        {
                           while($row=mysqli_fetch_assoc($res))
                           {
                               $id = $row['id'];
                               $title=$row['title'];
                               $price=$row['price'];
                               $image_name=$row['image_name'];
                               $featured=$row['featured'];
                               $active=$row['active'];

                               ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $title;?></td>
                                <td>₹<?php echo $price;?></td>
                                <td>
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo"image not added";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL ;?>combos/<?php echo $image_name;?>" alt="" width="100px">
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-combo.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-combo.php?id=<?php echo $id;?>&image_name<?php $image_name?>" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                               <?php
                           }
                        }   
                        else
                        {
                            echo"<tr> <td colspan='7'> combos not added yet </td> </tr>";
                        }
                    ?>
                
                
            </table>            
        </div> 
    </div>
    </div>
</div>


<?php include('partials/footer.php')?>