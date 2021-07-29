<?php include('config/constants.php');?>
<?php include('partials-front/menu2.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combos</title>

	<!---css-->
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
   
	
	
	<!-- combo offers section-->
		<!-- combo offers section-->
		<section class="products">
			<div class="container">
				<nav>
					<h2 class="text-center">Combos</h2><br><br><br><br><br>
				</nav>
				<?php 
				
				$sql2 = "SELECT * FROM combo WHERE active='Yes' AND featured='No'";
	
				$res2 =mysqli_query($conn,$sql2);
	
				$count2 = mysqli_num_rows($res2);
				
				if($count2>0)
				{
					while($row=mysqli_fetch_assoc($res2))
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
								echo"Image Not Available";
							 }
							 else
							 {
								?>
									<img src="http://localhost/project/combos/<?php echo $image_name;?>" alt="combo" class="img-responsive img-curve"  height="100px">
								<?php
							 }
							
							?>
							
						</div>
						<div class="product-menu-desc">
						<h4><?php echo $title;?></h4>
						<p class="product-price">₹<?php echo $price;?>/Hour </p>
						<p class="product-detail">
							<?php echo $description;?>
						</p>
						<br>
						<a href="http://localhost/PROJECT/order/order.php?id=<?php echo $id;?>" class="h"
						style=" padding: 1%; border: none;font-size: 17px;border-radius: 5px;  
						color: white;background-color: #ff6b81; cursor: pointer;">Rent Now.</a>
						</div>			
					</div>		
					
						<?php
					}
				}
				else
				{
					?>

							<h2 style="text-align: center;">No Combos Are Available Currently.</h2>

					<?php
				}
				
				?>	</div>
	</section>
</body>
</html>

<style>
	
body
{
	background-color: #ced6e0;
}

.navbar
{
		background-color:#2f3542;
}


</style>