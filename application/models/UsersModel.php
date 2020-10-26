<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function signUp($userData){

        $this->db->insert("user",$userData);
    }

    
    public function getusers($data)
    {
       // consultar los  datos en la base de datos
    $response = $this->db->query("SELECT email,password FROM user WHERE email='{$data['email']}' && password='{$data['password']}'")->result();
        return $response;

    }


    public function addproperty($propertyData){
        $this->db->insert("properties",$propertyData);
    }

    public function delete($property){
    $response=$this->db->query("DELETE FROM properties WHERE id ={$property->id} && id_user={$property->id_user}");
        return $response;
    }

    public function listProperties(){
        $response = $this->db->query("SELECT * FROM properties ")->result();
        return $response;
    }

    public function getProperties($id_user){
        $response = $this->db->query("SELECT * FROM properties WHERE id_user= '{$id_user}'")->result();
        return $response;
    }

    public function getPropertiesForId($id){
        $response = $this->db->query("SELECT * FROM properties WHERE id ={$id}")->result();
        return $response;
    }

    public function updateProperty($property){
        $response = $this->db->query("UPDATE properties SET title='{$property->title}',
        type='{$property->type}', address='{$property->address}',rooms={$property->rooms},
        price={$property->price}, area={$property->area} WHERE  id= {$property->id} && id_user= {$property->id_user}");
        return $response;
    }

    public function getSortedProperties(){
        $response = $this->db->query("SELECT * FROM properties ORDER BY  price DESC")->result();
        return $response;
    }

    public function getSortedUserProperties($id_user){
        $response = $this->db->query("SELECT * FROM properties WHERE id_user='{$id_user}' ORDER BY  price DESC")->result();
        return $response;
    }

}

/* End of file ModelName.php */
