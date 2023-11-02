<div class="row">
    <div class="col-md-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header">
                <h3 class="box-title">
                    <div class="btn-group pull-right">
                        <button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-add"><i class="fa fa-fw fa-file-o"></i> Add</button>
                        <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-cancel form-hide"><i class="fa fa-fw fa-reply"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-save form-hide"><i class="fa fa-fw fa-save"></i> Save</button>
                    </div>
                </h3>
            </div><!-- /.box-header -->

            <!-- form start -->
            <form role="form" class="form-input-data animated form-hide" style="z-index: 1009;">
                <input type="hidden" name="id_" id="id_" class="form-control" value=""/>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Nama menu</label>
                                <input type="text" name="text" id="text" class="form-control" placeholder=""/>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Icon</label>
                                <select class="icon_select form-control" name="icon" id="icon">
                                    <option></option>
                                    <!-- <optgroup label='New Icons' data-icon='fa-bed'> -->
                                        <option value='fa fa-bed' data-icon='fa-bed'>fa-bed</option>
                                        <option value='fa fa-buysellads' data-icon='fa-buysellads'>fa-buysellads</option>
                                        <option value='fa fa-cart-arrow-down' data-icon='fa-cart-arrow-down'>fa-cart-arrow-down</option>
                                        <option value='fa fa-cart-plus' data-icon='fa-cart-plus'>fa-cart-plus</option>
                                        <option value='fa fa-connectdevelop' data-icon='fa-connectdevelop'>fa-connectdevelop</option>
                                        <option value='fa fa-dashcube' data-icon='fa-dashcube'>fa-dashcube</option>
                                        <option value='fa fa-diamond' data-icon='fa-diamond'>fa-diamond</option>
                                        <option value='fa fa-facebook-official' data-icon='fa-facebook-official'>fa-facebook-official</option>
                                        <option value='fa fa-forumbee' data-icon='fa-forumbee'>fa-forumbee</option>
                                        <option value='fa fa-heartbeat' data-icon='fa-heartbeat'>fa-heartbeat</option>
                                        <option value='fa fa-hotel' data-icon='fa-hotel'>fa-hotel</option>
                                        <option value='fa fa-leanpub' data-icon='fa-leanpub'>fa-leanpub</option>
                                        <option value='fa fa-mars' data-icon='fa-mars'>fa-mars</option>
                                        <option value='fa fa-mars-double' data-icon='fa-mars-double'>fa-mars-double</option>
                                        <option value='fa fa-mars-stroke' data-icon='fa-mars-stroke'>fa-mars-stroke</option>
                                        <option value='fa fa-mars-stroke-h' data-icon='fa-mars-stroke-h'>fa-mars-stroke-h</option>
                                        <option value='fa fa-mars-stroke-v' data-icon='fa-mars-stroke-v'>fa-mars-stroke-v</option>
                                        <option value='fa fa-medium' data-icon='fa-medium'>fa-medium</option>
                                        <option value='fa fa-mercury' data-icon='fa-mercury'>fa-mercury</option>
                                        <option value='fa fa-motorcycle' data-icon='fa-motorcycle'>fa-motorcycle</option>
                                        <option value='fa fa-neuter' data-icon='fa-neuter'>fa-neuter</option>
                                        <option value='fa fa-pinterest-p' data-icon='fa-pinterest-p'>fa-pinterest-p</option>
                                        <option value='fa fa-sellsy' data-icon='fa-sellsy'>fa-sellsy</option>
                                        <option value='fa fa-server' data-icon='fa-server'>fa-server</option>
                                        <option value='fa fa-ship' data-icon='fa-ship'>fa-ship</option>
                                        <option value='fa fa-shirtsinbulk' data-icon='fa-shirtsinbulk'>fa-shirtsinbulk</option>
                                        <option value='fa fa-simplybuilt' data-icon='fa-simplybuilt'>fa-simplybuilt</option>
                                        <option value='fa fa-skyatlas' data-icon='fa-skyatlas'>fa-skyatlas</option>
                                        <option value='fa fa-street-view' data-icon='fa-street-view'>fa-street-view</option>
                                        <option value='fa fa-subway' data-icon='fa-subway'>fa-subway</option>
                                        <option value='fa fa-train' data-icon='fa-train'>fa-train</option>
                                        <option value='fa fa-transgender' data-icon='fa-transgender'>fa-transgender</option>
                                        <option value='fa fa-transgender-alt' data-icon='fa-transgender-alt'>fa-transgender-alt</option>
                                        <option value='fa fa-user-plus' data-icon='fa-user-plus'>fa-user-plus</option>
                                        <option value='fa fa-user-secret' data-icon='fa-user-secret'>fa-user-secret</option>
                                        <option value='fa fa-user-times' data-icon='fa-user-times'>fa-user-times</option>
                                        <option value='fa fa-venus' data-icon='fa-venus'>fa-venus</option>
                                        <option value='fa fa-venus-double' data-icon='fa-venus-double'>fa-venus-double</option>
                                        <option value='fa fa-venus-mars' data-icon='fa-venus-mars'>fa-venus-mars</option>
                                        <option value='fa fa-viacoin' data-icon='fa-viacoin'>fa-viacoin</option>
                                        <option value='fa fa-whatsapp' data-icon='fa-whatsapp'>fa-whatsapp</option>
                                    <!-- </optgroup>
                                    <optgroup l -->abel='Web Application Icons'>
                                        <option value='fa fa-adjust' data-icon='fa-adjust'>fa-adjust</option>
                                        <option value='fa fa-anchor' data-icon='fa-anchor'>fa-anchor</option>
                                        <option value='fa fa-archive' data-icon='fa-archive'>fa-archive</option>
                                        <option value='fa fa-area-chart' data-icon='fa-area-chart'>fa-area-chart</option>
                                        <option value='fa fa-arrows' data-icon='fa-arrows'>fa-arrows</option>
                                        <option value='fa fa-arrows-h' data-icon='fa-arrows-h'>fa-arrows-h</option>
                                        <option value='fa fa-arrows-v' data-icon='fa-arrows-v'>fa-arrows-v</option>
                                        <option value='fa fa-asterisk' data-icon='fa-asterisk'>fa-asterisk</option>
                                        <option value='fa fa-at' data-icon='fa-at'>fa-at</option>
                                        <option value='fa fa-automobile' data-icon='fa-automobile'>fa-automobile</option>
                                        <option value='fa fa-ban' data-icon='fa-ban'>fa-ban</option>
                                        <option value='fa fa-bank' data-icon='fa-bank'>fa-bank</option>
                                        <option value='fa fa-bar-chart' data-icon='fa-bar-chart'>fa-bar-chart</option>
                                        <option value='fa fa-bar-chart-o' data-icon='fa-bar-chart-o'>fa-bar-chart-o</option>
                                        <option value='fa fa-barcode' data-icon='fa-barcode'>fa-barcode</option>
                                        <option value='fa fa-bars' data-icon='fa-bars'>fa-bars</option>
                                        <option value='fa fa-bed' data-icon='fa-bed'>fa-bed</option>
                                        <option value='fa fa-beer' data-icon='fa-beer'>fa-beer</option>
                                        <option value='fa fa-bell' data-icon='fa-bell'>fa-bell</option>
                                        <option value='fa fa-bell-o' data-icon='fa-bell-o'>fa-bell-o</option>
                                        <option value='fa fa-bell-slash' data-icon='fa-bell-slash'>fa-bell-slash</option>
                                        <option value='fa fa-bell-slash-o' data-icon='fa-bell-slash-o'>fa-bell-slash-o</option>
                                        <option value='fa fa-bicycle' data-icon='fa-bicycle'>fa-bicycle</option>
                                        <option value='fa fa-binoculars' data-icon='fa-binoculars'>fa-binoculars</option>
                                        <option value='fa fa-birthday-cake' data-icon='fa-birthday-cake'>fa-birthday-cake</option>
                                        <option value='fa fa-bolt' data-icon='fa-bolt'>fa-bolt</option>
                                        <option value='fa fa-bomb' data-icon='fa-bomb'>fa-bomb</option>
                                        <option value='fa fa-book' data-icon='fa-book'>fa-book</option>
                                        <option value='fa fa-bookmark' data-icon='fa-bookmark'>fa-bookmark</option>
                                        <option value='fa fa-bookmark-o' data-icon='fa-bookmark-o'>fa-bookmark-o</option>
                                        <option value='fa fa-briefcase' data-icon='fa-briefcase'>fa-briefcase</option>
                                        <option value='fa fa-bug' data-icon='fa-bug'>fa-bug</option>
                                        <option value='fa fa-building' data-icon='fa-building'>fa-building</option>
                                        <option value='fa fa-building-o' data-icon='fa-building-o'>fa-building-o</option>
                                        <option value='fa fa-bullhorn' data-icon='fa-bullhorn'>fa-bullhorn</option>
                                        <option value='fa fa-bullseye' data-icon='fa-bullseye'>fa-bullseye</option>
                                        <option value='fa fa-bus' data-icon='fa-bus'>fa-bus</option>
                                        <option value='fa fa-cab' data-icon='fa-cab'>fa-cab</option>
                                        <option value='fa fa-calculator' data-icon='fa-calculator'>fa-calculator</option>
                                        <option value='fa fa-calendar' data-icon='fa-calendar'>fa-calendar</option>
                                        <option value='fa fa-calendar-o' data-icon='fa-calendar-o'>fa-calendar-o</option>
                                        <option value='fa fa-camera' data-icon='fa-camera'>fa-camera</option>
                                        <option value='fa fa-camera-retro' data-icon='fa-camera-retro'>fa-camera-retro</option>
                                        <option value='fa fa-car' data-icon='fa-car'>fa-car</option>
                                        <option value='fa fa-caret-square-o-down' data-icon='fa-caret-square-o-down'>fa-caret-square-o-down</option>
                                        <option value='fa fa-caret-square-o-left' data-icon='fa-caret-square-o-left'>fa-caret-square-o-left</option>
                                        <option value='fa fa-caret-square-o-right' data-icon='fa-caret-square-o-right'>fa-caret-square-o-right</option>
                                        <option value='fa fa-caret-square-o-up' data-icon='fa-caret-square-o-up'>fa-caret-square-o-up</option>
                                        <option value='fa fa-cart-arrow-down' data-icon='fa-cart-arrow-down'>fa-cart-arrow-down</option>
                                        <option value='fa fa-cart-plus' data-icon='fa-cart-plus'>fa-cart-plus</option>
                                        <option value='fa fa-cc' data-icon='fa-cc'>fa-cc</option>
                                        <option value='fa fa-certificate' data-icon='fa-certificate'>fa-certificate</option>
                                        <option value='fa fa-check' data-icon='fa-check'>fa-check</option>
                                        <option value='fa fa-check-circle' data-icon='fa-check-circle'>fa-check-circle</option>
                                        <option value='fa fa-check-circle-o' data-icon='fa-check-circle-o'>fa-check-circle-o</option>
                                        <option value='fa fa-check-square' data-icon='fa-check-square'>fa-check-square</option>
                                        <option value='fa fa-check-square-o' data-icon='fa-check-square-o'>fa-check-square-o</option>
                                        <option value='fa fa-child' data-icon='fa-child'>fa-child</option>
                                        <option value='fa fa-circle' data-icon='fa-circle'>fa-circle</option>
                                        <option value='fa fa-circle-o' data-icon='fa-circle-o'>fa-circle-o</option>
                                        <option value='fa fa-circle-o-notch' data-icon='fa-circle-o-notch'>fa-circle-o-notch</option>
                                        <option value='fa fa-circle-thin' data-icon='fa-circle-thin'>fa-circle-thin</option>
                                        <option value='fa fa-clock-o' data-icon='fa-clock-o'>fa-clock-o</option>
                                        <option value='fa fa-close' data-icon='fa-close'>fa-close</option>
                                        <option value='fa fa-cloud' data-icon='fa-cloud'>fa-cloud</option>
                                        <option value='fa fa-cloud-download' data-icon='fa-cloud-download'>fa-cloud-download</option>
                                        <option value='fa fa-cloud-upload' data-icon='fa-cloud-upload'>fa-cloud-upload</option>
                                        <option value='fa fa-code' data-icon='fa-code'>fa-code</option>
                                        <option value='fa fa-code-fork' data-icon='fa-code-fork'>fa-code-fork</option>
                                        <option value='fa fa-coffee' data-icon='fa-coffee'>fa-coffee</option>
                                        <option value='fa fa-cog' data-icon='fa-cog'>fa-cog</option>
                                        <option value='fa fa-cogs' data-icon='fa-cogs'>fa-cogs</option>
                                        <option value='fa fa-comment' data-icon='fa-comment'>fa-comment</option>
                                        <option value='fa fa-comment-o' data-icon='fa-comment-o'>fa-comment-o</option>
                                        <option value='fa fa-comments' data-icon='fa-comments'>fa-comments</option>
                                        <option value='fa fa-comments-o' data-icon='fa-comments-o'>fa-comments-o</option>
                                        <option value='fa fa-compass' data-icon='fa-compass'>fa-compass</option>
                                        <option value='fa fa-copyright' data-icon='fa-copyright'>fa-copyright</option>
                                        <option value='fa fa-credit-card' data-icon='fa-credit-card'>fa-credit-card</option>
                                        <option value='fa fa-crop' data-icon='fa-crop'>fa-crop</option>
                                        <option value='fa fa-crosshairs' data-icon='fa-crosshairs'>fa-crosshairs</option>
                                        <option value='fa fa-cube' data-icon='fa-cube'>fa-cube</option>
                                        <option value='fa fa-cubes' data-icon='fa-cubes'>fa-cubes</option>
                                        <option value='fa fa-cutlery' data-icon='fa-cutlery'>fa-cutlery</option>
                                        <option value='fa fa-dashboard' data-icon='fa-dashboard'>fa-dashboard</option>
                                        <option value='fa fa-database' data-icon='fa-database'>fa-database</option>
                                        <option value='fa fa-desktop' data-icon='fa-desktop'>fa-desktop</option>
                                        <option value='fa fa-diamond' data-icon='fa-diamond'>fa-diamond</option>
                                        <option value='fa fa-dot-circle-o' data-icon='fa-dot-circle-o'>fa-dot-circle-o</option>
                                        <option value='fa fa-download' data-icon='fa-download'>fa-download</option>
                                        <option value='fa fa-edit' data-icon='fa-edit'>fa-edit</option>
                                        <option value='fa fa-ellipsis-h' data-icon='fa-ellipsis-h'>fa-ellipsis-h</option>
                                        <option value='fa fa-ellipsis-v' data-icon='fa-ellipsis-v'>fa-ellipsis-v</option>
                                        <option value='fa fa-envelope' data-icon='fa-envelope'>fa-envelope</option>
                                        <option value='fa fa-envelope-o' data-icon='fa-envelope-o'>fa-envelope-o</option>
                                        <option value='fa fa-envelope-square' data-icon='fa-envelope-square'>fa-envelope-square</option>
                                        <option value='fa fa-eraser' data-icon='fa-eraser'>fa-eraser</option>
                                        <option value='fa fa-exchange' data-icon='fa-exchange'>fa-exchange</option>
                                        <option value='fa fa-exclamation' data-icon='fa-exclamation'>fa-exclamation</option>
                                        <option value='fa fa-exclamation-circle' data-icon='fa-exclamation-circle'>fa-exclamation-circle</option>
                                        <option value='fa fa-exclamation-triangle' data-icon='fa-exclamation-triangle'>fa-exclamation-triangle</option>
                                        <option value='fa fa-external-link' data-icon='fa-external-link'>fa-external-link</option>
                                        <option value='fa fa-external-link-square' data-icon='fa-external-link-square'>fa-external-link-square</option>
                                        <option value='fa fa-eye' data-icon='fa-eye'>fa-eye</option>
                                        <option value='fa fa-eye-slash' data-icon='fa-eye-slash'>fa-eye-slash</option>
                                        <option value='fa fa-eyedropper' data-icon='fa-eyedropper'>fa-eyedropper</option>
                                        <option value='fa fa-fax' data-icon='fa-fax'>fa-fax</option>
                                        <option value='fa fa-female' data-icon='fa-female'>fa-female</option>
                                        <option value='fa fa-fighter-jet' data-icon='fa-fighter-jet'>fa-fighter-jet</option>
                                        <option value='fa fa-file-archive-o' data-icon='fa-file-archive-o'>fa-file-archive-o</option>
                                        <option value='fa fa-file-audio-o' data-icon='fa-file-audio-o'>fa-file-audio-o</option>
                                        <option value='fa fa-file-code-o' data-icon='fa-file-code-o'>fa-file-code-o</option>
                                        <option value='fa fa-file-excel-o' data-icon='fa-file-excel-o'>fa-file-excel-o</option>
                                        <option value='fa fa-file-image-o' data-icon='fa-file-image-o'>fa-file-image-o</option>
                                        <option value='fa fa-file-movie-o' data-icon='fa-file-movie-o'>fa-file-movie-o</option>
                                        <option value='fa fa-file-pdf-o' data-icon='fa-file-pdf-o'>fa-file-pdf-o</option>
                                        <option value='fa fa-file-photo-o' data-icon='fa-file-photo-o'>fa-file-photo-o</option>
                                        <option value='fa fa-file-picture-o' data-icon='fa-file-picture-o'>fa-file-picture-o</option>
                                        <option value='fa fa-file-powerpoint-o' data-icon='fa-file-powerpoint-o'>fa-file-powerpoint-o</option>
                                        <option value='fa fa-file-sound-o' data-icon='fa-file-sound-o'>fa-file-sound-o</option>
                                        <option value='fa fa-file-video-o' data-icon='fa-file-video-o'>fa-file-video-o</option>
                                        <option value='fa fa-file-word-o' data-icon='fa-file-word-o'>fa-file-word-o</option>
                                        <option value='fa fa-file-zip-o' data-icon='fa-file-zip-o'>fa-file-zip-o</option>
                                        <option value='fa fa-film' data-icon='fa-film'>fa-film</option>
                                        <option value='fa fa-filter' data-icon='fa-filter'>fa-filter</option>
                                        <option value='fa fa-fire' data-icon='fa-fire'>fa-fire</option>
                                        <option value='fa fa-fire-extinguisher' data-icon='fa-fire-extinguisher'>fa-fire-extinguisher</option>
                                        <option value='fa fa-flag' data-icon='fa-flag'>fa-flag</option>
                                        <option value='fa fa-flag-checkered' data-icon='fa-flag-checkered'>fa-flag-checkered</option>
                                        <option value='fa fa-flag-o' data-icon='fa-flag-o'>fa-flag-o</option>
                                        <option value='fa fa-flash' data-icon='fa-flash'>fa-flash</option>
                                        <option value='fa fa-flask' data-icon='fa-flask'>fa-flask</option>
                                        <option value='fa fa-folder' data-icon='fa-folder'>fa-folder</option>
                                        <option value='fa fa-folder-o' data-icon='fa-folder-o'>fa-folder-o</option>
                                        <option value='fa fa-folder-open' data-icon='fa-folder-open'>fa-folder-open</option>
                                        <option value='fa fa-folder-open-o' data-icon='fa-folder-open-o'>fa-folder-open-o</option>
                                        <option value='fa fa-frown-o' data-icon='fa-frown-o'>fa-frown-o</option>
                                        <option value='fa fa-futbol-o' data-icon='fa-futbol-o'>fa-futbol-o</option>
                                        <option value='fa fa-gamepad' data-icon='fa-gamepad'>fa-gamepad</option>
                                        <option value='fa fa-gavel' data-icon='fa-gavel'>fa-gavel</option>
                                        <option value='fa fa-gear' data-icon='fa-gear'>fa-gear</option>
                                        <option value='fa fa-gears' data-icon='fa-gears'>fa-gears</option>
                                        <option value='fa fa-genderless' data-icon='fa-genderless'>fa-genderless</option>
                                        <option value='fa fa-gift' data-icon='fa-gift'>fa-gift</option>
                                        <option value='fa fa-glass' data-icon='fa-glass'>fa-glass</option>
                                        <option value='fa fa-globe' data-icon='fa-globe'>fa-globe</option>
                                        <option value='fa fa-graduation-cap' data-icon='fa-graduation-cap'>fa-graduation-cap</option>
                                        <option value='fa fa-group' data-icon='fa-group'>fa-group</option>
                                        <option value='fa fa-hdd-o' data-icon='fa-hdd-o'>fa-hdd-o</option>
                                        <option value='fa fa-headphones' data-icon='fa-headphones'>fa-headphones</option>
                                        <option value='fa fa-heart' data-icon='fa-heart'>fa-heart</option>
                                        <option value='fa fa-heart-o' data-icon='fa-heart-o'>fa-heart-o</option>
                                        <option value='fa fa-heartbeat' data-icon='fa-heartbeat'>fa-heartbeat</option>
                                        <option value='fa fa-history' data-icon='fa-history'>fa-history</option>
                                        <option value='fa fa-home' data-icon='fa-home'>fa-home</option>
                                        <option value='fa fa-hotel' data-icon='fa-hotel'>fa-hotel</option>
                                        <option value='fa fa-image' data-icon='fa-image'>fa-image</option>
                                        <option value='fa fa-inbox' data-icon='fa-inbox'>fa-inbox</option>
                                        <option value='fa fa-info' data-icon='fa-info'>fa-info</option>
                                        <option value='fa fa-info-circle' data-icon='fa-info-circle'>fa-info-circle</option>
                                        <option value='fa fa-institution' data-icon='fa-institution'>fa-institution</option>
                                        <option value='fa fa-key' data-icon='fa-key'>fa-key</option>
                                        <option value='fa fa-keyboard-o' data-icon='fa-keyboard-o'>fa-keyboard-o</option>
                                        <option value='fa fa-language' data-icon='fa-language'>fa-language</option>
                                        <option value='fa fa-laptop' data-icon='fa-laptop'>fa-laptop</option>
                                        <option value='fa fa-leaf' data-icon='fa-leaf'>fa-leaf</option>
                                        <option value='fa fa-legal' data-icon='fa-legal'>fa-legal</option>
                                        <option value='fa fa-lemon-o' data-icon='fa-lemon-o'>fa-lemon-o</option>
                                        <option value='fa fa-level-down' data-icon='fa-level-down'>fa-level-down</option>
                                        <option value='fa fa-level-up' data-icon='fa-level-up'>fa-level-up</option>
                                        <option value='fa fa-life-bouy' data-icon='fa-life-bouy'>fa-life-bouy</option>
                                        <option value='fa fa-life-buoy' data-icon='fa-life-buoy'>fa-life-buoy</option>
                                        <option value='fa fa-life-ring' data-icon='fa-life-ring'>fa-life-ring</option>
                                        <option value='fa fa-life-saver' data-icon='fa-life-saver'>fa-life-saver</option>
                                        <option value='fa fa-lightbulb-o' data-icon='fa-lightbulb-o'>fa-lightbulb-o</option>
                                        <option value='fa fa-line-chart' data-icon='fa-line-chart'>fa-line-chart</option>
                                        <option value='fa fa-location-arrow' data-icon='fa-location-arrow'>fa-location-arrow</option>
                                        <option value='fa fa-lock' data-icon='fa-lock'>fa-lock</option>
                                        <option value='fa fa-magic' data-icon='fa-magic'>fa-magic</option>
                                        <option value='fa fa-magnet' data-icon='fa-magnet'>fa-magnet</option>
                                        <option value='fa fa-mail-forward' data-icon='fa-mail-forward'>fa-mail-forward</option>
                                        <option value='fa fa-mail-reply' data-icon='fa-mail-reply'>fa-mail-reply</option>
                                        <option value='fa fa-mail-reply-all' data-icon='fa-mail-reply-all'>fa-mail-reply-all</option>
                                        <option value='fa fa-male' data-icon='fa-male'>fa-male</option>
                                        <option value='fa fa-map-marker' data-icon='fa-map-marker'>fa-map-marker</option>
                                        <option value='fa fa-meh-o' data-icon='fa-meh-o'>fa-meh-o</option>
                                        <option value='fa fa-microphone' data-icon='fa-microphone'>fa-microphone</option>
                                        <option value='fa fa-microphone-slash' data-icon='fa-microphone-slash'>fa-microphone-slash</option>
                                        <option value='fa fa-minus' data-icon='fa-minus'>fa-minus</option>
                                        <option value='fa fa-minus-circle' data-icon='fa-minus-circle'>fa-minus-circle</option>
                                        <option value='fa fa-minus-square' data-icon='fa-minus-square'>fa-minus-square</option>
                                        <option value='fa fa-minus-square-o' data-icon='fa-minus-square-o'>fa-minus-square-o</option>
                                        <option value='fa fa-mobile' data-icon='fa-mobile'>fa-mobile</option>
                                        <option value='fa fa-mobile-phone' data-icon='fa-mobile-phone'>fa-mobile-phone</option>
                                        <option value='fa fa-money' data-icon='fa-money'>fa-money</option>
                                        <option value='fa fa-moon-o' data-icon='fa-moon-o'>fa-moon-o</option>
                                        <option value='fa fa-mortar-board' data-icon='fa-mortar-board'>fa-mortar-board</option>
                                        <option value='fa fa-motorcycle' data-icon='fa-motorcycle'>fa-motorcycle</option>
                                        <option value='fa fa-music' data-icon='fa-music'>fa-music</option>
                                        <option value='fa fa-navicon' data-icon='fa-navicon'>fa-navicon</option>
                                        <option value='fa fa-newspaper-o' data-icon='fa-newspaper-o'>fa-newspaper-o</option>
                                        <option value='fa fa-paint-brush' data-icon='fa-paint-brush'>fa-paint-brush</option>
                                        <option value='fa fa-paper-plane' data-icon='fa-paper-plane'>fa-paper-plane</option>
                                        <option value='fa fa-paper-plane-o' data-icon='fa-paper-plane-o'>fa-paper-plane-o</option>
                                        <option value='fa fa-paw' data-icon='fa-paw'>fa-paw</option>
                                        <option value='fa fa-pencil' data-icon='fa-pencil'>fa-pencil</option>
                                        <option value='fa fa-pencil-square' data-icon='fa-pencil-square'>fa-pencil-square</option>
                                        <option value='fa fa-pencil-square-o' data-icon='fa-pencil-square-o'>fa-pencil-square-o</option>
                                        <option value='fa fa-phone' data-icon='fa-phone'>fa-phone</option>
                                        <option value='fa fa-phone-square' data-icon='fa-phone-square'>fa-phone-square</option>
                                        <option value='fa fa-photo' data-icon='fa-photo'>fa-photo</option>
                                        <option value='fa fa-picture-o' data-icon='fa-picture-o'>fa-picture-o</option>
                                        <option value='fa fa-pie-chart' data-icon='fa-pie-chart'>fa-pie-chart</option>
                                        <option value='fa fa-plane' data-icon='fa-plane'>fa-plane</option>
                                        <option value='fa fa-plug' data-icon='fa-plug'>fa-plug</option>
                                        <option value='fa fa-plus' data-icon='fa-plus'>fa-plus</option>
                                        <option value='fa fa-plus-circle' data-icon='fa-plus-circle'>fa-plus-circle</option>
                                        <option value='fa fa-plus-square' data-icon='fa-plus-square'>fa-plus-square</option>
                                        <option value='fa fa-plus-square-o' data-icon='fa-plus-square-o'>fa-plus-square-o</option>
                                        <option value='fa fa-power-off' data-icon='fa-power-off'>fa-power-off</option>
                                        <option value='fa fa-print' data-icon='fa-print'>fa-print</option>
                                        <option value='fa fa-puzzle-piece' data-icon='fa-puzzle-piece'>fa-puzzle-piece</option>
                                        <option value='fa fa-qrcode' data-icon='fa-qrcode'>fa-qrcode</option>
                                        <option value='fa fa-question' data-icon='fa-question'>fa-question</option>
                                        <option value='fa fa-question-circle' data-icon='fa-question-circle'>fa-question-circle</option>
                                        <option value='fa fa-quote-left' data-icon='fa-quote-left'>fa-quote-left</option>
                                        <option value='fa fa-quote-right' data-icon='fa-quote-right'>fa-quote-right</option>
                                        <option value='fa fa-random' data-icon='fa-random'>fa-random</option>
                                        <option value='fa fa-recycle' data-icon='fa-recycle'>fa-recycle</option>
                                        <option value='fa fa-refresh' data-icon='fa-refresh'>fa-refresh</option>
                                        <option value='fa fa-remove' data-icon='fa-remove'>fa-remove</option>
                                        <option value='fa fa-reorder' data-icon='fa-reorder'>fa-reorder</option>
                                        <option value='fa fa-reply' data-icon='fa-reply'>fa-reply</option>
                                        <option value='fa fa-reply-all' data-icon='fa-reply-all'>fa-reply-all</option>
                                        <option value='fa fa-retweet' data-icon='fa-retweet'>fa-retweet</option>
                                        <option value='fa fa-road' data-icon='fa-road'>fa-road</option>
                                        <option value='fa fa-rocket' data-icon='fa-rocket'>fa-rocket</option>
                                        <option value='fa fa-rss' data-icon='fa-rss'>fa-rss</option>
                                        <option value='fa fa-rss-square' data-icon='fa-rss-square'>fa-rss-square</option>
                                        <option value='fa fa-search' data-icon='fa-search'>fa-search</option>
                                        <option value='fa fa-search-minus' data-icon='fa-search-minus'>fa-search-minus</option>
                                        <option value='fa fa-search-plus' data-icon='fa-search-plus'>fa-search-plus</option>
                                        <option value='fa fa-send' data-icon='fa-send'>fa-send</option>
                                        <option value='fa fa-send-o' data-icon='fa-send-o'>fa-send-o</option>
                                        <option value='fa fa-server' data-icon='fa-server'>fa-server</option>
                                        <option value='fa fa-share' data-icon='fa-share'>fa-share</option>
                                        <option value='fa fa-share-alt' data-icon='fa-share-alt'>fa-share-alt</option>
                                        <option value='fa fa-share-alt-square' data-icon='fa-share-alt-square'>fa-share-alt-square</option>
                                        <option value='fa fa-share-square' data-icon='fa-share-square'>fa-share-square</option>
                                        <option value='fa fa-share-square-o' data-icon='fa-share-square-o'>fa-share-square-o</option>
                                        <option value='fa fa-shield' data-icon='fa-shield'>fa-shield</option>
                                        <option value='fa fa-ship' data-icon='fa-ship'>fa-ship</option>
                                        <option value='fa fa-shopping-cart' data-icon='fa-shopping-cart'>fa-shopping-cart</option>
                                        <option value='fa fa-sign-in' data-icon='fa-sign-in'>fa-sign-in</option>
                                        <option value='fa fa-sign-out' data-icon='fa-sign-out'>fa-sign-out</option>
                                        <option value='fa fa-signal' data-icon='fa-signal'>fa-signal</option>
                                        <option value='fa fa-sitemap' data-icon='fa-sitemap'>fa-sitemap</option>
                                        <option value='fa fa-sliders' data-icon='fa-sliders'>fa-sliders</option>
                                        <option value='fa fa-smile-o' data-icon='fa-smile-o'>fa-smile-o</option>
                                        <option value='fa fa-soccer-ball-o' data-icon='fa-soccer-ball-o'>fa-soccer-ball-o</option>
                                        <option value='fa fa-sort' data-icon='fa-sort'>fa-sort</option>
                                        <option value='fa fa-sort-alpha-asc' data-icon='fa-sort-alpha-asc'>fa-sort-alpha-asc</option>
                                        <option value='fa fa-sort-alpha-desc' data-icon='fa-sort-alpha-desc'>fa-sort-alpha-desc</option>
                                        <option value='fa fa-sort-amount-asc' data-icon='fa-sort-amount-asc'>fa-sort-amount-asc</option>
                                        <option value='fa fa-sort-amount-desc' data-icon='fa-sort-amount-desc'>fa-sort-amount-desc</option>
                                        <option value='fa fa-sort-asc' data-icon='fa-sort-asc'>fa-sort-asc</option>
                                        <option value='fa fa-sort-desc' data-icon='fa-sort-desc'>fa-sort-desc</option>
                                        <option value='fa fa-sort-down' data-icon='fa-sort-down'>fa-sort-down</option>
                                        <option value='fa fa-sort-numeric-asc' data-icon='fa-sort-numeric-asc'>fa-sort-numeric-asc</option>
                                        <option value='fa fa-sort-numeric-desc' data-icon='fa-sort-numeric-desc'>fa-sort-numeric-desc</option>
                                        <option value='fa fa-sort-up' data-icon='fa-sort-up'>fa-sort-up</option>
                                        <option value='fa fa-space-shuttle' data-icon='fa-space-shuttle'>fa-space-shuttle</option>
                                        <option value='fa fa-spinner' data-icon='fa-spinner'>fa-spinner</option>
                                        <option value='fa fa-spoon' data-icon='fa-spoon'>fa-spoon</option>
                                        <option value='fa fa-square' data-icon='fa-square'>fa-square</option>
                                        <option value='fa fa-square-o' data-icon='fa-square-o'>fa-square-o</option>
                                        <option value='fa fa-star' data-icon='fa-star'>fa-star</option>
                                        <option value='fa fa-star-half' data-icon='fa-star-half'>fa-star-half</option>
                                        <option value='fa fa-star-half-empty' data-icon='fa-star-half-empty'>fa-star-half-empty</option>
                                        <option value='fa fa-star-half-full' data-icon='fa-star-half-full'>fa-star-half-full</option>
                                        <option value='fa fa-star-half-o' data-icon='fa-star-half-o'>fa-star-half-o</option>
                                        <option value='fa fa-star-o' data-icon='fa-star-o'>fa-star-o</option>
                                        <option value='fa fa-street-view' data-icon='fa-street-view'>fa-street-view</option>
                                        <option value='fa fa-suitcase' data-icon='fa-suitcase'>fa-suitcase</option>
                                        <option value='fa fa-sun-o' data-icon='fa-sun-o'>fa-sun-o</option>
                                        <option value='fa fa-support' data-icon='fa-support'>fa-support</option>
                                        <option value='fa fa-tablet' data-icon='fa-tablet'>fa-tablet</option>
                                        <option value='fa fa-tachometer' data-icon='fa-tachometer'>fa-tachometer</option>
                                        <option value='fa fa-tag' data-icon='fa-tag'>fa-tag</option>
                                        <option value='fa fa-tags' data-icon='fa-tags'>fa-tags</option>
                                        <option value='fa fa-tasks' data-icon='fa-tasks'>fa-tasks</option>
                                        <option value='fa fa-taxi' data-icon='fa-taxi'>fa-taxi</option>
                                        <option value='fa fa-terminal' data-icon='fa-terminal'>fa-terminal</option>
                                        <option value='fa fa-thumb-tack' data-icon='fa-thumb-tack'>fa-thumb-tack</option>
                                        <option value='fa fa-thumbs-down' data-icon='fa-thumbs-down'>fa-thumbs-down</option>
                                        <option value='fa fa-thumbs-o-down' data-icon='fa-thumbs-o-down'>fa-thumbs-o-down</option>
                                        <option value='fa fa-thumbs-o-up' data-icon='fa-thumbs-o-up'>fa-thumbs-o-up</option>
                                        <option value='fa fa-thumbs-up' data-icon='fa-thumbs-up'>fa-thumbs-up</option>
                                        <option value='fa fa-ticket' data-icon='fa-ticket'>fa-ticket</option>
                                        <option value='fa fa-times' data-icon='fa-times'>fa-times</option>
                                        <option value='fa fa-times-circle' data-icon='fa-times-circle'>fa-times-circle</option>
                                        <option value='fa fa-times-circle-o' data-icon='fa-times-circle-o'>fa-times-circle-o</option>
                                        <option value='fa fa-tint' data-icon='fa-tint'>fa-tint</option>
                                        <option value='fa fa-toggle-down' data-icon='fa-toggle-down'>fa-toggle-down</option>
                                        <option value='fa fa-toggle-left' data-icon='fa-toggle-left'>fa-toggle-left</option>
                                        <option value='fa fa-toggle-off' data-icon='fa-toggle-off'>fa-toggle-off</option>
                                        <option value='fa fa-toggle-on' data-icon='fa-toggle-on'>fa-toggle-on</option>
                                        <option value='fa fa-toggle-right' data-icon='fa-toggle-right'>fa-toggle-right</option>
                                        <option value='fa fa-toggle-up' data-icon='fa-toggle-up'>fa-toggle-up</option>
                                        <option value='fa fa-trash' data-icon='fa-trash'>fa-trash</option>
                                        <option value='fa fa-trash-o' data-icon='fa-trash-o'>fa-trash-o</option>
                                        <option value='fa fa-tree' data-icon='fa-tree'>fa-tree</option>
                                        <option value='fa fa-trophy' data-icon='fa-trophy'>fa-trophy</option>
                                        <option value='fa fa-truck' data-icon='fa-truck'>fa-truck</option>
                                        <option value='fa fa-tty' data-icon='fa-tty'>fa-tty</option>
                                        <option value='fa fa-umbrella' data-icon='fa-umbrella'>fa-umbrella</option>
                                        <option value='fa fa-university' data-icon='fa-university'>fa-university</option>
                                        <option value='fa fa-unlock' data-icon='fa-unlock'>fa-unlock</option>
                                        <option value='fa fa-unlock-alt' data-icon='fa-unlock-alt'>fa-unlock-alt</option>
                                        <option value='fa fa-unsorted' data-icon='fa-unsorted'>fa-unsorted</option>
                                        <option value='fa fa-upload' data-icon='fa-upload'>fa-upload</option>
                                        <option value='fa fa-user' data-icon='fa-user'>fa-user</option>
                                        <option value='fa fa-user-plus' data-icon='fa-user-plus'>fa-user-plus</option>
                                        <option value='fa fa-user-secret' data-icon='fa-user-secret'>fa-user-secret</option>
                                        <option value='fa fa-user-times' data-icon='fa-user-times'>fa-user-times</option>
                                        <option value='fa fa-users' data-icon='fa-users'>fa-users</option>
                                        <option value='fa fa-video-camera' data-icon='fa-video-camera'>fa-video-camera</option>
                                        <option value='fa fa-volume-down' data-icon='fa-volume-down'>fa-volume-down</option>
                                        <option value='fa fa-volume-off' data-icon='fa-volume-off'>fa-volume-off</option>
                                        <option value='fa fa-volume-up' data-icon='fa-volume-up'>fa-volume-up</option>
                                        <option value='fa fa-warning' data-icon='fa-warning'>fa-warning</option>
                                        <option value='fa fa-wheelchair' data-icon='fa-wheelchair'>fa-wheelchair</option>
                                        <option value='fa fa-wifi' data-icon='fa-wifi'>fa-wifi</option>
                                        <option value='fa fa-wrench' data-icon='fa-wrench'>fa-wrench</option>
                                    <!-- </optgroup>
                                    <optgroup  -->label='Transportation Icons'>
                                        <option value='fa fa-ambulance' data-icon='fa-ambulance'>fa-ambulance</option>
                                        <option value='fa fa-automobile' data-icon='fa-automobile'>fa-automobile</option>
                                        <option value='fa fa-bicycle' data-icon='fa-bicycle'>fa-bicycle</option>
                                        <option value='fa fa-bus' data-icon='fa-bus'>fa-bus</option>
                                        <option value='fa fa-cab' data-icon='fa-cab'>fa-cab</option>
                                        <option value='fa fa-car' data-icon='fa-car'>fa-car</option>
                                        <option value='fa fa-fighter-jet' data-icon='fa-fighter-jet'>fa-fighter-jet</option>
                                        <option value='fa fa-motorcycle' data-icon='fa-motorcycle'>fa-motorcycle</option>
                                        <option value='fa fa-plane' data-icon='fa-plane'>fa-plane</option>
                                        <option value='fa fa-rocket' data-icon='fa-rocket'>fa-rocket</option>
                                        <option value='fa fa-ship' data-icon='fa-ship'>fa-ship</option>
                                        <option value='fa fa-space-shuttle' data-icon='fa-space-shuttle'>fa-space-shuttle</option>
                                        <option value='fa fa-subway' data-icon='fa-subway'>fa-subway</option>
                                        <option value='fa fa-taxi' data-icon='fa-taxi'>fa-taxi</option>
                                        <option value='fa fa-train' data-icon='fa-train'>fa-train</option>
                                        <option value='fa fa-truck' data-icon='fa-truck'>fa-truck</option>
                                        <option value='fa fa-wheelchair' data-icon='fa-wheelchair'>fa-wheelchair</option>
                                    <!-- </optgroup>
                                    <optgroup lab -->el='Gender Icons'>
                                        <option value='fa fa-circle-thin' data-icon='fa-circle-thin'>fa-circle-thin</option>
                                        <option value='fa fa-genderless' data-icon='fa-genderless'>fa-genderless</option>
                                        <option value='fa fa-mars' data-icon='fa-mars'>fa-mars</option>
                                        <option value='fa fa-mars-double' data-icon='fa-mars-double'>fa-mars-double</option>
                                        <option value='fa fa-mars-stroke' data-icon='fa-mars-stroke'>fa-mars-stroke</option>
                                        <option value='fa fa-mars-stroke-h' data-icon='fa-mars-stroke-h'>fa-mars-stroke-h</option>
                                        <option value='fa fa-mars-stroke-v' data-icon='fa-mars-stroke-v'>fa-mars-stroke-v</option>
                                        <option value='fa fa-mercury' data-icon='fa-mercury'>fa-mercury</option>
                                        <option value='fa fa-neuter' data-icon='fa-neuter'>fa-neuter</option>
                                        <option value='fa fa-transgender' data-icon='fa-transgender'>fa-transgender</option>
                                        <option value='fa fa-transgender-alt' data-icon='fa-transgender-alt'>fa-transgender-alt</option>
                                        <option value='fa fa-venus' data-icon='fa-venus'>fa-venus</option>
                                        <option value='fa fa-venus-double' data-icon='fa-venus-double'>fa-venus-double</option>
                                        <option value='fa fa-venus-mars' data-icon='fa-venus-mars'>fa-venus-mars</option>
                                    <!-- </optgroup>
                                    <optgroup la -->bel='File Type Icons'>
                                        <option value='fa fa-file' data-icon='fa-file'>fa-file</option>
                                        <option value='fa fa-file-archive-o' data-icon='fa-file-archive-o'>fa-file-archive-o</option>
                                        <option value='fa fa-file-audio-o' data-icon='fa-file-audio-o'>fa-file-audio-o</option>
                                        <option value='fa fa-file-code-o' data-icon='fa-file-code-o'>fa-file-code-o</option>
                                        <option value='fa fa-file-excel-o' data-icon='fa-file-excel-o'>fa-file-excel-o</option>
                                        <option value='fa fa-file-image-o' data-icon='fa-file-image-o'>fa-file-image-o</option>
                                        <option value='fa fa-file-movie-o' data-icon='fa-file-movie-o'>fa-file-movie-o</option>
                                        <option value='fa fa-file-o' data-icon='fa-file-o'>fa-file-o</option>
                                        <option value='fa fa-file-pdf-o' data-icon='fa-file-pdf-o'>fa-file-pdf-o</option>
                                        <option value='fa fa-file-photo-o' data-icon='fa-file-photo-o'>fa-file-photo-o</option>
                                        <option value='fa fa-file-picture-o' data-icon='fa-file-picture-o'>fa-file-picture-o</option>
                                        <option value='fa fa-file-powerpoint-o' data-icon='fa-file-powerpoint-o'>fa-file-powerpoint-o</option>
                                        <option value='fa fa-file-sound-o' data-icon='fa-file-sound-o'>fa-file-sound-o</option>
                                        <option value='fa fa-file-text' data-icon='fa-file-text'>fa-file-text</option>
                                        <option value='fa fa-file-text-o' data-icon='fa-file-text-o'>fa-file-text-o</option>
                                        <option value='fa fa-file-video-o' data-icon='fa-file-video-o'>fa-file-video-o</option>
                                        <option value='fa fa-file-word-o' data-icon='fa-file-word-o'>fa-file-word-o</option>
                                        <option value='fa fa-file-zip-o' data-icon='fa-file-zip-o'>fa-file-zip-o</option>
                                    <!-- </optgroup>
                                    <optgr -->oup label='Spinner Icons'>
                                        <option value='fa fa-circle-o-notch' data-icon='fa-circle-o-notch'>fa-circle-o-notch</option>
                                        <option value='fa fa-cog' data-icon='fa-cog'>fa-cog</option>
                                        <option value='fa fa-gear' data-icon='fa-gear'>fa-gear</option>
                                        <option value='fa fa-refresh' data-icon='fa-refresh'>fa-refresh</option>
                                        <option value='fa fa-spinner' data-icon='fa-spinner'>fa-spinner</option>
                                    <!-- </optgroup>
                                    <optgrou -->p label='Form Control Icons'>
                                        <option value='fa fa-check-square' data-icon='fa-check-square'>fa-check-square</option>
                                        <option value='fa fa-check-square-o' data-icon='fa-check-square-o'>fa-check-square-o</option>
                                        <option value='fa fa-circle' data-icon='fa-circle'>fa-circle</option>
                                        <option value='fa fa-circle-o' data-icon='fa-circle-o'>fa-circle-o</option>
                                        <option value='fa fa-dot-circle-o' data-icon='fa-dot-circle-o'>fa-dot-circle-o</option>
                                        <option value='fa fa-minus-square' data-icon='fa-minus-square'>fa-minus-square</option>
                                        <option value='fa fa-minus-square-o' data-icon='fa-minus-square-o'>fa-minus-square-o</option>
                                        <option value='fa fa-plus-square' data-icon='fa-plus-square'>fa-plus-square</option>
                                        <option value='fa fa-plus-square-o' data-icon='fa-plus-square-o'>fa-plus-square-o</option>
                                        <option value='fa fa-square' data-icon='fa-square'>fa-square</option>
                                        <option value='fa fa-square-o' data-icon='fa-square-o'>fa-square-o</option>
                                    <!-- </optgroup>
                                    <optgro -->up label='Payment Icons'>
                                        <option value='fa fa-cc-amex' data-icon='fa-cc-amex'>fa-cc-amex</option>
                                        <option value='fa fa-cc-discover' data-icon='fa-cc-discover'>fa-cc-discover</option>
                                        <option value='fa fa-cc-mastercard' data-icon='fa-cc-mastercard'>fa-cc-mastercard</option>
                                        <option value='fa fa-cc-paypal' data-icon='fa-cc-paypal'>fa-cc-paypal</option>
                                        <option value='fa fa-cc-stripe' data-icon='fa-cc-stripe'>fa-cc-stripe</option>
                                        <option value='fa fa-cc-visa' data-icon='fa-cc-visa'>fa-cc-visa</option>
                                        <option value='fa fa-credit-card' data-icon='fa-credit-card'>fa-credit-card</option>
                                        <option value='fa fa-google-wallet' data-icon='fa-google-wallet'>fa-google-wallet</option>
                                        <option value='fa fa-paypal' data-icon='fa-paypal'>fa-paypal</option>
                                    <!-- </optgroup>
                                    <optgr -->oup label='Chart Icons'>
                                        <option value='fa fa-area-chart' data-icon='fa-area-chart'>fa-area-chart</option>
                                        <option value='fa fa-bar-chart' data-icon='fa-bar-chart'>fa-bar-chart</option>
                                        <option value='fa fa-bar-chart-o' data-icon='fa-bar-chart-o'>fa-bar-chart-o</option>
                                        <option value='fa fa-line-chart' data-icon='fa-line-chart'>fa-line-chart</option>
                                        <option value='fa fa-pie-chart' data-icon='fa-pie-chart'>fa-pie-chart</option>
                                    <!-- </optgroup>
                                    <optg -->roup label='Currency Icons'>
                                        <option value='fa fa-bitcoin' data-icon='fa-bitcoin'>fa-bitcoin</option>
                                        <option value='fa fa-btc' data-icon='fa-btc'>fa-btc</option>
                                        <option value='fa fa-cny' data-icon='fa-cny'>fa-cny</option>
                                        <option value='fa fa-dollar' data-icon='fa-dollar'>fa-dollar</option>
                                        <option value='fa fa-eur' data-icon='fa-eur'>fa-eur</option>
                                        <option value='fa fa-euro' data-icon='fa-euro'>fa-euro</option>
                                        <option value='fa fa-gbp' data-icon='fa-gbp'>fa-gbp</option>
                                        <option value='fa fa-ils' data-icon='fa-ils'>fa-ils</option>
                                        <option value='fa fa-inr' data-icon='fa-inr'>fa-inr</option>
                                        <option value='fa fa-jpy' data-icon='fa-jpy'>fa-jpy</option>
                                        <option value='fa fa-krw' data-icon='fa-krw'>fa-krw</option>
                                        <option value='fa fa-money' data-icon='fa-money'>fa-money</option>
                                        <option value='fa fa-rmb' data-icon='fa-rmb'>fa-rmb</option>
                                        <option value='fa fa-rouble' data-icon='fa-rouble'>fa-rouble</option>
                                        <option value='fa fa-rub' data-icon='fa-rub'>fa-rub</option>
                                        <option value='fa fa-ruble' data-icon='fa-ruble'>fa-ruble</option>
                                        <option value='fa fa-rupee' data-icon='fa-rupee'>fa-rupee</option>
                                        <option value='fa fa-shekel' data-icon='fa-shekel'>fa-shekel</option>
                                        <option value='fa fa-sheqel' data-icon='fa-sheqel'>fa-sheqel</option>
                                        <option value='fa fa-try' data-icon='fa-try'>fa-try</option>
                                        <option value='fa fa-turkish-lira' data-icon='fa-turkish-lira'>fa-turkish-lira</option>
                                        <option value='fa fa-usd' data-icon='fa-usd'>fa-usd</option>
                                        <option value='fa fa-won' data-icon='fa-won'>fa-won</option>
                                        <option value='fa fa-yen' data-icon='fa-yen'>fa-yen</option>
                                    <!-- </optgroup>
                                    <optgro -->up label='Text Editor Icons'>
                                        <option value='fa fa-align-center' data-icon='fa-align-center'>fa-align-center</option>
                                        <option value='fa fa-align-justify' data-icon='fa-align-justify'>fa-align-justify</option>
                                        <option value='fa fa-align-left' data-icon='fa-align-left'>fa-align-left</option>
                                        <option value='fa fa-align-right' data-icon='fa-align-right'>fa-align-right</option>
                                        <option value='fa fa-bold' data-icon='fa-bold'>fa-bold</option>
                                        <option value='fa fa-chain' data-icon='fa-chain'>fa-chain</option>
                                        <option value='fa fa-chain-broken' data-icon='fa-chain-broken'>fa-chain-broken</option>
                                        <option value='fa fa-clipboard' data-icon='fa-clipboard'>fa-clipboard</option>
                                        <option value='fa fa-columns' data-icon='fa-columns'>fa-columns</option>
                                        <option value='fa fa-copy' data-icon='fa-copy'>fa-copy</option>
                                        <option value='fa fa-cut' data-icon='fa-cut'>fa-cut</option>
                                        <option value='fa fa-dedent' data-icon='fa-dedent'>fa-dedent</option>
                                        <option value='fa fa-eraser' data-icon='fa-eraser'>fa-eraser</option>
                                        <option value='fa fa-file' data-icon='fa-file'>fa-file</option>
                                        <option value='fa fa-file-o' data-icon='fa-file-o'>fa-file-o</option>
                                        <option value='fa fa-file-text' data-icon='fa-file-text'>fa-file-text</option>
                                        <option value='fa fa-file-text-o' data-icon='fa-file-text-o'>fa-file-text-o</option>
                                        <option value='fa fa-files-o' data-icon='fa-files-o'>fa-files-o</option>
                                        <option value='fa fa-floppy-o' data-icon='fa-floppy-o'>fa-floppy-o</option>
                                        <option value='fa fa-font' data-icon='fa-font'>fa-font</option>
                                        <option value='fa fa-header' data-icon='fa-header'>fa-header</option>
                                        <option value='fa fa-indent' data-icon='fa-indent'>fa-indent</option>
                                        <option value='fa fa-italic' data-icon='fa-italic'>fa-italic</option>
                                        <option value='fa fa-link' data-icon='fa-link'>fa-link</option>
                                        <option value='fa fa-list' data-icon='fa-list'>fa-list</option>
                                        <option value='fa fa-list-alt' data-icon='fa-list-alt'>fa-list-alt</option>
                                        <option value='fa fa-list-ol' data-icon='fa-list-ol'>fa-list-ol</option>
                                        <option value='fa fa-list-ul' data-icon='fa-list-ul'>fa-list-ul</option>
                                        <option value='fa fa-outdent' data-icon='fa-outdent'>fa-outdent</option>
                                        <option value='fa fa-paperclip' data-icon='fa-paperclip'>fa-paperclip</option>
                                        <option value='fa fa-paragraph' data-icon='fa-paragraph'>fa-paragraph</option>
                                        <option value='fa fa-paste' data-icon='fa-paste'>fa-paste</option>
                                        <option value='fa fa-repeat' data-icon='fa-repeat'>fa-repeat</option>
                                        <option value='fa fa-rotate-left' data-icon='fa-rotate-left'>fa-rotate-left</option>
                                        <option value='fa fa-rotate-right' data-icon='fa-rotate-right'>fa-rotate-right</option>
                                        <option value='fa fa-save' data-icon='fa-save'>fa-save</option>
                                        <option value='fa fa-scissors' data-icon='fa-scissors'>fa-scissors</option>
                                        <option value='fa fa-strikethrough' data-icon='fa-strikethrough'>fa-strikethrough</option>
                                        <option value='fa fa-subscript' data-icon='fa-subscript'>fa-subscript</option>
                                        <option value='fa fa-superscript' data-icon='fa-superscript'>fa-superscript</option>
                                        <option value='fa fa-table' data-icon='fa-table'>fa-table</option>
                                        <option value='fa fa-text-height' data-icon='fa-text-height'>fa-text-height</option>
                                        <option value='fa fa-text-width' data-icon='fa-text-width'>fa-text-width</option>
                                        <option value='fa fa-th' data-icon='fa-th'>fa-th</option>
                                        <option value='fa fa-th-large' data-icon='fa-th-large'>fa-th-large</option>
                                        <option value='fa fa-th-list' data-icon='fa-th-list'>fa-th-list</option>
                                        <option value='fa fa-underline' data-icon='fa-underline'>fa-underline</option>
                                        <option value='fa fa-undo' data-icon='fa-undo'>fa-undo</option>
                                        <option value='fa fa-unlink' data-icon='fa-unlink'>fa-unlink</option>
                                    <!-- </optgroup>
                                    <optgro -->up label='Directional Icons'>
                                        <option value='fa fa-angle-double-down' data-icon='fa-angle-double-down'>fa-angle-double-down</option>
                                        <option value='fa fa-angle-double-left' data-icon='fa-angle-double-left'>fa-angle-double-left</option>
                                        <option value='fa fa-angle-double-right' data-icon='fa-angle-double-right'>fa-angle-double-right</option>
                                        <option value='fa fa-angle-double-up' data-icon='fa-angle-double-up'>fa-angle-double-up</option>
                                        <option value='fa fa-angle-down' data-icon='fa-angle-down'>fa-angle-down</option>
                                        <option value='fa fa-angle-left' data-icon='fa-angle-left'>fa-angle-left</option>
                                        <option value='fa fa-angle-right' data-icon='fa-angle-right'>fa-angle-right</option>
                                        <option value='fa fa-angle-up' data-icon='fa-angle-up'>fa-angle-up</option>
                                        <option value='fa fa-arrow-circle-down' data-icon='fa-arrow-circle-down'>fa-arrow-circle-down</option>
                                        <option value='fa fa-arrow-circle-left' data-icon='fa-arrow-circle-left'>fa-arrow-circle-left</option>
                                        <option value='fa fa-arrow-circle-o-down' data-icon='fa-arrow-circle-o-down'>fa-arrow-circle-o-down</option>
                                        <option value='fa fa-arrow-circle-o-left' data-icon='fa-arrow-circle-o-left'>fa-arrow-circle-o-left</option>
                                        <option value='fa fa-arrow-circle-o-right' data-icon='fa-arrow-circle-o-right'>fa-arrow-circle-o-right</option>
                                        <option value='fa fa-arrow-circle-o-up' data-icon='fa-arrow-circle-o-up'>fa-arrow-circle-o-up</option>
                                        <option value='fa fa-arrow-circle-right' data-icon='fa-arrow-circle-right'>fa-arrow-circle-right</option>
                                        <option value='fa fa-arrow-circle-up' data-icon='fa-arrow-circle-up'>fa-arrow-circle-up</option>
                                        <option value='fa fa-arrow-down' data-icon='fa-arrow-down'>fa-arrow-down</option>
                                        <option value='fa fa-arrow-left' data-icon='fa-arrow-left'>fa-arrow-left</option>
                                        <option value='fa fa-arrow-right' data-icon='fa-arrow-right'>fa-arrow-right</option>
                                        <option value='fa fa-arrow-up' data-icon='fa-arrow-up'>fa-arrow-up</option>
                                        <option value='fa fa-arrows' data-icon='fa-arrows'>fa-arrows</option>
                                        <option value='fa fa-arrows-alt' data-icon='fa-arrows-alt'>fa-arrows-alt</option>
                                        <option value='fa fa-arrows-h' data-icon='fa-arrows-h'>fa-arrows-h</option>
                                        <option value='fa fa-arrows-v' data-icon='fa-arrows-v'>fa-arrows-v</option>
                                        <option value='fa fa-caret-down' data-icon='fa-caret-down'>fa-caret-down</option>
                                        <option value='fa fa-caret-left' data-icon='fa-caret-left'>fa-caret-left</option>
                                        <option value='fa fa-caret-right' data-icon='fa-caret-right'>fa-caret-right</option>
                                        <option value='fa fa-caret-square-o-down' data-icon='fa-caret-square-o-down'>fa-caret-square-o-down</option>
                                        <option value='fa fa-caret-square-o-left' data-icon='fa-caret-square-o-left'>fa-caret-square-o-left</option>
                                        <option value='fa fa-caret-square-o-right' data-icon='fa-caret-square-o-right'>fa-caret-square-o-right</option>
                                        <option value='fa fa-caret-square-o-up' data-icon='fa-caret-square-o-up'>fa-caret-square-o-up</option>
                                        <option value='fa fa-caret-up' data-icon='fa-caret-up'>fa-caret-up</option>
                                        <option value='fa fa-chevron-circle-down' data-icon='fa-chevron-circle-down'>fa-chevron-circle-down</option>
                                        <option value='fa fa-chevron-circle-left' data-icon='fa-chevron-circle-left'>fa-chevron-circle-left</option>
                                        <option value='fa fa-chevron-circle-right' data-icon='fa-chevron-circle-right'>fa-chevron-circle-right</option>
                                        <option value='fa fa-chevron-circle-up' data-icon='fa-chevron-circle-up'>fa-chevron-circle-up</option>
                                        <option value='fa fa-chevron-down' data-icon='fa-chevron-down'>fa-chevron-down</option>
                                        <option value='fa fa-chevron-left' data-icon='fa-chevron-left'>fa-chevron-left</option>
                                        <option value='fa fa-chevron-right' data-icon='fa-chevron-right'>fa-chevron-right</option>
                                        <option value='fa fa-chevron-up' data-icon='fa-chevron-up'>fa-chevron-up</option>
                                        <option value='fa fa-hand-o-down' data-icon='fa-hand-o-down'>fa-hand-o-down</option>
                                        <option value='fa fa-hand-o-left' data-icon='fa-hand-o-left'>fa-hand-o-left</option>
                                        <option value='fa fa-hand-o-right' data-icon='fa-hand-o-right'>fa-hand-o-right</option>
                                        <option value='fa fa-hand-o-up' data-icon='fa-hand-o-up'>fa-hand-o-up</option>
                                        <option value='fa fa-long-arrow-down' data-icon='fa-long-arrow-down'>fa-long-arrow-down</option>
                                        <option value='fa fa-long-arrow-left' data-icon='fa-long-arrow-left'>fa-long-arrow-left</option>
                                        <option value='fa fa-long-arrow-right' data-icon='fa-long-arrow-right'>fa-long-arrow-right</option>
                                        <option value='fa fa-long-arrow-up' data-icon='fa-long-arrow-up'>fa-long-arrow-up</option>
                                        <option value='fa fa-toggle-down' data-icon='fa-toggle-down'>fa-toggle-down</option>
                                        <option value='fa fa-toggle-left' data-icon='fa-toggle-left'>fa-toggle-left</option>
                                        <option value='fa fa-toggle-right' data-icon='fa-toggle-right'>fa-toggle-right</option>
                                        <option value='fa fa-toggle-up' data-icon='fa-toggle-up'>fa-toggle-up</option>
                                    <!-- </optgroup>
                                    <optgro -->up label='Video Player Icons'>
                                        <option value='fa fa-arrows-alt' data-icon='fa-arrows-alt'>fa-arrows-alt</option>
                                        <option value='fa fa-backward' data-icon='fa-backward'>fa-backward</option>
                                        <option value='fa fa-compress' data-icon='fa-compress'>fa-compress</option>
                                        <option value='fa fa-eject' data-icon='fa-eject'>fa-eject</option>
                                        <option value='fa fa-expand' data-icon='fa-expand'>fa-expand</option>
                                        <option value='fa fa-fast-backward' data-icon='fa-fast-backward'>fa-fast-backward</option>
                                        <option value='fa fa-fast-forward' data-icon='fa-fast-forward'>fa-fast-forward</option>
                                        <option value='fa fa-forward' data-icon='fa-forward'>fa-forward</option>
                                        <option value='fa fa-pause' data-icon='fa-pause'>fa-pause</option>
                                        <option value='fa fa-play' data-icon='fa-play'>fa-play</option>
                                        <option value='fa fa-play-circle' data-icon='fa-play-circle'>fa-play-circle</option>
                                        <option value='fa fa-play-circle-o' data-icon='fa-play-circle-o'>fa-play-circle-o</option>
                                        <option value='fa fa-step-backward' data-icon='fa-step-backward'>fa-step-backward</option>
                                        <option value='fa fa-step-forward' data-icon='fa-step-forward'>fa-step-forward</option>
                                        <option value='fa fa-stop' data-icon='fa-stop'>fa-stop</option>
                                        <option value='fa fa-youtube-play' data-icon='fa-youtube-play'>fa-youtube-play</option>
                                    <!-- </optgroup>
                                    <optgr -->oup label='Brand Icons'>
                                        <option value='fa fa-adn' data-icon='fa-adn'>fa-adn</option>
                                        <option value='fa fa-android' data-icon='fa-android'>fa-android</option>
                                        <option value='fa fa-angellist' data-icon='fa-angellist'>fa-angellist</option>
                                        <option value='fa fa-apple' data-icon='fa-apple'>fa-apple</option>
                                        <option value='fa fa-behance' data-icon='fa-behance'>fa-behance</option>
                                        <option value='fa fa-behance-square' data-icon='fa-behance-square'>fa-behance-square</option>
                                        <option value='fa fa-bitbucket' data-icon='fa-bitbucket'>fa-bitbucket</option>
                                        <option value='fa fa-bitbucket-square' data-icon='fa-bitbucket-square'>fa-bitbucket-square</option>
                                        <option value='fa fa-bitcoin' data-icon='fa-bitcoin'>fa-bitcoin</option>
                                        <option value='fa fa-btc' data-icon='fa-btc'>fa-btc</option>
                                        <option value='fa fa-buysellads' data-icon='fa-buysellads'>fa-buysellads</option>
                                        <option value='fa fa-cc-amex' data-icon='fa-cc-amex'>fa-cc-amex</option>
                                        <option value='fa fa-cc-discover' data-icon='fa-cc-discover'>fa-cc-discover</option>
                                        <option value='fa fa-cc-mastercard' data-icon='fa-cc-mastercard'>fa-cc-mastercard</option>
                                        <option value='fa fa-cc-paypal' data-icon='fa-cc-paypal'>fa-cc-paypal</option>
                                        <option value='fa fa-cc-stripe' data-icon='fa-cc-stripe'>fa-cc-stripe</option>
                                        <option value='fa fa-cc-visa' data-icon='fa-cc-visa'>fa-cc-visa</option>
                                        <option value='fa fa-codepen' data-icon='fa-codepen'>fa-codepen</option>
                                        <option value='fa fa-connectdevelop' data-icon='fa-connectdevelop'>fa-connectdevelop</option>
                                        <option value='fa fa-css3' data-icon='fa-css3'>fa-css3</option>
                                        <option value='fa fa-dashcube' data-icon='fa-dashcube'>fa-dashcube</option>
                                        <option value='fa fa-delicious' data-icon='fa-delicious'>fa-delicious</option>
                                        <option value='fa fa-deviantart' data-icon='fa-deviantart'>fa-deviantart</option>
                                        <option value='fa fa-digg' data-icon='fa-digg'>fa-digg</option>
                                        <option value='fa fa-dribbble' data-icon='fa-dribbble'>fa-dribbble</option>
                                        <option value='fa fa-dropbox' data-icon='fa-dropbox'>fa-dropbox</option>
                                        <option value='fa fa-drupal' data-icon='fa-drupal'>fa-drupal</option>
                                        <option value='fa fa-empire' data-icon='fa-empire'>fa-empire</option>
                                        <option value='fa fa-facebook' data-icon='fa-facebook'>fa-facebook</option>
                                        <option value='fa fa-facebook-f' data-icon='fa-facebook-f'>fa-facebook-f</option>
                                        <option value='fa fa-facebook-official' data-icon='fa-facebook-official'>fa-facebook-official</option>
                                        <option value='fa fa-facebook-square' data-icon='fa-facebook-square'>fa-facebook-square</option>
                                        <option value='fa fa-flickr' data-icon='fa-flickr'>fa-flickr</option>
                                        <option value='fa fa-forumbee' data-icon='fa-forumbee'>fa-forumbee</option>
                                        <option value='fa fa-foursquare' data-icon='fa-foursquare'>fa-foursquare</option>
                                        <option value='fa fa-ge' data-icon='fa-ge'>fa-ge</option>
                                        <option value='fa fa-git' data-icon='fa-git'>fa-git</option>
                                        <option value='fa fa-git-square' data-icon='fa-git-square'>fa-git-square</option>
                                        <option value='fa fa-github' data-icon='fa-github'>fa-github</option>
                                        <option value='fa fa-github-alt' data-icon='fa-github-alt'>fa-github-alt</option>
                                        <option value='fa fa-github-square' data-icon='fa-github-square'>fa-github-square</option>
                                        <option value='fa fa-gittip' data-icon='fa-gittip'>fa-gittip</option>
                                        <option value='fa fa-google' data-icon='fa-google'>fa-google</option>
                                        <option value='fa fa-google-plus' data-icon='fa-google-plus'>fa-google-plus</option>
                                        <option value='fa fa-google-plus-square' data-icon='fa-google-plus-square'>fa-google-plus-square</option>
                                        <option value='fa fa-google-wallet' data-icon='fa-google-wallet'>fa-google-wallet</option>
                                        <option value='fa fa-gratipay' data-icon='fa-gratipay'>fa-gratipay</option>
                                        <option value='fa fa-hacker-news' data-icon='fa-hacker-news'>fa-hacker-news</option>
                                        <option value='fa fa-html5' data-icon='fa-html5'>fa-html5</option>
                                        <option value='fa fa-instagram' data-icon='fa-instagram'>fa-instagram</option>
                                        <option value='fa fa-ioxhost' data-icon='fa-ioxhost'>fa-ioxhost</option>
                                        <option value='fa fa-joomla' data-icon='fa-joomla'>fa-joomla</option>
                                        <option value='fa fa-jsfiddle' data-icon='fa-jsfiddle'>fa-jsfiddle</option>
                                        <option value='fa fa-lastfm' data-icon='fa-lastfm'>fa-lastfm</option>
                                        <option value='fa fa-lastfm-square' data-icon='fa-lastfm-square'>fa-lastfm-square</option>
                                        <option value='fa fa-leanpub' data-icon='fa-leanpub'>fa-leanpub</option>
                                        <option value='fa fa-linkedin' data-icon='fa-linkedin'>fa-linkedin</option>
                                        <option value='fa fa-linkedin-square' data-icon='fa-linkedin-square'>fa-linkedin-square</option>
                                        <option value='fa fa-linux' data-icon='fa-linux'>fa-linux</option>
                                        <option value='fa fa-maxcdn' data-icon='fa-maxcdn'>fa-maxcdn</option>
                                        <option value='fa fa-meanpath' data-icon='fa-meanpath'>fa-meanpath</option>
                                        <option value='fa fa-medium' data-icon='fa-medium'>fa-medium</option>
                                        <option value='fa fa-openid' data-icon='fa-openid'>fa-openid</option>
                                        <option value='fa fa-pagelines' data-icon='fa-pagelines'>fa-pagelines</option>
                                        <option value='fa fa-paypal' data-icon='fa-paypal'>fa-paypal</option>
                                        <option value='fa fa-pied-piper' data-icon='fa-pied-piper'>fa-pied-piper</option>
                                        <option value='fa fa-pied-piper-alt' data-icon='fa-pied-piper-alt'>fa-pied-piper-alt</option>
                                        <option value='fa fa-pinterest' data-icon='fa-pinterest'>fa-pinterest</option>
                                        <option value='fa fa-pinterest-p' data-icon='fa-pinterest-p'>fa-pinterest-p</option>
                                        <option value='fa fa-pinterest-square' data-icon='fa-pinterest-square'>fa-pinterest-square</option>
                                        <option value='fa fa-qq' data-icon='fa-qq'>fa-qq</option>
                                        <option value='fa fa-ra' data-icon='fa-ra'>fa-ra</option>
                                        <option value='fa fa-rebel' data-icon='fa-rebel'>fa-rebel</option>
                                        <option value='fa fa-reddit' data-icon='fa-reddit'>fa-reddit</option>
                                        <option value='fa fa-reddit-square' data-icon='fa-reddit-square'>fa-reddit-square</option>
                                        <option value='fa fa-renren' data-icon='fa-renren'>fa-renren</option>
                                        <option value='fa fa-sellsy' data-icon='fa-sellsy'>fa-sellsy</option>
                                        <option value='fa fa-share-alt' data-icon='fa-share-alt'>fa-share-alt</option>
                                        <option value='fa fa-share-alt-square' data-icon='fa-share-alt-square'>fa-share-alt-square</option>
                                        <option value='fa fa-shirtsinbulk' data-icon='fa-shirtsinbulk'>fa-shirtsinbulk</option>
                                        <option value='fa fa-simplybuilt' data-icon='fa-simplybuilt'>fa-simplybuilt</option>
                                        <option value='fa fa-skyatlas' data-icon='fa-skyatlas'>fa-skyatlas</option>
                                        <option value='fa fa-skype' data-icon='fa-skype'>fa-skype</option>
                                        <option value='fa fa-slack' data-icon='fa-slack'>fa-slack</option>
                                        <option value='fa fa-slideshare' data-icon='fa-slideshare'>fa-slideshare</option>
                                        <option value='fa fa-soundcloud' data-icon='fa-soundcloud'>fa-soundcloud</option>
                                        <option value='fa fa-spotify' data-icon='fa-spotify'>fa-spotify</option>
                                        <option value='fa fa-stack-exchange' data-icon='fa-stack-exchange'>fa-stack-exchange</option>
                                        <option value='fa fa-stack-overflow' data-icon='fa-stack-overflow'>fa-stack-overflow</option>
                                        <option value='fa fa-steam' data-icon='fa-steam'>fa-steam</option>
                                        <option value='fa fa-steam-square' data-icon='fa-steam-square'>fa-steam-square</option>
                                        <option value='fa fa-stumbleupon' data-icon='fa-stumbleupon'>fa-stumbleupon</option>
                                        <option value='fa fa-stumbleupon-circle' data-icon='fa-stumbleupon-circle'>fa-stumbleupon-circle</option>
                                        <option value='fa fa-tencent-weibo' data-icon='fa-tencent-weibo'>fa-tencent-weibo</option>
                                        <option value='fa fa-trello' data-icon='fa-trello'>fa-trello</option>
                                        <option value='fa fa-tumblr' data-icon='fa-tumblr'>fa-tumblr</option>
                                        <option value='fa fa-tumblr-square' data-icon='fa-tumblr-square'>fa-tumblr-square</option>
                                        <option value='fa fa-twitch' data-icon='fa-twitch'>fa-twitch</option>
                                        <option value='fa fa-twitter' data-icon='fa-twitter'>fa-twitter</option>
                                        <option value='fa fa-twitter-square' data-icon='fa-twitter-square'>fa-twitter-square</option>
                                        <option value='fa fa-viacoin' data-icon='fa-viacoin'>fa-viacoin</option>
                                        <option value='fa fa-vimeo-square' data-icon='fa-vimeo-square'>fa-vimeo-square</option>
                                        <option value='fa fa-vine' data-icon='fa-vine'>fa-vine</option>
                                        <option value='fa fa-vk' data-icon='fa-vk'>fa-vk</option>
                                        <option value='fa fa-wechat' data-icon='fa-wechat'>fa-wechat</option>
                                        <option value='fa fa-weibo' data-icon='fa-weibo'>fa-weibo</option>
                                        <option value='fa fa-weixin' data-icon='fa-weixin'>fa-weixin</option>
                                        <option value='fa fa-whatsapp' data-icon='fa-whatsapp'>fa-whatsapp</option>
                                        <option value='fa fa-windows' data-icon='fa-windows'>fa-windows</option>
                                        <option value='fa fa-wordpress' data-icon='fa-wordpress'>fa-wordpress</option>
                                        <option value='fa fa-xing' data-icon='fa-xing'>fa-xing</option>
                                        <option value='fa fa-xing-square' data-icon='fa-xing-square'>fa-xing-square</option>
                                        <option value='fa fa-yahoo' data-icon='fa-yahoo'>fa-yahoo</option>
                                        <option value='fa fa-yelp' data-icon='fa-yelp'>fa-yelp</option>
                                        <option value='fa fa-youtube' data-icon='fa-youtube'>fa-youtube</option>
                                        <option value='fa fa-youtube-play' data-icon='fa-youtube-play'>fa-youtube-play</option>
                                        <option value='fa fa-youtube-square' data-icon='fa-youtube-square'>fa-youtube-square</option>
                                    <!-- </optgroup>
                                    <opt -->group label='Medical Icons'>
                                        <option value='fa fa-ambulance' data-icon='fa-ambulance'>fa-ambulance</option>
                                        <option value='fa fa-h-square' data-icon='fa-h-square'>fa-h-square</option>
                                        <option value='fa fa-hospital-o' data-icon='fa-hospital-o'>fa-hospital-o</option>
                                        <option value='fa fa-medkit' data-icon='fa-medkit'>fa-medkit</option>
                                        <option value='fa fa-plus-square' data-icon='fa-plus-square'>fa-plus-square</option>
                                        <option value='fa fa-stethoscope' data-icon='fa-stethoscope'>fa-stethoscope</option>
                                        <option value='fa fa-user-md' data-icon='fa-user-md'>fa-user-md</option>
                                        <option value='fa fa-wheelchair' data-icon='fa-wheelchair'>fa-wheelchair</option>
                                    <!-- </optgroup> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" id="link" class="form-control" placeholder=""/>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Header</label>
                                <select class="input_select form-control" name="header" id="header">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="input_select form-control" name="parent" id="parent">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="box-body table-wraper" id="list-menu" ></div>

            <div class="overlay ovr_xx" style="display:none;">
                <div class='load-bar' id='materialPreloader'><div class='load-bar-container'><div style='background:#159756' class='load-bar-base base1'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div><div style='background:#159756' class='color green'></div></div></div> <div class='load-bar-container'><div style='background:#159756' class='load-bar-base base2'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div> <div style='background:#159756' class='color green'></div> </div> </div> </div>
            </div>
        </div><!-- /.box -->
    </div><!--/.col (left) -->
</div>   <!-- /.row -->

<script type="text/javascript">
    $(document).ready(function(){
        show_list_menu();

        $('.form-input-btn-add').click(function(){
            get_header();
            $('#id_').val('');
        })

        $('.form-input-btn-cancel').click(function(){
            $('#id_').val('');
        })

        $('#header').change(function(){
            $.ajax({
                url:"<?php echo site_url('admin-rbac/rbac_menu/get_list_parent_menu');?>",
                type: 'POST',
                data: 'header=' + $('#header').val(),
                success: function(data){
                    $('#parent').html(data).trigger('chosen:updated');
                    $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('parent');
                }
            });
        })

        $('#<? echo $form_id?> .form-input-data').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                // valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'text': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        }
                    }
                },
                'icon': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        }
                    }
                },
                'link': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        }
                    }
                },
                'header': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        }
                    }
                },
                'parent': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function (e) {
            return false;
        })
        .on('error.form.bv', function(e) {
            return false;
        });

        $('.form-input-btn-save').click(function(){
            if ($("#"+$(this).parents(".box-primary,.box-form").data('id')+" .form-input-data").bootstrapValidator('validate').data('bootstrapValidator').isValid()) {
                var id_ = $('#id_').val();
                if (id_ == ''){
                    var action = '<? echo $url_add?>';
                    var tolast = '1';
                }
                else{
                    var action = '<? echo $url_edit?>/'+id_;
                    var tolast = '0';
                }

                $('#<? echo $form_id?> .form-input-data').ajaxSubmit({
                    url: action,
                    type: 'POST',
                    data: "",
                    dataType: 'json',
                    beforeSend: function(){
                        $('#<? echo $form_id?> .ovr_xx').fadeIn('slow');
                    },
                    uploadProgress: function(event, position, total, percentComplete){
                        var percentVal = percentComplete + '%';
                        $("#submit_progress").html("Menyimpan data "+percentVal+"...");
                    },
                    success: function(data){
                        catch_expired_session(data);
                        if(data.submit=='1'){
                            hide_form_input("#<? echo $form_id?>");
                            $('#id_').val('');
                            show_list_menu();
                            toastr.success('The data has been successfully saved', 'Success');
                        }
                        else{
                            toastr.error('Data could not be saved', 'Error');
                        }
                        $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                        $("#submit_progress").html("");
                    }
                });
            }
        })
    });

    function show_list_menu(){
        $.ajaxSetup({
            async: false
        });
        $('#<? echo $form_id?> .overlay').fadeIn('slow');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin-rbac/rbac_menu/gen_menu');?>",
            data:'',
            success: function(data){
                $("#list-menu").hide();
                $("#list-menu").html(data);
                $("#list-menu").slideDown('slow');

                $('ol.sortable').nestedSortable({
                    forcePlaceholderSize: true,
                    handle: 'div',
                    helper: 'clone',
                    items: 'li',
                    opacity: .9,
                    placeholder: 'placeholder',
                    revert: 250,
                    tabSize: 25,
                    tolerance: 'pointer',
                    toleranceElement: '> div',
                    maxLevels: 2,

                    isTree: true,
                    expandOnHover: 700,
                    startCollapsed: true,
                    update : function() {
                        load_sorting_menu();
                    }
                });
            },
            error:function(XMLHttpRequest){
                alert(XMLHttpRequest.responseText);
            }
        });
        setTimeout(function(){ 
            $('#<? echo $form_id?> .overlay').fadeOut('slow');
        },1500);
        $.ajaxSetup({
            async: true
        });
    }

    function load_sorting_menu(){
        serialized = $('ol.sortable').nestedSortable('serialize');
        $.ajax({
            url:'<? echo $url_sorting_menu?>',
            type: 'POST',
            data: serialized,
            dataType: 'json',
            success:function(data){
                if(data.submit=='1'){
                    // show_list_menu();
                    toastr.success('The data has been successfully saved', 'Success');
                }
                else{
                    toastr.error('Data could not be saved', 'Error');
                }
            }
        });
    }

    function get_header(){
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin-rbac/rbac_menu/get_list_header_menu');?>",
            data:'',
            success: function(data){
                $('#header').html(data).trigger('chosen:updated');
            },
            error:function(XMLHttpRequest){
                alert(XMLHttpRequest.responseText);
            }
        });
    }

    function show_menu(id){
        $.ajaxSetup({
            async: false
        });
        $('html, body').animate({scrollTop: '0px'}, 800);
        $('#<? echo $form_id?> .ovr_xx').fadeIn('slow');
        show_form_input("#<? echo $form_id?>");
        clear_form("#<? echo $form_id?>");
        $.ajax({
            url:"<?php echo site_url('admin-rbac/rbac_menu/get_list_header_menu');?>",
            type: 'POST',
            data: '',
            success: function(data){
                $('#header').html(data).trigger('chosen:updated');
                $.ajax({
                    url:"<?php echo site_url('admin-rbac/rbac_menu/show_mmenu/"+id+"');?>",
                    data:"",
                    cache:false,
                    dataType: 'json',
                    success:function(msg){
                        $('#id_').val(msg.id_menu);
                        $('#text').val(msg.text);
                        $('#link').val(msg.link);
                        $('#icon').val(msg.icon).trigger('chosen:updated');
                        $('#header').val(msg.header).trigger('chosen:updated');
                        $.ajax({
                            url:"<?php echo site_url('admin-rbac/rbac_menu/get_list_parent_menu');?>",
                            type: 'POST',
                            data: 'header=' + $('#header').val(),
                            success: function(data1){
                                $('#parent').html(data1);
                                $('#parent').val(msg.id_parent).trigger('chosen:updated');
                                $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                                $.ajaxSetup({
                                    async: true
                                });
                            }
                        });
                    }
                });
            }
        });
    }

    function delete_list(id){
        swal({
            title: "You are sure to delete data ?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#dd4b39',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel: true,
            // showLoaderOnConfirm: true,
        }, 
        function(isConfirm){
            if (isConfirm){
                $.ajax({
                    url:'<? echo $url_delete?>',
                    type: 'POST',
                    data:"id="+id,
                    dataType: 'json',
                    success:function(data){
                        catch_expired_session(data);
                        if(data.submit=='1'){
                            show_list_menu();
                            toastr.success('The data has been successfully delete', 'Success');
                        }
                        else{
                            toastr.error('Data could not be delete', 'Error');
                        }
                    }
                });
            }
            else{
                return false;
            }
        });
    }
</script>