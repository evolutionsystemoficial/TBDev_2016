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
    define('IN_TBDEV_ADMIN', TRUE);

    require_once "include/bittorrent.php";
    require_once "include/user_functions.php";

    dbconn(false);

    loggedinorreturn();
    
    $lang = array_merge( load_language('global'), load_language('admin') );
  
    if ($CURUSER['class'] < UC_MODERATOR)
      stderr("{$lang['admin_user_error']}", "{$lang['admin_unexpected']}");

  
    $action = isset($_GET["action"]) ? $_GET["action"] : '';
    $forum_pic_url = $TBDEV['pic_base_url'] . 'forumicons/';
  
    define( 'F_IMAGES', $TBDEV['pic_base_url'] . 'forumicons');
    define( 'POST_ICONS', F_IMAGES.'/post_icons');
    
    $ad_actions = array('bans'            => 'bans', 
                        'adduser'         => 'adduser', 
                        'stats'           => 'stats', 
                        'delacct'         => 'delacct', 
                        'testip'          => 'testip', 
                        'usersearch'      => 'usersearch', 
                        'mysql_overview'  => 'mysql_overview', 
                        'mysql_stats'     => 'mysql_stats', 
                        'categories'      => 'categories', 
                        'newusers'        => 'newusers', 
                        'resetpassword'   => 'resetpassword',
                        //'docleanup'     => 'docleanup',
                        'shistory'        => 'shistory',
                        'polls_manager'   => 'polls_manager',  
                        'log'             => 'log',
                        'news'            => 'news',
                        'forummanage'     => 'forummanage',
                        'rules'           => 'rules',
                        'cleanup_manager' => 'cleanup_manager',
                        'themes'          => 'themes',
                        'forummanager'    => 'forummanager',
                        'moforums'        => 'moforums',
                        'msubforums'      => 'msubforums',
                        );
    
    if( in_array($action, $ad_actions) AND file_exists( "admin/{$ad_actions[ $action ]}.php" ) )
    {
      require_once "admin/{$ad_actions[ $action ]}.php";
    }
    else
    {
      require_once "admin/index.php";
    }
    
?>