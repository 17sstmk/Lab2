<?php

function generateLink($url, $label, $class) {
   $link = '<a href="' . $url . '" class="' . $class . '">';
   $link .= $label;
   $link .= '</a>';
   return $link;
}
function outputPostRow($number)  {
    
include("travel-data.inc.php");
return '<a>asdjfaskdjlf</a>';
}


/*
  Function constructs a string containing the <img> tags necessary to display
  star images that reflect a rating out of 5

*/
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

















//<div class="row">
  //<div class="col-md-4">
   // <a href="post.php?id=1" class="">
    //<img src="images/8710320515.jpg" alt="Ekklisia Agii Isidori Church" class="img-responsive"/>
      // </a>
    // </div><div class="col-md-8"> 
      // <h2>Ekklisia Agii Isidori Church</h2>
        //<div class="details">Posted by 
         //<a href="user.php?id=2" class="">Leonie Kohler</a>
           //<span class="pull-right">2/8/2017</span>
             //<p class="ratings"><img src="images/star-gold.svg" width="16" /><img src="images/star-gold.svg" width="16" />
        //<img src="images/star-gold.svg" width="16" /><img src="images/star-white.svg" width="16" />
         //<img src="images/star-white.svg" width="16" /> 15 Reviews</p>
           //         </div><p class="excerpt">At the end of the hot climb up to the top Lycabettus Hill you are greeted with the oasis that is the Ekklisia Agii Isidori church.</p>
             //     <p><a href="post.php?id=1" class="btn btn-primary btn-sm">Read more</a>
        //</p>
       //</div>
       //</div>
         //     <hr/>