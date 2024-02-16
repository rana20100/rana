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

         <form method="post" action="Register.php" class="login__form">
            <?php include('errors.php'); ?>
            <h1 class="login__title">Register</h1>

            <div class="login__inputs">
               <div class="login__box">
                  <input type="text" placeholder="NAME " required class="login__input"  name="name"  value="<?php echo $name?>">
                  
               </div>
               <div class="login__inputs">
                  <div class="login__box">
                     <input type="text" placeholder="username " required class="login__input"  name="username"  value="<?php echo $username?>">
                     
                  </div>
                  <div class="login__box">
                     <input type="text" placeholder="Email ID" required class="login__input"  name="email"  value="<?php echo $email?>">
                     
                  </div>
                  <div class="login__inputs">
                     
                     <div class="login__box">
                        <input type="password" placeholder="Password ID" required class="login__input" name="password_1"  value="<?php echo $password?>">
                        <i class="ri-lock-2-fill"></i>
                     </div>

               <div class="login__box">
                  <input type="password" placeholder="Password" required class="login__input"  name="password_2">
                  <i class="ri-lock-2-fill"></i>
               </div>

            </div>

            <div class="login__check">
               <div class="login__check-box">
                  <input type="checkbox" class="login__check-input" id="user-check" value="1" name="check_data">
                  <label for="user-check" class="login__check-label">Remember me</label>
               </div>
               

               <a href="#" class="login__forgot">Forgot Password?</a>
            </div>
           
            <div class="g-recaptcha" data-sitekey="6LeMmwwpAAAAAF6Fxvwy6RkH4wMRsZOF14tSPlV_"></div>
                     <?php include('errors.php'); ?>

            <button type="submit" class="login__button" name="reg_user">Register</button>

            <div class="login__register">
              have an account? <a href="login.php">login</a>
            </div>
         </form>
      </div>
   </body>
</html>