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

    

}
