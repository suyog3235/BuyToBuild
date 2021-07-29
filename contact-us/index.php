<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>

  
</head>
<body>
    <img src="../images/loginbg.png" alt="logo" class="bgimg">
    
        <form action="" id="myform" name="myform">
            <div class="">

                <h2>ContactUs</h2>

                <br>
                <label for="">Name</label>
                <br>
                <input id="name" placeholder="Name" class="box">
                <br><br>
                <label for="">E-mail</label>
                <br>               
                <input id="email" placeholder="E-mail" class="box">
                <br><br>
                <label for="">Subject</label>
                <br>
                <input id="subject" placeholder="Subject" class="box">
                <br><br>
                <label for="">Message</label>
                <br>
                <textarea id="body" placeholder="Message"  class="box2"></textarea>
                <br><br>
                <input type="button" onclick="sendEmail()" value="Send" class="btn">
            </div>
        </form>
        
    

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax
                ({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: 
                   {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) 
                   {
                        if(response.status == "success")
                        {
                            alert('Email Has Been Sent!');
                            $('#myform')[0].reset();
                            
                        }
                        else 
                        {
                            alert('Please Try Again!');
                            console.log(response);
                        }
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
</body>
</html>

<style>

/* CSS FOR ALL */   
body
{
    background-color: #0b172a;
    font-family: Arial, Helvetica, sans-serif;
    margin: 6% 34%;
    overflow: hidden;
}    

/*css for logo*/
.bgimg
{
    width: 60%;
    margin-top: 0px;
    margin-left: 10%;
    padding: 6px 20px;
}

/*css for heading*/
div h2
{
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    color: white;
}

/*css for input boxes */
div label
{
    font-weight: 1px;
    margin: 0 6%;
    color: white;
    
    
}

div .box
{
    margin: 0 4.4%;
    size: 50rem;
    border: none;
    border-radius: 10px;
    width: 20rem;
    height: 2rem;
    padding: 2px 32px;
    
}

div .box2
{
    margin: 0 4.4%;
    size: 60rem;
    border: none;
    border-radius: 10px;
    width: 20rem;
    height: 6rem;
    padding: 5px 32px;   
}
/*css for button */
.btn
{
  background-color: #bc4123; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 0 37%;
  border-radius: 10px;
}

.btn:hover
{
    background-color: #e76f51;
}

/*css for div box*/
div
{
    border: 5px solid #bc4123;
    width: 26rem;
    height: 31.5rem;
}

</style>