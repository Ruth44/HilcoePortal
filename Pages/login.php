

<!DOCTYPE html>
<html>
    <head>
        <title>HiLCoE Portal</title>
        <link rel="stylesheet" href="../style/main.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body class="reg">
            <img src="../images/reg.jpg" alt="">
    
            <div class="content">
                <h1 style="padding-top: 6rem;">Log In</h1>
                <form action="../PHP/logindb.php" method="post">
                    <input type="text" name="username" placeholder="Username"><br>
                    <input type="password" name="password" placeholder="Password"><br>
                    <input type="submit" class="submit" name="login" value="Log In">
                </form>
            </div>