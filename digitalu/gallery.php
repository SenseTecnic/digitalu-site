<?php

$link = mysql_connect('localhost', 'root', 'aMUSEment2');

if (!$link) {
	die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db = mysql_select_db('digitalu', $link);

if (!$db) {
	die('Can\'t use foo : ' . mysql_error());
}

$query = "SELECT * FROM submission, submission_user, user " . "WHERE submission.s_id = submission_user.s_id " . "AND submission_user.u_id = user.u_id";

$result = mysql_query($query) or die(mysql_error());
mysql_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>UBC Digital*U</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="HandheldFriendly" content="true" />FROM x
LEFT JOIN b ON (b.b_id = x.b_id)
WHERE (x.a_id = 'whatever')

        <meta name="viewport" content="width=device-width, height=device-height, user-scalable=yes">

        <link href="fonts/stylesheet.css" rel="stylesheet">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/common.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <!-- Image for Facebook share -->
        <meta property="og:image" content="img/fb_share.png">
    </head>
    <body>

        <div class="container">

            <h1 class="title">Digital*U</h1>
            <h3 class="subtitle">@ the University of British Columbia</h3>

            <div class="nav">
                <ul class="nav-links">
                    <li id="nav-what">
                        <a class="nav-link" href="#">What</a>
                    </li>
                    <li id="nav-how">
                        <a class="nav-link" href="#" >Entries</a>
                    </li>
                    <li id="nav-rules">
                        <a class="nav-link" href="#">Rules</a>
                    </li>
                    <li id="nav-info">
                        <a class="nav-link" href="#">FAQ</a>

                    </li>
                    <li id="nav-register">
                        <a class="nav-link" href="#">Register</a>
                    </li>

                </ul>
            </div>

            <div class="content">
                <ul class="content-ul">
                    <?php
					while ($row = mysql_fetch_array($result)) {
						echo $row['title'] . " - " . $row['abstract'];
						echo "<br />";
						echo $row['name'] . ", " . $row['email'];
					}
                    ?>
                </ul>
            </div>
        </div>

        <a href="http://www.it.ubc.ca/"><img src="img/it_logo.png" id="it-logo"/></a>
        <div class="social-logos" style="display:none">

            <a href="https://www.facebook.com/ubcdigitalu"><img src="img/facebook.png" id="fb-logo"/></a>
            <a href="https://twitter.com/ubcdigitalu"><img src="img/twitter.png" id="twitter-logo"/></a>
        </div>

        <!-- Google Analytics -->
        <script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-36010410-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();
        </script>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/common.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>