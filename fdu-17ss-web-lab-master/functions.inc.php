<?php

function generateLink($url, $label, $class) {
   $link = '<a href="' . $url . '" class="' . $class . '">';
   $link .= $label;
   $link .= '</a>';
   return $link;
}
function outputPostRow($number)  {
    
include("travel-data.inc.php");
$abc="";
$abc .="<div class='row'><div class='col-md-4'>";
$d=${"postId".$number};
$abc .="<a href='post.php?id=$d' class=''>";
$d=${"thumb".$number};
$e=${"title".$number};
$abc .="<img src='images/$d' alt='$e' class='img-responsive'/>";
$abc .="</a>";
$abc .="</div><div class='col-md-8'>";
$abc .="<h2>$e</h2>";
$abc .="<div class='details'>Posted by ";
$d=${"userId".$number};
$e=${"userName".$number};
$abc .="<a href='user.php?id=$d' class=''>$e</a>";
$d=${"date".$number};
$abc .="<span class='pull-right'>$d</span>";
$abc .="<p class='ratings'>";
$d=${"reviewsRating".$number};
$abc .=constructRating($d);
$d=${"reviewsNum".$number};
$abc .=" $d Reviews</p>";
$d=${"excerpt".$number};
$abc .="</div><p class=;excerpt;>$d</p>";
$d=${"postId".$number};
$abc .="<p><a href='post.php?id=$d' class='btn btn-primary btn-sm'>Read more</a>";
$abc .="</p></div></div><hr/>";
echo $abc;
}


function constructRating($rating) {
    $imgTags = "";
    

    // first output the gold stars
    for ($i=0; $i < $rating; $i++) {
        $imgTags .= '<img src="images/star-gold.svg" width="16" />';
    }
    
    // then fill remainder with white stars
    for ($i=$rating; $i < 5; $i++) {
        $imgTags .= '<img src="images/star-white.svg" width="16" />';
    }    
    
    return $imgTags;    
}

?>














