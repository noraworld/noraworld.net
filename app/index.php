<?php
  // load from browser detector
  require '../vendor/autoload.php';
  use Sinergi\BrowserDetector\Browser;
  use Sinergi\BrowserDetector\Os;
  use Sinergi\BrowserDetector\Device;
  use Sinergi\BrowserDetector\Language;
  $browser  = new Browser();
  $os       = new Os();
  $device   = new Device();
  $language = new Language();

  // os information
  if ($os->getName() !== Os::UNKNOWN && $os->getVersion() !== Os::UNKNOWN) {
    $os_result = $os->getName() . ' ' . $os->getVersion();
  }
  elseif ($os->getName() !== Os::UNKNOWN && $os->getVersion() === Os::UNKNOWN) {
    $os_result = $os->getName();
  }
  else {
    $os_result = "Unknown";
  }

  // browser information
  if ($browser->getName() !== Browser::UNKNOWN && $browser->getVersion() !== Browser::UNKNOWN) {
    $browser_result = $browser->getName() . ' ' . $browser->getVersion();
  }
  elseif ($browser->getName() !== Browser::UNKNOWN && $browser->getVersion() === Browser::UNKNOWN) {
    $browser_result = $browser->getName();
  }
  else {
    $browser_result = "Unknown";
  }

  // device information
  if ($device->getName() !== Device::UNKNOWN) {
    $device_result = $device->getName();
  }
  else {
    $device_result = "Unknown";
  }

  if ($language->getLanguage() !== "") {
    $language_result = $language->getLanguage();
  }
  else {
    $language_result = "None";
  }
?>
<?php include './template/header.php'; ?>
  <div class="contents clearfix">
    <div class="content col-2">
      <p class="title">Public IP address</p>
      <p class="data"><?= $_SERVER["REMOTE_ADDR"]; ?></p>
    </div>
    <div class="content col-2">
      <p id="local-ip" class="title">Local IP address</p>
      <p id="local-ip-val" class="data"><noscript class="grey">JavaScript is disabled</noscript></p>
    </div>
    <div class="content col-1">
      <p class="title">Remote host</p>
      <?php if (gethostbyaddr($_SERVER["REMOTE_ADDR"]) !== $_SERVER["REMOTE_ADDR"]): ?>
        <p class="data"><?= gethostbyaddr($_SERVER["REMOTE_ADDR"]); ?></p>
      <?php else: ?>
        <p class="data grey">None</p>
      <?php endif ?>
    </div>
    <div class="content col-2">
      <p class="title">OS</p>
      <?php if ($os_result !== "Unknown"): ?>
        <p class="data"><?= $os_result; ?></p>
      <?php else: ?>
        <p class="data grey"><?= $os_result; ?></p>
      <?php endif ?>
    </div>
    <div class="content col-2">
      <p class="title">Browser</p>
      <?php if ($browser_result !== "Unknown"): ?>
        <p class="data"><?= $browser_result; ?></p>
      <?php else: ?>
        <p class="data grey"><?= $browser_result; ?></p>
      <?php endif ?>
    </div>
    <div class="content col-2">
      <p class="title">Device</p>
      <?php if ($device_result !== "Unknown"): ?>
        <p class="data"><?= $device_result; ?></p>
      <?php else: ?>
        <p class="data grey"><?= $device_result; ?></p>
      <?php endif ?>
    </div>
    <div class="content col-2">
      <p class="title">Language</p>
      <?php if ($language_result !== "None"): ?>
        <p class="data"><?= $language_result; ?></p>
      <?php else: ?>
        <p class="data grey"><?= $language_result; ?></p>
      <?php endif ?>
    </div>
    <div class="content col-1">
      <p class="title">Referrer</p>
      <?php if ($_SERVER["HTTP_REFERER"] !== null): ?>
        <p class="data"><?= $_SERVER["HTTP_REFERER"] ?></p>
      <?php else: ?>
        <p class="data grey">None or disabled</p>
      <?php endif ?>
    </div>
    <div class="content col-1">
      <p class="title">User Agent</p>
      <?php if ($_SERVER["HTTP_USER_AGENT"] !== null): ?>
        <p class="data"><?= $_SERVER["HTTP_USER_AGENT"] ?></p>
      <?php else: ?>
        <p class="data grey">None or disabled</p>
      <?php endif ?>
    </div>
  </div>
<?php include './template/footer.php'; ?>
