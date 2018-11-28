<!DOCTYPE html>
<html>
<head>
	<title><?php echo $blog['metatitle']?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo $blog['metakey']?>">
	<meta name="description" content="<?php echo $blog['metades'] ?>">
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

    <section class="blog-detail">
        <div class="row">
			<div class="container-wrap">
				<div class="col s12">
					<?php if(isset($status) && $status=='success') { echo $message; } if(isset($status) && $status=='fail') { echo $message; } ?>
				</div>
				<div class="col s12 m12 l10 push-l1">
					<div class="bak-holder">
						<a href="#" class=""> <i class="material-icons left">arrow_back</i> Back</a>
					</div>

					<div class="blog-bimage">
						<img src="<?php echo $this->config->item('ad_url').$blog['file']?>" alt="<?php echo $blog['title'] ?>" class="responsive-img materialboxed" style="min-width:100%"/>
					</div>

					<div class="blo-heading-small row">
						<p class="col s12 m11"><?php echo $blog['title'] ?></p>
						<p class="col s12 m1"><a><i class="fas fa-share small right "></i></a></p>
					</div>
					
					<div class="blog-mcontent black-text">
						<?php echo $blog['des'] ?>
					</div>

					<div class="blog-btn-actions">
						<a href="#" class="waves-effect waves-light btn white-text  brand left">Previous Post</a>
						<a href="#" class="waves-effect waves-light btn white-text  brand right">Next Post</a>
					</div>
				</div>
			</div>
        </div>
	</section>

	<section class="blog-tfooter">
		<div class="container-wrap">
			<div class="row">

				<div class="col s12 m4 l4">
					<div class="card blog grey lighten-5">
						<div class="card-image">
							<img src="http://dummy-images.com/business/dummy-300x200-BankCard.jpg" alt=""  class="materialboxed"/>
							<span class="card-title"></span>
						</div>
						<div class="card-content">
							<p class="mb10">I am a very simple card. I am good at containing.</p>
							<a href="" class="bold blue-text">Read More</a>
						</div>
					</div>
				</div>

				<div class="col s12 m4 l4">
					<div class="card blog grey lighten-5">
						<div class="card-image">
							<img src="http://dummy-images.com/business/dummy-300x200-BankCard.jpg" alt=""  class="materialboxed"/>
							<span class="card-title"></span>
						</div>
						<div class="card-content">
							<p class="mb10">I am a very simple card. I am good at containing.</p>
							<a href="" class="bold blue-text">Read More</a>
						</div>
					</div>
				</div>

				<div class="col s12 m4 l4">
					<div class="card blog grey lighten-5">
						<div class="card-image">
							<img src="http://dummy-images.com/business/dummy-300x200-BankCard.jpg" alt=""  class="materialboxed"/>
							<span class="card-title"></span>
						</div>
						<div class="card-content">
							<p class="mb10">I am a very simple card. I am good at containing.</p>
							<a href="" class="bold blue-text">Read More</a>
						</div>
					</div>
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