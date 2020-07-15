<?php

class SessionSAdmin {

  private $id;
  public $username;
  private $last_login_sadmin;

  public const MAX_LOGIN_AGE = 60*60*24;

  public function get_id(){
    $ids=$this->id;
    return $ids;
  }

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($sadmin) {
    if($sadmin) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->id = $_SESSION['id'] = $sadmin->id_s;
      $this->username = $_SESSION['username'] = $sadmin->username;
      $this->last_login_sadmin = $_SESSION['last_login_sadmin'] = time();

    }
    return true;
  }

  public function is_logged_in() {
    // return isset($this->id);
    return (isset($this->id) && $this->last_login_is_recent());
  }

  public function logout() {
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['last_login_sadmin']);
    unset($this->id);
    unset($this->username);
    unset($this->last_login_sadmin);
    return true;
  }
  private function last_login_is_recent(){
    if (!isset($this->last_login_sadmin)) {
      return false;
    } elseif(($this->last_login_sadmin + self::MAX_LOGIN_AGE) < time()) {
      return false;
    }else{
    return true;
    }
  }

  private function check_stored_login() {
    if(isset($_SESSION['id'])) {
      $this->id = $_SESSION['id'];
      $this->username = $_SESSION['username'];
      $this->last_login_sadmin = $_SESSION['last_login_sadmin'];
    }
  }


}

?>
