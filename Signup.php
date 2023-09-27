<?php

class Signup
{
  private $error = "";
  private $db;



 
 

public function evaluate($data)
{
    foreach ($data as $key => $value) {
        if (empty($value)) {
            $this->error = $this->error . $key . " is empty!<br>";
        } elseif ($key == "email") {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->error = $this->error . "Invalid email!<br>";
            }
        } elseif ($key == "first_name") {
            if (is_numeric($value)) {
                $this->error = $this->error . "First name can't be a number!<br>";
            } elseif (str_word_count($value) > 1) {
                $this->error = $this->error . "First name can't contain spaces!<br>";
            }
        } elseif ($key == "last_name") {
            if (is_numeric($value)) {
                $this->error = $this->error . "Last name can't be a number!<br>";
            }
        }
    }

    if ($this->error == "") {
        $this->create_user($data);
    } else {
        return $this->error;
    }
}

  public function create_user($data)
  { 
    $first_name = ucfirst($data['first_name']);
    $last_name =ucfirst( $data['last_name']);
    $gender = $data['gender'];
    $email = $data['email'];
    $password = $data['password'];

    // Create user-specific data
    $url_address = strtolower($first_name) . "." . strtolower($last_name);
    $userid = $this->create_userid();

    // Create and execute the SQL query using prepared statements
    $query = "INSERT INTO users 
              (userid, first_name, last_name, gender, email, password, url_address)
              VALUES
              ('$userid', '$first_name', '$last_name', '$gender', '$email', '$password',
                '$url_address')";

    $DB = new Database();
    $DB -> save($query);
  }

  private function create_userid()
  {
    $length = rand(4, 19);
    $number = '';
    
    for ($i = 0; $i < $length; $i++) {
      $new_rand = rand(0, 9);
      $number = $number . $new_rand;
    }
    
    return $number;
  }
}
