
<!DOCTYPE html>
<html>
    <head>
        <title>HiLCoE Portal</title>
        <link rel="stylesheet" href="../style/main.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" href="../images/website.ico">
        <style>
            input{
                background: transparent;
            }
        </style>
    </head>
    <body style="background-image: linear-gradient(rgba(229,191,59,0.3),rgba(11,58,148,0.3)),url(../images/reg.jpg);
background-size: cover;
background-position: center;" class="reg">
            <img src="../images/reg.jpg" alt="">
            <div class="content registerr">
               <h1 style="color: white;">REGISTER</h1>
               <form action="../PHP/reg.php" method="post" onsubmit="return signupvalidation()">
                   <label for="one">Student</label>
                <input id="one" required type="radio" name="type" value="1">
                <label for="two">Teacher</label>
                <input id="two" required type="radio" name="type" value="2">
                <label for="three">Administrate</label>
                <input id="three" required type="radio" name="type" value="3"><span id="type_error"></span><br>
                   <input type="text" required id="name" name="name" placeholder="Full Name"><span id="name_error"></span><br>
                   <input type="text" required name="id" placeholder="ID"><span id="id_error"></span><br>
                   <input class="<?=$emailError?>" required id="email" type="email" name="email" placeholder="Email Address"><span id="email_error"></span><br>
                   <input type="text" name="username" placeholder="Username" required><br>
                   <input type="password" id="password" minlength=8 maxlength=20 name="password" placeholder="Password"><span id="password_error"></span><br>
                   <label for="female">Female</label>
                   <input id="female" type="radio" name="gender" value="female" required>
                   <label for="male">Male</label>
                   <input id="male" type="radio" name="gender" value="male" required><span id="gender_error"></span><br>
                   
                    
                    <input class="submit" type="submit" name="submit" value="Register">
                
               </form>
            </div>
            
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/index.js"></script>
</html>