<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    function getUserData($email, $password)
    {
        $db_result = $this->db->select('*')
            ->from('users')
            ->where('email', $email)
            ->where('password', $password)
            ->get()
            ->row();
        return $db_result;
    }

    function storeUserData()
    {
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password1'));

        $this->db->insert('users', $data);
    }
}

?>