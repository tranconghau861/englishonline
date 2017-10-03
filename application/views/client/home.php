<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-6">
                <div class="panel-box">
                    <div class="titles" style="margin-bottom:0px !important">
                        <h4><img style="width:40px;" src="<?=get_image_link($video_hot->photo)?>" alt="<?=translate($video_hot->title, $video_hot->title_en)?>"></h4>
                    </div>
                    <div class="row">
                        <div class="embed-responsive embed-responsive-16by9">
                            <!--iframe scrolling="no" src="https://www.facebook.com/4e393f17-cf77-4aeb-ad30-581e897fd4d6" allowfullscreen="true" height="400" frameborder="0" width="100%"></iframe-->
                            <div id="myVideo">​</div>
                            <script type="text/javascript">
                                var $param = {
                                    autostart: false,
                                    file: '<?=$video_hot->link?>',
                                    image: "<?=get_image_link($video_hot->photo)?>",
                                    width: '100%',
                                    height: 405,
                                    icons: false,
                                    //type: 'mp3', //mp4
                                    //provider: "video",//sound, video
                                    primary: 'html5',
                                    title : '<?=translate($video_hot->title, $video_hot->title_en)?>',
                                    skin : {
                                        url:"<?= base_url() ?>assets/jwplayer/skins/five.css",
                                        name:"five"
                                    }
                                };
                                jwplayer("myVideo").setup($param);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!empty($alphabet)):?>
                <div class="col-md-3">
                    <div class="title-color text-center">
                        <h4>Alphabet Noun</h4>
                    </div>
                    <div class="content-counter content-counter-home full-height-scroll" >
                        <div style='height:400px'>
                            <?php foreach($alphabet as $value):?>
                                <div class='row'>
                                    <div class="isset-options list-diary club-logo" style="background-color: white;">
                                        <a href="<?= site_url('alphabet/' . $value->alias) ?>">
                                            <img class="img-responsive" src="<?=get_image_link($value->photo)?>" alt="<?php echo translate($ad_left->title, $ad_left->title_en);?>">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <div class="col-md-3">
                <?php $this->load->view('client/language');?>
                <?php if(!empty($ad_left)):?>
                    <div class="panel-box">
                        <div class="titles" style="margin-bottom: 0px">
                            <h4>QC</h4>
                        </div>
                        <div class="row">
                            <a href="<?php echo $ad_left->link;?>">
                                <img class="img-responsive" src="<?=get_image_link($ad_left->photo, 800, 570)?>" alt="<?=translate($ad_left->title, $ad_left->title_en)?>">
                            </a>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <?php if(!empty($video)):?>
                <div class="col-md-12">
                    <div class="panel-box">
                        <div class="titles">
                            <h4>Video Yotube</h4>
                        </div>
                        <div class="row">
                            <ul id="sponsors" class="tooltip-hover video-fr">
                                <?php foreach($video as $value):?>
                                    <li data-toggle="tooltip" title data-original-title="<?=translate($value->title, $value->title_en)?>">
                                        <div class="header-post video-youtube">
                                            <a href="<?= site_url('video/' . $value->alias) ?>">
                                                <span class="icon-video"></span>
                                                <img class="img-responsive" src="<?=get_image_link($value->photo, 200, 140)?>" alt="<?=translate($value->title, $value->title_en)?>">
                                            </a>
                                        </div>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php $this->load->view('client/visit');?>
        </div>
    </div>
</section>