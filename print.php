<script>
window.print()
</script>
<?php
   include('session.php');
   include('connect.php');
?>

<!DOCTYPE html>
<style>
body {
	margin:50px;
}
</style>

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
$wordlist = "ass|cock|bitch|cunt|dick|penis||4r5e|50yardcuntpunt|5hit|a2m|anal|analleakage|anilingus|anus|ar5e|arrse|arsehole|asses|ass-fucker|assfukka|ass-hole|assmucus|assmunch|asswhole|autoerotic|b!tch|b17ch|b1tch|ballbag|ballsack|bangbros|bareback|bastard|beastiality|beefcurtain|bellend|bestial|bestiality|bi+ch|biatch|bimbos|birdlock|bitchtit|bitchers|bitches|bitchin|bitching|bloody|blowme|blowjob|blowjobs|bluewaffle|boiolas|bollok|boob|boobs|booobs|boooobs|booooobs|booooooobs|breasts|buceta|bunnyfucker|bustaload|busty|butt|buttfuck|butthole|buttmuch|buttplug|c0ck|c0cksucker|carpetmuncher|carpetmuncher|cawk|chink|choade|chotabags|cipa|cl1t|clit|clitlicker|clitoris|clits|clittylitter|clusterfuck|cnut|cock|cockpocket|cocksnot|cockface|cockhead|cockmunch|cockmuncher|cocks|cocksuck|cocksucked|cocksucker|cock-sucker|cocksucking|cocksucks|cocksuka|cocksukka|cok|cokmuncher|coksucka|coon|cornhole|corpwhore|cox|cum|cumchugger|cumdumpster|cumfreak|cumguzzler|cumdump|cummer|cumming|cums|cumshot|cunilingus|cunillingus|cunnilingus|cunt|cunthair|cuntbag|cuntlick|cuntlicker|cuntlicking|cunts|cuntsicle|cunt-struck|cutrope|cyalis|cyberfuc|cyberfuck|cyberfucked|cyberfucker|cyberfuckers|cyberfucking|d1ck|damn|dick|dickhole|dickshy|dickhead|dildo|dildos|dink|dinks|dirsa|dirtySanchez|dlck|dog-fucker|doggiestyle|doggiestyle|doggin|dogging|donkeyribber|doosh|duche|dyke|eatadick|eathairpie|ejaculate|ejaculated|ejaculates|ejaculating|ejaculatings|ejaculation|ejakulate|erotic|fuck|fucker|f_u_c_k|f4nny|facial|fag|fagging|faggitt|faggot|faggs|fagot|fagots|fags|fanny|fannyflaps|fannyfucker|fanyy|fatass|fcuk|fcuker|fcuking|feck|fecker|felching|fellate|fellatio|fingerfuck|fingerfucked|fingerfucker|fingerfuckers|fingerfucking|fingerfucks|fistfuck|fistfuck|fistfucked|fistfucker|fistfuckers|fistfucking|fistfuckings|fistfucks|flange|flogthelog|fook|fooker|fuckhole|fuckpuppet|fucktrophy|fuckyomama|fuck|fucka|fuck-ass|fuck-bitch|fucked|fucker|fuckers|fuckhead|fuckheads|fuckin|fucking|fuckings|fuckingshitmotherfucker|fuckme|fuckmeat|fucks|fucktoy|fuckwhit|fuckwit|fudgepacker|fudgepacker|fuk|fuker|fukker|fukkin|fuks|fukwhit|fukwit|fux|fux0r|gangbang|gangbang|gang-bang|gangbanged|gangbangs|gassyass|gaylord|gaysex|goatse|god|goddamn|god-dam|goddamn|goddamned|god-damned|hamflap|hardcoresex|hell|heshe|hoar|hoare|hoer|homo|homoerotic|hore|horniest|horny|hotsex|howtokill|howtomurdep|jackoff|jack-off|jap|jerk|jerk-off|jism|jiz|jizm|jizz|kawk|kinkyJesus|knob|knobend|knobead|knobed|knobend|knobend|knobhead|knobjocky|knobjokey|kock|kondum|kondums|kum|kummer|kumming|kums|kunilingus|kwif|l3i+ch|l3itch|labia|LEN|lmao|lmfao|lmfao|lust|lusting|m0f0|m0fo|m45terbate|ma5terb8|ma5terbate|mafugly|masochist|masterb8|masterbat*|masterbat3|masterbate|master-bate|masterbation|masterbations|masturbate|mof0|mofo|mo-fo|mothafuck|mothafucka|mothafuckas|mothafuckaz|fuck|mothafucked|mothafucker|mothafuckers|mothafuckin|mothafucking|mothafuckings|mothafucks|motherfucker|motherfucker|motherfuck|motherfucked|motherfucker|motherfuckers|motherfuckin|motherfucking|motherfuckings|motherfuckka|motherfucks|muff|muffpuff|mutha|muthafecker|muthafuckker|muther|mutherfucker|n1gga|n1gger|needthedick|nigg3r|nigg4h|nigga|niggah|niggas|niggaz|nigger|niggers|nob|nobjokey|nobhead|nobjocky|nobjokey|numbnuts|nutbutter|nutsack|orgasim|orgasims|orgasm|orgasms|p0rn|pawn|pecker|penis|penisfucker|phonesex|phuck|phuk|phuked|phuking|phukked|phukking|phuks|phuq|pigfucker|pimpis|piss|pissed|pisser|pissers|pisses|pissflaps|pissin|pissing|pissoff|poop|porn|porno|pornography|pornos|prick|pricks|pron|pube|pusse|pussi|pussies|pussy|pussyfart|pussypalace|pussys|queaf|queer|rectum|retard|rimjaw|rimming|shit|s.o.b.|s_h_i_t|sadism|sadist|sandbar|sausagequeen|schlong|screwing|scroat|scrote|scrotum|semen|sex|sh!+|sh!t|sh1t|shag|shagger|shaggin|shagging|shemale|shi+|shit|shitfucker|shitdick|shite|shited|shitey|shitfuck|shitfull|shithead|shiting|shitings|shits|shitted|shitter|shitters|shitting|shittings|shitty|skank|slope|slut|slutbucket|sluts|smegma|smut|snatch|son-of-a-bitch|spac|spunk|t1tt1e5|t1tties|teets|teez|testical|testicle|tit|titwank|titfuck|tits|titt|tittie5|tittiefucker|titties|tittyfuck|tittywank|titwank|tosser|turd|tw4t|twat|twathead|twatty|twunt|twunter|v14gra|v1gra|vagina|viagra|vulva|w00se|wang|wank|wanker|wanky|whoar|whore|willies|willy|wtf|xrated";
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
return str_repeat("*", abs($length));
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