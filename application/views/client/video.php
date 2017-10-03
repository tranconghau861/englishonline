<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($video)):?>
                    <div class="row">
                        <ul class="events-carousel events-no-carousel tutorial_list" >
                            <?php
                            foreach($video as $value):
                                $user = $this->user->item($value->uid);
                                ?>
                                <li class="col-xs-6 col-sm-6 col-md-3">
                                    <div class="header-post">
                                        <a href="<?= site_url('video/' . $value->alias) ?>"><span class="icon-alphabet"></span>
                                            <img src="<?=get_image_link($value->photo)?>" alt="<?=translate($value->title, $value->title_en)?>"></a>
                                        <div class="meta-tag">
                                            <ul>
                                                <li><i class="fa fa-user"></i><a href="javascript:void(0)"><?php echo ($user->username) ? $user->username : $user->name;?></a></li>
                                                <li class="text-right"><i class="fa fa-comment"></i><a href="javascript:void(0)"><?php echo $value->sum_view;?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="info-post" style="height:80px">
                                        <p><?=character_limiter(translate($value->title, $value->title_en), 60)?></p>
                                    </div>
                                </li>
                            <?php endforeach;?>
                            <li class="col-xs-12 show_more_main" id="show_more_main<?php echo $id_video; ?>">
                                <span data="<?php echo $id_menu;?>" id="<?php echo $id_video; ?>" class="show_more" title="Load more posts">Show more</span>
                                <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                            </li>
                        </ul>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.show_more',function(){
            var $id_menu = $(this).attr('data');
            var $id_video = $(this).attr('id');

            $('.show_more').hide();
            $('.loding').show();
            $.ajax({
                method: "POST",
                url:http + 'video/ajax_more/'+$id_menu+'/'+$id_video,
                dataType: "html",
                beforeSend: function() {

                }
            }).done(function(html) {
                $('#show_more_main'+$id_video).remove();
                $('.tutorial_list').append(html);
            });

        });
    });
</script>
