
 <div class="col l3 m12 s12">
   <div class="side-bar white z-depth-1">
      <ul class="li-list ">
        <li class="<?php echo($this->uri->segment(1) == 'Dashboard' )?'active' :'' ?>"> <a href="<?php echo base_url('Dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'candidates' )?'active' :'' ?>"><a href="<?php echo base_url('candidates') ?>"><i class="fas fa-users li-icon"></i>Manage Candidate</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'employees' )?'active' :'' ?>"> <a href="<?php echo base_url('employees') ?>"><i class="fas fa-briefcase li-icon"></i>Manage Employees</a></li>
        <li><a href=""><i class="fab fa-black-tie li-icon"></i>Manage Jobs</a></li>
        <li><a href=""><i class="fas fa-hand-holding-usd li-icon"></i>Manage Price</a></li>
        <li><a href="candidate-name.html"><i class="fas fa-search-plus li-icon"></i>People Search</a></li>
        <li class="<?php echo($this->uri->segment(1) == 'cvwriting' )?'active' :'' ?>"><a href="<?php echo base_url('cvwriting') ?>"><i class="fas fa-file-signature li-icon"></i>Cv Writing</a></li>
        <li><a href="psychometric-test.html"><i class="fas fa-file-alt li-icon"></i>Psychometric Test</a></li>
        
      </ul>
   </div>
</div>