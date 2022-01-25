<?php
/*
 * A PHP file for printing out a board of data
 */
?>
<h1>
  Generation: <?= $grid['generation'] ?>

  <?= snippet('grid/next', ['grid' => $grid])?>
</h1>

<table class="grid">
  <?php for ($y = 0; $y < $grid['height']; $y++) { ?>
    <tr>
      <?php for ($x = 0; $x < $grid['width']; $x++) { ?>
        <?php $alive = conway_is_alive($grid, $x, $y); ?>
        <td class="<?= $alive ? 'alive' : 'dead'?>" >
          <?= $alive ? '&#x1F600' : '&#2716' ?>
        </td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>

  
