<?php get_header(); ?>
<div class="container home-page">
    <div class="row">
        <!---Start loop For Echo Posts-->
        <?php
        
            if(have_posts()) //Check If There Are Posts Or Not
            {
                while(have_posts()){ //Bring Posts Throw Loop
                    
                    the_post(); ?>
                    
                    <div class="col-sm-4">
                        <div class="main-post">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <h3 class="post-title"><?php the_title(); ?></h3>
                            </a>
                            <span class="post-author">
                                <i class="fa fa-user fa-fw "></i> <?php the_author_posts_link(); ?>
                            </span>
                             <span class="post-date">
                                 <i class="fa fa-calendar fa-fw "></i> <?php the_time('F j, Y'); ?>
                            </span>
                            <span class="post-comment">
                                <i class="fa fa-comments-o fa-fw "></i> <?php comments_popup_link("0 Comment","1 Comment","% Comments","comment-url","Comments Disabled") ?>
                            </span>
                            <?php the_post_thumbnail('',['class' => 'img-responsive img-thumbnail','title'=>'Post image']); ?>
                            <div class="post-content">
                                <?php the_excerpt();?>
                            </div>
                             <p class="post-categories">
                                 <i class="fa fa-tags fa-fw "></i> <?php the_category(" , "); ?>
                            </p>
                            <p class="post-tag">
                                <?php       
                                    if(has_tag()){ //check if there is tags for the post
                                
                                      the_tags();  
                                    }
                                    else{
                                        echo "Tags: There Is No Tags";
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                <?php
                    
                } //End While loop
                
            } //End If Condetion
        
            // Start Post Pagenation
            /*
            echo"<div class='post-pagination text-center'>";
            if(get_previous_posts_link()){ //Check if there is previos page

                previous_posts_link('<i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i> Prev');
            }
            else{
                echo"<span>No Previous Page</span>";
            }
            if(get_next_posts_link()){ //Check if there is next page
                next_posts_link(' Next <i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>');
                }
            else{
                    echo"<span>No Next Page</span>";
                }

               echo"</div>"; 
               */
        ?>
    </div><!-- End Row -->
        
        <div class="pagination-numbers">
       <?php echo numbering_pagination(); ?>
    </div>
</div>

<?php get_footer(); ?>