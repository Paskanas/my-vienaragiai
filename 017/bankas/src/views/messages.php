<?php
if (!empty($messages)) :
?>
  <div>
    <?php foreach ($messages as $message) : ?>
      <div class="<?= $message['type'] ?>"><?= $message['message'] ?></div>
    <?php endforeach ?>
  </div>

<?php endif ?>