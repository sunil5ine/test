<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url();?>css/custom.css" rel="stylesheet">

<link href="<?php echo $this->config->base_url();?>css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
<script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>


<style>
div#pop-up {
  display: none;
  position: absolute;
  width:auto;
  padding: 10px;
  background: #D06CB3;
  color: #000000;
  border: 1px solid #1a1a1a;
  font-size: 90%;
  border-radius:5px;
}

.web_dialog_popup {
    
    
    display: block;
    font-family: Verdana;
    font-size: 10pt;
    height: auto;
    z-index: 102;
	-moz-border-radius: 10px;
	border-radius: 10px;
	padding-bottom:5px;
}
.web_dialog_title {
    background-color: #E5155E;
    border-bottom: 2px solid #E5155E;
    color: White;
    font-weight: bold;
    padding: 4px;
}
.web_dialog_title a {
    color: White;
    text-decoration: none;
}
.pro_align {
	padding-left:10px;
}
.form_button {
    background: none repeat scroll 0 0 #E5155E;
    border: medium none;
}
.button {
    -moz-transition: background-color 0.25s ease-in-out 0s;
    border-radius: 5px 5px 5px 5px;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-size: 12px;
    font-weight: bold;
    margin-right: 3px;
    padding: 4px 14px;
    text-transform: uppercase;
}

.td-color {
	background:#F9F9F9;
}

a.boxclose{
    float:right;
    margin-top:-13px;
    margin-right:-13px;
    cursor:pointer;
    color: #fff;
    /*border: 1px solid #e5155e;
    border-radius: 10px;
    background: #e5155e;*/
    font-size: 14px;
    font-weight: bold;
    display: inline-block;
    line-height: 16px;
    padding: 3px 3px;       
}

#pagination{ margin: 40 40 0; }
ul.tsc_pagination li a { border:solid 1px; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; padding:6px 9px 6px 9px; }
ul.tsc_pagination li { padding-bottom:1px; }
ul.tsc_pagination li a:hover, ul.tsc_pagination li a.current { color:#FFFFFF; box-shadow:0px 1px #EDEDED; -moz-box-shadow:0px 1px #EDEDED; -webkit-box-shadow:0px 1px #EDEDED; }
ul.tsc_pagination { margin:4px 0; padding:0px; height:100%; overflow:hidden;

font:12px 'Tahoma';

list-style-type:none;

}

ul.tsc_pagination li

{

float:left;

margin:0px;

padding:0px;

margin-left:5px;

}

ul.tsc_pagination li a

{

color:black;

display:block;

text-decoration:none;

padding:7px 10px 7px 10px;

}

ul.tsc_pagination li a img

{

border:none;

}

ul.tsc_pagination li a

{

color:#0A7EC5;

border-color:#8DC5E6;

background:#F8FCFF;

}

ul.tsc_pagination li a:hover,

ul.tsc_pagination li a.current

{

text-shadow:0px 1px #388DBE;

border-color:#3390CA;

background:#58B0E7;

background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);

background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));

}

</style>    
</head>

<body>
<div class="web_dialog_popup">

	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<div class="x_title">
            <h2>Candidate List</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="boxclose" id="boxclose" onclick="window.parent.tb_remove(true);" href="javascript:void(0);"><img src="<?php echo base_url(); ?>images/b_drop.png" alt="x" /></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="clist" class="table table-striped responsive-utilities jambo_table">
                <tbody>
                <?php if(!empty($cand_record)) { $x=0; foreach ($cand_record as $result) { $x++; ?>
                <?php
                    if($x%2 == 0)
                    {
                        $tdcls = 'even pointer';
                    }
                    else
                    {
                        $tdcls = 'odd pointer';
                    }
                ?>
                    <tr class="<?php echo $tdcls; ?>">
                        <td class=" " width="75%">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2><a href="<?php echo $this->config->base_url();?>Candidate/ViewDetails/<?php echo $result->can_id;?>" target="_blank"><?php echo $result->can_fname.' '.$result->can_lname;?></a></h2>
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-envelope"></i> <?php echo $result->can_email;?></div>
                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-mobile"></i> <?php echo $result->can_ccode.'-'.$result->can_phone;?></div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-clock-o"></i> <?php echo $result->can_experience;?> Year(s) of experience</div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-flag"></i> <?php echo $result->co_name;?></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-3 col-xs-12"><i class="fa fa-building"></i> <?php echo $result->can_curr_company;?></div>
                                <div class="col-md-6 col-sm-3 col-xs-12"><i class="fa fa-map-marker"></i> <?php echo $result->can_curr_loc;?></div>
                            </div>  
                            <div class="row form-group">  
                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-sitemap"></i> <?php echo $result->fun_name;?></div>
                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-graduation-cap"></i> <?php echo $result->edu_name;?></div>
                            </div>
                            
                        </div>
                        
                        
                        </td>
                    </tr>
                    <?php  } }?>
                    
                </tbody>

            </table>
        </div>
    </div>
	</div>
</div>
<script src="<?php echo $this->config->base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->base_url();?>js/bootstrap-editable.js"></script>
<script src="<?php echo $this->config->base_url();?>js/custom.js"></script>
<script src="<?php echo $this->config->base_url();?>js/validator/validator.js"></script>
<script src="<?php echo $this->config->base_url();?>js/datatables/js/jquery.dataTables.js"></script>
<script src="<?php echo $this->config->base_url();?>js/datatables/tools/js/dataTables.tableTools.js"></script>

<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
		/*$('#co_code').editable();
		$('#co_name').editable();
		$('#co_del_status').editable();*/
		$('.is_editable').editable();
});
</script>
<script>
	var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#clist').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
						{ "aTargets": [ 0 ], "bSortable": false },
						{ "aTargets": [ 1 ], "bSortable": false }
					],
					"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        			"iDisplayLength": 25,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url().'js/datatables/tools/swf/copy_csv_xls_pdf.swf'; ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
</script>
</body>
</html>