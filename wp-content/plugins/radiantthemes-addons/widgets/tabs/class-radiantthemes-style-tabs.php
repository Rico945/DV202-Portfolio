<?php/** * Popup Video Addon * * @package Radiantthemes */namespace RadiantthemesAddons\Widgets;use Elementor\Controls_Manager;use Elementor\Group_Control_Typography;use Elementor\Repeater;use Elementor\Widget_Base;if ( ! defined( 'ABSPATH' ) ) {	exit; // Exit if accessed directly.}/** * Elementor Tab widget. * * Elementor widget that displays tab content in various styles. * * @since 1.0.0 */class Radiantthemes_Style_Tabs extends Widget_Base {	/**	 * Retrieve the widget name.	 *	 * @since 1.1.0	 *	 * @access public	 *	 * @return string Widget name.	 */	public function get_name() {		return 'radiant-tabs';	}	/**	 * Retrieve the widget title.	 *	 * @since 1.1.0	 *	 * @access public	 *	 * @return string Widget title.	 */	public function get_title() {		return esc_html__( 'Tabs', 'radiantthemes-addons' );	}	/**	 * Retrieve the widget icon.	 *	 * @since 1.1.0	 *	 * @access public	 *	 * @return string Widget icon.	 */	public function get_icon() {		return 'eicon-tabs';	}	/**	 * Requires css files.	 *	 * @return array	 */	public function get_style_depends() {		return array(			'rt-tab',		);	}	/**	 * Requires js files.	 *	 * @return array	 */	public function get_script_depends() {		return array(			'radiantthemes-tabs',		);	}	/**	 * Retrieve the list of categories the widget belongs to.	 *	 * Used to determine where to display the widget in the editor.	 *	 * Note that currently Elementor supports only one category.	 * When multiple categories passed, Elementor uses the first one.	 *	 * @since 1.1.0	 *	 * @access public	 *	 * @return array Widget categories.	 */	public function get_categories() {		return array( 'radiant-widgets-category' );	}	/**	 * Register the widget controls.	 *	 * Adds different input fields to allow the user to change and customize the widget settings.	 *	 * @since 1.1.0	 *	 * @access protected	 */	protected function register_controls() {		$this->start_controls_section(			'section_tabs_general',			array(				'label' => esc_html__( 'Tab', 'radiantthemes-addons' ),			)		);		$this->add_control(			'radiant_tabsstyle',			array(				'label'       => esc_html__( 'Select Tabs Style', 'radiantthemes-addons' ),				'label_block' => true,				'type'        => Controls_Manager::SELECT,				'options'     => array(					'one'    => esc_html__( 'Style One', 'radiantthemes-addons' ),					'two'    => esc_html__( 'Style Two (Switch Toggle)', 'radiantthemes-addons' ),					'three'  => esc_html__( 'Style Three', 'radiantthemes-addons' ),					'four'   => esc_html__( 'Style Four', 'radiantthemes-addons' ),					'five'   => esc_html__( 'Style Five', 'radiantthemes-addons' ),					'six'    => esc_html__( 'Style Six', 'radiantthemes-addons' ),					'seven'  => esc_html__( 'Style Seven', 'radiantthemes-addons' ),					'eight'  => esc_html__( 'Style Eight', 'radiantthemes-addons' ),					'nine'   => esc_html__( 'Style Nine', 'radiantthemes-addons' ),					'ten'    => esc_html__( 'Style Ten', 'radiantthemes-addons' ),					'eleven' => esc_html__( 'Style Eleven', 'radiantthemes-addons' ),					'twelve' => esc_html__( 'Vertical Tabs', 'radiantthemes-addons' ),				),				'default'     => 'one',			)		);        $this->add_responsive_control(			'align_nav',			array(				'label'     => esc_html__( 'Tab Title Alignment', 'radiantthemes-addons' ),				'type'      => Controls_Manager::CHOOSE,				'options'   => array(					'left'    => array(						'title' => esc_html__( 'Left', 'radiantthemes-addons' ),						'icon'  => 'eicon-text-align-left',					),					'center'  => array(						'title' => esc_html__( 'Center', 'radiantthemes-addons' ),						'icon'  => 'eicon-text-align-center',					),					'right'   => array(						'title' => esc_html__( 'Right', 'radiantthemes-addons' ),						'icon'  => 'eicon-text-align-right',					),					'justify' => array(						'title' => esc_html__( 'Justified', 'radiantthemes-addons' ),						'icon'  => 'eicon-text-align-justify',					),				),				'selectors' => array(			'{{WRAPPER}} .rt-tab.element-one > ul.nav-tabs' => 'text-align: {{VALUE}};',							),				'condition' =>								array(									'radiant_tabsstyle' => 'one',														),			)		); 		$repeater = new Repeater();		$repeater->add_control(			'tabs_title',			array(				'label'       => esc_html__( 'Tab Title', 'radiantthemes-addons' ),				'type'        => Controls_Manager::TEXT,				'default'     => esc_html__( 'Tab Title', 'radiantthemes-addons' ),				'dynamic'     => array(					'active' => true,				),				'label_block' => true,			)		);		$repeater->add_control(			'tabs_content',			array(				'label'      => esc_html__( 'Tab Content', 'radiantthemes-addons' ),				'type'       => Controls_Manager::WYSIWYG,				'default'    => esc_html__( 'Tab Content', 'radiantthemes-addons' ),				'show_label' => false,			)		);		$repeater->add_control(			'tabs_id_random',			array(				'label'   => esc_html__( 'Tab Id', 'radiantthemes-addons' ),				'type'    => Controls_Manager::HIDDEN,				'default' => '#' . substr( str_shuffle( '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ), 0, 16 ),			)		);		$this->add_control(			'rt-tabs',			array(				'label'       => esc_html__( 'Tab Items', 'radiantthemes-addons' ),				'type'        => Controls_Manager::REPEATER,				'fields'      => $repeater->get_controls(),				'default'     => array(					array(						'tabs_title'   => esc_html__( 'Tab #1', 'radiantthemes-addons' ),						'tabs_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),					),					array(						'tabs_title'   => esc_html__( 'Tab #2', 'radiantthemes-addons' ),						'tabs_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),					),				),				'title_field' => '{{{ tabs_title }}}',			)		);		$this->add_control(			'tag',			array(				'label'       => __( 'Tagline', 'radiantthemes-addons' ),				'type'        => Controls_Manager::TEXT,				'label_block' => true,				'condition' =>								array(									'radiant_tabsstyle' => 'two',														),				)		);        		$this->end_controls_section();		$this->start_controls_section(			'section_tabs_style',			array(				'label' => esc_html__( 'Style', 'radiantthemes-addons' ),				'tab'   => Controls_Manager::TAB_STYLE,			)		);		$this->add_control(			'radiant_tab_color',			array(				'label'     => esc_html__( 'Tab Background Color ', 'radiantthemes-addons' ),				'type'      => Controls_Manager::COLOR,				'selectors' => array(                   '{{WRAPPER}} .rt-tab.element-one > ul.nav-tabs .nav-link' => 'background: {{VALUE}}',				),				'condition' =>								array(									'radiant_tabsstyle' => 'one',														),			)		);		$this->add_control(			'radiant_tab_active_color',			array(				'label'     => esc_html__( 'Tab Active Background Color ', 'radiantthemes-addons' ),				'type'      => Controls_Manager::COLOR,				'selectors' => array(				'{{WRAPPER}} .rt-tab.element-one > ul.nav-tabs .nav-link.active' => 'background: {{VALUE}}',				),				'condition' =>								array(									'radiant_tabsstyle' => 'one',														),			)		);		$this->add_control(			'radiant_tab_switch_color',			array(				'label'     => esc_html__( 'Tab switch Color ', 'radiantthemes-addons' ),				'type'      => Controls_Manager::COLOR,				'selectors' => array(				'{{WRAPPER}} .rt-tab.element-two > ul.nav-tabs > li' => 'background: {{VALUE}}',				),				'condition' =>								array(									'radiant_tabsstyle' => 'two',														),			)		);		$this->add_group_control(			Group_Control_Typography::get_type(),				array(			      'name'     => 'tab_title_typography',     			  'label'    => esc_html__( 'Title Typography ', 'radiantthemes-addons' ),     			  'selector' => '{{WRAPPER}} .rt-tab > ul.nav-tabs > li > a > span,{{WRAPPER}} .rt-tab.element-two > ul.nav-tabs > li > a',     			  			)		);		$this->add_control(			'radiant_tab_active_Titlecolor',			array(				'label'     => esc_html__( 'Tab Active Title Color ', 'radiantthemes-addons' ),				'type'      => Controls_Manager::COLOR,				'selectors' => array(				'{{WRAPPER}} .rt-tab.element-one > ul.nav-tabs .nav-link.active' => 'color: {{VALUE}}',				'{{WRAPPER}} .rt-tab.element-two > ul.nav-tabs > li > a.active' => 'color: {{VALUE}}',				),			)		);		$this->add_control(			'radiant_tab_Titlecolor',			array(				'label'     => esc_html__( 'Tab Title Color ', 'radiantthemes-addons' ),				'type'      => Controls_Manager::COLOR,				'selectors' => array(				'{{WRAPPER}} .rt-tab.element-one > ul.nav-tabs .nav-link' => 'color: {{VALUE}}',				'{{WRAPPER}} .rt-tab.element-two > ul.nav-tabs > li > a' => 'color: {{VALUE}}',				),			)		);				$this->add_group_control(			Group_Control_Typography::get_type(),			array(				'name'     => 'tab_content_typography',				'label'    => esc_html__( 'Content Typography ', 'radiantthemes-addons' ),				'selector' => '{{WRAPPER}} .tab-content > .active',			)		);        $this->add_group_control(			Group_Control_Typography::get_type(),			array(				'name'     => 'tag_typography',				'label'    => esc_html__( 'Tag Typography ', 'radiantthemes-addons' ),				'selector' => '{{WRAPPER}} .rt-tab.element-two .switch-tag',				'condition' =>								array(									'radiant_tabsstyle' => 'two',														),			)		);		$this->add_control(			'tag_color',			array(				'label'     => esc_html__( 'Tag Color ', 'radiantthemes-addons' ),				'type'      => Controls_Manager::COLOR,				'selectors' => array(					'{{WRAPPER}} .rt-tab.element-two .switch-tag' => 'color: {{VALUE}}',				),				'condition' =>								array(									'radiant_tabsstyle' => 'two',														),			)		);		$this->end_controls_section();	}	/**	 * Render the widget output on the frontend.	 *	 * Written in PHP and used to generate the final HTML.	 *	 * @since 1.1.0	 *	 * @access protected	 */	protected function render() {		$settings = $this->get_settings_for_display();$r=rand();		$output  = '';$d = ''; $d1=$d;        if ($settings['radiant_tabsstyle'] =="twelve"){        $d = 'col-md-3'; $d1 = 'col-md-9';        }		$output .= '<div class="rt-tab element-' . esc_attr( $settings['radiant_tabsstyle'] ) . '">';		if ($settings['radiant_tabsstyle'] =="two"){         $output .= "<div class='switch-tag'>";		 $output .= $settings['tag'];		 $output .= "</div>";	    }		$output .= '<ul class="nav nav-tabs">';$c=1;		foreach ( $settings['rt-tabs'] as $index => $item ) :        $c = ( $c==1 ? "active" : "");			$tab_title = preg_replace( '/\s*/', '', $item['tabs_title'] );			$tab_title = preg_replace( '/[^A-Za-z0-9\-]/', '', $item['tabs_title'] );			$tab_title = strtolower( $tab_title );			$output .= '<li class="matchHeight nav-item">';  			$output .= '<a class="nav-link ' . $c . '" data-toggle="tab" href="#' . esc_attr( $tab_title ) .$r. '" role="tab"><span>';			$output .= esc_attr( $item['tabs_title'] );			$output .= '</span></a>';			$output .= '</li>';		endforeach;		     		$output .= '</ul>';		$output .= '<div class="tab-content">';$b=1;		foreach ( $settings['rt-tabs'] as $index => $item ) :$b = ( $b==1 ? "active" : "");			$tab_title = preg_replace( '/\s*/', '', $item['tabs_title'] );			$tab_title = preg_replace( '/[^A-Za-z0-9\-]/', '', $item['tabs_title'] );			$tab_title = strtolower( $tab_title );$output .= '<div class="tab-pane ' . $b . '" id="' . esc_attr( $tab_title ) .$r. '" role="tabpanel">';		$output .= $item['tabs_content'];	$output .= '</div>';		endforeach;		$output .= '</div>';		$output .= '</div>';		echo $output;	}}