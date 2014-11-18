<?php include "twitteroauth/twitteroauth.php"; ?>
<?php
$consumer = "yqzs7r5uHLg9ohnOJnlFKMlsZ";
$consumerSecret = "WvAScqgW9BYm75tfDEYhrqefAq8Vynv720FBmHc2qvCmpHwJZm";
$accessToken = "365275877-oU4w8t1C7ozMfFFU7WZM6wIjZwBb25usNiOjBOhc";
$accessTokenSecret = "Vf1hvGvSLSBKlThsV2OsN7wWatjbcQ6vWiMDmB0rcdT10";
$twitter = new TwitterOauth($consumer,$consumerSecret,$accessToken,$accessTokenSecret);

?>
<html>
	
	<head>
		<title>
			Twitter feeds

		</title>
		 <link rel="stylesheet" type="text/css" href="style.css" />
</head>
	<body>
		<form action="" method="POST">
		<div class="inset">
		<label> Search : <input type ="text" name="keyword"/></label>	
		</div>

<?php
$i=0;
$abc = array();
if( isset($_POST['keyword'])){
$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=popular&lang=en');
	 foreach($tweets as $tweet){
	foreach ($tweet as $t) {
		 if(isset($t->text)) echo "<br/>".$t->text."<br />";
			if(isset($t->text)) {$abc[$i]=$t->text;
			$i++;}
				}
	}
}
?>
<br/><br/>
<?php 
session_start();
if(isset($abc[0]))
$_SESSION['twt']=$abc[0];
?>
<input type="button" id="abutton" value="Next" onclick="return move()" />
<script>
function move()
{
window.location="example.php";
}
</script>
</body>
</html>