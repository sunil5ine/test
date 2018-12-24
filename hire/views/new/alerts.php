
<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/fonts/css/all.min.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/style.css">
	<style type="text/css">
		.toast{background: #f44336}
		.form-set input, .form-set textarea{padding: 0 5px; width: 98% !important; margin-bottom: 0 !important;border-radius: 1px !important}
		.form-set {margin: 13px 0; }
	</style>
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php' ?>
	<!-- end nav bar -->

	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<?php include 'include/menu.php' ?>
			
				<!-- right side -->
				<div class="col m12  s12 l7 pofile-details-table-card">
						
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5">Alerts</p>
                            <small><i></i></small>
                        </div>
                    </div>
                        <div class="row">
                            <div class="collection with-header">
                            <?php 
                            if(!empty($alerts)){
                            foreach ($alerts as $key => $value) { 
                                
                            $jpdate1 	= date("Y-m-d h:i:s",strtotime($value->ea_createdOn));
							$cdate1 	= date("Y-m-d h:i:s");
							$jpdate 	= new DateTime($jpdate1); 
   							$cdate   	= new DateTime($cdate1); 
							$interval 	= $jpdate->diff($cdate);
							$interval->format('%R%a days');
							$pi = $interval->format("%I");
							$ph = $interval->format("%h");
							$pd = $interval->format("%d");
							$pw = $interval->format("%W");
							$pm = $interval->format("%m");
							$py = $interval->format("%y");
							if ($py > 0) {
								($py>1)?$agotime =$py." Years Ago":$agotime =$py." Year Ago";
							}
							elseif ($pm > 0) {
								($pm>1)?$agotime =$pm." Months Ago":$agotime =$pm." Month Ago";
                            }
                            elseif ($pw > 0) {
								($pw>1)?$agotime =$pw." Weeks Ago":$agotime =$pw." Week Ago";
							}
							elseif ($pd > 0) {
								($pd>1)?$agotime =$pd." Days Ago":$agotime =$pd." Day Ago";
							}
							elseif ($ph > 0) {
								($ph>1)?$agotime =$ph." Hours Ago":$agotime =$ph." Hour Ago";
							}
							else{
								($pi>1)?$agotime =$pi." minutes Ago":$agotime =$pi." minute Ago";
							}
                                
                            /** status */
                            $status = '';
                            if($value->ea_status == 0){ $status = 'grey lighten-5';}
                            ?>
                                    <a href="<?php echo base_url('alert/').$value->ea_enc ?>"  class="collection-item <?php echo $status ?>">
                                        <p class="m0">
                                            <?php 
                                                 echo '<span class="right">'.$agotime.'</span>';
                                                 if($value->ea_type == 'Package expired'){
                                                    echo '<span>'.$value->ea_type.' on '.date('d M y',strtotime($value->exp)).'</span><br>';
                                                }else{

                                                    echo '<span>'.$value->ea_type.'</span><br>';
                                                }        

                                                    echo '<span>'.$value->name.'</span><br>';
                                                    
                                                   

                                            ?>
                                        </p>
                                    </a>
							<?php } }else{ ?>   
								<div class="collection-item cv-lists">
									<div class="row m0">
										<div class="col s12">
											<div class="center ptb30">
												<img src="<?php echo $this->config->item('web_url') ?>assets/img/mange.png" class="responsive-img">
												<h5>No Alerts found!</h5>
												<p></p>
												<br>
											</div>
										</div>
									</div>
								</div>
                            <?php } ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
<!-- footer -->
<?php include 'include/footer.php' ?>



	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>

</body>
</html>