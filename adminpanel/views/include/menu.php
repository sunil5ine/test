
 <div class="col l3 m12 s12">

   <div class="side-bar white z-depth-1">
      <ul class="li-list ">
        <li class="<?php echo($this->uri->segment(1) == 'Dashboard' )?'active' :'' ?>"> <a href="<?php echo base_url('Dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'candidates' )?'active' :'' ?>"><a href="<?php echo base_url('candidates') ?>"><i class="fas fa-users li-icon"></i>Manage Candidate</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'employees' )?'active' :'' ?>"> <a href="<?php echo base_url('employees') ?>"><i class="fas fa-briefcase li-icon"></i>Manage Employers</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'jobs' )?'active' :'' ?>"><a href="<?php echo base_url('jobs/manage-jobs') ?>"><i class="fab fa-black-tie li-icon"></i>Manage Jobs</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'price' or $this->uri->segment(1) == 'pricing' )?'active' :'' ?>"><a href="<?php echo base_url('price') ?>"><i class="fas fa-hand-holding-usd li-icon"></i>Manage Price</a></li>
        <li  class="<?php echo($this->uri->segment(1) == 'search' or $this->uri->segment(1) == 'search' )?'active' :'' ?>"><a href="<?php echo base_url('search/candidate') ?>"><i class="fas fa-search li-icon"></i>Candidate Search</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'cvwriting' )?'active' :'' ?>"><a href="<?php echo base_url('cvwriting') ?>"><i class="fas fa-file-signature li-icon"></i>Cv Writing</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'psychometric' )?'active' :'' ?>"><a href="<?php echo base_url('psychometric') ?>"><i class="fas fa-file-alt li-icon"></i>Psychometric Test</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'blog' )?'active' :'' ?>"><a href="<?php echo base_url('blog/lists') ?>"><i class="fas fa-share-alt li-icon"></i>Blog</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'testimonial' )?'active' :'' ?>"><a href="<?php echo base_url('testimonial/list') ?>"><i class="far li-icon fa-comments"></i>Testimonial</a></li>
        <?php  if($this->session->userdata('admintype') == 1) { ?>
          <li class="<?php echo($this->uri->segment(1) == 'admin' )?'active' :'' ?>"><a href="<?php echo base_url('admin') ?>"><i class="fas fa-user-plus li-icon"></i>Add New Admin</a></li>
        <?php } ?>
      </ul>
   </div>
</div>