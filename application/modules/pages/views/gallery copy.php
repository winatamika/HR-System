<div class="row">
    <div class="col-lg-12 no-padding">
        <?php
        $jumlah_foto = 10;
        $sisa = $jumlah_foto % 4;
        $bagi_foto = ($jumlah_foto - $sisa) / 4;
        $bagi_foto_ = 1;
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 no-padding">
        <?php
            $start1 = 1;
            $end1 = $bagi_foto;
            for ($i=$start1; $i <= $end1; $i++) {
                if ($i<=$jumlah_foto) {
                    ?>
                    <div class="col-lg-12 gallery-list-block">
                        <div class='block-image'>
                            <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                        </div>
                    </div>
                    <?php
                }
            }

            if ($sisa>0) {
                $start2 = ($end1 + 1);
                $end2 = $end1 + $bagi_foto_;
                for ($i=$start2; $i <= $end2; $i++) {
                    if ($i<=$jumlah_foto) {
                        ?>
                        <div class="col-lg-12 gallery-list-block">
                            <div class='block-image'>
                                <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                            </div>
                        </div>
                        <?php
                    }
                }   
            }
            else{
                $start2 = $start1;
                $end2 = $end1;
            }
        ?>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 no-padding">
        <?php
            $start3 = ($end2 + 1);
            $end3 = $end2 + $bagi_foto;
            for ($i=$start3; $i <= $end3; $i++) {
                if ($i<=$jumlah_foto) { 
                    ?>
                    <div class="col-lg-12 gallery-list-block">
                        <div class='block-image'>
                            <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                        </div>
                    </div>
                    <?php
                }
            }

            if ($sisa>1) {
                $start4 = ($end3 + 1);
                $end4 = $end3 + $bagi_foto_;
                for ($i=$start4; $i <= $end4; $i++) {
                    if ($i<=$jumlah_foto) {
                        ?>
                        <div class="col-lg-12 gallery-list-block">
                            <div class='block-image'>
                                <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            else{
                $start4 = $start3;
                $end4 = $end3;
            }
        ?>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 no-padding">
        <?php
            $start5 = ($end4 + 1);
            $end5 = $end4 + $bagi_foto;
            for ($i=$start5; $i <= $end5; $i++) {
                if ($i<=$jumlah_foto) {
                    ?>
                    <div class="col-lg-12 gallery-list-block">
                        <div class='block-image'>
                            <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                        </div>
                    </div>
                    <?php
                }
            }

            if ($sisa>2) {
                $start6 = ($end5 + 1);
                $end6 = $end5 + $bagi_foto_;
                for ($i=$start6; $i <= $end6; $i++) {
                    if ($i<=$jumlah_foto) {
                        ?>
                        <div class="col-lg-12 gallery-list-block">
                            <div class='block-image'>
                                <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            else{
                $start6 = $start5;
                $end6 = $end5;
            }
        ?>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 no-padding">
        <?php
            $start7 = ($end6 + 1);
            $end7 = $end6 + $bagi_foto;
            for ($i=$start7; $i <= $end7; $i++) {
                if ($i<=$jumlah_foto) {
                    ?>
                    <div class="col-lg-12 gallery-list-block">
                        <div class='block-image'>
                            <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                        </div>
                    </div>
                    <?php
                }
            }

            if ($sisa>3) {
                $start8 = ($end7 + 1);
                $end8 = $end7 + $bagi_foto_;
                for ($i=$start8; $i <= $end8; $i++) {
                    if ($i<=$jumlah_foto) {
                        ?>
                        <div class="col-lg-12 gallery-list-block">
                            <div class='block-image'>
                                <a class='lightBox' href='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg' data-lightbox='gallery' title='title here'><img src='<? echo base_url()?>/uploads/img_banner/<?php echo $i?>.jpg'></a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            else{
                $start8 = $start7;
                $end8 = $end7;
            }
        ?>
        </div>
    </div>
</div>