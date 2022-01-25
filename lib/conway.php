<?php
/*
 * A PHP file for implementing conway's game of life
 */

function conway_new($width, $height)
{
  $data = [];
  for ($i = 0; $i < ($width * $height); $i++) {
    $data[] = (rand(0, 100) < 20) ? 1 : 0;
  }

  return [
    'data'       => $data,
    'width'      => $width,
    'height'     => $height,
    'generation' => 0,
  ];
}

function conway_is_alive($grid, $x, $y)
{
  $index = conway_index($grid, $x, $y);

  return $grid['data'][$index] == 1;
}

function conway_index($grid, $x, $y)
{
  $w = $grid['width'];
  $h = $grid['height'];

  while ($x < 0) {
    $x = $w + $x;
  }

  while ($y < 0) {
    $y = $h + $y;
  }

  $x = $x % $w;
  $y = $y % $h;

  return ($y * $w) + $x;
}

function conway_supported($grid, $x, $y)
{
  $living = 0;
  for ($xo = -1; $xo <= 1; $xo++) {
    for ($yo = -1; $yo <= 1; $yo++) {
      if ($xo != 0 && $yo != 0) {
        $i = conway_index($grid, $x + $xo, $y + $yo);
        if ($grid['data'][$i]) {
          $living += 1;
        }
      }
    }
  }

  return $living == 2 || $living == 3;
}

function conway_evolve($grid)
{
  $next = [];
  for ($y = 0; $y < $grid['height']; $y++) {
    for ($x = 0; $x < $grid['width']; $x++) {
      $i = conway_index($grid, $x, $y);
      if ($grid['data'][$i] == 1) {
        if (conway_supported($grid, $x, $y)) {
          $next[$i] = 1;
        } else {
          $next[$i] = 0;
        }
      } else {
        if (conway_supported($grid, $x, $y)) {
          $next[$i] = 1;
        } else {
          $next[$i] = 0;
        }
      }
    }
  }

  $grid['data'] = $next;
  $grid['generation']++;

  return $grid;
}
