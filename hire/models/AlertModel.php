<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class alertModel extends CI_Model {

    public function alertdetail($id)
    {
        $this->db->select('ea_enc, ea_type');
        $this->db->where('ea_enc', $id);
        $result =  $this->db->get('ch_emp_alerts')->row_array();
        if(!empty($result)){
           $this->db->where('ea_enc', $id);
           $this->db->update('ch_emp_alerts', array('ea_status'=>'0')); 
        }
        return $result;
    }

    public function vrcv($alerts)
    {
        $this->db->where('ea_enc', $alerts['ea_enc']);
        $this->db->select('c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_experience, c.can_curr_desig, c.can_curr_loc, c.can_upd_date, cn.co_name, ch.cv_path, ch.cv_headline, cv_id, f.fun_name as fun_name, j.job_url_id, j.job_title, j.job_location');
        $this->db->from('ch_emp_alerts a');
        $this->db->join('ch_varified_cv v', 'v.vc_alert = a.ea_enc', 'left');
        $this->db->join('ch_candidate c', 'c.can_id = v.can_id', 'left');
        $this->db->join('ch_country cn', 'cn.co_id = c.co_id', 'left');
        $this->db->join('ch_cv ch', 'ch.can_id = c.can_id', 'left');
        $this->db->join('ch_funarea  f', 'f.fun_id = c.fun_id', 'left');
        $this->db->join('ch_employer  emp', 'emp.emp_id = v.job_id', 'left');
        $this->db->join('ch_jobs j', 'j.job_id = v.job_id', 'left');
        $result  = $this->db->get()->result();
        return   $result;                  
    }

    public function jobapply($alerts)
    {
        $this->db->select('c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_experience, c.can_curr_desig, c.can_curr_loc, c.can_upd_date, co.co_name, ch.cv_path, ch.cv_headline, cv_id, f.fun_name as fun_name, j.job_url_id, j.job_title, j.job_location');
        $this->db->where('ea_enc', $alerts['ea_enc']);
        $this->db->from('ch_emp_alerts al');
        $this->db->join('ch_jobapply a', 'a.Ja_alert = al.ea_enc', 'left');
        $this->db->join('ch_jobs j', 'j.job_id = a.job_id', 'left');
        $this->db->join('ch_candidate c', 'c.can_id = a.can_id', 'left');
        $this->db->join('ch_country co',  ' co.co_id = c.co_id', 'left');
        $this->db->join('ch_funarea f',  ' f.fun_id = c.fun_id', 'left');
        $this->db->join('ch_cv  ch',  ' a.can_id = ch.can_id', 'left');
        $result = $this->db->get()->result(); 
        return $result;
    }

    public function getAllList()
    {
        $datas = array();

       $this->db->select('*');
       $this->db->where('ea_createdBy', $this->session->userdata('hireid'));
       $this->db->order_by('ea_createdOn', 'desc');
       $result = $this->db->get('ch_emp_alerts a');
      
       foreach ( $result->result() as $key => $value) {
            if($value->ea_type == 'Verified cv' ){
                $datas[] = $this->vcv($value->ea_enc);
            }elseif ($value->ea_type == 'job apply') {
                $datas[] = $this->japly($value->ea_enc);
            }elseif ($value->ea_type == 'Package expired') {
                $datas[] = $this->package($value->ea_enc);
            }
        }
        return $datas;
    }

    /** cvs */
    public function vcv($id)
    {
        $this->db->select('ea_enc, ea_type, ea_createdOn, job_title as name, job_expaired as exp, ea_status');
        $this->db->where('ea_enc', $id);
        $this->db->from('ch_emp_alerts a');
        $this->db->join('ch_varified_cv vr', 'vr.vc_alert = a.ea_enc','left');
        $this->db->join('ch_jobs jb', 'vr.job_id = jb.job_id', 'left');
        return $this->db->get()->row();  
    }

    /** cvs */
    public function japly($id)
    {
        
        $this->db->select('ea_enc, ea_type, ea_createdOn, job_title as name, job_expaired as exp, ea_status');
        $this->db->where('ea_enc', $id);
        $this->db->from('ch_emp_alerts ar');
        $this->db->join('ch_jobapply ap', 'ap.Ja_alert = ar.ea_enc', 'left');
        $this->db->join('ch_jobs jb', 'jb.job_id = ap.job_id', 'left');
        $this->db->join('ch_employer em', 'em.emp_id = jb.job_created_by', 'left');
        return $this->db->get()->row();
    }


    /** cvs */
    public function package($id)
    {
        $this->db->select('ea_enc, ea_type, ea_createdOn, pr_name as name, sub_expire_dt as exp, ea_status');
        $this->db->where('ea_enc', $id);
        $this->db->from('ch_emp_alerts ar');
        $this->db->join('ch_emp_subscribe s', 'ar.ea_enc = s.sub_alert', 'left');
        $this->db->join('ch_pricing p', 'p.pr_encrypt_id = s.sub_packid', 'left');
        return $this->db->get()->row();
    }

}
/* End of file alertModel.php */
