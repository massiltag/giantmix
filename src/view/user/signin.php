<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- jQuery -->
    <script src="lib/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Our files -->
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>

<body class="container">

    <small class="text-muted"><h6><a href="index.php">< Retour</a></h6></small>
    <div class="page-header">
        <h1>Inscription <small>sur GiantMix</small></h1>
    </div>

    <div class="card gradient-card">
        <div class="card-body">
            <h3>
                Formulaire d'inscription
            </h3>

            <form action="index.php?ctl=client&action=register" method="post">
                <div class="form-fields">
                    <div class="form-group">
                        <input type="text" minlength="2" maxlength="10" class="form-control" name="fname" placeholder="Prénom" required>
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="1" maxlength="12" class="form-control" name="lname" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="mail" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <input type="password" minlength="4" class="form-control" name="pwd" placeholder="Mot de passe" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary submit">S'inscrire</button>
            </form>

        </div>
    </div>


</body>

</html>
