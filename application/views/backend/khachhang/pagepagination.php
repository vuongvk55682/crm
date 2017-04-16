<span><?php echo isset($numfirst['num_from'])? $numfirst['num_from']:''; ?></span>
&nbsp;
<span>-</span>
&nbsp;
<span><?php echo isset($numlast['num_to'])? $numlast['num_to']:''; ?></span>
&nbsp;
<span>của</span>
&nbsp;
<span><?php echo isset($khanghang_num['count_kh'])? $khanghang_num['count_kh']:''; ?></span>
&nbsp;
<input type="hidden" name="khachhang_num" id="khachhang_num" value="<?php echo isset($khanghang_num['count_kh'])? $khanghang_num['count_kh']:''; ?>">
<span>
  <a onclick="pagePrev()" id="page_prev" class="btn btn-default ">
    <input type="hidden" name="num_prev" id="num_prev" value="<?php if (isset($numfirst['num_from'])) {$num_prev = (int)$numfirst['num_from'] - 1; echo $num_prev; } ?>">
    <i class="fa fa-chevron-left" aria-hidden="true"></i> 
  </a>
</span>
<span>
  <a onclick="pageNext()" id="page_next" class="btn btn-default">
    <input type="hidden" name="num_next" id="num_next" value="<?php echo isset($numlast['num_to'])? $numlast['num_to']:''; ?>">
    <i class="fa fa-chevron-right" aria-hidden="true"></i>
  </a>
</span>
<span>Trang</span>
<span>
  <input type="text" name="page_index" id="page_index" maxlength="<?php echo isset($khanghang_num['max_length'])? $khanghang_num['max_length']:''; ?>" value="<?php echo isset($page_index['page_change'])? $page_index['page_change']:''; ?>" placeholder="" style="width: 3em;text-align: center;">
</span>
&nbsp;
<span>/</span>
<span><?php echo isset($khanghang_num['page_kh'])? $khanghang_num['page_kh']:''; ?></span>
<input type="hidden" name="page_kh" id="page_kh" value="<?php echo isset($khanghang_num['page_kh'])? $khanghang_num['page_kh']:''; ?>">
<script type="text/javascript">
	$(document).ready(function(){
		var num_next_kh = $('#num_next').val();
		var khachhang_num = $('#khachhang_num').val();
		var num_prev_kh = $('#num_prev').val();
		var num_minus = parseInt(khachhang_num) - parseInt(num_prev_kh);

		if (parseInt(num_next_kh) <= 50) 
		{
			$('#page_prev').addClass('disabled');
		}else {
			$('#page_prev').removeClass('disabled');
		}

		if (num_minus <= 50) {
		  $('#page_next').addClass('disabled');
		} else {
		  $('#page_next').removeClass('disabled');
		}

		$('#page_index').keyup(function(){
		  var page_index = $('#page_index').val();
		  var page_kh = $('#page_kh').val();
		  if (parseInt(page_index) > parseInt(page_kh)) {
		    var page_del = page_index.substring(0, page_index.length - 1);
		    $('#page_index').val(page_del);
		  }
		});

		$('#page_index').keypress(function(e){
		  if(e.which == 13){//Enter key pressed
		    return false;
		  }
		});
		$('#page_index').change(function(){
        	return pageChange();
    	});
	});
</script>