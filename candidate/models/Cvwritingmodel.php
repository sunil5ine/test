<?php 
class Cvwritingmodel extends CI_Model {

	var $table_can 			= '';
	var $table_cvwriting 	= '';
	var $table_trans 		= '';
	var $table_country 		= '';
	var $table_baddress 	= '';
	var $table_summary 		= '';
	var $table_farea 		= '';
	var $table_ind 			= '';
	var $table_degree_type 	= '';
	var $table_exp 			= '';
	var $table_orders 		= '';
	var $table_cv 			= '';
	
	/* Init function
	 *
	 * return void
	 */
    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_can 			= 'ch_candidate';
		$this->table_cvwriting		= 'ch_cv_writing';
		$this->table_trans 			= 'ch_transaction';
		$this->table_country 		= 'ch_country';
		$this->table_baddress 		= 'ch_can_billaddress';
		$this->table_summary 		= 'ch_candidate_summary';
		$this->table_farea 			= 'enum_job_function';
		$this->table_ind 			= 'enum_industry';
		$this->table_degree_type	= 'enum_degree_type';
		$this->table_exp 			= 'enum_experience';
		$this->table_orders 		= 'ch_orders';
		$this->table_cv 			= 'ch_cv';
    }

    public function get_candidate_details($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_alert, c.can_vcode, co.co_name, co.co_nationality, e.deg_type_sdisplay as edu_name, f.jfun_display  as fun_name, cvw.qn1, cvw.qn2, cvw.qn3, cvw.qn4, cvw.qn5, cvw.qn6, cvw.qn7, cvw.qn8, cvw.qn9, cvw.qn10, cvw.qn11, cvw.cvw_amt, cvw.cvw_cover, cvw.cvw_express, cvw.cvw_date, cv.cv_path from ".$this->table_can." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_degree_type." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_cvwriting." cvw on cvw.can_id = c.can_id left join ".$this->table_cv." cv on cv.can_id = c.can_id where c.can_id=".$cid);
		return $query->row_array();
	}

    /* Get questionnaire function
	 *
	 * return array
	 */
	public function get_questionnaire()
	{
		$query=$this->db->query("select cvw_id, can_id, qn1, qn2, qn3, qn4, qn5, qn6, qn7, qn8, qn9, qn10, qn11, cvw_amt, cvw_cover, cvw_express, cvw_date, trans_id, cvw_status from ".$this->table_cvwriting." where cvw_status=1 and can_id=".$this->session->userdata('cand_chid'));
		return $query->row_array();
	}	
	
	public function check_cvw_status()
	{
		$query=$this->db->query("select cvw_id, can_id, qn1, qn2, qn3, qn4, qn5, qn6, qn7, qn8, qn9, qn10, qn11, cvw_amt, cvw_cover, cvw_express, cvw_date, trans_id, cvw_status from ".$this->table_cvwriting." where cvw_status=2 and can_id=".$this->session->userdata('cand_chid'));
		//cvw_id, can_id, qn1, qn2, qn3, qn4, qn5, qn6, qn7, qn8, qn9, qn10, qn11, cvw_amt, cvw_cover, cvw_express, cvw_date, trans_id, cvw_status
		return $query->row_array();
	}

	public function ins_questionnaire($packess)
	{
		$qdata = array(
			'can_id'=>$this->session->userdata('cand_chid'),
			'qn1'=>$this->input->post('qn1'),
			'qn2'=>$this->input->post('qn2'),
			'qn3'=>$this->input->post('qn3'),
			'qn4'=>$this->input->post('qn4'),
			'qn5'=>$this->input->post('qn5'),
			'qn6'=>$this->input->post('qn6'),
			'qn7'=>$this->input->post('qn7'),
			'qn8'=>$this->input->post('qn8'),
			'qn9'=>$this->input->post('qn9'),
			'qn10'=>$this->input->post('qn10'),
			'qn11'=>$this->input->post('qn11'),
			'cvw_date'=>date('Y-m-d H:i:s'),
			'cvw_cover'=>0,
			'cvw_express'=>0,
			'cvw_status'=>1,
			'cvw_amt'=>$packess['cp_price'],
			'cv_alert' => '0',
			'cv_pac_name' => $packess['cp_title'],
			'cv_pac_id' => $packess['cp_id'],
		);

		$insert_id = $this->db->insert($this->table_cvwriting, $qdata);
		return $insert_id;
	}


	public function update_questionnaire($packess)
	{
		$qdata = array(
			'qn1'=>$this->input->post('qn1'),
			'qn2'=>$this->input->post('qn2'),
			'qn3'=>$this->input->post('qn3'),
			'qn4'=>$this->input->post('qn4'),
			'qn5'=>$this->input->post('qn5'),
			'qn6'=>$this->input->post('qn6'),
			'qn7'=>$this->input->post('qn7'),
			'qn8'=>$this->input->post('qn8'),
			'qn9'=>$this->input->post('qn9'),
			'qn10'=>$this->input->post('qn10'),
			'qn11'=>$this->input->post('qn11'),
			'cvw_amt'=>$packess['cp_price'],
			'cv_alert' => '0',
			'cv_pac_name' => $packess['cp_title'],
			'cv_pac_id' => $packess['cp_id'],
		);

		$this->db->where('can_id', $this->session->userdata('cand_chid'));
		$this->db->where('cvw_status', 1);
	   	$this->db->update($this->table_cvwriting, $qdata);
	}

	/**
	 * Get single cv 
	 */
	public function getpackgesSingle($id)
	{
		return $this->db->where('cp_id', $id)->get('cv_package')->row_array();
	}


	public function upd_questionnaire_additional()
	{
		$qdata = array(
			'cvw_cover'=>$this->input->post('cvcover'),
			'cvw_express'=>$this->input->post('cvexpress'),
		);

		$this->db->where('can_id', $this->session->userdata('cand_chid'));
		$this->db->where('cvw_status', 1);
	   	$this->db->update($this->table_cvwriting, $qdata);
	}
	
	public function change_cvw_status($tranid=null)
	{
		$qdata = array(
			'trans_id'=>$tranid,
			'cvw_status'=>2
		);

		$this->db->where('can_id', $this->session->userdata('cand_chid'));
		$this->db->where('cvw_status', 1);
	   	$this->db->update($this->table_cvwriting, $qdata);
	}


	/* Get Temp questionnaire data Function
	 * @param string $sessid
	 * @param string $stat
	 * return array/boolean
	 */
	public function get_temp_questionnaire()
    {	
		
       	$query=$this->db->query("select * from ".$this->table_cvwriting." where cvw_status=1 and can_id=".$this->session->userdata('cand_chid'));

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }


    public function get_baddress($canid=null)
	{
		$query=$this->db->query("select ba.cba_id, ba.can_id, ba.cba_address, ba.cba_state, ba.cba_city, ba.cba_postal_code, ba.cba_country, ba.cba_status, co.co_iso_code, can.can_fname, can.can_lname, can.can_ccode, can.can_phone, can.can_email  from ".$this->table_baddress." ba left join ".$this->table_country." co on co.co_id = ba.cba_country left join ".$this->table_can." can on can.can_id = ba.can_id where ba.cba_status!=0  and ba.can_id=".$canid);
		return $query->row_array();
	}


	public function get_country()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");

		$country_list = $query->result();
		$dropDownList['']='Country';
		foreach($country_list as $dropdown) {
			$dropDownList[$dropdown->co_id] = $dropdown->co_name;
		}
		return $dropDownList;
    }

    public function ins_baddress()
	{
		$this->db->where('can_id',$this->session->userdata('cand_chid'));
		$this->db->where('cba_address',$this->input->post('baddress'));
		$this->db->where('cba_state',$this->input->post('bstate'));
		$this->db->where('cba_city',$this->input->post('bcity'));
		$this->db->where('cba_postal_code',$this->input->post('bpcode'));
		$this->db->where('cba_country',$this->input->post('bcountry'));
		$query = $this->db->get($this->table_baddress);
		if ( $query->num_rows() > 0 ) {
			$row 	= $query->row();
			$bdata 	= array(
				'cba_status'=>1,
			);
	
			$this->db->where('cba_id', $row->cba_id);
			$this->db->update($this->table_baddress, $bdata);
			
			$jdata = array(
				'cba_status'=>0,
			);
			$this->db->where('can_id',$this->session->userdata('cand_chid'));
			$this->db->where('cba_id !=', $row->cba_id);
			$this->db->update($this->table_baddress, $jdata);			
		   	return $row->cba_id;
		} else {
			$jdata = array(
				'cba_status'=>0,
			);
			$this->db->where('can_id',$this->session->userdata('cand_chid'));
			$this->db->where('cba_status !=', 0);
			$this->db->update($this->table_baddress, $jdata);
			
			$bdata = array(
				'can_id'=>$this->session->userdata('cand_chid'),
				'cba_address'=>$this->input->post('baddress'),
				'cba_state'=>$this->input->post('bstate'),
				'cba_city'=>$this->input->post('bcity'),
				'cba_postal_code'=>$this->input->post('bpcode'),
				'cba_country'=>$this->input->post('bcountry'),
				'cba_created_dt'=>date('Y-m-d H:i:s'),
				'cba_status'=>1
			);
	
			$this->db->insert($this->table_baddress, $bdata);
			$ba_id = $this->db->insert_id();
			return $ba_id;
		}
	}

	public function get_orderid()
	{
		$query=$this->db->query("select trans_id from ".$this->table_trans." order by trans_id desc limit 0, 1");
		return $query->row_array();
	}

	public function ins_trans($amount=null)
	{
		$trdata = array(
				'trans_authcode'=>'',
				'can_id'=>$this->session->userdata('cand_chid'),
				'trans_amt'=>$amount,
				'trans_dt'=>date('Y-m-d H:i:s'),
				'trans_status'=>0
			);
	
		$this->db->insert($this->table_trans, $trdata);
		$tr_id = $this->db->insert_id();
		return $tr_id;
	}

	public function updt_trans($trid=null,$tdata=null)
	{
		$this->db->where('can_id',$this->session->userdata('cand_chid'));
		$this->db->where('trans_id', $trid);
		$this->db->update($this->table_trans, $tdata);
	}

	public function get_transdetails($tranid=null)
	{
		$query=$this->db->query("select trans_id, trans_authcode, trans_amt, trans_dt, trans_result, trans_pt_invoice_id, trans_transaction_id, trans_pay_respcode, trans_status from ".$this->table_trans." where trans_id=".$tranid);
		return $query->row_array();
	}

	public function ins_order($transid=null, $proname=null, $proamount=null)
	{
		$ordata = array(
				'trans_id'=>$transid,
				'can_id'=>$this->session->userdata('cand_chid'),
				'ord_product'=>$proname,
				'ord_amt'=>$proamount,
				'ord_date'=>date('Y-m-d H:i:s')
			);
	
		$this->db->insert($this->table_orders, $ordata);
		$or_id = $this->db->insert_id();
		return $or_id;
	}











	
	/* Get subscription function
	 *
	 * return array
	 */
	public function get_subscribe()
	{
		$query=$this->db->query("select s.csub_id, s.can_id, s.csub_nojobs, s.csub_expire_dt, s.csub_type, s.pr_id, s.csub_status, p.pr_name from ".$this->table_subscribe." s left join ".$this->table_pricing." p on p.pr_id=s.pr_id where s.can_id=".$this->session->userdata('cand_chid'));
		//cvw_id, can_id, qn1, qn2, qn3, qn4, qn5, qn6, qn7, qn8, qn9, qn10, qn11, cvw_amt, cvw_cover, cvw_express, cvw_date, trans_id, cvw_status
		return $query->row_array();
	}
		
	public function ins_tempdata($data=null)
	{
		$this->db->insert($this->table_temp, $data); 
		$insert_id 	= $this->db->insert_id();
		
		$temp_en_id = md5($this->encrypt->encode(base64_encode($insert_id))); //Encrypt Job ID
		$temp_en_data = array(
			'temp_encrypt_id'=>$temp_en_id
		);
		$this->db->where('temp_id', $insert_id);
	   	$this->db->update($this->table_temp, $temp_en_data);		
		return $insert_id;
	}
	
	/* Get Temp table data Function
	 * @param string $sessid
	 * @param string $stat
	 * return array/boolean
	 */
	public function get_tempdata($sessid=null,$stat=null)
    {	
		if($stat == '') {
			$stat = 'T';
		}
       	$query=$this->db->query("select t.temp_id, t.temp_encrypt_id, t.temp_session, t.temp_can_id, t.temp_pr_id, t.temp_nojobs, t.temp_nocvs, t.temp_items, t.temp_amt, t.temp_date, t.temp_status, p.pr_encrypt_id, p.pr_name, p.pr_type, p.pr_limit, p.pr_nojob  from ".$this->table_temp." t left join ".$this->table_pricing." p on p.pr_id=t.temp_pr_id where t.temp_status='".$stat."' and t.temp_can_id=".$this->session->userdata('cand_chid')." order by t.temp_id desc");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	/* Get Temp table single data Function
	 * @param string $tid
	 * return array
	 */
	public function get_tempdata_single($tid=null)
	{
		$query=$this->db->query("select t.temp_id, t.temp_encrypt_id, t.temp_session, t.temp_can_id, t.temp_pr_id, t.temp_nojobs, t.temp_nocvs, t.temp_items, t.temp_amt, t.temp_date, t.temp_status, p.pr_encrypt_id, p.pr_name, p.pr_type, p.pr_nojob, p.pr_limit from ".$this->table_temp." t left join ".$this->table_pricing." p on p.pr_id=t.temp_pr_id where t.temp_can_id=".$this->session->userdata('cand_chid')." and t.temp_encrypt_id='".$tid."'");
		return $query->row_array();
	}
	
	/* Update Temp table Function
	 * @param string $sessid
	 * @param int $fstat
	 * @param int $tstat
	 * return void
	 */
	public function updt_tempdata($sessid=null,$fstat=null,$tstat=null)
	{
		$tdata = array(
				'temp_status'=>$tstat,
			);
		$this->db->where('temp_can_id',$this->session->userdata('cand_chid'));
		$this->db->where('temp_status', $fstat);
		$this->db->update($this->table_temp, $tdata);		
	}
	
	/* Update Subscription Function
	 * @param int $nojobs
	 * @param int $plan
	 * @param int $period_valid
	 * return void
	 */
	public function updt_subscription($nojobs=0,$plan=2,$period_valid=0)
	{
		$currentDate = date('Y-m-d H:i:s');
		//Get Current details
		$this->db->where('can_id',$this->session->userdata('cand_chid'));
		$query 		= $this->db->get($this->table_subscribe);
		$row 		= $query->row();		
		$cjno 		= ($row->csub_expire_dt == 0 || $row->csub_expire_dt < $currentDate)?0:$row->csub_nojobs;
		$expdt 		= ($row->csub_expire_dt == 0 || $row->csub_expire_dt < $currentDate)?date('Y-m-d H:i:s'):$row->csub_expire_dt;
		
		$newxpdt 	= date('Y-m-d H:i:s',(strtotime(date("Y-m-d H:i:s", strtotime($expdt)) . " +".$period_valid." days")));
		$newjno 	= $cjno + $nojobs;
		//Insert Data		
		$sdata = array(
				'csub_nojobs'=>$newjno,
				'csub_expire_dt'=>$newxpdt,
				'pr_id'=>$plan,
				'csub_type'=>2
			);
		$this->db->where('can_id',$this->session->userdata('cand_chid'));
		$this->db->update($this->table_subscribe, $sdata);
	}
	
	public function delete_tempdata($tid=null)
	{
	   $this->db->where('temp_encrypt_id', $tid);
	   $this->db->delete($this->table_temp); 
	   return 1;
	}
	
	
	
	public function get_billdetails_all()
	{
		$query=$this->db->query("select ord.ord_id, ord.trans_id, ord.can_id, ord.ord_product, ord.ord_amt, ord.ord_date, t.trans_pt_invoice_id, t.trans_status  from ".$this->table_orders." ord left join ".$this->table_trans." t on t.trans_id=ord.trans_id where ord.can_id=".$this->session->userdata('cand_chid')." order by ord.ord_id desc");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
		


function deleteit($id)
{
	// $this->db->trans_start();
	$this->db->where('cvw_id',$id);
	$this->db->delete('ch_cv_writing');
	$this->db->trans_complete();
	if ($this->db->trans_status()) {
		return true;
	}
	else
	{
		return false;
	}

}
	
function cvexpressup($sataus,$id)
{
	$this->db->where('can_id',$id);
	$this->db->update('ch_cv_writing',array('cvw_express' =>  $sataus));
	return true;
}

function cvw_coverup($sataus,$id)
{
	$this->db->where('can_id',$id);
	$this->db->update('ch_cv_writing',array('cvw_cover' => $sataus));
	return true;
}


/* update payment complete */
function copmletUpdate($umid)
{
	$tranid = 'SPI_'.$umid."_".date('Ymdhis');
	$this->db->where('can_id', $umid);
	$this->db->where('cvw_status', "1");
	$this->db->update('ch_cv_writing',array('cvw_status' =>'0',"trans_id"=> $tranid));
	if($this->db->affected_rows() > 0)
	{
		$this->alertupdate($tranid, $umid);
		return true;
	}
	else{
		return false;
	}
}

public function alertupdate($tranid, $umid)
{
	$data = array(
		'can_id'=>$umid,
		'ca_type'=>'cv_write',
		'ca_enc'=>$tranid,
		'ca_title'=>'Professional CV Writing ',
	);
	$this->db->insert('ch_can_alert',$data);
	return true;
}

function successdata($umid)
{
	$this->db->where('cvw_status', 0);
	$this->db->where('can_id', $umid);
	return $this->db->get('ch_cv_writing', 1)->row_array();
}

/**
 * 
 * CV PAKAGE 
 */
function cvpakage()
{
	return $this->db->where('status', 1)->get('cv_package')->result();
}

public function geamount($id)
{
	$result =  $this->db->where('cvw_id', $id)->select('cvw_amt')->get('ch_cv_writing')->row();
	return $result->cvw_amt;
	
}
		
}