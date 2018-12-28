<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class notification extends CI_Model {

    public function getall()
    {
        $this->db->where('can_id', $this->session->userdata('cand_chid'));
        $this->db->order_by('ca_date', 'desc');
        $result['alerts'] =  $this->db->get('ch_can_alert')->result();
        
        
        $this->db->where('can_id', $this->session->userdata('cand_chid'));
        $this->db->where('ca_status', 1);
        $result['count'] =  $this->db->get('ch_can_alert')->num_rows();
        return  $result;
    }

    public function getsingle($id)
    {
        $this->status($id);
        $this->db->where('can_id', $this->session->userdata('cand_chid'));
        $this->db->where('ca_id', $id);
        $this->db->order_by('ca_date', 'desc');
        $result['alerts'] =  $this->db->get('ch_can_alert')->result();

        return $result;
        
    }

    public function status($id)
    {
        $this->db->where('ca_id', $id);
        $this->db->update('ch_can_alert', array('ca_status'=>0));
        return true;       
    }

    public function recomended($cid)
    {
        $this->db->select('job_title as title, job_url_id as id, ca_date as date,job_company as name, ca_status, ca_id');
        $this->db->where('ca_id', $cid);
        $this->db->where('can_id', $this->session->userdata('cand_chid'));
        $this->db->from('ch_can_alert a');
        $this->db->join('ch_jobs j', 'j.job_id = a.ca_enc', 'left');
        $result = $this->db->get()->row_array();
        return $result;
        
    }


    public function package($cid)
    {
        $this->db->select('ca_title as title, ca_id as id, ca_date as date, ca_type as name, ca_status, ca_id');        
        $this->db->where('ca_id', $cid);
        $this->db->where('can_id', $this->session->userdata('cand_chid'));
        return $this->db->get('ch_can_alert')->row_array();        
    }

    public function subs($cid)
    {
        $this->db->select('ca_title as title, ca_enc as id, ca_date as date, pr_name as name, ca_status, ca_id');
        $this->db->where('ca_id', $cid);
        $this->db->where('a.can_id', $this->session->userdata('cand_chid'));
        $this->db->from('ch_can_alert a');
        $this->db->join('ch_can_subscribe s', 's.alrt_id = a.ca_enc', 'left');
        $this->db->join('ch_pricing p', 'p.pr_id = s.pr_id', 'left');
        $result = $this->db->get()->row_array();
        return $result;        
    }

    public function cvs($cid)
    {
        $this->db->select('ca_title as title, ca_enc as id, ca_date as date, cv_pac_name as name, ca_status, ca_id');
        $this->db->where('ca_id', $cid);
        $this->db->where('a.can_id', $this->session->userdata('cand_chid'));
        $this->db->from('ch_can_alert a');
        $this->db->join('ch_cv_writing c', 'c.trans_id = a.ca_enc', 'left');
        $result = $this->db->get()->row_array();
        return $result;     
    }

    public function test($cid)
    {
        $this->db->select('ca_title as title, ca_id as id, ca_date as date, ca_type as name, ca_status,ca_id');        
        $this->db->where('ca_id', $cid);
        $this->db->where('can_id', $this->session->userdata('cand_chid'));
        return $this->db->get('ch_can_alert')->row_array();    
    }

    
}

/* End of file notification.php */
