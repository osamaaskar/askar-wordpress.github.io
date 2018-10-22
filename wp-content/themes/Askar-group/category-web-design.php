<?php get_header(); ?>
<div class="container home-page web-design-category">
    
    <div class="row">
        <div class="category-info text-center">
            <div class="col-md-4">
                <h1 class="category-title"><?php single_cat_title(); //Category That You Are In It ?></h1>
            </div>
            <div class="col-md-4">
               <div class="category-description"> <?php echo category_description() ?></div>
            </div>
            <div class="col-md-4">
                <div class="category-stats">
                    <span>Articles: 20</span>
                    <span>Comments: 20</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-9">
        <!---Start loop For Echo Posts-->
        <?php
        
            if(have_posts()) //Check If There Are Posts Or Not
            {
                while(have_posts()){ //Bring Posts Throw Loop
                    
                    the_post(); ?>
                    
                    
                        <div class="main-post">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php the_post_thumbnail('',['class' => 'img-responsive img-thumbnail','title'=>'Post image']); ?>
                                </div>
                                <div class="col-md-6">
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

                                    <div class="post-content">
                                        <?php the_excerpt();?>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                    
                <?php
                    
                } //End While loop
                
            } //End If Condetion
        ?>
        </div><!-- End Col-md-9 -->
        <div class="col-md-3">
            <?php
             
            get_sidebar('web_design');
            ?>
        </div>   
        
    </div><!-- End Row -->
        
        <div class="pagination-numbers">
       <?php echo numbering_pagination(); ?>
    </div>
</div>

<?php get_footer(); ?>