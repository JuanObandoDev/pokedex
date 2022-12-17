<?php
    session_start();
    require "./database/DB.php";

    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $records = $conn->prepare("SELECT id, email FROM usuarios WHERE email=:email AND password=:password");
        $records->bindParam(":email", $_POST["email"]);
        $password = md5($_POST["password"]);
        $records->bindParam(":password", $password);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if(!empty($results) && count($results) > 0){
            $_SESSION["usuarios_id"] = $results["id"];
            header("Location: Pokedex.php");
        }else{
            $message = "Sorry, the user or password are incorrect";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/RALStyles.css">
    <title>LogIn</title>
</head>
<body>
    
    <div class="container">
        <div class="container__regandlog">
            <div class="container__register">
                <h3 class="register">Login</h3>
                <form class="container__form-register" action="LogIn.php" method="POST">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button>Send</button>
                    <p>or <a href="SignUp.php">SignUp</a></p>
                    <?php if(!empty($message)) : ?>
                        <p><?= $message?></p>
                    <?php endif;?>
                </form>
            </div>
        </div>
    </div>

</body>
</html>