<div class="audio-category">
	<h3 class="audio-category-title">
	  Danh Mục
	</h3>
	<?php
		$category = $this->node->note_category('category-radio');
	?>
	<ul class="category-left">
	  <li>
		<a <?php echo (!empty($alias) && $alias =='tat-ca') ? 'class="active"' : ''?> href="<?php echo site_url('danh-muc-phat-thanh/tat-ca');?>">Tất cả</a>
	  </li>
	  <?php
		if(!empty($category)):
			foreach($category as $key=>$info):
				$link_radio = site_url('danh-muc-phat-thanh/'. $info->alias );
				$parent = $this->node->note_category('category-radio', $info->id);
				?>
					<li <?php echo (!empty($parent)) ? 'class="has-sub"':'';?>>
					<?php if(!empty($parent)):?>
					<span class="has-sub-arr"></span>
					<?php endif;?>
					<a <?php echo (!empty($alias) && $alias ==$info->alias) ? 'class="active"' : ''?> href="<?php echo $link_radio;?>"><?php echo $info->title?></a>
					<?php if(!empty($parent)):?>
					<div class="category-left-sub-wrap">
					  <ul class="category-left-sub">
						<?php
							foreach($parent as $key=>$value):
								$parent_radio = site_url('danh-muc-phat-thanh/'. $value->alias );
						?>
						<li><a href="<?php echo $parent_radio;?>"><?php echo $value->title;?></a></li>
						<?php endforeach;?>
					  </ul>
					</div>
					<?php endif;?>
				  </li>
	  <?php endforeach; endif;?>
	</ul>
  </div>