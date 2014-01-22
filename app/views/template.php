<!doctype html>
<!--[if IE 7]> <html class="no-js ie7" lang="<?= App::getLocale(); ?>"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8" lang="<?= App::getLocale(); ?>"> <![endif]-->
<!--[if IE 9]> <html class="no-js ie9" lang="<?= App::getLocale(); ?>"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="<?= App::getLocale(); ?>"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="description" content="BBDO" />
  <meta name="author" content="BBDO" />
  <meta name="e" content="<?= App::environment(); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title><?= trans('site.title'); ?></title>

  <link rel="shortcut icon" href="<?= asset('assets/img/icon/favicon.png'); ?>" />
  <link rel="apple-touch-icon" href="<?= asset('assets/img/icon/apple-touch-icon.png'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/css/style.css'); ?>" />

  <script src="<?= asset('assets/js/vendor/modernizr.min.js'); ?>"></script>
</head>
<body data-page="">
  <script type="text/javascript">
    window.site = {};
    window.site.lang = '<?= App::getLocale(); ?>';
    window.site.base_url = '<?= url(''); ?>';
  </script>

  <?= $content; ?>

  <script src="<?= asset('assets/js/vendor/jquery.min.js'); ?>"></script>
  <script src="<?= asset('assets/js/lib/tracking.js'); ?>"></script>
  <script src="<?= asset('assets/js/main.js'); ?>"></script>

  <script>
    var _gaq = [['_setAccount','xxxxxxxxxxx'], ['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>
