<!DOCTYPE html>
<html>
    <head>
        <title>HiLCoE Portal</title>
        <link rel="stylesheet" href="../style/main.css">
        <link rel="stylesheet" href="../style/account.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="icon" href="../images/website.ico">
    </head>
    <body>
     
       <div class="sidebar">
           <h1 style="display:none;" class="TYPE"><?php echo $type?></h1>
           <div class="logout">
       <form action="../PHP/logout.php" method="post">
           <input class="x logout" type="submit" name="logout" value="Logout">
       </form>
           </div>
         <ul>
         <li id="report"><a href="admindash.php">REPORTS</a></li>
         <li id="upload"><a href="#">UPLOAD NEWS</a></li>
         <li id="delete"><a href="admindelete.php">DELETE USERS</a></li>
             
         </ul>
</div>
         <div style="overflow:hidden;width:64rem;" class="cont dash">
       <h1 style="color: white; text-align: center;padding-top: 3rem;">Upload news</h1>
    <form action="../PHP/uploadnews.php" method="post">
     <textarea placeholder="Type here..." style="background:transparent;border:#ffffff 0.2rem solid;" name="news" id="news" cols="50" rows="10"></textarea><br>
     <input style="border:#ffffff 0.2rem solid;" type="submit" name="upload" value="Upload">
</form>
       </div> 
</body>
</html>