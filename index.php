<?php
/*
 * A PHP file for implementing conway's game of life
 */

require_once __DIR__.'/lib/config.php';

if (($s = g($_POST, 'state'))) {
  $grid = unserialize(urldecode($s));
  $grid = conway_evolve($grid);
} else {
  $grid = conway_new(10,10);
}

start_snippet('shell');
?>
<?= snippet('grid/show', ['grid' => $grid])?>


<?= end_snippet(); ?>
