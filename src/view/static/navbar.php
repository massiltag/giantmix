<html lang="en">
<head>
    <!-- jQuery -->
    <script src="lib/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Our files -->
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <script>
        function setActive(elt) {
            let el = document.getElementById(elt);
            for (let item of document.getElementsByClassName('nav-link')) item.classList.remove('active');
            if (!el.classList.contains('disabled')) el.classList.add('active');
        }
    </script>
</head>
<body class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 55px">
        <a class="navbar-brand" href="index.php"><img width="50" src="assets/logo.png" alt="GiantMix"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?ctl=shop&action=redirect">Catalogue<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Recherche avancée<span class="sr-only">(current)</span></a>
                </li>
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        Catégories-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                        <a class="dropdown-item" href="#">Céreales</a>-->
<!--                        <a class="dropdown-item" href="#">Fruits et légumes</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="#">Préparations</a>-->
<!--                    </div>-->
<!--                </li>-->
<!--                                <li class="nav-item">-->
<!--                                    <a class="nav-link disabled" href="#">Disabled</a>-->
<!--                                </li>-->
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    </nav>

</body>
</html>
