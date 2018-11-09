<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardModel extends CI_Model {

    public function getCandidate($var = null)
    {       
        $this->db->where('can_status', 1);        
        $query = $this->db->get('ch_candidate');
        $cout = $query->num_rows();
        return  $cout;    
    }
    /**
     * get all candidate counts
     */
    public function acand()
    {
        $query =$this->db->get('ch_candidate');
        $cout = $query->num_rows();
        return  $cout;
        
    }
    /**
     * get Pending candidate counts
     */
    public function pcand()
    {
        $this->db->where('can_status', 0);
        $query =$this->db->get('ch_candidate');
        $cout = $query->num_rows();
        return  $cout;
        
    }
    /**
     * Get emploters list
     */
    public function getEmployers()
    {
        $this->db->where('emp_status', 1);
        $query = $this->db->get('ch_employer');
        $cout = $query->num_rows();
        return  $cout;   
    }
     /**
     * all employer details fetch
     */
    public function allempr()
    {
        return $query = $this->db->get('ch_employer')->result();
          
    }
    /**
     * Pending employers counts
     */
    public function pempr()
    {
        $this->db->where('emp_status', 0);
        $query = $this->db->get('ch_employer');
        $cout = $query->num_rows();
        return  $cout;
    }
    /**
     * Get number of jobs posted
     */
    public function countofJobs()
    {
        
        $this->db->where('job_status', 1);
        $query = $this->db->get('ch_jobs');
        $cout = $query->num_rows();
        return  $cout;
    }
    /**
        * 1year employer data
    */
    public function newEmployee($wnf)
    {
        $this->db->select('emp_reg_date');
        $now    = date("Y-m-d H:i:s");
        $expire = date("Y-m-d H:i:s",strtotime($wnf)); 
        $this->db->where('emp_reg_date <=', $now);        
        $this->db->where('emp_reg_date >=', $expire);
        $this->db->group_by('emp_reg_date');
        $query = $this->db->get('ch_employer')->result();
        
        foreach ($query as $key => $value) {
            $newData[]= date("M",strtotime($value->emp_reg_date));
        }
        $vals = array_count_values($newData);
        $counts = array(); 
        for ($m=1; $m<=12; $m++) {
            $month = date('M', mktime(0,0,0,$m, 1, date('Y')));
                if(!empty($vals[$month])){
                    $counts[]= array("valeus"=>$vals[$month] , "month"=>$month);
                }else{
                    $counts[]= array("valeus"=>0 , "month"=>$month);
                }            
            }
            
        return $counts;
    }

    public function newCandidates($wnf)
    {
        $this->db->select('can_reg_date');
        $now    = date("Y-m-d H:i:s");
        $expire = date("Y-m-d H:i:s",strtotime($wnf)); 
        $this->db->where('can_reg_date <=', $now);        
        $this->db->where('can_reg_date >=', $expire);
        $this->db->group_by('can_reg_date');
        $query = $this->db->get('ch_candidate')->result();
        foreach ($query as $key => $value) {
            $newData[]= date("M",strtotime($value->can_reg_date));
        }
        $vals = array_count_values($newData);
        $counts = array(); 
        for ($m=1; $m<=12; $m++) {
            $month = date('M', mktime(0,0,0,$m, 1, date('Y')));
                if(!empty($vals[$month])){
                    $counts[]= array("canval"=>$vals[$month] , "month"=>$month);
                }else{
                    $counts[]= array("canval"=>0 , "month"=>$month);
                }            
            }
     
        return $counts;

       
        
    } 




}
/* End of file dashboardModel.php */


?>