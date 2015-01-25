    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?=site_url()?>">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <?php if(isset($breadcrumb)){?>
            <?php foreach ($breadcrumb as $i=>$r){?>
                <li>
                    <?php if($r['url']){?>
                        <a href="<?=$r['url']?>"><?=$r['title']?></a>
                    <?php }else{ ?>
                        <?=$r['title']?>
                    <?php }?>
                    <?php if(($i+1) < count($breadcrumb)){?>
                        <i class="fa fa-angle-right"></i>
                    <?php }?>
                </li>
            <?php }?>
        <?php }?>
    </ul>

