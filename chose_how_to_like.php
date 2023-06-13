<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ASMR Login</title>
    <style>
        body {
            background-image: url(cinema1.jpg);
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 350px;
            height : 320px;
            margin: 50px auto;
            background-color: #FFFFFF;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.2);
            padding: 20px;
            border-radius: 10px;
            border-top: 5px solid #9B59B6;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }
        h1 {
            color: #9B59B6;
            font-size: 36px;
            margin-bottom: 30px;
            text-shadow: 2px 2px 2px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
        }
        h1 img {
            width: 60px;
            height: 60px;
            margin-right: 20px;
            border-radius: 50%;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.2);
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background-color: #F6F6F6;
            color: #777;
            font-size: 14px;
        }
        input[type=submit] {
            background-color: #9B59B6;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }
        input[type=submit]:hover {
            background-color: #8E44AD;
        }
        .logo {
            width: 100px;
            height: 100px;
            background-image: url('asmr-logo.png');
            background-size: cover;
            border-radius: 50%;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.2);
            margin-bottom: 20px;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1;
            filter: blur(5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><img src="asmr-logo.png" alt="ASMR Logo">Comment voulez-vous obtenir votre recommandation</h1>
        <form action="first_visit.php">
            <input type="submit" value="SERIES">
        </form>
        <form action="first_visit2.php">
            <input type="submit" value="GENRES">
        </form>
    </div>
</body>
</html>
