<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class View
 * @property Item_model $Item_model
 */
class View extends CI_Controller {

    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Item_model');
        $this->load->helper('form');

        $this->data['title'] = 'クレジットカード';
        $this->data['nav'] = 'top';
    }
    
    public function index()
    {
        $data = array('result'=>NULL);

        // 最初は全てのデータを表示する
        $param = NULL;
        $sort = "";
        if ( isset($this->session->filter) )
        {
            foreach ($this->session->filter as $key => $val)
            {
                $param[] = '`'.$key.'` & '.$val.' != 0';
            }
        }

        // 並べ替え
        $sortcols = array('annual_due','examination','brand','pt_reduction_rate');
        $sortparam = "";
        foreach ($sortcols as $col)
        {
            if (isset($_GET[$col]))
            {
                switch (strtolower($_GET[$col]))
                {
                    case 'desc' :
                        $sort .= $col.' DESC,';
                        $sortparam = $col.'=desc';
                        break;
                    case 'asc' :
                    default :
                        $sort .= $col.' ASC,';
                        $sortparam = $col.'=asc';
                        break;
                }

            }
        }
        $sort .= 'sort ASC';


        $items = $this->Item_model->view($param, $sort);

        // パラメータ
        $this->data['params'] = $this->Item_model->param_tree();
        $this->data['items'] = $items;
        $this->data['sortparam'] = $sortparam;

        $this->load->view('header', $this->data);
        $this->load->view('headline', $this->data);
        $this->load->view('sidemenu', $this->data);
        $this->load->view('view', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function filter()
    {
        if (isset($_POST))
        {
            $param = array();
            $card_type = $annual_due = $examination = $brand = $pt_reduction_rate = $pt_exchange = $electronic_money = 0;
            $columns = array('card_type','annual_due','examination','brand','pt_reduction_rate','pt_exchange','electronic_money','');

            foreach ($columns as $col)
            {
                if (isset($_POST[$col]))
                {
                    foreach ($_POST[$col] as $val)
                    {
                        ${$col} += intval($val,10);
                    }
                    $param[$col] = ${$col};
                }
            }

            $this->session->filter = $param;

        }
        header("Location: ".base_url("view"));exit();
    }
}
