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
            <li><a href="so-dia-chi.html">Số địa chỉ</a></li>
            <li class="active"><a href="thong-tin-don-hang.html">Đơn hàng của tôi</a></li>
            <li><a href="san-pham-danh-gia.html">Sản phẩm đánh giá</a></li>
            <li><a href="de-danh-mua-sau.html">Để danh mua sau</a></li>
            <li><a href="danh-sach-san-pham-yeu-thich.html">Danh sách yêu thích</a></li>
            <li><a href="hoi-dap.html">Hỏi đáp</a></li>
            <li><a href="quan-ly-xu.html">Quản lý xu</a></li>
        </ul>
    </div>
</div>
<div class="col-md-9">
    <h1 class="have-margin"><?php echo $title; ?></h1>
    <div class="clear"></div>
    <?php if(isset($order) && $order != NULL){ ?>
        <?php foreach ($order as $key_order => $val_order) { ?>
            <div class="orderid"><b>Mã đơn hàng:</b> <a href="chi-tiet-don-hang.html?code=<?php echo $val_order['id'];?>" title="Đơn hàng">#<?php echo $val_order['code'];?></a> - Ngày mua: <?php echo $val_order['created'];?></div>
            <div class="clear"></div>
            <div class="dashboard-order have-margin">
            <table class="table-responsive-2">
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
                    <?php if(isset($val_order['cart']) && $val_order['cart']){ ?>
                        <?php foreach ($val_order['cart'] as $key_cart => $val_cart) { ?>
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
        <?php } ?>
    <?php } ?>
</div>

