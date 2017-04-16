<?php if(isset($data_index['productnew']) && $data_index['productnew'] != NULL){ ?>
<ul class="slider_pro_new">
    <?php foreach ($data_index['productnew'] as $key_producthot => $val_producthot) { 
         $url_producthot = base_url().$val_producthot['alias'].'-p'.$val_producthot['id'].'.html';
    ?>
    <li>
        <a href="<?php echo $url_producthot;?>" title="<?php echo $val_producthot['title']; ?>">
            <img data-u="image" src="<?php echo base_url(); ?>upload/product/thumb/<?php echo $val_producthot['image_thumb']; ?>" alt="<?php echo $val_producthot['title']; ?>" >
            <div class="title_hot"><?php echo $val_producthot['title']; ?></div>
            
        </a>
    </li>
    <div class="clear"></div>
    <?php } ?>
</ul>
<?php } ?>
