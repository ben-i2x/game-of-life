<?php
/*
 * A PHP file for showing our next link for a grid
 */
$state = urlencode(serialize($grid));

?>
<form action="/conway/index.php" method="POST">
  <input type="hidden"
         name="state"
         value="<?= $state ?>"/>
  <input type="submit" value="Next"/>
</form>
