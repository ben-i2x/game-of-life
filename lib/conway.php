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
        $x = $width + $x;
    }

    while ($y < 0) {
        $y = $height + $y;
    }

    $x = $x % $w;
    $y = $y % $h;

    return ($y * $w) + $x;
}

function conway_evolve($grid)
{
}
