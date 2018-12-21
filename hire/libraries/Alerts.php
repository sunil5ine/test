<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class alerts
{
    protected $ci;

    public function __construct()
    {
       
        $this->ci =& get_instance();
        
        
    }

    public function get_alerts()
    {
        $newarry = array();
        $alert = array();
        $id = $this->ci->session->userdata('hireid');
        if($this->ci->session->userdata('hireid')) {  
            $this->ci->load->database();
            /** alerts */
            $alert[] = $this->alerts($id);
            $alert[] = $this->subscribe($id);
            
            
                foreach ($alert as $row) {
                    if (!empty($row)) {
                        foreach ($row as $key => $value) {
                            $newarry[] = $value;  
                        }
                
                    }
                }
                if($newarry){

                    foreach ($newarry as $nkey => $nvalue) {
                        $filterd[$nkey] = $nvalue->date;

                    }
                
                array_multisort($filterd, SORT_DESC, $newarry);
                return $alerts = $newarry;
                }
            }
        
    }


    /** alerts */
    function alerts($id)
    {
        $this->ci->db->select('ea_enc, ea_type, ea_createdOn as date, ea_createdBy, job_title');
        $this->ci->db->from('ch_emp_alerts ar');
        $this->ci->db->where('ea_status', 1);
        $this->ci->db->where('em.emp_id', $id);
        $this->ci->db->or_where('vr.emp_id', $id);
        $this->ci->db->join('ch_varified_cv vr', 'vr.vc_alert = ar.ea_enc', 'left');
        $this->ci->db->join('ch_jobapply ap', 'ap.Ja_alert = ar.ea_enc', 'left');
        $this->ci->db->join('ch_jobs jb', 'jb.job_id = ap.job_id', 'left');
        $this->ci->db->join('ch_employer em', 'em.emp_id = jb.job_created_by', 'left');
        return $this->ci->db->get()->result();      
    }

    /** subscribe */
    public function subscribe($id)
    {
        $now = date('Y-m-d H:i:s');
        $wheredate = date('Y-m-d H:i:s',strtotime($now.'- 3 days'));
        $this->ci->db->select('sub_packid, sub_expire_dt as date, pr_name');
        $this->ci->db->from('ch_emp_subscribe s');
        $this->ci->db->where('emp_id', $id);
        $this->ci->db->where('sub_expire_dt >=', $wheredate);
        $this->ci->db->where('sub_expire_dt <=', $now);
        $this->ci->db->join('ch_pricing p', 'p.pr_encrypt_id = s.sub_packid', 'left');
        $result =  $this->ci->db->get();
        if($result->num_rows() > 0)
        {
            foreach ($result->result() as $key => $value) { $newVal[] = $value; }
            foreach($newVal as $element) { 
                $diff=date_diff(date_create($element->date),date_create($now));
                $element->name ='Package expiry'; 
                switch ($diff->format("%a")) {
                    case '1':
                        $element->days ='1 Day left';
                        break;
                    case '2':
                        $element->days ='2 Day left';
                        break;
                    default:
                        $element->days ='3 Day left';
                }              
            }  
            return $newVal;
        }    
    }

}

/* End of file alerts.php */
