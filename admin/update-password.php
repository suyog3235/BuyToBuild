<?php include('partials/menu.php') ?>

<div class="main-content">
    
    <div class="wrapper">
        <h1>Update Password</h1>
        <br><br>

        <?PHP
             if(isset($_GET['id']))
             {
                 $id = $_GET['id'];
             }
        ?>

    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Current Password: </td>
                <td><input type="password" name="currentpassword" placeholder="current Password"></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" name="newpassword" placeholder="New Password"></td>
            </tr>
            <tr>
                <td>Conform Password:</td>
                <td><input type="password" name="confirmpassword" placeholder="Confirm Password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id ;?>">
                    <input type="submit" name="submit" value="Update Password" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>

<?php
//check if button is clicked

if(isset($_POST['submit']))
{
    $id =$_POST['id'];
    $current_password=md5($_POST['currentpassword']);
    $new_password=md5($_POST['newpassword']);
    $confirm_password=md5($_POST['confirmpassword']);

    $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

    //execut

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            if($new_password==$confirm_password)
            {
                $sql2 = "UPDATE admin SET password='$new_password'
                WHERE id=$id";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==TRUE)
                {
                    $_SESSION['change-pwd'] = "password changed successfully";
                    header('location:'.SITEURL.'admin/manage-admin.php'); 
                }
                else
                {
                    $_SESSION['change-pwd'] = "failed to change password";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                $_SESSION['pwd-not-match'] = "password did not match";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else
        {
            $_SESSION['user-not-found'] = "enter correct password to change your password";
            header('location:'.SITEURL.'admin/manage-admin.php');


        }
    }


   
}
?>

<?php include('partials/footer.php') ?>





































