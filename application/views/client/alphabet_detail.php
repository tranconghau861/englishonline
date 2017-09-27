<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8">
                <div class="panel-box">
                    <div class="titles" style="margin-bottom:10px !important">
                        <h4><?=translate($item->title, $item->title_en)?></h4>
                    </div>
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:50px; margin-top:20px;">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-4">
                                <h4 style="color:#E1483F; font-weight: bold"><?=translate($item->title, $item->title_en)?></h4>
                                <a href="javascript:void(0)"><span class="noun-alphabet"></span>
                                    <img class="img-responsive" src="<?=get_image_link($item->photo)?>" alt="<?=translate($item->title, $item->title_en)?>">
								</a>
                            </div>
                            <!--div class="col-lg-1"></div>
                            <div class="col-lg-4">
                                <img width="150" height="150" src="img/blog/2.jpg" alt="">
                            </div>
                            <div class="col-lg-2"></div-->
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <script type="text/javascript">
                                    function addSoundAlphabet(sound)
                                    {
                                        $param = {
                                            autostart: false,
                                            width: '100%',
                                            height: 100,
                                            image: '<?=base_url('upload/learn-english.jpg')?>',
                                            provider: "sound",
                                            primary: 'html5',
                                            title : "sound alphabet",
                                            aboutlink: http,
                                            media_id: "hocthuanhvan",
                                            sources: [
                                                {
                                                    file: http + 'upload/sound/words/' + sound + '.mp3',
                                                    "default": true,
                                                    type: 'mp3',
                                                }
                                            ]
                                        };
                                        var jwplayers = jwplayer("myAlphabet").setup($param);
                                        jwplayers.play();
                                        $('.jw-preview').css({
                                            'background-image': 'url(<?=base_url('upload/learn-english.jpg')?>)',
                                            'display': 'block'
                                        });
                                    }
                                    $( document ).ready(function() {
                                        addSoundAlphabet('<?php echo $item->files_video;?>');
                                        $('.jw-preview').css({
                                            'background-image': 'url(<?=base_url('upload/learn-english.jpg')?>)',
                                            'display': 'block'
                                        });
                                    });
                                </script>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <div id="myAlphabet">​</div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <?=translate($item->intro, $item->intro_en)?>
                            </div>
                        </div>
                        <?php if(!empty($alphabet_content)):?>
                            <div class="col-xs-12 padding-top">
                                <?php $k = 1; foreach($alphabet_content as $value):?>
                                    <div class="row" style="margin-top:10px; margin-bottom: 10px;">
                                        <h4><?php echo $k;?>) <?=translate($value->title, $value->title_en)?></h4>
                                        <table class="table table-striped" style="margin-bottom: 0px; border: 1px solid #ddd">
                                            <thead >
                                            <tr class="sf-menu-active">
                                                <th style="padding:15px;">Examples</th>
                                                <!--th style="padding:15px;">Transcription</th-->
                                                <th style="padding:15px;">Audio</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            if($value->fields):
                                                $fields = is_array($value->fields) ? $value->fields : unserialize($value->fields);
                                                ?>
                                                <tbody>
                                                <?php foreach($fields as $info):?>
                                                    <tr>
                                                        <td title="<?=$info['content']?>" style="cursor:pointer;"><?=$info['content']?></td>
                                                        <!--td>
                                                            <p style="margin: 0px !important">This looks like a nice restaurant.</p>
                                                            <p style="page-break-inside: always; margin: 0px !important">tesssssssssssss</p>
                                                        </td-->
                                                        <td>
                                                            <a href="javascript:addSoundAlphabet('<?=$info['content']?>')">
                                                            <img src="<?= base_url() ?>assets/client/images/audio3.gif">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
                                            <?php endif;?>
                                        </table>
                                    </div>
                                    <?php $k++; endforeach;?>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('client/language');?>
            </div>
        </div>
    </div>
</section>
