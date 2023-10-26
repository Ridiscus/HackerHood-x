<?php
session_start();
require 'database.php';

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['firstname']) && isset($_SESSION['password'])) {
    $userfirstName = $_SESSION['firstname'];
    $userPassword = $_SESSION['password'];

    // Afficher les informations de l'utilisateur
    echo "Bienvenue, $userfirstName ! votre mot de passe est $userPassword.";
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}



    $db = Database::connect();

    // Récupérer le solde de l'utilisateur depuis la base de données
    $getBalance = $db->prepare('SELECT balance FROM user_balance WHERE user_id = ?');
    $getBalance->execute(array($_SESSION['id']));

    if ($getBalance->rowCount() > 0) {
        $balance = $getBalance->fetch()['balance'];
    } else {
        $balance = 0; // Solde par défaut si aucune donnée n'est trouvée
    }







?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTN BËTA | Bank & Mobile Money</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>

        * {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            text-transform: capitalize;
            text-decoration: none;
            list-style: none;
            transition: all .2s linear;
            outline: none;
            border: none;
            box-sizing: border-box;
        }




        html {
            overflow-x: hidden;
            scroll-behavior: smooth;
            scroll-padding-top: 5.5rem;
        }

        body {
            min-height: 200vh;
        }


        /* header part */
        header {
            position: fixed;
            top: 0; left: 0; right: 0;
            padding: 1rem 7%;
            display: flex;
            font-size: 1em;
            align-items: center;
            justify-content: space-between;
            z-index: 100000;
        }


        header .logo {
            font-weight: bolder;
            list-style: none;
            text-decoration: none;
        }

        header .navbar a {
            padding: 0.5rem 1.5rem;
            text-decoration: none;
            list-style: none;
            color: #000;
        }

        header .icons ul li {
            list-style: none;
            text-decoration: none;
        }

        header .icons ul li ul {
            position: absolute;
            right: 3rem;
            padding-top: 1rem;
            padding-bottom: 1.5rem;
            width: 20rem;
            background: #fff;
            z-index: 1000;
            display: none;
        }

        header .icons i,
        header .icons a {
            margin-left: 1rem;
            height: 4.5rem;
            line-height: 4.5rem;
            text-align: center;
            list-style: none;
            text-decoration: none;
            color: #000;
        }

        header .icons ul li:hover > ul {
            display: initial;
        }






        /* solde part */
        #solde {
            background: hsl(127, 41%, 79%);
            padding: 65px 50px 85px 50px;
            height: 30rem;
        }

        #solde .text {
            text-align: center;
            margin-top: 4rem;
        }

        #solde .text .box {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }



        #solde .text h1 {
            font-size: 3rem;
        }

        #solde .text span {
            font-size: 2rem;
            font-weight: bold;
        }

        #solde .text .btn {
            display: inline-block;
            color: #000;
            background: #fff;
            border-radius: .5rem;
            cursor: pointer;
            padding: .8rem 1.5rem;
        }

        #solde .text .btn:hover {
            letter-spacing: .1rem;
        }






        /* more part */
        #more {
            z-index: 100;
            padding: 65px 50px 85px 50px;
            background: #fff;
            margin-top: -7rem;
            border-radius: 1%;
            height: 50rem;
            box-shadow: 2rem 1.5rem rgb(243, 168, 6);
            
        }

        #more .image img {
            width: 10rem;
            cursor: pointer;
        }

        #more .image .btn {
            background: #fcb206;
        }

        #more .image .btn:hover {
            background: #736545;
            color: azure;
        }

        #more .heading-2 {
            margin-top: 3rem;
        }
        .nav {
            margin: 10px;
        }
        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
            background: red;
            
        }

        .nav>li>a:focus, .nav>li>a:hover {
            color: blue;
            background-color:yellow ;
            padding:10px;
        }

        .nav>li>a {
            color:rgba(5, 131, 181, 0.571) ;
            font-size: 18px;

            
        }






    </style>


</head>
<body>


    <!-- header section start-->

    <header>
        <a href="#" class="logo"><i class=""></i>MTN BËTA</a>

        <nav>
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="#1" data-toggle="tab">Acceuil</a></li>
                <li role="presentation"><a href="#2" data-toggle="tab">Compte</a></li>
                <li role="presentation"><a href="#3" data-toggle="tab">Recepteur</a></li>
                <li role="presentation"><a href="#4" data-toggle="tab">Services financiers</a></li>
                <li role="presentation"><a href="#5" data-toggle="tab">Dons</a></li>
            </ul>
        </nav>

        <div class="icons">
            <ul>

                <li><p><?php echo $userName ?></p>
                    <ul>
                        <li><span><i class="bi bi-file-earmark-spreadsheet"></i></span><a href="#">Rapports de transaction</a></li>
                        <li><span><i class="bi bi-gear"></i></span><a href="#">Settings</a></li>
                        <li><span><i class="bi bi-question-circle"></i></span><a href="#">Help Centre</a></li>
                        <li><span><i class="bi bi-box-arrow-right"></i></span><a href="#">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </header>

    <!-- header section end -->






    <!-- section solde start -->
    
        <div class="tab-content">
            <div class="tab-pane active" id="1">

                <section id="solde">
                    <div class="text">
                        <?php echo "<h1>Mon solde total</h1>";
                        echo "<span>$balance CFA</span>";?>
                        <div class="box">
                            <p><a href="#" class="btn">retirer de l'argent</a></p>
                            <p><a href="#" class="btn">transferer de l'argent</a></p>
                            <p><a href="#historique" class="btn">voir mes transactions</a></p>
                        </div>
                    </div>
                </section>


                <section id="more" class="container">

                    <div class="heading">
                        <h2 align="center">mes services mobiles</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://img.freepik.com/free-vector/successful-purchase-concept-illustration_114360-2652.jpg?w=740&t=st=1697064264~exp=1697064864~hmac=0c410ea736a3605ce21ca65ba9ef7597c33357880dd8445ed1e8176cf4016bf9" alt="image1" style="width: 8rem;">
                                <a href="#" class="btn">acheter un pass</a>
                            </div>
                        </div>

                    
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://img.freepik.com/free-vector/hand-holding-phone-with-digital-wallet-service-sending-money-payment-transaction-transfer-through-mobile-app-flat-illustration_74855-20589.jpg?w=826&t=st=1697062479~exp=1697063079~hmac=d7ddfeae1b1a25f45d2cbb653b161528b71a590cd609a2dc721942d8c5c7ac72" alt="">
                                <a href="#" class="btn">recharger un tiers</a>
                            </div>
                        </div>


                        
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://img.freepik.com/free-vector/mobile-online-service-payment-concept-mobile-payments-online-payment-app-smartphone-has-security-protection-contactless-payment-business-finance-pay-transaction-online_1150-56215.jpg?w=996&t=st=1697064531~exp=1697065131~hmac=ea7ea60e45d5185e0c80766a7c56d579963e0c0fbb8092d98841fcb1851f392e" alt="" style="width: 12rem;">
                                <a href="#" class="btn">se recharger</a>
                            </div>
                        </div>
                    </div>


                    <div class="heading-2">
                        <h2 align="center">mes astuces</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://img.freepik.com/free-vector/successful-purchase-concept-illustration_114360-2652.jpg?w=740&t=st=1697064264~exp=1697064864~hmac=0c410ea736a3605ce21ca65ba9ef7597c33357880dd8445ed1e8176cf4016bf9" alt="image1" style="width: 8rem;">
                                <a href="#" class="btn">acheter un pass</a>
                            </div>
                        </div>

                    
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://img.freepik.com/free-vector/tiny-people-using-qr-code-online-payment-isolated-flat-illustration_74855-11136.jpg?w=996&t=st=1697064695~exp=1697065295~hmac=fc7c07b00d3fc935536f0e144eaccb3132cd9561d4f4178541bead20288fd842" alt="">
                                <a href="#" class="btn">partager un code de parrainage</a>
                            </div>
                        </div>


                        
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://img.freepik.com/free-vector/mobile-online-service-payment-concept-mobile-payments-online-payment-app-smartphone-has-security-protection-contactless-payment-business-finance-pay-transaction-online_1150-56215.jpg?w=996&t=st=1697064531~exp=1697065131~hmac=ea7ea60e45d5185e0c80766a7c56d579963e0c0fbb8092d98841fcb1851f392e" alt="" style="width: 12rem;">
                                <a href="#" class="btn">se recharger</a>
                            </div>
                        </div>
                    </div>


                    

                    <div class="heading-2">
                        <h2 align="center">le mag</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://www.mtn.com/wp-content/uploads/2023/08/MTN-Executive-announcement_Banner_700x540-%E2%80%93-V2_2.png?w=700" alt="image1" style="width: 10rem;">
                            </div>
                        </div>
                
                        
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://www.mtn.com/wp-content/uploads/2023/07/490x300-01.jpg?resize=1536,940" alt="" style="width: 12rem;">
                            </div>
                        </div>
                
                
                            
                        <div class="col-md-4">
                            <div class="image">
                                <img src="https://www.mtn.com/wp-content/uploads/2023/08/Press-Release-Lead-image.jpg?w=1024" alt="" style="width: 12rem;">
                            </div>
                        </div>
                            
                    </div>
                </section>
            </div>

            <div class="tab-pane" id="2">
                <h1>Bonjour</h1>
            </div>


        </div>





    
    

    

    





</body>
</html>
