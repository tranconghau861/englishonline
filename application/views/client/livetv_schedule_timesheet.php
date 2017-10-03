
<main class="main">
    <div class="container-content">
      <div class="container">
        <div class="main-content x-timeline-wrapper">
          <div class="date-selector-wrapper">
            <div class="date-selector-container">
              <div class="swiper-container date-selector">
                <?php if(!empty($weekday)):?>
				<div class="swiper-wrapper">
					<?php foreach($weekday as $key=>$value):?>
						<div class="swiper-slide"><a <?php echo (strtotime($date) == strtotime($value['_date']) ) ? 'class="active current"' : ''; ?> href="<?=site_url('lich-phat-song/'.$value['_date']);?>"><?php echo $value['value']; ?></a></div>
					<?php endforeach;?>
                </div>
				<?php endif;?>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
          <div class="timeline-wrapper">
            <div class="timeline-hour">
              <div class="timeline-hour-in">
                <ul class="timeline-ul x-timeline-ul">
                  <li>00:00</li>
                  <li>00:30</li>
                  <li>01:00</li>
                  <li>01:30</li>
                  <li>02:00</li>
                  <li>02:30</li>
                  <li>03:00</li>
                  <li>03:30</li>
                  <li>04:00</li>
                  <li>04:30</li>
                  <li>05:00</li>
                  <li>05:30</li>
                  <li>06:00</li>
                  <li>06:30</li>
                  <li>07:00</li>
                  <li>07:30</li>
                  <li>08:00</li>
                  <li>08:30</li>
                  <li>09:00</li>
                  <li>09:30</li>
                  <li>10:00</li>
                  <li>10:30</li>
                  <li>11:00</li>
                  <li>11:30</li>
                  <li>12:00</li>
                  <li>12:30</li>
                  <li>13:00</li>
                  <li>13:30</li>
                  <li>14:00</li>
                  <li>14:30</li>
                  <li>15:00</li>
                  <li>15:30</li>
                  <li>16:00</li>
                  <li>16:30</li>
                  <li>17:00</li>
                  <li>17:30</li>
                  <li>18:00</li>
                  <li>18:30</li>
                  <li>19:00</li>
                  <li>19:30</li>
                  <li>20:00</li>
                  <li>20:30</li>
                  <li>21:00</li>
                  <li>21:30</li>
                  <li>22:00</li>
                  <li>22:30</li>
                  <li>23:00</li>
                  <li>23:30</li>
                </ul>
              </div>
            </div>
            <div class="timeline-scroll">
				
              <ul class="timeline-content clearfix x-timeline">
                <?php 
					if(!empty($schedule)){
					foreach($schedule as $key=>$info):						
						if(!empty($info['time']) && !empty($info['title'])):	
				?>
				<li data-duration="<?php echo $info['duration'];?>" data-timeStart="<?php echo trim($info['time']);?>">
                  <span class="timeline-title"><?php echo $info['title'];?>: <?php echo (!empty($info['content']) && trim($info['content']) != '##' ) ? $info['content'] :''; ?></span>
                </li>
				<?php 
						endif;  
					endforeach;
					}else{
						?>
						<li style='padding-top:30px; padding-left:500px; padding-bottom:30px;color:red'>
						  <span class="timeline-title"><h4><?=t('schedule_not')?></h4></span>
						</li>						
						<?php 
					}
					
				?>                
              </ul>
			  
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  