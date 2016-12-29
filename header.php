<?php global $float; ?>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php the_title(); ?></title>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>


  <?php $centers_link           = get_field('centers_link','option') ?>
  <?php $header_orange_box_text = get_field('header_orange_box_text','option') ?>
  <?php $center_link_tab        = add_query_arg( "page_name" , 'tab-1' , $centers_link); ?>
  <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
      <div class="off-canvas off-canvas-mobile position-<?php echo $float; ?>" id="offCanvas<?php echo $float; ?>" data-off-canvas data-position="<?php echo $float; ?>">
         <div>
              <div class="logo_div">
                <?php $logoimg = get_field('header_logo','option') ?>
                <a href="<?php echo home_url(); ?>" title="Insightec">
                  <?php $img_logo = get_field('header_logo','option');  ?>
                  <img src="<?php echo $img_logo['url']; ?>" alt="">
                </a>
              </div>
         </div>
          <ul class="menu lang_ul_m">
            <li>
              <div class="lang_inner">
                  <?php icl_post_languages_m(); ?>
              </div>
            </li>
          </ul>

          <?php
               wp_nav_menu( array(
                  'theme_location'    => 'top_menu_mobile',
                  'menu_class'        => 'dropdown menu design_menu',
                  'container'         => '',
                  'container_class'   => '',
                  )
              );
          ?>
      </div>

      <div class="off-canvas-content" data-off-canvas-content>

        <div class="wraper">
        <nav class="top_menu">

      <?php if (isset($result) && $result['country_code'] == 'us') { ?>
           <div class="us_visitors">
            <div class="row">
                <a href="#" title="USA VISITORS">USA VISITORS</a>
            </div>
          </div>
      <?php } ?>



          <div class="row">

            <div class="title-bar" data-hide-for="medium">
              <button class="menu-icon" type="button" data-toggle="offCanvas<?php echo $float; ?>"></button>
              <div class="title-bar-title"></div>
            </div>
            <div class="top-bar" id="example-menu">

              <div class="top-bar-<?php echo $float; ?>">
                <div class="logo_div">
                  <?php $logoimg = get_field('header_logo','option') ?>
                  <a href="<?php echo home_url(); ?>" title="Insightec">
                    <?php $img_logo = get_field('header_logo','option');  ?>
                    <img src="<?php echo $img_logo['url']; ?>" alt="Logo">
                  </a>
                </div>
                  <?php
                       wp_nav_menu( array(
                          'theme_location'    => 'top_menu',
                          'menu_class'        => 'dropdown menu',
                          'container'         => '',
                          'container_class'   => '',
                          )
                      );
                  ?>
                </div>

                <div class="top-bar-<?php echo $float; ?> lang_div">
                  <ul class="menu lang_ul">
                    <li>
                      <div class="lang_inner">
                          <?php icl_post_languages(); ?>
                      </div>
                    </li>
                  </ul>
              </div>

              <div class="top-bar-<?php echo $float; ?> search_div">
                <ul class="menu">
                  <li>
                    <button type="button" class="button btn_icon">
                        <img class="search_icon" src="<?php echo get_template_directory_uri(); ?>/images/searchicon.png" alt="search">
                        <img class="search_icon_act" src="<?php echo get_template_directory_uri(); ?>/images/searchiconact.png" alt="search">
                    </button>

                    <div class="search_div_open">
                      <?php get_search_form();?>
                    </div>

                  </li>
                </ul>
              </div>


              <a class="cecters_link" href="<?php echo $center_link_tab; ?>" title="<?php echo $header_orange_box_text; ?>">
                <div class="top-bar-right find_div">
                    <div class="find_div_inner">
                      <div class="plus_img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/headerplus.png" alt="plus">
                      </div>
                      <div class="find_text">
                        <span><?php echo $header_orange_box_text; ?></span>
                      </div>
                    </div>
                </div>
               </a>

            </div>
          </div>
        </nav>

        <div class="nav_pad"></div>
