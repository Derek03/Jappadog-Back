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
          ['field'=>'id', 'label'=>'Supplies Code', 'rules'=> 'required|integer'],
          ['field'=>'name', 'label'=>'Supplies Name', 'rules'=> 'required'],
          ['field'=>'instock', 'label'=>'Instock Amount', 'rules'=> 'required|integer'],
          ['field'=>'receiving', 'label'=>'Box Amount', 'rules'=> 'required|integer'],
          ['field'=>'measurement', 'label'=>'Amount Per Box', 'rules'=> 'required|integer'],
          ['field'=>'href', 'label'=>'Link Reference', 'rules'=> 'required']
      ];
      return $config;
    }
}
