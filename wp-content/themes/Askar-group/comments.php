<?php

    //check if comments is open or not on this post (may be not allowed)

    if(comments_open()){?>
    <h3 class="comments-count"><?php comments_number('0 Comment','1 Comment','% Comments'); ?></h3>

<?php
        echo"<ul class='list-unstyled comments-list'>";
        
        $Comments_Arguments = array(        //comments arguments
            'max_depth'      => 3,          //comments level
            'type'          =>'comment',    //comments type
            'avatar_size'   => 64,          //Avatar Size
            'reverse_top_level' => 'true'   //new comments in top
            
        );
         wp_list_comments($Comments_Arguments); //List All Comments For This Post
        
        echo"</ul>";
        
        echo "<hr class='comment-separator'>";
        
        // Comment Form

		$comment_from_argument = array(

			'title_reply' 				=> 'Add Your Comment', 			//change Add comment text
			'title_reply_to'    		=> 'Add a Reply to [%s]',		//change Add replay To text
			'class_submit'				=>'btn btn-primary btn-md',		//change sumbit button
			'comment_notes_before'		=> ''
		);

		comment_form($comment_from_argument);
    } else {
         echo " Sorry Comments Aot allowed";
    }
?>