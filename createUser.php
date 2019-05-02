<?php
define('ROOT_PATH', dirname(__DIR__));
define('DEFENSE_PATH', '\CirySales\\');
define('ALWAYS_PATH', '/www/');
define ('DB_ACCESS', 'connect_1');
function autoloader($class){
    $classPath = ROOT_PATH . ALWAYS_PATH."${class}.php"; 
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $classPath);
    echo ('Appel de la classe :' .$classPath.'<br>'   );
    if (file_exists($classPath)) {
        include_once $classPath;
    } else {
        throw new Exception("Classe inexistante");
    }
}
// Référencement de la fonction d'autochargement
spl_autoload_register("autoloader");
echo ("autoloader chargé<br>");
   $UserDAO = new \model\AdminDAO();
   echo ("userDAO chargé<br>");
    $user= new \model\User('','sylvie','sylvie G','m.riou@mdaparis.fr','123','3');
    echo ("user chargé<br>");
     echo ("objet User  :" . var_dump($user));
    $result = $UserDAO->insertUser($user);
    $test=($result==1?"Cool":"Not cool");
    echo $test;
     //$UserDAO = new \model\UserDAO();
    $objet = $UserDAO->selectUser('michel', '123','yes');
    
    print_r($objet);
    var_dump($objet);
 
    ?>