<?php




$target_html = simplexml_load_file('https://tech.nikkeibp.co.jp/rss/index.rdf');
//$target_html = mb_convert_encoding($target_html, 'HTML-ENTITIES', 'auto');

$i = 0;

// $invalid_characters = '/[^\x9\xa\x20-\xD7FF\xE000-\xFFFD]/';
// $target_html = preg_replace($invalid_characters, '', $target_html);

$objects = array();

foreach ($target_html->item as $item) {
  $title = $item->title;
  $link = explode("https", $item->link);
  $date = date('Y年m月d日', strtotime($item->children("http://purl.org/dc/elements/1.1/")->date));
  $title = mb_convert_encoding($title, "UTF-8", "auto");


  $obj = (object) [
      'title' => $title,
      'link' => $link[1],
      'date' => $date,
  ];

  $i++;
  if ($i > 4) {
      break;
  }

  array_push($objects, $obj);

}

$json = json_encode($objects,JSON_UNESCAPED_UNICODE);

echo $json;
