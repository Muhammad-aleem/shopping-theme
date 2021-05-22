<?php

/* Our Team */
function my_add_product_cpt() {
    register_post_type( 'products',
        array(
            'label'               => ("Products"),
            'singular_label'      => ("Product"),
            '_builtin'            => false,
            'capability_type'     => 'page',
            'public'              => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => false,
            'menu_icon'           => ( version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) ) ? 'dashicons-plus-alt' : '',
            'rewrite'             => array(
                                        'slug'       => 'product',
                                        'with_front' => FALSE,
                                    ),
            'supports' => array(
                            'title',
                            'editor',
                        'thumbnail',
                        'excerpt'
                        )
        )
    );
    register_taxonomy(
        'product_cat',
        'products',
        array(
            'hierarchical'  => true,
            'label'         => ("Category"),
            'singular_name' => ("category"),
            'rewrite'       => true,
            'query_var'     => true
        )
    );
    }
    add_action('init', 'my_add_product_cpt');


add_filter( 'the_content', 'wti_remove_product_tans', 0 );

function wti_remove_product_tans( $content )
{
     global $post;

     // Check for single page and image post type and remove
     if ( is_single() && $post->post_type == 'products' )
          remove_filter('the_content', 'wpautop');

     return $content;
}

// Add Custom image Meta boxes !

add_action( 'after_setup_theme', 'custom_postimage_setup' );
function custom_postimage_setup(){
    add_action( 'add_meta_boxes', 'custom_postimage_meta_box' );
    add_action( 'save_post', 'custom_postimage_meta_box_save' );
}

function custom_postimage_meta_box(){

        add_meta_box('custom_postimage_meta_box',__( 'Add related product Image ', ''),'custom_postimage_meta_box_func','products','side','low');
    
}

function custom_postimage_meta_box_func($post){

    //an array with all the images (ba meta key). The same array has to be in custom_postimage_meta_box_save($post_id) as well.
    $meta_keys = array('product_second_featured_image');

    foreach($meta_keys as $meta_key){
        $image_meta_val=get_post_meta( $post->ID, $meta_key, true);
        ?>
        <div class="custom_postimage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img src="<?php echo ($image_meta_val!=''?wp_get_attachment_image_src( $image_meta_val)[0]:''); ?>" style="width:100%;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" alt="">
            <a class="addimage button" onclick="custom_postimage_add_image('<?php echo $meta_key; ?>');"><?php _e('add image','yourdomain'); ?></a><br>
            <a class="removeimage" style="color:#a00;cursor:pointer;display: <?php echo ($image_meta_val!=''?'block':'none'); ?>" onclick="custom_postimage_remove_image('<?php echo $meta_key; ?>');"><?php _e('remove image','yourdomain'); ?></a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>" value="<?php echo $image_meta_val; ?>" />
        </div>
    <?php } ?>
    <script>
    function custom_postimage_add_image(key){

        var $wrapper = jQuery('#'+key+'_wrapper');

        custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
            title: '<?php _e('select image','yourdomain'); ?>',
            button: {
                text: '<?php _e('select image','yourdomain'); ?>'
            },
            multiple: false
        });
        custom_postimage_uploader.on('select', function() {

            var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
            var img_url = attachment['url'];
            var img_id = attachment['id'];
            $wrapper.find('input#'+key).val(img_id);
            $wrapper.find('img').attr('src',img_url);
            $wrapper.find('img').show();
            $wrapper.find('a.removeimage').show();
        });
        custom_postimage_uploader.on('open', function(){
            var selection = custom_postimage_uploader.state().get('selection');
            var selected = $wrapper.find('input#'+key).val();
            if(selected){
                selection.add(wp.media.attachment(selected));
            }
        });
        custom_postimage_uploader.open();
        return false;
    }

    function custom_postimage_remove_image(key){
        var $wrapper = jQuery('#'+key+'_wrapper');
        $wrapper.find('input#'+key).val('');
        $wrapper.find('img').hide();
        $wrapper.find('a.removeimage').hide();
        return false;
    }
    </script>
    <?php
    wp_nonce_field( 'custom_postimage_meta_box', 'custom_postimage_meta_box_nonce' );
}



function custom_postimage_meta_box_save($post_id){

    if ( ! current_user_can( 'edit_posts', $post_id ) ){ return 'not permitted'; }

    if (isset( $_POST['custom_postimage_meta_box_nonce'] ) && wp_verify_nonce($_POST['custom_postimage_meta_box_nonce'],'custom_postimage_meta_box' )){

        //same array as in custom_postimage_meta_box_func($post)
        $meta_keys = array('product_second_featured_image');
        foreach($meta_keys as $meta_key){
            if(isset($_POST[$meta_key]) && intval($_POST[$meta_key])!=''){
                update_post_meta( $post_id, $meta_key, intval($_POST[$meta_key]));
            }else{
                update_post_meta( $post_id, $meta_key, '');
            }
        }
    }
}

function product_remore_p_tag( $content )
{
     global $post;

     // Check for single page and image post type and remove
     if ( is_single() && $post->post_type == 'products' )
          remove_filter('the_content', 'wpautop');

     return $content;
}
add_filter( 'the_content', 'product_remore_p_tag', 0 );


function isacustom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'products')
    return 13;
    }
    add_filter('excerpt_length', 'isacustom_excerpt_length');
    
    
    
    
    // Get the custom post type

    function add_chide_product() {

        add_meta_box('homeproduct_posttype',__( 'Child Of this Product', ''),'get_all_product_post','products','side','low');
    }
    
    add_action( 'add_meta_boxes', 'add_chide_product' );


    function get_all_product_post (){
        global $post;
        $posts = get_posts(
            array(
                'post_type'  => 'products',
                'numberposts' => -1
            )
        );

        $get_all_post =  get_post_meta( $post->ID,'custom_post_product', true );
        if(empty($get_all_post)){
            $get_all_post = array();
        }
        
       

        if($posts){
            $out = '<select  multiple   name="add_product_post[]">';
            foreach( $posts as $p ):

                if(in_array($p->ID, $get_all_post))
                {
                    $select = 'selected';
                }else{
                    $select = '';
                }
           
                $out .= '<option value="' . $p->ID. '" '.$select.'>' . esc_html( $p->post_title ) . '</option>';
            endforeach;
            $out .= '</select>';
            echo $out;
            wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

        }
       
        
    }
    add_action( 'save_post', 'save_child_product');
function save_child_product( $post_id )
{
    // Stop If Autosaving
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Stop If Nonce Can't Be Verified
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // Stop If Unauthorized User
    if( !current_user_can( 'edit_post' ) ) return;

    // Make Sure Data Is Set Then Save 
    if(isset( $_POST['add_product_post'] ) ){
        $insert_data =   $_POST['add_product_post'];
        update_post_meta( $post_id, 'custom_post_product', $_POST['add_product_post']);
    }else{
        delete_post_meta( $post_id, 'custom_post_product');
    }
        
}


 // Add Related Product 


    function add_related_product() {

        add_meta_box('related_productid',__( 'Related Products', ''),'get_all_related_product_post','products','side','low');
    }
    
    add_action( 'add_meta_boxes', 'add_related_product');

    function get_all_related_product_post (){
        global $post;
        $get_posts = get_posts(
            array(
                'post_type'  => 'products',
                'numberposts' => -1
            )
        );

        $get_allrelated_post =  get_post_meta( $post->ID,'posts_related_product', true );
        
        if(empty($get_allrelated_post)){
            $get_allrelated_post = array();
        }
        
       

        if($get_posts){
            $out = '<select  multiple   name="add_related_product_post[]">';
            foreach( $get_posts as $p ):

                if(in_array($p->ID, $get_allrelated_post))
                {
                    $select = 'selected';
                }else{
                    $select = '';
                }
           
                $out .= '<option value="' . $p->ID. '" '.$select.'>' . esc_html( $p->post_title ) . '</option>';
            endforeach;
            $out .= '</select>';
            echo $out;
            wp_nonce_field( 'my_related_meta_box_nonce', 'related_meta_box_nonce' );

        }
       
        
    }

    function save_related_product( $post_id )
{
    // Stop If Autosaving
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Stop If Nonce Can't Be Verified
    if( !isset( $_POST['related_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['related_meta_box_nonce'], 'my_related_meta_box_nonce' ) ) return;

    // Stop If Unauthorized User
    if( !current_user_can( 'edit_post' ) ) return;

    // Make Sure Data Is Set Then Save 
    if(isset( $_POST['add_related_product_post'] ) ){
        $insert_data =   $_POST['add_related_product_post'];
        update_post_meta( $post_id, 'posts_related_product', $_POST['add_related_product_post']);
    }else{
        delete_post_meta( $post_id, 'posts_related_product');
    }
        
}

add_action( 'save_post', 'save_related_product');