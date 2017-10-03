<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
	$(document).ready(function () {
		$('#time_schedule').mCustomScrollbar("update");
		$('#time_schedule').mCustomScrollbar("scrollTo", "#time_schedule<?php echo str_replace(":", "h", $chedule_current['time']);?>");
	});
</script>
<?php 
	if(!empty($schedule)):?>	
	<ul class="nav-tabs-content schedule-list">
	<?php 
		$content = translate($schedule->content, $schedule->content_en);
		$video_date = $schedule->schedule_date;		
		$schedule = explode(";",$content);
		$total = count($schedule);
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
	?>
	</ul>
<?php else:?>
	<ul class="nav-tabs-content schedule-list"><li><?=t('schedule_not')?></li></ul>
<?php endif;?>