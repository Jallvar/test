<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model {
    
    public function get_books() {
        $query = $this->db->query("SELECT  `b`.`name` ,  `b`.`id` ,  `b`.`date` ,  `a`.`name` AS  `author` 
FROM  `books` AS  `b` 
JOIN  `authors` AS  `a` ON  `b`.`author` =  `a`.`id` ");
        //Выборка книг + подключение справочника authors и выборка из него нужного автора
        //Если записей нет, возвращаем булевую FALSE
        return ($query->num_rows() < 1) ? FALSE : $query->result_array();
    }
    
    public function get_authors() {
        //Выбираем всех авторов и возвращаем
        //Если записей нет, возвращаем булевую FALSE
        $query = $this->db->get("authors");
        return ($query->num_rows() < 1) ? FALSE : $query->result_array();
    }
    
    public function delete_book($id = FALSE) {
        if(!$id)
            return FALSE;
        //Удаляем книгу с указанным ID
        return $this->db->simple_query("DELETE FROM `books` WHERE `id` = '".$id."'");
    }
    
    public function get_book($id)
    {
        //Выбираем поля имя, автор, id(да-да, это может быть странно..) и выбираем по id
        $this->db->select("name, author, id");
        $this->db->where("id", $id);
        $query = $this->db->get("books");
        if($query->num_rows() < 1)
            return FALSE;
        
        //т.к. массив разбит на записи. в отдельных индаксах. заведем еще одну переменную
        $buff = $query->result_array();
        return $buff[0];
    }
    
    public function add_book()
    {
        //Вставка в бд новую книгу
        $data = array("name" => $this->input->post('bookname'),
                      "author" => $this->input->post('author'),
                      "date" => microtime(TRUE));
        return $this->db->insert('books', $data);
    }
    
    public function edit_book($id)
    {
        //Вставка в бд новую книгу
        $data = array("name" => $this->input->post('bookname'),
                      "author" => $this->input->post('author'));
        
        //По ID
        $this->db->where('id', $id);
        
        return $this->db->update('books', $data);
    }
    
    public function truncate() {
        $this->db->simple_query("TRUNCATE TABLE `books`");
        $this->db->simple_query("TRUNCATE TABLE `authors`");
    }
    
}