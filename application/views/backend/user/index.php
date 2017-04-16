<div id="floatingCirclesG">
	<div class="f_circleG" id="frotateG_01"></div>
	<div class="f_circleG" id="frotateG_02"></div>
	<div class="f_circleG" id="frotateG_03"></div>
	<div class="f_circleG" id="frotateG_04"></div>
	<div class="f_circleG" id="frotateG_05"></div>
	<div class="f_circleG" id="frotateG_06"></div>
	<div class="f_circleG" id="frotateG_07"></div>
	<div class="f_circleG" id="frotateG_08"></div>
</div>
<div class="row">
		<div class="col-md-12">
				<div class="box">
						<div class="box-header with-border">
								<h3 class="box-title"><?php echo isset($title)?$title:'';?></h3> 
						</div>
						<!-- /.box-header -->
						<div class="box-body">
								<div class="col-md-12">
										<?php
												$message_flashdata = $this->session->flashdata('message_flashdata');
												if(isset($message_flashdata) && count($message_flashdata)){
													if($message_flashdata['type'] == 'sucess'){
													?>
														<div class="success"><i class="fa fa-check"></i> <?php echo $message_flashdata['message']; ?></div>
													<?php
													}else if($message_flashdata['type'] == 'error'){
													?>
														<div class="error"><i class="fa fa-close"></i> <?php echo $message_flashdata['message']; ?></div> 
													<?php
													}
												}
										?>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" id="search_user" name="search_user" placeholder="Tên tài khoản, Email, Họ tên">
												<div class="input-group-btn">
													<a onclick="searchUser()" class="btn btn-primary" title="Tìm kiếm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
													<a id="reload_user" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
								<div id="div_load">
									<div class="col-md-6">
										<div id="page_pagination" style="display: inline-block;">
											<span>1</span>
											&nbsp;
											<span>-</span>
											&nbsp;
											<span>50</span>
											&nbsp;
											<span>của</span>
											&nbsp;
											<span><?php echo isset($ci_user_num['count_kh'])? $ci_user_num['count_kh']:''; ?></span>
											&nbsp;
											<input type="hidden" name="ci_user_num" id="ci_user_num" value="<?php echo isset($ci_user_num['count_kh'])? $ci_user_num['count_kh']:''; ?>">
											<span>
												<a onclick="pagePrev()" id="page_prev" class="btn btn-default disabled">
													<input type="hidden" name="num_prev" id="num_prev" value="0">
													<i class="fa fa-chevron-left" aria-hidden="true"></i> 
												</a>
											</span>
											<span>
												<a onclick="pageNext()" id="page_next" class="btn btn-default">
													<input type="hidden" name="num_next" id="num_next" value="50">
													<i class="fa fa-chevron-right" aria-hidden="true"></i>
												</a>
											</span>
											<span>Trang</span>
											<span>
												<input type="text" name="page_index" id="page_index" value="1" maxlength="<?php echo isset($ci_user_num['max_length'])? $ci_user_num['max_length']:''; ?>" style="width: 3em;text-align: center;">
											</span>
											&nbsp;
											<span>/</span>
											<span><?php echo isset($ci_user_num['page_kh'])? $ci_user_num['page_kh']:''; ?></span>
											<input type="hidden" name="page_kh" id="page_kh" value="<?php echo isset($ci_user_num['page_kh'])? $ci_user_num['page_kh']:''; ?>">
										</div>
									</div>
									<div class="clear"></div>
									<div class="col-md-6 div_float_right">
									<div class="row">
											<a href="admin/user/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
											<a control="user" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
											<a control="user" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
									</div>
									</div>
									<table id="example1" class="table table-bordered table-striped">
											<thead>
													<tr>
															<th class="div_center"><input type="checkbox" class="check-all"></th>
															<th class="div_center">#</th>
															<th class="div_center">Tài khoản</th>
															<th class="div_center">Họ & Tên</th>
															<th class="div_center">Email</th>
															<th class="div_center">Thuộc nhóm</th>
															<th class="div_center">Ảnh</th> 
															<th class="div_center">Ngày tạo</th>
															<th class="div_center">Kích hoạt</th> 
															<th class="div_center">Thao tác</th>
													</tr>
											</thead>
											<tbody>
													<?php if(isset($user) && $user!=NULL){ ?>
														<?php $i = 0; ?>
														<?php foreach($user as $key => $val){ 
															$i++;
															if (isset($val['kh_anh_thumb']) && $val['kh_anh_thumb'] != '') { $_kh_anh_thumb = $val['kh_anh_thumb']; } else { $_kh_anh_thumb = 'noavatar.png'; }
															if (isset($val['created'])) { $created_str = date('d-m-Y H:i:s', $val['created']->sec); } else { $created_str = ''; }
														?>
														<tr>
															<td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id']?>"></td>
															<td class="div_center"><?php echo $i ?></td>
															<td><a href="admin/user/edit/<?php echo $val['_id']?>"><?php echo $val['username'];?></a></td>
															<td><?php echo $val['fullname'];?></td>
															<td><?php echo $val['email'];?></td>
															<td>
																<?php if (isset($role) && $role != NULL) { ?>
																	<?php foreach ($role as $key1 => $val1) { ?>
																		<?php if ($val1['_id'] == $val['id_role']) {
																		 echo $val1['name'];
																		} ?>
																	<?php } ?>
																<?php } ?>
															</td>
															<td class="div_center"><?php if($val['avatar_thumb']!=''){ ?> <img src="upload/user/thumb/<?php echo $val['avatar_thumb'];?>" alt="" class="img_admin">
															<?php }?></td>
															<td><?php echo $created_str; ?></td>
															<td class="div_center publish"><a onClick="active('<?php echo $val['_id']?>');" control="user" title="Hiển thị" class="div_active<?php echo $val['_id']?> div_active" divid="div_active<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>">
																<?php if($val['active'] == 0){ ?>
																	<i class="fa fa-check-circle"></i>
																<?php }else{ ?>
																	<i class="fa fa-circle"></i>
																<?php } ?></a>
															</td>
															<td class="div_center tool">
																<a href="admin/user/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
																<a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>" control="user"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
														<?php } ?>
													<?php } ?>
											</tbody>
									</table>
								</div>
								<?php echo isset($list_pagination)?$list_pagination:''; ?>
								<div class="col-md-6 div_float_right">
								<div class="row">
										<a href="admin/user/add" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới</a>
										<a control="user" id="del-all" type="button" class="btn btn-success btn-flat del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa tất cả</a>
										<a control="user" id="show-all" type="button" class="btn btn-success btn-flat shows"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Hiển thị</a>
								</div>
								</div>
						</div>
				</div>
		</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#floatingCirclesG').hide();
		$('#reload_user').click(function(){
			location.reload();
		});
		$('#search_user').keypress(function(e){
			if(e.which == 13){//Enter key pressed
				return searchUser();
			}
		});

		$('#page_index').keypress(function(e){
			if(e.which == 13){//Enter key pressed
				return false;
			}
		});
		$('#page_index').change(function(){
				return pageChange();
		});
		$('#page_index').keyup(function(){
			var page_index = $('#page_index').val();
			var page_kh = $('#page_kh').val();
			if (parseInt(page_index) > parseInt(page_kh)) {
				var page_del = page_index.substring(0, page_index.length - 1);
				$('#page_index').val(page_del);
			}
		});

		var num_limit     = 50;
		var ci_user_num   = $('#ci_user_num').val();
		var num_prev      = $('#num_prev').val();
		var num_minus     = parseInt(ci_user_num) - parseInt(num_prev);

		if (num_minus <= num_limit) {
			$('#page_next').addClass('disabled');
		} else {
			$('#page_next').removeClass('disabled');
		}
	});

	function searchUser(){
		$('#floatingCirclesG').show();
		$("#floatingCirclesG").delay(30000);
		var search_user   = $('#search_user').val();
		$.post('admin/user/searchuser', { search_user:search_user }, function(data) {
				$('#div_load').html(data);
				$('#floatingCirclesG').hide();
		});
	}

	function pagePrev(){
		$('#floatingCirclesG').show();
		$("#floatingCirclesG").delay(30000);
		var search_user = $('#search_user').val();
		var num_prev 		= $('#num_prev').val();
		var page_index 	= $('#page_index').val();
		$.post("admin/user/searchuser",{ num_prev:num_prev, page_index:page_index, search_user:search_user },function(data){
			$('#div_load').html( data );
			$('#floatingCirclesG').hide();
		});
	}
	function pageNext(){
		$('#floatingCirclesG').show();
		$("#floatingCirclesG").delay(30000);
		var search_user = $('#search_user').val();
		var num_next 		= $('#num_next').val();
		var page_index	= $('#page_index').val();
		$.post("admin/user/searchuser",{ num_next:num_next, page_index:page_index, search_user:search_user },function(data){
			$('#div_load').html( data );
			$('#floatingCirclesG').hide();
		});
	}
	function pageChange(){
		$('#floatingCirclesG').show();
		$("#floatingCirclesG").delay(30000);
		var search_user = $('#search_user').val();
		var page_index 	= $('#page_index').val();
		$.post("admin/user/searchuser",{ page_index:page_index, search_user:search_user },function(data){
			$('#div_load').html( data );
			$('#floatingCirclesG').hide();
		});
	}
</script>