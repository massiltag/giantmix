<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>

    <!-- jQuery -->
    <script src="lib/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Our files -->
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>

    <style>
        .product-name {
            display: inline;
        }
        .product-description {
            margin-top: 10px;
        }
        .price {
            display: inline;
            margin: auto;
            right: 20px;
            position: absolute;
            font-weight: bolder;
        }

        .py-5 {
            padding: 1rem 0 1rem!important;
        }

        .form-row .col-md-3 {
            margin-top: 10px;
        }

        .card-header {
            background-color: rgb(116, 112, 239);
            color: whitesmoke;
        }
    </style>

</head>

<body class="container">

    <?php echo "<h3>Commandes de " . $_SESSION["fname"] . "</h3>"; ?>


</body>

</html>
