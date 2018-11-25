<?php

$blogTitle = 'first blog in php';
$sidebarTitle = 'My Sidebar';
$numberPost = 5;

function getBlogName(){
    global  $blogTitle;
    return $blogTitle ;
}
function getSidebarTitle(){
    global  $sidebarTitle;
    return $sidebarTitle ;
}
function posts(){
    global $numberPost;
    $str = '';
    for ($i = 1; $i <= $numberPost; $i++) {
        $class = $i % 2 === 0 ? 'oddPost' : 'evenPost';
        $str .= '<div class="postBox ' . $class . '">';
        $str .= '<h2>Post Title' . $i . '</h2>';
        $str .= '<div>Post Body' . $i . '</div>';
        $str .= '</div>';
    }
    return $str;
}