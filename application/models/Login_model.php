<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
    public function user_check($email,$password)
    {
        # code...
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query=$this->db->get('users');
        if($query->num_rows()==1){
            return true;
        }
        else{
            return false;
        }
    }
}