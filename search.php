<?php include('config/constants.php');?>


<!--navbar-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You'r Search</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="navbar" style="background-color: #2f3542;">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="images/loginbg.png" alt="logo" class="img-responsive"></a>
			</div>

			<div class="menu text-right">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
			</div>
		</div>
</section>

<section class="products">
		<div class="container">
            

            <?php

            $search = $_POST['search'];

            ?>
                <h2 class="text-center">Result for you'r search "<?php echo $search;?>".</h2><br><br>
            <?php
                //queries for combos 
                $sql = "SELECT * FROM combo WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                // queries for services

                $sql2 = "SELECT * FROM services WHERE title LIKE '%$search%'";

                $res2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);


                    if($count>0)
                    {
                        while( $row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];

                            ?>
                                <div class="product-menu">
                                    <div class="product-menu-img">
                                        <?php

                                            if($image_name=="")
                                            {
                                            echo"Image not found for this combo";
                                            }
                                            else
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL;?>combos/<?php echo $image_name;?>" alt="combo" class="img-responsive img-curve">
                                                <?php
                                            }
                                        ?>
                                    
                                    </div>
                                    <div class="product-menu-desc">
                                        <h4><?php echo $title;?></h4>
                                        <p class="product-price">₹<?php echo $price;?>/Hour</p>
                                        <p class="product-detail">
                                        <?php echo $description;?> 
                                        </p>
                                        <br>
                                        <a href="http://localhost/project/order/order.php?id=<?php echo $id;?>" class=" add-cart btn btn-primary ">Rent Now.</a>
                                    </div>
                                </div>	
                            <?php
                        }
                    }
                    elseif($count2>0)
                    {

                        while($row2=mysqli_fetch_assoc($res2))
                        {
                            $id = $row2['id'];
                            $title = $row2['title'];
                            $image_name = $row2['image_name'];

                            ?>
                             <div class="product-menu">
                                    <div class="product-menu-img">
                                        <?php

                                            if($image_name=="")
                                            {
                                            echo"Image not found for this combo";
                                            }
                                            else
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL;?>services/<?php echo $image_name;?>" alt="combo" class="img-responsive img-curve">
                                                <?php
                                            }
                                        ?>
                                      </div>
                                    <div class="product-menu-desc">
                                        <h4><?php echo $title;?></h4>
                                        <p class="product-price">₹ 1200/Hour</p>
                                        <p class="product-detail">
                                            Service.
                                        </p>
                                        <br>
                                        <a href="http://localhost/project/order/order2.php?id=<?php echo $id;?>" class=" add-cart btn btn-primary ">Rent Now.</a>
                                    </div>
                                </div>	
                            <?php
                        }
                    }
                    else
                    {   ?>
                        <h3>We're sorry. We were not able to find a match for <?php echo $search;?>.</h3>
                        <?php
                    }?>

                    
		</div>
</section>
</body>
</html>