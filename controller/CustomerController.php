<?php

namespace controller;
/**
 * 
 */
class CustomerController extends Controller {

    private static $_instance = null;

    private function __construct() {
        
    }
/**
 * 
 * @return type CustomerController
 */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new CustomerController();
        }
        return self::$_instance;
    }

    /**
     * 
     * @param none
     */
    public function manageWebCustomer() {
        $this->getViewContent('webcustomer', array(), 'template');
    }

    /**
     * 
     * @param string $lastname
     * @param string $firstname
     * @param string $civility
     * @param string $address1
     * @param string $address2
     * @param string $zipcode
     * @param string $city
     * @param string $email
     * @param string $sms
     */
    public function addWebCustomer(string $lastname, string $firstname, string $civility, string $address1, string $address2, string $zipcode, string $city, string $email, string $sms) {
        $customerDAO = new \model\CustomerDAO();
        $objet = new \model\Customer();
        $objet->setCustomer_lastname($lastname);
        $objet->setCustomer_firstname($firstname);
        $objet->setCustomer_civility($civility);
        $objet->setCustomer_address1($address1);
        $objet->setCustomer_address2($address2);
        $objet->setCustomer_zipcode($zipcode);
        $objet->setCustomer_city($city);
        $objet->setCustomer_email($email);
        $objet->setCustomer_sms($sms);
        $result = $customerDAO->addWebCustomer($objet);
        // Pour requête AJAX
        echo $result;
    }

    /**
     * 
     * @param string $email
     */
    public function sendMailCustomer(string $email) {
        $contenu = "Votre inscription à été validée. Nous espérons vous voir lors de notre prochaine vente à Ciry Le Noble.\n\nCordialement.";
        $contenu = nl2br($contenu);
        $message = "<HTML>\n";
        $message .= "<HEAD>\n";
        $message .= "<META NAME\"GENERATOR\" Content=\"Microsoft DHTML Editing Control\">\n";
        $message .= "<TITLE></TITLE>\n";
        $message .= "</HEAD>\n";
        $message .= "<BODY><FONT face=Arial><FONT color=blue>";
        $message .= "<P><div align=\"center\"><STRONG><FONT size=5>Bonjour,</FONT></STRONG></div></P><div align=\"center\"><FONT color=blue><FONT face=\"Arial, Helvetica\" size\"2\">\n";
        $message .= $contenu;
        $message .= "</div></FONT></P>\n";
        $message .= "</BODY>\n";
        $message .= "</HTML>\n";
        $entetes = "From: \"ventescirylenoble.fr\" <contact@ventescirylenoble.fr>\n";
        $entetes .= "X-Sender: <contact@ventescirylenoble.fr>\n";
        $entetes .= "X-Mailer: PHP\n";
        $entetes .= "X-Priority: 1\n";
        $entetes .= "Return-path: <contact@ventescirylenoble.fr>\n";
        $entetes .= "Content-Type: text/html; charset=utf-8\n";
        mail($email, "INSCRIPTION A VENTESCIRYLENOBLE.FR", $message, $entetes);
    }

    /**
     * @param none
     */
    public function manageCustomer() {
        $this->getViewContent('manageCustomer', array(), 'template');
    }

    /**
     * 
     * @param string $name
     * @param string $email
     */
    public function listCustomerBy(string $name, string $email) {
        $CustomerDAO = new \model\CustomerDAO();
        if ($name !== '') {
            $customers = $CustomerDAO->selectByName($name, 'N');
            $customersExtend = $CustomerDAO->selectByName($name, 'O');
        } else {
            if ($email !== '') {
                $customers = $CustomerDAO->selectByEmail($email, 'N');
                $customersExtend = $CustomerDAO->selectByEmail($email, 'O');
            } else {
                $customers = $CustomerDAO->selectAll();
            }
        }
        $this->getViewContent('listFindCustomer', array(
            'customers' => $customers,
            'customersExtend' => $customersExtend), null);
    }

    /**
     * 
     * @param int $num
     */
    public function listLastCustomer(int $num) {
        $CustomerDAO = new \model\CustomerDAO();
        $customers = $CustomerDAO->listLastCustomer($num);
        $this->getViewContent('listLastCustomer', array(
            'customers' => $customers), null);
    }

    /**
     * 
     * @param type int $id
     */
    public function updateVisit(int $id) {
        $objet = new \model\Customer();
        $CustomerDAO = new \model\CustomerDAO();
        $objet = $CustomerDAO->selectOne($id);
        if ($objet != null) {
            $result = $CustomerDAO->updateVisit($objet);
        } else {
            $result = 0;
        }
        // Pour requête AJAX
        echo $result;
    }

    /**
     * 
     * @param type int $id
     * @param type string $civility
     * @param type string $lastname
     * @param type string $firstname
     * @param type string $address1
     * @param type string $address2
     * @param type string $zipcode
     * @param type string $city
     * @param type string $email
     * @param type string $sms
     * @param type int $suppression
     */
    public function updateCustomer(int $id, string $civility, string $lastname, string $firstname, string $address1, string $address2, string $zipcode, string $city, string $email, string $sms, int $suppression) {
        $objet = new \model\Customer();
        $CustomerDAO = new \model\CustomerDAO();
        $objet->setCustomer_id($id);
        $objet->setCustomer_civility($civility);
        $objet->setCustomer_lastname($lastname);
        $objet->setCustomer_firstname($firstname);
        $objet->setCustomer_address1($address1);
        $objet->setCustomer_address2($address2);
        $objet->setCustomer_zipcode($zipcode);
        $objet->setCustomer_city($city);
        $objet->setCustomer_email($email);
        $objet->setCustomer_sms($sms);
        $objet->setCustomer_suppression_flag($suppression);
        $result = $CustomerDAO->updateCustomer($objet);
        // Pour requête AJAX
        echo $result;
    }

}
