<a href="index.html" class="logo">
    <span class="logo-mini"><b>A</b>LT</span>
    <span class="logo-lg">Admin manager</span>
</a>

<nav class="navbar navbar-static-top" role="navigation">
    <?php if($this->CI_auth->check_logged()=== true){ ?>
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if($data_index['info_admin']['avatar_thumb'] != ''){ ?>
                        <img src="upload/user/thumb/<?php echo $data_index['info_admin']['avatar_thumb'];?>" class="img-circle" alt="User Image" />
                    <?php }else{ ?>
                        <img src="public/bootstrap/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                    <?php } ?>
                    <span class="hidden-xs"><?php echo $data_index['info_admin']['fullname'];?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                    <?php if($data_index['info_admin']['avatar_thumb'] != ''){ ?>
                        <img src="upload/user/<?php echo $data_index['info_admin']['avatar'];?>" class="img-circle" alt="User Image" />
                    <?php }else{ ?>
                        <img src="public/bootstrap/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <?php } ?>
                        <p>
                            Alexander Pierce - Web Developer
                            <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="admin/user/edit/<?php echo $data_index['info_admin']['id']; ?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="admin/dang-xuat.html" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <?php } ?>
</nav>
