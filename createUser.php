<?php
define('ROOT_PATH', dirname(__DIR__));
function autoloader($class){
    $classPath = ROOT_PATH . "\CirySales\\${class}.php"; 
    echo ('Appel de la classe :' .$classPath.'<br>'   );
    if (file_exists($classPath)) {
        include_once $classPath;
    } else {
        throw new Exception("Classe inexistante");
    }
}
// Référencement de la fonction d'autochargement
spl_autoload_register("autoloader");

/*require_once('model/RequestManager.php');
require_once('model/TagDAO.php');
require_once('model/TagRequestDAO.php');
require_once('model/TagRequest.php'); */ 


   $UserDAO = new \model\AdminDAO();
    $user= new \model\User('','michel','Michel RIOU','michel@riou.fr','123','1');
     echo ('objet User  :' . var_dump($user));
    $result = $UserDAO->insertUser($user);
    $test=($result==1?'Cool':'Not cool');
    echo $test;
     //$UserDAO = new \model\UserDAO();
    $objet = $UserDAO->selectUser('supermichel3', '12345','yes');
    
    print_r($objet);
    var_dump($objet);
 
    ?>