
<?php get_header();;?>

<div class="container author-page">
    <h1 class="profile-header text-center"><?php the_author_meta('first_name')//Print First Name OF Author ?> Page</h1>
    <div class="author-main-info">
        <!--------Start Row-------->
        <div class="row">
            <div class="col-md-3">
                <?php 
                    $avatar_arguments = array( //Author Arguments
                        'class'=>'img-responsive img-thumbnail center-block'
                    );
                        echo get_avatar(get_the_author_meta('ID'),196,'','User Avatar',$avatar_arguments); //Avatar Of Author
                ?>
            </div>
            <div class="col-md-9">
                <ul class="author-names list-unstyled">
                    <li>First Name: <?php the_author_meta('first_name')//Print First Name OF Author ?></li>
                    <li>Last Name: <?php the_author_meta('last_name') //Print Last Name Of Author?></li>
                    <li>Nickname: <?php the_author_meta('nickname') //Print Nickname Of Auther?></li>
                </ul>
                <hr>           
                 <?php if(get_the_author_meta('description')){//Check If The Author Have Decription Or Not ?>
                            <p><?php the_author_meta('description');//Print Description Of Auther ?> </p>
                    <?php 

                        } else {

                            echo"No Description Of This Author"; //Print Atention Message If No Description of this user
                    } ?>
            </div>
        </div>
        <!----------End Row------>
    </div>
    <!----------Start Row------>
    <div class="row author-stats">
        <div class="col-md-3">
            <div class="stats post-count">
                Posts Count
                <span>
                    <?php echo count_user_posts(get_the_author_meta('ID')) //Number Of Posts Of The Author ?>
                </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats comments-count">
                Comments Count
                <span>        
                    <?php 
                        $commentscount_arguments = array(
                            'user_id'    => get_the_author_meta('ID'),
                            'count'      => true
                        );
                        echo get_comments( $commentscount_arguments);
                    ?>
                </span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats total-posts">
                Total Posts View
                <span>60</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats test">
                Test
                <span>40</span>
            </div>
        </div>
    </div>
    <!----------End Row------>
     
        <?php
    
            //Start Query => Posts of Certain Author And Number Of Posts Appear In Page
            $author_posts_per_page = 6; //Number Of Posts Appear In Page
            $author_posts_arguments = array(
                'author'            => get_the_author_meta('ID'), //Author That You Want To Appeat His Posts
                'posts_per_page'     => $author_posts_per_page //Number Of Posts Appear In Page
            
            );
    
            //object
            $author_posts = new WP_Query($author_posts_arguments) ;
    
            //Start loop For Echo Posts Of This Author Not Posts Of All Authors
        
            if($author_posts-> have_posts()) {//Check If There Are Posts Or Not ?>
            
            <h3 class="author-post-title">
                <?php
                      //Check If Count Of Posts Larger Than Or Equal Posts Per Page
                  if (count_user_posts(get_the_author_meta('ID')) >= $author_posts_per_page)
                  { 
                      //Echo Latest Posts Per Page
                   echo "Latest " . $author_posts_per_page . " Posts Of " ;
                      
                  } else {
                      //Echo Latest Post Without Number
                      echo "Latest Posts " ;;
                  }
                      
                 ?>
                
            </h3>   
        
            <?php
             
                while($author_posts-> have_posts()){ //Bring Posts Throw Loop
                    
                    $author_posts-> the_post(); ?>
                     <div class="author-posts">
                        <div class="row">
                             <div class="col-sm-3">
                                 <?php the_post_thumbnail('',['class' => 'img-responsive img-thumbnail','title'=>'Post image']); ?>
                             </div>
                            <div class="col-sm-9">
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                 <span class="post-date">
                                     <i class="fa fa-calendar fa-fw "></i> <?php the_time('F j, Y'); ?>
                                </span>
                                <span class="post-comment">
                                    <i class="fa fa-comments-o fa-fw "></i> <?php comments_popup_link("0 Comment","1 Comment","% Comments","comment-url","Comments Disabled") ?>
                                </span>
                                <div class="post-content">
                                    <?php the_excerpt();?>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
                    
                <?php
                    
                } //End While loop
            } //End If Condetion
    
            wp_reset_postdata(); //Reset Loop Query
    
    
            //Get Comments Of Certain User
            $comments_per_page = 6;
    
            $comments_arguments = array (
                'user_id'       => get_the_author_meta('ID'), //User That You Want To Show His Comments
                'status'        =>'approve',//Status Of Comments Approve Or Not Approve
                'number'        => $comments_per_page,//Number Of Comments That Want To Appear 
                'post_status'   =>'publish',//Satus Of Post My Be Not Publish
                'post_type'     =>'post' //Type Of Post
            );
    
            //Put Function In Variable As Array To Echo Any Thing From It  Using Foreach
            $comments = get_comments($comments_arguments);
    
            if($comments){ //Ckeck If There Is Comments Or NOt ?>
    
                <h3 class="author-comments-title">
                    <?php 
                       //Check If Count Of Comments Larger Than Or Equal Comments Per Page
                  if (get_comments($commentscount_arguments) >= $comments_per_page)
                  { 
                      //Echo Latest Comments Per Page
                   echo "Latest " . $comments_per_page . " Comments" ;
                      
                  } else {
                      //Echo Latest Post Without Number
                      echo "Latest Comments " ;
                  }
                    ?>
                </h3>
    
    
            <?php
                
                
            foreach($comments as $comment){ //Strat Foreach ?>
                <div class="author-comments">
                    <h3 class="post-title">
                        <!-- Put The Post(post that you comment on it ) Title In Link   -->
                        <a href="<?php echo get_permalink($comment->comment_post_ID) ?>">
                        <!-- The Title Of Posts That You Comment On It  -->
                          <?php echo get_the_title($comment->comment_post_ID) ?>
                        </a>
                    </h3>
                    <span class="post-date">
                        <i class="fa fa-calendar fa-fw "></i>
                        <?php echo $comment->comment_date //Date Of Every Comment On This Posts  ?>
                    </span>
                    <div class="post-content">
                        <?php echo $comment->comment_content //Content Of Every Comment On This Posts  ?>
                    </div>
                </div>
                
           <?php 
                } //End Foreach
                
            } else {
                echo "There Is No Comments For This Author";
            }
            
    
            ?>
    
</div>

<?php get_footer(); ?>