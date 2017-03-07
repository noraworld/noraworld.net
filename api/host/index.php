<?php if (gethostbyaddr($_SERVER["REMOTE_ADDR"]) !== $_SERVER["REMOTE_ADDR"]): ?>
<?= gethostbyaddr($_SERVER["REMOTE_ADDR"]); ?>
<?php else: ?>
none
<?php endif ?>

