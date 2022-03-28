<?php

require 'cliente.php';

class Data{
    private $con;
    private $host;
    private $user;
    private $pass;
    private $base;
    private $port;

    public function __construct(){

        $this -> host = "localhost";
        $this -> user = "root";
        $this -> pass = "";
        $this -> base = "sistema_poo";
        $this -> port = "3306";
    }

    public function connect(){
        $this->con = new mysqli($this->host,$this->user,$this->pass,$this->base,$this->port);
        if($this->con->connect_error){
            die("No se logro la conexión: ".$this->con->connect_error);
        }else{
            return $this->con;
        }
    }

    public function create(Cliente $objCliente){

        $nombre=$this->connect()->real_escape_string($objCliente->getNombre());
        $apellido=$this->connect()->real_escape_string($objCliente->getApellido());
        $direccion=$this->connect()->real_escape_string($objCliente->getDireccion());
        $telefono=$this->connect()->real_escape_string($objCliente->getTelefono());
        $correo=$this->connect()->real_escape_string($objCliente->getCorreo());

        //verificar si exite
        $sql= "SELECT * FROM clientes WHERE CORREO = '$correo';";

        $res = $this->connect()->query($sql);

        if($res->num_rows>0){
            return false;
        }else{

            $sql= "INSERT INTO clientes VALUES( DEFAULT, '$nombre','$apellido','$telefono','$direccion','$correo');";

            $res = $this->connect()->query($sql);
    
            if($res==1){
                return true;
            }else{
                return false;
            }

        }


    }


    public function list(){

        $datos = array();

        //verificar si exite
        $sql= "SELECT * FROM clientes;";

        $res = $this->connect()->query($sql);

        if($res->num_rows>0){
            while($fila = $res->fetch_object()){
                $datos[]= $fila;
            }
        }

        return $datos;
    }

    public function delete($id){

        $id=$this->connect()->real_escape_string($id);
        //verificar si exite
        $sql= "DELETE FROM clientes WHERE id = $id;";

        $res = $this->connect()->query($sql);

        if($res) {
                return true;
            }else{
                return false;
            
            }
            


    }
    

}

?>