<link href="public/flexisel/doitac.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="public/flexisel/jquery.flexisel.js"></script>
<script type="text/javascript">
	$("#flexiselDemo3").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 2
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 4
            },
            tablet: { 
                changePoint:768,
                visibleItems: 5
            }
        }
    });
</script>
<?php if(isset($data_index['brand']) && $data_index['brand'] != NULL){ ?>
<div class="title"><span>Thương hiệu</span></div>
<div class="clear"></div>
<ul id="flexiselDemo3">
	<?php foreach ($data_index['brand'] as $key_brand => $val_brand) { 
         $img_brand = base_url().'upload/brand/'.$val_brand['image'];
    ?>
	<li>
		<a href="" title="<?php echo $val_brand['name'];?>">
			<img src="<?php echo $img_brand;?>" alt="<?php echo $val_brand['name'];?>" />
		</a>
	</li>
	<?php } ?>
</ul>
<?php } ?>