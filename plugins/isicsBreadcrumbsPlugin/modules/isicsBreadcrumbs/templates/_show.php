<?php $last_key = count($items) - 1 ?>

<?php foreach ($items as $key => $item): ?>
  <?php if ($key < $last_key): ?>
    <?php echo link_to($item->getText(), $item->getUri(ESC_RAW)) ?> &gt;
  <?php else: ?>
    <?php echo $item->getText() ?>
  <?php endif ?>
<?php endforeach ?>