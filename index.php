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
        case "item": $view = showItem();
        break;
        case "connectform": $view = showConnect();
        break;
        case "category": $view = showCategory();
        break;
        case "subcategory": $view = showSubcategory();
        break;
        case "insert_subcategory": $view = insertSubcategory();
        break;
        case "mod_subcategory": $view = modSubcategory();
        break;
        case "del_subcategory": $view = delSubcategory();
        break;
        case "contact": $view = showContact();
        break;
        //ADMIN
        case "insert_admin" : $view = insertAdmin();
        break;
        case "admin" : $view = showAdmin();
        break;
        case "connect": connectAdmin();
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
        // //SUBCATEGORY
        // case "insert_category": $view = insertCategory();
        // break;
        // case "mod_category": $view = modCategory();
        // break;
        // case "del_category": $view = delCategory();
        // break;
        
        
        
        // case "ajax": $view = showAjax();
        // break;
        default : $view = showHome();
    }

function showHome() {
        
    if(isset($_SESSION["admin"])) {
        header("Location:admin");
    }

    $datas = [];
    return ["template" => "home.php", "datas" => $datas];
}

function showBrand() {

    $brand = new Brand();
    $donnees = $brand->select();

    $donnees = [
            "id_brand" => 1,
            "name" => "DILEX",
            "description" => "<P>Lorem ipsum ...</p>"     
    ];


    $datas = $donnees;
    return ["template" => "brand.php", "datas" => $datas];
}

function showItem() {

    // C'est ici que l'on gère les fluxs de données !!!
    $item = new Item();
    $donnees = $item->select();
    $donnees = [
        "name" => "Lingettes hydratantes",
        "image1" => "img/DILEX/1.jpg",
        "image2" => "img/DILEX/1_2.jpg",
        "image3" => "img/DILEX/1_3.jpg",
        "description" => "<p>Les lingettes nettoyantes et désinfectantes avec huile d'argan, huile d'amande, vitamine E, sans paraben. Appropriés lorsqu'il n'y a pas de conditions de toilette, idéales pour les soins des malades et des personnes âgées. Produit convient pour une utilisation quotidienne, ne dessèche pas la peau.</p>",
        "id_category" => 2,
        "id_subcategory" => 10,
        "prix" => 15,
        "avis" => "<p>OK</p>",
        "note" => 3
    ];
    $donnees["brand"] = "DILEX";
        
    $datas = $donnees;
    return ["template" => "item.php", "datas" => $datas];
}

function showConnect() {
    $datas = [];
    return ["template" => "connect.php", "datas" => $datas];
}

function showCategory() {

    $category = new Category();
    $donnees = $category->select();

    $donnees = [
        "id_category" => 1,
        "name" => "Beauté"    
    ];


    $datas = $donnees;
    return ["template" => "category.php", "datas" => $datas];
    
}

function showSubcategory() {

    $subcategory = new Subcategory();
    $donnees = $subcategory->select();

    $donnees = [
        "id_subcategory" => 1,
        "name" => "Beauté du visage",
        "id_category" => 1,  
    ];


    $datas = $donnees;
    return ["template" => "subcategory.php", "datas" => $datas];
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
    header("Location:index.php?route=admin");
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
                header('Location:index.php?route=admin'); 
            } else { 
                header('Location:index.php');
            } 
                
            } else {
                header('Location:index.php');
        }
    }   
}


function deconnectAdmin() {
        
    unset($_SESSION["admin"]);
    header("Location:index");
}

function showAdmin() {
    
    if(!isset($_SESSION["admin"])) {
        header("Location:index.php?route=connectform");
    }

    
    $item = new Item();
    $item->setIdAdmin($_SESSION["admin"]["id_admin"]);
    
    $datas =[];

    $datas['items'] = $item->selectByAdmin();

    //on récupére les noms des catégories
    foreach($datas['items'] as &$elem) {
        $brand = new Brand();
        $brand->setIdBrand($elem->getIdCategory());
        $elem->brandcomplete = $brand->select();
    }

    //on récupére les noms des catégories
    foreach($datas['items'] as &$elem) {
        $category = new Category();
        $category->setIdCategory($elem->getIdCategory());
        $elem->categorycomplete = $category->select();
    }

    //on récupére les noms des souscatégories
    foreach($datas['items'] as &$elem) {
        $subcategory = new Subcategory();
        $subcategory->setIdSubcategory($elem->getIdSubcategory());
        $elem->subcategoriecomplete = $subcategory->select();
    }

    //Récupérer un produit à modifier
    if(isset($_GET['id'])) {
        $item->setIdItem($_GET['id']);
        $items = $item->select();
        $datas['item'] = $item;
    }

    //on ajoute l'objet Categorie
    $category = new Category();
    $datas["category"] = $category->selectAll();

    $subcategory = new Subcategory();
    $datas["subcategory"] = $subcategory->selectAll();

    $brand = new Brand();
    $datas["brand"] = $brand->selectAll();

    var_dump($datas);
    return ["template" => "admin.php", "datas" => $datas];
}    

function insertItem() {

    var_dump($_POST);
    
    if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["brand"]) && !empty($_POST["category"]) && !empty($_POST["subcategory"]) && !empty($_POST["price"]) && !empty($_POST["note"]) && !empty($_POST["avis"])) {
        var_dump("ok1");
    
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
        var_dump($item);
        $item->insert();

        header("Location:index.php?route=admin");
}

function modItem() {

    $item = new Item();
    $item->setIdItem($_REQUEST['id_item']);
    $item->setName($_POST["name"]);
    $item->setDescription($_POST["description"]);
    $item->setPrice($_POST["price"]);
    $item->setAvis($_POST["avis"]);
    $item->setNote($_POST["note"]);
    $item->setIdBrand($_POST["id_brand"]);
    $item->setIdCategory($_POST["id_category"]);       
    $item->setIdSubcategory($_POST["id_subcategory"]);
    

    $item->setIdAdmin($_SESSION['admin']['id_admin']);
    $item->update();

    header("Location:mod_item");
        
    $datas = [];
    return ["template" => "mod_item.php", "datas" => $datas];
}

function delItem() {

    $item = new Item();
    $item->setIdItem($_REQUEST["id_item"]);

    $item->delete();

    if($item->getIdAdmin() == $_SESSION['admin']['id_admin']) {
        $item->delete();
    }

    $datas = [];
    return ["template" => "del_item.php", "datas" => $datas];
}

// function insertBrand() {
        
//     $datas = [];
//     return ["template" => "insert_brand.php", "datas" => $datas];
// }

// function delBrand() {
        
//     $datas = [];
//     return ["template" => "del_brand.php", "datas" => $datas];
// }

// function modBrand() {
        
//     $datas = [];
//     return ["template" => "mod_brand.php", "datas" => $datas];
// }

// function insertCategory() {
        
//     $datas = [];
//     return ["template" => "insert_category.php", "datas" => $datas];
// }

// function delCategory() {
        
//     $datas = [];
//     return ["template" => "del_category.php", "datas" => $datas];
// }

// function modCategory() {
        
//     $datas = [];
//     return ["template" => "mod_category.php", "datas" => $datas];
// }

function insertSubcategory() {

    if(!empty($_POST["name"]) && !empty($_POST["id_subcategory"]) && !empty($_POST["id_category"])) {

        $subcategory = new Subcategory();
        $subcategory->setName($_POST["name"]);
        $subcategory->setIdSubcategory($_POST["id_subcategory"]);
        $subcategory->setIdCategory($_POST["id_category"]);

        $subcategory->insert();
        
    $datas = [];
    return ["template" => "insert_subcategory.php", "datas" => $datas];
    }
}

function modSubcategory() {

    $subcategory = new Subcategory();
    $subcategory->setIdSubcategory($_REQUEST['id_subcategory']);
    $subcategory->setName($_POST["name"]);      
    $subcategory->setIdCategory($_POST["id_category"]);
    

    $subcategory->setIdAdmin($_SESSION['admin']['id_admin']); //on ajoute id_admin dans le modèle Subcategory????
    $subcategory->update();

    header("Location:mod_subcategory");
        
    $datas = [];
    return ["template" => "mod_subcategory.php", "datas" => $datas];
}


function delSubcategory() {

    $subcategory = new Subcategory();
    $subcategory->setIdSubcategory($_REQUEST["id_subcategory"]);

    $subcategory->delete();

    if($subcategory->getIdAdmin() == $_SESSION['admin']['id_admin']) {
        $subcategory->delete();
    }
     
    $datas = [];
    return ["template" => "del_subcategory.php", "datas" => $datas];
}


// function showAjax() {

//     sleep(5);
//     echo("<p>Contenu modifie</p>");
//     exit;
// }
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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link href="fonts\fontello\css\fontello.css" rel="stylesheet">
    </head>



<?php require "views/nav.php"; ?>
<?php require "views/{$view['template']}"; ?>

<div id="modContent"></div>


<?php require "views/footer.php"; ?>

<!-- <script src="js/jquery-3.4.1.js"></script>    
<script src="js/script.js"></script> -->
<script src="js/modal.js"></script>
<!-- <script src="js/ajax.js"></script> -->
</body>
</html>