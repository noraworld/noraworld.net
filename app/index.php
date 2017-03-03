<?php
  require '../vendor/autoload.php';
  use Sinergi\BrowserDetector\Browser;
  use Sinergi\BrowserDetector\Os;
  use Sinergi\BrowserDetector\Device;
  use Sinergi\BrowserDetector\Language;
  $browser  = new Browser();
  $os       = new Os();
  $device   = new Device();
  $language = new Language();
?>
<?php include './template/header.php'; ?>
  <div class="contents clearfix">
    <div class="content col-2">
      <p class="title">Public IP address</p>
      <p class="data"><?= $_SERVER["REMOTE_ADDR"]; ?></p>
    </div>
    <div class="content col-2">
      <p class="title">Local IP address</p>
      <p class="data"><?= "192.168.33.10" ?></p>
    </div>
    <div class="content col-1">
      <p class="title">Remote host</p>
      <p class="data"><?= "remotehost.net"; ?></p>
    </div>
    <div class="content col-2">
      <p class="title">OS</p>
      <p class="data"><?= $os->getName(); ?> <?= $os->getVersion(); ?></p>
    </div>
    <div class="content col-2">
      <p class="title">Browser</p>
      <p class="data"><?= $browser->getName(); ?> <?= $browser->getVersion(); ?></p>
    </div>
    <div class="content col-2">
      <p class="title">Device</p>
      <p class="data"><?= $device->getName(); ?></p>
    </div>
    <div class="content col-2">
      <p class="title">Language</p>
      <p class="data"><?= $language->getLanguage(); ?></p>
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
