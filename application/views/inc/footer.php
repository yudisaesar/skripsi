<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		2014 &copy; Premiair E-budgeting by Berlima.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script>var base_url = '<?=base_url()?>';</script>
<script>var version_id = <?=$this->version_id?>;</script>
<script src="<?php echo base_url()?>assets/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js" ></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>assets/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/scripts/datatable.js"></script>

<script>
    jQuery(document).ready(function() {       
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
    });
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $(function(){
        if($('.error').length > 0){
            $('.error').delay(3000).fadeOut('slow');
        } 
    });
</script>