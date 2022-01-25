<?php
/*
 * A PHP file for printing out a board of data
 */
?>
<h1>Generation: <?= $grid['generation'] ?></h1>

<table class="grid">
  <? for($y = 0; $y < $grid['height']; $y++) { ?>
    <tr>
      <? for($x = 0; $x < $grid['width']; $x++) { ?>
        <? $alive =  conway_is_alive($grid, $x, $y);?>
        <td class="<?= $alive ? 'alive' : 'dead'?>" >
          <?= $alive ? '&#x1F600' : '&#2716' ?>
        </td>
      <? } ?>
    </tr>
  <? } ?>
</table>

  
