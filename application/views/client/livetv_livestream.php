<?php
	$name = nl2br(translate($livetv_tream->name, @$livetv_tream->name_en));
	$content = nl2br(translate($livetv_tream->intro, @$livetv_tream->intro_en)); 
	$sum_view = $livetv_tream->sum_view;
	$sum_like = $livetv_tream->sum_like;
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
				
					<div id="myLiveYoutube">Loading the player...</div>
				  
					<script type="text/javascript">	
					
						
										
						$(document).ready(function(){
							var image = "<?php echo image_link($livetv_tream->photo, 830, 468)?>";

							var channel = '<?php echo $livetv_tream->rtmphost;?>';
									
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

							loadjwplayer('myLiveYoutube', $param, false, $advertis = {});
						});
					
					
					</script>
			  </div>
			</div>
		</div>
		<div class="video-right">
          <div class="videobox-highlight">
            <h2 class="highlight-title"><?=t('stream-text')?></h2>			
            <div class="highlight-content x-mCustomScrollbar-minimalDark">	
				<ul class="list-video schedule-list">
				<?php if(!empty($content)):						
						$schedule = explode(";",$content);
						$video_date = date('Y-m-d');	
						$total = count($schedule);
						$j = 0;$k = 0;
						for($i=0;$i < $total;$i++):							
							$item = explode("||",$schedule[$i]);							
							if(!empty($item[0]) && !empty($item[1])):	
							?>							
							<li>
							  <div class="list-video-box">
								<span class="schedule-time"><?php echo $item[0];?></span>
								<div class="schedule-programs">
								  <div class="schedule-desc">
									  <?php echo $item[1];?><?php echo (trim($item[2]) !='##') ? '-' . $item[2] : '';?>                     
								</div>
								</div>
							  </div>
							</li>					
							
							<?php					
							endif;							
						endfor;						
					else:?>
				  <li><?=t('updating')?></li>
				  <?php endif;?>
				 </ul> 
						
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
				if(!empty($intro) ):
			  ?>
              
			  <?php endif;?>
			  <?php include dirname(__FILE__) .'/loop_social.php'; ?>
            </div>
          </article>

        </div>
        
      </div>
    </div>
    
  </main>
  