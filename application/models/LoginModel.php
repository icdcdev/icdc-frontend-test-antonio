<?php

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private $table = "student";
    public function verify_access($email,$password){
        $where = [
            "email" => $email
        ];
        $this->db->select("firtsName,lastName,password,email,status");
        $this->db->where($where);
        $this->db->from($this->getTable());
        $query = $this->db->get();

        if ($query->num_rows()) {
                $pass = $query->result()[0]->password;
                return password_verify($password,$pass)?$query->result():false;
            } else {
                return false;
            }
        }
    public function getTable(){
        return $this->table;
    }
}