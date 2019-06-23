<?php

namespace model;

class CustomerDAO extends DBAccess {

    /**
     * 
     * @param int $id
     * @return object Form 
     */
    public function listLastCustomer($num) {
        $objets = array();
        try {
            $db = $this::getDBInstance();
            $req = $db->prepare('SELECT customers.* FROM customers  ORDER BY customer_lastupdate DESC LIMIT ? ');
            $req->bindValue(1, $num, \PDO::PARAM_INT);
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            
            while ($enr = $req->fetch()) {
                $objet = new Customer();
                $objet->setCustomer_id($enr['customer_id']);
                $objet->setCustomer_lastname($enr['customer_lastname']);
                $objet->setCustomer_firstname($enr['customer_firstname']);
                $objet->setCustomer_address1($enr['customer_address1']);
                $objet->setCustomer_address2($enr['customer_address2']);
                $objet->setCustomer_city($enr['customer_city']);
                $objet->setCustomer_zipcode($enr['customer_zipcode']);
                $objet->setCustomer_civility($enr['customer_civility']);
                $objet->setCustomer_country($enr['customer_country']);
                $objet->setCustomer_creation($enr['customer_creation']);
                $objet->setCustomer_lastupdate($enr['customer_lastupdate']);
                $objet->setCustomer_sms($enr['customer_sms']);
                $objets[] = $objet;
            }
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
        $req->closeCursor();
        return $objets;
    }

    /**
     * 
     * @param \model\Cutomer $objet
     * @return int 
     */
    public function addWebCustomer(Customer $objet) {
        $affectedRows = 0;
        try {
            $db = $this::getDBInstance();
            $req = $db->prepare('INSERT INTO customers (customer_lastname,customer_firstname,customer_civility,customer_address1,customer_address2,customer_zipcode,customer_city,customer_email,customer_sms) VALUES(?,?,?,?,?,?,?,?,?)');
            $req->bindValue(1, $objet->getCustomer_lastname(), \PDO::PARAM_STR);
            $req->bindValue(2, $objet->getCustomer_firstname(), \PDO::PARAM_STR);
            $req->bindValue(3, $objet->getCustomer_civility(), \PDO::PARAM_STR);
            $req->bindValue(4, $objet->getCustomer_address1(), \PDO::PARAM_STR);
            $req->bindValue(5, $objet->getCustomer_address2(), \PDO::PARAM_STR);
            $req->bindValue(6, $objet->getCustomer_zipcode(), \PDO::PARAM_STR);
            $req->bindValue(7, $objet->getCustomer_city(), \PDO::PARAM_STR);
            $req->bindValue(8, $objet->getCustomer_email(), \PDO::PARAM_STR);
            $req->bindValue(9, $objet->getCustomer_sms(), \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            $affectedRows = $req->rowcount();
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
            $affectedRows = -1;
        }
        $req->closeCursor();
        return $affectedRows;
    }

    /**
     * 
     * @param \model\Form $objet
     * @return int
     */
    public function updateForm(Form $objet) {
        $affectedRows = 1;
        try {
            //$db = $this->dbConnect();
            $db = $this::getDBInstance();
            $req = $db->prepare('UPDATE forms SET form_bu=?,form_name=?,form_designation=?,form_category=?,form_searchtype=?,form_validated=? WHERE form_id=?');
            $req->bindValue(1, $objet->getForm_bu(), \PDO::PARAM_INT);
            $req->bindValue(2, $objet->getForm_name(), \PDO::PARAM_STR);
            $req->bindValue(3, $objet->getForm_designation(), \PDO::PARAM_STR);
            $req->bindValue(4, $objet->getForm_category(), \PDO::PARAM_INT);
            $req->bindValue(5, $objet->getForm_searchtype(), \PDO::PARAM_INT);
            $req->bindValue(6, $objet->getForm_validated(), \PDO::PARAM_BOOL);
            $req->bindValue(7, $objet->getForm_id(), \PDO::PARAM_INT);
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            //$affectedRows = $req->rowcount();
        } catch (PDOException $e) {
            $affectedRows = -1;
        }
        $req->closeCursor();
        return $affectedRows;
    }

    /**
     * 
     * @param \model\Form $objet
     * @return int
     */
    public function deleteForm(Form $objet) {
        $affectedRows = 0;
        try {
            //$db = $this->dbConnect();
            $db = $this::getDBInstance();
            $req = $db->prepare('DELETE FROM forms WHERE form_id = ?');
            $req->bindValue(1, $objet->getForm_id(), \PDO::PARAM_INT);
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            $affectedRows = $req->rowcount();
        } catch (PDOException $e) {
            $affectedRows = -1;
        }
        $req->closeCursor();
        return $affectedRows;
    }

    /**
     * 
     * @param int $bu
     * @return Array 
     */
    public function selectAllQuestionsFromForm($bu, $form) {
        $db = $this::getDBInstance();
        //$db = $this->dbConnect();
        //$req = $db->prepare('SELECT forms.*,headers.*, request.* FROM forms left outer join headers on forms.form_id=headers.header_form left outer join request on headers.header_id = request.request_header WHERE `form_bu`= ? and form_id= ? order by headers.header_position asc , request.request_order asc');
        $req = $db->prepare('SELECT * FROM headers left outer join request on headers.header_id = request.request_header WHERE headers.header_bu= ? and headers.header_form= ? order by headers.header_position asc , request.request_order asc');
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->bindValue(1, $bu, \PDO::PARAM_INT);
        $req->bindValue(2, $form, \PDO::PARAM_INT);
        $req->execute();
        $questions = array();
        $questions = $req->fetchAll();
        $req->closeCursor();
        return $questions;
    }

    /**
     * 
     * @param int $id
     * @return object SearchType
     */
    public function selectOneSearchType($id) {

        $db = $this::getDBInstance();
        //$db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM searchtypes  WHERE searchtype_id= ? ');
        $req->bindValue(1, $id);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->execute();
        if ($enr = $req->fetch()) {
            $objet = new SearchType();
            $objet->setSearchtype_id($enr['searchtype_id']);
            $objet->setSearchtype_name($enr['searchtype_name']);
            $objet->setSearchtype_description($enr['searchtype_description']);
        } else {
            $objet = null;
        }
        $req->closeCursor();
        return $objet;
    }

    /**
     * 
     * @param type $id
     * @return Array
     */
    public function getQuiz($id) {
        $db = $this::getDBInstance();
        //$db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM forms LEFT OUTER JOIN headers ON forms.form_id = headers.header_form WHERE forms.form_id =? ORDER BY header_position ASC');
        $req->bindValue(1, $id, \PDO::PARAM_INT);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->execute();
        $headers = array();

        while ($enr = $req->fetch()) {
            $req2 = $db->prepare('SELECT request_libelle, request_id FROM request WHERE request_header = ? ORDER BY request_order');
            $req2->bindValue(1, $enr['header_id'], \PDO::PARAM_INT);
            $req2->setFetchMode(\PDO::FETCH_ASSOC);
            $req2->execute();
            $request = array();
            while ($enr2 = $req2->fetch()) {
                $request[] = $enr2['request_libelle'] . '#' . $enr2['request_id'];
            }
            $headers[] = array('header' => $enr['header_designation'] . '#' . $enr['header_name'], 'request' => $request);
        }
        $req->closeCursor();
        $req2->closeCursor();
        return $headers;
    }

    public function selectAllRequestsFromBU($bu) {
        $db = $this::getDBInstance();
        //$db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM request left outer join headers on header_id=request_header where header_bu = ? order by header_position asc');
        $req->execute(array($bu));
        $T_requests = array();
        $T_requests = $req->fetchAll();
        $req->closeCursor();
        return $T_requests;
    }

    /**
     * 
     * @param int $id
     * @return object Request
     */
    public function selectOneRequest($id) {

        $db = $this::getDBInstance();
        //$db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM request WHERE request_id = ? ');
        $req->bindValue(1, $id, \PDO::PARAM_INT);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->execute();
        if ($enr = $req->fetch()) {
            $objet = new Request();
            $objet->setRequest_id($enr['request_id']);
            $objet->setRequest_header($enr['request_header']);
            $objet->setRequest_order($enr['request_order']);
            $objet->setRequest_name($enr['request_name']);
            $objet->setRequest_libelle($enr['request_libelle']);
        } else {
            $objet = null;
        }
        $req->closeCursor();
        return $objet;
    }

    /**
     * 
     * @param none
     * @return Array Customer
     */
    public function selectAll() {
        $objets = array();
        try {
            $db = $this::getDBInstance();
            $sql = 'SELECT * FROM customers ORDER BY customer_lastname';
            $req = $db->prepare($sql);
            /* $req->bindValue(1, $bu);
              $req->bindValue(2, $validated); */
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            while ($enr = $req->fetch()) {
                $objet = new Customer();
                $objet->setCustomer_id($enr['customer_id']);
                $objet->setCustomer_lastname($enr['customer_lastname']);
                $objet->setCustomer_firstname($enr['customer_firstname']);
                $objet->setCustomer_civility($enr['customer_civility']);
                $objet->setCustomer_address1($enr['customer_address1']);
                $objet->setCustomer_address2($enr['customer_address2']);
                $objet->setCustomer_address3($enr['customer_address3']);
                $objet->setCustomer_zipcode($enr['customer_zipcode']);
                $objet->setCustomer_city($enr['customer_city']);
                $objet->setCustomer_country($enr['customer_country']);
                $objet->setCustomer_size($enr['customer_size']);
                $objet->setCustomer_email($enr['customer_email']);
                $objet->setCustomer_sms($enr['customer_sms']);
                $objet->setCustomer_lastupdate($enr['customer_lastupdate']);
                $objet->setCustomer_creation($enr['customer_creation']);
                $objet->setCustomer_validation($enr['customer_validation']);
                $objet->setCustomer_validation_flag($enr['customer_validation_flag']);
                $objet->setCustomer_suppression($enr['customer_suppression']);
                $objet->setCustomer_suppression_flag($enr['customer_suppression_flag']);
                $objets[] = $objet;
            }
        } catch (PDOException $e) {
            $objet = null;
            $objets[] = $objet;
        }
        $req->closeCursor();
        return $objets;
    }

    /**
     * 
     * @param string $name
     * @return Array Customer
     */
    public function selectByName($name) {
        $objets = array();
        try {
            $db = $this::getDBInstance();
            $sql = 'SELECT * FROM customers where customer_lastname = ? ORDER BY customer_firstname';
            $req = $db->prepare($sql);
            $req->bindValue(1, $name, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            while ($enr = $req->fetch()) {
                $objet = new Customer();
                $objet->setCustomer_id($enr['customer_id']);
                $objet->setCustomer_lastname($enr['customer_lastname']);
                $objet->setCustomer_firstname($enr['customer_firstname']);
                $objet->setCustomer_civility($enr['customer_civility']);
                $objet->setCustomer_address1($enr['customer_address1']);
                $objet->setCustomer_address2($enr['customer_address2']);
                $objet->setCustomer_address3($enr['customer_address3']);
                $objet->setCustomer_zipcode($enr['customer_zipcode']);
                $objet->setCustomer_city($enr['customer_city']);
                $objet->setCustomer_country($enr['customer_country']);
                $objet->setCustomer_size($enr['customer_size']);
                $objet->setCustomer_email($enr['customer_email']);
                $objet->setCustomer_sms($enr['customer_sms']);
                $objet->setCustomer_lastupdate($enr['customer_lastupdate']);
                $objet->setCustomer_creation($enr['customer_creation']);
                $objet->setCustomer_validation($enr['customer_validation']);
                $objet->setCustomer_validation_flag($enr['customer_validation_flag']);
                $objet->setCustomer_suppression($enr['customer_suppression']);
                $objet->setCustomer_suppression_flag($enr['customer_suppression_flag']);
                $objets[] = $objet;
            }
        } catch (PDOException $e) {
            $objet = null;
            $objets[] = $objet;
        }
        $req->closeCursor();
        return $objets;
    }

    /**
     * 
     * @param string $name
     * @return Array Customer
     */
    public function selectByEmail($email) {
        $objets = array();
        try {
            $db = $this::getDBInstance();
            $sql = 'SELECT * FROM customers where customer_email = ? ORDER BY customer_lastname';
            $req = $db->prepare($sql);
            $req->bindValue(1, $name, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            while ($enr = $req->fetch()) {
                $objet = new Customer();
                $objet->setCustomer_id($enr['customer_id']);
                $objet->setCustomer_lastname($enr['customer_lastname']);
                $objet->setCustomer_firstname($enr['customer_firstname']);
                $objet->setCustomer_civility($enr['customer_civility']);
                $objet->setCustomer_address1($enr['customer_address1']);
                $objet->setCustomer_address2($enr['customer_address2']);
                $objet->setCustomer_address3($enr['customer_address3']);
                $objet->setCustomer_zipcode($enr['customer_zipcode']);
                $objet->setCustomer_city($enr['customer_city']);
                $objet->setCustomer_country($enr['customer_country']);
                $objet->setCustomer_size($enr['customer_size']);
                $objet->setCustomer_email($enr['customer_email']);
                $objet->setCustomer_sms($enr['customer_sms']);
                $objet->setCustomer_lastupdate($enr['customer_lastupdate']);
                $objet->setCustomer_creation($enr['customer_creation']);
                $objet->setCustomer_validation($enr['customer_validation']);
                $objet->setCustomer_validation_flag($enr['customer_validation_flag']);
                $objet->setCustomer_suppression($enr['customer_suppression']);
                $objet->setCustomer_suppression_flag($enr['customer_suppression_flag']);
                $objets[] = $objet;
            }
        } catch (PDOException $e) {
            $objet = null;
            $objets[] = $objet;
        }
        $req->closeCursor();
        return $objets;
    }

    public function insertTagFromRequest($objet) {
        try {
            //print_r($objet);
            //  $db = $this->dbConnect();
            $db = $this::getDBInstance();
            $req = $db->prepare('INSERT INTO request_tags (request_id, tag_id, request_tag_sign, request_tag_value, request_tag_numeric) VALUES(?,?,?,?,?)');
            $req->bindValue(1, $objet->getRequest_id());
            $req->bindValue(2, $objet->getTag_id());
            $req->bindValue(3, $objet->getRequest_tag_sign());
            $req->bindValue(4, $objet->getRequest_tag_value());
            $req->bindValue(5, $objet->getRequest_tag_numeric());
            $req->execute();
            $liAffectes = $req->rowcount();
        } catch (PDOException $e) {
            $liAffectes = -1;
//echo $e->getMessage();
        }
        $req->closeCursor();

        return $liAffectes;
    }

    public function updateTagRequest(TagRequest $objet) {
        //  print_r($objet);
        $liAffectes = 1;
        try {
            //$db = $this->dbConnect();
            $db = $this::getDBInstance();
            $req = $db->prepare('UPDATE request_tags SET request_tag_sign=?, request_tag_value=?,request_tag_numeric=? WHERE request_tag_id=?');
            $req->bindValue(1, $objet->getRequest_tag_sign(), \PDO::PARAM_STR);
            $req->bindValue(2, $objet->getRequest_tag_value(), \PDO::PARAM_STR);
            $req->bindValue(3, $objet->getRequest_tag_numeric(), \PDO::PARAM_INT);
            $req->bindValue(4, $objet->getRequest_tag_id(), \PDO::PARAM_INT);
            $req->execute();
            //$liAffectes = $req->rowcount();
        } catch (PDOException $e) {
            $liAffectes = 0;
        }
        return $liAffectes;
    }

    public function deleteTagRequest($objet) {
        //  print_r($objet);
        $liAffectes = 0;
        try {
            //$db = $this->dbConnect();
            $db = $this::getDBInstance();
            $req = $db->prepare('DELETE FROM request_tags WHERE request_tag_id=?');
            $req->bindValue(1, $objet->getRequest_tag_id(), \PDO::PARAM_INT);
            $req->execute();
            $liAffectes = $req->rowcount();
        } catch (PDOException $e) {
            $liAffectes = 0;
        }
        return $liAffectes;
    }

    public function deleteQuestion(Header $objet) {
        $affectedRows = 0;
        try {
            //  $db = $this->dbConnect();
            $db = $this::getDBInstance();
            $req = $db->prepare('DELETE FROM headers WHERE header_id = ?');
            $req->bindValue(1, $objet->getHeader_id(), \PDO::PARAM_INT);
            $req->setFetchMode(\PDO::FETCH_ASSOC);
            $req->execute();
            $affectedRows = $req->rowcount();
        } catch (PDOException $e) {
            $affectedRows = -1;
        }
        return $affectedRows;
    }

}
