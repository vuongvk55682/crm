<div class="container"><div class="row">
    <ul class="col-sm-12 col-xs-12 col-md-12 col-lg-12 clearfix">
    	<li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
        <?php if(isset($data_index['breadcrumb']['type_name5']) && $data_index['breadcrumb']['type_name5'] != ''){ ?>
        <li><a <?php if($data_index['breadcrumb']['type_url5'] != ''){ ?> href='<?php echo $data_index['breadcrumb']['type_url5'];?>' <?php } ?> class='itemcrumb active' itemprop='url'><span itemprop='title'><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $data_index['breadcrumb']['type_name5'];?></span></a></li>
        <?php } ?>
        <?php if(isset($data_index['breadcrumb']['type_name4']) && $data_index['breadcrumb']['type_name4'] != ''){ ?>
        <li><a <?php if($data_index['breadcrumb']['type_url4'] != ''){ ?> href='<?php echo $data_index['breadcrumb']['type_url4'];?>' <?php } ?> class='itemcrumb active' itemprop='url'><span itemprop='title'><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $data_index['breadcrumb']['type_name4'];?></span></a></li>
        <?php } ?>
        <?php if(isset($data_index['breadcrumb']['type_name3']) && $data_index['breadcrumb']['type_name3'] != ''){ ?>
        <li><a <?php if($data_index['breadcrumb']['type_url3'] != ''){ ?> href='<?php echo $data_index['breadcrumb']['type_url3'];?>' <?php } ?> class='itemcrumb active' itemprop='url'><span itemprop='title'><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $data_index['breadcrumb']['type_name3'];?></span></a></li>
        <?php } ?>
        <?php if(isset($data_index['breadcrumb']['type_name2']) && $data_index['breadcrumb']['type_name2'] != ''){ ?>
        <li><a <?php if($data_index['breadcrumb']['type_url2'] != ''){ ?> href='<?php echo $data_index['breadcrumb']['type_url2'];?>' <?php } ?> class='itemcrumb active' itemprop='url'><span itemprop='title'><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $data_index['breadcrumb']['type_name2'];?></span></a></li>
        <?php } ?>
        <?php if($data_index['breadcrumb']['type_name'] != ''){ ?>
        <li><a <?php if($data_index['breadcrumb']['type_url'] != ''){ ?> href='<?php echo $data_index['breadcrumb']['type_url'];?>' <?php } ?> class='itemcrumb active' itemprop='url'><span itemprop='title'><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $data_index['breadcrumb']['type_name'];?></span></a></li>
        <?php } ?>
        <?php if($data_index['breadcrumb']['detail_name'] != ''){ ?>
        <li><a <?php if($data_index['breadcrumb']['detail_url'] != ''){ ?> href='<?php echo $data_index['breadcrumb']['detail_url'];?>' <?php } ?> class='itemcrumb active' itemprop='url'><span itemprop='title'><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $data_index['breadcrumb']['detail_name'];?></span></a></li>
        <?php } ?>
    </ul>
</div></div>