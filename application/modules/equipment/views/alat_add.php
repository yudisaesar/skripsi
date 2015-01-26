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
                                            <label class="col-md-3 control-label">Kode Alat</label>
                                            <div class="col-md-4">
                                                <input type="text" name="kode" class="form-control " placeholder="Enter kode" value="<?= set_value('kode')?>">
                                                <?=form_error('kode', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Alat</label>
                                            <div class="col-md-4">
                                                <input type="text" name="name" class="form-control " placeholder="Enter name" value="<?= set_value('name')?>">
                                                <?=form_error('name', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Business Type</label>
                                            <div class="col-md-4">
                                                <select name="location_id" class="form-control">
                                                <option value="">Select Location</option>
                                                    <?php if($location) { 
                                                        foreach($location as $r) { ?>
                                                        <option value="<?=$r['id']?>"<?=set_select('location_id', $r['id'])?>><?=$r['name']?></option>
                                                    <?php  } } ?>
                                                </select>
                                                <?=form_error('business_type_id', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>          
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue">Save</button>
                                                <a href="<?=site_url('equipment/alat')?>" class="btn default">Cancel</a>
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