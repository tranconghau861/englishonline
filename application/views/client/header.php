<?php defined('BASEPATH') OR exit('No direct script access allowed');
$class = $this->router->fetch_class();
$method = $this->router->fetch_method();
$config = $this->setting->items();
$segs = $this->uri->segment_array();
$arg1 = isset($segs[0]) ? $segs[0] : '';
$arg2 = isset($segs[1]) ? $segs[1] : '';
$arg3 = isset($segs[2]) ? $segs[2] : '';
$lang = $this->config->item('language_abbr');
$cache_version = '23122016';
?><!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xml:lang="vi-vn" lang="vi-vn" dir="ltr" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="REFRESH" content="1800" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow"/>
    <meta name="generator" content="Hocthuanhvan"/>
	<meta property="fb:pages" content="121341248450287" />
    <meta name="description"
          content="<?= trim(quotes_to_entities(isset($metadescription) ? $metadescription : $config['description'])) ?>">
    <meta name="keywords"
          content="<?= trim(quotes_to_entities(isset($metakeywords) ? $metakeywords : $config['keywords'])) ?>">
    <meta name="author" content="<?= $config['name'] ?>"/>
    <meta name="copyright" content="&copy; 2016 by hocthuanhvan.com">
    <title><?= trim(isset($metatitle) ? $metatitle : $config['name']) ?></title>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:title"
          content="<?= trim(quotes_to_entities(isset($metatitle) ? $metatitle : $config['title'])) ?>"/>
    <meta property="og:description"
          content="<?= trim(quotes_to_entities(isset($metadescription) ? $metadescription : $config['description'])) ?>"/>
    <meta property="og:image"
          content="<?= !empty($metaimage) ? $metaimage : base_url('assets/client/images/logo.png') ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="<?= $config['name'] ?>"/>
    <meta property="og:url" content="<?= current_url() ?>"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description"
          content="<?= trim(quotes_to_entities(isset($metadescription) ? $metadescription : $config['description'])) ?>"/>
    <meta name="twitter:title"
          content="<?= trim(quotes_to_entities(isset($metatitle) ? $metatitle : $config['title'])) ?>"/>
    <meta name="twitter:domain" content="<?= $config['name'] ?>"/>
    <meta http-equiv="reply-to" content="<?= $config['email'] ?>">
    <link rel="apple-touch-icon" sizes="57x57"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-57x57.png', 57, 57) ?>">
    <link rel="apple-touch-icon" sizes="60x60"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-60x60.png', 60, 60) ?>">
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-72x72.png', 72, 72) ?>">
    <link rel="apple-touch-icon" sizes="76x76"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-76x76.png', 76, 76) ?>">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-114x114.png', 144, 144) ?>">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-120x120.png', 120, 120) ?>">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-152x152.png', 152, 152) ?>">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-180x180.png', 180, 180) ?>">
    <link rel="icon" type="image/png"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-favicon-32x32.png', 32, 32) ?>"
          sizes="32x32">
    <link rel="icon" type="image/png"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-192x192.png', 192, 192) ?>"
          sizes="192x192">
    <link rel="icon" type="image/png"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-favicon-96x96.png', 96, 96) ?>"
          sizes="96x96">
    <link rel="icon" type="image/png"
          href="<?= get_image_link('assets/client/images/favicons/learn-english-online-favicon-16x16.png', 16, 16) ?>"
          sizes="16x16">
    <meta name="msapplication-TileColor" content="#E1483F">
    <meta name="msapplication-TileImage"
          content="<?= get_image_link('assets/client/images/favicons/learn-english-online-ms-icon-144x144.png', 144,
              144) ?>">
    <meta name="msapplication-config" content="<?= base_url() ?>assets/client/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#E1483F">
    <link rel="manifest" href="<?= base_url() ?>assets/client/images/favicons/manifest.json">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/client/images/favicons/favicon.ico?v=<?= $cache_version; ?>" type="image/x-icon">
    <link href="<?= base_url() ?>" rel="alternate" hreflang="vi">
    <link href="<?= base_url() ?>" rel="shortlink">
    <link href="<?= base_url() ?>" rel="canonical">
    <link href="<?= base_url() ?>assets/client/css/reset.css?v=<?= $cache_version; ?>" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/client/css/style.css?v=<?= $cache_version; ?>" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/client/css/theme-responsive.css?v=<?= $cache_version; ?>" rel="stylesheet"
          media="screen">
    <link href="<?= base_url() ?>assets/client/css/skins/red/red.css?v=<?= $cache_version; ?>" rel="stylesheet"
          media="screen">
    <link href="<?= base_url() ?>assets/client/css/style-customer.css?v=<?= $cache_version; ?>" rel="stylesheet"
          media="screen">
    <link href="<?= base_url() ?>assets/client/css/box-phonemic.css?v=<?= $cache_version; ?>" rel="stylesheet"
          media="screen">
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/modernizr.js?v=<?= $cache_version; ?>"></script>
    <!--[if IE]>
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/css/ie/ie.css?v=<?=$cache_version;?>">
    <![endif]-->
    <!--[if lte IE 8]>
    <script src="<?= base_url() ?>assets/client/js/responsive/html5shiv.js?v=<?=$cache_version;?>"></script>
    <script src="<?= base_url() ?>assets/client/js/responsive/respond.js?v=<?=$cache_version;?>"></script>
    <![endif]-->
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/jquery.min.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript">
        var http = '<?=base_url()?>';
    </script>
    <!--[if IE]>
    <script type="text/javascript" src="<?= base_url() ?>assets/client/js/cufon-yui.js?v=<?=$cache_version;?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/Myriad_Pro_Cond_700.font.js?v=<?=$cache_version;?>"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css"
          href="<?= base_url() ?>assets/client/css/css_expand.css?v=<?= $cache_version; ?>"/>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/slimscroll/jquery.slimscroll.min.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/nav/tinynav.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/nav/hoverIntent.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/totop/jquery.ui.totop.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/fancybox/jquery.fancybox.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/carousel/carousel.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/filters/jquery.isotope.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/counter/jquery.countdown.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/theme-options/theme-options.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/theme-options/jquery.cookies.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript"
            src="<?= base_url() ?>assets/client/js/bootstrap/bootstrap.js?v=<?= $cache_version; ?>"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/client/js/main.js?v=<?= $cache_version; ?>"></script>
    <?php if (($class == 'home') || ($class == 'video') || ($class == 'livetv') || ($class == 'alphabet') || ($class == 'lessons') || ($class == 'noun')): ?>
        <script type="text/javascript"
                src="http://content.jwplatform.com/libraries/V6NfEzT7.js?v=<?= $cache_version; ?>"></script>
    <?php endif; ?>    
    <script type="text/javascript">
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-86695106-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-5166907839073586",
		enable_page_level_ads: true
	  });
	</script>
</head>
<body>
<div id="layout">
<?php $this->load->view('client/header_menu'); ?>