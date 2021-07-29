<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
         <h1>Manage Services</h1>
         <br><br>

        <?php

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-service-found']))
            {
                echo $_SESSION['no-service-found'];
                unset($_SESSION['no-service-found']);
            }

            if(isset($_session['update']))
            {
                echo $_session['update'];
                unset($_session['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }

        ?>
        <br><br>
            <!--button to add services--->
            <a href="<?php echo SITEURL;?>admin/add-service.php" class="btn-primary">Add Service</a>
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actons</th>

                </tr>

                <?php

                $sql = "SELECT * FROM services";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                $sn=1;

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        $featured = $row['featured'];
                        $active=$row['active'];
                        
                        ?>

                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $title;?></td>
                               
                                <td>
                                    <?php
                                        if($image_name!="")
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL;?>services/<?php echo $image_name;?>" width="100px">
                                            <?php
                                        }
                                        else
                                        {
                                            echo"no image added for this service";
                                        }
                                    ?>
                                </td>


                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>                    
                                <td>
                                <a href="<?php echo SITEURL;?>admin/update-service.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>
                                <a href="<?php echo SITEURL;?>admin/delete-service.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                    }

                }
                else
                {
                    ?>

                    <tr>
                        <td colspan="6"><div class="error">No new service added</div></td>
                    </tr>
                    
                    <?php
                }

                ?>


               
            </table>
            
           
        </div> 
    </div>
    </div>
</div>


<?php include('partials/footer.php')?>