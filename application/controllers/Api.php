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

            $type_identification = $_POST['type_identification'];
            $identification = $_POST['identification'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data = array(

                'type_identification' => $type_identification,
                'identification' => $identification,
                'name' => $name,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $password
            );
            // $data = json_encode($data_full);

            // $dataJson = file_get_contents('php://input');
            // $data = json_decode($dataJson);
            if (isset($data['type_identification']) && isset($data['identification']) && isset($data['name']) && isset($data['lastname']) && isset($data['email']) && isset($data['password'])) {
                // echo $type_identification;

                if ($data['type_identification'] == "" || $data['identification'] == "" || $data['name'] == "" || $data['lastname'] == "" ||  $data['email'] == "" || $data['password'] == "") {

                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo vacio", 'Message' => 'formato invalido, hay un campo vacio o tiene datos invalidos. Por favor valide');
                    echo json_encode($response);
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo Email invalido", 'Message' => 'formato invalido, El email debe tener @ y una extensión');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.(COM|NET|com|net|Com|Net)/", $data['email'])) {
                    header('content-type: application/json');
                    $response  = array("Error" => true, "title" => "Campo email debe tener una extensión", 'Message' => 'formato invalido, El email debe tener la extensión .com O .net, valide por favor');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $data['name']) || strlen($data['name']) > 40) {
                    header('content-type: application/json');
                    $response = array('Error' => true, 'Title' => 'Campo name', 'Message' => 'formato invalido, en el nombre');
                    echo json_encode($response);
                } elseif (!preg_match("/^[a-zA-Z ]*$/", $data['lastname']) || strlen($data['lastname']) > 40) {
                    header('content-type: application/json');
                    $response = array('Error' => true, 'Title' => 'Campo lastname', 'Message' => 'formato invalido, en el apellido');
                    echo json_encode($response);
                } else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z¡@#$%&?¿!]{8,16}$/', $data['password'])) {
                    header('content-type: application/json');
                    $response = array("Error" => true, "title" => "Campo Password", 'Message' => 'formato invalido, El password  debe tener entre 8 y 16 caracteres, un número y 2 caracteres especiales ¡@#$%&?¿!');
                    echo json_encode($response);
                } else if ($data['type_identification'] == "PAS" || $data['type_identification'] == "pas" || $data['type_identification'] == "Pas") {
                    //echo $data->identification;

                    if (strlen($data['identification']) > 10) {

                        header('content-type: application/json');
                        $response = array("Error" => true, "title" => "Identificación pasporte invalida",  'Message' => 'formato invalido, La identificacion para pasaporte supera los 10 caracteres permitidos. Por favor valide');
                        echo json_encode($response);
                    } else {

                        // $user = $this->UsersModel->getusers();
                        // $result = $user->query($user);
                        // if ($result->num_rows > 0) {
                        //     echo json_encode(array('Error' => true, "title" => "Usuario ya existe", 'Message' => 'Por favor verifique la identificación con la que se intenta registrar ya existe'));
                        // } else {
                            // query para enviar datos a la DB
                            $this->UsersModel->signUp($data);
                            header('content-type: application/json');
                            $response = array("Error" => false, "title" => "Usuario Guardado", 'Message' => 'Campos existen, User Guardado con satisfaccion');
                            echo json_encode($response);
                            $redirect = base_url().'Api';
                            header("location: $redirect");
                            
                        //}
                    }
                } else if ($data['type_identification'] == "CC" || $data['type_identification'] == "cc" || $data['type_identification'] == "Cc") {


                    if (is_numeric($data['identification'])) {

                        $this->UsersModel->signUp($data);
                        header('content-type: application/json');
                        $response = array("Error" => false, "title" => "Usuario Guardado", 'Message' => 'Campos existen, User Guardado con satisfaccion');
                        echo json_encode($response);
                        $redirect = base_url().'Api';
                        header("location: $redirect");
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
            $redirect = base_url().'Api';
            header("location: $redirect");
        } //fin del metodo

    }

    public function signIn()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $data = array(
                'email' => $email,
                'password' => $password
            );
            $users =  $this->UsersModel->getusers($data);
            if ($users != null) {
                header('conten-type: application/json');
                $response = array("usuario con" => $users);
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


    public function property()
    {
        $this->load->view('layouts/header');
        $this->load->view('property');
        $this->load->view('layouts/footer');
    }


    public function addproperty()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'POST') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);

            //validar que el campo exista
            if (isset($data->title) && (isset($data->type)) && (isset($data->address)) && (isset($data->rooms)) && (isset($data->price)) && (isset($data->area)) && (isset($data->id_user))) {

                //validar que el campo no vaya vació
                if (
                    $data->title == "" || $data->type == "" || $data->address == ""
                    || $data->rooms == "" || $data->price == "" || $data->area == ""
                    || $data->id_user == ""
                ) {

                    header('content-type: application/json');
                    $response = array('response' => 'campos vacios');
                    echo json_encode($response);
                    //validar que el campo si es numerico
                } elseif (is_numeric($data->rooms) &&  is_numeric($data->price) &&  is_numeric($data->area) &&  is_numeric($data->id_user)) {


                    $this->UsersModel->addproperty($data);
                    $response = array("Exitoso" => true, 'response' => 'Se inserto el registro de manera exitosa');
                    echo json_encode($response);
                } else {
                    header('content-type: application/json');
                    $response = array('response' => 'campo no numerico');
                    echo json_encode($response);
                }
            } else {
                header('content-type: application/json');
                $response = array('response' => 'no existe');
                echo json_encode($response);
            }
        } else {
            header('content-type: application/json');
            $response = array('response' => 'mal metodo');
            echo json_encode($response);
        }
    }

    public function deleteProperty()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'DELETE') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);

            if ($data->id == "" || ($data->id_user == "")) {
                echo json_encode(array('Error' => true, "title" => "Campos Vacios", 'Message' => 'Por favor valide el campo ID o ID_USER, puede estar vacio'));
            } else {

                if ($data->id == true && $data->id_user == true) {
                    $this->UsersModel->delete($data);
                    header('content-type: application/json');
                    $response = array('response' => 'register delete');
                    echo json_encode($response);
                } else {
                    header('content-type: application/json');
                    $response = array('response' => 'el id_user no esta permitido');
                    echo json_encode($response);
                }
            }
        } else {
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }


    public function listProperties()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);

            $result = $this->UsersModel->listProperties();
            header('content-type: application/json');
            $response = array('response' => $result);
            echo json_encode($response);
        } else {
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }

    public function getProperties()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);

            $result = $this->UsersModel->getProperties($data->id_user);
            header('content-type: application/json');
            $response = array('response' => $result);
            echo json_encode($response);
        } else {
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }

    

    public function updateProperty()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'PUT') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            if (isset($data->title) && (isset($data->type)) && (isset($data->address)) && (isset($data->rooms)) && (isset($data->price)) && (isset($data->area)) && (isset($data->id_user))) {

                if (
                    $data->title == "" || $data->type == "" || $data->address == ""
                    || $data->rooms == "" || $data->price == "" || $data->area == ""
                    || $data->id_user == ""
                ) {
                    header('content-type: application/json');
                    $response = array("Error" => false, "title" => "Campo vacio", 'Message' => 'formato invalido, hay un campo vacio o tiene datos invalidos. Por favor valide');
                    echo json_encode($response);
                } else {
                    //validar que el campo si es numerico
                    if (is_numeric($data->rooms) &&  is_numeric($data->price) &&  is_numeric($data->area) && is_numeric($data->id_user) && is_numeric($data->id)) {

                        $Register = $this->UsersModel->getPropertiesForId($data->id_user);
                        if ($Register != null) {
                            header('content-type: application/json');
                            $response = array("Error" => false, "title" => "Actualizacion", 'Message' => 'El id_user que desea actualizar no esta permito para la accion');
                            echo json_encode($response);
                        } else {
                            //$this->UsersModel->updateProperty($data);
                            header('content-type: application/json');
                            $response = array('response' => 'update completed');
                            echo json_encode($response);
                        }
                    } else {
                        header('conten-type: application/json');
                        $response = array("Error" => false, "title" => "Campo no valido", 'Message' => 'formato invalido, algun campo no es numerico. Por favor valide');
                        echo json_encode($response);
                    }
                }
            } else {
                header('content-type: application/json');
                $response = array('response' => 'el campo no existe');
                echo json_encode($response);
            }
        } else {
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }

    public function getSortedProperties()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $result = $this->UsersModel->getSortedProperties();
            if ($result != null) {
                header('content-type: application/json');
                $response = array('response' => $result);
                echo json_encode($response);
            } else {
                header('content-type: application/json');
                $response = array('response' => 'no se encontraron registros en la BD');
                echo json_encode($response);
            }
        } else {
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }

    public function getSortedUserProperties()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $dataJson = file_get_contents('php://input');
            $data = json_decode($dataJson);
            $result = $this->UsersModel->getSortedUserProperties($data->id_user);
            if ($result != null) {
                header('content-type: application/json');
                $response = array('response' => $result);
                echo json_encode($response);
            } else {
                header('content-type: application/json');
                $response = array('response' => 'el id no existe');
                echo json_encode($response);
            }
        } else {
            header('content-type: application/json');
            $response = array('response' => 'bad request');
            echo json_encode($response);
        }
    }
}
/* End of file Api.php */
