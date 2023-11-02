<!DOCTYPE html>
<html>
<head>
    <? $this->load->view('template-admin/metadata');?>
</head>
<body class="skin-blue fixed sidebar-mini">
<div class="wrapper">

<header class="main-header" style="background: rgb(59, 70, 74) none repeat scroll 0% 0%;">
    <?
    if ($this->auth->is_logged_in()) {
        $user = $this->auth->get_data_session();
        $blur_img = "";
        ?>
            <div class="bg-user-panel-header">
                <img src="<?php echo (isset($blur_img) && $blur_img !='' && file_exists(getcwd()."/".$blur_img) ? base_url().$blur_img : base_url().'media/dist/img/bg-blur.jpg')?>" alt="User Image" />
            </div>
        <?
    }
    ?>
    <? $this->load->view('template-admin/header');?>
</header>

<!-- Left side column. contains the logo and sidebar -->
<? $this->load->view('template-admin/sidebar');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="width: 50%; display: inline-block;">
            <?php echo @$ico;?>
            <?php echo @$title;?>
            <small><?php echo @$sub_title ?></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php 
            $this->load->view($content);
        ?>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <strong>Copyright &copy; 2016</strong> All rights reserved.
    </div>
    <b>Web-Admin CMS</b>
</footer>
</div><!-- ./wrapper -->

<div class="overlay ovr_xx overlay_preload" id="loading-full">
    <div class='load-bar' id='materialPreloader'><div class='load-bar-container'><div style='background:#159756' class='load-bar-base base1'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div><div style='background:#159756' class='color green'></div></div></div> <div class='load-bar-container'><div style='background:#159756' class='load-bar-base base2'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div> <div style='background:#159756' class='color green'></div> </div> </div> </div>
    <span id="submit_progress"></span>
</div>

<? $this->load->view('template-admin/script');?>
</body>
</html>