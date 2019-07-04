<?php

namespace model;

class Customer {

    private $customer_id;
    private $customer_lastname;
    private $customer_firstname;
    private $customer_civility;
    private $customer_address1;
    private $customer_address2;
    private $customer_address3;
    private $customer_zipcode;
    private $customer_city;
    private $customer_country;
    private $customer_size;
    private $customer_email;
    private $customer_sms;
    private $customer_lastupdate;
    private $customer_creation;
    private $customer_last_visit;
    private $customer_validation_flag;
    private $customer_suppression;
    private $customer_suppression_flag;

    function __construct($customer_id = 0, $customer_lastname = '', $customer_firstname = '', $customer_civility = '', $customer_address1 = '', $customer_address2 = '', $customer_address3 = '', $customer_zipcode = '', $customer_city = '', $customer_country = '', $customer_size = '', $customer_email = '', $customer_sms = '', $customer_lastupdate = '', $customer_creation = '', $customer_last_visit = '', $customer_validation_flag = '', $customer_suppression = '', $customer_suppression_flag = '') {
        $this->customer_id = $customer_id;
        $this->customer_lastname = $customer_lastname;
        $this->customer_firstname = $customer_firstname;
        $this->customer_civility = $customer_civility;
        $this->customer_address1 = $customer_address1;
        $this->customer_address2 = $customer_address2;
        $this->customer_address3 = $customer_address3;
        $this->customer_zipcode = $customer_zipcode;
        $this->customer_city = $customer_city;
        $this->customer_country = $customer_country;
        $this->customer_size = $customer_size;
        $this->customer_email = $customer_email;
        $this->customer_sms = $customer_sms;
        $this->customer_lastupdate = $customer_lastupdate;
        $this->customer_creation = $customer_creation;
        $this->customer_validation = $customer_last_visit;
        $this->customer_validation_flag = $customer_validation_flag;
        $this->customer_suppression = $customer_suppression;
        $this->customer_suppression_flag = $customer_suppression_flag;
    }

    function getCustomer_id() {
        return $this->customer_id;
    }

    function getCustomer_lastname() {
        return $this->customer_lastname;
    }

    function getCustomer_firstname() {
        return $this->customer_firstname;
    }

    function getCustomer_civility() {
        return $this->customer_civility;
    }

    function getCustomer_address1() {
        return $this->customer_address1;
    }

    function getCustomer_address2() {
        return $this->customer_address2;
    }

    function getCustomer_address3() {
        return $this->customer_address3;
    }

    function getCustomer_zipcode() {
        return $this->customer_zipcode;
    }

    function getCustomer_city() {
        return $this->customer_city;
    }

    function getCustomer_country() {
        return $this->customer_country;
    }

    function getCustomer_size() {
        return $this->customer_size;
    }

    function getCustomer_email() {
        return $this->customer_email;
    }

    function getCustomer_sms() {
        return $this->customer_sms;
    }

    function getCustomer_lastupdate() {
        return $this->customer_lastupdate;
    }

    function getCustomer_creation() {
        return $this->customer_creation;
    }

    function getCustomer_last_visit() {
        return $this->customer_last_visit;
    }

    function getCustomer_validation_flag() {
        return $this->customer_validation_flag;
    }

    function getCustomer_suppression() {
        return $this->customer_suppression;
    }

    function getCustomer_suppression_flag() {
        return $this->customer_suppression_flag;
    }

    function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
        return $this;
    }

    function setCustomer_lastname($customer_lastname) {
        $this->customer_lastname = $customer_lastname;
        return $this;
    }

    function setCustomer_firstname($customer_firstname) {
        $this->customer_firstname = $customer_firstname;
        return $this;
    }

    function setCustomer_civility($customer_civility) {
        $this->customer_civility = $customer_civility;
        return $this;
    }

    function setCustomer_address1($customer_address1) {
        $this->customer_address1 = $customer_address1;
        return $this;
    }

    function setCustomer_address2($customer_address2) {
        $this->customer_address2 = $customer_address2;
        return $this;
    }

    function setCustomer_address3($customer_address3) {
        $this->customer_address3 = $customer_address3;
        return $this;
    }

    function setCustomer_zipcode($customer_zipcode) {
        $this->customer_zipcode = $customer_zipcode;
        return $this;
    }

    function setCustomer_city($customer_city) {
        $this->customer_city = $customer_city;
        return $this;
    }

    function setCustomer_country($customer_country) {
        $this->customer_country = $customer_country;
        return $this;
    }

    function setCustomer_size($customer_size) {
        $this->customer_size = $customer_size;
        return $this;
    }

    function setCustomer_email($customer_email) {
        $this->customer_email = $customer_email;
        return $this;
    }

    function setCustomer_sms($customer_sms) {
        $this->customer_sms = $customer_sms;
        return $this;
    }

    function setCustomer_lastupdate($customer_lastupdate) {
        $this->customer_lastupdate = $customer_lastupdate;
        return $this;
    }

    function setCustomer_creation($customer_creation) {
        $this->customer_creation = $customer_creation;
        return $this;
    }

    function setCustomer_last_visit($customer_last_visit) {
        $this->customer_last_visit = $customer_last_visit;
        return $this;
    }

    function setCustomer_validation_flag($customer_validation_flag) {
        $this->customer_validation_flag = $customer_validation_flag;
        return $this;
    }

    function setCustomer_suppression($customer_suppression) {
        $this->customer_suppression = $customer_suppression;
        return $this;
    }

    function setCustomer_suppression_flag($customer_suppression_flag) {
        $this->customer_suppression_flag = $customer_suppression_flag;
        return $this;
    }

}
