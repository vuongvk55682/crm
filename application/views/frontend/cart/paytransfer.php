<div class="col-md-12">
  <h1 class="title_main"><span><?php echo $title; ?></span></h1>
  <div class="box-body">
    To order started, please make the transfer a total amount of <strong style="color:#F00;"><?php echo number_format($order['total_price']);?> $</strong> to one of the bank account shown right below. In the content transfer please fill order only code is: <strong style="color:#F00;"><?php echo $order['code'];?></strong>. 
    <div class="clear" style="height:20px;"></div>
    <?php echo isset($data_index['keys']['paytransfer'])?$data_index['keys']['paytransfer']:'';?>
  </div>
</div>

