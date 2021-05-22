<?php


/* Our Team */
if(!function_exists('my_topbar_type_type')){
    function my_topbar_type_type() {
        register_post_type( 'topbar',
            array(
                'label'               => ("Header Featured logos"),
                'singular_label'      => ("topbar"),
                '_builtin'            => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_nav_menus'   => false,
                'rewrite'             => array(
                                            'slug'       => 'topbar-view',
                                            'with_front' => FALSE,
                                        ),
                'supports' => array(
                                'title',
                            'thumbnail',
                            )
            )
        );

        }

    }

    add_action('init', 'my_topbar_type_type');