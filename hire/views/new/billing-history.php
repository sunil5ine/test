<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url')?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('adm_url') ?>dist/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('adm_url') ?>dist/dataTable/button/css/buttons.dataTables.css">
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php' ?>
	<!-- end nav bar -->

	<!-- Applied Jobs -->

	<section>
		<div class="row m0">
			<div class="container-wrap">
				<?php include 'include/menu.php' ?>
				<div class="col  s12 l9">
                    <div class="row">
                        <div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5">Billing History</p>
                            <small><i>Subscription History</i></small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <table id="dynamic" class="striped">
                                <thead>
                                   <tr class="tt">
                                      <th class="h5-para-p2">Name</th>
                                      <th class="h5-para-p2">Amount</th>
                                      <th class="h5-para-p2">Date</th>
                                      <th class="h5-para-p2">No Of Jobs</th>
                                      <th class="h5-para-p2">Expiry Date</th>
                                      <th class="h5-para-p2">Verified Cv</th>
                                      <th class="h5-para-p2">Experience Level</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bills as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->pr_name ?></td>
                                            <td><?php echo '$ '. $value->pr_offer ?></td>
                                            <td>
                                                <?php echo date('d-m-y',strtotime($value->sub_expire_dt.' - '.$value->peried.' Days ')) ?>
                                            </td>
                                            <td class="center"><?php echo $value->pr_cvno ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($value->sub_expire_dt)) ?></td>
                                            <td class="center"><?php echo $value->pr_limit ?></td>
                                            
                                            <td><?php echo $value->exprence_level ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                             </table>
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

    <!-- data table -->
    <script type="text/javascript" src="<?php echo $this->config->item('adm_url') ?>dist/dataTable/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('adm_url') ?>dist/dataTable/button/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('adm_url') ?>dist/dataTable/button/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('adm_url') ?>dist/dataTable/button/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('adm_url') ?>dist/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('adm_url') ?>dist/dataTable/button/js/vfs_fonts.js"></script>
    <!-- Pdf download -->
    <script>
        $(document).ready( function () {
            $('#dynamic').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf'
                ], 
            });
            $('select').formSelect();
        } );
    </script> 
</body>
</html>