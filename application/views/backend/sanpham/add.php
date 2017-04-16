<style type="text/css">
	.wp_pareant {
    margin-top: 10px;
    font-size: 14px;
}
</style>

<div class="box">
	<div class="box-header with-border">
        <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
	</div>
	<div class="box-body">
	<form id="frm-admin" method="post" action="" enctype="multipart/form-data">
	
	<div class="row">
		<div class="col-md-5">
			


			<div class="form_title">
	             <h3>THÔNG TIN SẢN PHẨM</h3>
	        </div>

	        <div class="form-group">
                <label>Danh Mục(*)</label>
                <select class="form-control select2" class="form-control" name="danhmuc_sp" id="danhmuc_sp">
                  	<?php if(isset($danhmuc) && $danhmuc != NULL){ ?>
					    <option selected="selected" value="chưa có danh mục">Chọn danh mục</option>
					    <?php foreach ($danhmuc as $key_danhmuc => $val_danhmuc) { ?>
					      <option value="<?php echo $val_danhmuc['ten'];?>"><?php echo $val_danhmuc['ten'];?></option>
					    <?php } ?> 
					<?php } ?>
                </select>
	                <div class="wp_pareant">
			        	<a onclick="showdanhmuc();">Chưa có danh mục?</a>
			        	<div id="danhmuc" class="show_div">
						  <h2>Thêm Danh Mục</h2>

						  <form class="form-horizontal">
						    <div class="form-group">
						      <div class="">
						        <input type="danhmuc" class="form-control" id="add_danhmuc" placeholder="Danh mục">
						      </div>
						    </div>
						    
						    
						    <div class="form-group">        
						      <div class="">
						        <a onclick="themdanhmuc();" class="btn btn-success">Thêm</a>
						        <a onclick="closedanhmuc();" class="btn btn-default">Đóng</a>
						      </div>
						    </div>
						  </form>
						</div>
					</div>
            </div>

	        







	        <div class="form-group">
	            <label class="control-label">
	                Mô tả ngắn để chia sẻ lên mạng xã hội
	            </label>
	            <textarea class="form-control" name="mota" id="mota" rows="2"></textarea>
	        </div>

	        <div class="form-group">
	            <label class="control-label">
	              Tên Sản Phẩm (
	              <span>*</span>
	              )
	            </label>
	            <div class="input-group">
	              <div class="input-group-addon">
	                <i class="fa fa-bullseye" aria-hidden="true"></i>
	              </div>
	              <input type="text" class="form-control" name="ten_sp" id="ten_sp" placeholder="Tên sản phẩm" value="">
	            </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Mã Sản Phẩm (
	            <span>*</span>
	            )
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-bullseye" aria-hidden="true"></i>
	            </div>
	            <input type="text" class="form-control" name="ma_sp" id="ma_sp" placeholder="Mã Sản Phẩm" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Giá bán lẻ
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giabanle" id="giabanle" placeholder="Giá bán lẻ" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Chiết Khấu giá bán lẻ
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="chietkhaugiabanle" id="chietkhaugiabanle" placeholder="Chiết Khấu giá bán lẻ" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Giá bán buôn
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giabanbuon" id="giabanbuon" placeholder="Giá bán buôn" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Chiết Khấu giá bán buôn
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="chietkhaugiabanbuon" id="Chietkhaugiabanbuon" placeholder="Chiết Khấu giá bán buôn" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Giá bán online
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giabanonline" id="giabanonline" placeholder="Giá bán online" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Chiết Khấu giá bán online
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="chietkhaugiabanonline" id="chietkhaugiabanonline" placeholder="Chiết Khấu giá bán online" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Giá mua
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giamua" id="giamua" placeholder="Giá mua" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Chiết Khấu giá mua
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="chietkhaugiamua" id="chietkhaugiamua" placeholder="Chiết Khấu giá mua" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Giá khuyến mãi
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giakhuyenmai" id="giakhuyenmai" placeholder="Giá khuyến mãi" value="">
	          </div>
	        </div>


	        <div class="form-group">
                <label>Nhà sản xuất</label>
                <select class="form-control select2" class="form-control" name="nhasanxuat" id="nhasanxuat">
                  <?php if(isset($nhasanxuat) && $nhasanxuat != NULL){ ?>
					    <option selected="selected" value="chưa có nhà sản xuất">Chọn nhà sản xuất</option>
					    <?php foreach ($nhasanxuat as $key_nhasanxuat => $val_nhasanxuat) { ?>
					      <option value="<?php echo $val_nhasanxuat['ten'];?>"><?php echo $val_nhasanxuat['ten'];?></option>
					    <?php } ?> 
					<?php } ?>
                </select>
                 <div class="wp_pareant">
		        	<a onclick="shownhasanxuat();">Chưa có nhà sản xuất?</a>
		        	<div id="nhasanxuat" class="show_div1">
					  <h2>Thêm nhà sản xuất</h2>
					  <form class="">

					    <div class="form-group">
					      <div class="">
					        <input type="nhasanxuat" class="form-control" id="add_nhasanxuat" placeholder="Nhà sản xuất">
					      </div>
					    </div>
					    
					    
					    <div class="form-group">        
					      <div class="">
					        <a onclick="themnhasanxuat();" class="btn btn-success">Thêm</a>
					        <a onclick="closenhasanxuat();" class="btn btn-default">Đóng</a>
					      </div>
					    </div>
					  </form>
					</div>
				</div>
            </div>

	        <div class="form-group">
                <label>Xuất xứ</label>
                <select class="form-control select2" class="form-control" name="xuatxu" id="xuatxu">
                  	<?php if(isset($xuatxu) && $xuatxu != NULL){ ?>
					    <option selected="selected" value="chưa có xuất xứ">Chọn Xuất xứ</option>
					    <?php foreach ($xuatxu as $key_xuatxu => $val_xuatxu) { ?>
					      <option value="<?php echo $val_xuatxu['ten'];?>"><?php echo $val_xuatxu['ten'];?></option>
					    <?php } ?> 
					<?php } ?>
                </select>
                	<div class="wp_pareant">
			        	<a onclick="showxuatxu();">Chưa có xuât xứ?</a>
			        	<div id="xuatxu" class="show_div2">
						  <h2>Thêm xuất xứ</h2>
						  <form class="">
						    <div class="form-group">
						      
						      <div class="">
						        <input type="xuatxu" class="form-control" id="add_xuatxu" placeholder="Xuất xứ">
						      </div>
						    </div>
						    
						    
						    <div class="form-group">        
						      <div class="">
						        <a onclick="themxuatxu();" class="btn btn-success">Thêm</a>
						        <a onclick="closexuatxu();" class="btn btn-default">Đóng</a>
						      </div>
						    </div>
						  </form>
						</div>
					</div>
            </div>


	     



			


	        <div class="form-group">
                <label>Đơn vị</label>
                <select class="form-control select2" class="form-control" name="donvi" id="donvi">
                  	<?php if(isset($donvi) && $donvi != NULL){ ?>
					    <option selected="selected" value="chưa có đơn vị">Chọn Đơn vị</option>
					    <?php foreach ($donvi as $key_donvi => $val_donvi) { ?>
					      <option value="<?php echo $val_donvi['ten'];?>"><?php echo $val_donvi['ten'];?></option>
					    <?php } ?> 
					<?php } ?>
                </select>
	                <div class="wp_pareant">
			        	<a onclick="showdonvi();">Chưa có đơn vị?</a>
			        	<div id="donvi" class="show_div3">
						  <h2>Thêm đơn vị</h2>
						  <form class="">
						    <div class="form-group">
						      
						      <div class="">
						        <input type="donvi" class="form-control" id="add_donvi" placeholder="đơn vị">
						      </div>
						    </div>
						    
						    
						    <div class="form-group">        
						      <div class="">
						        <a onclick="themdonvi();" class="btn btn-success">Thêm</a>
						        <a onclick="closedonvi();" class="btn btn-default">Đóng</a>
						      </div>
						    </div>
						  </form>
						</div>
					</div>
            </div>

           



		</div>
		<div class="col-md-7">
			<div class="form_title">
	             <h3>THUỘC TÍNH</h3>
	        </div>

	        <div class="form-group">
	          	<div class="input-group">	
	          		<div class="thuoctinh">          
			            <input class="them" name="thuoctinh[]" type="text" value="" placeholder="Tên (Ví dụ: Màu sắc)">
						<input class="" name="motathuoctinh[]" type="text" value="" placeholder="Mô tả (Ví dụ: Vàng)">
						<!-- <a onclick="xoathuoctinh();"><i class="fa fa-times" aria-hidden="true"></i></a> -->
					</div>
					
					

					<div id="form_add">
                    </div>
	          	</div>
	          	<a onclick="themthuoctinh();"><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới thuộc tính</a>
	        </div>

	        


	        <div class="form_title">
	             <h3>HÌNH ẢNH</h3>
	        </div>
	        
	        <div class="col-md-12"><div class="row">
	            <div class="item-manager">
	                <div id="dZUpload" class="dropzone dz-clickable">
	                    <div class="dz-default dz-message" ></div>
	                    </div>
	                </div>
	                <div id="div_list_img"></div>
	            </div>
	        </div>
	        
	        <!-- <div class="form_title">
	             <h3>TÀI LIỆU</h3>
	        </div>

	        <div class="col-md-12"><div class="row">
	            <div class="item-manager">
	                <div id="dZUpload11" class="dropzone dz-clickable">
	                    <div class="dz-default dz-message"></div>
	                    </div>
	                </div>
	                <div id="list_tailieu"></div>
	            </div>
	        </div> -->

	        
	        <div class="clear"></div>


	        <div class="form-group">
	            <label class="control-label">
	              Hướng
	            </label>
	            <div class="input-group">
	              <div class="input-group-addon">
	                <i class="fa fa-user" aria-hidden="true"></i>
	              </div>
	              <input type="text" class="form-control" name="huong" id="huong" placeholder="Hướng" value="">
	            </div>
	        </div>

	         <div class="form-group">
                <label>Ngày sản xuất:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="ngaysanxuat" id="ngaysanxuat">
                </div>
                <!-- /.input group -->
             </div>

             <div class="form-group">
                <label>Ngày hết hạn:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="ngayhethan" id="ngayhethan">
                </div>
                <!-- /.input group -->
             </div>

	         

	        <!-- <div class="form-group">
                <label>Màu sắc</label>
                <select class="form-control select2" class="form-control" name="mausac" id="mausac">
                  <option selected="selected">Chọn màu sắc</option>
                  <option value="1">Đỏ</option>
                  <option value="2">Đen</option>
                  <option value="3">Trắng</option>
                  <option value="4">ISO 2002</option>
                  <option value="5">ISO 2003</option>
                  <option value="6">ISO 2004</option>
                </select>
            </div> -->

            <div class="form-group">
                <label>Màu sắc</label>
                <select class="form-control select2" class="form-control" name="mausac" id="mausac">
                  	<?php if(isset($mausac) && $mausac != NULL){ ?>
					    <option selected="selected" value="chưa có màu sắc">Chọn màu sắc</option>
					    <?php foreach ($mausac as $key_mausac => $val_mausac) { ?>
					      <option value="<?php echo $val_mausac['ten'];?>"><?php echo $val_mausac['ten'];?></option>
					    <?php } ?> 
					<?php } ?>
                </select>
	                <div class="wp_pareant">
			        	<a onclick="showmausac();">Chưa có màu sắc?</a>
			        	<div id="mausac" class="show_div4">
						  <h2>Thêm màu sắc</h2>
						  <form class="">
						    <div class="form-group">
						      
						      <div class="">
						        <input type="mausac" class="form-control" id="add_mausac" placeholder="Màu sắc">
						      </div>
						    </div>
						    
						    
						    <div class="form-group">        
						      <div class="">
						        <a onclick="themmausac();" class="btn btn-success">Thêm</a>
						        <a onclick="closemausac();" class="btn btn-default">Đóng</a>
						      </div>
						    </div>
						  </form>
						</div>
					</div>
            </div>

	        <div class="form-group">
	          <label class="control-label">
	            Giá đối tác
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giadoitac" id="giadoitac" placeholder="Giá đối tác" value="">
	          </div>
	        </div>

	        <div class="form-group">
	          <label class="control-label">
	            Giá xuất xưởng
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giaxuatxuong" id="giaxuatxuong" placeholder="giá xuất xưởng" value="">
	          </div>
	        </div>

	        <!-- <div class="form-group">
	          <label class="control-label">
	            Giá bán lẻ
	          </label>
	          <div class="input-group">
	            <div class="input-group-addon">
	              <i class="fa fa-dollar " aria-hidden="true"></i>
	            </div>
	            <input type="number" class="form-control" name="giabanle" id="giabanle" placeholder="Giá bán lẻ" value="">
	          </div>
	        </div> -->

	         <div class="form-group">
	            <label class="control-label">
	              nhà cung cấp
	            </label>
	            <div class="input-group">
	              <div class="input-group-addon">
	                <i class="fa fa-user" aria-hidden="true"></i>
	              </div>
	              <input type="text" class="form-control" name="nhacungcap" id="nhacungcap" placeholder="Nhà cung cấp" value="">
	            </div>
	        </div>

	         <div class="form-group">
	            <label class="control-label">
	              EMEI
	            </label>
	            <div class="input-group">
	              <div class="input-group-addon">
	                <i class="fa fa-user" aria-hidden="true"></i>
	              </div>
	              <input type="text" class="form-control" name="EMEI" id="EMEI" placeholder="EMEI" value="">
	            </div>
	        </div>
			
		</div>

		<div class="col-md-12">
            <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea id="content" name="content" class="ckeditor"></textarea>
            </div>
    	</div>
	</div>

	

		<div class="box-footer">
          <a class="btn btn-success btn-flat add"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Lưu</a>
          <a class="btn btn-success btn-flat reset"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Nhập lại</a>
          <a href="admin/sanpham/index" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Trở về</a>
        </div>
</form>
</div>
</div>
<link rel="stylesheet" href="public/dropzone/dropzone.css" type="text/css" />
<script src="public/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="public/dropzone/dropzone.min.js"></script>
<link rel="stylesheet" href="public/datepicker/datepicker3.css">
<script type="text/javascript">
    $(document).ready(function() {
        $('#dZUpload').dropzone({
            url: "admin/sanpham/dropzone",
            addRemoveLinks: true, 
            dictRemoveFile: 'Delete',
            init: function() {
                this.on("success", function(file, response) {
                    var obj = $.parseJSON(response);
                    $(file.previewTemplate).find('.dz-preview').attr('id', "document-" + obj.id.$id);
                    $('#div_list_img').append('<input type="hidden" name="id_img[]" value="'+obj.id.$id+'">');
                    $('#div_list_img').append('<input type="hidden" id="'+obj.img_name+'" value="'+obj.random+'">');
                });
                this.on("removedfile", function(file) {
                	var random = $('#'+file.name).val();
                    $.ajax({
                        url: "admin/sanpham/deldropzone",
                        type: "POST",
                        data: { image: file.name,random:random}
                    });
                });
            }
        });


    });

    $('#ngaysanxuat').datepicker({
      autoclose: true
    });
    $('#ngayhethan').datepicker({
      autoclose: true
    });

    function themdanhmuc(){
    	var tendanhmuc = $('#add_danhmuc').val();
    	if(tendanhmuc != '')  
	    {
	        $.ajax
	        ({
	           method: "POST",
	           url: "admin/sanpham/themdanhmuc",
	           data: { tendanhmuc:tendanhmuc},
	           dataType: "html",
	            success: function(data){
	              $('#danhmuc_sp').html( data );
	              if($('.show_div').hasClass('hide_div')){
			          $('.show_div').removeClass('hide_div');
			      	}
	            }
	        });
	    }
    }
    function showdanhmuc(){
    	if($('.show_div').hasClass('hide_div')){
          $('.show_div').removeClass('hide_div');
      	}else{
          $('.show_div').addClass('hide_div');
      	}
    }
    function closedanhmuc(){
    	if($('.show_div').hasClass('hide_div')){
          $('.show_div').removeClass('hide_div');
      	}
    }

    function themnhasanxuat(){
    	var tennhasanxuat = $('#add_nhasanxuat').val();
    	if(tennhasanxuat != '')  
	    {
	        $.ajax
	        ({
	           method: "POST",
	           url: "admin/sanpham/themnhasanxuat",
	           data: { tennhasanxuat:tennhasanxuat},
	           dataType: "html",
	            success: function(data){
	              $('#nhasanxuat').html( data );
	              if($('.show_div1').hasClass('hide_div')){
			          $('.show_div1').removeClass('hide_div');
			      	}
	            }
	        });
	    }
    }
    function shownhasanxuat(){
    	if($('.show_div1').hasClass('hide_div')){
          $('.show_div1').removeClass('hide_div');
      	}else{
          $('.show_div1').addClass('hide_div');
      	}
    }
    function closenhasanxuat(){
    	if($('.show_div1').hasClass('hide_div')){
          $('.show_div1').removeClass('hide_div');
      	}
    }

    function themxuatxu(){
    	var tenxuatxu = $('#add_xuatxu').val();
    	if(tenxuatxu != '')  
	    {
	        $.ajax
	        ({
	           method: "POST",
	           url: "admin/sanpham/themxuatxu",
	           data: { tenxuatxu:tenxuatxu},
	           dataType: "html",
	            success: function(data){
	              $('#xuatxu').html( data );
	              if($('.show_div2').hasClass('hide_div')){
			          $('.show_div2').removeClass('hide_div');
			      	}
	            }
	        });
	    }
    }
    function showxuatxu(){
    	if($('.show_div2').hasClass('hide_div')){
          $('.show_div2').removeClass('hide_div');
      	}else{
          $('.show_div2').addClass('hide_div');
      	}
    }
    function closexuatxu(){
    	if($('.show_div2').hasClass('hide_div')){
          $('.show_div2').removeClass('hide_div');
      	}
    }

    function themdonvi(){
    	var tendonvi = $('#add_donvi').val();
    	if(tendonvi != '')  
	    {
	        $.ajax
	        ({
	           method: "POST",
	           url: "admin/sanpham/themdonvi",
	           data: { tendonvi:tendonvi},
	           dataType: "html",
	            success: function(data){
	              $('#donvi').html( data );
	              if($('.show_div3').hasClass('hide_div')){
			          $('.show_div3').removeClass('hide_div');
			      	}
	            }
	        });
	    }
    }
    function showdonvi(){
    	if($('.show_div3').hasClass('hide_div')){
          $('.show_div3').removeClass('hide_div');
      	}else{
          $('.show_div3').addClass('hide_div');
      	}
    }
    function closedonvi(){
    	if($('.show_div3').hasClass('hide_div')){
          $('.show_div3').removeClass('hide_div');
      	}
    }
    function themmausac(){
    	var tenmausac = $('#add_mausac').val();
    	if(tenmausac != '')  
	    {
	        $.ajax
	        ({
	           method: "POST",
	           url: "admin/sanpham/themmausac",
	           data: { tenmausac:tenmausac},
	           dataType: "html",
	            success: function(data){
	              $('#mausac').html( data );
	              if($('.show_div4').hasClass('hide_div')){
			          $('.show_div4').removeClass('hide_div');
			      	}
	            }
	        });
	    }
    }
    function showmausac(){
    	if($('.show_div4').hasClass('hide_div')){
          $('.show_div4').removeClass('hide_div');
      	}else{
          $('.show_div4').addClass('hide_div');
      	}
    }
    function closemausac(){
    	if($('.show_div4').hasClass('hide_div')){
          $('.show_div4').removeClass('hide_div');
      	}
    }
var i=1;
    function themthuoctinh(){
    	i++;
    	$('#form_add').append('<div class="thuoctinh'+i+'"> <input class="" name="thuoctinh[]" type="text" value="" placeholder="Tên (Ví dụ: Màu sắc)"> <input class="" name="motathuoctinh[]"  type="text" value="" placeholder="Mô tả (Ví dụ: Vàng)"> <a onclick="xoathuoctinh('+i+')" class="xoathuoctinh'+i+'"><i class="fa fa-times" aria-hidden="true"></i></a> </div>');
    }

    function xoathuoctinh(num){
    	$('.thuoctinh'+num).remove();
    }

</script>
