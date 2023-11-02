<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?
            if ($this->auth->is_logged_in()) {
                $user = $this->auth->get_data_session();
                $blur_img = "";
        ?>
        <div class="user-panel">
            <div class="bg-user-panel">
                <img src="<?php echo (isset($blur_img) && $blur_img !='' && file_exists(getcwd()."/".$blur_img) ? base_url().$blur_img : base_url().'media/dist/img/bg-blur.jpg')?>" alt="User Image" />
            </div>
            <div class="image img_circle">
                <img src="<?php echo (isset($user->photo_profile) && $user->photo_profile !='' && file_exists(getcwd()."/".$user->photo_profile) ? base_url().$user->photo_profile : base_url().'media/dist/img/avatar-no-image.png')?>" alt="User Image" />
            </div>
            <div class="info">
                <p class="info-name"><? echo @$user->name?></p>
            </div>
        </div>
        <?
            }
        ?>
        <?
            echo $this->menu_model->gen_menu(uri_string());
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>