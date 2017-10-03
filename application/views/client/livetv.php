<?php
$name = nl2br(translate($livetv->name, $livetv->name_en));
$intro = $livetv->intro;
$intro_en = $livetv->intro_en;
$sum_view = $livetv->sum_view;
$sum_like = $livetv->sum_like;
?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8">
                <div class="panel-box">
                    <div class="titles" style="margin-bottom:0px !important">
                        <h4><img style="width:40px;" src="<?=get_image_link($livetv->photo)?>" alt="<?=translate($livetv->name, $livetv->name_en);?>"></h4>
                    </div>
                    <div class="row">
                        <div class="embed-responsive embed-responsive-16by9">
                            <div id="container">​</div>
                            <script type="text/javascript">
                                var jwplayer = jwplayer("container").setup({
                                    file: "//content.jwplatform.com/videos/C4lp6Dtd-640.mp4",
                                    image: "<?=get_image_link($livetv->photo)?>",
                                    title: "<?php echo $name;?>",
                                    width: '100%',
                                    height: 405
                                });
                                function playTrailer(video, thumb) {
                                    jwplayer.load([{
                                        file: video,
                                        image: thumb
                                    }]);
                                    jwplayer.play();
                                }
                            </script>
                            <?php if(!empty($livetv_other)):?>
                                <div id='livetv' class="row">
                                    <div class="col-md-12">
                                        <ul id="events1-carousel" class="container events-carousel" style='margin-left:10px;'>
                                            <?php foreach($livetv_other as $value):?>
                                                <li style='padding:5px;'>
                                                    <a href="javascript:playTrailer('<?php echo $value->httphost;?>', '<?=get_image_link($value->photo)?>')">
                                                        <img alt="<?php echo translate($value->name, $value->name_en);?>" class="img-responsive" src="<?=get_image_link($value->photo)?>" />
                                                    </a>
                                                </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                                <style>
                                    .owl-page{margin-top:0px !important}
                                    #livetv .owl-carousel .owl-wrapper-outer{ height: 130px !important;}
                                </style>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php if(!empty($alphabet)):?>
                    <div class="panel-box">
                        <div class="col-md-12 padding-lr">
                            <div class="col-md-12 padding-lr titles">
                                <h4>Alphabet</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul id="events2-carousel" class="container events-carousel" style='margin-left:10px;'>
                                    <?php foreach($alphabet as $info):?>
                                        <li style='padding:5px;' >
                                            <div class="header-post">
                                                <a href="<?= site_url('pronounce/' . $info->alias) ?>" title="<?php echo translate($info->title, $info->title_en);?>">
                                                    <img class='img-livetv'  src="<?=get_image_link($info->photo, 200, 140)?>" alt="<?php echo translate($info->title);?>"></a>
                                            </div>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <?php if(!empty($video)):?>
                    <div class="panel-box">
                        <div class="col-md-12 padding-lr">
                            <div class="col-md-12 padding-lr titles">
                                <h4>Video</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul id="events3-carousel" class="container events-carousel" style='margin-left:10px;'>
                                    <?php foreach($video as $value):?>
                                        <li style='padding:5px;' >
                                            <div class="header-post">
                                                <a href="<?= site_url('video/' . $value->alias) ?>" title="<?=translate($value->title, $value->title_en)?>">
                                                    <img class='img-livetv'  src="<?=get_image_link($value->photo, 200, 140)?>" alt="<?=translate($value->title, $value->title_en)?>"></a>
                                            </div>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('client/language');?>
                <?php if(!empty($schedule)):?>
                    <div class="panel-box">
                        <div class="titles">
                            <h4>Lịch phát sóng</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-xs-12 padding-lr">
                                    <table class="table table-striped">
                                        <tbody>
                                        <?php
                                        $content = translate($schedule->content, $schedule->content_en);
                                        $schedule_date = (isset($schedule->schedule_date)) ? $schedule->schedule_date : '';
                                        $schedule = explode(";",$content);
                                        $total = count($schedule);

                                        for($i=0;$i < ($total - 1);$i++):
                                            $item = explode("||",$schedule[$i]);
                                            $time =  explode(":",$item[0]);
                                            $h = (isset($time[0])) ? $time[0] : '';
                                            $p = (isset($time[1])) ? $time[1] : '';
                                            $time = $h . ':' . $p;

                                            ?>
                                            <tr>
                                                <td><?php echo trim($time,' :');?></td>
                                                <?php if(!empty($item[1])):?>
                                                    <td>
                                                        <?php echo $item[1];?>
                                                        <?php
                                                        if(!empty($item[2]) && trim($item[2]) != '##' ):
                                                            echo $item[2];
                                                        endif;
                                                        ?>
                                                    </td>
                                                <?php endif;?>
                                            </tr>
                                        <?php endfor;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
