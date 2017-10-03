<?php defined('BASEPATH') OR exit('No direct script access allowed');
$config = $this->setting->items();
$lang = $this->config->item('language_abbr');
?>
        <footer id="footer">
            <div class="footer-down">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <p>&copy; 2016 by hocthuanhvan.com <br/>All rights reserved.</p>
                        </div>
                        <div class="col-md-9">
                            <ul class="nav-footer">
                                <li><a href="<?= site_url('about') ?>" title="<?= t('about') ?>"><?= t('about') ?></a></li>
                                <li><a href="<?= site_url('livetv') ?>" title="<?= t('livetv') ?>"><?= t('livetv') ?></a></li>
                                <li><a href="<?= site_url('video') ?>" title="<?= t('video') ?>"><?= t('video') ?></a></li>
                                <li><a href="<?= site_url('alphabet') ?>" title="<?= t('alphabet') ?>"><?= t('alphabet') ?></a></li>
                                <li><a href="<?= site_url('alphabet/pronounce') ?>" title="<?= t('pronounce') ?>"><?= t('pronounce') ?></a></li>
                                <li><a href="<?= site_url('100-lessons') ?>" title="<?= t('100-lessons') ?>"><?= t('100-lessons') ?></a></li>
                                <li><a href="<?= site_url('1000-most-common-phrases') ?>" title="<?= t('1000-phrases') ?>"><?= t('1000-phrases') ?></a></li>
                                <li><a href="<?= site_url('1000-most-common-phrases') ?>" title="<?= t('1000-words') ?>"><?= t('1500-words') ?></a></li>
                                <li><a href="<?= site_url('contact') ?>" title="<?= t('contact') ?>"><?= t('contact') ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
<?php $this->db->close(); ?>
