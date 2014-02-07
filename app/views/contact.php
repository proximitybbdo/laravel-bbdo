<?= trans('site.title'); ?>
<h1><?= trans('site.contact.title'); ?></h1>

<div class="contact">
  <div class="contact__form">
    <?= Form::open(array('url' => Helpers::url_lang('contact'))); ?>
      <?php if(!$errors->isEmpty()): ?>
        <div class="errors" id="errors">
          <h2><?= trans('site.contact.error'); ?></h2>

          <?= HTML::ul($errors->all()); ?>
        </div>
      <?php endif; ?>

      <?= Form::text('firstname', '', array('placeholder' => trans('site.contact.fields.firstname'))); ?><br/>
      <?= Form::text('lastname', '', array('placeholder' => trans('site.contact.fields.lastname'))); ?><br/>
      <?= Form::textarea('question', '', array('placeholder' => trans('site.contact.fields.question'))); ?><br/>
      <br/>
      <?= Form::submit(trans('site.contact.submit'), array('class' => 'btn')); ?>

    <?= Form::close(); ?>
  </div>
</div>
