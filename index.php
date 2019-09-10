<?php
/*
+------------------------------------------------
|   BitTorrent Tracker PHP
|   =============================================
|   by Cod3r
|   (c) 2015 - 2016 torrentstrike.net
|   http://torrentstrike.net
|   =============================================
|   Licence Info: GPL
+------------------------------------------------
*/
ob_start("ob_gzhandler");

require_once "include/bittorrent.php";
require_once "include/user_functions.php";
require_once "pollsindex.php";
dbconn(true);
loggedinorreturn();

    $lang = array_merge( load_language('global'), load_language('index') );
    //$lang = ;
    $HTMLOUT = '';
    if ($CURUSER) {
    $cache_newuser = "./cache/newuser.txt";
    $cache_newuser_life = 2 * 60 ; //2 min
    if (file_exists($cache_newuser) && is_array(unserialize(file_get_contents($cache_newuser))) && (time() - filemtime($cache_newuser)) < $cache_newuser_life)
    $arr = unserialize(@file_get_contents($cache_newuser));
    else {
    $r_new = mysql_query("select id , username FROM users order by id desc limit 1 ") or sqlerr(__FILE__, __LINE__);
    $arr = mysql_fetch_assoc($r_new);
    $handle = fopen($cache_newuser, "w+");
    fwrite($handle, serialize($arr));
    fclose($handle);
    }
    $new_user = "&nbsp;<a href=\"{$TBDEV['baseurl']}/userdetails.php?id={$arr["id"]}\">" . htmlspecialchars($arr["username"]) . "</a>\n";
    }
    /*
    $a = @mysql_fetch_assoc(@mysql_query("SELECT id,username FROM users WHERE status='confirmed' ORDER BY id DESC LIMIT 1")) or die(mysql_error());
    if ($CURUSER)
                  $latestuser = "<a href='userdetails.php?id=" . $a["id"] . "'>" . $a["username"] . "</a>";
                  else
                  $latestuser = $a['username'];
    */

  if( file_exists( ROOT_PATH.'/cache/stats.php' ) ){
    require ROOT_PATH.'/cache/stats.php';
    $stats = unserialize( stripslashes($stats) );
    }else{
    $stats = array ( 'seeders' => 0, 'leechers' => 0, 'usercnt' => 0, 'torrentcnt' => 0, 'peers' => 0, 'perc' => 0.00 );
}
   if ($CURUSER['show_shout'] === "yes") {
   $commandbutton = '';
   $refreshbutton = '';
   $smilebutton = '';
   $custombutton = '';
   if(get_smile() != '0')
   $custombutton .="<span style='float:right;'><a href=\"javascript:PopCustomSmiles('shbox','shbox_text')\">{$lang['index_shoutbox_csmilies']}</a></span>";
   if ($CURUSER['class'] >= UC_ADMINISTRATOR){
   $commandbutton = "<span style='float:right;'><a href=\"javascript:popUp('shoutbox_commands.php')\">{$lang['index_shoutbox_commands']}</a></span>\n";}
   $refreshbutton = "<span style='float:right;'><a href='shoutbox.php' target='sbox'>{$lang['index_shoutbox_refresh']}</a></span>\n";
   $smilebutton = "<span style='float:right;'><a href=\"javascript:PopMoreSmiles('shbox','shbox_text')\">{$lang['index_shoutbox_smilies']}</a></span>\n";
   $HTMLOUT .= "<form action='shoutbox.php' method='get' target='sbox' name='shbox' onsubmit='mysubmit()'>
   <div class='cblock'>
   <div class='cblock-header'>{$lang['index_shout']}</div>
   <div class='cblock-lb'>{$lang['index_shout']}</div>
   <br />
   <div class='roundedCorners' style='text-align:left;border:1px solid black;padding:5px;'>
   <div style='background:transparent;height:25px;'><span style='font-weight:bold;font-size:12pt;'>{$lang['index_shout']}</span></div>
   <br />
   <b>{$lang['index_shoutbox']}</b> [ <a href='shoutbox.php?show_shout=1&show=no'><b>{$lang['index_shoutbox_close']}</b></a> ]
   <iframe src='shoutbox.php' width='100%' height='200' frameborder='0' name='sbox' marginwidth='0' marginheight='0'></iframe>
   <br />
   <br />
   <script type=\"text/javascript\" src=\"scripts/shout.js\"></script>    
   <div align='center'>
   <b>{$lang['index_shoutbox_shout']}</b>
   <input type='text' maxlength='180' name='shbox_text' size='100' />
   <input class='button' type='submit' value='{$lang['index_shoutbox_send']}' />
   <input type='hidden' name='sent' value='yes' />
   <br />
    <a href=\"javascript:SmileIT(':-)','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/smile1.gif' alt='Smile' title='Smile' /></a> 
   <a href=\"javascript:SmileIT(':smile:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/smile2.gif' alt='Smiling' title='Smiling' /></a> 
   <a href=\"javascript:SmileIT(':-D','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/grin.gif' alt='Grin' title='Grin' /></a> 
   <a href=\"javascript:SmileIT(':lol:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/laugh.gif' alt='Laughing' title='Laughing' /></a> 
   <a href=\"javascript:SmileIT(':w00t:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/w00t.gif' alt='W00t' title='W00t' /></a> 
   <a href=\"javascript:SmileIT(';-)','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/wink.gif' alt='Wink' title='Wink' /></a> 
   <a href=\"javascript:SmileIT(':devil:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/devil.gif' alt='Devil' title='Devil' /></a> 
   <a href=\"javascript:SmileIT(':yawn:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/yawn.gif' alt='Yawn' title='Yawn' /></a> 
   <a href=\"javascript:SmileIT(':-/','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/confused.gif' alt='Confused' title='Confused' /></a> 
   <a href=\"javascript:SmileIT(')','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/clown.gif' alt='Clown' title='Clown' /></a> 
   <a href=\"javascript:SmileIT(':innocent:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/innocent.gif' alt='Innocent' title='innocent' /></a> 
   <a href=\"javascript:SmileIT(':whistle:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/whistle.gif' alt='Whistle' title='Whistle' /></a> 
   <a href=\"javascript:SmileIT(':unsure:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/unsure.gif' alt='Unsure' title='Unsure' /></a> 
   <a href=\"javascript:SmileIT(':blush:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/blush.gif' alt='Blush' title='Blush' /></a> 
   <a href=\"javascript:SmileIT(':hmm:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/hmm.gif' alt='Hmm' title='Hmm' /></a> 
   <a href=\"javascript:SmileIT(':hmmm:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/hmmm.gif' alt='Hmmm' title='Hmmm' /></a> 
   <a href=\"javascript:SmileIT(':huh:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/huh.gif' alt='Huh' title='Huh' /></a> 
   <a href=\"javascript:SmileIT(':look:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/look.gif' alt='Look' title='Look' /></a> 
   <a href=\"javascript:SmileIT(':rolleyes:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/rolleyes.gif' alt='Roll Eyes' title='Roll Eyes' /></a> 
   <a href=\"javascript:SmileIT(':kiss:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/kiss.gif' alt='Kiss' title='Kiss' /></a> 
   <a href=\"javascript:SmileIT(':blink:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/blink.gif' alt='Blink' title='Blink' /></a> 
   <a href=\"javascript:SmileIT(':baby:','shbox','shbox_text')\"><img border='0' src='{$TBDEV['pic_base_url']}smilies/baby.gif' alt='Baby' title='Baby' /></a><br/>
    <br />    
    </div>
    <div style='background:#ffffff;height:25px;'><span style='font-weight:bold;font-size:8pt;'>{$refreshbutton}</span><span style='font-weight:bold;font-size:8pt;'>{$smilebutton}</span><span style='font-weight:bold;font-size:8pt;float:right'>{$custombutton}</span></div>
    </div>
    </div>
   </form><br />\n";
   }
   if ($CURUSER['show_shout'] === "no") {
   $HTMLOUT .="<div class='roundedCorners' style='text-align:left;border:1px solid black;padding:5px;'><div style='background:transparent;height:25px;'><b>{$lang['index_shoutbox']} </b>[ <a href='{$TBDEV['baseurl']}/shoutbox.php?show_shout=1&show=yes'><b>{$lang['index_shoutbox_open']} ]</b></a></div></div><br />";
}
    $adminbutton = '';
    if (get_user_class() >= UC_ADMINISTRATOR)
          $adminbutton = "&nbsp;<span style='float:left;'><a href='admin.php?action=news'>News page</a></span>\n";

    $HTMLOUT .= "<div class='cblock'>
                 <div class='cblock-header'>{$lang['news_title']}</div>
                 <div class='cblock-lb'>{$adminbutton}</div>
                 <div class='cblock-content'>";

    $res = mysql_query("SELECT * FROM news WHERE added + ( 3600 *24 *45 ) > ".TIME_NOW." ORDER BY added DESC LIMIT 10") or sqlerr(__FILE__, __LINE__);
					
    if (mysql_num_rows($res) > 0){
      require_once "include/bbcode_functions.php";
      $button = "";
      while($array = mysql_fetch_assoc($res)){
        $HTMLOUT .= "<div class='newsblock'>";
        if (get_user_class() >= UC_ADMINISTRATOR){
          $button = "<div class='fright'><a href='admin.php?action=news&amp;mode=edit&amp;newsid={$array['id']}'>{$lang['news_edit']}</a>&nbsp;/&nbsp;<a href='admin.php?action=news&amp;mode=delete&amp;newsid={$array['id']}'>{$lang['news_delete']}</a></div>";
}
        $HTMLOUT .= "<div class='newsheader'><span>".htmlsafechars($array['headline'])."</span></div>\n";
        $HTMLOUT .= "<div class='newscont'>";
        $HTMLOUT .= "<span class='dateadded'>".get_date( $array['added'],'DATE') . "</span>{$button}\n";
        $HTMLOUT .= "<div class='newsbody'>".format_comment($array['body'])."</div>\n";
        $HTMLOUT .= "</div>";
        $HTMLOUT .= "</div>";
        }

}
    $HTMLOUT .= "</div></div>\n";
    $HTMLOUT .= "<div class='cblock'>
                 <div class='cblock-header'>{$lang['index_newuser']}</div>
                 <div class='cblock-lb'>{$lang['index_newuserwelcome']}</div>
                 <br /><font class='small'>Welcome to our newest member, <b>$new_user</b>!</font></div><br />\n";
      $active3 ="";
      $file = "./cache/active.txt";
      $expire = 30; // 30 seconds
      if (file_exists($file) && filemtime($file) > (time() - $expire)) {
      $active3 = unserialize(file_get_contents($file));
      } else {
      $dt = sqlesc(time() - 180);
      $active1 = mysql_query("SELECT id, username, class, warned, chatpost,  enabled, donor, added FROM users WHERE last_access >= $dt ORDER BY class DESC") or sqlerr(__FILE__, __LINE__);
       while ($active2 = mysql_fetch_assoc($active1)) {
      $active3[] = $active2;
}
      $OUTPUT = serialize($active3);
      $fp = fopen($file, "w");
      fputs($fp, $OUTPUT);
      fclose($fp);
      }
      $activeusers = '';
      if (is_array($active3))
      foreach ($active3 as $arr) {
      if ($activeusers) $activeusers .= ",\n";
      $activeusers .= format_username($arr); 
}
      if (!$activeusers)
      $activeusers = "{$lang['index_noactive']}";
      $HTMLOUT .= "   <div class='cblock'>
                      <div class='cblock-header'>{$lang['index_active']}</div>
                      <div class='cblock-lb'>{$lang['index_mostonline']}</div>
                      <br />
                      <div class='roundedCorners' style='text-align:left;border:1px solid black;padding:5px;'>
                      <div style='background:transparent;height:25px;'><center><b>&nbsp;&nbsp;<font color=#8E35EF>User</font>&nbsp;&nbsp;|&nbsp;&nbsp;<font color=#f9a200>Power User</font>&nbsp;&nbsp;|&nbsp;&nbsp;<font color=#009F00>VIP</font>&nbsp;&nbsp;|&nbsp;&nbsp;<font color=#2554C7>Uploader</font>&nbsp;&nbsp;|&nbsp;&nbsp;<font color=#FE2E2E>Moderator</font>&nbsp;&nbsp;|&nbsp;&nbsp;<font color=#B000B0>Administrator</font>&nbsp;&nbsp;|&nbsp;&nbsp;<font color=#FF0000>Sysop</font>&nbsp;&nbsp;&nbsp;&nbsp;</b></center>  <span style='font-weight:bold;font-size:12pt;'>{$lang['index_activetoday']}</span></div><br />
	                  <table border='1' cellpadding='10' cellspacing='0' width='100%'>
		              <tr class='table'><td class='text'>{$activeusers}&nbsp;</td></tr></table></div><br />\n";

      $HTMLOUT .= parse_poll(); 
      $HTMLOUT .= "
                 <div class='cblock'>
                     <div class='cblock-header'>{$lang['stats_title']}</div>
                     <div class='cblock-lb'></div>
                     <div class='cblock-content'>
                         <table class='main' border='1' cellspacing='0' cellpadding='10'>
                               <tr><td class='rowhead'>{$lang['stats_regusers']}</td><td align='right'>{$stats['usercnt']}</td></tr>
                               <tr><td class='rowhead'>{$lang['stats_torrents']}</td><td align='right'>{$stats['torrentcnt']}</td></tr>";

    if (isset($stats['peers']))
    {
      $HTMLOUT .= "            <tr><td class='rowhead'>{$lang['stats_peers']}</td><td align='right'>{$stats['peers']}</td></tr>
                               <tr><td class='rowhead'>{$lang['stats_seed']}</td><td align='right'>{$stats['seeders']}</td></tr>
                               <tr><td class='rowhead'>{$lang['stats_leech']}</td><td align='right'>{$stats['leechers']}</td></tr>
                               <tr><td class='rowhead'>{$lang['stats_sl_ratio']}</td><td align='right'>{$stats['perc']}</td></tr>";
    }

      $HTMLOUT .= "</table></div></div>";
      $HTMLOUT .= "<div class='clear'>&nbsp;</div>";
      $HTMLOUT .= sprintf("<p class='small'>{$lang['foot_disclaimer']}</p>", $TBDEV['site_name']);

    print stdhead('Home') . $HTMLOUT . stdfoot();
?>