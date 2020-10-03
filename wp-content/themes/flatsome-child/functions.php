<?php
//require_once get_template_directory() . '/inc/init.php';

/**
 * Proper way to enqueue scripts and styles.
 */
add_action('wp_head', function(){
    remove_action('woocommerce_after_main_content','flatsome_pages_in_search_results', 10);
});

add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/css/style-theme.css');
    wp_enqueue_style( 'team', get_stylesheet_directory_uri() . '/assets/css/team.css');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css');
    wp_enqueue_style( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/css/easy-responsive-tabs.css');
    wp_enqueue_script( 'js-countup', get_stylesheet_directory_uri() . '/assets/js/jquery.countup.js');
    wp_enqueue_script( 'easy-responsive-tabs', get_stylesheet_directory_uri() . '/assets/js/easy-responsive-tabs.js');
    wp_enqueue_script( 'customjs', get_stylesheet_directory_uri() . '/assets/js/customerjs.js');
}

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Mua Ngay', 'woocommerce' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Mua Ngay', 'woocommerce' );
}


function wp_example_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');


// add elements
define("SHOP_NAME", "Elite Shoppy");

// 'box banner' -- start --
function ux_builder_box_banner_ele(){
    add_ux_builder_shortcode('box_banner', array(
        'name'      => "Box Banner",
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'directives' => array( 'ux-text-editor' ),
        'options' => array(
            'title'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Title',
                'default' => '',
            ),
            'prefixtitle'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Prefix Title',
                'default' => '',
            ),
            'des'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Description',
                'default' => '',
            ),
            'img'    =>  array(
                'type' => 'image',
                'heading'    => 'Image',
                'default' => '',
            ),
            'link'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Link',
                'default' => '',
            ),
        ),
    ));
}
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
 
function change_existing_currency_symbol( $currency_symbol, $currency ) {
 switch( $currency ) {
 case 'VND': $currency_symbol = ' VND'; break;
 }
 return $currency_symbol;
}

add_action('ux_builder_setup', 'ux_builder_box_banner_ele');
 
function ux_builder_box_banner_func($atts){
    extract(shortcode_atts(array(
        'title'    => '',
        'prefixtitle' => '',
        'des' => '',
        'img' => '',
        'link' => '#'
    ), $atts));
    $imgItem = wp_get_attachment_image_src($img, 'full');
    $imgItem = isset($imgItem[0]) ? $imgItem[0]  : '';
    $linkStart = '';
    $linkEnd = '';
    if($link !== '' && $link !== "#"){
        $linkStart = '<a href=' . $link . '">';
        $linkEnd = '</a>';
    }
    ob_start();
    ?>
    <?php echo $linkStart ?>
        <div class="wthree_banner_bottom_grid_three_left1 grid">
            <figure class="effect-roxy">
                <img src="<?php echo $imgItem ?>" alt=" " class="img-responsive">
                <figcaption>
                    <h3><?php echo '<span>' . $prefixtitle . '</span>' . $title ?></h3>
                    <p><?php echo $des ?></p>
                </figcaption>           
            </figure>
        </div>
    <?php echo $linkEnd ?>
<?php 
	return ob_get_clean();
}
add_shortcode('box_banner', 'ux_builder_box_banner_func');
// 'box banner' -- end --



// 'box flat' -- start --
function ux_builder_box_flat_ele(){
    add_ux_builder_shortcode('box_flat', array(
        'name'      => __('Box Flat'),
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'directives' => array( 'ux-text-editor' ),
        'options' => array(
            'title'    =>  array(
                'type' => 'textarea',
                'heading'    => 'Title',
                'default' => '',
            ),
             'link'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Link',
                'default' => '',
            ),
            'img'    =>  array(
                'type' => 'image',
                'heading'    => 'Background',
                'default' => '',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'ux_builder_box_flat_ele');
 
function ux_builder_box_flat_func($atts){
    extract(shortcode_atts(array(
        'title'    => '',
        'link' => '#',
        'img' => ''
    ), $atts));
    $imgItem = wp_get_attachment_image_src($img, 'full');
    $imgItem = isset($imgItem[0]) ? $imgItem[0]  : '';
    ob_start();
    ?>
    <div class="col-md-6 multi-gd-img multi-gd-text ">
        <a href="<?php echo $link ?>"><img src="<?php echo $imgItem ?>" alt=" "><?php echo $title ?></a>
    </div>
<?php 
    return ob_get_clean();
}
add_shortcode('box_flat', 'ux_builder_box_flat_func');
// 'box flat' -- end --

// 'box new_arrivals' -- start --
function ux_builder_box_new_arrivals_ele(){

    $cat_args = array(
        'orderby'    => 'asc',
        'hide_empty' => false,
    );
     
    $product_categories = get_terms( 'product_cat', $cat_args );
    $arrayCat = array();
     foreach ($product_categories as $key => $category) {
        if($category->name !== "Uncategorised"){
            $arrayCat[$category->term_id] = $category->name;
        }
     }

    add_ux_builder_shortcode('new_arrivals', array(
        'name'      => __('New Arrivals'),
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'directives' => array( 'ux-text-editor' ),
        'options' => array(
            'category_1'    =>  array(
                'type' => 'select',
                  'heading' => 'Category 1',
                  'options' => $arrayCat
            ),
            'category_2'    =>  array(
                'type' => 'select',
                  'heading' => 'Category 2',
                  'options' => $arrayCat
            ),
            'category_3'    =>  array(
                'type' => 'select',
                  'heading' => 'Category 3',
                  'options' => $arrayCat
            ),
            'category_4'    =>  array(
                'type' => 'select',
                  'heading' => 'Category 4',
                  'options' => $arrayCat
            ),
            'limit'    =>  array(
                'type' => 'scrubfield',
                'heading'    => 'Background',
                'default' => '',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'ux_builder_box_new_arrivals_ele');

function ux_builder_box_new_arrivals_func($atts){
    extract(shortcode_atts(array(
        'category_1'    => '',
        'category_2'    => '',
        'category_3'    => '',
        'category_4'    => '',
        'limit' => ''
    ), $atts));
    $imgItem = wp_get_attachment_image_src($img, 'full');
    $imgItem = isset($imgItem[0]) ? $imgItem[0]  : '';

    $term_1 = get_term_by( 'id', $category_1, 'product_cat' ); 
    $term_2 = get_term_by( 'id', $category_2, 'product_cat' ); 
    $term_3 = get_term_by( 'id', $category_3, 'product_cat' ); 
    $term_4 = get_term_by( 'id', $category_4, 'product_cat' ); 

    ob_start();
    ?>
    <div id="horizontalTab">
        <ul class="resp-tabs-list">
            <li><?php echo $term_1->name ?></li>
            <li><?php echo $term_2->name ?></li>
            <li><?php echo $term_3->name ?></li>
            <li><?php echo $term_4->name ?></li>
        </ul>
        <div class="resp-tabs-container">
            <div class="tab1">
                <?php  
                echo do_shortcode('[products limit="'. $limit . '" columns="4" orderby="popularity" category="'. $term_1->slug .'" ]');
                ?>
                <div class="clearfix"></div>
            </div>
             <div class="tab2">
                <?php  
                echo do_shortcode('[products limit="'. $limit . '" columns="4" orderby="popularity" category="'. $term_2->slug .'" ]');
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="tab3">
                <?php  
                echo do_shortcode('[products limit="'. $limit . '" columns="4" orderby="popularity" category="'. $term_3->slug .'" ]');
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="tab4">
                <?php  
                echo do_shortcode('[products limit="'. $limit . '" columns="4" orderby="popularity" category="'. $term_4->slug .'" ]');
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php 
    return ob_get_clean();
}
add_shortcode('new_arrivals', 'ux_builder_box_new_arrivals_func');
// 'box new_arrivals' -- end --

// 'icon box' -- start--

function ux_builder_icon_box_ele(){

    add_ux_builder_shortcode('icon_box', array(
        'name'      => __('Icon Box'),
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'directives' => array( 'ux-text-editor' ),
        'options' => array(
             'title'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Title',
                'default' => '',
            ),
            'des'    =>  array(
                'type' => 'textarea',
                'heading'    => 'Description',
                'default' => '',
            ),
            'iconfront'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Font Icon',
                'default' => '',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'ux_builder_icon_box_ele');

function ux_builder_icon_box_func($atts){
    extract(shortcode_atts(array(
        'title'    => '',
        'des'    => '',
        'iconfront'    => '',
    ), $atts));
    ob_start();?>

    <div class="w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
            <i class="<?php echo $iconfront ?>" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
            <h3><?php echo $title ?></h3>
            <p><?php echo $des ?></p>
        </div>
    </div>

<?php 
    return ob_get_clean();
}
add_shortcode('icon_box', 'ux_builder_icon_box_func');
// 'icon box' -- end --


// 'icon social' -- start--

function ux_builder_icon_social_ele(){

    add_ux_builder_shortcode('icon_social', array(
        'name'      => __('Icon Social'),
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'options' => array(
            'link'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Link Icon Font',
                'default' => '',
            ),
            'iconfront'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Font Icon',
                'default' => '',
            ),
            'background'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Background',
                'default' => '',
            ),
            'classname'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Class Name',
                'default' => '',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'ux_builder_icon_social_ele');

function ux_builder_icon_social_func($atts){
    extract(shortcode_atts(array(
        'link'    => '',
        'iconfront'    => '',
        'background'    => '',
        'classname' => ''
    ), $atts));
    ob_start();?>

    <a href="<?php echo $link; ?>" class="<?php echo $classname; ?>">
        <div class="front" style="background: <?php echo $background ?>">
            <i class="<?php echo $iconfront ?>" aria-hidden="true"></i>
        </div>
        <div class="back">
            <i class="<?php echo $iconfront ?>" aria-hidden="true"></i>
        </div>
    </a>

<?php 
    return ob_get_clean();
}
add_shortcode('icon_social', 'ux_builder_icon_social_func');
// 'icon box' -- end --



// 'box container' -- start--

function ux_builder_box_container_ele(){

    add_ux_builder_shortcode('box_container', array(
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'type'      => 'container',
        'name'      => __( 'Box container', 'ux-builder' ),
        'wrap'      => false,
        'info'      => '{{ label }}',
        'priority'  => -1,
        'options' => array(
            'classname'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Class Name',
                'default' => '',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'ux_builder_box_container_ele');

function ux_builder_box_container_func($atts, $content){
    extract(shortcode_atts(array(
        'classname' => ''
    ), $atts));
    ob_start();?>

   <div class="<?php echo $classname ?>">
        <?php echo do_shortcode($content) ?>
   </div>

<?php 
    return ob_get_clean();
}
add_shortcode('box_container', 'ux_builder_box_container_func');
// 'box container' -- end --



// 'box list menu' -- start--

function ux_builder_list_menu_ele(){

    $menus = wp_get_nav_menus();

    $array_menus = array();

    foreach ($menus as $item) {
        $array_menus[$item->term_id] = $item->name;
    }

    add_ux_builder_shortcode('list_menu', array(
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'name'      => __( 'List Menu', 'ux-builder' ),
        'wrap'      => false,
        'priority'  => -1,
        'options' => array(
            'menuid'    =>  array(
                'type' => 'select',
                'heading'    => 'Menu',
                'options' => $array_menus
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'ux_builder_list_menu_ele');

function ux_builder_list_menu_func($atts, $content){
    extract(shortcode_atts(array(
        'menuid' => ''
    ), $atts));
    ob_start(); ?>
    <div>
        <?php wp_nav_menu(array("menu" => $menuid)); ?>
    </div>
<?php return ob_get_clean();
}
add_shortcode('list_menu', 'ux_builder_list_menu_func');
// 'box container' -- end --


// 'box list menu' -- start--

function ux_builder_box_person_ele(){

    $menus = wp_get_nav_menus();

    $array_menus = array();

    foreach ($menus as $item) {
        $array_menus[$item->term_id] = $item->name;
    }

    add_ux_builder_shortcode('box_person', array(
        'category'  => SHOP_NAME,
        'priority'  => 1,
        'name'      => __( 'Box person', 'ux-builder' ),
        'wrap'      => false,
        'priority'  => -1,
        'options' => array(
            'title'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Title',
            ),
            'des'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Description',
            ),
            'background'    =>  array(
                'type' => 'image',
                'heading'    => 'Background',
            ),
            'linkfb'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Link facebook',
            ),
            'linktwitter'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Link twitter',
            ),
            'linkinstagram'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Link instagram',
            ),
            'linklinkedin'    =>  array(
                'type' => 'textfield',
                'heading'    => 'Link linkedin',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'ux_builder_box_person_ele');

function ux_builder_box_person_func($atts){
    extract(shortcode_atts(array(
        'title' => '',
        'des' => '',
        'background' => '',
        'linkfb' => '',
        'linktwitter' => '',
        'linkinstagram' => '',
        'linklinkedin' => ''
    ), $atts));

    $imgItem = wp_get_attachment_image_src($background, 'full');
    $imgItem = isset($imgItem[0]) ? $imgItem[0]  : '';

    ob_start(); ?>
    <div class="team-grids">
        <div class="thumbnail team-w3agile">
            <img src="<?php echo $imgItem ?>" class="img-responsive" alt="">
            <div class="social-icons team-icons right-w3l fotw33">
                <div class="caption">
                    <h4><?php echo $title; ?></h4>
                    <p><?php echo $des ?></p>                        
                </div>
                <ul class="social-nav model-3d-0 footer-social w3_agile_social two">
                    <li>
                        <a href="<?php echo $linkfb; ?>" class="facebook">
                            <div class="front">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </div>
                            <div class="back">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $linktwitter; ?>" class="twitter"> 
                            <div class="front">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </div>
                            <div class="back">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $linkinstagram; ?>" class="instagram">
                            <div class="front">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </div>
                            <div class="back">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $linklinkedin; ?>" class="pinterest">
                            <div class="front">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </div>
                            <div class="back">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php return ob_get_clean();
}
add_shortcode('box_person', 'ux_builder_box_person_func');
// 'box container' -- end --



