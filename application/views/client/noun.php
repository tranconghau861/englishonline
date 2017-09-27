<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8">
                <div class="panel-box">
                    <div class="titles" style="margin-bottom:10px !important">
                        <h4><?= t('most-common-phrases') ?></h4>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= t('intro-phrases') ?>
                        </div>
                        <div class="col-xs-4">
                            <table class="table table-striped">
                                <thead>
                                <tr><th><?= t('sort-letter') ?></th></tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="background-color:white; border-top:0px;">
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>
                                                <a href="<?= site_url($segment.'/a') ?>">A</a>,
                                                <a href="<?= site_url($segment.'/b') ?>">B</a>,
                                                <a href="<?= site_url($segment.'/c') ?>">C</a>,
                                                <a href="<?= site_url($segment.'/d') ?>">D</a>,
                                                <a href="<?= site_url($segment.'/e') ?>">E</a>
                                            </li>
                                            <li><i class="fa fa-check"></i>
                                                <a href="<?= site_url($segment.'/f') ?>">F</a>,
                                                <a href="<?= site_url($segment.'/g') ?>">G</a>,
                                                <a href="<?= site_url($segment.'/h') ?>">H</a>,
                                                <a href="<?= site_url($segment.'/i') ?>">I</a>,
                                                <a href="<?= site_url($segment.'/j') ?>">J</a>
                                            </li>
                                            <li><i class="fa fa-check"></i>
                                                <a href="<?= site_url($segment.'/k') ?>">K</a>,
                                                <a href="<?= site_url($segment.'/l') ?>">L</a>,
                                                <a href="<?= site_url($segment.'/m') ?>">M</a>,
                                                <a href="<?= site_url($segment.'/n') ?>">N</a>,
                                                <a href="<?= site_url($segment.'/o') ?>">O</a>
                                            </li>
                                            <li><i class="fa fa-check"></i>
                                                <a href="<?= site_url($segment.'/p') ?>">P</a>,
                                                <a href="<?= site_url($segment.'/q') ?>">Q</a>,
                                                <a href="<?= site_url($segment.'/r') ?>">R</a>,
                                                <a href="<?= site_url($segment.'/s') ?>">S</a>,
                                                <a href="<?= site_url($segment.'/t') ?>">T</a>
                                            </li>
                                            <li><i class="fa fa-check"></i>
                                                <a href="<?= site_url($segment.'/u') ?>">U</a>,
                                                <a href="<?= site_url($segment.'/v') ?>">V</a>,
                                                <a href="<?= site_url($segment.'/w') ?>">W</a>,
                                                <a href="<?= site_url($segment.'/x') ?>">X</a>,
                                                <a href="<?= site_url($segment.'/y') ?>">Y</a>,
                                                <a href="<?= site_url($segment.'/z') ?>">Z</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="embed-responsive embed-responsive-16by9">
                                <div id="myPhrasesWords">​</div>
                            </div>
                        </div>
                        <div class="col-xs-8 padding-top">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style='width:85%'>English</th>
                                    <th>Audio </th>
                                </tr>
                                </thead>
                                <?php if(!empty($noun)):?>
                                    <tbody>
                                    <?php
                                    foreach($noun as $value):
                                        $type = ($value->id_type == 1) ? 'phrases' : 'words';
                                        ?>
                                        <tr>
                                            <td><?php echo translate($value->title, $value->title_en);?></td>
                                            <td>
                                                <a href="javascript:addSoundPhrasesWords('<?php echo $value->files_video;?>', '<?php echo $type;?>')">
                                                    <img src="<?= base_url() ?>assets/client/images/audio3.gif">
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                <?php endif;?>
                            </table>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function addSoundPhrasesWords(sound, type)
                    {
                        $param = {
                            autostart: false,
                            width: '100%',
                            height: 100,
                            image: '<?=base_url('upload/learn-english.jpg')?>',
                            provider: "sound",
                            primary: 'html5',
                            title : "sound most common phrases words",
                            aboutlink: http,
                            media_id: "hocthuanhvan",
                            sources: [
                                {
                                    file: http + 'upload/sound/'+type+'/' + sound,
                                    "default": true,
                                    type: 'mp3',
                                }
                            ]
                        };
                        var jwplayers = jwplayer("myPhrasesWords").setup($param);
                        jwplayers.play();
                        $('.jw-preview').css({
                            'background-image': 'url(<?=base_url('upload/learn-english.jpg')?>)',
                            'display': 'block'
                        });
                    }
                    $( document ).ready(function() {
                        addSoundPhrasesWords('<?php echo $noun[0]->files_video;?>', '<?php echo ($noun[0]->id_type == 1) ? 'phrases' : 'words';?>');
                        $('.jw-preview').css({
                            'background-image': 'url(<?=base_url('upload/learn-english.jpg')?>)',
                            'display': 'block'
                        });
                    });

                </script>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('client/language');?>
            </div>
        </div>
    </div>
</section>