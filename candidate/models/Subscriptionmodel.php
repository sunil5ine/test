<?php 

class Subscriptionmodel extends CI_Model {



	var $table_can 			= '';

	var $table_job 			= '';

	var $table_jpost 		= '';

	var $table_jportal 		= '';

	var $table_subscribe 	= '';

	var $table_pricing 		= '';

	var $table_temp 		= '';

	var $table_trans 		= '';

	var $table_country 		= '';

	var $table_baddress 	= '';

	var $table_orders 		= '';

	var $table_apply 		= '';

	

	/* Init function

	 *

	 * return void

	 */

    public function __construct()

    {	

		ini_set('memory_limit', '-1');

		$this->table_can 		= 'ch_candidate';

		$this->table_job 		= 'ch_jobs';

		$this->table_jpost 		= 'ch_jobpost';

		$this->table_jportal 	= 'ch_jobportal';

		$this->table_subscribe 	= 'ch_can_subscribe';

		$this->table_pricing 	= 'ch_can_pricing';

		$this->table_temp 		= 'ch_tempcart';

		$this->table_trans 		= 'ch_transaction';

		$this->table_country 	= 'ch_country';

		$this->table_baddress 	= 'ch_can_billaddress';

		$this->table_orders 	= 'ch_orders';

		$this->table_apply 		= 'ch_jobapply';

    }

    public function get_userdetails($userid)
    {
    	$this->db->where('temp_can_id',$userid);
    	$query = $this->db->get($this->table_temp);
    	return $query->result();
    }

	

	public function get_totaljob_apply()

	{

		$query=$this->db->query("select job_id from ".$this->table_apply." where can_id=".$this->session->userdata('cand_chid'));

		return $query->num_rows();	

	}

	

	/* Get subscription function

	 *

	 * return array

	 */

	public function get_subscribe()

	{
		$now = date('Y-m-d H:i:s');
		$this->db->select('s.csub_id, s.can_id,  s.csub_expire_dt, s.csub_type, s.pr_id, s.csub_status, p.pr_name');
		$this->db->select_sum('csub_nojobs');
		$this->db->where('s.can_id', $this->session->userdata('cand_chid'));
		$this->db->from($this->table_subscribe.' as s');
		$this->db->join($this->table_pricing.' as p', 'p.pr_id = s.pr_id', 'left');
		$this->db->where('csub_expire_dt >=', $now);
		$this->db->order_by('csub_expire_dt', 'desc');
		return $this->db->get()->row_array();	

	}

	

	/* Get Cart Count function

	 *

	 * return array

	 */

	public function cart_count() 

	{

		$this->db->select('temp_id');

		$this->db->from($this->table_temp);

		$this->db->where('temp_status', 'T');

		$this->db->where('temp_can_id', $this->session->userdata('cand_chid'));

		return $this->db->count_all_results();

    }

	

	/*

	public function get_annual()

    {	

       	$query=$this->db->query("select pr_id, pr_encrypt_id, pr_name, pr_orginal, pr_offer, pr_type, pr_limit, pr_cvno, pr_notify, pr_status from ".$this->table_pricing." where pr_status=1 and pr_type=2 order by pr_id asc");



		if ($query->num_rows() > 0)

		{

			foreach ($query->result() as $row)

			{

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }

	*/

	

	/* Get Plan list function

	 *

	 * return array

	 */

	public function get_monthly()

    {	

       	$query=$this->db->query("select * from ".$this->table_pricing." where pr_status=1 and pr_type=1 order by pr_id asc");



		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }

		

	public function get_plan_record($prid=null)

	{

		$query=$this->db->query("select pr_id, pr_encrypt_id, pr_name, pr_orginal, pr_offer, pr_type, pr_limit, pr_nojob, pr_notify,pr_job_aler, pr_details, pr_view_employer_detail pr_status from ".$this->table_pricing." where pr_encrypt_id='".$prid."'");

		return $query->row_array();

	}

	

	

	public function ins_tempdata($data=null)

	{

		$this->db->insert($this->table_temp, $data); 

		$insert_id 	= $this->db->insert_id();

		

		$temp_en_id = md5($this->encryption->encrypt(base64_encode($insert_id))); //Encrypt Job ID

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

	

	public function get_baddress($canid=null)

	{

		$query=$this->db->query("select ba.cba_id, ba.can_id, ba.cba_address, ba.cba_state, ba.cba_city, ba.cba_postal_code, ba.cba_country, ba.cba_status, co.co_iso_code, can.can_fname, can.can_lname, can.can_ccode, can.can_phone, can.can_email  from ".$this->table_baddress." ba left join ".$this->table_country." co on co.co_id = ba.cba_country left join ".$this->table_can." can on can.can_id = ba.can_id where ba.cba_status!=0  and ba.can_id=".$canid);

		return $query->row_array();

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

	

	public function get_transdetails($tranid=null)

	{

		$query=$this->db->query("select trans_id, trans_authcode, trans_amt, trans_dt, trans_result, trans_pt_invoice_id, trans_transaction_id, 	trans_pay_respcode, trans_status from ".$this->table_trans." where trans_id=".$tranid);

		return $query->row_array();

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

public function get_subscribe_order()
{
	$cid = $this->session->userdata('cand_chid');
	$this->db->where('can_id',$cid);
	$this->db->where('csub_type',2);
	$this->db->order_by('csub_id','DESC');
	$this->db->select('*');
	$this->db->from('ch_can_subscribe sb');
	$this->db->join('ch_can_pricing p', 'p.pr_id = sb.pr_id', 'left');
	
	return $this->db->get()->result();
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

	

function getmuser($umid){
	$this->db->where('can_id',$umid);
	return $this->db->get('ch_candidate')->row_array();
}

	/**
	 * [getTempldata det catrt pending details]
	 * @param  [type] $itemcount [cout of the items]
	 * @param  [type] $umid      [candidate id where we ant to get the datas]
	 */
	public function getTempldata($itemcount,$umid)
	{
		$this->db->where('temp_can_id', $umid);
		$this->db->where('temp_status', "T");
		$query = $this->db->get('ch_tempcart', $itemcount)->result();
		$today = date('Y-m-d H:i:s');
		foreach ($query as $key => $value) 
		{
			$arid = 'SBP_'.$umid.'_'.date('YmdHis').$key;
			$this->db->where('pr_encrypt_id', $value->temp_session);
			$perieds = $this->db->get('ch_can_pricing')->row_array();
			$addto =  $perieds['pr_limit'] * 30; 
			if ($value->temp_pr_id <= 2 ) {
				$expdate = date('Y-m-d H:i:s',strtotime($today . "+".$addto." days"));
				$object = array(
					'pr_id' 		=> $value->temp_pr_id, 
					'pr_encript_id' => $value->temp_session, 
					'can_id' 		=> $value->temp_can_id , 
					'ct_validity' 	=> $expdate,
					'ct_alert'      => $arid,
					
				);
				$this->testSubscribers($object);
			}
			else{
				$expdate = date('Y-m-d H:i:s',strtotime($today . "+".$addto." days"));
				$object = array(
					'pr_id' 		=> $value->temp_pr_id, 
					'csub_nojobs'   => $value->temp_nojobs, 
					'can_id' 		=> $value->temp_can_id , 
					'csub_expire_dt'=> $expdate,
					"csub_type" 	=>'2',
					'alrt_id'       =>$arid,
					
				);	
				
				$alrt = array(
					'can_id' => $umid,
					'ca_type' =>'Subscription' ,
					'ca_enc' => $arid,
					'ca_title' => 'New Package Subscribe',
				);
				$this->updatesubscribers($object);
				$this->alerts($alrt);
			}
		}
		$this->updateCartTable($umid);

		return $query;
		
	}

	public function alerts($alrt)
	{
		$this->db->insert('ch_can_alert', $alrt);
		return true;
		
	}

	/**
	 * [updatesubscribers new subscribtion]
	 * @param  [type] $query [result of tem carts]
	 */
	function updatesubscribers($object)
	{
		$this->db->insert('ch_can_subscribe', $object);
		return true;
	}


	/**
	 * [testSubscribers tset subscribes]
	 * @param  [type] $query [result of tem carts]
	 */
	public function testSubscribers($object)
	{

		$this->db->insert('ch_can_test', $object);
		return true;
	}

	/**
	 * [updateCartTable description]
	 * @param  [type] $umid [user id]
	 */
	function updateCartTable($umid)
	{
		$this->db->where('temp_can_id', $umid);
		$this->db->where('temp_status', "T");
		$this->db->update('ch_tempcart',array('temp_status' => 'C'));
		return true;
	}

}