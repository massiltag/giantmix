<script>
    function setActive(elt) {
        let el = document.getElementById(elt);
        for (let item of document.getElementsByClassName('nav-link')) item.classList.remove('active');
        if (!el.classList.contains('disabled')) el.classList.add('active');
    }
</script>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 55px">
        <a class="navbar-brand" href="index.php"><img width="50" src="assets/logo_cropped.png" alt="GiantMix"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo 'index.php'?>">
                        <?php echo !(session_status() === PHP_SESSION_ACTIVE) ? 'Accueil' : 'Recherche' ?>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php
                    if (session_status() === PHP_SESSION_ACTIVE) {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="index.php?ctl=shop&action=bucket">Panier<span class="sr-only">(current)</span></a>
                              </li>';

                        echo '<li class="nav-item">
                                <a class="nav-link" href="index.php?ctl=shop&action=orders">Mes commandes<span class="sr-only">(current)</span></a>
                               </li>';
                    }
                ?>

            </ul>


            <?php
                if (session_status() === PHP_SESSION_ACTIVE)
                    echo '
                        <div class="my-2 my-lg-0">
                            <a class="nav-link" href="index.php?ctl=client&action=logoff">
                                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    ';
            ?>

            <form class="form-inline my-2 my-lg-0" action="index.php" method="get">
                <input type="hidden" name="ctl" value="shop">
                <input type="hidden" name="action" value="search">
                <input type="hidden" name="type" value="keyword">

                <input class="form-control mr-sm-2" name="keyword" placeholder="Recherche">

                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    </nav>

</body>
