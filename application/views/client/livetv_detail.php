<?php
$name = nl2br(translate($livetv->name, $livetv->name_en));
$intro = $livetv->intro;
$intro_en = $livetv->intro_en;
$sum_view = $livetv->sum_view;
$sum_like = $livetv->sum_like;

?>

<main class="main">
    <div class="container-video">
        <div class="container">
            <div class="video-left">
                <div class="video-player">
			  <span class="video-player-close">
              <i class="zmdi zmdi-close-circle"></i>
            </span>
                    <div class="embed-responsive embed-responsive-16by9">
                        <div id="myLiveTVVideo">Loading the player...</div>

                        <script type="text/javascript">

                            $(document).ready(function(){
                                var image = "<?php echo get_image_link($livetv->photo)?>";

                                var channel = '<?php echo $livetv->rtmphost . $livetv->application_name . '/' .$livetv->filename;?>';

                                var tag = 'http://www.adotube.com/php/services/player/OMLService.php?avpid=oRYYzvQ&platform_version=vast20&ad_type=linear&groupbypass=1&HTTP_REFERER=http://www.longtailvideo.com&video_identifier=longtailvideo.com,test';

                                var $param = {
                                    autostart: true,
                                    channel: channel,
                                    image: image,
                                    width: '100%',
                                    height: 440,
                                    primary: 'html5',
                                    title : 'KTV'
                                };

                                var $advertis = {
                                    client: 'vast',
                                    skipoffset:5,
                                    tag: tag
                                };

                                loadjwplayer('myLiveTVVideo', $param, false, $advertis = {});
                            });


                        </script>

                    </div>
                </div>
            </div>
            <div class="video-right">
                <div class="videobox-highlight">
                    <?php if(!empty($weekday)):?>
                        <ul class="schedule-horizontal">
                            <?php foreach($weekday as $key=>$value):?>
                                <li>
                                    <a id='last-active-<?php echo $key;?>' onclick="getValSchedule('<?php echo $value['_date'];?>', <?php echo $key;?>, 'videolive', '<?=site_url('news/getschedule')?>');" <?php echo (strtotime(date("Y-m-d")) == strtotime($value['_date']) ) ? 'class="active"' : ''; ?> href="javascript:void(0)"><?php echo $value['value']; ?></a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>

                    <script>
                        $(document).ready(function () {
                            setTimeout(function(){
                                getValSchedule('<?php echo date('Y-m-d');?>',3, 'videolive', '<?=site_url('news/getschedule')?>');
                            }, 5000);
                        });
                    </script>
                    <div id="time_schedule" class="highlight-content x-mCustomScrollbar-minimalDark">
                        <div  id='videolive'>

                            <ul class="nav-tabs-content schedule-list">
                                <?php if(!empty($schedule)):
                                    $content = translate($schedule->content, $schedule->content_en);
                                    $schedule_date = (isset($schedule->schedule_date)) ? $schedule->schedule_date : '';

                                    $schedule = explode(";",$content);
                                    $video_date = date('Y-m-d');
                                    $total = count($schedule);
                                    $j = 0;$k = 0;
                                    for($i=0;$i < $total;$i++):
                                        $item = explode("||",$schedule[$i]);
                                        $time =  explode(":",$item[0]);
                                        $h = (isset($time[0])) ? $time[0] : '';
                                        $p = (isset($time[1])) ? $time[1] : '';
                                        $time = $h . ':' . $p;
                                        $link_video = '';
                                        if(!empty($time) ){
                                            $video =  $this->live_radio->get_posts('livevideo',
                                                array(
                                                    'publish' => 1,
                                                    'schedule_date' => $video_date,
                                                    'video_time' =>trim($time,' :'),
                                                ),0, ''
                                            );
                                            if(!empty($video)  ){
                                                $link_video = site_url('truyen-hinh/'. $video->alias );
                                            }
                                        }


                                        if(!empty($time) && !empty($item[1])):

                                            $start = strtotime( $schedule_date. ' ' . trim($time,' :') . ':00');

                                            $current = strtotime($schedule_date. ' 11:59:00');

                                            if($start > $current && $j ==0){

                                                echo '<li class="has-link"><h3>Chiều</h3></li>';

                                                $j++;

                                            }elseif($start < $current && $k ==0){

                                                echo '<li class="has-link"><h3>Sáng</h3></li>';

                                                $k++;

                                            }

                                            ?>

                                            <li class="has-link" id='time_schedule<?php echo str_replace(":", "h", trim($time,' :'));?>'>
                                                <span class="schedule-time"><?php echo trim($time,' :');?></span>
                                                <div class="schedule-programs">
                                                    <p class="schedule-name">
                                                        <?php if(!empty($link_video)){?>
                                                            <a href="<?php echo $link_video;?>"><?php echo $item[1];?></a>
                                                        <?php }else{?>
                                                            <?php echo $item[1];?>
                                                        <?php }?>
                                                    </p>
                                                    <?php if(!empty($item[2]) && trim($item[2]) != '##' ):?>
                                                        <div class="schedule-desc"><?php echo $item[2];?></div>
                                                    <?php endif;?>
                                                </div>
                                            </li>
                                            <?php
                                        endif;
                                    endfor;
                                else:?>
                                    <li><?=t('schedule_not')?></li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-content">
        <div class="container">
            <div class="watch-detail">
                <article class="bx-news">
                    <div class="title_news">
                        <h1 class="article-title"><?php echo $name;?></h1>
                        <p class="article-meta">
                            <span class="article-publish"> <?php echo date('d/m/Y');?> </span>
                            <span class="view-count"><i class="zmdi zmdi-eye"></i> <?=$sum_view ? $sum_view : 1;?></span>

                            <span class="like-count"><i class="zmdi zmdi-favorite-outline"></i> <?=$sum_like ? $sum_like : 0; ?></span>
                        </p>
                        <?php
                        if(!empty($intro) || !empty($intro_en)  ):
                            ?>
                            <p class="summary">
                                <?=nl2br( translate($intro, $intro_en) )?>
                            </p>
                        <?php endif;?>

                        <?php include dirname(__FILE__) .'/loop_social.php'; ?>
                    </div>
                </article>

            </div>
            <?php include dirname(__FILE__) .'/video_radio_list.php'; ?>
        </div>
    </div>
    <?php include dirname(__FILE__) .'/bottom.php'; ?>
</main>
