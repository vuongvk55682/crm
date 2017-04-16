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
            <li class="active"><a href="thong-tin-chung.html">Thông tin chung</a></li>
            <li><a href="thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
            <li><a href="so-dia-chi.html">Số địa chỉ</a></li>
            <li><a href="thong-tin-don-hang.html">Đơn hàng của tôi</a></li>
            <li><a href="san-pham-danh-gia.html">Sản phẩm đánh giá</a></li>
            <li><a href="de-danh-mua-sau.html">Để danh mua sau</a></li>
            <li><a href="danh-sach-san-pham-yeu-thich.html">Danh sách yêu thích</a></li>
            <li><a href="hoi-dap.html">Hỏi đáp</a></li>
            <li><a href="quan-ly-xu.html">Quản lý xu</a></li>
        </ul>
    </div>
</div>
<div class="col-md-9 account">
    <h1 class="have-margin"><?php echo $title; ?></h1>
    <div class="clear"></div>
    <?php if(isset($account) && $account){ ?>
        <div class="dashboard-header small">
            <h2>Thông tin tài khoản</h2>
            <a href="thong-tin-tai-khoan.html">Chỉnh sửa</a>
        </div>
        <div class="clear"></div>
        <div class="dashboard-account row">
            <div class="col-lg-6 col-md-6 left">
                <table class="dashboard-account-left">
                    <tbody>
                    <tr>
                        <td>Họ và Tên:</td>
                        <td><?php echo $account['fullname'];?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $account['email'];?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-6 col-md-6 right">
                <div class="dashboard-account-right">
                    <p>Bạn có <a href="/customer/reward/">0</a> Tiki Xu trong tài khoản của bạn.</p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php if(isset($account['order']) && $account['order'] != NULL){ ?>
            <div class="dashboard-header">
                <h2>Các đơn hàng vừa đặt</h2>
                <a href="thong-tin-don-hang.html">Xem tất cả</a>
            </div>
            <div class="clear"></div>
        
            <div class="orderid"><b>Mã đơn hàng:</b> <a href="chi-tiet-don-hang.html?code=<?php echo $account['order']['id'];?>" title="Đơn hàng">#<?php echo $account['order']['code'];?></a> - Ngày mua: <?php echo $account['order']['created'];?></div>
            <div class="clear"></div>
            <div class="table-responsive dashboard-order">
            <table class="table">
                <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th style="text-align:right">Tổng tiền</th>
                    <th>
                        <span class="hidden-xs hidden-sm hidden-md">Trạng thái đơn hàng</span>
                        <span class="hidden-lg">Trạng thái</span>
                    </th>
                    <!--                            <th></th>-->
                </tr>
                </thead>
                <tbody>
                    <?php if(isset($account['order']['cart']) && $account['order']['cart']){ ?>
                        <?php foreach ($account['order']['cart'] as $key_cart => $val_cart) { ?>
                            <tr>
                                <td><?php echo $val_cart['product_name'];?></td>
                                <td style="text-align:right">
                                <?php if($val_cart['price_sale'] > 0){ ?>
                                    <?php echo number_format($val_cart['price_sale']);?>
                                <?php }else{ ?>
                                    <?php echo number_format($val_cart['price']);?>
                                <?php } ?>
                                &nbsp;₫</td>
                                <td>
                                    <span class="order-status">Đã hủy</span>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
            </div>
            <div class="clear" style="height:20px;"></div>
        <?php } ?>
        <?php if(isset($account['address']) && $account['address'] != NULL){ ?>
        <div class="dashboard-header">
            <h2>Sổ địa chỉ</h2>
            <a href="so-dia-chi.html">Xem tất cả</a>
        </div>
        <div class="clear"></div>
        
        <div class="dashboard-address">
            <?php foreach ($account['address'] as $key_address => $val_address) { ?>
            <div class="panel panel-default item <?php if($val_address['active'] == 1){ ?> is-default <?php } ?>">
                <div class="panel-body">
                    <p class="name">Lê Minh Hiếu</p>
                    <p class="address">Địa chỉ: Bình Tân, TP.HCM, Phường 12, Quận 8, Hồ Chí Minh, Việt Nam</p>
                    <p class="phone">Điện thoại: 0932741142</p>
                    <p class="action">
                        <a href="cap-nhat-dia-chi.html?id=<?php echo $val_address['id'];?>" class="btn btn-default btn-custom1 js-edit">Sửa</a>
                    </p>
                    <?php if($val_address['active'] == 1){ ?>
                        <span class="default">Mặc định</span>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    <?php } ?>
</div>

