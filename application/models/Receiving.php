<?php

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 09/12/16
 * Time: 2:45 PM
 */
class Receiving extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_tableName = 'receiving';
    }

    function rules()
    {
        $config = [
            ['field' => 'name', 'label' => 'Item name', 'rules' => 'required'],
            ['field' => 'description', 'label' => 'Item description', 'rules' => 'required|max_length[256]'],
            ['field' => 'price', 'label' => 'Item price', 'rules' => 'required|decimal'],
            ['field' => 'picture', 'label' => 'Item picture', 'rules' => 'required'],
            ['field' => 'category', 'label' => 'Menu category', 'rules' => 'required']
        ];
        return $config;
    }
}