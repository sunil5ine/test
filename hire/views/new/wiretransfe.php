<?php header('Access-Control-Allow-Origin: *'); ?>

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
	<style type="text/css">
		input, select{margin-top: 3px !important;margin-bottom: 15px !important;}
		label{font-size: 13px}
	</style>
</head>
<body>
	<?php include 'include/header.php' ?>
	<section> 
		<div class="container-wrap"> 
            <?php echo $message; ?>
            <div class="row">
                <div class="col m8 s12 push-m2">
                    <div class="card">
                       <div class="wrf-table">
                        <h6 class="center-align">Bank Account Details </h6>
                       </div>
                        <div class="card-content" style="padding-top: 8px;">
                        <table class="striped ">
                            <tbody>
                                <tr >
                                    <th width=' 137px'>Beneficiary Name</th>
                                    <td>IPF CONSULTING W.L.L.</td> 
                                </tr>  
                                <tr>
                                    <th>Office Address</th>
                                    <td>PO Box No 60705, AL Seef, Kingdom of Bahrain</td> 
                                </tr>  
                                <tr>
                                    <th>Bank Name</th>
                                    <td>State Bank of India, Bahrain</td> 
                                </tr>  
                                <tr>
                                    <th>Bank Address</th>
                                    <td>Bank Address	Office No 707, Building No 705 (Diplomat City Tower)
                                        Diplomat Area, Manama, PO Box No 10763
                                    </td> 
                                </tr>  
                                <tr>
                                    <th>Account No</th>
                                    <td>02700683020001</td> 
                                </tr>  
                                <tr>
                                    <th>Swift Code</th>
                                    <td>Swift Code	SBINBHBMFCB</td> 
                                </tr>  
                                <tr>
                                    <th>IBAN No</th>
                                    <td>IBAN No	BH13SBIN02700683020001</td> 
                                </tr>  
                                <tr>
                                    <th>Currency</th>
                                    <td>Currency	Bahraini Dinar (BHD)</td> 
                                </tr>  
                                <tr>
                                    <td></td>
                                    <td class="right-align">
                                        <a href="<?php echo base_url()?>Subscriptions/Cart" class="btn brand waves-effect waves-light"><i class="material-icons left">arrow_back</i> Back</a>
                                    </td>
                                </tr>                         
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </section>
    <?php include 'include/footer.php' ?>

<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
</body>
</html>