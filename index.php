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
        case "item": $view = showItem();
        break;
        case "brand": $view = showBrand();
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
        //TERMES
        case "termes": $view = showTermes();
        break;
        case "cgv": $view = showCgv();
        break;
        case "politique": $view = showPolitique();
        break;
        case "mentions": $view = showMentions();
        break;
        //LIENS
        case "liens": $view = showLiens();
        break;
        //ADMIN
        case "connectform": $view = showConnect();
        break;
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
    
}

function showHome() {
        
    // if(isset($_SESSION["admin"])) {
    //     header("Location:index.php?route=admin");
    // }
    $brands = new Brand();
    $datas["brands"] = $brands->selectAll();

    $cats = new Category();
    $datas["categories"] = $cats->selectAll();

    $subcats = new Subcategory();
    $datas["subcategories"] = $subcats->selectAll();

    return ["template" => "home.php", "datas" => $datas];
}

function showItem() {

    $item = new Item();
    $datas = $item->select();
    $datas["items"] = $item->selectByBrand();
    $datas["items"] = $item->selectByCategory();
    $datas["items"] = $item->selectBySubcategory();

    $datas = [
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
    $datas["brand"] = "DILEX";
    $datas["category"] = "Beauté";
    $datas["subcategory"] = "Lingettes";

    return ["template" => "item.php", "datas" => $datas];
}

//BRAND
function showBrand() {

    $brand = new Brand();
    $brand->setIdBrand($_GET["id"]);
    $datas["brand"] = $brand->select();

    return ["template" => "brand.php", "datas" => $datas];
}

//CAT
function showCategory() {

    $cat = new Category();
    $cat->setIdCategory($_GET["id_category"]);
    $datas ["categories"] = $cat->select();

    return ["template" => "category.php", "datas" => $datas];
    
}

//SUBCAT
function showSubcategory() {

    $subcat = new Subcategory();
    $subcat->setIdSubcategory($_GET["id_subcategory"]);
    $datas ["subcategories"] = $subcat->select();

    return ["template" => "subcategory.php", "datas" => $datas];
}

//CONTACT
function showContact() {
        
    $datas = [];
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
    // Redirection vers accueil
    //header("Location:index");
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

    return ["template" => "admin.php", "datas" => $datas];
}    

function insertItem() {

    var_dump($_POST);
    var_dump($_FILES);
    $image = "default.png";

    if(!empty($_FILES['image']['tmp_name'])) {
        $uploder = new UploadImage($_FILES['image'], 450, 450);
        $image = $uploder->set_image();
    }
    
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
        $item->setImage($image);
        

        $item->setIdAdmin($_SESSION['admin']['id_admin']);
        
        $item->insert();

        header("Location:index.php?route=admin");
        exit;
}

function modItem() {

    $item = new Item();
    var_dump($item);
    $item->setIdItem($_REQUEST['id_item']);
    $item->setName($_POST["name"]);
    $item->setDescription($_POST["description"]);
    $item->setPrice($_POST["price"]);
    $item->setAvis($_POST["avis"]);
    $item->setNote($_POST["note"]);
    $item->setIdBrand($_POST["id_brand"]);
    $item->setIdCategory($_POST["id_category"]);       
    $item->setIdSubcategory($_POST["id_subcategory"]);

    if(!empty($_FILES['image']['tmp_name'])) {
        var_dump('img');
        $uploder = new UploadImage($_FILES['image'], 450, 450);
        $item->setImage($uploder->set_image());
    }
    

    $item->setIdAdmin($_SESSION['admin']['id_admin']);
    $item->update();

   

    // header("Location:index.php?route=admin");
    // exit;
}

function delItem() {

    $item = new Item();
    $item->setIdItem($_REQUEST["id_item"]);

    $item->delete();

    if($item->getIdAdmin() == $_SESSION['admin']['id_admin']) {
        $image = $item->getImage();
        $item->delete();
        if($image != "default.png") {
            unlink("img/".$image); //Supprimer l'image
        }
    }

    header("Location:index.php?route=admin");
    exit;
}

function insertSubcategory() {

    if(!empty($_POST["name"]) && !empty($_POST["id_subcategory"]) && !empty($_POST["id_category"])) {

        $subcategory = new Subcategory();
        $subcategory->setName($_POST["name"]);
        $subcategory->setIdSubcategory($_POST["id_subcategory"]);
        $subcategory->setIdCategory($_POST["id_category"]);

        $subcategory->insert();
        
        header("Location:index.php?route=admin");
    exit;
    }

    header("Location:index.php?route=admin");
    exit;
}

function modSubcategory() {

    $subcategory = new Subcategory();
    $subcategory->setIdSubcategory($_REQUEST['id_subcategory']);
    $subcategory->setName($_POST["name"]);      
    $subcategory->setIdCategory($_POST["id_category"]);
    $subcategory->update();

    header("Location:index.php?route=admin");
    exit;       
}


function delSubcategory() {

    // Supprimer uniquement si elle est vide !!!
    if(empty($_POST["name"]) && empty($_POST["id_subcategory"]) && empty($_POST["id_category"])) {
        
    $subcategory = new Subcategory();
    $subcategory->setIdSubcategory($_REQUEST["id_subcategory"]);

    $subcategory->delete();
    }
    header("Location:index.php?route=admin");
    exit;
}

}

// function showAjax() {

//     sleep(5);
//     echo("<p>Contenu modifie</p>");
//     exit;
// }


function showFooter() {

    global $footer; 
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


<?php showMenu() ?>
<?php require "views/nav.php"; ?>

<?php require "views/{$view['template']}"; ?>

<div id="modContent"></div>

<?php showFooter() ?>
<?php require "views/footer.php"; ?>

<!-- <?php require "views/footer.php"; ?> -->

<!-- <script src="js/jquery-3.4.1.js"></script>    
<script src="js/script.js"></script> -->
<script src="js/modal.js"></script>
<!-- <script src="js/ajax.js"></script> -->
</body>
</html>