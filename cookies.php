<?

		require($_SERVER['DOCUMENT_ROOT']."/php1_hmwk/lesson13/template_top.inc");


?>




<?

	function download_plugin() {
	/* function informs and leads user through registration process via templates */
	/* also checks if registration occured and permits download */
	/* superglobal arrays GET and COOKIE set in templates and tested here */
	
	if ($_COOKIE['email']) {
		echo $_COOKIE['email']."<br/>";
		require($_SERVER['DOCUMENT_ROOT']."/php1_hmwk/lesson13/template_registered.inc");
		echo "Your registration ends ".date("F d, Y", $_COOKIE['expiry'])."<br/><br/>";
		if (!isset($_COOKIE['remembered'])) {
			echo '<a href="download.php">Download Plugin</a>';
		} else {
			echo "But you've already downloaded the plugin<br/>";
		}
	} else {					
		require($_SERVER['DOCUMENT_ROOT']."/php1_hmwk/lesson13/template_registration.inc");
		if ($_GET['email']) {						
			echo "Thank you for registering with your email ".$_GET['email']."<br/><br/>";
			echo "You have seven days from now (".date("F d, Y", $_COOKIE['expiry']).") to download the plugin.<br/><br/>";
			echo '<a href="download.php">Download Plugin</a>';	
		}	
	}
	}

	
	/* reading two environment variables User Agent and Remote Address (IP Address) */
	/* conditions based on requirements: Mac users need Firefox and can't use anything else, Windows users can use only IE, Firefox */
	/* used MDN suggestions on how to detect browsers with User Agent strings, which made me realize my script is fairly simple and needs to be beefed up */
	 
	$browser = $_SERVER['HTTP_USER_AGENT'];
	/* example User Agent strings, some are contrived for testing, not actual, others I grabbed from internet searches */
	# "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M"
	# $browser = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A";
	# $browser = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0";
	# $browser = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) Gecko/20100101 Firefox/39.0";
	# $browser = "MSIE 10.0 (Macintosh 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M";
	# $browser = "MSIE 10.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M";
	# $browser = "AOL 10.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M";
	# $browser = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0";
	$address = $_SERVER['REMOTE_ADDR'];
if (preg_match("/^(\d+)\./", $address, $matches)) {
	if ($matches[1] != "202") {
		if (preg_match("/\(Macintosh\b/", $browser)) {		
			if (preg_match("/Firefox/", $browser)) {	
				if (preg_match("/Seamonkey\b/", $browser)) {			
					echo "<br/>We don't allow Seamonkey which you have, download the latest version of Mozilla <a href='https://www.mozilla.org/en-US/firefox/new/'>Firefox</a><br/><br/>";
				} else {	
					
					echo "<br/>You're on a Mac with Firefox, which meets our specs!<br/>";	
					
					download_plugin();
					
													
				}
			} else {
				echo "<br/>You have a Mac, you need Firefox, get it <a href='https://www.mozilla.org/en-US/firefox/new/'>here</a><br/><br/>";
			}				
		} else if (preg_match("/\(Windows\b/", $browser)) {
			if (preg_match("/Firefox/", $browser)) {
				if (preg_match("/Seamonkey\b/", $browser)) {			
					echo "<br/>We don't allow Seamonkey which you have, download the latest version of Mozilla <a href='https://www.mozilla.org/en-US/firefox/new/'>Firefox</a><br/><br/>";
				} else {	
					echo "<br/>You're on a Windows machine using Firefox, which meets our specs!<br/>";	
					
					download_plugin();								
				}
			} else if (preg_match("/MSIE\b/", $browser)) {
				echo "<br/>You're on Windows machine using Internet Explorer, which meets our specs!<br/>";				
				
				download_plugin();		
				
				
			} else {
				echo "<br/>You're on a Windows machine, so you need to use Mozilla <a href='https://www.mozilla.org/en-US/firefox/new/'>Firefox</a> or <a href='http://windows.microsoft.com/en-us/internet-explorer/download-ie'>Internet Explorer</a><br/><br/>";
			}
		} else {
			echo "<br/>You're not on a Windows or Mac machine, which you need together with the appropriate browser. With Mac, you need Firefox. With Windows, you need either Internet Explorer or Firefox.<br/><br/>";
		}
	} else {
		header('Location: hacker.txt');
		die();
		
	}
}  else {
	echo "<br/>Can't detect the IP address of your computer, please try another computer!<br/><br/>";
}
	
?>

<?
		
		require($_SERVER['DOCUMENT_ROOT']."/php1_hmwk/lesson13/template_bottom.inc");

?>
