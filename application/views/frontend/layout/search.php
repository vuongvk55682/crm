<div class="search clearfix">
<div class="item clearfix">
	<form id="frm-search" method="get" action="tim-kiem.html">
		<div class="input-group">
			<a class="input-group-addon sel_search">Tất cả <i class="fa fa-caret-down" aria-hidden="true"></i></a>
			<?php if(isset($data_index['menu_search']) && $data_index['menu_search']!=NULL){ ?>
			<ul class="menu_search">
	            <li data-category="0"><a>Tất cả</a></li>
	            <?php foreach ($data_index['menu_search'] as $key_menu_search => $val_menu_search) { ?>
	            	<li data-cateid="<?php echo $val_menu_search['id'];?>" data-cate="<?php echo $val_menu_search['name'];?>"><a class="clk_type"><?php echo $val_menu_search['name'];?></a></li>
	            <?php } ?>
	         </ul>
	         <?php } ?>
	         <input type="hidden" name="search_typeid" id="search_typeid" value="">
		     <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Tìm kiếm sản phẩm, danh mục hay thương hiệu mong muốn...">
			<a class="input-group-addon btn btn-success btn-flat btn_search">Tìm</a>
		</div>
	</form>
	<div class="div_result_search"></div>
</div>
</div>