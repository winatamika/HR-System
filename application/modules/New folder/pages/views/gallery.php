<div class="row">
    <div class="col-lg-12 no-padding">
        <?php
            $this->load->model('pages/model_pages');
            $list_gallery = $this->model_pages->get_data_gallery();
            foreach ($list_gallery as $row) {
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 gallery-list-block">
                <div class='block-image'>
                    <a class='lightBox' href='<?php echo base_url().$row->img?>' data-lightbox='gallery' title='<?php echo $row->text?>'><img src='<?php echo base_url().$row->img?>'></a>
                </div>
            </div>
            <?php
            }
        ?>
    </div>
</div>