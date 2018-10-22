<?php get_header(); ?>
<div class="container single-page">
        <!---Start loop For Echo Posts-->
        <?php
        
            if(have_posts()) //Check If There Are Posts Or Not
            {
                while(have_posts()){ //Bring Posts Throw Loop
                    
                    the_post(); ?>
                    
                        <div class="main-post ">
                            <?php edit_post_link("Edit <i class='fa fa-pencil'></i>") ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <h3 class="post-title"><?php the_title(); ?></h3>
                            </a>
                          
                             <span class="post-date">
                                 <i class="fa fa-calendar fa-fw "></i> <?php the_time('F j, Y'); ?>
                            </span>
                            <span class="post-comment">
                                <i class="fa fa-comments-o fa-fw "></i> <?php comments_popup_link("0 Comment","1 Comment","% Comments","comment-url","Comments Disabled") ?>
                            </span>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php the_post_thumbnail('',['class' => 'img-responsive img-thumbnail','title'=>'Post image']); ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="post-content">
                                        <?php the_content();?>
                                    </div>
                                </div>
                            </div>
                             <p class="post-categories">
                                 <i class="fa fa-tags fa-fw "></i> <?php the_category(" , "); ?>
                            </p>
                            <p class="post-tag">
                                <?php       
                                    if(has_tag()){

                                      the_tags();  
                                    }
                                    else{
                                        echo "Tags: There Is No Tags";
                                    }
                                ?>
                            </p>
                        </div>
                <?php
                    
                } //End While loop
                
            } //End If Condetion 
    
            // Start Query Of Random Posts At The Same Category
    
            //First Get The Current Post Id Using This Fucntion-> get_queried_object_id(); or get_the_ID() 

            //Second Get All Categories Id That This Post Share In It using -> wp_get_post_categories(get_the_ID())
    
    
            $random_posts_arguments = array(
                'posts_per_page'            =>5, //Number Of Posts Will Appear
                'orderby'                   =>'rand', //Random Posts
                'category__in'              =>wp_get_post_categories(get_queried_object_id()),//Categories That Post Share In 
                'post__not_in'              =>array(get_queried_object_id())//Currunt Post Not Appear In This 5 Posts
            
            );
    
            //object
            $random_posts = new WP_Query($random_posts_arguments) ;
    
            //Start loop For Echo Related Posts For This Post
        
            if($random_posts-> have_posts()) {//Check If There Are Posts Or Not 
             
                while($random_posts-> have_posts()){ //Bring Posts Throw Loop
                    
                    $random_posts-> the_post(); ?>
                     <div class="author-posts">
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3> 
                         <hr>
                    </div>       
                <div class="clearfix"></div>
                    
                <?php
                    
                } //End While loop
            } //End If Condetion
            else{
                
                echo"There Is No Related Posts";

            }
    
            wp_reset_postdata(); //Reset Loop Query
    
    
    // End Query Of Random Posts At The Same Category      
    
    ?>
    
    
    
    
    <!--Start Information Of Author--->
    <div class="user-info">
        <div class="row"> <!--Start Row-->
                <div class="col-md-2">
                    <?php 
                    $avatar_arguments = array( //Author Arguments
                        'class'=>'img-responsive img-thumbnail center-block'
                    );
                        echo get_avatar(get_the_author_meta('ID'),128,'','User Avatar',$avatar_arguments); //Avatar Of Author
                    ?>
                </div>
                <div class="col-md-10">
                    <h4>
                        <?php the_author_meta('first_name')//Print First Name OF Author ?>
                        <?php the_author_meta('last_name') //Print Last Name Of Author?>
                        (<span class="nickname"><?php the_author_meta('nickname') //Print Nickname Of Auther?></span>)
                    </h4>

                <?php if(get_the_author_meta('description')){//Check If The Author Have Decription Or Not ?>
                        <p><?php the_author_meta('description');//Print Description Of Auther ?> </p>
                <?php 

                    } else {

                        echo"No Description Of This Author"; //Print Atention Message If No Description of this user
                } ?>
                </div>
            </div><!--End Row-->
        <p class="post-status">
          <i class="fa fa-tags fa-fw "></i>  Number Of Posts Created By User: <span class='posts-count'>
            <?php echo count_user_posts(get_the_author_meta('ID')) ?></span><br>
            <i class="fa fa-home fa-fw"></i>Visit User Profile Page By Clicking Here: <?php the_author_posts_link(); ?>
        </p>
        </div>
    <!--End Information Of Author--->
        <?php
    
        echo "<hr class='comment-separator'>";
        
        // Start Post Pagenation
        echo"<div class='post-pagination text-center'>";
        if(get_previous_post_link()){ //check if there is previos post
            
            previous_post_link('%link','<i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i> Previous Post');
        }
        else{
            echo"<span>No Previous Post</span>";
        }
        if(get_next_post_link()){ //check if there is next post
            next_post_link('%link','Next Post <i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>');
            }
        else{
                echo"<span>No Next Post</span>";
            }
        
           echo"</div>"; 
           echo "<hr class='comment-separator'>";
        ?>
    <?php comments_template(); ?>
   </div>


<?php get_footer(); ?>