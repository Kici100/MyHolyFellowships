<?php

class Login
{
    private $error = "";

    public function evaluate($data)
    {
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            $row = $result[0];
            if ($password == $row['password']) {
                // Create session data
                $_SESSION['userid'] = $row['userid'];
            } else {
                $this->error .= "Wrong password.<br>";
            }
        } else {
            $this->error .= "This email has not been found.<br>";
        }

        return $this->error;
    }
    
    public function check_login($userid)
    {
        $query = "SELECT userid FROM users WHERE userid = '$userid' LIMIT 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result)
        {
            return true;
        }

        return false;
    }
}
