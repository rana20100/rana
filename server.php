
<?php
    	session_start();
	// variable declaration
    $name="";
	$username = "";
    $password="";
	$email    = "";
    $errors = array(); 
	$_SESSION['success'] = "";

    $db=mysqli_connect('localhost', 'root', '', 'rana');
    if (isset($_POST['reg_user'])) {
        
// receive all input values from the form
try {
        
        $name = mysqli_real_escape_string($db, $_POST['name']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        

        if(empty($name)){ array_push($errors, "Fullname is requiered");}
         if(empty($username)){ array_push($errors, "Username is required");}
          if(empty($email)){ array_push($errors, "Email is required");}
           if(empty($password_1)){ array_push($errors, "Passwoed is required");}

           
		if ($password_1 != $password_2) {
			 array_push($errors, "Password not match");
		}

         if (count($errors) == 0){
            $secretKey = '6LeMmwwpAAAAAAty7S8TuZ8GhxUFtTzAIC1gByi-'; // Replace with your reCAPTCHA secret key
        $ip = $_SERVER['REMOTE_ADDR'];
        $token = $_POST["g-recaptcha-response"];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$token&remoteip=$ip";
        $response = file_get_contents($url);
        $result = json_decode($response);
        if ($result->success) {
        if(isset($_POST['check_data'])){

        $password=md5($password_1);
        $query="insert into user(name,username,email,password)Values('$name','$username','$email','$password')";
        mysqli_query($db,$query);
        
        $_SESSION['username'] = $username;}}}
        else {
            array_push($errors, "reCAPTCHA verification failed");
        }
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        

        
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            $user = mysqli_fetch_object($results);
            if (mysqli_num_rows($results) == 1) {
                
                if ($user->role=='admin') {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Login is successful";
                    header('location: lest.php');

                }
             else {
                header('Location: index.php');
            }
            } else {
                array_push($errors, "Error in username or password");
            }
        
    }
}
?>