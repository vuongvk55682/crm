<section class="sidebar">
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." />
            <span class="input-group-btn">
              <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <?php if($data_index['act'] != 'login'){ ?>
    <ul class="sidebar-menu">
        <li class="header">Danh mục Quản lý</li>
        <li class="active treeview">
            <a href="#">
              <i class="fa fa-home" aria-hidden="true"></i> <span>Trang chủ Website</span> 
            </a>
        </li>
        <?php if(isset($data_index['moduless']) && $data_index['moduless'] != NULL){ ?>
        <?php foreach ($data_index['moduless'] as $key => $val) { 
        //if($val['active'] == 1){
			if($key == 0){
				$i = '<i class="fa fa-external-link"></i>';
			}else{
				$i = '<i class="fa fa-windows"></i>';
			}
		?>
        <li class="treeview">
            <a href="<?php if($val['controller'] != ''){ ?> admin/<?php echo $val['controller'];?>/<?php echo $val['action'];?> <?php } ?>"><i class="fa fa-folder-open"></i> <span><?php echo $val['name'];?></span> <?php if($val['child'] != NULL){ ?><i class="fa fa-angle-left pull-right"></i><?php } ?></a>
            <?php if($val['child'] != NULL){ ?>
            <ul class="treeview-menu">
				<?php foreach ($val['child'] as $key_child => $val_child) { ?>
                <?php // if($val_child['active'] == 1){ ?>
                <li><a href="admin/<?php echo $val_child['controller'];?>/<?php echo $val_child['action'];?>"><i class="fa fa-circle-o"></i> <?php echo $val_child['name'];?></a></li>
                <?php } ?>
                <?php // } ?>
            </ul>
            <?php } ?>
        </li>
        <?php //} ?>
        <?php } ?>
        <?php } ?>  
    </ul>
    <?php } ?>
</section>
