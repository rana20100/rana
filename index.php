<?php
require 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@codewith_muhilan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 5px;
        }

        .card {
            position: relative;
            background-color: transparent;
            width: 300px;
            height: 300px;
            perspective: 1000px;
            transform: perspective(750px) translate3d(0px, 0px, -250px) rotateX(27deg) scale(0.9, 0.9);
            border-radius: 20px;
            border: 5px solid #e6e6e6;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.3); /* Adjusted box shadow */
            transition: 0.4s ease-in-out transform, 0.4s ease-in-out box-shadow; /* Added box-shadow transition */
        }

        .card:hover {
            transform: translate3d(0px, 0px, -250px);
            box-shadow: 0 50px 80px -20px rgba(32, 195, 187, 0.5); /* Increased box shadow on hover */
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .card:hover .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 16px;
        }

        .card-front {
            background: linear-gradient(to right, #1abc9c, #3498db);
        }

        .card-front img {
            width: 200px;
            margin-top: 18px;
        }

        .card-back {
            background: linear-gradient(to right, #1abc9c, #3498db);
            color: #ffffff;
            box-shadow: 0 5px 20px #3498db;
            transform: rotateY(180deg);
        }





        .card-front-1,
        .card-back-1 {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 16px;
        }

        .card-front-1 {
            background: linear-gradient(to right, #ffbe0b, #ff0066);
        }

        .card-front-1 img {
            width: 200px;
            margin-top: 18px;
        }

        .card-back-1 {
            background: linear-gradient(to right, #ffbe0b, #ff0066);
            color: #ffffff;
            box-shadow: 0 5px 20px #d26d33;
            transform: rotateY(180deg);
        }


        

        .card-back img {
            width: 140px;
            margin-top: 1rem;
            transform: perspective(3000px) rotateY(5deg);
        }

        .card-back h3 {
            margin-bottom: 0.3rem;
        }

        .card-back h1 {
            margin: 0;
        }


        .card-back-1 img {
            width: 140px;
            margin-top: 1rem;
            transform: perspective(3000px) rotateY(5deg);
        }

        .card-back-1 h3 {
            margin-bottom: 0.3rem;
        }

        .card-back-1 h1 {
            margin: 0;
        }

        
/* -- YouTube Link Styles -- */

#source-link {
  top: 60px;
}

#source-link > i {
  color: rgb(94, 106, 210);
}

#yt-link {  
  top: 10px;
  align-items: center;
}

#yt-link > i {
  color: rgb(219, 31, 106); 

}

.meta-link {
  align-items: center;
  backdrop-filter: blur(3px);
  background-color: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 6px;
  box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
  cursor: pointer;  
  display: inline-flex;
  gap: 5px;
  left: fixed;
  padding: 10px 20px;
  position: fixed;
  text-decoration: none;
  transition: background-color 600ms, border-color 600ms;
  z-index: 10000;
}

.meta-link:hover {
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.meta-link > i, .meta-link > span {
  height: 20px;
  line-height: 20px;
}

.meta-link > span {
  color: white;
  font-family: "Rubik", sans-serif;
  transition: color 600ms;
}

    </style>
</head>
<body>
<?php
      $i = 1;
      $rows = mysqli_query($db, "SELECT * FROM tb_upload ORDER BY id DESC")
      ?>

      <?php foreach ($rows as $row) : ?>
    <div class="card-container">
        <div class="card">
            <div class="card-inner">
                <div class="card-front">
                    <img src="img/<?php echo $row["image"]; ?>" alt="">
                </div>
                <div class="card-back">
                    <img src="img/<?php echo $row["image"]; ?>" alt="">
                    <h3><?php echo $row["name"]; ?></h3>
                    <h1><?php echo $i++; ?></h1>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Clone of the card -->
        
        <a id="yt-link" class="meta-link" href="login.php">
      <i class="fas fa-link"></i>
      <span>login</span>
      <a id="source-link" class="meta-link" href="Register.php">
      <i class="fas fa-link"></i>
      <span>Register</span>
      

  
</body>
</html>
