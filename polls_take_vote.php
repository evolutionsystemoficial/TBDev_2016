<?php
require_once "include/bittorrent.php";
require_once "include/user_functions.php";
require_once "include/html_functions.php";

dbconn(true);

loggedinorreturn();

//print_r($_POST);
//print_r($_GET); exit;
    
    
		$poll_id  = isset($_GET['pollid']) ? intval($_GET['pollid']) : false;
		if ( ! is_valid_id($poll_id) )
        stderr('ERROR', 'No poll with that ID');
        
		$vote_cast = array();
		
		$_POST['choice'] = isset($_POST['choice']) ? $_POST['choice'] : array();
		
		//-----------------------------------------
		// Permissions check
		//-----------------------------------------
		/*
		if ( ! $CURUSER['can_vote'] )
		{
			stderr( 'ERROR', 'ya nay alood ta vot' );
		}
		*/
		
   		$query = mysql_query( "SELECT * FROM polls
                            LEFT JOIN poll_voters ON polls.pid = poll_voters.poll_id
                            AND poll_voters.user_id = {$CURUSER['id']} 
                            WHERE pid = ".sqlesc($poll_id) );
      
		
   		
   		
   		if ( ! mysql_num_rows( $query ) == 1 )
   		{
   			stderr( 'ERROR', 'No poll with that ID' );
   		}
   		
      $poll_data = mysql_fetch_assoc( $query);
		
		
		if ( $poll_data['user_id'] )
		{
			stderr( 'ERROR', 'You have already voted!' );
		}
		
		$_POST['nullvote'] = isset($_POST['nullvote']) ? $_POST['nullvote'] : 0;
		
		if ( !$_POST['nullvote'] )
		{
			if ( is_array( $_POST['choice'] ) and count( $_POST['choice'] ) )
			{
				foreach( $_POST['choice'] as $question_id => $choice_id )
				{
					if ( ! $question_id or ! isset($choice_id) )
					{
						continue;
					}
					
					$vote_cast[ $question_id ][] = $choice_id;
				}
			}
			
			foreach( $_POST as $k => $v )
			{
				if( preg_match( "#^choice_(\d+)_(\d+)$#", $k, $matches ) )
				{
					if( $_POST[$k] == 1 )
					{
						$vote_cast[ $matches[1] ][] = $matches[2];
					}
				}
			}
			
			$poll_answers = unserialize( stripslashes( $poll_data['choices'] ) );
        	reset($poll_answers);
        	
      if ( count( $vote_cast ) < count( $poll_answers ) )
			{
				stderr( 'ERROR', 'No vote' );
			}
      
      @mysql_query( "INSERT INTO poll_voters (user_id, ip_address, poll_id, vote_date)
                        VALUES ({$CURUSER['id']},
															 ".sqlesc($CURUSER['ip']).",
															 {$poll_data['pid']},
															 ".time().")" );
					
					if( -1 == mysql_affected_rows() )
              stderr('DBERROR', 'Could not update records');
        	
        	
        	foreach ( $vote_cast as $question_id => $choice_array )
        	{
	        	foreach( $choice_array as $choice_id )
	        	{
	        		$poll_answers[ $question_id ]['votes'][ $choice_id ]++;
	        		
	        		if ( $poll_answers[ $question_id ]['votes'][ $choice_id ] < 1 )
	        		{
	        			$poll_answers[ $question_id ]['votes'][ $choice_id ] = 1;
	        		}
        		}
        	}
        	
        	$poll_data['choices'] = addslashes( serialize( $poll_answers ) );
        	
        	@mysql_query( "UPDATE polls set votes=votes+1, choices='{$poll_data['choices']}'
									WHERE pid={$poll_data['pid']}" );
		
        	if( -1 == mysql_affected_rows() )
              stderr('DBERROR', 'Could not update records');
              
        }
        else
        {
        	@mysql_query("INSERT INTO poll_voters (user_id, ip_address, poll_id, vote_date)
                VALUES
                ({$CURUSER['id']}, ".sqlesc($CURUSER['ip']).", {$poll_data['pid']},
								".time().")"
                );
                
          if( -1 == mysql_affected_rows() )
              stderr('DBERROR', 'Could not update records');
		}
        
header("location: {$TBDEV['baseurl']}/index.php");
?>