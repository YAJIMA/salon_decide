<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Items
 * @property Item_model $Item_model
 */
class Items extends CI_Controller {

    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Item_model');
        $this->load->helper('form');
        $this->data['title'] = 'サロン管理';
        $this->data['nav'] = 'items';

        if(! isset($_SESSION['login']) OR empty($_SESSION['login']))
        {
            header("Location: ".base_url("admin/login"));exit();
            //redirect ("/api/login");
        }
    }
    
    public function index($param=NULL)
    {
        $this->data['result'] = "";
        $this->data['items'] = $this->Item_model->view(NULL, "sort ASC");


        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/items', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function delete($id = NULL)
    {
        $this->Item_model->delete($id);
        header("Location: ".base_url("admin/items"));exit();
    }

    public function edit($id = 0)
    {
        $thisdata = $this->Item_model->view(array('id = ' . $id), "id ASC, sort ASC");

        $this->data['params'] = $this->Item_model->param_tree();

        $this->data['item'] = $thisdata[0];

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/items_edit', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function update($item_id = 0)
    {
        if( isset($_POST) && $item_id > 0 )
        {
            $this->Item_model->update_item($item_id);
        }

        header("Location: ".base_url("admin/items"));exit();
    }
    
    public function regist()
    {
        $this->data['result'] = "";
        


        $this->data['params'] = $this->Item_model->param_tree();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/items_regist', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function insert()
    {
        if(isset($_POST['name']))
        {
            $this->Item_model->insert_item();
        }
        header("Location: ".base_url("admin/items"));exit();
    }
}
