<?php include('server.php')


?>
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">
      <script src="https://www.google.com/recaptcha/api.js"></script>

      <title>Login form - Bedimcode</title>
   </head>
   <body>
      <div class="login">
         <img src="bg.jpg" alt="image" class="login__bg">

         <form method="post" action="login.php" class="login__form">
            
            <h1 class="login__title">login</h1>

            <div class="login__inputs">
                  <div class="login__box">
                     <input type="text" placeholder="username " required class="login__input"  name="username"  value="<?php echo $username?>">
                     
                  </div>
                  </div>
                  <div class="login__inputs">
                     
                     <div class="login__box">
                        <input type="password" placeholder="Password ID" required class="login__input" name="password"  value="<?php echo $password?>">
                        <i class="ri-lock-2-fill"></i>
                     </div>
                     </div>
      

            

            <div class="login__check">
               <div class="login__check-box">
                  <input type="checkbox" class="login__check-input" id="user-check" >
                  <label for="user-check" class="login__check-label">Remember me</label>
               </div>

               <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" class="login__button" name="login">login</button>

            <div class="login__register">
               Don't have an account? <a href="Register.php">Register</a>
            </div>
         </form>
      </div>
   </body>
</html>