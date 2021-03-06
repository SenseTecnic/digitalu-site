<?php

$link = mysql_connect('localhost', 'digitalu', 'm@g1c');

if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$db = mysql_select_db('digitalu', $link);

if (!$db) {
	die('Can\'t use db : ' . mysql_error());
}

$query = "SELECT submission.title, submission.concept, submission.abstract, submission.s_id, " . "GROUP_CONCAT(user.name) " . "FROM submission " . "INNER JOIN submission_user ON submission_user.s_id = submission.s_id " . "INNER JOIN user ON submission_user.u_id = user.u_id " . "GROUP BY submission.s_id";
$result = mysql_query($query) or die(mysql_error());
mysql_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>UBC Digital*U</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="HandheldFriendly" content="true" />
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
                    <li id="what" style="display:block">

                        <div class="prize-message">
                            <h3 class="pixel">Help us invent UBC’s digital future for a chance to win</h3>
                            <h1 class="pixel">$5000!</h1>
                        </div>

                        <p>
                            We're looking for creative individuals and groups on campus to champion innovative ideas.
                            Win cool prizes by proposing a new mobile app or service that could dramatically enhance the UBC experience.
                            It can be for fun, function or achieving UBC’s global mission. What kind of mobile app would make UBC a much better place for you?
                            Winning entries will be vying for a grand prize of $5000, a second-place prize of $3000, plus cool devices, fame and fortune.
                            The best ideas will find their way into labs, design studios, hackathons and - yes - into reality!
                        </p>

                        <p>
                            The inaugural Digital*U Contest runs from <b>October 15, 2012 to January 15, 2013.</b>
                            Winners will be announced on or before February 10, 2013. The earlier you register, the better!
                        </p>

                        <div class="block">
                            <a href="hackathon.php"><h2 class="pixel secondary">Hackathon</h2></a>
                            <p>
                                Want to get a head start? We're holding a hackathon on <b>Monday, December 3rd</b> from <b>10am to 6pm</b>.
                                Spend the day dreaming up and building a new mobile application that will automatically be entered into the Digital*U contest,
                                and you could earn up to $250 for the best hack! <a href="hackathon.php">Check out the website for more info!</a>
                            </p>
                        </div>

                        <div class="block row-fluid" id="social-logos-big-wrapper">
                            <a href="https://www.facebook.com/ubcdigitalu">
                            <div class="social-logo-big span6 pixel" style="text-align: right">
                                Like us on Facebook<img src="img/facebook.png">
                            </div></a>

                            <a href="https://twitter.com/ubcdigitalu">
                            <div class="social-logo-big span6 pixel">
                                <img src="img/twitter.png">Follow us on Twitter
                            </div></a>
                        </div>

                    </li>

                    <li id="how" style="display:none">
                        <h2>Submissions</h2>
                        <ul class="gallery-ul content-ul">
                            <?php
							while ($row = mysql_fetch_array($result)) {
								$names = str_replace(",", ", ", $row['GROUP_CONCAT(user.name)']);
								echo "<li><h3 class='pixel gallery-title'>" . $row['title'] . "</h3>";
								echo "<span class='gallery-names'><i class='icon-user icon-white'></i> " . $names . "</span>";								
								echo "<div class='gallery-concept'>".$row['concept']."</div>";
								if ($row['abstract'])
									echo "<div><span class='gallery-read-more pixel'>+ Read more</span><div class='gallery-abstract'>" . $row['abstract'] . "</div></div>";
								echo "</li>";
							}
                            ?>
                        </ul>
                    </li>

                    <li id="rules" style="display:none">

                        <h2 class="pixel secondary">Deliverables</h2>

                        <p>
                            Teams must register their team and submit an initial propostal via the Digital*U website's registration form by <b>January 1st, 2013</b>.
                            The deadline for the final submission is <b>January 15th, 2013</b>.
                            Further details submission of the final product will be sent to registered teams via email.
                        </p>

                        <p>
                            Final submissions will be judged equally on originality, feasibility, potential impact, and benefit to UBC, and will involve the following components:
                            <ul>
                                <li>
                                    a stand-up 10 minute presentation to a panel of judges
                                </li>
                                <li>
                                    a tangible demonstration of your idea (prototype and/or detailed storyboard)
                                </li>
                                <li>
                                    a 90-second promotional video
                                </li>
                                <li>
                                    a 1,000 word (max) written submission
                                </li>
                            </ul>
                        </p>

                        <div class="block">
                            <h2 class="pixel">Judging Guidelines</h2>
                            <p>
                                The Digital*U Contest is open to all UBC campuses and communities, including students, alumni, staff, faculty, residents, departments, units, and facilities.
                                A maximum of two (2) entries will be considered from any individual or group. When entries of a substantially similar nature are encountered, precedence will be
                                given in the order of team registration and proposal submission.
                            </p>

                            <p>
                                A jury of independent peers and experts will give equal weight to the following five (5) criteria in selecting winning entries:
                                <ul>
                                    <li>
                                        Originality of the mobile idea
                                    </li>
                                    <li>
                                        Feasibility of development
                                    </li>
                                    <li>
                                        Breadth of audience &amp; impact
                                    </li>
                                    <li>
                                        Potential for enhancing UBC
                                    </li>
                                    <li>
                                        Excellence of storytelling
                                    </li>
                                </ul>
                            </p>

                            <p>
                                All submissions will become the exclusive property of UBC to display, distribute, develop and apply as it so chooses.
                                Applicants will be invited to become beneficial participants in the further refinement and development of their ideas, should that take place.
                                Applicants may optionally choose to develop their ideas as their own ventures in conjuntion with the UBC MAGIC Lab
                                and/or within UBC programs such as entrepreneurship@UBC.
                            </p>
                        </div>

                        <div class="block">
                            <h2 class="pixel">Judging Committee</h2>
                            <div class="row-fluid">
                                <ul class="judges-ul span10 offset1">
                                    <li class="judge-block">
                                        <img src="img/judges/david.jpeg"/>
                                        <div class="judge-info">
                                            <h2>Dr. David Vogt</h2>
                                            Director, Innovation Strategy, UBC MAGIC Lab
                                            <br/>
                                            Executive Director, Mobile Muse Network
                                        </div>
                                    </li>

                                    <li class="judge-block">
                                        <img src="img/judges/brad.jpg"/>
                                        <div class="judge-info">
                                            <h2>Brad Lowe</h2>
                                            Wireless Accelerator Architect, Wavefront
                                            <br/>
                                            (formerly) Managing Director, NOKIA Canada Development Centre

                                        </div>
                                    </li>

                                    <li class="judge-block">
                                        <img src="img/judges/phil.png"/>
                                        <div class="judge-info">
                                            <h2>Phil Chatterton</h2>
                                            Director, Digital Media Technologies, UBC IT

                                        </div>
                                    </li>

                                    <li class="judge-block">
                                        <img src="img/judges/janeen.jpg"/>
                                        <div class="judge-info">
                                            <h2>Janeen Alliston</h2>
                                            Director, UBC Student Communications Services

                                        </div>
                                    </li>

                                    <li class="judge-block">
                                        <img src="img/judges/sara.jpg"/>
                                        <div class="judge-info">
                                            <h2>Sara Bainbridge</h2>
                                            Computer Science Student
                                            <br/>
                                            Web developer, UBC MAGIC Lab
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </li>

                    <li id="info" style="display:none">
                        <ul id="faq-ul">
                            <li>
                                <h3>Will my ideas really make a difference?</h3>
                                <p>
                                    This contest gives you the opportunity to create something that literally thousands of students, staff and faculty here
                                    at UBC could use on a daily basis. Let your ideas run wild and you could create the next digital revolution.
                                    Some of the world's most successful businesses started with a simple idea piloted on a university campus -- ever heard of Facebook?
                                </p>
                            </li>

                            <li>
                                <h3>What kinds of ideas are you looking for?</h3>
                                <p>
                                    We're looking for a new mobile app or service that could dramatically enhance the UBC experience.
                                    This could take on many forms and the topic is purposely broad.  To help you get started, you may want
                                    to review UBC's mission statements on the university website or view our sample submissions.
                                </p>
                            </li>

                            <li>
                                <h3>How do I enter?</h3>
                                <p>
                                    First of all, make sure that you've read the contest rules, regulations and entry instructions.
                                    Register your team by filing out the registration form. We'll be in touch with you shortly afterwards.
                                </p>
                            </li>

                            <li>
                                <h3>What kinds of resources are available to me?</h3>
                                <p>
                                    If you have specific needs, please email us.  We will be hosting a hackathon on December ??, providing a space to work,
                                    internet access, web servers and technical assistance for programming projects.  All entrants are welcome to drop in for a chat,
                                    whether or not they decide to stay and work.
                                </p>
                            </li>

                            <li>
                                <h3>Do I have to be a programmer?</h3>
                                <p>
                                    No -- this contest is open to any team with an idea.  See entry requirements for more specific details.
                                </p>
                            </li>

                            <li>
                                <h3>Do I have to be from UBC?</h3>
                                <p>
                                    Currently, the Digital*U contest is only open to those affiliated with UBC in some way.
                                    (Students, alumni, faculty, and so on.) If you do have questions or concerns about this, however,
                                    you can shoot us an email at <a href="mailto:digitalu@magic.ubc.ca">digitalu@magic.ubc.ca</a> explaining
                                    your situation.
                                </p>
                            </li>

                            <li>
                                <h3>Who owns the code and ideas produced by the contest?</h3>
                                <p>
                                    All submissions will become the exclusive property of UBC to display, distribute, develop and apply as it so chooses.
                                    Applicants will be invited to become beneficial participants in the further refinement and development of their ideas,
                                    should that take place. Applicants may optionally choose to develop their ideas as their own ventures in conjuntion with the UBC
                                    MAGIC Lab and/or within UBC programs such as entrepreneurship@UBC.
                                </p>
                            </li>
                            <li>
                                <h3>Are there any limits on team size?</h3>
                                <p>
                                    Nope! You can even enter as a team of one, if you'd like.
                                </p>
                            </li>

                            <li>
                                <h3>Can I enter more than once?</h3>
                                <p>
                                    A maximum of two (2) entries will be considered from any individual or group.
                                </p>
                            </li>

                            <li>
                                <h3>Who can I contact for more information?</h3>
                                <p>
                                    You can get a hold of us by email at <a href="mailto:digitalu@magic.ubc.ca">digitalu@magic.ubc.ca</a>
                                </p>
                            </li>
                        </ul>

                    </li>

                    <li id="register" style="display:none">

                        <h2 class="pixel">Get your ideas and team together!</h2>
                        <p>
                            Register your team using the form below by <b>January 1st, 2013</b>. Registered teams will receive details regarding their final submission, which will be due by <b>January 15th, 2013</b>, via the emails provided.
                        </p>

                        <p>
                            The information you submit will be displayed in the submission gallery until the contest deadline, at which point your final
                            submission (i.e. your 90-second promotional video, written submission, other media, etc.) will be shown instead. We
                            encourage teams to register as early as possible so that they can stake out their idea!
                        </p>

                        <div id="form-message-mobile">
                            <p>
                                To register, please visit this site on a non-mobile device. Email us at <a href="mailto:digitalu@magic.ubc.ca">digitalu@magic.ubc.ca</a>
                                if you have any questions or concerns!
                            </p>
                        </div>

                        <div class="divider"></div>

                        <div class="row form-wrapper">
                            <h2 class="pixel">Registration Form</h2>
                            <form id="registration-form" class="form-horizontal">

                                <div class="control-group">
                                    <label class="control-label" for="projectName">Project Title</label>
                                    <div class="controls">
                                        <input type="text" id="projectName" name="projectName" placeholder="Title">
                                    </div>
                                </div>

                                <div class="member-group-wrapper">
                                    <div class="control-group member-group">
                                        <label class="control-label" for="member-controls">Team member #1</label>
                                        <div class="controls member-controls">
                                            <div class="member-name-wrapper">
                                                <input type="text" class="input-name" name="inputName-1" placeholder="Name">
                                            </div>

                                            <div class="member-email-wrapper">
                                                <input type="text" class="input-email" name="inputEmail-1" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="add-member">
                                    <a href="">+ Add another member</a>
                                    <input id="num-members" type="hidden" value="1">
                                </div>

                                <div class="control-group proposal-group">
                                    <label class="control-label" for="inputDescription">Project proposal</label>

                                    <div class="controls">
                                        <textarea id="inputDescription" rows="3"></textarea>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                        
 <span class="help-block">Submit a brief draft <b>(around 300 words)</b> of your idea. This will be published in the gallery of entries, so any changes you want to make after submitting the form will have to be done by emailing us at <a href="mailto:digitalu@magic.ubc.ca">digitalu@magic.ubc.ca</a>.</span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputQuestions">Questions or requests</label>

                                    <div class="controls">
                                        <textarea id="inputQuestions" name="inputQuestions" rows="3"></textarea>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                    
 <span class="help-block"><b>(Optional)</b> Let us know if you have any particular needs for your project.</span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label class="checkbox" id="disclaimer">
                                            <input name="disclaimerBox" type="checkbox">
                                            All team members have read and agree to all of the contest rules and regulations.
                                            We are aware that the Digital*U contest is only open to those affiliated with UBC in some way,
                                            and teams containing individuals not associated with UBC will be disqualified
                                            (unless given explicit permission by the judging committee). </label>
                                    </div>
                                </div>

                                <div class="control-group  form-buttons">

                                    <div class="controls">

                                        <button onclick="javascript:if(confirm('Are you sure you want to start over?')) { return true; } else return false;"type="reset" id="reset" class="btn btn-large">
                                            Start Over
                                        </button>
                                        <button id="submit" type="submit" class="btn btn-large btn-success">
                                            Submit <i class="icon-ok icon-white"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <div class="sponsor-logos">
            <a href="http://www.wavefrontac.com/"><img src="img/wavefront_logo.png" id="wavefront-logo"/></a>
            <br />
            <a href="http://www.it.ubc.ca/"><img src="img/it_logo.png" id="it-logo"/></a>
            <br />
            <a href="http://magic.ubc.ca/"><img src="img/MAGIClogo.png" id="magic-logo"/></a>
        </div>
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

        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="js/common.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
