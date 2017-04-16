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
    <h1 class="have-margin"><?php echo $title; ?> #<?php echo $order['code'];?></h1>
    Ngày đặt hàng: <?php echo $order['created'];?>
    <div class="clear" style="height:20px;"></div>
    <h5><strong>Thông báo</strong></h5>
    <p>
    22:20 26/08/2016 : Hiện tại Tiki.vn chưa nhận được thanh toán tương ứng cho đơn hàng. Phiền quý Khách vui lòng thực hiện thanh toán hoặc chuyển sang hình thức thanh toán phù hợp. Đơn hàng sẽ tự hủy sau 24h nếu không nhận được thanh toán hay bất kỳ phản hồi nào từ Quý Khách. Cảm ơn Quý Khách đã tin tưởng và lựa chọn mua hàng tại Tiki.vn.</p>
    <div class="clear" style="height:20px;"></div>
    <h5><strong>Địa chỉ người nhận</strong></h5>
    <p><?php echo $order['address']['fullname'];?></p>
    <p><?php echo $order['address']['address'];?>,<?php echo $order['address']['ward_name'];?>,<?php echo $order['address']['district_name'];?>, <?php echo $order['address']['city_name'];?></p>
    <p>ĐT: 0932741142</p>

    <div class="clear" style="height:20px;"></div>
    <?php if(isset($ship) && $ship != NULL){ ?>
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
    <h5><strong>Phương thức vận chuyển</strong></h5>

    <p>Vận chuyển Tiết Kiệm (dự kiến giao hàng vào <?php echo $ship['week'];?>, <?php echo $ship['date'];?> - <?php echo $ship['week_next'];?>, <?php echo $ship['date_next'];?>)</p>
    <p>Phí vận chuyển: <?php echo number_format($ship['price']);?> ₫</p>
    </div>
    <?php } ?>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <h5><strong>Phương thức thanh toán</strong></h5>

    <p><?php echo $order['method'];?></p>
    </div>
    </div>

    
    <?php if(isset($order['cart']) && $order['cart']){ 
        $sum_total = 0;
        $sum_total_sale = 0;
    ?>
    <h3>Sản phẩm mua</h3>
    <div class="dashboard-order have-margin">
        <table class="table-responsive-2">
            <thead>
            <tr>
                <th>Stt</th>
                <th>
                    <span class="hidden-xs hidden-sm hidden-md">Tên sản phẩm</span>
                    <span class="hidden-lg">Sản phẩm</span>
                </th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Giảm giá</th>
                <th>Tổng cộng</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($order['cart'] as $key_cart => $val_cart) {
                    $stt =  $key_cart + 1;
                    if($val_cart['price_sale'] > 0){ 
                      $total_sale = $val_cart['price_sale'] * $val_cart['number'];  
                    }
                    $total = $val_cart['price'] * $val_cart['number'];
                    
                    if($val_cart['price_sale'] > 0){ 
                        $sum_total_sale = $sum_total_sale + $total_sale;
                    }
                    $sum_total = $sum_total + $total;
                    if($val_cart['price_sale'] > 0){
                        $sum_total_main = $sum_total_sale + 10000;
                    }else{
                        $sum_total_main = $sum_total + 10000;
                    }
                    $link_product_cart = base_url().$val_cart['product_alias'].'-p'.$val_cart['product_id'].'.html';
                ?>
                <tr>
                    <td><strong><?php echo $stt;?></strong></td>
                    <td>
                        <a href="<?php echo $link_product_cart;?>" title="<?php echo $val_cart['product_name'];?>" target="_blank"><?php echo $val_cart['product_name'];?> </a>
                    </td>
                    <td><strong class="hidden-lg hidden-md">Giá: </strong><?php echo number_format($val_cart['price']);?>&nbsp;₫</td>
                    <td>
                        <strong class="hidden-lg hidden-md">Số lượng: </strong><?php echo $val_cart['number'];?>                              
                    </td>
                    <td><strong class="hidden-lg hidden-md">Giảm giá: </strong><?php echo number_format($val_cart['price_sale']);?>&nbsp;₫</td>
                    <td><strong class="hidden-lg hidden-md">Tổng cộng: </strong><?php echo number_format($total);?>&nbsp;₫</td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            
                <tr>
                    <td colspan="5"><strong>Tổng chưa giảm</strong></td>
                    <td><strong><?php echo number_format($total);?>&nbsp;₫</strong></td>
                </tr>
                <tr>
                    <td colspan="5"><strong>Giảm giá </strong></td>
                    <td><strong><?php echo number_format($total_sale);?>&nbsp;₫ </strong> </td>
                </tr>                        
                <tr>
                    <td colspan="5"><strong>Chi phí vận chuyển</strong></td>
                    <td><strong>10.000&nbsp;₫</strong></td>
                </tr>
                
                <tr>
                    <td colspan="5"><strong>Tổng cộng</strong></td>
                    <td><strong><?php echo number_format($sum_total_main);?>&nbsp;₫</strong></td>
                </tr>
                
            </tfoot>
        </table>
    </div>
    <?php } ?>
    <div class="clear" style="height:10px;"></div>
    <a href="thong-tin-don-hang.html" class="btn btn-info btn-back"><i class="fa fa-caret-left"></i> Quay về đơn hàng của tôi</a>
</div>

