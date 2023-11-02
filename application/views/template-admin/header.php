<a href="<?php echo base_url();?>home" class="logo">
    <?php
        $user = $this->auth->get_data_session();
        $ci = get_instance();
        $ci->load->config('session');
    ?>
    <span class="logo-mini"><?php echo "<b>".$ci->config->item('app_name_mini')."</b>"?></span>
    <span class="logo-lg"><?php echo "<b>".$ci->config->item('app_name')."</b>"?></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu" title="Role Active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-circle-o"></i>
                    <span><? echo $user->role_active?></span>
                </a>
                <ul class="dropdown-menu" style="width: 230px;">
                    <!-- Menu Body -->
                    <li class="user-body" id="role_active">
                        <?php
                        foreach ($user->roles as $key => $value) {
                            if($key==$user->role_active){
                                echo '
                                    <div class="radio" style="margin: 0px;">
                                        <label>
                                            <input name="role_active" value="'.$key.'" type="radio" checked>'.$key.'
                                        </label>
                                    </div>';
                            }
                            else{
                                echo '
                                    <div class="radio" style="margin: 0px;">
                                        <label>
                                            <input name="role_active" value="'.$key.'" type="radio">'.$key.'
                                        </label>
                                    </div>';
                            }
                        }
                        ?>
                    </li>
                </ul>
            </li>
            <li class="dropdown user user-menu" title="Toggle Full Screen">
                <a href="#" onclick="toggleFullScreen(this)">
                    <i class="fa fa-expand" style="margin-right: 0px;cursor:pointer;"></i>
                </a>
            </li>
            <li class="dropdown user user-menu" id="to-top" title="to Top">
                <a href="#">
                    <i class="fa fa-arrow-up" style="margin-right: 0px;cursor:pointer;"></i>
                </a>
            </li>
            <li class="dropdown user user-menu" title="Logout Session">
                <a href="<?php echo base_url()."admin-authentication/logout"?>">
                    <i class="fa fa-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>