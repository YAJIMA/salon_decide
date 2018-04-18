<?php

class User_model extends CI_Model {

    public $username;
    public $password;
    public $email;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // ユーザー一覧
    public function view($user_id=NULL, $status=1)
    {
        $result = array();

        $this->db->select("*");

        $this->db->where("status", $status);
        if ( ! empty($user_id) )
        {
            $this->db->where("id", $user_id);
        }

        $this->db->order_by("id", "DESC");

        $query = $this->db->get("logins");

        foreach ($query->result_array() as $row)
        {
            $result[] = $row;
        }
        return $result;
    }
    // ログイン処理
    public function signin($username, $password)
    {
        $result = FALSE;

        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        $this->db->select("id, password");

        $this->db->where("username", $username);
        $this->db->where("status", 1);

        $query = $this->db->get("logins");

        $row = $query->row();

        $verify = FALSE;
        
        if (isset($row) && ! empty($row))
        {
            $_password = $row->password;
            $_logins_id = $row->id;
            $verify = password_verify($password, $_password);
        }
        if ($verify === TRUE)
        {
            $token = password_hash($_password.$_logins_id.time(), PASSWORD_DEFAULT);
            $data = array(
                'token' => $token,
                'lastlogindatetime' => date("Y-m-d H:i:s")
            );
            $this->db->where('id', $_logins_id);
            $this->db->update('logins', $data);
            $result = array('token' => $token, 'login_id' => $_logins_id);
        }
        return $result;
    }

    // ログインアカウント削除
    public function delete($user_id)
    {
        $data = [
            'status'=>0
        ];

        $this->db->where('id', $user_id);

        if( ! $this->db->update('logins', $data) )
        {
            return $this->db->error();
        }
        else
        {
            return TRUE;
        }
    }

    // ログインアカウント更新
    public function update($username, $email, $password, $status=1, $user_id)
    {
        $_password = password_hash($password, PASSWORD_DEFAULT);
        //$sql = "INSERT INTO `logins` (`username`, `password`, `email`, `status`) VALUES (".$this->db->escape($username).", '".$this->db->escape_str($_password)."', ".$this->db->escape($email).", 1)";
        $data = [
            'username'=>$username,
            'password'=>$_password,
            'email'=>$email,
            'status'=>$status
        ];

        $this->db->where('id', $user_id);

        if( ! $this->db->update('logins', $data) )
        {
            return $this->db->error();
        }
        else
        {
            return TRUE;
        }
    }

    // ログインアカウント登録
    public function regist($username, $email, $password, $status=1)
    {
        $_password = password_hash($password, PASSWORD_DEFAULT);
        //$sql = "INSERT INTO `logins` (`username`, `password`, `email`, `status`) VALUES (".$this->db->escape($username).", '".$this->db->escape_str($_password)."', ".$this->db->escape($email).", 1)";
        $data = [
            'username'=>$username,
            'password'=>$_password,
            'email'=>$email,
            'status'=>$status
        ];
        if( ! $this->db->insert('logins', $data) )
        {
            return $this->db->error();
        }
        else
        {
            return TRUE;
        }
    }

    // ログアウト
    public function signout($token)
    {
        // ログイントークンを削除
        //$this->db->set('token', 'NULL', FALSE);
        //$this->db->where('token', $token);
        //$this->db->update('logins');

        if ( $this->session->has_userdata('login') )
        {
            $this->session->unset_userdata('login');
            //unset($_SESSION['login']);
        }
        return TRUE;
    }
}