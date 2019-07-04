<?php

session_start();
define('ROOT_PATH', dirname(__DIR__));
include 'path.php';
/* define('DEFENSE_PATH', '\CirySales\\');
  define('ALWAYS_PATH', '/www/'); */

/**
 * AUTOLOADER : Référencement de la fonction d'autochargement
 */
function autoloader($class) {
    $classPath = ROOT_PATH . LOCAL_PATH . "${class}.php"; //defense
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $classPath);

    if (file_exists($classPath)) {

        include_once $classPath;
    } else {
        throw new Exception("Classe inexistante " . $classPath);
    }
}

spl_autoload_register("autoloader");

$manageAdmin = controller\AdminController::getInstance();
//if ($manageAdmin->controlSession()) {

/**
 * GESTION DES ROUTES
 */
try {
    $action = filter_input(INPUT_GET, "action");
    if ($action !== null) {
        switch ($action) {
            /**
             * ROUTE : Demande de déconnection
             */
            case 'disconnectUser':
                $manageAdmin->disconnectUser();

                break;
            case 'connectUser':
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                $manageAdmin->controlSession();

                break;

            case 'manageWebCustomer':
                /* $id = filter_input(INPUT_GET, "id");
                  if (filter_var($id, FILTER_VALIDATE_INT) !== false) { */
                $manageCustomer = controller\CustomerController::getInstance();
                $manageCustomer->manageWebCustomer();
                /* } else {
                  throw new Exception('Erreur dans la requête');
                  } */
                break;

            case 'addWebCustomer':
                $lastname = filter_input(INPUT_POST, "lastname");
                $firstname = filter_input(INPUT_POST, "firstname");
                $civility = filter_input(INPUT_POST, "civility");
                $address1 = filter_input(INPUT_POST, "address1");
                $address2 = filter_input(INPUT_POST, "address2");
                $zipcode = filter_input(INPUT_POST, "zipcode");
                $city = filter_input(INPUT_POST, "city");
                $email = filter_input(INPUT_POST, "email");
                $sms = filter_input(INPUT_POST, "sms");
                if (isset($lastname) && isset($firstname) && isset($email)) {
                    $manageCustomer = controller\CustomerController::getInstance();
                    $manageCustomer->addWebCustomer($lastname, $firstname, $civility, $address1, $address2, $zipcode, $city, $email, $sms);
                } else {
                    throw new Exception('Erreur de paramètre');
                }
                break;

            case 'manageContacts':


                $manageAdmin->manageContacts();
                /* } else {
                  throw new Exception('Erreur dans la requête');
                  } */
                break;
            case 'manageLocalisation':


                $manageAdmin->manageLocalisation();
                /* } else {
                  throw new Exception('Erreur dans la requête');
                  } */
                break;
            case 'sendMailCustomer':
                $email = filter_input(INPUT_POST, "email");
                $manageCustomer = controller\CustomerController::getInstance();
                $manageCustomer->sendMailCustomer($email);
                break;
            case 'manageCustomer':
                /* $id = filter_input(INPUT_GET, "id");
                  if (filter_var($id, FILTER_VALIDATE_INT) !== false) { */
                $manageCustomer = controller\CustomerController::getInstance();
                $manageCustomer->manageCustomer();
                /* } else {
                  throw new Exception('Erreur dans la requête');
                  } */
                break;
            case 'listLastCustomer':
                $num = filter_input(INPUT_POST, "num");
                $manageCustomer = controller\CustomerController::getInstance();
                $manageCustomer->listLastCustomer($num);
                break;
            case 'listCustomer':
                $name = filter_input(INPUT_POST, "byName");
                $email = filter_input(INPUT_POST, "byMail");
                if (isset($name) && isset($email) && filter_var($name, FILTER_SANITIZE_STRING) !== false && filter_var($email, FILTER_SANITIZE_STRING) !== false) {
                    $manageCustomer = controller\CustomerController::getInstance();
                    $manageCustomer->listCustomerBy($name, $email);
                } else {
                    throw new Exception('Erreur dans la rêquete listCustomer');
                }
                break;
            case 'updateVisit':
                $id = filter_input(INPUT_GET, "id");
                if (filter_var($id, FILTER_VALIDATE_INT) !== false) {
                    $manageCustomer = controller\CustomerController::getInstance();
                    $manageCustomer->updateVisit($id);
                } else {
                    throw new Exception('Erreur dans la rêquete updatVisit');
                }
                break;
            /**
             *  Traitement des routes non reconnues
             */
            default :
                throw new Exception('Aucun controleur défini');
        }
    } else {
        $manageAdmin->mainMenu();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
// }
?>
