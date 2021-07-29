<?php include('config/constants.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--css files-->
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
        	
    <?php

if(isset($_GET['id']))
{
    $combo = $_GET['id'];

    $sql = "SELECT * FROM orderss WHERE contact=$combo";
                
    //excute         
       $res = mysqli_query($conn,$sql);

                //check query
                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);
                   

                    if($count==1)
                    {
                         $row = mysqli_fetch_assoc($res);

                        $d = $row['combo'];
                        $u = $row['price']; 
                        $q = $row['quantity']; 
                        $t = $row['total']; 

                        $cname = $row['name'];
                        $cemail = $row['email'];
                        $cmobile = $row['contact'];
                        $cadd = $row['address'];
                    }
                    else
                    {
                        echo"error";
                        //redirect to manage admin page
                        //eader('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
}



?>
	<!--navbar section-->
	<section class="navbar">
		<div class="container">
			<div class="menu text-right">
				<ul>
					<li><a href="../index.php">Home</a></li>
					<!--<li><a href=""></a></li>-->
				</ul>
			</div>
		</div>
	</section><br><br><br>

    <fieldset class="main-section">

        <legend>
            <img src="images/loginbg.png" class="logo" alt="logo">
        </legend>
        <nav class="navv">
            <h2>Invoice</h2>
         </nav>

    <section>
    
       

    </section><br>

    <section>
    
    <div class="main">
    
        <label class="l">Description: <?php echo $d;?></label><br><br>
        <label class="l">Unit Rent: <?php echo $u;?></label><br><br>
        <label class="l">Quantity: <?php echo $q;?></label><br><br>
        <label class="l">Total:<?php echo $t;?></label><br>
    </div>

    <div class="payment">
    
    <label class="l">Payment Method: COD</label>
    
    </div>
    <div class="customer-details">

    <label class="l">Customer Name:  <?php echo $cname;?></label><br><br>
    <label class="l">Customer Email:<?php echo $cemail;?></label><br><br>
    <label class="l">Customer Mobile:<?php echo $cmobile;?></label><br><br>
    <label class="l">Customer Address:<?php echo $cadd;?></label><br><br>

    </div>
    
    
    
    </section>
    </fieldset>
    <section>

        <div class="print">

            <button onclick="window.print();" id="printbutton">Print Invoice</button><br>
               
        </div>
    </section><br><br><br>
    <p>Note-For any enquiry please contact us on</p>
    <p> "contactusforhelp37@gmail.com"</p>
    <p>BuyToBuild Compound</p>
    <p>Pune-411033</p>
<style>

li
{
    color: #f1f2f6;
}

.navbar
{
    background-color: #2f3542;
}

.main-section
{
    border: 1px solid black;
    width: 30%;
    margin-left: 32%;
    border-radius: 15px;
}

.e
{
    margin-left: 44%;
}

.navv
{
    text-align: center;
}
.main,.payment,.customer-details
{

    
    width: 72%;
    margin: 0 0 0 2%;
    padding: 1%;
    margin-top: 1%;
}

.print
{
    margin: 0 0 0 43%;
    padding: 1%;
}

button
{
    border: none;
    background-color: #51ff0d;
    border-radius: 10px;
    padding: 1%;
}

button:hover
{
    background-color: #7bed9f;
}

h3
{
    margin-left: 33%;
}

.l
{
    font-family: 'Times New Roman', Times, serif;
    font-weight: normal;
}

.logo
{
    width: 200px;
    background-color: #2f3542;
    border: none;
    border-radius: 10px;
}

p
{
    margin-left: 35%;
}
</style>



