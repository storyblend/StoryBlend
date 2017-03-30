<?php
   include('session.php');
   include('connect.php');
?>
<!DOCTYPE html>
<?php
  /////////////////////////////////////////////////////////////////////////////
 /////////////////////////////ECHO POSTS//////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////


///////////////////
//Select from DB//
///////////////// 
$query = "SELECT * FROM posts WHERE story_list_id = " . $_GET['s'] . "";
$result = mysqli_query($con, $query);



//PROFANITY FILTER

function ReplaceBadWords($comment){
$badword = array();
$replacementword = array();
$wordlist = "cock|ass|shit|fuck"; // replace with the list of bad words from attached rar file
$words = explode("|", $wordlist);
foreach ($words as $key => $word) {
$badword[$key] = $word;
$replacementword[$key] = addStars($word);
$badword[$key] = "/\b{$badword[$key]}\b/i";
}
$comment = preg_replace($badword, $replacementword, $comment);
return $comment;
}

function addStars($word) {
$length = strlen($word);
return substr($word, 0, 1) . str_repeat("*", $length - 2) . substr($word, $length - 1, 1);
}


//SET VARIABLES
while($row = mysqli_fetch_assoc($result)) {

$post = $row['post'];
$time = $row['timestamp'];

$year = substr($time, 0, 4);
$month = substr($time, 5, 2);
$day = substr($time, 8, 2);
$hour = substr($time, 11, 2);
$minute = substr($time, 14, 2);



//ECHO VARIABLES
$post = ReplaceBadWords($post);
echo "<p style='white-space:pre-wrap;border:0px;background-color:transparent;font-family:arial;'>" . $post . "</p>";

}

?>