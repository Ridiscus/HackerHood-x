<?php
session_start();
require 'database.php';

$firstname  = $password = "";
$firstnameError  = $passwordError = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = verifyInput($_POST["firstname"]);
    $password = verifyInput($_POST["password"]);
    $isSuccess = true;

    if (empty($firstname)) {
        $firstnameError = "Entrez votre prenom svp !";
        $isSuccess = false;
    }
    

    if (!isPassword($password)) {
        $passwordError = "Le mot de passe doit contenir exactement 5 chiffres.";
        $isSuccess = false;
    } elseif (empty($password)) {
        $passwordError = "Entrez votre mot de passe svp... !";
        $isSuccess = false;
    }

         if ($isSuccess) {
            $db = Database::connect();
    
            $insertUser = $db->prepare('INSERT INTO user (firstname, password) VALUES (?, ?)');
            if ($insertUser->execute(array($firstname, $password))) {
                // Inscription réussie
                header("Location: beta.php");
            } else {
                // Gérer l'erreur d'insertion de l'utilisateur ici
                echo "connexion echoue";
            }
    
            Database::disconnect();
         }
    }


function verifyInput($var)
{
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}


function isPassword($var)
{
    return preg_match("/^\d{5}$/", $var);
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>

        * {
            margin: 0;
            padding: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
            box-sizing: border-box;
        }

        body {
            background: #ffb302;
            margin: 70px 0px;
        }


        #login-form {
            background: #fff;
            margin: 0 auto;
            padding: 40px;
            width: 25rem;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .comments {
            font-style: italic;
            font-size: 13px;
            color: #d82c2e;
            
        }

        .blue {
            color: #0069d6;
        }

        .form-control {
            height: 50px;
            font-size: 14px;
        }

        #login-form input[type=submit] {
            margin: 20px auto 0px;
            display: block;
        }

        .button1 {
            border: 1px solid #ddd;
            background: #ffa500;
            color: #000;
            width: 100%;
            font-weight: bold;
            text-transform: uppercase;
            padding: 18px;
            border-radius: 5px;
            transition: all 0.3s ease-in 0s;
        }

        .button1:hover {
            background: #fff;
            border-color: #050503;
        }

        .thank-you {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
            font-size: 14px;
        }

        .logo img {
            width: 4rem;
            margin-left: 41%;
        }


        

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="login-form" method="post" role="form">
                <div class="logo"><img src="https://www.mtn.com/wp-content/themes/mtn-refresh/public/img/mtn-logo.svg" alt=""></div>
                <div class="col-md-12">
                    <label for="firstname">Prenom</label>
                    <input type="text" id="firstname" name="firstname" autocomplete="off" class="form-control" placeholder="Votre prenom" value="<?php echo $firstname; ?>">
                    <p class="comments"><?php echo $firstnameError ?></p>
                </div>
                <!--<div class="col-md-12">
                    <label for="phone">Telephone<span class="blue"> * </span></label>
                    <input type="tel" name="phone" autocomplete="off" id="phone"  class="form-control" placeholder="Votre Numero MoMo" value="<?php echo $phone; ?>">
                    <p class="comments"><?php echo $phoneError ?></p>
                </div>-->
                <div class="col-md-12">
                    <label for="password">Mot de passe<span class="blue"> * </span></label>
                    <input type="password" name="password" autocomplete="off" id="password"  class="form-control" placeholder="Votre Mot de passe" value="<?php echo $password; ?>">
                    <p class="comments"><?php echo $passwordError ?></p>
                </div>
                <div class="col-md-12">
                    <p class="blue">* <strong>ces informations sont réquises</strong></p>
                </div>
                <div class="col-md-12">
                    <p class="">vous avez un compte alors <a href="login.php">connectez-vous</a></p>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="button1" value="S'inscrire">
                </div>

                <div class="thank-you" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>Merci ! pour votre inscription</div>
            </form>
        </div>
    </div>
</body>
</html>
