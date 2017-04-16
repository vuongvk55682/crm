<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="div_fixed clearfix">
                    <div class="col-md-6 div_float_right">
                    <div class="row">
                        <a href="admin/product/index" type="button" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Trở về</a> 
                    </div>
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="div_center">Hoàn toàn hữu ích</th> 
                            <th class="div_center">Khá hữu ích</th> 
                            <th class="div_center">Bình thường</th>
                            <th class="div_center">Không hẳn</th> 
                            <th class="div_center">Hoàn toàn không</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($khaosat) && $khaosat!=NULL){ ?>
                            <?php foreach($khaosat as $key => $val){ ?>
                            <tr> 
                              <td><?php echo $val['type1'];?></td>
                              <td><?php echo $val['type2'];?></td>
                              <td><?php echo $val['type3'];?></td>
                              <td><?php echo $val['type4'];?></td>
                              <td><?php echo $val['type5'];?></td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>