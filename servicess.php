<?php include('config/constants.php');?>
<?php include('partials-front/menu2.php');?>



<!--services section-->
<section class="services">
			<div class="container">
				<nav>
					<h2 class="text-center">Services</h2><br><br><br><br>
				</nav>
				<?php
					//display services from database

					$sql = "SELECT * FROM services WHERE active='Yes' AND featured='No'"  ;

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
				
				
				
				<div class="clearfix"></div>
			</div>
	
			
	</section>
    </html>
    </body>

<style>
body
{
	background-color: #ced6e0;
}

.navbar
{
		background-color:#2f3542;
}

.services

{
    background-color: #ececec;  
}


</style>