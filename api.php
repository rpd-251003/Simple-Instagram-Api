<?php
$data = $_GET['url'];
$proses = json_decode(likes_count($data));
print($proses);

function followers_count($data){
    $id = file_get_contents("https://instagram.com/web/search/topsearch/?query=".$data);
    $id = json_decode($id, true);
    $count = $id['users'][0]['user']['follower_count'];
    return $count;
}

function likes_count($data){
    $id = file_get_contents("".$data."?&__a=1");
    $id = json_decode($id, true);
    return $id;
}
?>
<title>V2.1</title>
