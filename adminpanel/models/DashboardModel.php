<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardModel extends CI_Model {

    public function getCandidate(Type $var = null)
    {
        $now    = date("Y-m-d H:i:s");
        $expire = date("Y-m-d H:i:s", strtotime("+90 days"));
        $this->db->where('can_reg_date <=', $now);        
        $this->db->where('can_reg_date >=', $expire);        
        $this->db->where('can_status', 1);        
        $query = $this->db->get('ch_candidate');
       echo  $cout = $query->num_rows();
        
        
    }
    

}

/* End of file dashboardModel.php */


?>