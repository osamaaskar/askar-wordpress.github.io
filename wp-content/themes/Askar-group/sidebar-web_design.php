<?php

    //Get All Comments Of Certain Category
    $comments_argu = array(
        'status' =>'approve' //Get Only Approved Comments
        
    );

    $comments_count =0; //Comments Start From 0

    $all_comments =get_comments($comments_argu); //Get All Comments

    foreach($all_comments as $comments){ //Loop Throw All Comments
        
        $post_id = $comments->$comment_post_ID; //Get Post Id Of The Comment
        
        if(! in_category('Web Design' , $post_id)){ //Check If Post Not In Category
            
            continue; //Continue Loop
        }
        $comments_count++; //Counter
        
    }

    //Get The Posts Count Of Category

    $cat =get_queried_object(); //Return All Thing About Category(id.name ,coun,........)
    $posts_count =$cat->count; //Count Of Posts In Category
    
?>

<div class="web-sidebar">
    <div class="widget">
        <h3 class="widget-title"><?php single_cat_title() ?> Statistics</h3>
        <div class="widget-content">
            <ul class="list-unstyled">
                <li>
                    <span>Comments Count</span>: <?php echo $comments_count ?>
                </li>
                <li>
                    <span>Posts Count</span>: <?php echo($posts_count) ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="web-sidebar">
    <div class="widget">
        <h3 class="widget-title">Latest Web Develop Posts</h3>
        <div class="widget-content">
            <ul class="list-unstyled">
                
                <?php 
                    // Latest Posts Of Certain Category
    
                    $posts_argu= array(
                               'posts_per_page'=>5 ,    //Posts That Will Apper
                               'cat'=>23                //Category Id That Posts Will Apper
                    );
            
                $query = new WP_Query($posts_argu);
            
                if($query->have_posts()) {
                    
                        while ($query->have_posts())
                        {
                           $query ->the_post();
                            
                            ?>
                            
                            <li>
                                <a target="_blank" href="<?php the_permalink(); ?>"> <?php the_title() ?> </a> 
                            </li>
                <?php
                        }
                 wp_reset_postdata();
                    }
                
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="web-sidebar">
    <div class="widget">
        <h3 class="widget-title">Hot Post By Comments</h3>
        <div class="widget-content">
            <ul class="list-unstyled">
                
                <?php 
                    // Latest Posts Of Certain Category
    
                    $hot_posts_argu= array(
                               'posts_per_page' =>1 ,   //Heighst Post That Take Most Comments In All Site (Not In Certain Category)
                                'orderby'       =>'comment_count'
                                             
                    );
            
                $hot_query = new WP_Query($hot_posts_argu);
            
                if($hot_query ->have_posts()) {
                    
                        while ($hot_query ->have_posts())
                        {
                           $hot_query  ->the_post();
                            
                            ?>
                            
                            <li>
                                <a target="_blank" href="<?php the_permalink(); ?>"> <?php the_title() ?> </a> 
                                <hr>
                                This Post Has :
                                <?php comments_popup_link("0 Comment","1 Comment","% Comments","comment-url","Comments Disabled") ?>
                            </li>
                <?php
                        }
                 wp_reset_postdata();
                    }
                
                ?>
            </ul>
        </div>
    </div>
</div>























