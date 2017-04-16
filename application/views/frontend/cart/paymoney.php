<div class="col-md-12 shipping-address paymoney">
	  <h3 class="title_main"><?php echo $title; ?></span></h3>
    <div class="clear" style="height:20px;"></div>
    <div class="row row-style-2">
        <div class="col-lg-12">
            <div class="row bs-wizard">

                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">
                        <span>Login</span>
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <span class="bs-wizard-dot">1</span>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">
                        <span class="hidden-xs">Shipping address</span>
                        <span class="visible-xs-inline-block">Address</span>
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <span class="bs-wizard-dot">2</span>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">
                        <span class="hidden-xs">Pay &amp; Order</span>
                        <span class="visible-xs-inline-block">Pay</span>
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <span class="bs-wizard-dot">3</span>
                </div>

            </div>
        </div>
        <div class="clear" style="height:20px;"></div>
        <?php if(isset($order) && $order != NULL){ ?>
        <div class="col-lg-12">
            <div class="row row-style-5">
              <div class="col-lg-8">
                  <div class="panel panel-default success">
                      <div class="panel-body">
                          <div class="row row-style-6">
                              <div class="col-lg-4 col-md-3 visible-lg-block visible-md-block">
                                  <img src="public/images/ico12.png" height="178" width="195" class="img-responsive" alt="Image">
                              </div>
                              <div class="col-lg-8 col-md-9">
                                  <h3>Thank you for shopping at our!</h3>
                                  <p>Your order number: </p>
                                  <div class="well well-sm"><?php echo $order['code'];?></div>
                                  <p>You can review <a href="chi-tiet-don-hang.html?code=<?php echo $order['id'];?>">my order</a></p>
                                  <?php if(isset($ship) && $ship != NULL){ ?>
                                  <p><img src="public/images/ico2.png" height="25" width="30" alt="">
                                      Expected time of delivery to the <?php echo $ship['week'];?>, <?php echo $ship['date'];?> - <?php echo $ship['week_next'];?>, <?php echo $ship['date_next'];?>.
                                  </p>
                                  <?php } ?>
                              
                                  <p>
                                      Details of order was sent to the mail address <span><?php echo $order['email'];?></span>. If not found please check in the mailbox <strong>Spam</strong> or <strong>Junk Folder</strong>.
                                  </p>
                                  <div class="alert alert-success clearfix" role="alert">
                                      <p>To help the process orders more quickly, <?php echo base_url();?> will not call you to confirm order.</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="col-lg-4">
                  <h3 class="news">
                      How do you feel when ordering at <?php echo base_url();?>?
                  </h3>
                  <div class="clear"></div>
                  <div class="customer-effort-score">
                      <form id="customer-effort-score">
                          <div class="question0">
                              <span>Product information may be useful to you not ?</span>
                              <div class="group">
                                  <button onclick="sentQuestionOrder(1,<?php echo $order['userid'];?>);" type="button" class="btn btn-default" id="customer-effort-score-option1">
                                      <i class="fa fa-thumbs-up"></i>
                                      Absolutely helpful
                                  </button>
                                  <button onclick="sentQuestionOrder(2,<?php echo $order['userid'];?>);" type="button" class="btn btn-default" id="customer-effort-score-option2">
                                      <i class="fa fa-thumbs-up"></i>
                                      Quite helpful
                                  </button>
                                  <button onclick="sentQuestionOrder(3,<?php echo $order['userid'];?>);" type="button" class="btn btn-default" id="customer-effort-score-option3">
                                      <i class="fa fa-thumbs-up"></i>
                                      Normal
                                  </button>
                                  <button onclick="sentQuestionOrder(4,<?php echo $order['userid'];?>);" type="button" class="btn btn-default" id="customer-effort-score-option4">
                                      <i class="fa fa-thumbs-down"></i>
                                      Not necessarily
                                  </button>
                                  <button onclick="sentQuestionOrder(5,<?php echo $order['userid'];?>);" type="button" class="btn btn-default" id="customer-effort-score-option5">
                                      <i class="fa fa-thumbs-down"></i>
                                      Absolutely not
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="alert alert-success customer-effort-score-message alert_khaosat" role="alert">Thank you for your comments to us!</div>
              </div>
        </div>
        <?php } ?>
    </div>
</div>

