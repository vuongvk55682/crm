<div class="div_cart">
    <div class="title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Trả lời nhận xét<a id="close_cart"><i class="fa fa-close" aria-hidden="true"></i></a></div>
    <div class="clear"></div>
    <table id="lstcart" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="div_center">Stt</th>
            <th>Người trả lời</th>
            <th>Báo lỗi</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
            <th>Hiển thị</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php if(isset($replycomment) && $replycomment!=NULL){ ?>
                <?php foreach($replycomment as $key => $val){ 
                  $stt = $key + 1;
                ?>
                <tr> 
                  <td class="div_center"><?php echo $stt;?></td>
                  <td width="140"><?php echo $val['user']['fullname'];?>
                  
                  </td>
                  <td class="div_center" width="100"><a class="ajax"><?php echo isset($val['count_error'])?$val['count_error']:0;?> người</a></td>
                  <td><?php echo $val['content'];?></td>
                  <td width="140"><?php echo $val['created'];?></td>
                  <td class="div_center publish"><a onClick="show(<?php echo $val['id']?>);" control="comment" title="Hiển thị" class="div_hienthi<?php echo $val['id']?> div_hienthi" divid="div_hienthi<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                    <?php if($val['publish'] == 0){ ?>
                       <span class="label label-danger">Active</span>
                    <?php }else{ ?>
                      <span class="label label-success">Active</span>
                    <?php } ?></a>
                  </td>
                  <td class="div_center tool">
                    <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="comment"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>
<script src="public/bootstrap/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#close_cart').click(function(){
        $('#div_load_cart').removeClass('div_load_cart');
    });
    $('.check-all').click(function() {  //on click
        if(this.checked) { // check select status
            $('.checkbox-menu').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox-menu').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    $('a#del-all').click(function(){
        if($('.check-all').is(':checked') || $('.checkbox-menu').is(':checked')) {
          var xacnhanxoa = confirm('Bạn có chắc muốn xóa không?');
          var control = $(this).attr('control');
          if(xacnhanxoa==true){
            var listid="";
            $("input[name='chon']").each(function(){
            if(this.checked){
              $(this).parent().parent().fadeOut();
              listid = listid+","+this.value;
            } 
            })
            listid=listid.substr(1);
            if(listid != '')  
            {
                $.ajax
                ({
                 method: "POST",
                 url: "admin/"+control+"/deleteall",
                 data: { listid:listid},
                });
                window.setTimeout('location.reload()', 1000);
                return false;
            }
          }
        }else{
          alert('Vui lòng chọn đối tượng bạn muốn thao tác!!');
        }
    });
  });
</script>


