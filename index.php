<?php
/*
 * A PHP file for implementing conway's game of life
 */

require_once(__DIR__ . '/lib/config.php');

$grid = conway_new(30, 20);

start_snippet('shell');
?>
<?= snippet('grid/show', ['grid' => $grid])?>


<?= end_snippet(); ?>
