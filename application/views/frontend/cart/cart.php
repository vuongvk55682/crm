<?php 
    $stt = 0;
    if(isset($listcart) && $listcart!=NULL){ ?>
<div class="col-md-9 col-sm-6 col-xs-12">
    <div class="cart_right">
      <div class="title visible-md-block visible-lg-block clearfix">
          <div class="col-lg-8 col-md-8"><div class="row">
              <h5>Products in cart</h5>
              <span class="badge"><?php echo count($listcart);?></span>
          </div></div>
          <div class="col-lg-1 col-md-1"><div class="row"><h6>Price</h6></div></div>
          <div class="col-lg-1 col-md-1"><div class="row"><h6>Number</h6></div></div>
          <div class="col-lg-1 col-md-1"><div class="row"><h6>Reduced Price</h6></div></div>
          <div class="col-lg-1 col-md-1 end"><div class="row"><h6>Into Money</h6></div></div>
      </div>
      <form id="shopping-cart" action="<?php echo base_url();?>cap-nhat-gio-hang.html" method="post">
        <?php 
          $sum_total = 0;
          foreach ($listcart as $key_cart => $val_cart){
            $stt += 1;
            if($val_cart['options']['Price_sale'] > 0){ 
              $total = $val_cart['options']['Price_sale'] * $val_cart['qty'];  
            }else{
              $total = $val_cart['subtotal'];
            }
            if($val_cart['options']['Price_sale'] > 0){
              $percent = round(100-(($val_cart['options']['Price_sale']*100)/$val_cart['price']),0);
            }else{
              $percent = 0;
            }
            $img_cart = base_url().'upload/product/thumb/'.$val_cart['options']['Image'];
            $sum_total = $sum_total + $total;
        ?>
        <input type="hidden" name="<?php echo $stt;?>[rowid]" value="<?php echo $val_cart['rowid'];?>">
        <div class="row shopping-cart-item shopping-cart-item<?php echo $val_cart['id'];?>">
          <div class="col-lg-3 col-md-5 col-sm-6 col-xs-5"><div class="row">
            <p class="image"><?php if($percent > 0){ ?><span class="sale">-<?php echo $percent;?>%</span><?php } ?>
                <img src="<?php echo $img_cart;?>" alt="<?php echo $val_cart['name'];?>">
            </p>
          </div></div>
          <div class="col-lg-5 col-md-6 c2 col-xs-7">
            <p class="name">
                <a href="" title="<?php echo $val_cart['name'];?>" target="_blank"><?php echo $val_cart['name'];?></a>
            </p>
            <p class="action">
                <a class="btn btn-link btn-item-delete delcart" control="cart" id="<?php echo $val_cart['rowid'];?>">Delete &nbsp;&nbsp;</a>
                <?php /*<a <?php if($this->CI_auth->check_logged_user() == ''){ ?> data-toggle="modal" data-target="#myLogin" <?php }else{ ?> onClick="deDanhMuaSau(<?php echo $val_cart['id'];?>,<?php echo $data_index['info_user']['id'];?>);" <?php } ?> class="btn btn-link btn-save-for-later dedanh<?php echo $val_cart['id'];?>" rowid="<?php echo $val_cart['rowid'];?>">Để dành mua sau
                </a>*/?>
            </p>
          </div>
          <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block"><div class="row">
            <p class="price"><?php echo $this->cart->format_number($val_cart['options']['Price_sale']); ?>&nbsp;$</p>
            <p class="<?php if($val_cart['options']['Price_sale'] > 0){ ?> price2 <?php }else{ ?> price <?php } ?>"><?php echo $this->cart->format_number($val_cart['price']); ?>&nbsp;$</p>
          </div></div>
          <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block quantity-block">
            <select onchange="updateCart();" name="<?php echo $stt;?>[qty]" class="js-quantity-select quantity js-quantity-product">
              <?php for ($i=1; $i <= 10; $i++) { ?>
                <option <?php if($i == $val_cart['qty']){ ?> selected <?php } ?> value="<?php echo $i;?>"><?php echo $i;?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block">
            <p class="price">0&nbsp;$</p>
          </div>
          <div class="col-lg-1 col-md-1 visible-md-block visible-lg-block end"><div class="row">
              <p class="price3"><?php echo $this->cart->format_number($total); ?>$</p>
          </div></div>
        </div>
      <?php } ?>
      </form> 
      <div class="row last">
          <div class="col-lg-12 col-md-12">
              <div class="all-new">
                  <a class="btn btn-default btn-gradient" href="/"><i class="fa fa-angle-left"></i> Resume Buying</a>
              </div>
          </div>
      </div>
      <div class="hidden-xs alert alert-info">
        Phụ kiện Mỹ giảm 20%<a href="https://tiki.vn/lp/anker-gia-soc" target="_blank" class="alert-link">Chi tiết</a>.
      </div>
      <div class="hidden-xs alert alert-info">
        DUY NHẤT 10/10 - Ngày hội Gia đình điểm 10 - Deal cực SỐC + Top sản phẩm thương hiệu hàng đầu giảm đến 50% +++ MUA NGAY!                                               
        <a href="https://tiki.vn/lp/ngay-hoi-gia-dinh-diem-10" target="_blank" class="alert-link">Chi tiết</a>.
      </div>
      <div class="box-recommendation-related-product-cart"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
    <div id="right-affix" class="affix-top cart_right">
        <div class="">
          <div class="panel panel-default fee">
              <div class="panel-body">
                  <p class="total">Total: <span><?php echo $this->cart->format_number($sum_total); ?> &nbsp;$</span></p>    
                  <p class="total2">Into Money: <span><?php echo $this->cart->format_number($sum_total); ?> &nbsp;$ </span></p>
                  <p class="text-right"><i>(Include VAT)</i></p>
              </div>
          </div>
          <a href="dia-chi-giao-hang.html" class="btn btn-large btn-block btn-default btn-checkout">
            Conducted Order
          </a>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
              <div class="panel-group coupon" id="accordion">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne3" class="" aria-expanded="true">
                                  Sale Code / Gift
                                  <span><img src="public/images/icon/ico11.png" height="7" width="12" alt=""></span>
                              </a>
                          </h4>
                      </div>
                      <div id="collapseOne3" class="panel-collapse collapse in" aria-expanded="true">
                          <div class="panel-body">
                              <div class="input-group">
                                  <input id="coupon" placeholder="Enter here.." type="text" class="form-control" value="">
                              <span class="input-group-btn">
                                  <button class="btn btn-default btn-coupon" type="button">Agree</button>
                              </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="col-lg-12">
        <div class="empty-cart">
            <img src="public/images/cart-empty.png" alt="Không có sản phẩm nào trong giỏ hàng của bạn.">

            <p class="alert alert-info">No items in your cart.</p>
        </div>
    </div>
<?php } ?>

