<?php 
class Psychotestmodel extends CI_Model {

	var $table_can 			= '';
	var $table_trans 		= '';
	var $table_country 		= '';
	var $table_baddress 	= '';
	var $table_orders 		= '';
	var $table_psyreg 		= '';
	var $table_psyprice 		= '';
	
	/* Init function
	 *
	 * return void
	 */
    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_can 			= 'ch_candidate';
		$this->table_trans 			= 'ch_transaction';
		$this->table_country 		= 'ch_country';
		$this->table_baddress 		= 'ch_can_billaddress';
		$this->table_orders 		= 'ch_orders';		
		$this->table_psyreg 		= 'ch_psychotest_reg';
		$this->table_psyprice 		= 'ch_psychotest_pricing';
    }
	
	//psyp_id, psyp_heading, psyp_info, psyp_amount, psyp_status
	
	//psyr_id, can_id, psyp_id, psyr_name, psyr_amount, psyr_date, trans_id, psyr_note, psyr_status
	

    public function get_candidate_details($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_alert, c.can_vcode, co.co_name, co.co_nationality from ".$this->table_can." c left join ".$this->table_country." co on co.co_id = c.co_id where c.can_id=".$cid);
		return $query->row_array();
	}

    /* Get Pricing function
	 *
	 * return array
	 */
	public function get_psychotest_pricing()
	{
		$query=$this->db->query("select psyp_id, psyp_heading, psyp_info, psyp_amount, psyp_status from ".$this->table_psyprice." where psyp_status=1");
		return $query->row_array();
	}	
	
	/* Get Pricing function
	 *
	 * return array
	 */
	public function get_psychotest_pricing_single($planid=null)
	{
		$query=$this->db->query("select * from ".$this->table_psyprice." where psyp_id=".$planid);
		return $query->row_array();
	}	
	
	/* Get register function
	 *
	 * return array
	 */
	public function get_psychotest_reg()
	{
		$query=$this->db->query("select psyr_id, can_id, psyp_id, psyr_name, psyr_amount, psyr_date, trans_id, psyr_note, psyr_status from ".$this->table_psyreg." where psyr_status=1 and can_id=".$this->session->userdata('cand_chid'));
		return $query->row_array();
	}
	
	public function check_psyreg_status()
	{
		$query=$this->db->query("select psyr_id, can_id, psyp_id, psyr_name, psyr_amount, psyr_date, trans_id, psyr_note, psyr_status from ".$this->table_psyreg." where psyr_status=2 and can_id=".$this->session->userdata('cand_chid'));
		return $query->row_array();
	}

	public function ins_psychotest_reg($planid=null)
	{
		//$query=$this->db->query("delete from ".$this->table_psyreg." where psyr_status=1 and psyp_id=".$planid." and can_id=".$this->session->userdata('cand_chid'));
		$this->db->where('psyr_status', 1);
		$this->db->where('psyp_id', $planid);
		$this->db->where('can_id', $this->session->userdata('cand_chid'));
	   	$this->db->delete($this->table_psyreg); 
	   
		//psyp_id, psyp_heading, psyp_info, psyp_amount, psyp_status
		$plandata = $this->get_psychotest_pricing_single($planid);
		$psyp_id = $plandata['psyp_id'];
		$psyr_name = $plandata['psyp_heading'];
		$psyr_amount = $plandata['psyp_amount'];
		$prdata = array(
			'can_id'=>$this->session->userdata('cand_chid'),
			'psyp_id'=>$psyp_id,
			'psyr_name'=>$psyr_name,
			'psyr_amount'=>$psyr_amount,
			'psyr_date'=>date('Y-m-d H:i:s'),
			'psyr_status'=>1,
			'psy_encript'=>$plandata['pys_encrpit'],
		);

		$insert_id = $this->db->insert($this->table_psyreg, $prdata);
		return $insert_id;
	}


	public function update_psychotest_reg()
	{
		$prdata = array(
			'psyp_id'=>$this->input->post('psyp_id'),
			'psyr_name'=>$this->input->post('psyr_name'),
			'psyr_amount'=>$this->input->post('psyr_amount'),
			'psyr_date'=>date('Y-m-d H:i:s'),
		);

		$this->db->where('can_id', $this->session->userdata('cand_chid'));
		$this->db->where('psyr_status', 1);
	   	$this->db->update($this->table_psyreg, $prdata);
	}
	
	public function change_psyreg_status($tranid=null)
	{
		$prdata = array(
			'trans_id'=>$tranid,
			'psyr_status'=>2
		);

		$this->db->where('can_id', $this->session->userdata('cand_chid'));
		$this->db->where('psyr_status', 1);
	   	$this->db->update($this->table_psyreg, $prdata);
	}


	/* Get Temp data Function
	 * @param string $sessid
	 * @param string $stat
	 * return array/boolean
	 */
	public function get_temp_psyreg()
    {	
		
       	$query=$this->db->query("select psyr_id, can_id, psyp_id, psyr_name, psyr_amount, psyr_date, trans_id, psyr_note, psyr_status from ".$this->table_psyreg." where psyr_status=1 and can_id=".$this->session->userdata('cand_chid'));

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


function deleteit($id)
{
	// $this->db->trans_start();
	$this->db->where('psyr_id',$id);
	$this->db->delete('ch_psychotest_reg');
	$this->db->trans_complete();
	if ($this->db->trans_status()) {
		return true;
	}
	else
	{
		return false;
	}

}

public function getDetails()
{
	return $this->db->get('ch_psychotest_pricing')->result();
}


public function getTempldata($count,$uid)
{
	$this->db->where('can_id', $uid);
	$this->db->where('psyr_status', "1");
	$query = $this->db->get('ch_psychotest_reg', $count)->result();
	$today = date('Y-m-d H:i:s');
	
	foreach ($query as $key => $value) {
		if ($value->psyp_id == 1) { $addto = 30; }
		else{$addto = 60;}
		$expdate = date('Y-m-d H:i:s',strtotime($today . "+".$addto." days"));
		$object = array(
			'pr_id' 		=>$value->psyp_id , 
			'pr_encript_id' =>$value->psy_encript , 
			'can_id' 		=>$value->can_id , 
			'ct_validity' 	=>$expdate, 
		);
		$this->subscribe_purchase($object);
	}
	$this->updatePayment($uid);

	return $query;
}

function updatePayment($uid)
{
	$this->db->where('can_id', $uid);
	$this->db->where('psyr_status', "1");
	$this->db->update('ch_psychotest_reg',array('psyr_status' =>0, 'trans_id'=>'PGT_'.$uid.'_'.date('ymdhis')));
	return true;
}


function subscribe_purchase($object)
{
	$this->db->insert('ch_can_test', $object);
	return true;
}


public function getcart($userID,$count)
{
	$this->db->where('can_id', $userID);
	$this->db->where('psyr_status', 1);
	return $this->db->get('ch_psychotest_reg', $count)->result();
}




}