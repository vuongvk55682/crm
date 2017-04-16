<div class="list_contact">
    <h1 class="title_main"><span><?php echo $title; ?></span></h1>
    <div class="clear"></div>
    <div class="col-md-6">
        <?php echo isset($data_index['contact']['content'])?$data_index['contact']['content']:'';?>
    </div>
    <div class="col-md-6">
    <div id="div_error_contact"></div>
    <div class="clear"></div>
    <form onsubmit="return checkcontact();" action="" method="post" id="frm_contact">
        <i class="fa fa-location-arrow"></i> <strong>Send contact information</strong>
        <div class="clear"></div>
        <div class="form-group">
            <label for="exampleInputName">Fullname</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                <input type="text" class="form-control" id="c_fullname" name="c_fullname">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Email</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                <input type="text" class="form-control" id="c_email" name="c_email">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Phone</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                <input type="text" class="form-control" id="c_phone" name="c_phone">
            </div>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="4" name="c_content" id="c_content"></textarea>
        </div>
        <a class="btn bg-navy btn-flat btn_contact">Sent</a>
        <a class="btn bg-navy btn-flat c_reset">Reset</a>
    </form>
    </div>
    <div class="col-md-12">
        <i class="fa fa-location-arrow"></i> <strong>Map</strong>
        <div class="clear"></div>
        <div class="map-contact">
        <div id="googleMap" style="width:100%;height:380px;"></div>
        </div>
    </div>
</div>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCjE5nAZ00uqL_EVFRNsUiueeMvk-tmT1c&v=3&'+'callback=initialize"></script>
<script>
var myCenter = new google.maps.LatLng(<?php echo $data_index['map']['contact']['coordinates'];?>);
function initialize() {
      var mapProp = {
        center:myCenter,
        zoom:<?php echo $data_index['map']['contact']['zoom'];?>,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
      var marker=new google.maps.Marker({
        position:myCenter,
        map: map,
        draggable: true
        //animation:google.maps.Animation.BOUNCE
      });

      marker.setMap(map);
      var infowindow = new google.maps.InfoWindow({
        content:"<b><?php echo $data_index['map']['contact']['company'];?></b><br />Đ/c: <?php echo $data_index['map']['contact']['address'];?><br /><?php echo $data_index['map']['contact']['phone'];?>"
      });
      infowindow.open(map,marker);
     //  google.maps.event.addListener(marker, 'click', function() {
        
      // });
}


google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
jQuery(function(){
    if(!window.google||!window.google.maps){
      var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'http://maps.googleapis.com/maps/api/js?key=AIzaSyCjE5nAZ00uqL_EVFRNsUiueeMvk-tmT1c&v=3&' +
            'callback=initialize';
        document.body.appendChild(script);
    }
    else{
      initialize();
    }});
</script>
