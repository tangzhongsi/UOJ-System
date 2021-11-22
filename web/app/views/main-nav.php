<ul class="nav nav-tabs">
  <li class="nav-item problem">
    <a class="nav-link" href="<?= HTML::url('/') ?>"><span class="glyphicon glyphicon-list-alt"></span> <?= UOJLocale::get('problems::problem') ?></a>
  </li>
  <li class="nav-item submissions">
    <a class="nav-link" href="<?= HTML::url('/submissions') ?>"> <span class="glyphicon glyphicon-tasks"></span><?= UOJLocale::get('submissions') ?></a>
  </li>
  <li class="nav-item statistics">
    <a class="nav-link" href="<?= HTML::url('/problem/1/statistics') ?>"><span class="glyphicon glyphicon-stats"></span><?= UOJLocale::get('top rated') ?></a>
  </li>
  <?php global $myUser; ?>
  <?php if (isSuperUser($myUser)): ?>
  <li class="nav-item manage">
    <a class="nav-link" href="/problem/1/manage/statement" role="tab"><span class="glyphicon glyphicon-edit"></span><?= UOJLocale::get('problems::manage') ?></a>
  </li>
  <?php endif ?>
</ul>

<script>
  // nav
  url = window.location.pathname;
  var str = url.split('/');
  // alert(str[1]);
  if (str[1] == 'submissions' || str[1] == 'submission') url = 'submissions';
  else if (str[3] == 'statistics') url = 'statistics';
  else if (str[3] == 'manage') url = 'manage'
  else url = 'problem';
  document.querySelector(".nav-tabs ." + url + " a").classList.add('active');
</script>