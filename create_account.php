<!DOCTYPE html>
<html>
  <head>


    <title>Create Account</title>
    <style>
      
      body {
            background-image: url(cinema1.jpg);
            background-size: cover;
            font-family: Arial, sans-serif;
        }
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }
      h1 {
        color: #333;
        text-align: center;
        margin-top: 50px;
      }
      form {
        width: 500px;
        margin: 0 auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }
      label {
        display: inline-block;
        width: 100px;
        margin-bottom: 10px;
        color: #333;
      }
      input[type="text"], input[type="password"] {
        padding: 10px;
        border: none;
        border-radius: 5px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        width: 70%;
        font-size: 16px;
        margin-bottom: 20px;
      }
      input[type="submit"] {
        background-color: #008CBA;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #00688B;
      }
    </style>
  </head>
  <body>
    <h1>Create Account</h1>
    <form method="POST" action="add_user.php">
    <form>
    
    <label> <b>Last name:</b></label>
    <input type="text" id="last_name" name="last_name" required><br>
  
    <label> <b>First name :</b></label>
    <input type="text" id="first_name" name="first_name" required><br>
  
    <label> <b>Username:</b></label>
    <input type="text" id="username" name="username" required><br>
  
    <label> <b>Password:</b></label>
    <input type="password" id="password" name="password" required>


   <input type="submit" id='submit' value='create' ><br>
   <?php
        session_start();
       
        if ( isset($_SESSION['exist'])){
            echo ($_SESSION['exist']);
            unset($_SESSION['exist']);
        }

    ?>
   </form>

  </body>
</html>










