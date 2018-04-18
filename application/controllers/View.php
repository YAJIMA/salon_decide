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
        $this->load->library('user_agent');

        $this->data['title'] = '脱毛サロン';
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



        // 並べ替え
        $sortcols = array('price_pt','follow_pt','shops','comment_pc','name','kana');
        $sort = "follow_pt DESC, sort ASC";
        $sortparam = "";

        foreach ($sortcols as $col)
        {
            if (isset($_GET[$col]))
            {
                if ($col == 'name')
                {
                    switch (strtolower($_GET[$col]))
                    {
                        case 'desc' :
                            $sort = $col.' DESC, sort ASC';
                            $sortparam = $col.'=desc';
                            break;
                        case 'asc' :
                        default :
                            $sort = $col.' ASC, sort ASC';
                            $sortparam = $col.'=asc';
                            break;
                    }
                }
                elseif ($col == 'kana')
                {
                    switch (strtolower($_GET[$col]))
                    {
                        case 'desc' :
                            $sort = $col.' DESC, sort ASC';
                            $sortparam = $col.'=desc';
                            break;
                        case 'asc' :
                        default :
                            $sort = $col.' ASC, sort ASC';
                            $sortparam = $col.'=asc';
                            break;
                    }
                }
                else
                {
                    switch (strtolower($_GET[$col]))
                    {
                        case 'desc' :
                            $sort = '('.$col.' * 1) DESC, sort ASC';
                            $sortparam = $col.'=desc';
                            break;
                        case 'asc' :
                        default :
                            $sort = '('.$col.' * 1) ASC, sort ASC';
                            $sortparam = $col.'=asc';
                            break;
                    }
                }
            }
        }

        $items = $this->Item_model->view($param, $sort);


        // パラメータ
        $this->data['params'] = $this->params;
        $this->data['extend_params'] = $this->extend_params;
        $this->data['items'] = $items;
        $this->data['sortparam'] = $sortparam;

        if ($this->agent->is_mobile())
        {
            $this->load->view('header_mobile', $this->data);
            $this->load->view('headline_mobile', $this->data);
            $this->load->view('view_mobile', $this->data);
            $this->load->view('footer_mobile', $this->data);
        }
        else
        {
            $this->load->view('header', $this->data);
            $this->load->view('headline', $this->data);
            $this->load->view('sidemenu', $this->data);
            $this->load->view('view', $this->data);
            $this->load->view('footer', $this->data);
        }
    }

    public function filter()
    {
        if (isset($_POST))
        {
            $param = array();
            $prefecture_name = $body_parts = $payments = $pr_points = $access = $services = 0;
            $columns = array('prefecture_name','body_parts','payments','pr_points','access','services');

            foreach ($columns as $col)
            {
                if (isset($_POST[$col]))
                {
                    if (is_array($_POST[$col]))
                    {
                        foreach ($_POST[$col] as $val)
                        {
                            ${$col} += intval($val,10);
                        }
                        $param[$col] = ${$col};
                    }
                    else
                    {
                        $param[$col] = $_POST[$col];
                    }
                }
            }

            $this->session->filter = $param;

        }
        header("Location: ".base_url("view"));exit();
    }
}
