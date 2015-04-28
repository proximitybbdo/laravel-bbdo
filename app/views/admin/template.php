<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>BBDO</title>

  <link rel="stylesheet" href="<?= asset('assets/css/admin.css'); ?>">

  <style type="text/css">
    [class^="icon-"], [class*=" icon-"] {
      width: 24px;
      height: 24px;
    }
  </style>
  <script type="text/javascript">
    window.base_url = '<?= url(); ?>';
  </script>
</head>
<body>

  <div class="navbar">
    <div class="container">
      <a class="navbar-brand" href="<?= url('iControl'); ?>">Dashboard</a>
      <ul class="nav navbar-nav pull-right">
        <li><a href="<?= url('iControl/logout'); ?>" title="Log Out">Log out</a></li>
      </ul>

      <ul class="nav navbar-nav">
        <li><a href="<?= url('iControl/'); ?>">Something</a> </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?= View::make('partials.flashes', array('error' => isset($error) ? $error : null, 'errors' => isset($errors) ? $errors : null)); ?>
			</div>
    </div>

    <?= $content; ?>

    <hr>

    <footer>
      <p>&copy; BBDO 2014</p>
      <br />
      <small>Environment: <?= e(App::environment()); ?></small>
    </footer>
  </div>

  <script src="<?= asset('assets/js/vendor/jquery.min.js'); ?>"></script>
  <script src="<?= asset('assets/js/vendor/bootstrap.js'); ?>"></script>

  <script type="text/javascript">
    (function($) {
      $('a[data-method]').each(function() {
        var $link = $(this);

        if($link.data('method') === 'POST') {
          $link.on('click', function(e) {
            e.preventDefault();

            if(confirm("Are you sure you want to delete this?")) {
              $.ajax({
                type: "POST",
                url: $link.attr('href'),
                data: { id: $link.data('id') }
              }).done(function() {
                document.location.reload(true);
              });
            }

            return false;
          });
        }
      });
    })($);
  </script>
</body>
</html>
