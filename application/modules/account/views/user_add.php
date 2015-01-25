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
                <h3 class="page-title">User Accounts</h3>
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
                                    <i class="fa fa-gift"></i>User Accounts [add]
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
                                                    <input type="email" name="email" class="form-control " placeholder="Email Address" value="<?= set_value('email')?>"/>
                                                </div>
                                                <?=form_error('email', '<span class="help-block error">', '</span>')?>
                                                <?=(isset($error_message))?'<span class="help-block error">'.$error_message.'</span>':""?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Full Name</label>
                                            <div class="col-md-4">
                                                <input type="text" name="full_name" class="form-control " placeholder="Enter full name" value="<?= set_value('full_name')?>">
                                                <?=form_error('full_name', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-4">
                                                <input type="password" name="password" class="form-control" placeholder="Type your password">
                                                <?=form_error('password', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Retype password</label>
                                            <div class="col-md-4">
                                                <input type="password" name="password_repeat" class="form-control" placeholder="Retype the password">
                                                <?=form_error('password_repeat', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Role</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <?php foreach ($role as $i=>$v){?>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="role" <?=set_radio('role',$i)?> value="<?=$i?>"/>
                                                            <?=$v?>
                                                        </label>
                                                    <?php }?>
                                                </div>
                                                <?=form_error('role', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue">Save</button>
                                                <a href="<?=site_url('account')?>" class="btn default">Cancel</a>
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
    <script>
        jQuery(document).ready(function() {
            $('#department_id').change(function(){
                var id = this.value;
                if(id !='' ){
                    $.post( base_url + 'account/ajax_designation', { department_id: id } ).done(function( data ) {
                       $( "#designation_id" ).empty().append( data );
                    });
                }
            });
        });
    </script>
    <!-- END FOOTER -->
</body>
<!-- END BODY -->
</html>