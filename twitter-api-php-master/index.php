<html>
<head>
  <title>Twitter API</title>
  <script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
  <script src="modernizr.js"></script>
  <script src="twitter.js"></script>
<!-- <link href="main.css" rel="stylesheet">  -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!--  <link rel="stylesheet" href="css/base.css" /> -->

<!--font -->
<link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>




<style>

.border {
  border-bottom: dotted 1px black;
  padding-bottom: 10px;
  clear: both;
}
.float-left {
  float: left;
}
.bold {
  font-weight: 700;
}
a {
  text-decoration: none;
  color: white;
}
.handle {
  color: gray;
  font-size: 11px;
}
.twitter-pic {
  padding-right: 10px;
}
.name {
  color: white;
}
.font-small {
  font-size: 11px;
}
.tweet-div {
  clear: both;
  padding: 8px;
  border-bottom: 1px solid #CCD6DD;
  border-right: 1px solid #CCD6DD;
}
.tweet {
  font-family: Arial, sans-serif;

}

.twitpic {
  clear: both;
}
.twitter-media {
  max-width: 285px;
  max-height: 285px;
  margin: 0 auto;
  display: block;
}
.twit {
  width: 305px;
  overflow-x: hidden;

}
.tweetusers {
  font-family: 'Amatic SC', cursive;


}
.twitter-intent {
  display: inline-block;
}
.tweet-options {
  padding-top: 8px;
}
.row-height {
  height: 20px;
}
.col-md-4, .col-xs-4 {
  padding-left: 40px;
}
.middle {
  border-right: 1px solid gray;
  border-left: 1px solid gray;
}
a:hover {
  text-decoration: none;
}
.tweet a {
  color: #55ACEE;
}
.expand {
  color: #A9ACAE;
  font-size: 12px;
}
.expand:hover {
  color: #666666;
}
img {
  max-width: 200px;
}
body {
  overflow-x: hidden;
}
#instagram-martin {
  height: 200px;
}
.flickr-images {
  width: 200px;
  height: auto;
}
</style>

</head>
<body>

<?php

ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "342348549-eZyCcqK6umXMq3fb9P4jTDQBPFoYmfQFSyM3Jtcc",
    'oauth_access_token_secret' => "91Ho4IJANcTaAOdNvollZBkyk0QQTXVUm1UyVw19rDblA",
    'consumer_key' => "K5rgLESFdna80KugV37pYRbkj",
    'consumer_secret' => "veVCve9CSIRDySEgJHfecIPDaMFmMi5M07krWASKYzlUSxmMdm"
);


$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=chilipeppers';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);

$tweetData = json_decode($twitter->setGetfield($getfield) //This whole section is added from the above code and manipulated
             ->buildOauth($url, $requestMethod)
             ->performRequest(), $assoc = True);


foreach($tweetData['statuses'] as $items)
  {

                $date = new DateTime( $items->created_at );
                $userArray = $items['user'];
                //steps for media array
                $entitiesArray = $items['entities'];
                $mediaArray = $entitiesArray['media'];
                $tweetMedia = $mediaArray[0];
                $tweetMedia1 = $mediaArray[1];
                $tweetMedia2 = $mediaArray[2];
                $tweetMedia3 = $mediaArray[3];
                $mediaResize = $tweetMedia['sizes']['thumb']['w'];

                echo "<div class='twit'>";
                echo "<div class='tweet-div'><div class='float-left twitpic'><a target='_blank' href='http://www.twitter.com/" . $userArray['screen_name'] . "'><img class='twitter-pic' target='_blank' src='" . $userArray['profile_image_url'] . "'></a></div>";
                echo "<div class='tweetusers'><a target='_blank' href='http://www.twitter.com/" . $userArray['screen_name'] . "'><span class='name bold'>" . $userArray['name'] . "</span>   </br><span class='handle'>   |   @" . $userArray['screen_name'] . " :   </span></a> </div>  <span class='font-small'>&sdot;";
                echo "</br><div class='tweet'>" . $items['text'] . "</div>";
                echo "<a target='_blank' href='" . $tweetMedia['expanded_url'] . "'><img class='twitter-media' target='_blank' src='" . $tweetMedia['media_url'] . "'></a>";
                echo "<a target='_blank' href='" . $tweetMedia1['expanded_url'] . "'><img class='twitter-media' target='_blank' src='" . $tweetMedia1['media_url'] . "'></a>";
                echo "<a target='_blank' href='" . $tweetMedia2['expanded_url'] . "'><img class='twitter-media' target='_blank' src='" . $tweetMedia2['media_url'] . "'></a>";
                echo "<a target='_blank' href='" . $tweetMedia3['expanded_url'] . "'><img class='twitter-media' target='_blank' src='" . $tweetMedia3['media_url'] . "'></a>";
                echo "<div class='tweet-options'>";
                echo "<div class='row row-height'>";
                echo "<div><a target='_blank' href='" . $tweetMedia['expanded_url'] . "'><p class='expand'> </p></a></div>";
                echo "<div>";
                echo "</div></div></div>";
                echo "<span class='border'></span></div>";
                echo "</div> </br>";

}



echo "<script>   function pageComplete(){
  console.log('working');
    $('.twit').tweetLinkify();
  }
  pageComplete();


  </script> ";

  ?>
<!--

echo "<div class= 'twit'><p><strong>@". $items['user']['screen_name']."</strong>".  $items['created_at'] . "</br></p> ";
echo "<div class= 'twitter'> " . $items['text'] . " </div></div>";
echo "</br>";


  echo "<div class= 'twitter-tweet'> " . $items['text'] . " </div>";
    echo "<strong><div class= 'username'>". $items['user']['screen_name']."<br /></strong>";
    echo "When: " . $items['created_at'] . "</br>";
    echo "Where: " . $items['location'] . "</br>";
    echo "</br>";

    echo "<script>   function pageComplete(){
        $('.tweet').tweetLinkify();
      }</script> "; -->
</body>
<html>
