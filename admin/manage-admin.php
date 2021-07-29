<?php include('partials/menu.php')?>

    <!--main content section-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
             
            <br>
            <!--button to add admin--->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //display session message
                    unset($_SESSION['add']); //remove session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //display session message
                    unset($_SESSION['delete']); //remove session message
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //display session message
                    unset($_SESSION['update']); //remove session message
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);

                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
            ?>
             <br><br>
            <table class="tbl-full">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM admin"; //query to get aall admin names
                    $res = mysqli_query($conn ,$sql);
                    $sn = 1;

                    //check query executed or not

                    if($res == TRUE)
                    {
                        //count rows to check is we have data in data base

                        $count = mysqli_num_rows($res); //to get all rows in database

                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loop to get all the data from the database
                                //and while loop will run as long as we have data in database

                                //get individual data

                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];
                                
                                //display the values in our table
                                ?>

                                <tr>
                                    <td> <?php echo $sn++; ?> </td>
                                    <td> <?php echo $full_name; ?>  </td>
                                    <td> <?php echo $username; ?> </td>
                                    <td>                                   
                                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete</a> 
                                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id ?>" class="btn-danger">Update Password</a>                                   
                                    </td>
                                </tr>



                            <?php
                            }
                        }
                        else
                        {
                        
                        }
                    }
                
                
                
                
                
                ?>

               
            </table>
            
           
        </div> 
    </div>
    <!--main content section end-->

    <?php include('partials/footer.php')?>