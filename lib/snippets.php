<?php
/*
 * A PHP file for implementing our snippet or HTML template
 * capability
 */


function snippet($_name, $_params = array(), $_options = []) {
  $_base    = g($_options, 'rel',  __DIR__ . "/../snippets");
  
  if(snippet_exists($_name, $_base)) {
    ob_start();
    extract($_params);
    require("$_base/{$_name}.php");
    $content = ob_get_clean();
    return $content;
  } else {
    if(($default = g($_options, 'fallback', '*required*')) == '*required*') {
      throw new Exception("snippet $_name not found.");
    } else {
      return $default;      
    }
  }
}


global $_snippet_stack;
$_snippet_stack = [];

function start_snippet($name, $params = array()) {
  global $_snippet_stack;

  array_push($_snippet_stack, array('name' => $name, 'params' => $params));
  ob_start();
}

function end_snippet() {
  global $_snippet_stack;
  
  $body = ob_get_clean();
  $snippet = array_pop($_snippet_stack);
  return snippet($snippet['name'], $snippet['params'] + array('body' => $body));
}

function snippet_exists($_name, $_base) {
  return file_exists("$_base/{$_name}.php");
}
