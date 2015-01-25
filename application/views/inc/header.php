<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?=site_url('/')?>">
                <img src="<?=base_url()?>assets/img/logo.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle hide1" src="<?php echo base_url()?>assets/img/avatar.png"/>
                        <span class="username username-hide-on-mobile"> <?= fullname()?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if($this->version_id){?>
                            <li>
                                <a><i class="icon-bar-chart"></i> <strong><?=$this->version_title?> (<?=$this->version_year?>)</strong></a>
                            </li>
                            <li class="divider"></li>
                        <?php }?>
                        <li>
                            <a href="<?=site_url('account/profile')?>">
                            <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li>
                            <a href="<?=site_url('account/change_password')?>">
                            <i class="icon-lock"></i> Change Password</a>
                        </li>
                        <li>
                            <a href="<?=site_url('logout')?>">
                            <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->