<div class="newsletter">
    <h4 class="js-newsletter-toggle">
        <span>Cập nhật thông tin khuyến mãi</span>
        <a class="toggle">
            <i class="fa fa-angle-down"></i>
            <i class="fa fa-envelope-o"></i>
        </a>
    </h4>
    <div class="form-group">
        <input type="email" id="mce-EMAIL" class="form-control" name="EMAIL" required="" placeholder="Email của bạn">
        <button data-toggle="modal" data-target="#myMail" type="submit" name="subscribe" id="mc-embedded-subscribe" class="form-control">
            Đăng ký <i class="fa fa-angle-right"></i>
        </button>
    </div>
</div>
<div class="modal fade" id="myMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <form onsubmit="return checksentmail();" action="gui-mail.html" method="post" id="frm_sentmail">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Nhận thông tin ưu đãi</h5>
                <div id="div_error_sentmail"></div>
                </div>
                <div class="modal-body clearfix">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                            <input onchange="checkMail(this,'dev_mail','#mce_email','#div_error_sentmail','.btn_sentmail');" type="text" class="form-control" name="mce_email" id="mce_email" placeholder="Nhập email..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                          <input checked="" type="radio" name="sex" id="sex" value="0"> Nam
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="sex" id="sex" value="1"> Nữ
                        </label>
                    </div>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="type[]" value="0">
                          Cập nhật ưu đãi chung
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="type[]" value="1">
                          Bản tin Sách - Văn phòng phẩm
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="type[]" value="2">
                          Bản tin Điện tử (Điện thoại - Tablet, Tivi, Thiết bị số, Điện lạnh)
                        </label>
                      </div>
                    </div>
                    <div class="clear"></div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn_sentmail"><i class="fa fa-paper-plane" aria-hidden="true"></i>Gửi thông tin</button>
              </div>
        </div>
    </form>
    </div>
</div>