<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class alertmodel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    

    public function package()
    {
        $now = date('Y-m-d H:i:s');
        $wheredate = date('Y-m-d H:i:s',strtotime($now.'+ 3 days'));
        $this->db->select('*');
        $this->db->from('ch_emp_subscribe s');
        $this->db->where('sub_expire_dt <=', $wheredate);
        $this->db->where('sub_expire_dt >=', $now);
        $this->db->join('ch_pricing p', 'p.pr_encrypt_id = s.sub_packid', 'left');
        $result =  $this->db->get();
        if($result->num_rows() > 0)
        {
            foreach ($result->result() as $key => $value) { $newVal[] = $value; }
            foreach($newVal as $element) { 
                
                $diff=date_diff(
                    date_create($now)
                    ,date_create($element->sub_expire_dt)
                );
                $element->name ='Package expiry';
                switch ($diff->format("%a")) {
                    case '1':
                        $element->days ='1 Day left';
                        break;
                    case '2':
                        $element->days ='2 Day left';
                        break;
                    case '3':
                        $element->days ='3 Day left';
                    default:
                        $element->days ='Expired today';
                }              
            }            
            return $newVal;
        }else{
            return false;
        }    
    }


    /** update to alert */
    public function updateAlert($id,$alid)
    {
        $this->db->where('sub_id', $id);
        $this->db->update('ch_emp_subscribe', array('sub_alert'=>$alid)); 
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return 0;
        }         
    }

    /** insert alert */
    public function insertalert($insert)
    {
       $this->db->insert('ch_emp_alerts', $insert);
       return true;       
    }

   

   

}

/* End of file package.php */
