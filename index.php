<?php
require 'Zindexer.php';
$search = new Zindexer();
if (!empty($_GET['action']) && $_GET['action'] === 'index') {
  $params = [
    'index' => 'z_index'
  ];
  if ($search->indexExists('z_index')) {

  } else {
    $search->createIndex($params);
  }

  $search->indexById([
    'index' => 'z_index',
    'type' => 'z_auto',
    'id' => 'z_id',
    'body' => [
      'title' => 'super title',
      'description' => 'super description',
      'isAvailable' => 1
    ]
  ]);
  $search->indexById([
    'index' => 'z_index',
    'type' => 'z_auto',
    'id' => 'z_id2',
    'body' => [
      'title' => 'title super',
      'description' => 'super description',
      'isAvailable' => 1
    ]
  ]);

  $search->indexById([
    'index' => 'z_index',
    'type' => 'z_auto',
    'id' => 'z_id3',
    'body' => [
      'title' => 'title',
      'description' => 'description',
      'isAvailable' => 1
    ]
  ]);
  $search->indexById([
    'index' => 'z_index',
    'type' => 'z_auto',
    'id' => 'z_id4',
    'body' => [
      'title' => 'title other',
      'description' => 'other description',
      'tags' => [
        'truc' => '1'
      ]
      'isAvailable' => 0
    ]
  ]);
} else {
  $q = $_GET['q'];
  $size = !empty($_GET['size']) ? $_GET['size'] : 12;
  $params = [
    'index' => 'z_index',
    'type' => 'z_type',
    'body' => '{
      "size" : ' . $size . ',
      "query" : {
        "match" : {
          "title" : "' . $q . '"
        }
      }
    }'/*[
      'size' => $size,
      'query' => [
        'match'=> [
          'title' => $q
        ]
      ]
    ]*/
  ];
  var_export($params);
echo "<br /><br /><br />";
  $paramsAll = [
    'index' => 'z_index',
    'type' => 'z_auto',
    'body' => [
      'size' => $size
    ]
  ];
  print_r(
    $search->getAllDocuments($paramsAll)
  );
echo "<br /><br /><br />";
  print_r(
    $search->searchByMatchQuery($params)
  );
}
