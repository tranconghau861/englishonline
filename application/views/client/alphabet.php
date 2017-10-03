<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8">
                <div class="panel-box">
                    <div class="titles" style="margin-bottom:10px !important">
                        <h4>Phonemic Chart</h4>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box-phonemic-wrap">
                                <dl class="box-phonemic-row">
                                    <dt class="box-phonemic-col-1">
                                           <span>
                                               vowels
                                           </span>
                                        <span>
                                               enlarge vowels?
                                           </span>
                                    </dt>
                                    <dd class="box-phonemic-col-4">
                                        <ul class="box-phonemic-list">
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('seat.mp3', 'instantspeak')">s<span>ea</span>t</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('green.mp3', 'instantspeak')">gr<span>ee</span>n</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('tree.mp3', 'instantspeak')">tr<span>ee</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet01', 'alphabet01.mp3')) ?>')"><span>iː</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('sit.mp3', 'instantspeak')">s<span>i</span>t</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('grin.mp3', 'instantspeak')">gr<span>i</span>n</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('fish.mp3', 'instantspeak')">f<span>i</span>sh</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet02', 'alphabet02.mp3')) ?>')"><span>ɪ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('good.mp3', 'instantspeak')">g<span>oo</span>d</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('foot.mp3', 'instantspeak')">f<span>oo</span>t</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('pull.mp3', 'instantspeak')">p<span>u</span>ll</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet03', 'alphabet03.mp3')) ?>')"><span>ʊ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="food">f<span>oo</span>d</a>
                                                            </li>
                                                            <li>
                                                                <a href="rule">r<span>u</span>le</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('shoe.mp3', 'instantspeak')">sh<span>oe</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet04', 'alphabet04.mp3')) ?>')"><span>uː</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('head.mp3', 'instantspeak')">h<span>ea</span>d</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('bet.mp3', 'instantspeak')">b<span>e</span>t</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('said.mp3', 'instantspeak')">s<span>ai</span>d</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet05', 'alphabet05.mp3')) ?>')"><span>e</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('teacher.mp3', 'instantspeak')">teach<span>er</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('observer.mp3', 'instantspeak')"><span>o</span>bserv<span>er</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('about.mp3', 'instantspeak')"><span>a</span>bout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet06', 'alphabet06.mp3')) ?>')"><span>ə</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('girl.mp3', 'instantspeak')">g<span>ir</span>l</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('nurse.mp3', 'instantspeak')">n<span>ur</span>se</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('earth.mp3', 'instantspeak')"><span>ear</span>th</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet07', 'alphabet07.mp3')) ?>')"><span>ɜː</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('walk.mp3', 'instantspeak')">w<span>al</span>k</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('door.mp3', 'instantspeak')">d<span>oo</span>r</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('four.mp3', 'instantspeak')">f<span>ou</span>r</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet08', 'alphabet08.mp3')) ?>')"><span>ɔː</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="had">h<span>a</span>d</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('lamb.mp3', 'instantspeak')">l<span>a</span>mb</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('apple.mp3', 'instantspeak')"><span>a</span>pple</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet09', 'alphabet09.mp3')) ?>')"><span>æ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('cup.mp3', 'instantspeak')">c<span>u</span>p</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('love.mp3', 'instantspeak')">l<span>o</span>ve</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('money.mp3', 'instantspeak')">m<span>o</span>ney</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet10', 'alphabet10.mp3')) ?>')"><span>ʌ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('heart.mp3', 'instantspeak')">h<span>ear</span>t</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('dark.mp3', 'instantspeak')">d<span>ar</span>k</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('fast.mp3', 'instantspeak')">f<span>a</span>st</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet11', 'alphabet11.mp3')) ?>')"><span>aː</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('hot.mp3', 'instantspeak')">h<span>o</span>t</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('stop.mp3', 'instantspeak')">st<span>o</span>p</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('want.mp3', 'instantspeak')">w<span>a</span>nt</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet12', 'alphabet12.mp3')) ?>')"><span>ɒ</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                    <dt class="box-phonemic-col-1" >
                                           <span>
                                               diphthongs
                                           </span>
                                        <span>
                                               enlarge diphthongs?
                                           </span>
                                    </dt>
                                    <dd class="box-phonemic-col-3">
                                        <ul class="box-phonemic-list">
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('year.mp3', 'instantspeak')">y<span>ea</span>r</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('beer.mp3', 'instantspeak')">b<span>ee</span>r</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('ear.mp3', 'instantspeak')"><span>ear</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet13', 'alphabet13.mp3')) ?>')"><span>ɪə</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="chair">ch<span>air</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('where.mp3', 'instantspeak')">wh<span>ere</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('there.mp3', 'instantspeak')">th<span>ere</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet14', 'alphabet14.mp3')) ?>')"><span>eə</span></a>
                                                </div>
                                            </li>
                                            <li class="visible-hidden-li">
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('they.mp3', 'instantspeak')">th<span>ey</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('bathe.mp3', 'instantspeak')">b<span>a</span>the</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('way.mp3', 'instantspeak')">w<span>ay</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet17', 'alphabet17.mp3')) ?>')"><span>eɪ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('joke.mp3', 'instantspeak')">j<span>o</span>ke</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('vote.mp3', 'instantspeak')">v<span>o</span>te</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('throw.mp3', 'instantspeak')">thr<span>ow</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet15', 'alphabet15.mp3')) ?>')"><span>əʊ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('vow.mp3', 'instantspeak')">v<span>ow</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('lounge.mp3', 'instantspeak')">l<span>ou</span>nge</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('out.mp3', 'instantspeak')"><span>ou</span>t</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet16', 'alphabet16.mp3')) ?>')"><span>aʊ</span></a>
                                                </div>
                                            </li>
                                            <li class="visible-hidden-li">
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('they.mp3', 'instantspeak')">th<span>ey</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('bathe.mp3', 'instantspeak')">b<span>a</span>the</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('way.mp3', 'instantspeak')">w<span>ay</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet17', 'alphabet17.mp3')) ?>')"><span>eɪ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('they.mp3', 'instantspeak')">th<span>ey</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('bathe.mp3', 'instantspeak')">b<span>a</span>the</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('way.mp3', 'instantspeak')">w<span>ay</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet17', 'alphabet17.mp3')) ?>')"><span>eɪ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('thigh.mp3', 'instantspeak')">th<span>igh</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('dice.mp3', 'instantspeak')">d<span>i</span>ce</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('my.mp3', 'instantspeak')">m<span>y</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet18', 'alphabet18.mp3')) ?>')"><span>aɪ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('joy.mp3', 'instantspeak')">j<span>oy</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('noise.mp3', 'instantspeak')">n<span>oi</span>se</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('choice.mp3', 'instantspeak')">ch<span>oi</span>ce</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet19', 'alphabet19.mp3')) ?>')"><span>ɔɪ</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                    <dt class="box-phonemic-col-1" style="clear: both;">
                                           <span>
                                               consonants
                                           </span>
                                        <span>
                                               enlarge consonants?
                                           </span>
                                    </dt>
                                    <dd class="box-phonemic-col-8">
                                        <ul class="box-phonemic-list">
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('pull.mp3', 'instantspeak')">p<span>u</span>ll</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('stop.mp3', 'instantspeak')">sto<span>p</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('apple.mp3', 'instantspeak')">a<span>pp</span>le</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet20', 'alphabet20.mp3')) ?>')"><span>p</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('four.mp3', 'instantspeak')"><span>f</span>our</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('food.mp3', 'instantspeak')"><span>f</span>ood</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('fish.mp3', 'instantspeak')"><span>f</span>ish</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet21', 'alphabet21.mp3')) ?>')"><span>f</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('tree.mp3', 'instantspeak')"><span>t</span>ree</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('stop.mp3', 'instantspeak')">s<span>t</span>op</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('want.mp3', 'instantspeak')">wan<span>t</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet22', 'alphabet22.mp3')) ?>')"><span>t</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('earth.mp3', 'instantspeak')">ear<span>th</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('thigh.mp3', 'instantspeak')"><span>th</span>igh</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('throw.mp3', 'instantspeak')"><span>th</span>row</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet23', 'alphabet23.mp3')) ?>')"><span>θ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('teacher.mp3', 'instantspeak')">tea<span>ch</span>er</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('chair.mp3', 'instantspeak')"><span>ch</span>air</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('choice.mp3', 'instantspeak')"><span>ch</span>oice</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet24', 'alphabet24.mp3')) ?>')"><span>tʃ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('stop.mp3', 'instantspeak')"><span>s</span>top</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('sit.mp3', 'instantspeak')"><span>s</span>it</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('fast.mp3', 'instantspeak')">fa<span>s</span>t</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet25', 'alphabet25.mp3')) ?>')"><span>s</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('shoe.mp3', 'instantspeak')"><span>sh</span>oe</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('fish.mp3', 'instantspeak')">fi<span>sh</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('sure.mp3', 'instantspeak')"><span>s</span>ure</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet26', 'alphabet26.mp3')) ?>')"><span>ʃ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('walk.mp3', 'instantspeak')">wal<span>k</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('dark.mp3', 'instantspeak')">dar<span>k</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('cup.mp3', 'instantspeak')"><span>c</span>up</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet27', 'alphabet27.mp3')) ?>')"><span>k</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('bet.mp3', 'instantspeak')"><span>b</span>et</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('about.mp3', 'instantspeak')">a<span>b</span>out</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('beer.mp3', 'instantspeak')"><span>b</span>eer</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet28', 'alphabet28.mp3')) ?>')"><span>b</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('observer.mp3', 'instantspeak')">obser<span>v</span>er</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('vow.mp3', 'instantspeak')"><span>v</span>ow</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('vote.mp3', 'instantspeak')"><span>v</span>ote</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet29', 'alphabet29.mp3')) ?>')"><span>v</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('door.mp3', 'instantspeak')"><span>d</span>oor</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('food.mp3', 'instantspeak')">foo<span>d</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('said.mp3', 'instantspeak')">sai<span>d</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet30', 'alphabet30.mp3')) ?>')"><span>d</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('they.mp3', 'instantspeak')"><span>th</span>ey</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('there.mp3', 'instantspeak')"><span>th</span>ere</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('bathe.mp3', 'instantspeak')">ba<span>th</span>e</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet31', 'alphabet31.mp3')) ?>')"><span>ð</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('joke.mp3', 'instantspeak')"><span>j</span>oke</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('joy.mp3', 'instantspeak')"><span>j</span>oy</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('lounge.mp3', 'instantspeak')">loun<span>g</span>e</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet32', 'alphabet32.mp3')) ?>')"><span>dʒ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('observer.mp3', 'instantspeak')">ob<span>s</span>erver</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('noise.mp3', 'instantspeak')">noi<span>s</span>e</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('president.mp3', 'instantspeak')">pre<span>s</span>ident</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet33', 'alphabet33.mp3')) ?>')"><span>z</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('casual.mp3', 'instantspeak')">ca<span>s</span>ual</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('measure.mp3', 'instantspeak')">mea<span>s</span>ure</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('pheasure.mp3', 'instantspeak')">phea<span>s</span>ure</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet34', 'alphabet34.mp3')) ?>')"><span>ʒ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('grin.mp3', 'instantspeak')"><span>g</span>rin</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('green.mp3', 'instantspeak')"><span>g</span>reen</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('girl.mp3', 'instantspeak')"><span>g</span>irl</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet35', 'alphabet35.mp3')) ?>')"><span>g</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('hot.mp3', 'instantspeak')"><span>h</span>ot</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('head.mp3', 'instantspeak')"><span>h</span>ead</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('heart.mp3', 'instantspeak')"><span>h</span>eart</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet36', 'alphabet36.mp3')) ?>')"><span>h</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('money.mp3', 'instantspeak')"><span>m</span>oney</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('lamb.mp3', 'instantspeak')">la<span>mb</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('my.mp3', 'instantspeak')"><span>m</span>y</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet37', 'alphabet37.mp3')) ?>')"><span>m</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('grin.mp3', 'instantspeak')">gri<span>n</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('green.mp3', 'instantspeak')">gree<span>n</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('nurse.mp3', 'instantspeak')"><span>n</span>urse</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet38', 'alphabet38.mp3')) ?>')"><span>n</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('sing.mp3', 'instantspeak')">si<span>ng</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('english.mp3', 'instantspeak')">e<span>ng</span>lish</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('drank.mp3', 'instantspeak')">dra<span>n</span>k</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet39', 'alphabet39.mp3')) ?>')"><span>ŋ</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('rule.mp3', 'instantspeak')"><span>r</span>ule</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('grin.mp3', 'instantspeak')">g<span>r</span>in</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('tree.mp3', 'instantspeak')">t<span>r</span>ee</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet40', 'alphabet40.mp3')) ?>')"><span>r</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('pull.mp3', 'instantspeak')">pu<span>ll</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('love.mp3', 'instantspeak')"><span>l</span>ove</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('rule.mp3', 'instantspeak')">ru<span>l</span>e</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet41', 'alphabet41.mp3')) ?>')"><span>l</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('want.mp3', 'instantspeak')"><span>w</span>ant</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('way.mp3', 'instantspeak')"><span>w</span>ay</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('where.mp3', 'instantspeak')"><span>wh</span>ere</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet42', 'alphabet42.mp3')) ?>')"><span>w</span></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-phonemic-item">
                                                    <div class="box-phonemic-dropdown">
                                                        <span class="fa fa-caret-down"></span>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('year.mp3', 'instantspeak')"><span>y</span>ear</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('yes.mp3', 'instantspeak')"><span>y</span>es</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:addSoundNounAlphabet('yellow.mp3', 'instantspeak')"><span>y</span>ellow</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a class="box-phonemic-number" onclick="addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet43', 'alphabet43.mp3')) ?>')"><span>j</span></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <div id="myAlphabet">​</div>
                                <script type="text/javascript">
                                    var $param = '';
                                    function addSoundAlphabet($files)
                                    {
                                        $param = {
                                            autostart: false,
                                            width: 720,
                                            height: 100,
                                            image: '<?=base_url('upload/learn-english.jpg')?>',
                                            provider: "sound",
                                            primary: 'html5',
                                            title : "sound alphabet",
                                            aboutlink: http,
                                            media_id: "hocthuanhvan",
                                            sources: [
                                                {
                                                    file: $files,
                                                    "default": true,
                                                    type: 'mp3',
                                                }
                                            ]
                                        };
                                        var jwplayers = jwplayer("myAlphabet").setup($param);
                                        jwplayers.play();
                                        return jwplayers;
                                    }
                                    $( document ).ready(function() {
                                        addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet01', 'alphabet01.mp3')) ?>');
                                        $('.jw-preview').css({
                                            'background-image': 'url(<?=base_url('upload/learn-english.jpg')?>)',
                                            'display': 'block'
                                        });
                                    });
                                    function addSoundNounAlphabet(video, type) {
                                        var jwplayer = addSoundAlphabet('<?= site_url('home/alphabet'. token('alphabet01', 'alphabet01.mp3')) ?>');
                                        jwplayer.load([{
                                            file: http + 'upload/sound/'+type+'/' + video
                                        }]);
                                        jwplayer.play();
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('client/language');?>
            </div>
        </div>
    </div>
</section>
