<?php $frontpage_id = get_option( 'page_on_front' ); ?>

<?php the_field('tags_gtm_head', $frontpage_id); ?>

<header id="banner" class="navbar" role="banner">

  <div class="nav-top">

    <div class="container">
      
      <a class="brand" href="<?php echo home_url(); ?>">
        <img src="<?php the_field('header_logo', $frontpage_id); ?>" alt="<?php echo $blogname; ?>" title="<?php echo $blogname; ?>" />
      </a>

      <ul>

        <li><a href="tel:+1-<?php the_field('make_a_call_now_number', $frontpage_id); ?>" class="call-header"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-gold.png" alt="<?php the_field('make_a_call_now_text', $frontpage_id); ?>" title="<?php the_field('make_a_call_now_text', $frontpage_id); ?>" /> <?php the_field('make_a_call_now_text', $frontpage_id); ?></a></li>

        <li><a href="<?php the_field('get_help_button_link', $frontpage_id); ?>" class="get-help-header"><?php the_field('get_help_button_text', $frontpage_id); ?></a></li>

        <li><a href="<?php the_field('exit_page_button_link', $frontpage_id); ?>" class="exit-page-header"><?php the_field('exit_page_button_text', $frontpage_id); ?></a></li>

      </ul>

    </div>
  </div>


  <nav id="nav">

    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header-mobile">

            <p>Navigation</p>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-nav-mobile">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <div class="clear"></div>

            <?php wp_nav_menu(array('menu' => 'Main', 'menu_class' => 'nav navbar-nav-mobile collapse' )); ?> 
          </div>


      <?php wp_nav_menu(array('menu' => 'Main', 'menu_class' => 'nav navbar-nav' )); ?> 

    </div>
            
  </nav>



  </div>

</header>