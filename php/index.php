<?php
$insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "root";

    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to" . mysqli_connect_error());        
    }
    // echo "Successfully connected";
    // using sqli queries

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`form` (`name`, `age`, `gender`, `email`, `phone`, `other`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc' ;";
    // echo $sql;

    // -> this is a object operator
    if($con->query($sql) == true)
    {
        // echo "successfully inserted";
        $insert = true;
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>

<link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
  <h1>Welcome To Travel Form</h1><br>
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias similique qui rerum quia vitae sapiente veritatis dolorem labore voluptate nobis officiis dolorum mollitia,
       illum asperiores unde quis odit officia! Tempore?</p>
       <?php
        if($insert == true){
            echo "<p class='msg'>Thanks for submitting this form !</p>";
        }
        
        ?>
<br>
<br>
<form action="index.php" method="post">
   <input type="text" name="name" id="name" placeholder="enter your name">

   <input type="text" name="age" id="age" placeholder="enter your age">

   <input type="text" name="gender" id="gender" placeholder="enter your gender">

   <input type="email" name="email" id="email" placeholder="enter your email">

   <input type="phone" name="phone" id="phone" placeholder="enter your number">

   <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter other information" ></textarea>

   <button class="btn">Submit</button>
  


   


    
</form>
      


    </div>
    <script src="index.js"></script>

</body>
</html>