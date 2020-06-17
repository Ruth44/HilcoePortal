

<!DOCTYPE html>
<html>
    <head>
        <title>HiLCoE Portal</title>
        <link rel="stylesheet" href="../style/main.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" href="../images/website.ico">
       
    </head>
    <body style="background-image: linear-gradient(rgba(229,191,59,0.3),rgba(11,58,148,0.3)),url(../images/reg.jpg);
background-size: cover;
background-position: center;" class="reg">
            <img src="../images/reg.jpg" alt="">
    
            <div class="content">
                <h1 style="padding-top: 6rem;color:white;">Log In</h1>
                <form action="../PHP/logindb.php" method="post" name="login-form">
                    <input type="text" name="username" maxlength=20 placeholder="Username" id="un" required><br>
                    <input type="password" minlength=8 maxlength=20 name="password" placeholder="Password" id="pw" required><br>
                    <input type="submit"  class="submit" id="submit" name="login" value="Log In">
                </form>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/index.js"></script>
   
        </script>
</body>
</html>