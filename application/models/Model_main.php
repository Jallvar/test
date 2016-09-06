<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model {
    
    public function get_books($id = 0) {
        $where = ($id < 1) ? null : " WHERE `id` = '".$id."'";
        $query = $this->db->query("SELECT `id`,`name`,`date` FROM `book`".$where);
        
        if($query->num_rows() < 1)
            return FALSE;
        
        $rows = $query->result_array();
        for($i = 0; $i < sizeof($rows); $i++)
        {
            $sub_query = $this->db->query("SELECT  `t2`.`id`, `t2`.`name` 
                                           FROM  `books` AS  `t1` 
                                           JOIN  `authors` AS  `t2` ON  `t2`.`id` =  `t1`.`author` 
                                           WHERE  `t1`.`book` = '".$rows[$i]['id']."'");
            
            if($sub_query->num_rows() < 1)
                return FALSE;
            
            $rows[$i]['authors'] = $sub_query->result_array();
        }
        
        //Выборка книг + подключение справочника authors и выборка из него нужного автора
        //Если записей нет, возвращаем булевую FALSE
        return $rows;
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
        if($this->db->simple_query("DELETE FROM `book` WHERE `id` = '".$id."'"))
            return $this->db->simple_query("DELETE FROM `books` WHERE `book` = '".$id."'");
    }
    
    public function get_book($id)
    {
        $buff = $this->get_books($id);
        return $buff[0];
    }
    
    public function add_book()
    {
        //Вставка в бд новую книгу
        $data = array("name" => $this->input->post('bookname'),
                      "date" => microtime(TRUE));
        
        if(!$this->db->insert('book', $data))
            return FALSE;
        
        $book = $this->db->insert_id();
        $data2 = array();
        foreach($this->input->post('author') as $author) {
            
            $data2 = array("book" => $book,
                           "author" => $author);
            
            $this->db->insert('books', $data2);
        }
    }
    
    public function edit_book($id)
    {
        //Вставка в бд новую книгу
        $data = array("name" => $this->input->post('bookname'),
                      "date" => microtime(TRUE));
        
        $this->db->where('id', $id);
        
        if(!$this->db->update('book', $data))
            return FALSE;
        
        $data2 = array();
        
        
        $this->db->simple_query("DELETE FROM `books` WHERE `book` = '".$id."'");
        
        foreach($this->input->post('author') as $author) {
            
            $data2 = array("book" => $id,
                           "author" => $author);
            
            $this->db->insert('books', $data2);
            
        }
    }
    
    public function truncate() {
        $this->db->simple_query("TRUNCATE TABLE `books`");
        $this->db->simple_query("TRUNCATE TABLE `authors`");
    }
    
}