<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Model_ajax");
        //Подключаю модель контроллера и наследую конструктор
    }
    
    //Костыль для AJAX
    public function index() {
        //Резервируем место в ОП
        $data = array("status" => null);
        
        //Проверка на ключ action
        if(!$this->input->post('action'))
        {
            $data['status'] = 'error';
            $data['msg'] = 'Неверный запрос!';
            echo json_encode($data);
            return;
        }
        
        //Выбор нужного действия ajax
        switch($this->input->post('action')) {
            case 'addAuthor':
                if($this->input->post('name'))
                {
                    //Выполняем запрос и формируем ответ
                    $data['status'] = "success";
                    $data['result'] = $this->Model_ajax->add_author();
                }
                else {
                    $data['status'] = "error";
                    $data['msg'] = "Требуется аргумент `name`!";
                }
                
            break;
        }
        
        //Отправляем ответ
        echo json_encode($data);
    }
    
}