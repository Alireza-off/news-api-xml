<?php

header("Content-Type: application/json");

$url = "https://www.tasnimnews.com/fa/rss/feed/0/8/0/%D9%85%D9%87%D9%85%D8%AA%D8%B1%DB%8C%D9%86-%D8%A7%D8%AE%D8%A8%D8%A7%D8%B1";

$data = file_get_contents($url);

file_put_contents('rss.xml', $data);

$xml = simplexml_load_file("rss.xml")->children()->children();

$CallData = [];

foreach ($xml->item as $items) {
    array_push(
        $CallData, 
        $items
    );
}

$Results = [
    'STATUS'=>true,
    'Request'=>200,
    'XML_SITE'=>$url,
    'vesion'=>2,
    'data'=>$CallData,
    'errors'=>NULL,
    'message'=>'اخبار با موفقیت گرفته شد',
];

echo json_encode($Results);

?>
