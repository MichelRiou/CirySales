<?php
session_start();
define('ROOT_PATH', dirname(__DIR__));
define('DEFENSE_PATH', '\CirySales\\');
define('ALWAYS_PATH', '/www/');
/**
 * AUTOLOADER : Référencement de la fonction d'autochargement
 */
function autoloader($class) {
  $classPath = ROOT_PATH . DEFENSE_PATH."${class}.php"; //defense
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
                /**
                 * ROUTE : Demande d'identification
                 */
               // case 'connectUser':
                    /*$id = filter_input(INPUT_GET, "id");
                    if (filter_var($id, FILTER_VALIDATE_INT) !== false) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->manageQuiz($id);
                    } else {
                        throw new Exception('Erreur dans la requête');
                    }*/
                  //  $manageAdmin->controlSession();
                  //  break;*/    
                /**
                 * ROUTE : Utilisation du formulaire
                 */
                case 'manageQuiz':
                    $id = filter_input(INPUT_GET, "id");
                    if (filter_var($id, FILTER_VALIDATE_INT) !== false) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->manageQuiz($id);
                    } else {
                        throw new Exception('Erreur dans la requête');
                    }
                    break;
                /**
                 * ROUTE : Affichage résultat du formulaire de recherche
                 */
                case 'listProductSelection':
                    $bu = filter_input(INPUT_POST, "bu");
                    $category = filter_input(INPUT_POST, "category");
                    $listParams = filter_input(INPUT_POST, "params");
                    $searchtype = filter_input(INPUT_POST, "searchtype");
                    if (filter_var($bu, FILTER_VALIDATE_INT) !== false 
                            && filter_var($category, FILTER_VALIDATE_INT) !== false 
                            && filter_var($listParams, FILTER_DEFAULT) !== false 
                            && filter_var($searchtype, FILTER_VALIDATE_INT) !== false) {
                        $params = explode('-', $listParams);
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->listProductSelection($bu, $category, $params, $searchtype);
                    } else {
                        throw new Exception('Erreur dans la requête');
                    }
                    break;
                /**
                 * ROUTE : Affichage résultat sur liste des produits
                 */
                case 'listProductByCat':
                    $bu = $_SESSION['bu'];
                    $category = filter_input(INPUT_POST, "category");
                    if (isset($bu) && filter_var($category, FILTER_VALIDATE_INT) !== false) {
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->listProductByCat($bu, $category);
                    } else {
                        throw new Exception('Erreur dans la rêquete');
                    }
                    break;

                     case 'manageProductTag':
                    $bu = $_SESSION['bu'];
                    $id = filter_input(INPUT_GET, "id");
                    if (isset($bu) && filter_var($id, FILTER_VALIDATE_INT) !== false) {
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->manageProductTag($id, $bu);
                    } else {
                        throw new Exception('Aucun Id/BU spécifié');
                    }
                    break;

                case 'listProductTag':
                    $id = filter_input(INPUT_POST, "id");

                    if (filter_var($id, FILTER_VALIDATE_INT) !== false) {
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->listProductTag($id);
                    } else {
                        throw new Exception('Erreur dans la requête');
                    }
                    break;
                    
                case 'manageProduct':
                    $bu = $_SESSION['bu'];
                    if (isset($bu)) {
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->manageProduct($bu);
                    } else {
                        throw new Exception('Aucune BU spécifiée');
                    }
                    break;

                case 'manageProductImport':
                    $bu = $_SESSION['bu'];
                    if (isset($bu)) {
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->manageProductImport($bu);
                    } else {
                        throw new Exception('Erreur dans la rêquete');
                    }
                    break;

                case 'listProductImport':
                    $manageProduct = controller\ProductController::getInstance();
                    $manageProduct->listProductImport();
                    break;

                case 'listResponse':
                    $id = filter_input(INPUT_GET, "id");

                    if ($id != null) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->listResponse($id);
                    } else {
                        throw new Exception('Aucun Id spécifié');
                    }
                    break;
                  
                    
                    case 'addProduct':
                    $bu = $_SESSION['bu'];
                    $user = unserialize($_SESSION['user']);
                    $userId = $user->getUser_id();
                    $builderref = filter_input(INPUT_GET, "builderref", FILTER_SANITIZE_STRING);
                    $ref = filter_input(INPUT_GET, "ref", FILTER_SANITIZE_STRING);
                    $model = filter_input(INPUT_GET, "model", FILTER_SANITIZE_STRING);
                    $builder = filter_input(INPUT_GET, "builder", FILTER_SANITIZE_STRING);
                    $designation = filter_input(INPUT_GET, "designation", FILTER_SANITIZE_STRING);
                    $ean = filter_input(INPUT_GET, "ean", FILTER_SANITIZE_STRING);
                    $category = filter_input(INPUT_GET, "category");
                    if (isset($bu) && isset($userId) && (
                            filter_var($builderref, FILTER_DEFAULT) !== false && filter_var($ref, FILTER_DEFAULT) !== false && filter_var($model, FILTER_DEFAULT) !== false && filter_var($builder, FILTER_DEFAULT) !== false && filter_var($designation, FILTER_DEFAULT) !== false && filter_var($ean, FILTER_DEFAULT) !== false && filter_var($category, FILTER_VALIDATE_INT) !== false )) {
                        $manageProduct = controller\ProductController::getInstance();
                        $result = $manageProduct->addProduct($userId, $bu, $builderref, $ref, $model, $builder, $designation, $ean, $category);
                        echo $result;
                    } else {
                        throw new Exception('Erreur dans la rêquete');
                    }
                    break;
                    
                 case 'updateProduct':
                    $bu = $_SESSION['bu'];
                    $user = unserialize($_SESSION['user']);
                    $userId = $user->getUser_id();
                    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
                    $builderref = filter_input(INPUT_GET, "builderref", FILTER_SANITIZE_STRING);
                    $ref = filter_input(INPUT_GET, "ref", FILTER_SANITIZE_STRING);
                    $model = filter_input(INPUT_GET, "model", FILTER_SANITIZE_STRING);
                    $builder = filter_input(INPUT_GET, "builder", FILTER_SANITIZE_STRING);
                    $designation = filter_input(INPUT_GET, "designation", FILTER_SANITIZE_STRING);
                    $ean = filter_input(INPUT_GET, "ean", FILTER_SANITIZE_STRING);
                    $category = filter_input(INPUT_GET, "category");
                    if (isset($bu) && isset($userId) && (
                           filter_var($id, FILTER_VALIDATE_INT) !== false && filter_var($builderref, FILTER_DEFAULT) !== false && filter_var($ref, FILTER_DEFAULT) !== false && filter_var($model, FILTER_DEFAULT) !== false && filter_var($builder, FILTER_DEFAULT) !== false && filter_var($designation, FILTER_DEFAULT) !== false && filter_var($ean, FILTER_DEFAULT) !== false && filter_var($category, FILTER_VALIDATE_INT) !== false )) {
                        $manageProduct = controller\ProductController::getInstance();
                        $result = $manageProduct->updateProduct($userId, $bu,$id, $builderref, $ref, $model, $builder, $designation, $ean, $category);
                        echo $result;
                    } else {
                        throw new Exception('Erreur dans la rêquete');
                    }
                    break;

                
                    
               


                /// COUPURE ////



                case 'addProductTag':
                    $idProduct = filter_input(INPUT_GET, "idProduct");
                    $idTag = filter_input(INPUT_GET, "idTag");
                    $addAlpha = filter_input(INPUT_GET, "addAlpha", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                    $addNumeric = filter_input(INPUT_GET, "addNumeric");
                    if (filter_var($idProduct, FILTER_VALIDATE_INT) !== false && filter_var($idTag, FILTER_VALIDATE_INT) !== false && filter_var($addAlpha, FILTER_DEFAULT) !== false && filter_var($addNumeric, FILTER_DEFAULT) !== false) {
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->addProductTag($idProduct, $idTag, $addAlpha, $addNumeric);
                    } else {
                        throw new Exception('Erreur d\'appel du controleur addTag');
                    }
                    break;
                case 'manageQuestion':
                    $bu = $_SESSION['bu'];
                    $id = filter_input(INPUT_GET, "form");

                    if (isset($bu) && isset($id)) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->manageQuestion($id);
                    } else {
                        throw new Exception('Aucun formulaire spécifié');
                    }
                    break;
                case 'listQuestion':
                    $bu = $_SESSION['bu'];
                    $form = filter_input(INPUT_GET, "form");

                    if (isset($bu) && isset($form)) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->listQuestion($bu, $form);
                    } else {
                        throw new Exception('Aucune BU spécifiée');
                    }
                    break;
                case 'manageTag':
                    $bu = $_SESSION['bu'];
                    if (isset($bu)) {
                        $manageTag = controller\TagController::getInstance();
                        $manageTag->manageTag($bu);
                    } else {
                        throw new Exception('Aucune BU spécifiée');
                    }
                    break;
                case 'manageTagResponse':
                    $bu = $_SESSION['bu'];
                    $id = filter_input(INPUT_GET, "id");
                    //$bu = filter_input(INPUT_GET, "bu");
                    if (isset($id) && isset($bu)) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->manageTagResponse($id, $bu);
                    } else {
                        throw new Exception('Aucun Id/BU spécifié');
                    }
                    break;

                case 'deleteTag':
                    $id = filter_input(INPUT_GET, "id");
                    if (isset($id)) {
                        $manageTag = controller\TagController::getInstance();
                        $manageTag->deleteTag($id);
                    } else {
                        throw new Exception('Erreur de parametre');
                    }
                    break;
                //done
                case 'updateTag':
                    $id = filter_input(INPUT_GET, "id");
                    $designation = filter_input(INPUT_GET, "designation");
                    if (isset($id) && isset($designation)) {
                        $manageTag = controller\TagController::getInstance();
                        $manageTag->updateTag($id, $designation);
                    } else {
                        throw new Exception('Erreur de parametre');
                    }
                    break;
                //done
                case 'addTag':
                    $bu = $_SESSION['bu'];
                    $name = filter_input(INPUT_GET, "name");
                    $designation = filter_input(INPUT_GET, "designation");
                    if (isset($bu) && isset($name) && isset($designation)) {
                        $manageTag = controller\TagController::getInstance();
                        $manageTag->addTag($bu, $name, $designation);
                    } else {
                        throw new Exception('Erreur de paramètre');
                    }
                    break;
                case 'addResponse':
                    $idQuestion = filter_input(INPUT_GET, "idQuestion");
                    $addName = filter_input(INPUT_GET, "addName", FILTER_SANITIZE_STRING);
                    $addLibelle = filter_input(INPUT_GET, "addLibelle", FILTER_SANITIZE_STRING);
                    $addOrder = filter_input(INPUT_GET, "addOrder");
                    if (filter_var($idQuestion, FILTER_VALIDATE_INT) !== false && filter_var($addName, FILTER_DEFAULT) !== false && filter_var($addLibelle, FILTER_DEFAULT) !== false && filter_var($addOrder, FILTER_VALIDATE_INT) !== false) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->addResponse($idQuestion, $addName, $addLibelle, $addOrder);
                    } else {
                        throw new Exception('Erreur de paramètre');
                    }
                    break;

                case 'deleteQuestion':
                    $idQuestion = filter_input(INPUT_GET, "idQuestion");
                    if (filter_var($idQuestion, FILTER_VALIDATE_INT) !== false) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->deleteQuestion($idQuestion);
                    } else {
                        throw new Exception('Erreur de paramètre');
                    }
                    break;

                case 'addQuestion':
                    $bu = $_SESSION['bu'];
                    $idForm = filter_input(INPUT_POST, "idForm");
                    $addName = filter_input(INPUT_POST, "addName", FILTER_SANITIZE_STRING);
                    $addLibelle = filter_input(INPUT_POST, "addLibelle", FILTER_SANITIZE_STRING);
                    $addOrder = filter_input(INPUT_POST, "addOrder");
                    if (isset($bu) && filter_var($idForm, FILTER_VALIDATE_INT) !== false && filter_var($addName, FILTER_DEFAULT) !== false && filter_var($addLibelle, FILTER_DEFAULT) !== false && filter_var($addOrder, FILTER_VALIDATE_INT) !== false) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->addQuestion($idForm, $bu, $addName, $addLibelle, $addOrder);
                    } else {
                        throw new Exception('Erreur de paramètre');
                    }
                    break;

                case 'addTagRequest':
                    $idRequest = filter_input(INPUT_GET, "idRequest");
                    $idTag = filter_input(INPUT_GET, "idTag");
                    $addSign = filter_input(INPUT_GET, "addSign");
                    $addAlpha = filter_input(INPUT_GET, "addAlpha");
                    $addNumeric = filter_input(INPUT_GET, "addNumeric");
                    if (isset($idRequest) && isset($idTag) && isset($addSign) && (isset($addAlpha) || isset($addNumeric))) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->insertTagRequest($idRequest, $idTag, $addSign, $addAlpha, $addNumeric);
                    } else {
                        throw new Exception('Erreur d\'appel du controleur addTag');
                    }
                    break;
                case 'updateTagRequest':
                    $id = filter_input(INPUT_GET, "id");
                    $editSign = filter_input(INPUT_GET, "editSign");
                    $editAlpha = filter_input(INPUT_GET, "editAlpha");
                    $editNumeric = filter_input(INPUT_GET, "editNumeric");
                    if (isset($id)) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->updateTagRequest($id, $editSign, $editAlpha, $editNumeric);
                    } else {
                        throw new Exception('Erreur d\'appel du controleur updateTag');
                    }
                    break;
                case 'deleteTagRequest':
                    $id = filter_input(INPUT_GET, "id");
                    if (isset($id)) {
                        $manageQuiz = controller\QuizController::getInstance();
                        $manageQuiz->deleteTagRequest($id);
                    } else {
                        throw new Exception('Erreur d\'appel du controleur deleteTagRequest');
                    }
                    break;
                    
                    case 'updateTagProduct':
                    $id = filter_input(INPUT_GET, "id");
                    $editAlpha = filter_input(INPUT_GET, "editAlpha");
                    $editNumeric = filter_input(INPUT_GET, "editNumeric");
                    if (isset($id) && (isset($editAlpha) || isset($editNumeric)) ) {
                        $manageProduct = controller\ProductController::getInstance();
                        $manageProduct->updateTagProduct($id, $editAlpha, $editNumeric);
                    } else {
                        throw new Exception('Erreur d\'appel du controleur updateTagProduct');
                    }
                    break;

        /*        case 'disconnectUser':
                    $manageAdmin->disconnectUser();

                    break;
                case 'connectUser':
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                    $manageAdmin->connectUser();

                    break;   */

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
