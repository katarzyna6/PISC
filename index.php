<?php 
require_once "conf/global.php"; 

spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")) {
        require_once "models/$class.php";
    }
});

$route = isset($_REQUEST["route"])? $_REQUEST["route"] : "home";

    switch ($route) {
        case "home": $view = showHome();
        break;
        case "dilex": $view = showDilex();
        break;
        case "item": $view = showItem();
        break;
        case "contact": $view = showContact();
        break;
        case "admin": $view = showAdmin();
        break;
        default : $view = showHome();
    }

    function showHome() {
        
        $datas = [];
        return ["template" => "home.php", "datas" => $datas];
    }

    function showDilex() {
        
        $datas = [];
        return ["template" => "dilex.php", "datas" => $datas];
    }

    function showItem() {
        
        $datas = [];
        return ["template" => "item.php", "datas" => $datas];
    }

    function showContact() {
        
        $datas = [];
        return ["template" => "contact.php", "datas" => $datas];
    }

    function showAdmin() {
        
        $datas = [];
        return ["template" => "admin.php", "datas" => $datas];
    }



?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
        <title>P.I.S.C. Produits cosmétiques</title>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/modal.css">
        <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">  
    </head>



<?php require "views/nav.php"; ?>
<?php require "views/{$view['template']}"; ?>




<?php require "views/footer.php"; ?>
       
<!-- <script src="js/jquery-3.4.1.js"></script>    
<script src="js/script.js"></script> -->
<script src="js/modal.js"></script>
<script src="js/ajax.js"></script>
</body>
</html>