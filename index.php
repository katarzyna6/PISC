<?php 
session_start();

require_once "conf/global.php"; 

spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")) {
        require_once "models/$class.php";
    }
});

$route = isset($_REQUEST["route"])? $_REQUEST["route"] : "home";

    switch ($route) {
        //GENERAL
        case "home": $view = showHome();
        break;
        case "brand": $view = showBrand();
        break;
        case "brand": $view = showItem();
        break;
        case "contact": $view = showContact();
        break;
        //ADMIN
        case "insert_admin" : $view = insertAdmin();
        break;
        case "admin" : $view = showAdmin();
        break;
        case "connect": $view = connectAdmin();
        break;
        case "deconnect" : $view = deconnectAdmin();
        break;
        //ITEM
        case "insert_item": $view = insertItem();
        break;
        case "mod_item": $view = modItem();
        break;
        case "del_item": $view = delItem();
        break;
        //BRAND
        case "insert_brand": $view = insertBrand();
        break;
        case "mod_brand": $view = modBrand();
        break;
        case "del_brand": $view = delBrand();
        break;
        //CATEGORY
        case "insert_category": $view = insertCategory();
        break;
        case "mod_category": $view = modCategory();
        break;
        case "del_category": $view = delCategory();
        break;
        //SUBCATEGORY
        case "insert_subcategory": $view = insertSubcategory();
        break;
        case "mod_subcategory": $view = modSubcategory();
        break;
        case "del_subcategory": $view = delSubcategory();
        break;
        
        
        // case "ajax": $view = showAjax();
        // break;
        default : $view = showHome();
    }

function showHome() {
        
    $datas = [];
    return ["template" => "home.php", "datas" => $datas];
}

function showBrand() {
        
    $datas = [];
    return ["template" => "brand.php", "datas" => $datas];
}

function showItem() {
        
    $datas = [];
    return ["template" => "item.php", "datas" => $datas];
}

function showContact() {
        
    $datas = [];
    return ["template" => "contact.php", "datas" => $datas];
}

function InsertAdmin() {

    if(!empty($_POST["nick"]) /*&&(!empty($_POST["nom"]) && (!empty($_POST["prenom"])*/ && (!empty($_POST["email"]) && ($_POST["password"] === $_POST["password2"]))) {
    
        $admin = new Admin();
        $admin->setNick($_POST["nick"]);
        // $admin->setNom($_POST["nom"]);
        // $admin->setPrenom($_POST["prenom"]);
        $admin->setEmail($_POST["email"]);
        $admin->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));

        $admin->insert();
        $nick= isset($_POST['nick'])? $_POST['nick'] : "null";
        $password= isset($_POST['password'])? $_POST['password'] : "null";
        $_SESSION['nick']=$nick;
        $_SESSION['password']=$password;
    
    }
    else {
        echo "Erreur.<br>"; 
    }
        
    setcookie('nick', $_POST['nick'], time() + 182 * 24 * 60 * 60, '/');
    header("Location:admin");
}

function connectAdmin() {
        
    if(!empty($_POST["nick"]) && !empty($_POST["password"])) {

        $admin = new Admin();
        $admin->setNick($_POST["nick"]);
        $admin->setPassword($_POST["password"]);
        $verif = $admin->selectByNick();
            
        if($verif) { 
            if(password_verify($_POST["password"], $verif["password"])) {
                $_SESSION["admin"] = $verif;
                header('Location:admin'); 
            } else { 
                header('Location:home');
            } 
                
            } else {
                header('Location:home');
        }
    }   
}


function deconnectAdmin() {
        
    unset($_SESSION["admin"]);
    header("Location:index");
}

function showAdmin() {
    
    if(!isset($_SESSION["admin"])) {
            header("Location:index");
    }
    var_dump($_SESSION);
}    

function insertItem() {
        
    $datas = [];
    return ["template" => "insert_item.php", "datas" => $datas];
}

function delItem() {
        
    $datas = [];
    return ["template" => "del_item.php", "datas" => $datas];
}

function modItem() {
        
    $datas = [];
    return ["template" => "mod_item.php", "datas" => $datas];
}

function insertBrand() {
        
    $datas = [];
    return ["template" => "insert_brand.php", "datas" => $datas];
}

function delBrand() {
        
    $datas = [];
    return ["template" => "del_brand.php", "datas" => $datas];
}

function modBrand() {
        
    $datas = [];
    return ["template" => "mod_brand.php", "datas" => $datas];
}

function insertCategory() {
        
    $datas = [];
    return ["template" => "insert_category.php", "datas" => $datas];
}

function delCategory() {
        
    $datas = [];
    return ["template" => "del_category.php", "datas" => $datas];
}

function modCategory() {
        
    $datas = [];
    return ["template" => "mod_category.php", "datas" => $datas];
}

function insertSubcategory() {
        
    $datas = [];
    return ["template" => "insert_subcategory.php", "datas" => $datas];
}

function delSubcategory() {
        
    $datas = [];
    return ["template" => "del_subcategory.php", "datas" => $datas];
}

function modSubcategory() {
        
    $datas = [];
    return ["template" => "mod_subcategory.php", "datas" => $datas];
}

// function showAjax() {

    //sleep(5);
    //echo("<p>Contenu modifie</p>");
    //exit;}
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

<!-- <div id="modContent"></div> -->


<?php require "views/footer.php"; ?>

<!-- <script src="js/jquery-3.4.1.js"></script>    
<script src="js/script.js"></script> -->
<!-- <script src="js/modal.js"></script> -->
<!-- <script src="js/ajax.js"></script> -->
</body>
</html>