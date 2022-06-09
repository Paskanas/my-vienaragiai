<?php
if (!empty($messages)) {
  foreach ($messages as $message) : ?>
    <div class=<?= $message['type'] ?>><?= $message['message'] ?></div>
<?php
  endforeach;
}
