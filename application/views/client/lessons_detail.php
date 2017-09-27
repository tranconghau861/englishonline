<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8">
                <?php if(!empty($item)):?>
                    <div class="panel-box">
                        <div class="titles" style="margin-bottom:10px !important">
                            <h4><?php echo translate($item->title, $item->title_en);?></h4>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h4>Conversation</h4>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <div id="myRadio">​</div>
                                    <script type="text/javascript">
                                        var files = '<?= site_url('home/security'. token($item->id, $item->files_video) . '&type=lessons') ?>';
                                        var $param = {
                                            autostart: false,
                                            image: "<?= get_image_link($item->photo)?>",
                                            width: 720,
                                            height: 160,
                                            provider: "sound",
                                            aboutlink: http,
                                            media_id: "hocthuanhvan",
                                            primary: 'html5',
                                            title : "<?php echo translate($item->title, $item->title_en);?>",
                                            sources: [
                                                {
                                                    file: files,
                                                    "default": true,
                                                    type: 'mp3',
                                                }
                                            ]
                                        };
                                        var jwplayer = jwplayer("myRadio").setup($param);
                                        jwplayer.on('play', function(){
                                            $('.jw-preview').css({
                                                'background-image': 'url(' + $param['image'] + ')',
                                                'display': 'block'
                                            });
                                        });

                                        function addSoundVideo(video, type, files) {
                                            var list = jwplayer.getPlaylist();
                                            if(list == ''){
                                                list = $param;
                                            }
                                            jwplayer.load([{
                                                file: http + 'upload/sound/'+type+'/' + video
                                            }]);
                                            jwplayer.play();
                                            jwplayer.onComplete(function(){
                                                jwplayer.load(list);
                                            });
                                        }
                                    </script>
                                </div>
                            </div>
                            <?php if(!empty($lessons_content)):?>
                                <div class="col-xs-12 padding-top">
                                    <h4>Conversation Sentences</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>English</th>
                                            <th>Audio</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($lessons_content as $value):
                                            $content = translate($value->content, $value->content_en);
                                            $vowels = array(".", ",");
                                            $consonants = str_replace($vowels, "", $content);
                                            ?>
                                            <tr>
                                                <td style="cursor:pointer; width:15%">
                                                    <?php if($value->id_author ==1):?>
                                                        <a href="http://www.learnersdictionary.com/search/Hi" target="_blank">
                                                            James
                                                        </a>
                                                    <?php else:?>
                                                        <a href="http://www.learnersdictionary.com/search/Hi" target="_blank">
                                                            Lisa
                                                        </a>
                                                    <?php endif;?>
                                                    :
                                                </td>
                                                <td>
                                                    <a href="http://www.learnersdictionary.com/search/<?php echo $content;?>" target="_blank" onmouseover="javascript:playTrailer('<?php echo $consonants . '.mp3';?>', 'instantspeak')"><?php echo $content;?></a>
                                                </td>
                                                <td style="width:10%">
                                                    <a href="javascript:addSoundVideo('<?php echo $value->files_video;?>', 'individual')">
                                                        <img src="<?= base_url() ?>assets/client/images/audio3.gif">
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('client/language');?>
            </div>
        </div>
    </div>
</section>
