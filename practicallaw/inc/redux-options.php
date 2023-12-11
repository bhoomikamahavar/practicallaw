<?php

/**
 *  practicallawlite Theme Setup and Require Files
 */

define( 'PRACTICALLAW_PLUGIN_DEV_ON' , 0 );

if( ! class_exists( 'Practical_Law_Redux' ) ){

    /**
     *  practicallawlite Setup
     */
    class Practical_Law_Redux{

        /**
         * Member Variable
         *
         * @var instance
         */
        private static $instance;

        /**
         *  Initiator
         */
        public static function get_instance() {
          
            if ( ! isset( self::$instance ) ) {
              self::$instance = new self;
            }
            return self::$instance;
        }

        public function __construct() {

            if( class_exists( 'Redux' ) ) :

                Redux:: setArgs( self:: redux_name(), self:: practicallawlite_redux_setup() );

                Redux:: setSection( self:: redux_name(), self:: practicallawlite_redux_typography_setting() );

                Redux:: setSection( self:: redux_name(), self:: practicallawlite_redux_color_setting() );

                Redux:: setSection( self:: redux_name(), self:: practicallawlite_redux_header_section_setting() );

                Redux:: setSection( self:: redux_name(), self:: practicallawlite_redux_page_header_setting() );

                Redux:: setSection( self:: redux_name(), self:: practicallawlite_redux_error_setting() );

            endif;
        }

        public static function redux_name(){

            return esc_html( 'practicallawlite' );
        }

        public static function practicallawlite_redux_setup(){

            return      array(
                            'opt_name'             => self:: redux_name(),
                            'display_name'         => sanitize_title( wp_get_theme()->get('Name') ),
                            'display_version'      => esc_attr( wp_get_theme()->get('Version') ),
                            'menu_type'            => 'menu',
                            'allow_sub_menu'       => false,
                            'menu_title'           => __('Practicallawlite Options', 'practicallawlite'),
                            'page_title'           => __('Practicallawlite Options', 'practicallawlite'),
                            
                            'google_api_key'       => '',
                            'google_update_weekly' => false,
                            'async_typography'     => true,
                            'admin_bar'            => false,
                            'admin_bar_icon'       => 'dashicons-portfolio',
                            'admin_bar_priority'   => 50,
                            'global_variable'      => 'wc_setting',
                            'dev_mode'             => false,
                            'update_notice'        => false,
                            'customizer'           => true,
                            'page_priority'        => null,
                            'page_parent'          => 'themes.php',
                            'page_permissions'     => 'manage_options',
                            'menu_icon'            => '',
                            'last_tab'             => '',
                            'page_icon'            => 'icon-themes',
                            'page_slug'            => '',
                            'save_defaults'        => true,
                            'default_show'         => false,
                            'default_mark'         => '',
                            'show_import_export'   => true,

                            'transient_time'       => 60 * MINUTE_IN_SECONDS,
                            'output'               => true,
                            'output_tag'           => true,
                        );
        }

        public static function practicallawlite_redux_typography_setting(){

               Redux::setSection( self:: redux_name(), array(

                    'title'            => esc_html__('Typography', 'practicallawlite'),
                    'id'               => 'typography',
                    'icon'             => 'el el-font',
               ));

               Redux::setSection( self:: redux_name(), self:: body_and_content_setting() );
               Redux::setSection( self:: redux_name(), self:: heading_setting() );

        }

        public static function body_and_content_setting(){

            return

            array(

                'title'            => esc_html__('Body & Content', 'practicallawlite'),
                'id'               => 'body_and_content_tab',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'          =>  'body_typography',
                            'title'     =>  esc_html__('Body', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Typography', 'practicallawlite'),
                            'type'        => 'typography',
                            'output'      =>  array('body'),
                            'units'       =>'px',
                            'font-family' => true,
                            'font-weight' => true,
                            'text-align'  => false,
                            'font-size'   => true,
                            'font-style'  => false,
                            'line-height' => true,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,                     
                            'default'     => array(
                                'font-family' => 'Noto Serif',
                                'font-size'   => '16px',
                                'font-weight' => '400',
                                'line-height' => '32px'
                            ),
                        ),
                        array(
                            'id'             => 'p_margin_bottom',
                            'type'           => 'spacing',
                            'output'         => array('p'),
                            'mode'           => 'margin',
                            'units'          => array('em', 'px'),
                            'units_extended' => 'false',
                            'title'     =>  esc_html__('Paragraph', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Margin Bottom Space', 'practicallawlite'),
                            'default'            => array(
                                'margin-bottom'  => '',
                                'units'          => 'px',
                            ),
                            'top'     => false,
                            'right'   => false,
                            'left'    => false,
                            'bottom'  => true,
                        ),
                        array(
                            'id'        => 'heading_fontfamily',
                            'type'      => 'typography',
                            'title'     =>  esc_html__('Heading ( H1 to H6 )', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Typography', 'practicallawlite'),
                            'output'    => array('h1','h2','h3','h4','h5','h6'),
                            'font-family' => true,
                            'font-weight' => true,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,
                            'text-transform' => true,                    
                            'default'     => array(
                                'font-family' => 'Montserrat',
                                'font-weight' => '400',
                                'text-transform' => '',
                            ),
                        ),
                    )
            );
        }

        public static function heading_setting(){

            return

            array(

                'title'            => esc_html__('Heading', 'practicallawlite'),
                'id'               => 'heading_tab',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'h1_fontsize',
                            'title'     =>  esc_html__('H1 Heading', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Font Size', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h1'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => true,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'font-size' => '36px'
                            ),
                        ),
                        array(
                            'id'        =>  'h2_fontsize',
                            'title'     =>  esc_html__('H2 Heading', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Font Size', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h2'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => true,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'font-size' => '26px'
                            ),
                        ),
                        array(
                            'id'        =>  'h3_fontsize',
                            'title'     =>  esc_html__('H3 Heading', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Font Size', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h3'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => true,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'font-size' => '22px'
                            ),
                        ),
                        array(
                            'id'        =>  'h4_fontsize',
                            'title'     =>  esc_html__('H4 Heading', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Font Size', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h4'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => true,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'font-size' => '20px'
                            ),
                        ),
                        array(
                            'id'        =>  'h5_fontsize',
                            'title'     =>  esc_html__('H5 Heading', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Font Size', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h5'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => true,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'font-size' => '16px'
                            ),
                        ),
                        array(
                            'id'        =>  'h6_fontsize',
                            'title'     =>  esc_html__('H6 Heading', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Font Size', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h6'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => true,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => false,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'font-size' => '12px'
                            ),
                        ),
                    )
            );
        }

        public static function practicallawlite_redux_color_setting(){

               Redux::setSection( self:: redux_name(), array(

                    'title'            => esc_html__('Color', 'practicallawlite'),
                    'id'               => 'color',
                    'icon'             => 'el el-brush',
               ));

               Redux::setSection( self:: redux_name(), self:: body_color_setting() );
               Redux::setSection( self:: redux_name(), self:: heading_color_setting() );
               Redux::setSection( self:: redux_name(), self:: accent_color_setting() );
               Redux::setSection( self:: redux_name(), self:: button_color_setting() );

        }

        public static function body_color_setting(){

            return

            array(

                'title'            => esc_html__('Body', 'practicallawlite'),
                'id'               => 'body_tab',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'body_background',
                            'title'     =>  esc_html__('Body', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Background Color', 'practicallawlite'),
                            'type'      => 'background',
                            'output'    => array('body'),
                            'background-color' => true,
                            'background-repeat'=> false,
                            'background-attachment'=> false,
                            'background-position'=> false,
                            'background-image' => false,
                            'background-clip'=> false,
                            'background-origin' => false,
                            'background-size'=> false,
                            'preview_media'=> false,
                            'preview' => false,
                            'transparent'=>false,
                            'default'     => array(
                                'background-color' => '#ffffff'
                            ),
                        ),
                        array(
                            'id'        =>  'body_color',
                            'title'     =>  esc_html__('Body', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('body'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#55595d'
                            ),
                        ),
                    )
            );
        }

        public static function heading_color_setting(){

            return

            array(

                'title'            => esc_html__('Heading', 'practicallawlite'),
                'id'               => 'heading_tab2',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'h1_color',
                            'title'     =>  esc_html__('H1', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h1'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#113d71'
                            ),
                        ),
                        array(
                            'id'        =>  'h2_color',
                            'title'     =>  esc_html__('H2', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h2'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#113d71'
                            ),
                        ),
                        array(
                            'id'        =>  'h3_color',
                            'title'     =>  esc_html__('H3', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h3'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#113d71'
                            ),
                        ),
                        array(
                            'id'        =>  'h4_color',
                            'title'     =>  esc_html__('H4', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h4'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#113d71'
                            ),
                        ),
                        array(
                            'id'        =>  'h5_color',
                            'title'     =>  esc_html__('H5', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h5'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#113d71'
                            ),
                        ),
                        array(
                            'id'        =>  'h6_color',
                            'title'     =>  esc_html__('H6', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('h6'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#113d71'
                            ),
                        ),
                    )
            );
        }

        public static function accent_color_setting(){

            return

            array(

                'title'            => esc_html__('Accent', 'practicallawlite'),
                'id'               => 'accent_tab',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'a_color',
                            'title'     =>  esc_html__('Accent', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Accent Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('a'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#55595d'
                            ),
                        ),
                        array(
                            'id'        =>  'a_coloreffects',
                            'title'     =>  esc_html__('Hover', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Accent Hover Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('a:hover'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#c38d3f'
                            ),
                        ),
                    )
            );
        }

        public static function button_color_setting(){

            return

            array(

                'title'            => esc_html__('Button', 'practicallawlite'),
                'id'               => 'button_customization',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'primary_btn',
                            'title'     =>  esc_html__('Primary Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Background Color', 'practicallawlite'),
                            'type'      => 'background',
                            'output'    => array('.btn-primary'),
                            'background-color' => true,
                            'background-repeat'=> false,
                            'background-attachment'=> false,
                            'background-position'=> false,
                            'background-image' => false,
                            'background-clip'=> false,
                            'background-origin' => false,
                            'background-size'=> false,
                            'preview_media'=> false,
                            'preview' => false,
                            'transparent'=>false,
                            'default'     => array(
                                'background-color' => '#55595d'
                            ),
                        ),
                        array(
                            'id'        =>  'primary_btn_color',
                            'title'     =>  esc_html__('Primary Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('.btn-primary'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#ffffff'
                            ),
                        ),
                        array(
                            'id'        =>  'primary_btn_hover',
                            'title'     =>  esc_html__('Primary Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Hover Background Color', 'practicallawlite'),
                            'type'      => 'background',
                            'output'    => array('.btn-primary:hover','.btn-primary.hover'),
                            'background-color' => true,
                            'background-repeat'=> false,
                            'background-attachment'=> false,
                            'background-position'=> false,
                            'background-image' => false,
                            'background-clip'=> false,
                            'background-origin' => false,
                            'background-size'=> false,
                            'preview_media'=> false,
                            'preview' => false,
                            'transparent'=>false,
                            'default'     => array(
                                'background-color' => '#494b4e'
                            ),
                        ),
                        array(
                            'id'        =>  'primary_btn_focus',
                            'title'     =>  esc_html__('Primary Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Focus Background Color', 'practicallawlite'),
                            'type'      => 'background',
                            'output'    => array('.btn-primary.focus','.btn-primary:focus'),
                            'background-color' => true,
                            'background-repeat'=> false,
                            'background-attachment'=> false,
                            'background-position'=> false,
                            'background-image' => false,
                            'background-clip'=> false,
                            'background-origin' => false,
                            'background-size'=> false,
                            'preview_media'=> false,
                            'preview' => false,
                            'transparent'=>false,
                            'default'     => array(
                                'background-color' => '#494b4e'
                            ),
                        ),
                        array(
                            'id'        =>  'primary_btnhover_color',
                            'title'     =>  esc_html__('Primary Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Hover Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('.btn-primary:hover','.btn-primary.hover'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#ffffff'
                            ),
                        ),
                        array( 
                            'id'       => 'primary_border_color',
                            'type'     => 'border',
                            'title'     =>  esc_html__('Primary Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Border Color', 'practicallawlite'),
                            'output'   => array('.btn-primary'),
                            'default'  => array(
                                'border-color'  => '#55595d', 
                                'border-style'  => 'solid', 
                                'border-top'    => '2px', 
                                'border-right'  => '2px', 
                                'border-bottom' => '2px', 
                                'border-left'   => '2px'
                            ),
                        ),
                        array( 
                            'id'       => 'primary_border_hovercolor',
                            'type'     => 'border',
                            'title'     =>  esc_html__('Primary Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Border Hover Color', 'practicallawlite'),
                            'output'   => array('.btn-primary:hover','.btn-primary.hover','.btn-primary.focus','.btn-primary:focus'),
                            'default'  => array(
                                'border-color'  => '#494b4e', 
                                'border-style'  => 'solid', 
                                'border-top'    => '2px', 
                                'border-right'  => '2px', 
                                'border-bottom' => '2px', 
                                'border-left'   => '2px'
                            )
                        ),

                        array(
                            'id'        =>  'default_btn',
                            'title'     =>  esc_html__('Default Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Background Color', 'practicallawlite'),
                            'type'      => 'background',
                            'output'    => array('.btn-default'),
                            'background-color' => true,
                            'background-repeat'=> false,
                            'background-attachment'=> false,
                            'background-position'=> false,
                            'background-image' => false,
                            'background-clip'=> false,
                            'background-origin' => false,
                            'background-size'=> false,
                            'preview_media'=> false,
                            'preview' => false,
                            'transparent'=>false,
                            'default'     => array(
                                'background-color' => '#c38d3f'
                            ),
                        ),
                        array(
                            'id'        =>  'default_btn_color',
                            'title'     =>  esc_html__('Default Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('.btn-default'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#ffffff'
                            ),
                        ),
                        array(
                            'id'        =>  'default_btn_hover',
                            'title'     =>  esc_html__('Default Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Hover Background Color', 'practicallawlite'),
                            'type'      => 'background',
                            'output'    => array('.btn-default:hover','.btn-default.hover'),
                            'background-color' => true,
                            'background-repeat'=> false,
                            'background-attachment'=> false,
                            'background-position'=> false,
                            'background-image' => false,
                            'background-clip'=> false,
                            'background-origin' => false,
                            'background-size'=> false,
                            'preview_media'=> false,
                            'preview' => false,
                            'transparent'=>false,
                            'default'     => array(
                                'background-color' => '#b07a2b'
                            ),
                        ),
                        array(
                            'id'        =>  'default_btn_focus',
                            'title'     =>  esc_html__('Default Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Focus Background Color', 'practicallawlite'),
                            'type'      => 'background',
                            'output'    => array('.btn-default.focus','.btn-default:focus'),
                            'background-color' => true,
                            'background-repeat'=> false,
                            'background-attachment'=> false,
                            'background-position'=> false,
                            'background-image' => false,
                            'background-clip'=> false,
                            'background-origin' => false,
                            'background-size'=> false,
                            'preview_media'=> false,
                            'preview' => false,
                            'transparent'=>false,
                            'default'     => array(
                                'background-color' => '#b07a2b'
                            ),
                        ),
                        array(
                            'id'        =>  'default_btnhover_color',
                            'title'     =>  esc_html__('Default Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Hover Text Color', 'practicallawlite'),
                            'type'      => 'typography',
                            'output'    => array('.btn-default:hover','.btn-default.hover'),
                            'font-family' => false,
                            'font-weight' => false,
                            'font-style'  => false,
                            'text-align'  => false,
                            'font-size'   => false,
                            'line-height' => false,
                            'font-color'  => false,
                            'color'       => true,
                            'subsets'     => false,
                            'text-transform' => false,                       
                            'default'     => array(
                                'color' => '#ffffff'
                            ),
                        ),
                        array( 
                            'id'       => 'default_border_color',
                            'type'     => 'border',
                            'title'     =>  esc_html__('Default Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Border Color', 'practicallawlite'),
                            'output'   => array('.btn-default'),
                            'default'  => array(
                                'border-color'  => '#c38d3f', 
                                'border-style'  => 'solid', 
                                'border-top'    => '2px', 
                                'border-right'  => '2px', 
                                'border-bottom' => '2px', 
                                'border-left'   => '2px'
                            ),
                        ),
                        array( 
                            'id'       => 'default_border_hovercolor',
                            'type'     => 'border',
                            'title'     =>  esc_html__('Default Button', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Border Hover Color', 'practicallawlite'),
                            'output'   => array('.btn-default:hover','.btn-default.hover','.btn-default.focus','.btn-default:focus'),
                            'default'  => array(
                                'border-color'  => '#b07a2b', 
                                'border-style'  => 'solid', 
                                'border-top'    => '2px', 
                                'border-right'  => '2px', 
                                'border-bottom' => '2px', 
                                'border-left'   => '2px'
                            )
                        ),
                        
                    )
            );
        }

        public static function practicallawlite_redux_header_section_setting(){

               Redux::setSection( self:: redux_name(), array(

                    'title'            => esc_html__('Header Setting', 'practicallawlite'),
                    'id'               => 'header_settings',
                    'icon'             => 'el el-brush',
               ));

               Redux::setSection( self:: redux_name(), self:: header_logo_setting() );
               // Redux::setSection( self:: redux_name(), self:: header_top_left_content_setting() );

        }

        public static function header_logo_setting(){

            return

            array(

                'title'            => esc_html__('Logo', 'practicallawlite'),
                'id'               => 'logo_tab',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'logo_upload',
                            'title'     =>  esc_html__('Logo', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Header Logo Upload', 'practicallawlite'),
                            'type'      => 'media',
                        ),
                    )
            );

        }

        public static function header_top_left_content_setting(){

            return

            array(

                'title'            => esc_html__('Header Content', 'practicallawlite'),
                'id'               => 'header_content',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'header_content_left',
                            'title'     =>  esc_html__('Header Content', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Left Side Content', 'practicallawlite'),
                            'type'      => 'multi_text',
                            'fields'     => array(
                                array(
                                    'id'    => 'textt',
                                    'type'  => 'text',
                                    'title' => 'name',
                                ),
                            ),
                        ),

                        array(
                            'id'        =>  'header_content_right',
                            'title'     =>  esc_html__('Header Content', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Right Side Content', 'practicallawlite'),
                            'type'      => 'multi_text',
                            'fields'     => array(
                                array(
                                    'id'    => 'textt',
                                    'type'  => 'text',
                                ),
                            ),
                        ),
                    )
            );

        }

        public static function practicallawlite_redux_page_header_setting(){

               Redux::setSection( self:: redux_name(), array(

                    'title'            => esc_html__('Page Header Setting', 'practicallawlite'),
                    'id'               => 'page_header_settings',
                    'icon'             => 'el el-brush',
               ));

               Redux::setSection( self:: redux_name(), self:: page_header_image_setting() );
               // Redux::setSection( self:: redux_name(), self:: header_top_left_content_setting() );

        }

        public static function page_header_image_setting(){

            return

            array(

                'title'            => esc_html__('Page Header Image', 'practicallawlite'),
                'id'               => 'page_header_bg_img',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'ph_bgimg',
                            'title'     =>  esc_html__('Page header', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Background Image', 'practicallawlite'),
                            'type'      => 'media',
                        ),
                    )
            );

        }

        public static function practicallawlite_redux_error_setting(){

               Redux::setSection( self:: redux_name(), array(

                    'title'            => esc_html__('404 Page Setting', 'practicallawlite'),
                    'id'               => 'error_settings',
                    'icon'             => 'el el-brush',
               ));

               Redux::setSection( self:: redux_name(), self:: error_page_setting() );
               // Redux::setSection( self:: redux_name(), self:: header_top_left_content_setting() );

        }

        public static function error_page_setting(){

            return

            array(

                'title'            => esc_html__('Error Page Setting', 'practicallawlite'),
                'id'               => 'error_page_setting',
                'subsection'       => true,
                'fields'           =>

                    array(

                        array(
                            'id'        =>  'error_img',
                            'title'     =>  esc_html__('404 Page', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Image', 'practicallawlite'),
                            'type'      => 'media',
                        ),
                        array(
                            'id'        =>  'error_title',
                            'title'     =>  esc_html__('404 Page', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Title', 'practicallawlite'),
                            'type'      => 'text',
                            'default'   => '404 Error',
                        ),
                        array(
                            'id'        =>  'error_subtitle',
                            'title'     =>  esc_html__('404 Page', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Sub Title', 'practicallawlite'),
                            'type'      => 'text',
                            'default'   => 'Sorry, the page not found',
                        ),
                        array(
                            'id'        =>  'error_desc',
                            'title'     =>  esc_html__('404 Page', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Description', 'practicallawlite'),
                            'type'      => 'text',
                            'default'   => 'The link you followed may be broken, or the page may have been removed.',
                        ),
                        array(
                            'id'        =>  'error_btn',
                            'title'     =>  esc_html__('404 Page', 'practicallawlite'),
                            'subtitle'  =>  esc_html__('Button', 'practicallawlite'),
                            'type'      => 'text',
                            'default'   => 'view our results',
                        ),
                    )
            );

        }

        /**
         *  Theme Option value function to get method.
         */

        public static function wc_option( $id ) {

            if( ! class_exists( 'Redux' ) )
                return;

            global $wc_setting;

            $output = ( isset( $wc_setting[ $id ] ) && $wc_setting[ $id ] != '' ) ? $wc_setting[ $id ] : false;
            
            if ( ! empty( $wc_setting[ $id ] ) ) {
                $output = $wc_setting[ $id ];
            }

            return $output;
        }

        public static function practicallawlite_get_link( $id ) {

            if( ! class_exists( 'Redux' ) )
                return;

            $_get_data = self:: wc_option( $id );

            return $_get_data[ 'url' ];
        }
    }

    /**
    *  Kicking this off by calling 'get_instance()' method
    */
    Practical_Law_Redux::get_instance();
}
