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
                <h3 class="page-title">Change Password</h3>
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
                                    <i class="fa fa-gift"></i>User Accounts [change password]
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="" class="form-horizontal" method="post">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <?php if($status=='success'){?>
                                                <div class="alert alert-success error col-md-offset-3 col-md-6">
                                                    <strong>Sukses!</strong> Berhasil Ganti Password.
                                                </div>
                                            <?php }?>
                                            <?php if($status=='error'){?>
                                                <div class="alert alert-danger error col-md-offset-3 col-md-6">
                                                    Password yang anda masukkan tidak cocok. Silahkan ulangi!
                                                </div>
                                            <?php }?>
                                            <?php echo validation_errors();?>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-4">
                                                <input type="password" name="current" class="form-control" placeholder="Type current password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">New password</label>
                                            <div class="col-md-4">
                                                <input type="password" name="password" class="form-control" placeholder="Type new password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password Confirmation</label>
                                            <div class="col-md-4">
                                                <input type="password" name="passconf" class="form-control" placeholder="Retype new password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue">Save</button>
                                                <a href="<?=site_url('account/profile')?>" class="btn default">Cancel</a>
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