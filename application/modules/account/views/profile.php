<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php $this->load->view('inc/head');?>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed ">
    <!-- BEGIN HEADER -->
    <?php $this->load->view('inc/header');?>
    <!-- END HEADER -->
    <div class="clearfix"></div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">

        <!-- BEGIN SIDEBAR -->
        <?php $this->load->view('inc/menu');?>
        <!-- END SIDEBAR -->

        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">Profile</h3>
                <div class="page-bar">
                    <?php $this->load->view('inc/breadcrumb');?>
                </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>User Accounts [profile]
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="" class="form-horizontal" method="post">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email Address</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon ">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="text" class="form-control" disabled="disabled" value="<?=$row->email?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Full Name</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" disabled="disabled" value="<?=$row->full_name?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Department</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" disabled="disabled" value="<?=$row->department_name?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Designation</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" disabled="disabled" value="<?=$row->designation_name?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Role</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" disabled="disabled" value="<?=$this->role->get_role($row->role)?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-4">
                                                <a href="<?=site_url('account/change_password')?>" class="btn blue">Change Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <!-- END PAGE CONTENT -->
            </div>
        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php $this->load->view('inc/footer');?>
    <!-- END FOOTER -->
</body>
<!-- END BODY -->
</html>