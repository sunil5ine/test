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
	<!-- navigation bar -->
	
	<?php include 'include/header.php'  ?>
	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<?php include 'include/left-nav.php'  ?>
				<div class="col  s12 l7">
					<div class="row">	
						<div class="appl-job-heading col m6 s8 l6 ">
							<p class="black-text h5">Notification <span>(<?php 
								if (!empty($counts)) { echo $counts;}else{echo "0";} ?>)</span></p>
							<small><i>View all your Recent notification</i></small>
						</div>
						<div class="col m6 s8 l6 ">
							<?php echo $this->session->flashdata('message');?>
						</div>
					</div>
   
                    <div class="row">
                        <div class="collection with-header">
                        <?php 
                        if(!empty($noti)){
                        for ($i=0; $i < count($noti); $i++){        

                        $jpdate1 	= date("Y-m-d h:i:s",strtotime($noti[$i]['date']));
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
                        if($noti[$i]['ca_status'] == 0){ $status = 'grey lighten-5';}
                        ?>
                                <a href="<?php echo base_url('notification/get/').$noti[$i]['ca_id'] ?>"  class="collection-item <?php echo $status ?>">
                                    <p class="m0">
                                        <?php 
                                             echo '<span class="right">'.$agotime.'</span>';
                                             

                                                echo '<span class="black-text">'.$noti[$i]['title'].'</span><br>';
                                                   
                                            if($noti[$i]['name'] == 'package-exp'){
                                                echo '<span>Package expired on '.date("d M y",strtotime($noti[$i]['date'])).'</span><br>';
                                            }else{
                                                echo '<span>'.$noti[$i]['name'].'</span><br>';
                                            }
                                               
                                                
                                               

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
	<?php echo include'include/footer.php' ?>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
</body>
</html>