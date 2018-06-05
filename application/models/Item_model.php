<?php
/**
 * Created by PhpStorm.
 * User: yajima
 * Date: 2017-7月-11
 * Time: 0:36
 */

class Item_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function bit_merge($data, $value, $pos)
    {
        // フラグが立っているか確認

    }

    public function bit_view($value = 0, $cols = 0)
    {
        $result = FALSE;

        if ($value & $cols)
        {
            $result = TRUE;
        }

        return $result;
    }

    /**
     * @param array $param
     * @return array
     */
    public function view($param = NULL, $sort = "id DESC, sort ASC")
    {
        $results = array();

        $this->db->select('*');
        $this->db->from('items');

        if ($param !== NULL)
        {
            foreach ($param as $val)
            {
                if ($val > 0)
                {
                    $this->db->where($val, NULL, FALSE );
                }
            }
            unset($key,$val);
        }

        if ( ! empty($sort))
        {
            $this->db->order_by($sort);
        }

        $query = $this->db->get();

        foreach ($query->result_array() as $row)
        {
            // SELECT * FROM `params` WHERE `cols` & 5 != 0 AND `field_name` = 'brand'

            $colnames = array(
                'prefecture_name',
                'body_parts',
                'pr_points',
                'access',
                'services',
                'payments');

            foreach ($colnames as $colname)
            {
                $row[$colname.'_values'] = $this->param_view($colname, $row[$colname]);
            }

            $rowdatetime = new DateTime( $row['modified'] );
            $nowdatetime = new DateTime( 'now' );

            $interval = $nowdatetime->diff($rowdatetime);

            $row['updatenow'] = $row['arrivenow'] = FALSE;
            if ($interval->format('%s') < 10)
            {
                $row['updatenow'] = TRUE;
            }
            if ($interval->format('%d') < 7)
            {
                $row['arrivenow'] = TRUE;
            }
            $results[] = $row;
        }

        return $results;
    }

    public function param_tree()
    {
        $results = array();

        $this->db->select('*');
        $this->db->from('params');
        $this->db->order_by('field_name ASC, cols ASC');

        $query = $this->db->get();

        foreach ($query->result_array() as $row)
        {
            // id   group_name   param_name  field_name  cols
            $results[$row['field_name']][] = array(
                'group_name' => $row['group_name'],
                'param_name' => $row['param_name'],
                'cols' => $row['cols'],
                'extcols' => $row['extcols'],
            );
        }

        return $results;
    }

    public function param_view($fieldname = NULL, $value = 0)
    {
        $results = array();

        $this->db->select('*');
        $this->db->from('params');
        $this->db->where('field_name', $fieldname);
        $this->db->where('`cols` & '.$value.' != 0', NULL, FALSE);

        $query = $this->db->get();

        foreach ($query->result_array() as $row)
        {
            // SELECT * FROM `params` WHERE `cols` & 5 != 0 AND `field_name` = 'brand'
            $results[] = $row;
        }

        return $results;
    }

    public function extend_params()
    {
        $results = array();

        $this->db->select('*');
        $this->db->from('params');
        $this->db->where('`cols` <> `extcols`', NULL, FALSE);

        $query = $this->db->get();

        foreach ($query->result_array() as $row)
        {
            $results[$row['field_name']][$row['cols']] = $row['extcols'];
        }

        return $results;
    }

    /**
     * @param array $param
     * @return bool
     */
    public function import($param = NULL )
    {
        if ($param !== NULL)
        {
            if( ! $this->db->insert('items', $param) )
            {
                return $this->db->error();
            }
            else
            {
                return TRUE;
            }
        }
    }

    public function insert_item()
    {
        $data = array();

        $data['name'] = $this->input->post('name');
        $data['kana'] = $this->input->post('kana');
        $data['picurl_pc'] = $this->input->post('picurl_pc');
        $data['picurl_sp'] = $this->input->post('picurl_sp');
        $data['comment_pc'] = $this->input->post('comment_pc');
        $data['comment_sp'] = $this->input->post('comment_sp');
        $data['follow_pt'] = $this->input->post('follow_pt');
        $data['price_pt'] = $this->input->post('price_pt');
        $data['price_text_pc'] = $this->input->post('price_text_pc');
        $data['price_text_sp'] = $this->input->post('price_text_sp');
        $data['shops'] = $this->input->post('shops');
        $data['officialurl'] = $this->input->post('officialurl');
        $data['officialurl_text'] = $this->input->post('officialurl_text');
        $data['pageurl'] = $this->input->post('pageurl');
        $data['pageurl_text'] = $this->input->post('pageurl_text');
        $data['sort'] = $this->input->post('sort');

        // 口コミの★
        if ($_POST['follow_stars'] == "etc")
        {
            $data['follow_stars'] = $this->input->post('follow_stars_url');
        }
        else
        {
            $data['follow_stars'] = $this->input->post('follow_stars');
        }

        $colnames = array(
            'prefecture_name',
            'body_parts',
            'pr_points',
            'access',
            'services',
            'payments');
        foreach ($colnames as $colname) {
            if ( isset($_POST[$colname]) )
            {
                $data[$colname] = 0;
                foreach ($_POST[$colname] as $val)
                {
                    $data[$colname] += $val;
                }
            }
        }

        if ( ! $this->db->insert('items', $data) )
        {
            return $this->db->error();
        }
        else
        {
            return TRUE;
        }
    }

    public function update_item($item_id = 0)
    {
        $data = array();

        $data['name'] = $this->input->post('name');
        $data['kana'] = $this->input->post('kana');
        $data['picurl_pc'] = $this->input->post('picurl_pc');
        $data['picurl_sp'] = $this->input->post('picurl_sp');
        $data['comment_pc'] = $this->input->post('comment_pc');
        $data['comment_sp'] = $this->input->post('comment_sp');
        $data['follow_pt'] = $this->input->post('follow_pt');
        $data['price_pt'] = $this->input->post('price_pt');
        $data['price_text_pc'] = $this->input->post('price_text_pc');
        $data['price_text_sp'] = $this->input->post('price_text_sp');
        $data['shops'] = $this->input->post('shops');
        $data['officialurl'] = $this->input->post('officialurl');
        $data['officialurl_text'] = $this->input->post('officialurl_text');
        $data['pageurl'] = $this->input->post('pageurl');
        $data['pageurl_text'] = $this->input->post('pageurl_text');
        $data['sort'] = $this->input->post('sort');

        // 口コミの★
        if ($_POST['follow_stars'] == "etc")
        {
            $data['follow_stars'] = $_POST['follow_stars_url'];
        }
        else
        {
            $data['follow_stars'] = $_POST['follow_stars'];
        }

        $colnames = array(
            'prefecture_name',
            'body_parts',
            'pr_points',
            'access',
            'services',
            'payments');
        foreach ($colnames as $colname) {
            if ( isset($_POST[$colname]) )
            {
                $data[$colname] = 0;
                foreach ($_POST[$colname] as $val)
                {
                    $data[$colname] += $val;
                }
            }
        }

        $this->db->where('id', $item_id);
        if ( ! $this->db->update('items', $data) )
        {
            return $this->db->error();
        }
        else
        {
            return TRUE;
        }
    }

    public function delete($item_id = 0)
    {
        if (intval($item_id, 10) > 0)
        {
            $this->db->delete('items', array('id' => $item_id));
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function clear()
    {
        $this->db->truncate('items');
    }
}