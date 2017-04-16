<?php if(isset($bangluong) && $bangluong!=NULL){ ?>
                      <?php foreach($bangluong as $key => $val){ 
                        
                            
                        ?>

                      <tr> 
                        <td class="div_center">
                          <input type="checkbox" name="chon" class="checkbox-menu" value="<?php echo $val['_id'];?>">
                        </td>
                        <td><a href="admin/bangluong/edit/<?php echo $val['_id']?>"><?php echo $val['thangnam']?></a></td>
                          <td><?php echo ($val['thang']);?></td>
                          <td><?php echo ($val['nam']);?></td>
                          <td><?php echo number_format($val['hopdong']);?></td>
                          <td><?php echo number_format($val['ngaycong']);?></td>
                          <td><?php echo number_format($val['khoanthuong'])?></td>
                          <td><?php echo number_format($val['giamtru'])?></td>
                          <td><?php echo number_format($val['phucap'])?></td> 
                          <td><?php echo number_format($val['thuclinh'])?></td>  
                           <td><?php echo  $val['ngay'] ?></td>  
                           <td><?php echo $val['created'];?></td> 
                           <td><?php echo $val['updated'];?></td> 
                        <td class="div_center publish"><a onClick="show('<?php echo $val['_id']?>');" control="bangluong" title="Hiển thị" class="div_hienthi<?php echo $val['_id']?> div_hienthi" divid="div_hienthi<?php echo $val['_id']?>" seq="<?php echo $val['_id']?>" value="<?php echo $val['_id'] ?>">
                          <?php if($val['publish'] == 0){ ?>
                            <i class="fa fa-check-circle"></i>
                          <?php }else{ ?>
                            <i class="fa fa-circle"></i>
                          <?php } ?></a>
                        </td>
                        <td class="div_center tool">
                          <a href="admin/bangluong/edit/<?php echo $val['_id']?>"><i class="fa fa-edit"></i></a>
                          <a onClick="del('<?php echo $val['_id']?>');" class="delete delete<?php echo $val['_id']; ?>" seq="<?php echo $val['_id']; ?>" control="bangluong"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    <?php } ?>