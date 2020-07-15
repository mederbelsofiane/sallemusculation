<?php

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"alert alert-danger\">";
    // $output .= "Please fix the following errors:";
    $output .= "Veuiller fixer les erreurs suivante :";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}
function require_login()
{
global $session_secretaire;
if(!$session_secretaire->is_logged_in()) {
  redirect_to('../secretaireLogin.php');
} else {
  // Do nothing, let the rest of the page proceed
}
}
function require_login_patient()
{
global $session_patient;
if(!$session_patient->is_logged_in()) {
  redirect_to('../patientLogin.php');
} else {
  // Do nothing, let the rest of the page proceed
}
}
function require_login_medecin()
{
global $session_medecin;
if(!$session_medecin->is_logged_in()) {
  redirect_to('../medecinLogin.php');
} else {
  // Do nothing, let the rest of the page proceed
}
}
function get_and_clear_session_message() {
  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}

function display_session_message() {
  $msg = get_and_clear_session_message();
  if(isset($msg) && $msg != '') {
    return '<div class="alert alert-success ml-5 mb-0 text-center">' . h($msg) . '</div>';
  }
}


?>
