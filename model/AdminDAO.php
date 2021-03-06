<?php

namespace model;

class AdminDAO extends DBAccess {

    /**
     * 
     * @param type $bu
     * @return type BusinessUnit
     */
    public function selectOneBu($bu) {
        $db = $this::getDBInstance();
        $req = $db->prepare('SELECT * FROM businessunit  WHERE bu_id= ?');
        $req->bindValue(1, $bu);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->execute();
        if ($enr = $req->fetch()) {
            $objet = new BusinessUnit();
            $objet->setBu_id($enr['bu_id']);
            $objet->setBu_name($enr['bu_name']);
        } else {
            $objet = null;
        }
        return $objet;
    }

    /**
     * 
     * @param type $pseudo
     * @param type $password
     * @param type $sha1
     * @return type User
     */
    public function selectUser($pseudo, $password, $sha1) {
        // $db = $this->dbConnect();
        $db = $this::getDBInstance();
        if (!$db->inTransaction()) {
            $db->beginTransaction();
        }
        if ($sha1=='yes') $password = sha1($password);
        $req = $db->prepare('SELECT * FROM users WHERE user_pseudo = ? '
                . 'and user_password= ? ');
        $req->bindValue(1, $pseudo);
        $req->bindValue(2, $password);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->execute();
        if ($enr = $req->fetch()) {
            $objet = new User();
            $objet->setUser_id($enr['user_id']);
            $objet->setUser_pseudo($enr['user_pseudo']);
            $objet->setUser_name($enr['user_name']);
            $objet->setUser_email($enr['user_email']);
            $objet->setUser_password($enr['user_password']);
            $objet->setUser_role($enr['user_role']);
            $db->commit();
        } else {
            $objet = null;
        }
        return $objet;
    }

    /**
     * 
     * @param type $objet
     * @return type int
     */
    public function insertUser($objet) {
        $rowAffected = 0;
        try {
            $db = $this::getDBInstance();
            // $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO users (user_pseudo,user_name,'
                    . 'user_email,user_password,user_role) '
                    . 'VALUES(?,?,?,?,?)');
            $req->bindValue(1, $objet->getUser_pseudo());
            $req->bindValue(2, $objet->getUser_name());
            $req->bindValue(3, $objet->getUser_email());
            $req->bindValue(4, $objet->getUser_password());
            $req->bindValue(5, $objet->getUser_role());
            $req->execute();
            $rowAffected = $req->rowcount();
        } catch (PDOException $e) {
            $rowAffected = -1;
        }
        return $rowAffected;
    }
    
    /**
     * 
     * @param type $id
     * @return type Role
     */
    public function selectOneRole($id) {
        $db = $this::getDBInstance();
        $req = $db->prepare('SELECT * FROM roles WHERE role_id = ?');
        $req->bindValue(1, $id, \PDO::PARAM_INT);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->execute();
        if ($enr = $req->fetch()) {
            $objet = new Roles();
            $objet->setRole_id($enr['role_id']);
            $objet->setRole_type($enr['role_type']);
        } else {
            $objet = null;
        }

        return $objet;
    }

    /**
     * 
     * @param type $id
     * @return type User
     */
    public function selectOneUser($id) {
        $db = $this::getDBInstance();
        $req = $db->prepare('SELECT * FROM users WHERE user_id = ?');
        $req->bindValue(1, $id, \PDO::PARAM_INT);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $req->execute();
        if ($enr = $req->fetch()) {
            $objet = new User();
            $objet->setUser_id($enr['user_id']);
            $objet->setUser_pseudo($enr['user_pseudo']);
            $objet->setUser_name($enr['user_name']);
            $objet->setUser_email($enr['user_email']);
            $objet->setUser_password($enr['user_password']);
            $objet->setUser_role($enr['user_role']);
        } else {
            $objet = null;
        }

        return $objet;
    }

    
}
