<?php

class Register_model extends CI_Model
{
    public function register()
    {
        $data = [
            'nama_adm' => htmlspecialchars($this->input->post('nama_adm', true)),
            'usnm' => htmlspecialchars($this->input->post('usnm', true)),
            'pwd_adm' => md5($this->input->post('pwd_adm')),


        ];


        $this->db->insert('admin', $data);
    }
}
