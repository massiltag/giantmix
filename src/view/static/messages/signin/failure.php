<html>
    <body>
        <h3>Hmm...</h3>
        <p>Une erreur s'est produite lors de l'inscription, <a href="index.php?ctl=client&action=redirect">réessayez</a> pour continuer.</p>
        <p>Détail de l'erreur : <?php echo substr($_REQUEST["error_detail"], 5) ?></p>
    </body>
</html>