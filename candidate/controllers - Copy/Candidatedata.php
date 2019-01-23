<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class candidatedata extends CI_Controller {



	public function __construct()

	{

		parent::__construct();
		$this->load->model('Candidatemodel');
		// $this->load->model('jobsmodel');
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$cid = $this->session->userdata('cand_chid');

	}
	/*applied jobs list*/
	function applied_jobs()
	{
		$icount = 0;
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$cid = $this->session->userdata('cand_chid');
		$this->data['aplJobs'] = $this->Candidatemodel->applied_jobs($cid);
		// foreach ($this->data['aplJobs'] as $row) {if($row->ja_status == 1){$icount = $icount + 1; } }
		
		$this->data['count'] = $icount;
		$this->load->view('new/applied-jobs',$this->data);

	}

/*cancel applied jobs*/
	function cancle_jobs($enis=null)
	{
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$cid = $this->session->userdata('cand_chid');
		if($this->Candidatemodel->cancle_job($cid,$enis))
		{
			$this->session->set_flashdata('message','<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully canceled! </div>');
			redirect('applied-jobs');
		}else
		{
			$this->session->set_flashdata('message','<div style="margin-top: 16px;" class="alert alert-error">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Cancelation  Failed! </div>');
			redirect('applied-jobs');
		}
	}

/* save jobs */
	public function saveto_account($jobid='',$uid='')
	{
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
			$cid = $this->session->userdata('cand_chid');
			$this->load->helper('string');
			$rand = random_string('alpha', 26);
			$data = array('sv_encrypt_id' => $rand, 'job_id'=>$jobid, 'can_id'=> $cid);
			if($this->Candidatemodel->saveto_account($data,$jobid,$cid))
			{
				$this->session->set_flashdata('message','<div style="margin-bottom: -2px;" class="alert alert-success">
					 <button data-dismiss="alert" class="close" type="button">x</button>Job saved successfully!</div>');
				redirect('Jobs/Viewdetails/'.$uid);
			}else
			{
				$this->session->set_flashdata('message','<div style="margin-bottom: -2px;" class="alert alert-error">
					 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to save the job! </div>');
				redirect('Jobs/Viewdetails/'.$uid);
			}
	}


/* view saved jobs*/
	public function saved_jobs()
	{
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$cid = $this->session->userdata('cand_chid');
		$this->data['savedjobs']=$this->Candidatemodel->saved_jobs($cid);
		$this->load->view('new/saved-jobs',$this->data);
	}

	/* remove saved jobs */
	public function remove_saved_jobs($jobid=null)
	{
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$cid = $this->session->userdata('cand_chid');
		if($this->Candidatemodel->remove_saved_jobs($jobid,$cid))
			{
				$this->session->set_flashdata('message','<div style="margin-bottom: -2px;" class="alert alert-success">
					 <button data-dismiss="alert" class="close" type="button">x</button>Successfully removed!</div>');
				redirect('saved-jobs');
			}else
			{
				$this->session->set_flashdata('message','<div style="margin-bottom: -2px;" class="alert alert-error">
					 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to remove the sved job! </div>');
				redirect('saved-jobs');
			}
	}

}