<?php
/*
+------------------------------------------------
|   TBDev.net BitTorrent Tracker PHP
|   =============================================
|   by Cod3r
|   (c) 2010 - 2016 torrentstrike.net/
|   http://www.tbdev.net
|   =============================================
|   svn: http://sourceforge.net/projects/tbdevnet/
|   Licence Info: GPL
+------------------------------------------------
|   $Date$
|   $Revision$
|   $Author$
|   $URL$
+------------------------------------------------
*/
require_once "include/bittorrent.php";
require_once "include/user_functions.php";
dbconn();
loggedinorreturn();
$lang = array_merge( load_language('global'), load_language('mybonus') );    
$HTMLOUT =''; 
                function I_smell_a_rat($var){
                       if ((0 + $var) == 1)
                                $var = 0 + $var;
                                else
                        stderr("Error", "I smell a rat!");
}
                                $bonus = htmlspecialchars($CURUSER['seedbonus'], 1);
                      switch (true){
                        case ($_GET['up_success']):
                             I_smell_a_rat($_GET['up_success']);
                             $amt = (int)$_GET['amt'];
                     switch ($amt) {
                       case $amt == 75.0:
                            $amt = '1 GB';
                     break;
                      case $amt == 150.0:
                           $amt = '2.5 GB';
                     break;
                   default:
                          $amt = '5 GB';
}
                  
                          $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr><tr>'.'<td class="colhead" align="left"><img src=pic/smilies/karma.gif alt=good_karma></td>'.'<td class="colhead" align="left"><b>Congratulations ! </b>'.$CURUSER['username'].' you have just increased your upload amount !'.' <img src=pic/smilies/w00t.gif alt=w00t><br /><br /><br /><br /> click to go back to your '.'<a class=altlink href=mybonus.php>Karma Bonus Point</a> page.<br /><br /></td></tr></table>';
                  print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                        die;
                       case ($_GET['class_success']):
                             I_smell_a_rat($_GET['class_success']);
                     stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                             $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr>'.'<tr><td class="colhead" align="left"><img src=pic/smilies/karma.gif alt=good_karma></td><td class="colhead" align="left">'.'<b>Congratulations! </b>'.$CURUSER['username'].' you have got yourself VIP Status for one month ! <img src=pic/smilies/w00t.gif alt=w00t><br />'.'<br /> Click to go back to your <a class=altlink href=mybonus.php>Karma Points</a> page.<br /><br /></td></tr></table>';
                    print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                          die;
                         case ($_GET['smile_success']):
                              I_smell_a_rat($_GET['smile_success']);
                      stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                              $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr>'.'<tr><td class="colhead" align="left"><img src=pic/smilies/karma.gif alt=good_karma></td><td class="colhead" align="left">'.'<b>Congratulations! </b>'.$CURUSER['username'].' you have got yourself a set of custom smilies for one month ! <img src=pic/smilies/w00t.gif alt=w00t><br />'.'<br /> Click to go back to your <a class=altlink href=mybonus.php>Karma Points</a> page.<br /><br /></td></tr></table>';
                     print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                           die;
                           case ($_GET['warning_success']):
                                 I_smell_a_rat($_GET['warning_success']);
                        stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                                $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr>'.'<tr><td class="colhead" align="left"><img src=pic/smilies/karma.gif alt=good_karma></td><td class="colhead" align="left">'.'<b>Congratulations! </b>'.$CURUSER['username'].' you have removed your warning for the low price of 5000 points!! <img src=pic/smilies/w00t.gif alt=w00t><br />'.'<br /> Click to go back to your <a class=altlink href=mybonus.php>Karma Points</a> page.<br /><br /></td></tr></table>';
                      print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                            die;
                           case ($_GET['invite_success']):
                                I_smell_a_rat($_GET['invite_success']);
                      stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                               $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr><tr><td class="colhead" align="left">'.'<img src=pic/smilies/karma.gif alt=good_karma></td><td class="colhead" align="left">'.'<b>Congratulations! </b>'.$CURUSER['username'].' you have got your self 3 new invites! <img src=pic/w00t.gif alt=w00t><br /><br />'.' click to go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.<br /><br /></td></tr></table>';
                      print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                            die;
                           case ($_GET['title_success']):
                                 I_smell_a_rat($_GET['title_success']);
                         stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                                 $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr><tr>'.'<td class="colhead" align="left"><img src=pic/smilies/karma.gif alt=good_karma></td><td class="colhead" align="left">'.'<b>Congratulations! </b>'.$CURUSER['username'].' you are now known as <b>'.$CURUSER['title'].'</b> ! <img src=pic/w00t.gif alt=w00t><br />'.'<br /> click to go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.<br /><br /></td></tr></table>';
                         print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                               die;
                              case ($_GET['ratio_success']):
                                    I_smell_a_rat($_GET['ratio_success']);
                           stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                                   $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr><tr>'.'<td class="colhead" align="left"><img src=pic/smilies/karma.gif alt=good_karma></td><td class="colhead" align="left"><b>Congratulations! </b> '.$CURUSER['username'].' you'.' have gained a 1 to 1 ratio on the selected torrent, and the difference in MB has been added to your total upload! <img src=pic/w00t.gif alt=w00t><br />'.'<br /> click to go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.<br /><br />'.'</td></tr></table>';
                         print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                               die;
                              case ($_GET['gift_fail']):
                                   I_smell_a_rat($_GET['gift_fail']);
                           stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                                   $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Huh?</h1></td></tr><tr><td class="colhead" align="left">'.'<img src=pic/smilies/dwarf.gif alt=good_karma></td><td class="colhead" align="left"><b>Not so fast there Mr. fancy pants!</b><br />'.'<b>'.$CURUSER['username'].'...</b> you can not spread the karma to yourself...<br />If you want to spread the love, pick another user! <br />'.'<br /> click to go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.<br /><br /></td></tr></table>';
                          print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                                die;
                               case ($_GET['gift_fail_user']):
                                    I_smell_a_rat($_GET['gift_fail_user']);
                           stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                                   $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Error</h1></td></tr><tr><td class="colhead" align="left">'.'<img src=pic/smilies/dwarf.gif alt=good_karma></td><td class="colhead" align="left"><b>Sorry '.$CURUSER['username'].'...</b>'.'<br /> No User with that username <br /><br /> click to go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.'.'<br /><br /></td></tr></table>';
                         print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                               die;
                              case ($_GET['gift_fail_points']):
                                   I_smell_a_rat($_GET['gift_fail_points']);
                            stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                                    $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>OUPS!</h1></td></tr><tr><td class="colhead" align="left">'.'<img src=pic/smilies/cry.gif alt=oups></td><td class="colhead" align="left"><b>Sorry </b>'.$CURUSER['username'].' you don\'t have enough Karma points'.'<br /> go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.<br /><br /></td></tr></table>';
                           print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                                  die;
                                 case ($_GET['gift_success']):
                                       I_smell_a_rat($_GET['gift_success']);
                               stdhead($CURUSER['username'] . "'s Karma Bonus Page");
                                       $HTMLOUT .='<table width="80%"><tr><td class="colhead" align="left" colspan="2"><h1>Success !</h1></td></tr><tr><td class="colhead" align="left">'.'<img src=pic/smilies/karma.gif alt=good_karma></td><td class="colhead" align="left"><b>Congratulations! '.$CURUSER['username'].' </b>'.'you have spread the Karma well.<br /><br />Member <b>'.htmlspecialchars($_GET['usernamegift']).'</b> will be pleased with your kindness!<br /><br />This is the message that was sent:<br />'.'<b>Subject:</b> Someone Loves you!<br /> <p>You have been given a gift of <b>'.(0 + $_GET['gift_amount_points']).'</b> Karma points by '.$CURUSER['username'].'</p><br />'.'You may also <a class=altlink href=sendmessage.php?receiver='.(0 + $_GET['gift_id']).'>send '.htmlspecialchars($_GET['usernamegift']).' a message as well</a>, or go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.<br /><br /></td></tr></table>';
                             print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
                                   die;
}
                           if ($_GET['exchange']){
                               I_smell_a_rat($_GET['exchange']);
                               $userid = 0 + $CURUSER['id'];
                           if (!is_valid_id($userid))
                               stderr("Error", "That is not your user ID!");
                                $option = 0 + $_POST['option'];
                                $res_points = mysql_query("SELECT * FROM bonus WHERE id =" . sqlesc($option));
                                $arr_points = mysql_fetch_assoc($res_points);
                                $art = $arr_points['art'];
                                $points = $arr_points['points'];
                            if ($points == 0)
                                stderr("Error", "I smell a rat!");
                                $seedbonus = htmlspecialchars($bonus-$points,1);
                                $upload = $CURUSER['uploaded'];
                                $bonuscomment = $CURUSER['bonuscomment'];
                                $bpoints = $CURUSER['seedbonus'];
                            if ($bonus < $points)
                                stderr("Sorry", "you do not have enough Karma points!");
                        switch ($art){
                          case 'traffic':
                                $up = $upload + $arr_points['menge'];
                                $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points for upload bonus.\n " .$bonuscomment;
                                mysql_query("UPDATE users SET uploaded = $upload + $arr_points[menge], seedbonus = '$seedbonus', bonuscomment = '$bonuscomment' WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?up_success=1&amt=$points");
                           die;
                         break;
                          case 'ratio':
                                $torrent_number = 0 + $_POST['torrent_id'];
                                $res_snatched = mysql_query("SELECT s.uploaded, s.downloaded, t.name FROM snatched AS s LEFT JOIN torrents AS t ON t.id = s.torrentid WHERE s.userid = '$userid' AND torrentid = ".sqlesc($torrent_number)." LIMIT 1") or sqlerr(__FILE__, __LINE__);
                                $arr_snatched = mysql_fetch_assoc($res_snatched);
                            if ($arr_snatched['name'] == '')
                                stderr("Error", "No torrent with that ID!<br />Back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.");
                            if ($arr_snatched['uploaded'] >= $arr_snatched['downloaded'])
                                stderr("Error", "Your ratio on that torrent is fine, you must have selected the wrong torrent ID.<br />Back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page.");
                                mysql_query("UPDATE snatched SET uploaded = '$arr_snatched[downloaded]' WHERE userid = '$userid' AND torrentid = ".sqlesc($torrent_number)) or sqlerr(__FILE__, __LINE__);
                                $difference = $arr_snatched['downloaded'] - $arr_snatched['uploaded'];
                                $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points for 1 to 1 ratio on torrent: ".$arr_snatched['name']." ".$torrent_number.", ".$difference." added .\n " .$bonuscomment;
                                mysql_query("UPDATE users SET uploaded = $upload + $difference, bonuscomment = '$bonuscomment', seedbonus = '$seedbonus' WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?ratio_success=1");
                            die;
                          break;
                           case 'class':
                             if ($CURUSER['class'] > UC_VIP)
                                 stderr("Error", "Now why would you want to lower yourself to VIP?<br />go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page and think that one over.");
                                 $vip_until = get_date_time(gmtime() + 28*86400);
                                 $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points for 1 month VIP Status.\n " .$bonuscomment;
                                 mysql_query("UPDATE users SET class = ".UC_VIP.", vip_added = 'yes', vip_until = '$vip_until', seedbonus = '$seedbonus' WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                 header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?class_success=1");
                            die;
                           break;
                            case 'warning':
                              if ($CURUSER['warned'] == 'no')
                                  stderr("Error", "How can we remove a warning that isn't there?<br />go back to your <a class=altlink href=mybonus.php>Karma Bonus Point</a> page and think that one over.");
                                  $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points for removing warning.\n " .$bonuscomment;
                                  $res_warning = mysql_query("SELECT modcomment FROM users WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                  $modcomment = htmlspecialchars($arr['modcomment']);
                                  $modcomment = gmdate("Y-m-d") . " - warning removed by -Bribe with Karma.\n". $modcomment;
                                  $modcom = sqlesc($modcomment);
                                  mysql_query("UPDATE users SET warned = 'no', warneduntil = '0000-00-00 00:00:00', seedbonus = '$seedbonus', bonuscomment = '$bonuscomment', modcomment = $modcom WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                  $dt = sqlesc(get_date_time());
                                  $subject = sqlesc("Warning removed by Karma.");
                                  $msg = sqlesc("Your warning has been removed by the big Karma payoff... Please keep on your best behaviour from now on.\n");
                                  mysql_query("INSERT INTO messages (sender, receiver, added, msg, subject) VALUES(0, $userid, $dt, $msg, $subject)") or sqlerr(__FILE__, __LINE__);
                                  header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?warning_success=1");
                              die;
                             break;
                              case 'smile':
                                   $smile_until = get_date_time(gmtime() + 28*86400);
                                   $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points for 1 month of custom smilies.\n " .$bonuscomment;
                                   mysql_query("UPDATE users SET smile_until = '$smile_until', seedbonus = '$seedbonus' WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                   header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?smile_success=1");
                               die;
                             break;
                              case 'invite':
                                   $invites = $CURUSER['invites'];
                                   $inv = $invites+$arr_points['menge'];
                                   $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points for invites.\n " .$bonuscomment;
                                   mysql_query("UPDATE users SET invites = '$inv', seedbonus = '$seedbonus' WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                   header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?invite_success=1");
                               die;
                             break;
                              case 'title':
                                   $title = sqlesc(htmlentities($_POST['title']));
                                   $words = array('fuck', 'shit', 'Moderator', 'Administrator', 'Admin', 'pussy', 'Sysop', 'cunt', 'nigger', 'VIP', 'Super User', 'Power User', 'ADMIN', 'SYSOP', 'MODERATOR', 'ADMINISTRATOR');
                                   $title = str_replace($words, "I just wasted my karma", $title);
                                   $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points for custom title. old title was $CURUSER[title] new title is $title\n " .$bonuscomment;
                                   mysql_query("UPDATE users SET title = $title, seedbonus = '$seedbonus' WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
                                   header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?title_success=1");
                               die;
                             break;
                              case 'gift_1':
                                    $points = 0 + $_POST['bonusgift'];
                                    $usernamegift = htmlentities(trim($_POST['username']));
                                    $res = mysql_query("SELECT id,seedbonus,bonuscomment,username FROM users WHERE username=" . sqlesc($usernamegift));
                                    $arr = mysql_fetch_assoc($res);
                                    $useridgift = $arr['id'];
                                    $userseedbonus = $arr['seedbonus'];
                                    $bonuscomment_gift = $arr['bonuscomment'];
                                    $usernamegift = $arr['username'];
                                    $check_me = array(100,200,300,400,500,5000);
                                if (!in_array($points, $check_me))
                                    stderr("Error", "I smell a rat!");
                                if($bonus >= $points){
                                   $points= htmlspecialchars($points,1);
                                   $bonuscomment = gmdate("Y-m-d") . " - " .$points. " Points as gift to $usernamegift .\n " .$bonuscomment;
                                   $bonuscomment_gift = gmdate("Y-m-d") . " - recieved " .$points. " Points as gift from $CURUSER[username] .\n " .$bonuscomment_gift;
                                   $seedbonus = $bonus-$points;
                                   $giftbonus1 = $userseedbonus+$points;
                                if ($userid==$useridgift){
                                   header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?gift_fail=1");
                               die;
}
                                if (!$useridgift){
                                     header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?gift_fail_user=1");
                               die;
}
             mysql_query("SELECT bonuscomment,id FROM users WHERE id = '$useridgift'") or sqlerr(__FILE__, __LINE__);
             mysql_query("UPDATE users SET seedbonus = '$seedbonus', bonuscomment = '$bonuscomment' WHERE id = '$userid'") or sqlerr(__FILE__, __LINE__);
             mysql_query("UPDATE users SET seedbonus = '$giftbonus1', bonuscomment = '$bonuscomment_gift' WHERE id = '$useridgift'");
    $subject = sqlesc("Someone Loves you"); 
    $added = sqlesc(get_date_time());
    $msg = sqlesc("You have been given a gift of $points Karma points by ".$CURUSER['username']);
            mysql_query("INSERT INTO messages (sender, subject, receiver, msg, added) VALUES(0, $subject, $useridgift, $msg, $added)") or sqlerr(__FILE__, __LINE__);

                             header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?gift_success=1&gift_amount_points=$points&usernamegift=$usernamegift&gift_id=$useridgift");
                             die;
                             }else{
                             header("Refresh: 0; url={$TBDEV['baseurl']}/mybonus.php?gift_fail_points=1");
                             die;
}
                             break;
                            }
}

                         
                                $HTMLOUT .='<table align=center width="100%"  border="0"  cellspacing="0" cellpadding="5"><tr><td class="colhead" colspan="4">'.'<h1>'.$SITENAME.' Karma Bonus Point system:</h1></td></tr><tr><td align="center" colspan="4"  class="colhead">'.'Exchange your <a class=altlink href=mybonus.php>Karma Bonus Points</a> [ current '.$bonus.' ] for goodies!'.'<br /><br />[ If no buttons appear, you have not earned enough bonus points to trade. ]<br /><br /><tr>'.'<td class="colhead" align="left">Description</td>'.'<td class="colhead" align="center">Points</td><td class="colhead" align="center">Trade</td></tr>';
                                $res = mysql_query("SELECT * FROM bonus ORDER BY id ASC");
                         while ($gets = mysql_fetch_assoc($res)){
                                $count1= (++$count1)%2;
                                $class = 'clearalt'.($count1==0?'6':'7');
                                $otheroption = "<table width='100%'><tr><td class=$class><b>Username:</b><input type=text name=username size=20 maxlength=24></td><td class=$class> <b>to be given: </b><select name=bonusgift> <option value=100.0> 100.0</option> <option value=200.0> 200.0</option> <option value=300.0> 300.0</option> <option value=400.0> 400.0</option><option value=500.0> 500.0</option><option value=5000.0> 5000.0</option></select> Karma points!</td></tr></table>";
                                $otheroption_title = "<input type=text name=title size=30 maxlength=30>";
                                $HTMLOUT .='<form action=mybonus.php?exchange=1 method=post>';
                        switch (true){
                          case ($gets['id'] == 5):
                                $HTMLOUT .='<tr><td class="colhead" align="left" class='.$class.'><h1><font color="#2682ff">'.$gets['bonusname'].'</font></h1>'.$gets['description'].'<br /><br />Enter the <b>Special Title</b> you would like to have '.$otheroption_title.' click Exchange! </td><td class="colhead" align="center" class='.$class.'>'.$gets['points'].'</td>';
                         break;
                         case ($gets['id'] == 7):
                               $HTMLOUT .='<tr><td class="colhead" align="left" class='.$class.'><h1><font color="#2682ff">'.$gets['bonusname'].'</font></h1>'.$gets['description'].'<br /><br />Enter the <b>username</b> of the person you would like to send karma to, and select how many points you want to send and click Exchange!<br />'.$otheroption.'</td><td class="colhead" align="center" class='.$class.'>min.<br />'.$gets['points'].'<br />max.<br />5000</td>';
                        break;
                         case ($gets['id'] == 9):
                               $HTMLOUT .='<tr><td class="colhead" align="left" class='.$class.'><h1><font color="#2682ff">'.$gets['bonusname'].'</font></h1>'.$gets['description'].'</td><td class="colhead" align="center" class='.$class.'>min.<br />'.$gets['points'].'</td>';
                       break;
                        case ($gets['id'] == 10):
                              $HTMLOUT .='<tr><td class="colhead" align="left" class='.$class.'><h1><font color="#2682ff">'.$gets['bonusname'].'</font></h1>'.$gets['description'].'<br /><br />Enter the <b>ID number of the Torrent:</b> <input type=text name=torrent_id size=4 maxlength=8> you would like to buy a 1 to 1 ratio on.</td><td class="colhead" align="center" class='.$class.'>min.<br />'.$gets['points'].'</td>';
                       break;
                     default:
                              $HTMLOUT .='<tr><td class="colhead" align="left" class='.$class.'><h1><font color="#2682ff">'.$gets['bonusname'].'</font></h1>'.$gets['description'].'</td><td class="colhead" align="center" class='.$class.'>'.$gets['points'].'</td>';
}
                              $HTMLOUT .='<input type=hidden name=option value='.$gets['id'].'> <input type=hidden name=art value='.$gets['art'].'>';
                          if($bonus >= $gets['points']) {
                    switch (true){
                      case ($gets['id'] == 7):
                            $HTMLOUT .='<td class="colhead" class='.$class.'><input class=button type=submit name=submit value="Karma Gift!"></form></td>';
                     break;
                   default:
                            $HTMLOUT .='<td class="colhead" class='.$class.'><input class=button type=submit name=submit value="Exchange!"></form></td>';
}
                            }else
                            $HTMLOUT .='<td class="colhead" class='.$class.' align=center><b>more points needed</b></form></td>';
}
                            $HTMLOUT .='</table><br /><br /><br /><table width=100%><tr><td class="colhead"><h1>What the hell are these Karma Bonus points,'.' and how do I get them?</h1></td></tr><tr><td class="colhead">- For every hour that you seed a torrent, you are awarded with 1'.' Karma Bonus Point... <br />If you save up enough of them, you can trade them in for goodies like bonus GB(s) to '.'your upload<br /> stats,getting more invites, or doing the real Karma booster... give them to another user!<br />'.'and yes! this is awarded on a per torrent basis (max of 5) even if there are no leechers on the Torrent you are seeding! <br />'.'<h1>Other things that will get you karma points:</h1><ul><li>uploading a new torrent = 15 points</li><li>'.'uploading a new subtitle = 10 points</li><li>comment on torrent = 3 points</li>'.'<li>saying thanks = 2 points</li><li>making a post = 1 point</li>'.'<li>starting a topic = 1 point</li><li>voting on poll = 1 point</li><li>filling a request = 10 points</li>'.'</ul><h1>Some things that will cost you karma points:</h1><ul>'.'<li>upload credit</li><li>custom title</li>'.'<li>a 1:1 ratio on a torrent</li>'.'<li>buying off your warning</li><li>one month custom smilies for the forums and comments</li>'.'<li>getting extra invites</li><li>giving a gift of karma points to another user</li>'.'<li>asking for a re-seed</li><li>making a request</li></ul><p>But keep in mind that everything that can get'.' you karma can also be lost, <br />ie:if you up a torrent then delete it, you will gain and then lose 10 points, <br />'.'making a post and having it deleted will do the same<br /><br />... and there are other hidden bonus karma points all '.'over the site.<br /><br />Yet another way to help out your ratio! </p><p>*please note, staff can give or take away '.'points for breaking the rules, or doing good for the community.</p></td></tr></table>';
                   print stdhead($CURUSER['username'] . "'s Karma Bonus Points Page") . $HTMLOUT . stdfoot();  
?>
