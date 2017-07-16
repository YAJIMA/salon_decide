<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Users
 * @property User_model $User_model
 */
class Users extends CI_Controller {

    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        $this->data['title'] = 'ユーザー管理';
        $this->data['nav'] = 'users';
    }
    
    public function index($param=NULL)
    {
        if(! isset($_SESSION['login']) OR empty($_SESSION['login']))
        {
            header("Location: ".base_url("admin/login"));exit();
            //redirect ("/api/login");
        }
        $this->data['result'] = "";
        $this->data['Users'] = $this->User_model->view(NULL, 1);

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/users', $this->data);
        $this->load->view('admin/footer', $this->data);
    }
    
    public function delete($user_id=NULL)
    {
        $this->User_model->delete($user_id);
        $this->data['Users'] = $this->User_model->view(NULL, 1);
        //$this->load->view('users', $data);
        header("Location: ".base_url("admin/users"));exit();
    }
    
    public function update($user_id=NULL)
    {
        $this->data['result'] = "";
        
        if( isset($_POST['username'],$_POST['email'],$_POST['password']) )
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->User_model->update($username, $email, $password, 1, $user_id);
            if ($result === TRUE)
            {
                $data['result'] = "success";
            }
            else
            {
                $data['result'] = $result;
            }
        }
        
        if( ! empty($user_id) )
        {
            $userdata = $this->User_model->view($user_id);
            $this->data['current_user'] = $userdata[0];
        }

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/users_regist', $this->data);
        $this->load->view('admin/footer', $this->data);
    }
    
    public function signin()
    {
        $this->data['result'] = "";
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->User_model->signin($username, $password);
        if($result !== FALSE)
        {
            // ログインOK
            $data['result'] = "success!";
            $_SESSION['login'] = $result;
            header("Location: ".base_url("admin/top"));exit();
        }
        else
        {
            // ログインNG
            $this->data['result'] = "login error!";
        }

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/login_form', $this->data);
        $this->load->view('admin/footer', $this->data);
        //var_dump($_SESSION);
    }
    
    public function regist()
    {
        $this->data['result'] = "";
        
        if(isset($_POST['username'],$_POST['email'],$_POST['password']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->User_model->regist($username, $email, $password, 1);
            if ($result === TRUE)
            {
                $this->data['result'] = "success";
            }
            else
            {
                $this->data['result'] = $result;
            }
        }

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/headline', $this->data);
        $this->load->view('admin/sidemenu', $this->data);
        $this->load->view('admin/users_regist', $this->data);
        $this->load->view('admin/footer', $this->data);
    }
}
