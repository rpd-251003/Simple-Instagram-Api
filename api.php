<?php

// https://github.com/rpd-251003/Simple-Instagram-Api/

session_start();

$data = $_GET['url'];
$type = $_GET['type'];

function followers_count($data)
{
    $id = file_get_contents("https://www.instagram.com/".$data."/?&__a=1");
    $id = json_decode($id, true);
    $count = $id['graphql']['user']['edge_followed_by']['count'];
    return $count;
}

function likes_count($data)
{
    $id = file_get_contents($data."?/&__a=1");
    $id = json_decode($id, true);
    $count = $id['items'][0]['like_count'];
    return $count;
}

if(isset($type == 1)){
    echo followers_count($data);
} else if(isset($type == 2)) {
    echo likes_count($data);
} else {
    echo 'Sorry your request is invalid';
}
