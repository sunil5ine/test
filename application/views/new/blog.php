<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<!-- navigation bar -->
<?php include 'include/header.php'  ?>

    <section class="">
        <div class="row">
			<div class="container-wrap">
				<div class="col s12">
					<?php if(isset($status) && $status=='success') { echo $message; } if(isset($status) && $status=='fail') { echo $message; } ?>
				</div>
					<div class="row">
						<div class="title col s12">
							<h5 class="bold black-text mb10">Blogs</h5>
							<p class="m0"><small>Lorem ipsum dolor sit amet consectetur.</small></p>
						</div>
					</div>
				</div>
				<div class="container-wrap">

					<div class="row">
						<?php foreach ($blog as $key => $value) { 
							$title 	= str_replace(" ", "-", $value->title);
							$title = str_replace(",", "", $title);
							$title = str_replace(".", "", $title);
							$title = str_replace("?", "", $title);
							$title = str_replace("/", "", $title);
							
							
							?>
							<div class="col s12 m6 l3">
								<div class="card blog grey lighten-5">
									<div class="card-image" style="overflow: hidden;">
										<?php $file = explode('/',$value->file) ?>
										<img src="<?php echo $this->config->item('ad_url').$file['0'].'/tumb/'.$file['1'] ?>" alt="<?php echo $value->title ?>" style="height:173px;max-wdth:100%;"  class="materialboxed"/>
										<span class="card-title"></span>
									</div>
									<div class="card-content">
										<p class="mb10 bold black-text truncate"><?php echo $value->title ?></p>
										<a href="<?php echo base_url('blog/').$title.'/'.$value->id ?>" class="bold blue-text">Read More</a>
									</div>
								</div>
							</div>
						<?php } ?>
						
					</div><!-- end row -->

					<!-- <div class="row">
						<div class="col s12 m6">
							<h6>Show <span class="black-text">8</span> out of <span class="black-text">20</span></h6>
						</div>
						<div class="col s12 m6 right-align">
							<ul class="pagination">
							  <li class="disabled"><a href="#!">Previous</a></li>
							  <li class="active"><a href="#!">1</a></li>
							  <li class="waves-effect"><a href="#!">2</a></li>
							  <li class="waves-effect"><a href="#!">3</a></li>
							  <li class="waves-effect"><a href="#!">4</a></li>
							  <li class="waves-effect"><a href="#!">5</a></li>
							  <li class="waves-effect"><a href="#!">Next</a></li>
							</ul>
						</div>
					</div> -->

				</div>


			</div>
        </div>
    </section>


<!-- footer -->
<?php echo include'include/footer.php' ?>
<!-- end footer -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
	<script>	
		$(function(){
			$('.materialboxed').materialbox();
		});
	</script>
</body>
</html>