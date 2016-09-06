<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ajax extends CI_Model {
    
    public function add_author() {
        //Заносим имя в бд и экранизируем данные
        $data = array("name" => $this->input->post('name'));
        //Заносим в бд и возвращаем ID новой записи
        return ($this->db->insert("authors", $data))? $this->db->insert_id() : FALSE;
    }
    
}