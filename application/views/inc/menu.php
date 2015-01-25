<?php 
    $segment1 = $this->uri->segment(1);
    $segment2 = $this->uri->segment(2);
    $segment3 = $this->uri->segment(3);
    $token = $this->input->get('token');//Token template
    
    //print_r(menu(1));exit;
?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"></div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!--active open-->
            <li  class="<?=$a=($segment1=='home' or $segment1=='')?'active open':''?>">                                    
                <a href="<?=site_url()?>"  >
                    <i class="icon-home"></i>
                    <span class="title" title="Dashboard">Dashboard </span>
                    <span class="selected"></span>
                </a>
            </li>
            
            <?php 
            foreach (group_menu() as $r)
            {
                $list_level1 = '<li><a>No sub menu</a></li>';
                $open_level1 = FALSE;
                $menu_rows = menu($r['id']); 
                if($menu_rows)
                {
                    $list_level1 = "";
                    $open_level_n = FALSE;
                    foreach ($menu_rows as $key=>$r_data)
                    {
                        $submenu = explode("#", $key);
                        if($submenu[0]){
                            $list_level2 = "";
                            $open_level2 = FALSE;
                            foreach ($r_data as $r2)
                            {
                                $active = $r2['token']==$token ? 'active' : '';
                                if($active){
                                    $open_level2 = TRUE;
                                }
                                $list_level2 .= '<li class="'. $active .'"><a href="'.site_url($r2['template_url'].'?token='.$r2['token']).'">'.$r2['name'].'</a></li>';
                            }
                            $class_open = $open_level2 ? 'open' : '';
                            $style_attr = $open_level2 ?'display: block;':'';
                            $title_old = $submenu[1];
                            $title_new = (strlen($title_old) > 18) ? substr($title_old, 0, 18)." ..." : $title_old;
                            
                            $list_level1 .= '<li class="'. $class_open .'">
                                                <a href="javascript:;" title="'. $title_old .'">
                                                    <span class="title">'. $title_new .'</span>
                                                    <span class="arrow "></span>
                                                </a>
                                                <ul class="sub-menu" style="'. $style_attr .'">
                                                    '. $list_level2 .'
                                                </ul>
                                            </li>';
                        
                        }else{
                            $token_active = $r_data[0]['token'];
                            $controller_url = $r_data[0]['controller'];
                            $controller_url = empty($controller_url) ? $r_data[0]['template_url'].'?token='.$token_active : $controller_url;
                            $controller_active = (($segment1.'/'.$segment2)==$r_data[0]['controller']) ? 'open' : '';
                            
                            if(!empty($token_active) && ($token == $token_active)){
                                $controller_active = 'open';
                                $open_level_n = TRUE;
                            }
                            $list_level1 .= '<li class="'. $controller_active .'">
                                                <a href="'. site_url($controller_url) .'" title="'. $r_data[0]['name'] .'">'. $r_data[0]['name']. '</a>
                                            </li>';
                        }
                    }
                    $open_level1 = ($open_level_n) ? $open_level_n : $open_level2;
                }?>
            <li class="<?=$a=(($segment1 == $r['segment']) or ($open_level1))?'active open':''?>">
                <a href="javascript:;">
                    <?php if(!empty($r['icon'])){?>
                        <i class="<?=$r['icon']?>"></i>
                    <?php }?>
                    <span class="title" title="<?=$r['name']?>"><?=$r['abbr']?> </span>
                    <span class="selected"></span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <?=$list_level1?>
                </ul>
            </li>
            <?php }?>
            
            <!-- PnL
            <li>                                    
                <a href="profit_loss.php">
                <i class="icon-pie-chart"></i>
                <span class="title">Profit & Loss </span>
                </a>
            </li>
            
            <!--Administrator-->
            <?php if($this->user->role == $this->role->administrator){?>
                <?php
                    $class_administrator = "";
                    if(
                        $segment1 == 'account' ||
                        $segment1 == 'aircraft' ||
                        $segment1 == 'version' || 
                        $segment1 == 'company' ||
                        $segment1 == "currency" || 
                        $segment1 == "coa" || 
                        $segment1 == "menu" ||
                        $segment1 == "allowance"
                    ){
                        $class_administrator = "active open";
                    }
                ?>
                <li class="<?=$class_administrator?>">
                    <a href="javascript:;">
                        <i class="icon-settings"></i>
                        <span class="title"> Administrator </span>
                        <span class="selected"></span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?=$ac=($segment1=='account')?'active':''?>">
                            <a href="<?=site_url('account')?>">
                                <i class="icon-user"></i>
                                <span class="title"> User Accounts</span>
                            </a>
                        </li>
                        <li class="<?=$ac=($segment1=='aircraft')?'active':''?>">
                            <a href="<?=site_url('aircraft')?>">
                                <i class="icon-plane"></i>
                                <span class="title"> Aircraft </span>
                            </a>
                        </li>
                        <li class="<?=$ac=($segment1=='version')?'active':''?>">                                    
                            <a href="<?=site_url('version')?>">
                                <i class="icon-bar-chart"></i>
                                <span class="title"> Version</span>
                            </a>
                        </li>
                        <li class="<?=$ac=($segment1=='company')?'open':''?>">
                            <a href="javascript:;">
                            <i class="icon-briefcase"></i>
                            <span class="title"> Company </span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" style="<?=$ac=($segment1=='company')?'display: block;':''?>">
                                <li class="<?=$ac=($segment1=='company' && ($segment2 == "" || $segment2 == "create" || $segment2 == "edit"))?'active':''?>">                                    
                                    <a href="<?=site_url('company')?>">
                                    <span class="title">Business Unit </span>
                                    </a>
                                </li>
                                <li class="<?=$ac=($segment1=='company' && $segment2 == "rc_center")?'active':''?>">                                    
                                    <a href="<?=site_url('company/rc_center')?>">
                                    <span class="title">Revenue / Cost Center </span>
                                    </a>
                                </li>
                                <li class="<?=$ac=($segment1=='company' && $segment2 == "business")?'active':''?>">                                    
                                    <a href="<?=site_url('company/business')?>">
                                    <span class="title">Business Type </span>
                                    </a>
                                </li> 
                                <li class="<?=$ac=($segment1=='company' && $segment2 == "department")?'active':''?>">                                    
                                    <a href="<?=site_url('company/department')?>">
                                    <span class="title">Department </span>
                                    </a>
                                </li>
                                <li class="<?=$ac=($segment1=='company' && ($segment2 == "designation" || $segment2 == "designation_group"))?'active':''?>">                                    
                                    <a href="<?=site_url('company/designation')?>">
                                    <span class="title">Designation</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?=$ac=($segment1=='allowance')?'active':''?>">
                            <a href="<?=site_url('allowance')?>">
                                <i class="icon-wallet"></i>
                                <span class="title"> Travel Allowance</span>
                            </a>
                        </li>
                        <li class="<?=$ac=($segment1=='currency')?'active':''?>">
                            <a href="<?=site_url('currency')?>">
                                <i class="icon-wallet"></i>
                                <span class="title"> Currency</span>
                            </a>
                        </li>
                        <li class="<?=$ac=($segment1=='coa')?'active':''?>">
                            <a href="javascript:;">
                                <i class="icon-paper-plane"></i>
                                <span class="title"> Chart of Account</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="<?=$ac=($segment1=='coa' && $segment2 == "")?'active':''?>">                                    
                                    <a href="<?=site_url('coa')?>">
                                    <span class="title">COA</span>
                                    </a>
                                </li>
                                <li class="<?=$ac=($segment1=='coa' && $segment2 == "detail")?'active':''?>">                                    
                                    <a href="<?=site_url('coa/detail')?>">
                                    <span class="title">COA Detail</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?=$ac=($segment1=='menu')?'active':''?>">                                    
                            <a href="<?=site_url('menu')?>">
                                <i class="icon-folder"></i>
                                <span class="title"> Menu / Template</span>
                            </a>
                        </li> 
                    </ul>
                </li>
            <?php }?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
