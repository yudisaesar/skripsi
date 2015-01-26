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
                <h3 class="page-title">Department</h3>
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
                                    <i class="fa fa-gift"></i>Department [add]
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="" class="form-horizontal" method="post">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Departement</label>
                                            <div class="col-md-4">
                                                <input type="text" name="name" class="form-control " placeholder="Enter name" value="<?= set_value('name')?>">
                                                <?=form_error('name', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Abbreviation</label>
                                            <div class="col-md-4">
                                                <input type="text" name="abbr" class="form-control " placeholder="Enter abbr" value="<?= set_value('abbr')?>">
                                                <?=form_error('abbr', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Description</label>
                                            <div class="col-md-4">
                                                <input type="text" name="desc" class="form-control " placeholder="Enter desc" value="<?= set_value('desc')?>">
                                                <?=form_error('desc', '<span class="help-block error">', '</span>')?>
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