<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('login');
		$this->load->view('layouts/footer');
	}
    

    public function signUp()
    {
        
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            if (isset($data->type_identification) && isset($data->identification) && isset($data->name) && isset($data->lastname) && isset($data->email) && isset($data->password)) {

                if ($data->type_identification == "" || $data->identification == "" || $data->name == "" || $data->lastname == "" ||  $data->email == "" || $data->password == "") {

                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo vacio", 'Message' => 'formato invalido, hay un campo vacio o tiene datos invalidos. Por favor valide');
                    echo json_encode($response);
                } else if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo Email invalido", 'Message' => 'formato invalido, El email debe tener @ y una extensión');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.(COM|NET|com|net|Com|Net)/", $data->email)) {
                    header('content-type: application/json');
                    $response  = array("Error" => true, "title" => "Campo email debe tener una extensión", 'Message' => 'formato invalido, El email debe tener la extensión .com O .net, valide por favor');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $data->name) || strlen($data->name) > 40) {
                    header('content-type: application/json');
                    $response = array('Error' => true, 'Title' => 'Campo name', 'Message' => 'formato invalido, en el nombre');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $data->lastname) || strlen($data->lastname) > 40) {
                    header('content-type: application/json');
                    $response = array('Error' => true, 'Title' => 'Campo lastname', 'Message' => 'formato invalido, en el apellido');
                    echo json_encode($response);
                } else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z¡@#$%&?¿!]{8,16}$/', $data->password)) {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo Password", 'Message' => 'formato invalido, El password  debe tener entre 8 y 16 caracteres, un número y 2 caracteres especiales ¡@#$%&?¿!');
                    echo json_encode($response);
                } else if ($data->type_identification == "PAS" || $data->type_identification == "pas" || $data->type_identification == "Pas") {
                    //echo $data->identification;

                    if (strlen($data->identification) > 10) {

                        header('content-type: application/json');
                        $response = array("Error" => true, "title" => "Identificación pasporte invalida",  'Message' => 'formato invalido, La identificacion para pasaporte supera los 10 caracteres permitidos. Por favor valide');
                        echo json_encode($response);
                    } else {

                        $user = $this->UsersModel->getusers();
                        $result = $user->query($user);
                        if ($result->num_rows > 0) {
                            echo json_encode(array('Error' => true, "title" => "Usuario ya existe", 'Message' => 'Por favor verifique la identificación con la que se intenta registrar ya existe'));
                        } else {
                            // query para enviar datos a la DB
                            $this->UsersModel->signUp($data);
                            header('content-type: application/json');
                            $response = array("Error" => false, "title" => "Usuario Guardado", 'Message' => 'Campos existen, User Guardado con satisfaccion');
                            echo json_encode($response);
                        }
                    }
                } else if ($data->type_identification == "CC" || $data->type_identification == "cc" || $data->type_identification == "Cc") {

                    if (is_numeric($data->identification)) {

                        $this->UsersModel->signUp($data);
                        header('content-type: application/json');
                        $response = array("Error" => false, "title" => "Usuario Guardado", 'Message' => 'Campos existen, User Guardado con satisfaccion');
                        echo json_encode($response);
                    } else {

                        header('content-type: application/json');
                        $response = array("Error" => true, "title" => "Identificación cedula invalida",  'Message' => 'cedula debe ser númerica. Por favor valide');
                        echo json_encode($response);
                    }
                } else {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Identificación invalida",  'Message' => 'Solo cc o pas');
                    echo json_encode($response);
                }

            } else {
                header('content-type: application/json');
                $response = array("Error" => true, "title" => "Campos",  'Message' => 'Campo no existe');
                echo json_encode($response);
            } //fin del isset

        } else {
            header('content-type: application/json');
            $data = array('response' => 'bad request');
            echo json_encode($data);
        } //fin del metodo

    }

    public function signIn()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);

            

            $users =  $this->UsersModel->getusers($data);
            if ($users != null) {
                header('conten-type: application/json');
                $response = array("usuario con"=>$users);
                echo json_encode($response);
            } else {
                header('conten-type: application/json');
                $data = array('response' => 'registro no existe');
                echo json_encode($data);
            }
        } else {
            header('content-type: application/json');
            $data = array('response' => 'bad request');
            echo json_encode($data);
        }
    }
}
/* End of file Api.php */
