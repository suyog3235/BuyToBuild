<?php include('partials-front/menu.php'); ?>	
<?php include('config/constants.php');?>



<!--search section-->
	<section class="materials-search text-center">
		<div class="container">
			<form action="<?php http://localhost/project/ ;?>search.php" method="POST">
				<input type="search" name="search" placeholder="serach">
				<input type="submit" name="submit" value="search" class="h" style="padding: 1%; border: 
				none;font-size: 17px;border-radius: 5px;  color: white;background-color: #ff6b81; cursor: pointer;">
			</form>
		</div>
	</section>
	
	<?php
	
	if(isset($_SESSION['order']))
	{
		echo $_SESSION['order'];
		unset($_SESSION['order']);
	}
	
	
	?>
	<!--services section-->
	<section class="services">
			<div class="container">
				<nav>
					<h2 class="text-center">Services</h2>
				</nav>
				<?php
					//display services from database

					$sql = "SELECT * FROM services WHERE active='Yes' AND featured='Yes'"  ;

					$res = mysqli_query($conn,$sql);

					$count = mysqli_num_rows($res);

					if($count>0)
					{
						while($row=mysqli_fetch_assoc($res))
						{
							$id = $row['id'];
							$title = $row['title'];
							$image_name = $row['image_name'];

							?>

							
									<div class="box-3 float-container">
										<?php
											if($image_name=="")
											{
												echo"Image is not available";
											}
											else
											{
												?>
													<a href="http://localhost/project/order/order2.php?id=<?php echo $id;?>"><img src="http://localhost/project/services/<?php echo $image_name;?>" alt="service" class="img-responsive img-curve" height="200px"></a>
												<?php
											}
										?>
										
			
										<h3 class="text"><?php echo $title;?></h3>
									</div>
								</a>
						
							<?php
						}
					}
					else
					{
						echo"No Services Available Currently.";
					}
				?>
				
				<button onclick="location.href='servicess.php'" type="submit" class="explore e">Explore More!!</button>
				
				<div class="clearfix"></div>
			</div>
	
			
	</section> 
	
	<!-- combo offers section-->
	<section class="products">
		<div class="container">
			<h2 class="text-center">Combo Offer's</h2>

			<?php 
			
			$sql2 = "SELECT * FROM combo WHERE active='Yes' AND featured='Yes'";

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
				echo"No Combos Are Availabe";
			}
			
			?>
			<button onclick="location.href='comboo.php'" type="submit" class="explore">Explore More!!</button>
				<div class="clearfix"></div>
				</div>

			
	</section>
    
	<!--social media section-->
	<section class="social ">
		<div class="container text-center">
			<ul>
				<li>
					<a href="https://www.instagram.com/suyoggggg/"><img src="https://img.icons8.com/cute-clipart/50/000000/instagram-new.png"/></a>
				</li>
				<li>
					<a href="mailto:kulkarnisuyog3@gmail.com"><img src="https://img.icons8.com/color/48/000000/gmail-login.png"/></a>
				</li>
				<li>
					<a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
				</li>
			</ul>		
		</div>
	</section>

	


<?php include('partials-front/footer.php');?>		
<style>
/*css for explore*/
.explore
{   
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
    margin: 0 0 0 22%;
    width: 50%;
	color: white;
	background-color: #475B63;
}

.explore:hover
{
	background-color: #9AD2CB;
}


</style>