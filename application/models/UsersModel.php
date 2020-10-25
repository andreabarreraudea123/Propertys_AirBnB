<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function signUp($userData){

        $this->db->insert("user",$userData);
    }





    public function getusers($data)
    {
        // consultar los  datos en la base de datos
    $response = $this->db->query("SELECT email,password FROM user WHERE email='{$data->email}' && password='{$data->password}'")->result();
        return $response;
    }

}

/* End of file ModelName.php */
