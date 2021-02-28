<?php
require_once 'pdoconfig.php';

if (isset($_POST['email'])){
    $email = $_POST['email'];
    $date = date("y-m-d");
}

class validation {
    public $result = "";

    function validate_form($email) {
        $reg = "/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/";
        $regCo ="/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([co]{2})$/";
    if (!$email) {
        $result = "Email address is required";
    } else if (preg_match($reg,$email) == false) {
        $result = 'Please provide a valid e-mail address';
    } else if (preg_match($regCo,$email)) {
        $result = 'We are not accepting subscriptions from Colombia emails';
    } else if (!isset($_POST['agreement'])){
        $result = 'You must accept the terms and conditions';
    } else {
        $result = "";
    }
    return $result;
    }
}

$valid = new validation;
if ($valid->validate_form($email) == ""){
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    $db->exec("set names utf8");
    $data = ['email' => $email, 'date' => $date]; 
    $query = $db->prepare("INSERT INTO $db_table (email, date) VALUES (:email, :date)");
    $query->execute($data);
} catch (PDOException $e) {
    die("Could not connect to the database $db_base :" . $e->getMessage());
}
}