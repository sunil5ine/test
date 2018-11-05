<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'  ?>
	<!-- End header -->

	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<?php include 'include/left-nav.php'  ?>
				
				<div class="col  s12 l9">
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5"><?php  echo $pagehead ?></p>
							
						</div>
						
					</div>

					<div class="card ">
						<div class="card-content">
							<form class="hide-form" method="post" name="edufrm" id="edufrm" action="<?php echo $this->config->base_url().'Dashboard/update_education'?>" >
					      		<div class="mar-top-pop">
							            <div class="row ">
							            	<input type="hidden" name="edid" value="<?php echo $education['ceid']  ?>">
							            	<div class="col s12 l12 m12">
							            		<label class="lable-text">School / University</label>
											<input  type="text" class="validate borderd-0"  placeholder="School/University" value="<?php echo $education['ceshool']  ?>" name="school" id="school" required style="border-radius: 0; height: 38px;">
							            </div>
							            <div class="col s12 l6 m6">
							                       	<label class="lable-text">Qualification</label>
							            	<?php echo form_dropdown('degree_type',$degree_type_list,$education['cdegtype'],'id="degree_type" class=" form-control" tabindex="1" required');?>
							            </div>
							            <div class="col s12 l6 m6">
							                       	<label class="lable-text">Degree</label>
							            	<?php echo form_dropdown('degree',$degree_list,$education['deg_id'],'id="degree" class=" form-control" tabindex="1" required');?>
							            </div>
							            <div class="col s12 l12 m12">
							               <label class="lable-text">Specialization</label>
							               <input  type="text" class="validate borderd-0" placeholder="Specialization" value="<?php echo $education['cspliz']  ?>" name="spec" id="spec" required style="border-radius: 0; height: 38px;">
							            </div>
							            <div class="col s12 l6 m6">
							               <label class="lable-text">From</label>
							                <?php echo form_dropdown('edufrmyr',$year_list,$education['cstrt'],'id="edufrmyr" class=" form-control" tabindex="1" required');?>
							            </div>
							            <div class="col s12 l6 m6">
							               <label class="lable-text">To</label>
							                <?php echo form_dropdown('edutoyr',$year_list,$education['cendt'],'id="edutoyr" class=" form-control" tabindex="1" required');?>
							            </div>
							        </div>
							    </div>
						    	<div class="presonal-head-required1 right-align">
						    		<a href="<?php echo base_url() ?>MyProfile"  class="btn-flat waves-effect black-text modal-close">Cancel</a>
									<button type="submit" value="Update" class="btn brand waves-effect white-text">Save</button>
								</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php echo include'include/footer.php' ?>

<!-- footer -->



	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script type="text/javascript">
		 $(document).ready(function(){
		    $('select').formSelect();
		  });
	</script>
</body>
</html>