<div class="col-md-12">
<?php if(isset($idea) && $idea != NULL){ ?>
  <div class="wp_idea">
    <div class="title clearfix"><h2><a>Ý kiếm khách hàng</a></h2>
    </div>
    <div class="clear" style="height:10px;"></div>
    <div id="idea">
        <?php foreach ($idea as $key_idea => $val_idea) { ?>
        <div class="items">
            <img src="public/images/civil-85x851.png" alt="<?php echo $val_idea['name'];?>"/>
            <span><?php echo $val_idea['content'];?><h3><?php echo $val_idea['name'];?></h3></span>
            
        </div>
        <?php } ?>
    </div>
  </div>
<?php } ?>
</div>