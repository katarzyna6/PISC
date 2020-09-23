<?php 
session_start();
$_SESSION['liste'] = $_SESSION['liste']?? [];

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
        //MENU
        case "menu": $view = showMenu();
        break;
        //ITEM
        case "item": $view = showItem();
        break;
        case "insert_item": insertItem();
        break;
        case "mod_item": $view = modItem();
        break;
        case "del_item": delItem();
        break;
        //img
        case "del_image": delImage();
        break;
        case "brand": $view = showBrand();
        break;
        case "category": $view = showCategory();
        break;
        case "subcategory": $view = showSubcategory();
        break;
        //FOOTER
        case "footer": $view = showFooter();
        break;
        //BASKET
        case "basket": $view = showBasket();
        break;
        //CONTACT
        case "contact": $view = showContact();
        break;
        case "sendemail": sendEmail();
        break;
        //TERMES
        case "termes": $view = showTermes();
        break;
        case "cgv": $view = showCgv();
        break;
        case "politique": $view = showPolitique();
        break;
        case "mentions": $view = showMentions();
        break;
        //ADMIN
        case "connectform": $view = showConnect();
        break;
        case "insert_admin" : insertAdmin();
        break;
        case "admin" : $view = showAdmin();
        break;
        case "connect": connectAdmin();
        break;
        case "deconnect" : deconnectAdmin();
        break;
        //LISTE
        case "addListe" : addListe();
        break;
        case "modListe" : modListe();
        break;
        // case "ajax": $view = showAjax();
        // break;
        default : $view = showHome();
    }

function showMenu() {

    global $menu;

    $cat = new Category();
    $menu["categories"] = $cat->selectAll();

    foreach($menu["categories"] as &$cat) {
        $subcats = new Subcategory();
        $subcats->setIdCategory($cat->getIdCategory());
        $cat->subCats = $subcats->selectByCategory();
    }
    $brand = new Brand();
    $menu["brand"] = $brand->selectAll();
}

function showFooter() {

    global $footer;
    
    $link = new Link();
    $footer['links'] = $link->selectAll();

    // var_dump($link->selectAll());

}

function showBasket() {

    $item = new Item();
    $datas = [];
    foreach($_SESSION['liste'] as $elem) {
        $item->setIdItem($elem);
        array_push($datas, clone $item->select());
    }
    return $datas;
}

function showHome() {
    // if(isset($_SESSION["admin"])) {
    //     header("Location:index.php?route=admin");
    // }

    //ShowNew
    $items = new Item();
    $datas['new_items'] = $items->selectByLastId();
    
    $images = new Image();
    foreach($datas['new_items'] as &$item) {
        $images->setIdItem($item->getIdItem());
        $item->images = $images->selectByIdItem();
    }

    //ShowBest
    $datas['best_items'] = $items->selectByNote();

    $images = new Image();
    foreach($datas['best_items'] as &$item) {
        $images->setIdItem($item->getIdItem());
        $item->images = $images->selectByIdItem();
    }

    return ["template" => "home.php", "datas" => $datas];
}

function showAdmin() {
    
    // var_dump($_SESSION);
    if(!isset($_SESSION["admin"])) {
        header("Location:connectform");
    }

    $item = new Item();
    $item->setIdAdmin($_SESSION["admin"]["id_admin"]);
    $datas =[];

    $datas['items'] = $item->selectByAdmin();
    
    //on récupére les noms des marques
    foreach($datas['items'] as &$elem) {
        
        $brand = new Brand();
        $brand->setIdBrand($elem->getIdBrand());
        $elem->brandcomplete = $brand->select();
        
    }

    //on récupére les noms des catégories
    foreach($datas['items'] as &$elem) {
        $cat = new Category();
        $cat->setIdCategory($elem->getIdCategory());
        $elem->categorycomplete = $cat->select();
    }

    //on récupére les noms des souscatégories
    foreach($datas['items'] as &$elem) {
        $subcat = new Subcategory();
        $subcat->setIdSubcategory($elem->getIdSubcategory());
        $elem->subcategorycomplete = $subcat->select();
    }

    //Récupérer un produit à modifier
    if(isset($_GET['id'])) {
        $item->setIdItem($_GET['id']);
        $datas['item'] = $item->select();
    }

    //on ajoute l'objet Categorie
    $cat = new Category();
    $datas["category"] = $cat->selectAll();

    $subcat = new Subcategory();
    $datas["subcategory"] = $subcat->selectAll();

    $brand = new Brand();
    $datas["brand"] = $brand->selectAll();

    $image = new Image();
    $datas["images"] = $image->selectAll();

    return ["template" => "admin.php", "datas" => $datas];
}    

function addListe() {
    if(isset($_SESSION['liste'])) {
        $verif = true;
        foreach($_SESSION['liste'] as $li) {
            if($li == $_GET['id']) {
                $verif = false;
            }
        }
        if($verif) {
            array_push($_SESSION['liste'], $_GET['id']);
        } 
    } else {
        $_SESSION['liste'] = [$_GET['id']];
    }
    header("Location:item-".$_GET['id']);
}

function modListe() {
    if(!empty($_SESSION['liste'])) {
        $_SESSION["liste"] = [];
        foreach($_POST as $key => $elem) {
            if($key != "redir" && $key != "id") {
                array_push($_SESSION['liste'], $key);
            }
        }
    } else {
        $_SESSION['liste'] = [];
    }

    
    $route = isset($_POST['redir'])? $_POST['redir'] : "home";
    $redir = (isset($_REQUEST['id']))? $route."-".$_REQUEST['id'] : $_POST['redir'];
    header("Location:$redir");
}

function showItem() {

    if(!isset($_GET['id'])) {
        header("Location:index");
        exit;
    } 

    $datas = [];
    $item = new Item();
    $item->setIdItem($_GET['id']);
    $datas['item'] = $item->select();

    $image = new Image();
    $image->setIdItem($_GET['id']);
    $datas['item']->images = $image->selectByIdItem();
    
    return ["template" => "item.php", "datas" => $datas];
}

//BRAND
function showBrand() {

    $items = new Item();
    if(isset($_GET['id'])) {
        $items->setIdBrand($_GET['id']);
        $datas['brand_items'] = $items->selectByBrand();
    } else {
        $datas['brand_items'] = [];
    }

    $brand = new Brand();
    if(isset($_GET['id'])) {
        $brand->setIdBrand($_GET["id"]);
        $datas["brand"] = $brand->select();
    } else {
        $datas['brand'] = new Brand();
    }
    

    $images = new Image();
    foreach($datas['brand_items'] as &$item) {
        $images->setIdItem($item->getIdItem());
        $item->images = $images->selectByIdItem();
    }

    return ["template" => "brand.php", "datas" => $datas];

}

//CAT
function showCategory() {

    $datas = [];
    
    $item = new Item();
    $item->setIdCategory($_GET['id']);
    $datas['items'] = $item->selectByCategory();

    $cat = new Category();
    $cat->setIdCategory($_GET["id"]);
    $datas ["category"] = $cat->select();

    $image = new Image();
    $datas["images"] = $image->selectAll();

    return ["template" => "category.php", "datas" => $datas];
    
}

//SUBCAT
function showSubcategory() {

    $subcat = new Subcategory();
    $subcat->setIdSubcategory($_GET["id"]);
    $datas ["subcategory"] = $subcat->select();

    $item = new Item();
    $item->setIdSubcategory($_GET['id']);
    $datas ['items'] = $item->selectBySubcategory();

    $image = new Image();
    $datas["images"] = $image->selectAll();

    return ["template" => "subcategory.php", "datas" => $datas];
}

//CONTACT
function showContact() {

    $datas = [];
    $datas['liste'] = [];

    $item = new Item();
    foreach($_SESSION['liste'] as $li) {
        $item->setIdItem($li);
        array_push($datas['liste'], clone ($item->select()));
    }

    return ["template" => "contact.php", "datas" => $datas];
}

//TERMES
function showTermes() {
        
    $datas = [];
    return ["template" => "termes.php", "datas" => $datas];
}

function showCgv() {
        
    $datas = [];
    return ["template" => "cgv.php", "datas" => $datas];
}

function showPolitique() {
        
    $datas = [];
    return ["template" => "politique.php", "datas" => $datas];
}

function showMentions() {
        
    $datas = [];
    return ["template" => "mentions.php", "datas" => $datas];
}

//LIENS
function showLiens() {
        
    $datas = [];
    return ["template" => "liens.php", "datas" => $datas];
}

//ADMIN
function showConnect() {
    $datas = [];
    return ["template" => "connect.php", "datas" => $datas];
}

function insertAdmin() {

    if(!empty($_POST["nick"]) && (!empty($_POST["email"]) && ($_POST["password"] === $_POST["password2"]))) {
        
    var_dump($_POST);
        if (preg_match("#^[a-zA-Z-àâäéèêëïîôöùûüçàâäéèêëïîôöùûüçÀÂÄÉÈËÏÔÖÙÛÜŸÇæœÆŒ]+$#", $_POST["nick"])
            && preg_match("#^[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z0-9]+$#", $_POST["email"]) 
            && preg_match("", $_POST["password"])) {
    
            $admin = new Admin();
            $admin->setNick($_POST["nick"]);
            $admin->setEmail($_POST["email"]);
            $admin->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));

            $admin->insert();
            $nick= isset($_POST['nick'])? $_POST['nick'] : "null";
            $password= isset($_POST['password'])? $_POST['password'] : "null";
            $_SESSION['nick']=$nick;
            $_SESSION['password']=$password;
    
        } else {
            echo "Erreur.<br>"; 
            header("Location:connectform");
        }
        
        setcookie('nick', $_POST['nick'], time() + 182 * 24 * 60 * 60, '/');
        header("Location:admin");
    }
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
                header('Location:connectform');
            } 
                
            } else {
                header('Location:connectform');
        }
    }   
}


function deconnectAdmin() {
        
    unset($_SESSION["admin"]);
    //Redirection vers accueil
    header("Location:connectform");
}



function insertItem() {
    
    
    if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["brand"]) && !empty($_POST["category"]) && !empty($_POST["subcategory"]) && !empty($_POST["price"]) && !empty($_POST["note"]) && !empty($_POST["avis"])) {
    
        $item = new Item();
        $item->setName($_POST["name"]);
        $item->setDescription($_POST["description"]);
        $item->setPrice($_POST["price"]);
        $item->setAvis($_POST["avis"]); 
        $item->setNote($_POST["note"]);
        $item->setIdBrand($_POST["brand"]);      
        $item->setIdCategory($_POST["category"]);
        $item->setIdSubcategory($_POST["subcategory"]);

        
        $item->setIdAdmin($_SESSION['admin']['id_admin']);
        
        $item->insert();

        $image = "default.png";
        // var_dump($_FILES);

        $total = 0;
        
            foreach($_FILES as $uploadedimage) {

            if($uploadedimage ['size'] > 0) { // image not empty

                $uploder = new UploadImage($uploadedimage, 450, 450);
                $imageFilePath = $uploder->set_image();

                $image = new Image();
                $image->setIdItem($item->getIdItem());
                $image->setName($imageFilePath);
                $image->setAlt("Image de l'article");
                $image->insert();
                $total = $total + 1;

            }
            }if($total < 1) { 
       
                $imageFilePath = "default.png";
                var_dump($item);
                $image = new Image();
                $image->setIdItem($item->getIdItem());
                $image->setName($imageFilePath);
                $image->setAlt("Image de l'article");
                $image->insert();

    }
    } 
        header("Location:index.php?route=admin");
        exit;
}


function modItem() {

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

    $datas=[];

    $item = new Item();
    $item->setIdItem($_REQUEST['id']);
    $datas['item'] = $item->select();

    $cat = new Category();
    $datas["category"] = $cat->selectAll();

    $subcat = new Subcategory();
    $datas["subcategory"] = $subcat->selectAll();

    $brand = new Brand();
    $datas["brand"] = $brand->selectAll();

    $image = new Image();
    $datas["image"] = $image->selectAll();


    return ["template" => "mod_item.php", "datas" => $datas];
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {

    $item = new Item();
    $item->setIdItem($_REQUEST['id_item']);
    $item->setName($_POST["name"]);
    $item->setDescription($_POST["description"]);
    $item->setPrice($_POST["price"]);
    $item->setAvis($_POST["avis"]);
    $item->setNote($_POST["note"]);
    $item->setIdBrand($_POST["brand"]);
    $item->setIdCategory($_POST["category"]);       
    $item->setIdSubcategory($_POST["subcategory"]);

    foreach($_FILES as $uploadedimage) {

            if($uploadedimage ['size'] > 0) { // image not empty

                $uploder = new UploadImage($uploadedimage, 450, 450);
                $imageFilePath = $uploder->set_image();

                $image = new Image();
                $image->setIdItem($item->getIdItem());
                $image->setName($imageFilePath);
                $image->setAlt("Image de l'article");
                $image->insert();
                
            }
        }

    $item->setIdAdmin($_SESSION['admin']['id_admin']);
    $item->update();

    header("Location:admin");
    exit;
    }
}

function delItem() {

    $item = new Item();
    $item->setIdItem($_REQUEST['id']);
    $item = $item->select();

    if($item->getIdAdmin() == $_SESSION['admin']['id_admin']) {
        
        $image = new Image();
        $image->setIdItem($_REQUEST['id']);
        $images = $image->selectByIdItem();

        foreach($images as $image) {

            unlink("img/".$image->getName()); 

            $image->delete();
        }

        $item->delete();
    }

    header("Location:admin");
    exit;
}

function delImage() {
    $image = new Image();
    $image->setIdImage($_REQUEST['id']);

    $image->select();
    unlink("img/".$image->getName()); 

    $image->delete();

    header("Location:admin");
    exit;
}

function sendEmail() {

    $secret = '6Le88';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
    $result = json_decode($url, TRUE);
        if ($result['success'] == 1) {
            $verifCaptcha = true;
        } else {
            $verifCaptcha = false;
    }

    if($verifCaptcha) {
        // Autres vérifications

        $subject = "";
        $message = "";

        // Envoi mail
        mail("mail@hotmail.fr", $subject, $message);
    }
}

// function showAjax() {

//     sleep(5);
//     echo("<p>Contenu modifie</p>");
//     exit;
// }



?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
        <meta name="description" content="P.I.S.C produits cosmetiques"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>P.I.S.C. Produits cosmétiques</title>
        <link rel="stylesheet" type="text/css" href="css/stylemin.css">
        <link rel="stylesheet" type="text/css" href="css/stylemed.css">
        <link rel="stylesheet" type="text/css" href="css/stylelar.css">
        <link rel="icon" href="img/favicon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link href="fonts/fontello/css/fontello.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    </head>
    
    <body>

        <?php showMenu() ?>
        <?php require "views/nav.php"; ?>

        <div id="main">
        <?php require "views/{$view['template']}"; ?>
        </div>

        <?php 
            $liste = showBasket();
            require "views/basket.php"; 
        ?>

        <?php showFooter() ?>
        <?php require "views/footer.php"; ?>


        <script src="js/jquery-3.4.1.js"></script>
        <script src="js/multipleFileUpload.js"></script>     
        <!-- <script src="js/script.js"></script>  -->
        <!-- <script src="js/chat.js"></script> -->
        <script src="js/modal.js"></script>
        <!-- <script src="js/ajax.js"></script> -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        
    </body>
</html>