<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: lacie
 * Date: 09/12/16
 * Time: 2:50 PM
 */

require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class Supplies extends Rest_controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index_get()
    {
        $key = $this->get('id');
        if(!$key)
        {
            $this->response($this->Receiving->all(), 200);
        } else {
            $result = $this->Receiving->get($key);
            if($result != null)
            {
                $this->response($result, 200);
            } else {
                $this->response(array('error' => 'Receiving item not found!'), 404);
            }
        }
    }

    // Handle an incoming GET to return 1
    function item_get()
    {
        $key = $this->get('id');
        $result = $this->Receiving->get($key);
        if ($result != null)
            $this->response($result, 200);
        else
            $this->response(array('error' => 'Receiving item not found!'), 404);
    }

    // Handle an incoming POST - add a new menu item
    function index_post()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        if ($this->validateFormInput($record, false))
        {
            $this->Receiving->add($record);
            $this->response(array('New item created', $record), 200);
        } else
        {
            $this->response(array('Invalid input'), 404);
        }
        //$this->Receiving->add($record);
        //$this->response(array('ok'), 200);
    }

    // Handle an incoming POST - add a new menu item
    /* REMOVED UNTIL NEEDED
    function item_post()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->Receiving->add($record);
        $this->response(array('ok'), 200);
    }
    */
    // Handle an incoming PUT - update a menu item
    function index_put()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $this->_put_args);
        if ($this->validateFormInput($record, true))
        {
            $this->Receiving->update($record);
            $this->response(array('Updated record', $record), 200);
        } else
        {
            $this->response(array('Failed to update record', $record), 404);
        }
        //$this->Receiving->update($record);
        //$this->response(array('ok', $record), 200);
    }

    // Handle an incoming DELETE
    function item_delete()
    {
        $key = $this->get('id');
        $this->Receiving->delete($key);
        $this->response(array('ok', $key), 200);
    }

    function validateFormInput($input, $idRequired)
    {
        $required = ["name", "instock", "receiving", "measurement", "href"];
        if ($idRequired)
        {
            array_push($required, "id");
        }
        $valid = true;
        foreach ($required as $key)
        {
            if ( !(array_key_exists($key, $input)))
                $valid = false;
        }
        return $valid;
    }
}