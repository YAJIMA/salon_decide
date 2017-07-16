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
                $this->db->where($val, NULL, FALSE );
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
            $row['card_type_values'] = $this->param_view('card_type', $row['card_type']);
            $row['annual_due_values'] = $this->param_view('annual_due', $row['annual_due']);
            $row['examination_values'] = $this->param_view('examination', $row['examination']);
            $row['brand_values'] = $this->param_view('brand', $row['brand']);
            $row['pt_reduction_rate_values'] = $this->param_view('pt_reduction_rate', $row['pt_reduction_rate']);
            $row['pt_exchange_values'] = $this->param_view('pt_exchange', $row['pt_exchange']);
            $row['electronic_money_values'] = $this->param_view('electronic_money', $row['electronic_money']);

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