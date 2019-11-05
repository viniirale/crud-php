<?php
define('SITE_ROOT', dirname(dirname(__FILE__)));
error_reporting(E_ALL);
ini_set('display_errors', true);
spl_autoload_register(function ($class) {
    if (file_exists("controller/$class.php")) {
        require_once "controller/$class.php";
        return true;
    }
});
?>
<!DOCTYPE html>
<html lang='pt-br'>
<header>
    <meta charset="utf-8">
    <title>Agenda de Clientes</title>
    <!-- Theme CSS -->
    <link href="content/bootstrap.css" rel="stylesheet">
    <link href="content/bootstrap.min.css" rel="stylesheet">
    <link href="content/style.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="scripts/jquery.js"></script>
    <script src="scripts/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script src="scripts/bootstrap.bundle.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>
    <script src="scripts/modal.js"></script>
</header>

<body>

    <?php
    if ($_GET) {
        $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL) : null;
        $method     = isset($_GET['method']) ? $_GET['method'] : null;
        if ($controller && $method) {
            if (method_exists($controller, $method)) {
                $parameters = $_GET;
                unset($parameters['controller']);
                unset($parameters['method']);
                call_user_func(array($controller, $method), $parameters);
            } else {
                echo "Método não encontrado!";
            }
        } else {
            echo "Controller não encontrado!";
        }
    } else {
        echo '<div class="container"><h1>Clientes</h1><hr>';
        echo 'Bem-vindo ao aplicativo da Husky Clientes! <br /><br />';
        echo '<a href="?controller=ClientsController&method=list" class="btn btn-success">Vamos Começar!</a></div>';
    }
    ?>


</body>

</html>