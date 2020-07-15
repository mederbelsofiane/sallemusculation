<?php include "databaseobject.class.php" ?>
<?php

class SAdmin extends DatabaseObject {

  static protected $table_name = "admin";
  static protected $db_columns = ['id', 'nom',
   'prenom',  'date_n', 'tel', 'email', 'username',
    'password', 'qst_s', 'photo'];

  public $id_secretaire;
  public $prenom_secretaire;
  public $nom_secretaire;
  public $username;
  public $date_de_naissance;
  public $sexe;
  public $telephone;
  public $image;
  public $email;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;

  public function __construct($args=[]) {
    $this->prenom_secretaire = $args['prenom_secretaire'] ?? '';
    $this->nom_secretaire = $args['nom_secretaire'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->date_de_naissance = $args['date_de_naissance'] ?? '';
    $this->sexe = $args['sexe'] ?? '';
    $this->telephone = $args['telephone'] ?? '';
    $this->image = $args['image'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name() {
    return $this->prenom_secretaire . " " . $this->nom_secretaire;
  }

  protected function set_hashed_password() {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  public function ajouter() {
    $this->validate();
    if(!empty($this->errors)) { return false; }
    $this->set_hashed_password();
    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id_secretaire = self::$database->insert_id;
    }
    return $result;
  }


  public function update() {
    if($this->password != '') {
      $this->set_hashed_password();
      // validate password
    } else {
      // password not being updated, skip hashing and validation
      $this->password_required = false;
    }

        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE " .static::$db_columns['0']. " = '"  . self::$database->escape_string($this->id_secretaire) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;

  }
  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE  " .static::$db_columns['0']. " = '" . self::$database->escape_string($this->id_secretaire) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function validate() {
    $this->errors = [];

    if(is_blank($this->prenom_secretaire)) {
      $this->errors[] = "le prenom est obligatoire, ne peut pas etre vide.";
    } elseif (!has_length($this->prenom_secretaire, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "prenom doit contenir de 2 à 255 characters.";
    }

    if(is_blank($this->nom_secretaire)) {
      $this->errors[] = "le nom est obligatoire, ne peut pas etre vide.";
    } elseif (!has_length($this->nom_secretaire, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "nom doit contenir de 2 à 255 characters.";
    }

    if(is_blank($this->email)) {
      $this->errors[] = "Email ne peut pas etre vide.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "l'email doit avoir moin de 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email doit avoir un format valide.";
    }

    if(is_blank($this->username)) {
      $this->errors[] = "Username ne peut pas etre vide.";
    } elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Username doit avoir de 8 à 255 characters.";
    } elseif (!has_unique_username($this->username, $this->id_secretaire ?? 0)) {
      $this->errors[] = "Username existe deja . veuiller le changer.";
    }

    if($this->password_required) {
      if(is_blank($this->password)) {
        $this->errors[] = "Password ne peut pas etre vide.";
      } elseif (!has_length($this->password, array('min' => 12))) {
        $this->errors[] = "Password doit contenir au moin 12 characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password doit avoir au moin une majiscul";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password doir avoir au moin une miniscule";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password doit avoir au moin un nombre";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors[] = "Password doit avoir au moin un symbol";
      }

      if(is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password ne peut pas etre vide.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors[] = "Password et confirm password doivent etre identique.";
      }
    }

    return $this->errors;
  }

  static public function find_by_username($username) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

}

?>
