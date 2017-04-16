<?php if(isset($reorder) && $reorder!=NULL){ ?>
                            <?php foreach($reorder as $key => $val){ 
                                if($val['position'] == 0){
                                    $position = 'Tại nhà';
                                }else{
                                    $position = 'Tại công ty';
                                }

                            ?>
                            <tr> 
                              <td class="div_center"><input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['id']?>"></td>
                              <td>#<?php echo $val['id'];?></td>
                              <td><?php echo $val['username'];?></td>
                              <td><?php echo $val['phone'];?></td>
                              <td><?php echo $val['email'];?></td>
                              <td><?php echo $val['date'];?> (<?php echo $val['time'];?>)</td>
                              <td><?php echo $position;?> <br/><?php if($val['address'] != ''){ ?>(<?php echo $val['address'];?>)<?php } ?></td>
                              <td><?php echo $val['created'];?></td>
                              <td><?php echo $val['content'];?></td>
                              <td class="div_center publish"><a onClick="status(<?php echo $val['id']?>);" control="reorder" title="Trạng thái" class="div_status<?php echo $val['id']?> div_status" divid="div_status<?php echo $val['id']?>" seq="<?php echo $val['id']?>">
                                <?php if($val['status'] == 0){ ?>
                                   <span class="label label-danger">Chưa xử lý</span>
                                <?php }else{ ?>
                                  <span class="label label-success">Đã xử lý</span>
                                <?php } ?></a>
                              </td>
                              <td class="div_center tool">
                                <a onClick="del(<?php echo $val['id']?>);" class="delete delete<?php echo $val['id']?>" seq="<?php echo $val['id']?>" control="reorder"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>