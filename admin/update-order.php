<?php include('partials/menu.php');?>


<div class="main-content">

<div class="wrapper">
    <h1>Update Order</h1><br><br>


    <?php
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];


        $sql = "SELECT * FROM orderss WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);


        if($count == 1)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $combo = $row['combo'];
                $quantity = $row['quantity'];
                $price = $row['price'];
                $status = $row['status'];
            }
        }
        else
        {
            header('location:'.SITEURL.'admin/manage-order.php');
        }


    }
    else
    {
        header('location:'.SITEURL.'admin/manage-order.php');
    }
    
    ?>


    <form action="" method="POST">

    <table class="tbl-30">

       <tr>
       <td>combo</td>
        <td><b><?php echo $combo;?></b></td>
       </tr>
       <tr>
           <td>price</td>
           <td><b>₹<?php echo $price;?> /Hour</b></td>
       </tr>
       <tr>
           <td>quantity</td>
           <td> <b><?php echo $quantity;?></b></td>
       </tr>
       <tr>
           <td>status</td>
           <td><select name="status">
                        <option <?php if($status == "Rented"){echo "selected";}?>>Rented</option>
                        <option <?php if($status == "On site"){echo "selected";}?>>On site</option>
                        <option <?php if($status == "Work done"){echo "selected";}?>>Work done</option>
                        <option <?php if($status == "Cancle"){echo "selected";}?>>Cancle</option>
               </select>
            </td>
       </tr>

       <tr>
           <td>
               <td colspan="2">
               <input type="hidden" name="id" value="<?php echo $id;?>">
               <input type="hidden" name="price" value="<?php echo $price;?>">
               

                    <input type="submit" name="submit" value="Update" class="btn-secondary">
           </td></td>
        </tr>

    </table>


    </form>

    <?php
    
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];


        $sql2 = "UPDATE orderss SET
                status = '$status' WHERE id = $id";

        $res2 = mysqli_query($conn,$sql2);

        if($res2 == TRUE)
        {
            $_SESSION['updated']="order updated successfully";
            header('location:'.SITEURL.'admin/manage-order.php');
        }
        else
        {
            $_SESSION['updated']="failed to update order";
            header('location:'.SITEURL.'admin/manage-order.php');
        }

    }
    
    ?>
</div>

</div>



<?php include('partials/footer.php');?>