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
        $this->data['title'] = 'カード管理';
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
            $name = $_POST['name'];
            $pageurl = $_POST['pageurl'];
            $picurl = $_POST['picurl'];
            $sort = intval($_POST['sort'], 10);
            $card_type = $annual_due = $examination = $brand = $pt_reduction_rate = $pt_exchange = $electronic_money = 0;
            if (isset($_POST['card_type']))
            {
                foreach ($_POST['card_type'] as $val)
                {
                    $card_type += $val;
                }
            }
            if (isset($_POST['annual_due']))
            {
                foreach ($_POST['annual_due'] as $val)
                {
                    $annual_due += $val;
                }
            }
            if (isset($_POST['examination']))
            {
                foreach ($_POST['examination'] as $val)
                {
                    $examination += $val;
                }
            }
            if (isset($_POST['brand']))
            {
                foreach ($_POST['brand'] as $val)
                {
                    $brand += $val;
                }
            }
            if (isset($_POST['pt_reduction_rate']))
            {
                foreach ($_POST['pt_reduction_rate'] as $val)
                {
                    $pt_reduction_rate += $val;
                }
            }
            if (isset($_POST['pt_exchange']))
            {
                foreach ($_POST['pt_exchange'] as $val)
                {
                    $pt_exchange += $val;
                }
            }
            if (isset($_POST['electronic_money']))
            {
                foreach ($_POST['electronic_money'] as $val)
                {
                    $electronic_money += $val;
                }
            }

            $updata = array(
                'name' => $name,
                'pageurl' => $pageurl,
                'picurl' => $picurl,
                'card_type' => $card_type,
                'annual_due' => $annual_due,
                'examination' => $examination,
                'brand' => $brand,
                'pt_reduction_rate' => $pt_reduction_rate,
                'pt_exchange' => $pt_exchange,
                'electronic_money' => $electronic_money,
                'sort' => $sort
            );

            $this->db->where('id', $item_id);
            $this->db->update('items', $updata);
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
        if(isset($_POST['name'],$_POST['pageurl'],$_POST['picurl']))
        {
            $name = $_POST['name'];
            $pageurl = $_POST['pageurl'];
            $picurl = $_POST['picurl'];
            $sort = intval($_POST['sort'], 10);
            $card_type = $annual_due = $examination = $brand = $pt_reduction_rate = $pt_exchange = $electronic_money = 0;
            if (isset($_POST['card_type']))
            {
                foreach ($_POST['card_type'] as $val)
                {
                    $card_type += $val;
                }
            }
            if (isset($_POST['annual_due']))
            {
                foreach ($_POST['annual_due'] as $val)
                {
                    $annual_due += $val;
                }
            }
            if (isset($_POST['examination']))
            {
                foreach ($_POST['examination'] as $val)
                {
                    $examination += $val;
                }
            }
            if (isset($_POST['brand']))
            {
                foreach ($_POST['brand'] as $val)
                {
                    $brand += $val;
                }
            }
            if (isset($_POST['pt_reduction_rate']))
            {
                foreach ($_POST['pt_reduction_rate'] as $val)
                {
                    $pt_reduction_rate += $val;
                }
            }
            if (isset($_POST['pt_exchange']))
            {
                foreach ($_POST['pt_exchange'] as $val)
                {
                    $pt_exchange += $val;
                }
            }
            if (isset($_POST['electronic_money']))
            {
                foreach ($_POST['electronic_money'] as $val)
                {
                    $electronic_money += $val;
                }
            }

            $updata = array(
                'name' => $name,
                'pageurl' => $pageurl,
                'picurl' => $picurl,
                'card_type' => $card_type,
                'annual_due' => $annual_due,
                'examination' => $examination,
                'brand' => $brand,
                'pt_reduction_rate' => $pt_reduction_rate,
                'pt_exchange' => $pt_exchange,
                'electronic_money' => $electronic_money,
                'sort' => $sort
            );

            $this->db->insert('items', $updata);
        }
        header("Location: ".base_url("admin/items"));exit();
    }
}
