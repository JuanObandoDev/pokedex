<?php
    require "./database/DB.php";
    if(!empty($_POST["name"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
        $sql = "INSERT INTO usuarios (name, lastname, email, password) VALUE (:name, :lastname, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name",$_POST["name"]);
        $stmt->bindParam(":lastname",$_POST["lastname"]);
        $stmt->bindParam(":email",$_POST["email"]);
        $password = md5($_POST["password"]);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/RALStyles.css">
    <title>SignUp</title>
</head>
<body>
    
    <div class="container">
        <div class="container__regandlog">
            <div class="container__register">
                <h3 class="register">SignUp</h3>
                <form class="container__form-register" action="SignUp.php" method="POST">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="lastname" placeholder="Lastname" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button>Send</button>
                    <p>or <a href="LogIn.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="./assets/js/RALMain.js"></script>
</body>
</html>