<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])) // checkingweather the session is set or not
            {
                echo $_SESSION['add']; //display session message if set
                unset($_SESSION['add']);//remove session message
            }
        ?>
        
        <form action="" method="POST">

            <table class=" tbl-30 ">

            <tr>
                <td >Name:  </td>
                <br>
                <td>
                    <input type="text" name="full_name" placeholder="Name">
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="usernmae" placeholder="Username">
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Password">
                </td>    
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>

            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php')?>

<?php 

//process vlaues form
//check weather the button is clicked or not


if(isset($_POST['submit']))
{
    //get data
     $fullname = $_POST['full_name'];
     $username = $_POST['usernmae'];
     $password = md5($_POST['password']);

    //sql query to save data

    $sql = "INSERT INTO admin SET
            full_name='$fullname',
            username ='$username',
            password ='$password'

    ";

    //execute query and save data in database
   
    $res = mysqli_query($conn , $sql) or die;

    //check if dtata is inserted or not or weather the quary is executed or not

    if($res == TRUE)
    {
        //create session var

        $_SESSION['add'] = "admin added successfully.";
        //redirect to page
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //create session var

        $_SESSION['add'] = "failed to add admin.";
        //redirect to page
        header("location:".SITEURL.'admin/add-admin.php');

    }













}



?>





























