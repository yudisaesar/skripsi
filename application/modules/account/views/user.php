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
                        <div class="portlet ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-edit"></i>User Accounts [list]
                                </div>
                                <?php $this->load->view('inc/tools');?>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <a href="<?=site_url('account/create')?>">
                                                    <button id="sample_editable_1_new" class="btn green">
                                                    Add New <i class="fa fa-plus"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover data" id="data_table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($rows) {
                                             $num = 1;
                                             foreach($rows as $row) {
                                                 $status = ($row['is_lock']==0) ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-info">Locked</span>';
                                        ?>
                                        <tr>
                                            <td><?=$num?></td>								
                                            <td><?=$row['full_name']?></td>
                                            <td><?=$row['email']?></td>
                                            <td><?=$row['dept']?></td>
                                            <td><?=$row['designation']?> </td>
                                            <td><?=$this->role->get_role($row['role'])?></td>
                                            <td><?=$status?></td>
                                            <td class="center">
                                                <a href="<?=site_url('account/edit/'.$row['id'])?>">Edit</a>
                                            </td>
                                        </tr>
                                        <?php
                                                 $num++;
                                             }
                                         }
                                        ?>
                                    </tbody>
                                </table>
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
    <script src="<?=base_url()?>assets/scripts/data-table.js"></script>
    <!-- END FOOTER -->
</body>
<!-- END BODY -->
</html>