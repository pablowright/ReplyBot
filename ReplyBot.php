<?php
// UserName Here: Fixie-Reply-Bot

// require_once 'twitteroauth/twitteroauth/twitteroauth.php';
require_once('path/to/twitteroauth.php');
include 'path/to/user.php';

// date_default_timezone_set('America/New_York');
// $tweetContentDate = date('m/d/Y h:i:s a', time());

// ======================= Extra randomization on tweet file: shuffle it. =========================

ini_set('memory_limit', '2048M');

// Get all of the values from the .txt file
// and store them in an array
$file = fopen("fixie-longboard.txt", "r");
$codes = array();

while (!feof($file)) {
    $codes[] = trim(fgets($file));
}

fclose($file);

// Randomize the elements in the array
shuffle($codes);

// Write each element in the shuffled array to a new .txt file
$new_file = fopen("s-fixie-longboard.txt", "w");
foreach($codes as $k => $v){
    fwrite($new_file, $v.PHP_EOL);
}

fclose($new_file);

// =========== Get something to tweet =====================================

function gettxt($lines)
     {
     $lines = file ("s-fixie-longboard.txt");
     srand ((double)microtime()*1000000);
     return $tweetContent = $lines[array_rand ($lines)];
     }

 // === Creat twitter connection ===========================
 
 $connection = new TwitterOAuth ($consumer_key, $consumer_secret, $access_key, $access_secret );

//  ======Set up search function ============
 
function search(array $query)
    {
  global $connection;
  return $connection->get('search/tweets', $query);
    }

 // ========= Seacrh twitter =================
 // Put in your search terms. Can also use a text file variable.
 
$query = array(
  'q' => '#fixie OR fixie OR #longboard OR OR longboard OR #longboarding OR fixed OR #fixed',
  'count' => '5',
  'lang' => 'en',
  'result_type' => 'recent',  
);
  
$results = search($query);
  
// ===== Loop through search results ============  
  
foreach ($results->statuses as $result) {

   if(rand(1,2) == 1){

   $user = $result->user->screen_name;
   $newtweet = gettxt($newtweet);
   $replyuser = "@" . $user ;
   $reply = "$replyuser  $newtweet";
   echo "<br>";
   echo $reply  . "\n";
   $tweetID = $result->id_str;
   echo "<br>";
//   echo $tweetID;

// =========== Tweet your reply ============
 
   $response = $connection->post('statuses/update' , array('status' => $reply ));
}
}



?>