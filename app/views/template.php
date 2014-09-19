<!doctype html>
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

  <!--[if lt IE 9]>
  <script>
    document.createElement('header');
    document.createElement('nav');
    document.createElement('section');
    document.createElement('article');
    document.createElement('aside');
    document.createElement('footer');
  </script>

  <![endif]-->

  <link rel="shortcut icon" href="<?= asset('assets/img/icon/favicon.png'); ?>" />
  <link rel="apple-touch-icon" href="<?= asset('assets/img/icon/apple-touch-icon.png'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/css/style.css'); ?>" />
</head>
<body data-page="<?= Helpers::clean_segments(); ?>">
  <script type="text/javascript">
    window.site = {};
    window.site.lang = '<?= App::getLocale(); ?>';
    window.site.base_url = '<?= url(''); ?>';
  </script>

  <?= $content; ?>

  <?php if(App::environment() == 'production'): ?>
    <script src="<?= asset('assets/js/main.min.js'); ?>"></script>
  <?php else: ?>
    <script src="<?= asset('assets/js/vendor/jquery.min.js'); ?>"></script>
    <script src="<?= asset('assets/js/app.js'); ?>"></script>
  <?php endif; ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= Config::get('app.ga'); ?>');
    ga('send', 'pageview');
  </script>
</body>
</html>
