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
<?php if($total > $limit):?>
<li class="col-xs-12 show_more_main" id="show_more_main<?php echo $id_video; ?>">
  <span data="<?php echo $id_menu;?>" id="<?php echo $id_video; ?>" class="show_more" title="Load more posts">Show more</span>
  <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
</li>
<?php endif;?>