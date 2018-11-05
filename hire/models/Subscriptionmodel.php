<?php 

/**

 * Subscription model for this APP

 * 

 * 

 * @package    CI

 * @subpackage Model

 * @author     Sreejith Gopinath <sreejith@aatoon.com>

 */



class Subscriptionmodel extends CI_Model {



	var $table_emp 			= '';

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



    public function __construct()

    {	

		ini_set('memory_limit', '-1');

		$this->table_emp 		= 'ch_employer';

		$this->table_job 		= 'ch_jobs';

		$this->table_jpost 		= 'ch_jobpost';

		$this->table_jportal 	= 'ch_jobportal';

		$this->table_subscribe 	= 'ch_emp_subscribe';

		$this->table_pricing 	= 'ch_pricing';

		$this->table_temp 		= 'ch_tempcart';

		$this->table_trans 		= 'ch_transaction';

		$this->table_country 	= 'ch_country';

		$this->table_baddress 	= 'ch_emp_billaddress';

		$this->table_orders 	= 'ch_orders';

    }

	

	public function get_subscribe()

	{

		$query = $this->db->query("select sub_nojobs, sub_nocv, sub_expire_dt  from ".$this->table_subscribe." where emp_id=".$this->session->userdata('hireid'));

		return $query->row_array();

	}



	public function cart_count() 

	{

		$this->db->select('temp_id');

		$this->db->from($this->table_temp);

		$this->db->where('temp_status', 'T');

		$this->db->where('temp_emp_id', $this->session->userdata('hireid'));

		return $this->db->count_all_results();

    }

	

	public function get_annual()

    {	

       	$query = $this->db->query("select pr_id, pr_encrypt_id, pr_name, pr_orginal, pr_offer, pr_type, pr_limit, pr_cvno, pr_notify, pr_status from ".$this->table_pricing." where pr_status=1 and pr_type=2 order by pr_id asc");



		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }



	public function get_monthly()

    {	

       	$query = $this->db->query("select pr_id, pr_encrypt_id, pr_name,peried, pr_orginal, pr_offer, pr_type, exprence_level, pr_limit, pr_cvno, pr_notify, pr_status from ".$this->table_pricing." where pr_status=1 and pr_type=1 order by pr_id asc");



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

		$query = $this->db->query("select pr_id, pr_encrypt_id, pr_name, pr_orginal, pr_offer, pr_type, pr_limit, pr_cvno, pr_notify, pr_status from ".$this->table_pricing." where pr_encrypt_id='".$prid."'");

		return $query->row_array();

	}

	

	public function ins_tempdata($data=null)

	{

		$this->db->insert($this->table_temp, $data); 

		$insert_id = $this->db->insert_id();


		$temp_en_id = md5($this->encryption->encrypt(base64_encode($insert_id))); //Encrypt Job ID

		$temp_en_data = array(

			'temp_encrypt_id'=>$temp_en_id

		);

		$this->db->where('temp_id', $insert_id);

	   	$this->db->update($this->table_temp, $temp_en_data);	

		return $insert_id;

	}

	

	public function get_tempdata($sessid=null,$stat=null)

    {	

		if($stat == '') {

			$stat ='T';

		}

       	$query = $this->db->query("select t.temp_id, t.temp_encrypt_id, t.temp_session, t.temp_emp_id, t.temp_pr_id, t.temp_nojobs, t.temp_nocvs, t.temp_items, t.temp_amt, t.temp_date, t.temp_status, p.pr_encrypt_id, p.pr_name, p.pr_type  from ".$this->table_temp." t left join ".$this->table_pricing." p on p.pr_id=t.temp_pr_id where t.temp_status='".$stat."' and t.temp_emp_id=".$this->session->userdata('hireid')." order by t.temp_id desc");
      

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }


	
function get_tempdata1($sessid=null,$stat=null){
	if($stat == '') {

			$stat ='T';

		}
	$this->db->where('temp_emp_id', $this->session->userdata('hireid'));
       	$this->db->where('temp_status', $stat);
       	$this->db->order_by('temp_id', 'desc');
       	$query = $this->db->get($this->table_temp);

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }



	public function updt_tempdata($sessid=null,$fstat=null,$tstat=null)

	{

		$tdata = array(

				'temp_status'=>$tstat,

			);

		$this->db->where('temp_emp_id',$this->session->userdata('hireid'));

		$this->db->where('temp_status', $fstat);

		$this->db->update($this->table_temp, $tdata);

	}

	

	public function updt_subscription($nojobs,$nocvs,$period_valid)

	{

		$this->db->where('emp_id',$this->session->userdata('hireid'));

		$query 	= $this->db->get($this->table_subscribe);

		$row 	= $query->row();

		

		$cjno 	= $row->sub_nojobs;

		$ccvno 	= $row->sub_nocv;

		$expdt 	= ($row->sub_expire_dt == 0)?date('Y-m-d H:i:s'):$row->sub_expire_dt;

		

		$newxpdt 	= date('Y-m-d H:i:s',(strtotime(date("Y-m-d H:i:s", strtotime($expdt)) . " +".$period_valid." days")));

		$newjno 	= $cjno + $nojobs;

		$newcvno 	= $ccvno + $nocvs;

		

		$sdata = array(

				'sub_nojobs'=>$newjno,

				'sub_nocv'=>$newcvno,

				'sub_expire_dt'=>$newxpdt,

				'sub_type'=>2

			);

		$this->db->where('emp_id',$this->session->userdata('hireid'));

		$this->db->update($this->table_subscribe, $sdata);

	}

	

	public function get_tempdata_single($tid=null)

	{

		$query = $this->db->query("select t.temp_id, t.temp_encrypt_id, t.temp_session, t.temp_emp_id, t.temp_pr_id, t.temp_nojobs, t.temp_nocvs, t.temp_items, t.temp_amt, t.temp_date, t.temp_status, p.pr_encrypt_id, p.pr_name, p.pr_type  from ".$this->table_temp." t left join ".$this->table_pricing." p on p.pr_id=t.temp_pr_id where t.temp_emp_id=".$this->session->userdata('hireid')." and t.temp_encrypt_id='".$tid."'");

		return $query->row_array();

	}

	

	public function delete_tempdata($tid=null)

	{

	   $this->db->where('temp_encrypt_id', $tid);

	   $this->db->delete($this->table_temp); 

	   return 1;

	}

	

	public function ins_baddress()

	{

		$this->db->where('emp_id',$this->session->userdata('hireid'));

		$this->db->where('eba_address',$this->input->post('baddress'));

		$this->db->where('eba_state',$this->input->post('bstate'));

		$this->db->where('eba_city',$this->input->post('bcity'));

		$this->db->where('eba_postal_code',$this->input->post('bpcode'));

		$this->db->where('eba_country',$this->input->post('bcountry'));

		$query = $this->db->get($this->table_baddress);

		if ( $query->num_rows() > 0 ) {

			$row = $query->row();

			$bdata = array(

				'eba_status'=>1,

			);	

			$this->db->where('eba_id', $row->eba_id);

			$this->db->update($this->table_baddress, $bdata);			

			$jdata = array(

				'eba_status'=>0,

			);

			$this->db->where('emp_id',$this->session->userdata('hireid'));

			$this->db->where('eba_id !=', $row->eba_id);

			$this->db->update($this->table_baddress, $jdata);			

		   	return $row->eba_id;

		} else {

			$jdata = array(

				'eba_status'=>0,

			);

			$this->db->where('emp_id',$this->session->userdata('hireid'));

			$this->db->where('eba_status !=', 0);

			$this->db->update($this->table_baddress, $jdata);

			

			$bdata = array(

				'emp_id'=>$this->session->userdata('hireid'),

				'eba_address'=>$this->input->post('baddress'),

				'eba_state'=>$this->input->post('bstate'),

				'eba_city'=>$this->input->post('bcity'),

				'eba_postal_code'=>$this->input->post('bpcode'),

				'eba_country'=>$this->input->post('bcountry'),

				'eba_created_dt'=>date('Y-m-d H:i:s'),

				'eba_status'=>1

			);

	

			$this->db->insert($this->table_baddress, $bdata);

			$ba_id = $this->db->insert_id();

			return $ba_id;

		}

	}

	

	public function get_baddress($empid=null)

	{

	

		$this->db->from($this->table_baddress);
		$this->db->select('*');
		$query = $this->db->get();

		return $query->row_array();

	}

	

	public function get_orderid()

	{

		$query = $this->db->query("select trans_id from ".$this->table_trans." order by trans_id desc limit 0, 1");

		return $query->row_array();

	}

	

	public function ins_trans($amount=null)

	{

		$trdata = array(

				'trans_authcode'=>'',

				'emp_id'=>$this->session->userdata('hireid'),

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

		$this->db->where('emp_id',$this->session->userdata('hireid'));

		$this->db->where('trans_id', $trid);

		$this->db->update($this->table_trans, $tdata);

	}

	

	public function ins_order($transid=null, $proname=null, $proamount=null)

	{

		$ordata = array(

				'trans_id'=>$transid,

				'emp_id'=>$this->session->userdata('hireid'),

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

		$query = $this->db->query("select trans_id, trans_authcode, trans_amt, trans_dt, trans_result, trans_pt_invoice_id, trans_transaction_id, 	trans_pay_respcode, trans_status from ".$this->table_trans." where trans_id=".$tranid);

		return $query->row_array();

	}

	

	public function get_billdetails_all()

	{

		$query = $this->db->query("select ord.ord_id, ord.trans_id, ord.emp_id, ord.ord_product, ord.ord_amt, ord.ord_date, t.trans_pt_invoice_id  from ".$this->table_orders." ord left join ".$this->table_trans." t on t.trans_id=ord.trans_id where ord.emp_id=".$this->session->userdata('hireid')." order by ord.ord_id desc");

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {

				$data[] = $row;

			}

			return $data;

		}

		return false;

	}

		

	public function get_country()

    {	

       	$query = $this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");

		$country_list = $query->result();

		$dropDownList['']='Country';

		foreach($country_list as $dropdown) {

			$dropDownList[$dropdown->co_id] = $dropdown->co_name;

		}

		return $dropDownList;

    }		


    function cheksecr($userID)
    {
    	$this->db->select('SUM(ch_tempcart.temp_amt) as sum ');
    	$this->db->where('temp_emp_id', $userID);
    	return $this->db->get('ch_tempcart')->row_array();
    }

    public function getmuser($umid)
    {
    	$this->db->where('emp_id', $umid);
    	return $this->db->get('ch_employer')->row_array();
    }



    /* update tem cart */
    public function updateItems($perItem,$itemId,$perAmount,$upjobs)
    {
    	$this->db->where('temp_encrypt_id', $itemId);
    	$this->db->where('temp_amt', $perAmount);
    	$query = $this->db->update('ch_tempcart', array('temp_items' =>$perItem, 'temp_nojobs'=>$upjobs ));
    	return true;
    }


		public function updateBillingAddress($billinkgdata, $userID)
		{
			$this->db->where('emp_id', $userID);
			$getData = $this->db->get('ch_emp_billaddress');
			if ($getData->num_rows() > 0) {
				$this->db->where('emp_id', $userID);
				$this->db->update('ch_emp_billaddress', $billinkgdata);
			}
			else{
				$this->db->insert('ch_emp_billaddress', $billinkgdata);
			}

			return true;
		}

/* update pay ment status */
	public function paymentStatus($hid,$psd)
	{

		$this->db->where('temp_status', 'T');
		$this->db->where('temp_emp_id', $hid);
		$this->db->update('ch_tempcart', $psd);
		return true;
	}


/* Payment stauts */

public function newSubscription($paypalInfo)
{
	
	$hid = $this->session->userdata('hireid');
	$this->db->where('temp_status', 'T');
	$this->db->where('temp_emp_id', $hid);
	$query = $this->db->get('ch_tempcart')->result();
	$this->doSubscription($query);
	return true;
	
}


	function doSubscription($query)
	{
		$hid = $this->session->userdata('hireid');
		
		foreach ($query as $key => $value) {
			$where = $value->temp_session;
			$this->db->where('pr_encrypt_id',$where);
			$data[] = $this->db->get('ch_pricing')->row_array();
		}
		
		for ($i=0; $i < count($data); $i++) {
			$today = date('Y/m/d H:i:s');
			$expdate = date('Y-m-d H:i:s',strtotime($today . "+".$data[$i]['peried']." days"));
			$sdata=array(
				'emp_id'			=>$hid,
				'sub_nojobs'		=>$data[$i]['pr_limit'],
				'sub_nocv'			=>$data[$i]['pr_cvno'],
				'sub_packid'		=>$data[$i]['pr_encrypt_id'],
				'sub_ex_limits'		=>$data[$i]['exprence_level'],
				'sub_expire_dt'		=>$expdate,
				'sub_type'			=>1,
				'sub_status'		=>1
			);
			
			$this->db->insert($this->table_subscribe, $sdata);	
		}
		
		if ($this->db->affected_rows() > 0) {
			
			return true;
		}
		else{
			echo "yake";

			return false;
		}
		
	}



public function subdetails($subid)
{
	$this->db->where('temp_encrypt_id', $subid);
	$query = $this->db->get('ch_tempcart')->row_array(); 
	return $query;

}

}