<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class View
 * @property Item_model $Item_model
 */
class View extends CI_Controller {

    public $data = array();

    private $params;
    private $extend_params;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Item_model');
        $this->load->helper('form');

        $this->data['title'] = 'クレジットカード';
        $this->data['nav'] = 'top';

        $this->params =  $this->Item_model->param_tree();
        $this->extend_params = $this->Item_model->extend_params();
    }
    
    public function index()
    {

        // 最初は全てのデータを表示する
        $param = NULL;
        $sort = "";
        if ( isset($this->session->filter) )
        {
            foreach ($this->session->filter as $key => $val)
            {
                if ( array_key_exists($key, $this->extend_params) )
                {
                    if ( isset($this->extend_params[$key][$val]) )
                    {
                        $param[] = '`'.$key.'` & '.$this->extend_params[$key][$val].' != 0';
                    }
                    else
                    {
                        $param[] = '`'.$key.'` & '.$val.' != 0';
                    }

                }
                else
                {
                    $param[] = '`'.$key.'` & '.$val.' != 0';
                }
            }
        }

        $items = $this->Item_model->view($param);

        // 並べ替え
        $sortcols = array('annual_due','examination','brand','pt_reduction_rate');
        $sortparam = "";

        foreach ($sortcols as $col)
        {
            if (isset($_GET[$col]))
            {
                $sortarray = array();
                foreach ( (array) $items as $key => $val)
                {
                    $colvalues = $val[$col.'_values'];
                    if (isset($colvalues[0]))
                    {
                        $sortarray[$key] = $colvalues[0];
                    }
                    else
                    {
                        $sortarray[$key] = "";
                    }
                }
                switch (strtolower($_GET[$col]))
                {
                    case 'desc' :
                        array_multisort($sortarray, SORT_DESC, $items);
                        $sortparam = $col.'=desc';
                        break;
                    case 'asc' :
                    default :
                        array_multisort($sortarray, SORT_ASC, $items);
                        $sortparam = $col.'=asc';
                        break;
                }
            }
        }



        // パラメータ
        $this->data['params'] = $this->params;
        $this->data['extend_params'] = $this->extend_params;
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
