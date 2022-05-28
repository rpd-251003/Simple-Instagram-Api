<?php
session_start();
$data = $_GET['url'];
$type = $_GET['type'];

if(!empty($type == 1)){
    // url = username instagram
    echo followers_count($data);
} else if($type == 2) {
    // url = link post instagram
    echo likes_count($data);
} else {
    echo 'Sorry your request is invalid';
}

function followers_count($data){
    $id = file_get_contents("https://www.instagram.com/".$data."/?&__a=1");
    $id = json_decode($id, true);
    $count = $id['graphql']['user']['edge_followed_by']['count'];
    return $count;
}

function likes_count($data){
    $id = file_get_contents($data."?/&__a=1");
    $id = json_decode($id, true);
    $count = $id['items'][0]['like_count'];
    return $count;
}
?>
