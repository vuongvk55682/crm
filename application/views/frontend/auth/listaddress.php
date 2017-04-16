<div class="col-md-3">
    <div class="info_login clearfix">
        <div class="title clearfix">
            <?php if($data_index['info_user']['avatar_thumb'] != ''){ ?>
                <img src="upload/user/thumb/<?php echo $data_index['info_user']['avatar_thumb'];?>" class="img-circle" alt="User Image" />
            <?php }else{ ?>
                <img src="public/bootstrap/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            <?php } ?>
            Tài khoản
            <h3><?php echo $data_index['info_user']['fullname'];?></h3>
        </div>
        <div class="clear"></div>
        <ul>
            <li><a href="thong-tin-chung.html">Thông tin chung</a></li>
            <li><a href="thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
            <li class="active"><a href="so-dia-chi.html">Số địa chỉ</a></li>
            <li><a href="thong-tin-don-hang.html">Đơn hàng của tôi</a></li>
            <li><a href="san-pham-danh-gia.html">Sản phẩm đánh giá</a></li>
            <li><a href="de-danh-mua-sau.html">Để danh mua sau</a></li>
            <li><a href="danh-sach-san-pham-yeu-thich.html">Danh sách yêu thích</a></li>
            <li><a href="hoi-dap.html">Hỏi đáp</a></li>
            <li><a href="quan-ly-xu.html">Quản lý xu</a></li>
        </ul>
    </div>
</div>
<div class="col-md-9">
    <h1 class="have-margin"><?php echo $title; ?><a href="them-dia-chi.html">Thêm địa chỉ mới</a></h1>

    <div class="update_user">
        <div class="dashboard-address">
        <?php if(isset($address) && $address != NULL){ ?>
            <?php foreach ($address as $key => $val) { ?>
            <div class="panel panel-default item is-default">
                <div class="panel-body">
                    <p class="name"><?php echo $val['fullname'];?></p>
                    <p class="address">Địa chỉ: <?php echo $val['address'];?>, <?php echo $val['ward_name'];?>, <?php echo $val['district_name'];?>, <?php echo $val['city_name'];?></p>
                    <p class="phone">Điện thoại: <?php echo $val['phone'];?></p>
                    <p class="action">
                    <a class="btn btn-default btn-custom1 js-edit edit-customer-address" href="cap-nhat-dia-chi.html?id=<?php echo $val['id'];?>">Sửa</a></p>
                    <?php if($val['active'] == 1){ ?>
                        <span class="default">Mặc định</span>
                    <?php } ?>
                </div>
            </div>
            <?php if(($key + 1) % 2 == 0){?> <div class="clear"></div> <?php } ?>
            <?php } ?>
        <?php } ?>                                            
        </div>
    </div>
    <?php echo isset($content)?$content:''; ?>
    <div class="clear"></div>
</div>

