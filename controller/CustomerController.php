<?php

namespace controller;

class CustomerController extends Controller {

    private static $_instance = null;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new CustomerController();
        }
        return self::$_instance;
    }

    /**
     * AFFICHAGE DES FORMULAIRES - MAIN
     * @param int $bu
     */
    public function manageWebCustomer() {
        $this->getViewContent('webcustomer', array(), 'template');
    }

    public function addWebCustomer($lastname, $firstname, $civility, $address1, $address2, $zipcode, $city, $email, $sms) {

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
        //return $result;
    }

    public function sendMailCustomer($email) {
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

    public function manageCustomer() {
        $this->getViewContent('manageCustomer', array(), 'template');
    }

    public function listCustomerBy($name, $email) {
        $CustomerDAO = new \model\CustomerDAO();
        if ($name !== '') {
            $customers = $CustomerDAO->selectByName($name);
        } else {
            if ($email !== '') {
                $customers = $CustomerDAO->selectByEmail($email);
            } else {
                $customers = $CustomerDAO->selectAll();
            }
        }
        $this->getViewContent('listFindCustomer', array(
            'customers' => $customers), null);
    }
        public function listLastCustomer($num) {
        $CustomerDAO = new \model\CustomerDAO();
        $customers = $CustomerDAO->listLastCustomer($num);
        $this->getViewContent('listLastCustomer', array(
            'customers' => $customers), null);
    }

}
