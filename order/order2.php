<?php

 require  "../config/constants.php";

?>

<?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "SELECT * FROM services WHERE id=$id";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //get data from data base

            $row = mysqli_fetch_assoc($res);

            $title = $row['title'];
            $image_name = $row['image_name'];
        }
        else
        {
            header('loaction:'.SITEURL);
        }



    }
    else
    {
        header('location:'.SITEURL);
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action="" method="POST">

        <div class="container">
        
        <section class="navbar" style="background-color: #2f3542;">
            
            <div class="logo">
                <a href="../index.php" title="Logo">
                    <img src="../images/loginbg.png" alt="Logo" class="img-responsive" width="10px">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="../contact-us/index.php">Contactus</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <section>
        

            <div class="float-container">

                    <div class="float-child">
                        
                        <fieldset class="fs1">
                        
                            <legend>service</legend>


                            <?php
                         
                            if($image_name == "")
                            {
                                echo"Image is not available for this combo.";
                            }
                            else
                            {
                                ?>
                                    <img src="http://localhost/project/services/<?php echo $image_name;?>" class="img">
                                <?php
                            }

                        ?>
                            <label class="label">combo: <?php echo $title;?></label><br><br>
                            <input type="hidden" name="combo" value="<?php echo $title;?>"> <!--hidden-->
                           
                            <label class="label">price: ₹500/Hour</label><br><br>
                            <input type="hidden" name="price" value="1200"><!--hidden-->
                            
                            <label class="label">Quantity:</label>
                            <input type="number" name="quantity" value="1" class="input1 input"> <br><br>
                        
                        </fieldset>
                    
                    </div>
                    

                    <div class="float-child child1">
                        
                        <fieldset class="fs2">

                            <legend>Contact Details</legend><br><br>
                        
                            <label class="label">Name</label><br>
                            <input type="text" name="name" placeholder="eg.suyog kulkarni" class="input" required><br><br>

                            <label class="label">Mobile No.</label><br>
                            <input type="num" name="mobileno" placeholder="eg.9423XXXXXX" class="input" required><br><br>

                            <label class="label">Email</label><br>
                            <input type="email" name="email" placeholder="eg.suyog@gamail.com" class="input" required><br><br>

                            <label class="label">Address</label><br>
                            <textarea name="address" id="" cols="25" rows="5" placeholder="eg.City/Locality/House number" class="input" required></textarea> <br><br>

                            <input type="submit" name="submit" class="submit" value="Submit">
                        </fieldset>

                    </div>
            
        
            </div>

        

    </section>
    </form>
</body>
</html>

<style>

body
{
    background-color: #ffffff ;
    font-family: sans-serif;
    font-weight: bold;
}

.navbar
{
    padding: 0.8%;
    border-radius: 5px;
}

.float-container {
    margin: 0 0 0 10%;
    padding: 20px;
}

.float-child {
    width: 30%;
    float: left;
    padding: 22px;
}  

.child1
{
    width: 50%;
    margin: 0 0 0 0%;
    padding: 1%;
}

.img
{
    width: 350px;
    border: none;
    border-radius: 15px;
    padding: 2%;
}

.h4
{
    padding: 2%;
}


.input
{   
    width: 75%;
    padding: 1%;
    border: 1px solid gray;
    border-radius: 10px;
    margin:  0 0  0 5%;
}

.input1
{
    width: 35%;
}
.label
{
    padding: 1%;
    margin: 0% 0% 10% 4.5%;
}

.submit
{
    margin: 0 0 4% 35%;
    padding: 1%;
    border: none;
    border-radius: 10px;
    width: 150px;
    color: white;
    background-color: #2f3542;
}

.submit:hover
{
    background-color: #57606f;
}

.fs2
{
    border-radius: 15px;
    
}

.fs1
{
    border-radius: 15px;
    
}
</style>


<?php

if(isset($_POST['submit']))
{
    $combo = $_POST['combo'];
    $price = $_POST['price'];

    $quantity = $_POST['quantity'];
    $total = (int)$quantity * (int)$price ;
    $date = date("y-m-d");
    $status = "Rented";

    $name = $_POST['name'];
    $no = $_POST['mobileno'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sqll = "INSERT INTO orderss SET
                combo = '$combo',
                price = '$price',
                quantity = '$quantity',
                total = '$total',
                date = '$date',
                status = '$status',
                name = '$name',
                contact = '$no',
                email = '$email',
                address = '$address'";

           

    $ress = mysqli_query($conn, $sqll) or trigger_error("error".mysqli_error($conn), E_USER_ERROR);




    
    if($ress == TRUE)
    {
        ?>
            <script type="text/javascript">

                alert("success");
                window.location.replace('<?php echo SITEURL;?>/invoice.php?id=<?php echo $no;?>');

            </script>
        <?php
    }
    else
    {
        echo"failed".mysqli_connect_error();
    }
}



?>














