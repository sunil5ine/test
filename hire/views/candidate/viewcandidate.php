<style>
#imgHover {
    border:1px solid #73879c;
    background:#FFF;
}
#imgHover .hover {    
    background: #999 none repeat scroll 0 0;
    color: #FFF;
    display: none;
    position: absolute;
    right: 0px;
    bottom: 0px;
    height: 30px;
    text-align: center;
    
    width: 100%;
    z-index: 2;
}
#imgHover a{ 
    color: #FFF;
    text-decoration:none;
}
#dummy{
    visibility: hidden!Important;
    height:1px;
    width:1px;
}
</style>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
                    <div class="page-title">
                        <?php echo $message; ?>
                        <div class="col-md-1 col-sm-1 col-xs-2">
                            <img src="<?php echo 'http://candidate.cherryhire.com/'.$formdata['can_propic'];?>" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3><?php echo $formdata['cfname'].' '.$formdata['clname']; ?> </h3>
                            <h2><?php echo $formdata['cfarea']; ?> - <?php echo ($formdata['cexp']); echo($formdata['cexp']!='Fresher' && $formdata['cexp']!='0'&& $formdata['cexp']!='00')?'year(s) of experience':'';?></h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-suitcase"></i> <strong>Candidate Details</strong></a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <strong>View Resume</strong></a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <div class="col-md-8 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Profile Overview</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-bookmark"></i> <strong>Current Designation :</strong> <?php echo $formdata['cdesig'];?>
                                                    </div>                                                   
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-building"></i> <strong>Current Company :</strong> <?php echo $formdata['ccomp'];?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-map-marker"></i> <strong>Current Location :</strong> <?php echo $formdata['ccurrloc'];?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Willing to relocate? :</strong>  <?php echo ($formdata['creloc']==1)?'Yes':'No'; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-clock-o"></i> <strong>Preferred Location :</strong> 
                                                       <?php echo $preffered;?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-clock-o"></i> <strong>Experience :</strong> <?php echo $formdata['cexp'].' Yrs';?>
                                                    </div>                                                    
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-sitemap"></i> <strong>Functional Area :</strong> <?php echo $formdata['cfarea']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-anchor"></i> <strong>Industry :</strong> <?php echo $formdata['cindustry']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Nationality :</strong> <?php echo $formdata['nation']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Date of Birth :</strong>  <?php echo $formdata['cdob']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-user"></i> <strong>Gender :</strong>  <?php echo $formdata['gender']; ?>
                                                    </div>  
                                                    
                                                    <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-tags"></i> <strong>Skills :</strong>  <?php //echo $formdata['cskills']; ?>
                                                       <a href="#" id="can_skills" data-name="can_skills"  data-value="<?php //echo $formdata['cskills'];?> "  data-type="text" data-pk="<?php //echo $formdata['encrypt_id']; ?>" data-url="<?php //echo $this->config->base_url().'EditSkill/'.$formdata['encrypt_id'];?>" data-title="Enter Key Skills" style="color:#06F;"><i class="fa fa-edit"></i></a> <i class='fa fa-edit'></i>
                                                    </div> -->                                                    
                                                </div>
                                            </div>

                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Skills</h2> 
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <?php echo $formdata['cskills']; ?>
                                                    </div>                    
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Profile Summary</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php echo $formdata['csummary']; ?>                      
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Work Experience</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php 
                                                        foreach($cwork as $wexp) 
                                                        { 
                                                            $year1 = ($wexp->cexp_from_yr)?$wexp->cexp_from_yr:0;
                                                            $year2 = ($wexp->cexp_to_yr)?$wexp->cexp_to_yr:0;
                                                            
                                                            $month1 = ($wexp->cexp_from_mon)?$wexp->cexp_from_mon:0;
                                                            $month2 = ($wexp->cexp_to_mon)?$wexp->cexp_to_mon:0;
                                                            
                                                            
                                                            /*$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                                            if($diff > 12) {
                                                                $totalyear = $diff/12;
                                                                $expmsg = $totalyear.' year(s) of experience';
                                                            } else {
                                                                $expmsg = $diff.' month(s) of experience';
                                                            }
                                                            */
                                                            $dateObj1   = DateTime::createFromFormat('!m', $month1);
                                                            $monthName1 = $dateObj1->format('F');
                                                            
                                                            $dateObj2   = DateTime::createFromFormat('!m', $month2);
                                                            $monthName2 = $dateObj2->format('F');
                                                            if($wexp->cexp_present == 1) {
                                                                $expmsg = 'From :'.$monthName1.' '.$year1.' to Present';
                                                            } else {
                                                                $expmsg = 'From :'.$monthName1.' '.$year1.' to '.$monthName2.' '.$year2;
                                                            }
                                                            if(isset($wexp->cexp_company)) { 
                                                    ?>
                                                        
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <p>
                                                            <i class="fa fa-building"></i> <strong><?php echo (isset($wexp->cexp_company))?$wexp->cexp_company:'No Name'; ?>, <?php echo (isset($wexp->cexp_location))?$wexp->cexp_location:'Not Set'; ?></strong>
                                                            <em><i class="fa fa-history"></i> <?php echo $expmsg.' as '.$wexp->cexp_position;?></em>
                                                        </p>
                                                        <p>
                                                        <strong>Key Role :</strong>
                                                        <?php echo $wexp->cexp_key_role;?>                                                        
                                                        </p>
                                                    </div>
                                                    <?php } } ?>
                                                    
                                                </div>
                                            </div>

                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Education</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <?php if(!empty($cedu_details)) { ?>
                                                    <table id="mechantlist" class="table table-striped responsive-utilities jambo_table">
                                                        <thead>
                                                            <tr class="headings">
                                                                <th>School name </th>
                                                                <th>Qualification </th>
                                                                <th>Specialization </th>
                                                                <th>Start</th>
                                                                <th>End </th>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php if(!empty($cedu_details)) { $x=0; foreach ($cedu_details as $educdetails) { $x++; ?>
                                                            <?php
                                                                if($x%2 == 0)
                                                                {
                                                                    $tdcls = 'even pointer';
                                                                }
                                                                else
                                                                {
                                                                    $tdcls = 'odd pointer';
                                                                }
                                                            
                                                                $startyear = ($educdetails->cedu_startdt)?$educdetails->cedu_startdt:0;
                                                                $endyear = ($educdetails->cedu_enddt)?$educdetails->cedu_enddt:0;

                                                                if(isset($educdetails->cedu_school)) { 
                                                            ?>
                                                        
                                                    
                                                            <tr class="<?php echo $tdcls; ?>">
                                                                <td class=" "><?php echo $educdetails->cedu_school;?></td>
                                                                <td class=" "><?php echo $educdetails->deg_type_sdisplay;?></td>
                                                                <td class=" "><?php echo $educdetails->deg_sdisplay.'-'.$educdetails->cedu_specialization;?></td>
                                                                <td class=" "><?php echo $startyear;?></td>
                                                                <td class=" "><?php echo $endyear;?></td>
                                                            </tr>
                                                    
                                                            <?php } } } ?>
                                                        </tbody>

                                                    </table>
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Connect Details</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-envelope"></i> <strong>Email ID :</strong>  <?php echo $formdata['cmail']; ?>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-phone-square"></i> <strong>Contact No :</strong> <?php echo '+'.$formdata['cccode'].' '.$formdata['cphone']; ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Social Media Connections</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-linkedin"></i> <strong>LinkedIn :</strong> <?php echo ($formdata['linkurl']=='')?'Not Set':$formdata['linkurl']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-facebook"></i> <strong>Facebook :</strong> <?php echo ($formdata['fburl']=='')?'Not Set':$formdata['fburl']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-twitter"></i> <strong>Twitter :</strong> <?php echo ($formdata['twurl']=='')?'Not Set':$formdata['twurl']; ?>
                                                    </div>
            
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-google-plus"></i> <strong>Google+ :</strong> <?php echo ($formdata['gurl']=='')?'Not Set':$formdata['gurl']; ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <!--<div class="x_title">
                                                    <h2>Job Settings</h2>
                                                    <div class="clearfix"></div>
                                                </div>-->
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Created On :</strong>  <?php echo ($formdata['createddt']==0)?'Not Set': date('d-M-Y', strtotime($formdata['createddt'])); ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Last Updated :</strong>  <?php echo ($formdata['updateddt']==0)?'Not Set': date('d-M-Y', strtotime($formdata['updateddt'])); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Resume</h2>                                                    
                                                    <a href="<?php echo $formdata['cv_path']; ?>" target="_blank"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Download</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                       <!--style="width: 1100px; height: 900px;" -->
                                                       <?php if($formdata['cv_path']!='') { ?>
                                                       <iframe src="http://docs.google.com/viewerng/viewer?url=<?php echo $formdata['cv_path']; ?>&embedded=true" style="width: 900px; height: 600px;" frameborder="0"></iframe>
                                                       <?php } ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                    </div>   
                                    
                                </div>
                            </div>
                        </div>
                        
                        <br />
                        <br />
                        <br />

                    </div>
                </div>
        <!-- footer content -->
        <?php echo $footer_nav; ?>
        <!-- /footer content -->
    </div>
    <!-- /page content -->
