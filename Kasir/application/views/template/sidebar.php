<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="<?= base_url('http://placehold.it/50/30a5ff/fff'); ?>" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <!-- Query menu -->
        <?php
            $queryMenu = "SELECT * FROM menu WHERE is_active = 1 ORDER BY id_menu ASC";
            $menu = $this->db->query($queryMenu)->result_array();
        ?>
        <!-- End Query menu -->
        
        <!-- Menu -->
        <?php $i = 1; ?>
        <?php foreach($menu as $m) : ?>

            <?php
                $idmenu = $m['id_menu'];
                $subMenu = "SELECT * FROM `submenu` JOIN `menu` ON `menu`.`id_menu`=`submenu`.`id_menu` WHERE
                `submenu`.`id_menu`= $idmenu AND `submenu`.`is_active_s`= 1 ORDER BY `id_submenu` ASC";
                $submenu = $this->db->query($subMenu)->result_array();    
            ?>

            <?php if($m['url'] != "") { ?>
                <?php
                    $ci = get_instance();
                    $url = $this->uri->segment(1);
                    if($m['menu'] == $url) :
                ?>
                <li class="active"><a href="<?= base_url() . $m['url']; ?>"><em class="<?= $m['icon']; ?>">&nbsp;</em> <?= $m['menu']; ?> </a></li>
                <?php else : ?>
                <li class=""><a href="<?= base_url() . $m['url']; ?>"><em class="<?= $m['icon']; ?>">&nbsp;</em> <?= $m['menu']; ?> </a></li>
                <?php endif ; ?>        
            <?php } elseif($m['url'] == "") {?>
                <?php
                    $ci = get_instance();
                    $url = $this->uri->segment(1);
                    if($m['menu'] == $url) :
                ?>
                <li class="parent active"><a data-toggle="collapse" href="#sub-<?= $i; ?>">
                <?php else : ?>
                <li class="parent"><a data-toggle="collapse" href="#sub-<?= $i; ?>">
                <?php endif; ?>
                    <em class="<?= $m['icon'] ?>">&nbsp;</em> <?= $m['menu'] ?> <span data-toggle="collapse" href="#sub-<?= $i; ?>" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-<?= $i; ?>">
                        <?php foreach($submenu as $sm) : ?>
                        <li><a class="" href="<?= base_url() . $sm['url_s']; ?>">
                            <span class="fa fa-circle">&nbsp;</span> <?= $sm['submenu']; ?>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php $i++; ?>
            <?php }?>
        <?php endforeach; ?>
        <!-- <li><a href="widgets.html"><em class="fa fa-user">&nbsp;</em> My Profil</a></li>  -->
        <!-- End Menu -->
        <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->