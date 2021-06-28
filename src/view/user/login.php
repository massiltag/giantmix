<html lang="fr">

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

    <style></style>
</head>

<body class="container">

    <div class="jumbotron" style="margin-bottom: 10px">
        <h1>Bonjour</h1>
        <p>Ceci est notre rendu pour le TP8 du module INF3 - BDNoSQL</p>
    </div>

    <div class="page-header">
        <h1>Connexion <small class="text-muted">à votre compte</small></h1>
    </div>


    <div class="card gradient-card">
        <div class="card-body">
            <h3 class="card-title">Bienvenue sur GiantMix</h3>
            <p class="card-text">
                Connectez-vous ou <u><a href="index.php?ctl=client&action=redirect">inscrivez-vous</a></u> pour acheter.
            </p>
        </div>
    </div>

    <div class="card gradient-card">
        <div class="card-body">
            <h3>
                Connexion
            </h3>

            <form action="index.php?ctl=client&action=login" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label>Adresse e-mail</label>
                    <input type="email" class="form-control" name="mail" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary submit">Se connecter</button>
            </form>

        </div>
    </div>



</body>

</html>
