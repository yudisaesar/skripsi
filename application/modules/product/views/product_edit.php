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
                <h3 class="page-title">Product</h3>
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
                                    <i class="fa fa-gift"></i>Product [edit]
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="" class="form-horizontal" method="post">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Produk</label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_produk" class="form-control " placeholder="Enter name" value="<?= set_value('nama_produk', $row->nama_produk)?>">
                                                <?=form_error('nama_produk', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Batch</label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_batch" class="form-control " placeholder="Enter no_batch" value="<?= set_value('no_batch', $row->no_batch)?>">
                                                <?=form_error('no_batch', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lot No.</label>
                                            <div class="col-md-4">
                                                <input type="text" name="lot_no" class="form-control " placeholder="Enter lot_no" value="<?= set_value('lot_no', $row->lot_no)?>">
                                                <?=form_error('lot_no', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Cont No.</label>
                                            <div class="col-md-4">
                                                <input type="text" name="cont_no" class="form-control " placeholder="Enter cont_no" value="<?= set_value('cont_no', $row->cont_no)?>">
                                                <?=form_error('cont_no', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Potency</label>
                                            <div class="col-md-4">
                                                <input type="text" name="potency" class="form-control " placeholder="Enter potency" value="<?= set_value('potency', $row->potency)?>">
                                                <?=form_error('potency', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Expiration Date</label>
                                            <div class="col-md-4">
                                                <input type="date" name="exp_date" class="form-control " placeholder="Enter exp_date" value="<?= set_value('exp_date', $row->exp_date)?>">
                                                <?=form_error('exp_date', '<span class="help-block error">', '</span>')?>
                                            </div>
                                        </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue">Save</button>
                                                <a href="<?=site_url('product')?>" class="btn default">Cancel</a>
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