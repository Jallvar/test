<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Адреса сокращены. через config/routes

class Main extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Model_main");
        //Подключаю модель контроллера и наследую конструктор
    }
    
    public function index() {
        $data = array("books" => $this->Model_main->get_books());
        //Выбираю список книг и автора
        $this->core->Display("books_list", $data);
        //Передаю на вывод
    }
    
    public function delete($id)
    {
        $this->Model_main->delete_book($id);
        redirect(base_url());
    }
    
    public function add()
    {
        $data = array("authors" => $this->Model_main->get_authors());
        //Выборка всех авторов
        //Библиотека для проверки форм и установка правил
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bookname', 'Название книги', 'required|min_length[4]');
        $this->form_validation->set_rules('author', 'Автор', 'required');
        
        //Если форма не отправлена или входящие данные не подходят по правилам
        //Выводим форму и сообщение об ошибке (если требуется)
        if ($this->form_validation->run() == FALSE)
        {
            $this->core->Display("book_add", $data);
        }
        else
        {
            //Добавляю книгу
            $this->Model_main->add_book();
            //Добавили? Редирект!
            redirect(base_url());
        }
    }
    
    //Почти аналогично процедуре высше
    public function edit($id)
    {
        //Выбираем книгу из дб. если не найдена. редирект на главную
        $data = array("book" => $this->Model_main->get_book($id));
        if(!$data)
        {
            redirect(base_url());
            return;
        }
        
        $data['authors'] = $this->Model_main->get_authors();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bookname', 'Название книги', 'required|min_length[4]');
        $this->form_validation->set_rules('author', 'Автор', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->core->Display("book_edit", $data);
        }
        else
        {
            $this->Model_main->edit_book($id);
            redirect(base_url());
        }
    }
    
    public function truncate()
    {
        $this->Model_main->truncate();
        redirect(base_url());
    }
    
}