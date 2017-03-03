<?php include './template/header.php'; ?>
  <div class="contents clearfix">
    <div class="content col-2">
      <p class="title">Public IP address</p>
      <p class="data"><?= "192.168.33.1" ?></p>
    </div>
    <div class="content col-2">
      <p class="title">Local IP address</p>
      <p class="data"><?= "192.168.33.1"; ?></p>
    </div>
    <div class="content col-1">
      <p class="title">Remote host</p>
      <p class="data"><?= "remotehost.net"; ?></p>
    </div>
    <div class="content col-2">
      <p class="title">OS</p>
      <p class="data"><?= "macOS 10.10.0"; ?></p>
    </div>
    <div class="content col-2">
      <p class="title">Browser</p>
      <p class="data"><?= "Chrome 56.0.0"; ?></p>
    </div>
    <div class="content col-1">
      <p class="title">Referrer</p>
      <p class="data"><?= $_SERVER["HTTP_REFERER"]; ?></p>
    </div>
    <div class="content col-1">
      <p class="title">User Agent</p>
      <p class="data"><?= $_SERVER["HTTP_USER_AGENT"]; ?></p>
    </div>
  </div>
<?php include './template/footer.php'; ?>
