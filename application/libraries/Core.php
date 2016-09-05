<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core {
    
    private $_CI; //в переменную заноситься ссылка на объект среды ci, через конструктор
    
    public function __construct()
    {
        $this->_CI =& get_instance();
    }
    
    //Костыль, через который будет формироваться страница на вывод
    public function Display($view, $data = array())
    {
        $this->_CI->load->view('header'); //файл предстовления шапки
        $this->_CI->load->view('modules/'.$view, $data); //файл предстовления контента
        $this->_CI->load->view('sidebar'); //представление боковой колнки
        $this->_CI->load->view('footer'); //представление подвала
    }

}