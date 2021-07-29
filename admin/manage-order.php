<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
         <h1>Manage Orders</h1>
         <br><br>
           <?php

            if(isset($_SESSION['updated']))
            {
                echo $_SESSION['updated'];
                unset($_SESSION['updated']);
            }
           
           ?>
           
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>No.</th>
                    <th>order</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>orderdate</th>
                    <th>status</th>
                    <th> name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>address</th>
                    <th>Actions</th>
                </tr>

                    <?php

                        $sql = "SELECT * FROM orderss ORDER BY id DESC";


                        $res = mysqli_query($conn,$sql);

                        $count = mysqli_num_rows($res);

                        $sn = 1;


                        if($count>0)
                        {
                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $combo = $row['combo'];
                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $total = $row['total'];
                                $date = $row['date'];
                                $status = $row['status'];
                                $customer_name = $row['name'];
                                $contact = $row['contact'];
                                $email = $row['email'];
                                $address = $row['address'];


                                ?>
                                         <tr>
                                            <td><?php echo $sn++;?></td>
                                            <td><?php echo $combo;?></td>
                                            <td><?php echo $price;?></td>
                                            <td><?php echo $quantity;?></td>
                                            <td><?php echo $total;?></td>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $status;?></td>
                                            <td><?php echo $customer_name;?></td>
                                            <td><?php echo $contact;?></td>
                                            <td><?php echo $email;?></td>
                                            <td><?php echo $address;;?></td>
                                            <td></td>
                                            <td>
                                                <a href="update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>
                                            </td>
                                        </tr>

                                <?php


                            }
                        }
                        else
                        {
                            echo"orders not available";
                        }


                    ?>

               
    
            </table>
            
           
        </div> 
    </div>
    </div>
</div>


<?php include('partials/footer.php')?>