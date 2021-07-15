<?php




$target_html = file_get_contents('https://assets.wor.jp/rss/rdf/reuters/forex.rdf');
//$target_html = mb_convert_encoding($target_html, 'HTML-ENTITIES', 'auto');

$invalid_characters = '/[^\x9\xa\x20-\xD7FF\xE000-\xFFFD]/';
$target_html = preg_replace($invalid_characters, '', $target_html);

//echo($target_html);


//echo("------------");

$dom = new DOMDocument;
@$dom->loadHTML($target_html);

$objects = array();

$item_nodes = $dom->getElementsByTagName('item');
foreach ($item_nodes as $node) {
    $infos = explode("https", $node->nodeValue);

    $title = $infos[0];
    $linkAndDate = $infos[1];

    $infos2 = explode("    ", $linkAndDate);
    
    $link = $infos2[0];
    $date = $infos2[1];

    //echo($title);
    //echo($link);

    $obj = (object) [
        'title'   => $title,
        'link' => $link,
    ];

    array_push($objects, $obj);
}

$json = json_encode($objects,JSON_UNESCAPED_UNICODE);

echo $json;