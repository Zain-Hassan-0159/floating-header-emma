<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Floating Header Emma.
 *
 *
 * @since 1.0.0
 */
class Elementor_Fhe_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Floating Header widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fhe';
	}

	/**
	 * Get widget title.
	 *
	 * Floating Header widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Floating Header Emma', 'hz-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Floating Header widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-header';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'header', 'nav', 'floating header', 'emma' ];
	}

    public function get_script_depends() {
		return [ 'floating-nav-emma' ];
	}


	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'General', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'float_container_width',
			[
				'label' => esc_html__( 'Float Nav Width', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 750,
				],
				'selectors' => [
					'{{WRAPPER}} .floating_header' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'position_From_bottom',
			[
				'label' => esc_html__( 'Position From Bottom', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .floating_header' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'target_id',
			[
				'label' => esc_html__( 'Target Section ID', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '' , 'hz-widgets' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'float_list',
			[
				'label' => esc_html__( 'Add Float Items', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_title' => esc_html__( 'Benefits', 'hz-widgets' ),
					],
					[
						'item_title' => esc_html__( 'Services', 'hz-widgets' ),
					],
					[
						'item_title' => esc_html__( 'Team', 'hz-widgets' ),
					],
					[
						'item_title' => esc_html__( 'Plans', 'hz-widgets' ),
					],
					[
						'item_title' => esc_html__( 'Client Login', 'hz-widgets' ),
					],
					[
						'item_title' => esc_html__( 'Contact Us', 'hz-widgets' ),
					],
				],
				'title_field' => '{{{ item_title }}}',
			]
		);


        $this->end_controls_section();

		$this->start_controls_section(
			'style_section_normal',
			[
				'label' => esc_html__( 'General Style', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .floating_header ul' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'section_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .floating_header ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'section_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 80,
					'right' => 80,
					'bottom' => 80,
					'left' => 80,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .floating_header ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_item_float',
			[
				'label' => esc_html__( 'Item Style', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'background_color_item',
			[
				'label' => esc_html__( 'Button Background Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .floating_header ul a.step-link.active' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .floating_header ul a.step-link' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'item_padding',
			[
				'label' => esc_html__( 'Button Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 10,
					'right' => 30,
					'bottom' => 10,
					'left' => 30,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .floating_header ul a.step-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'item_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 50,
					'right' => 50,
					'bottom' => 50,
					'left' => 50,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .floating_header ul a.step-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'float_label_typography',
				'label' => esc_html__( 'Text Typography', 'hz-widgets' ),
				'selector' => '{{WRAPPER}} .floating_header ul a.step-link',
			]
		);

		$this->end_controls_section();
	}



	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();


        ?>
		<style>
            .floating_header ul {
                margin: 0;
                list-style: none;
                display: flex;
                justify-content: space-between;
                align-items: center;
				padding: 10px;
                border-radius: 80px;
                background: rgb(45, 10, 36);
            }

            .floating_header ul a.step-link {
                padding: 10px 30px;
                border-radius: 50px;
                color: white;
                display: inline-block;
                font-weight: 600;
                transition: all 0.3s ease-in-out;
            }

            .floating_header ul a.step-link.active{
                background: rgb(124, 40, 98);
            }

            .floating_header {
                margin: auto;
                width: 100%;
                position: fixed;
                bottom: 20px;
                z-index: 999;
                left: 0;
                right: 0;
            }

			.floating_header ul li{
				display: flex;
			}

			@media(max-width: 900px){
				.floating_header {
					max-width: 510px;
				}

				.floating_header ul a.step-link {
					font-size: 14px;
					padding: 5px 10px;
				}

				.floating_header ul{
					margin: 0 20px;
					padding: 10px;
				}
			}

			@media(max-width: 500px){
				.floating_header ul a.step-link {
					font-size: 9px;
					font-weight: normal;
					padding: 2px 6px;
					border-radius: 8px;
				}

				.floating_header ul{
					margin: 0 20px;
					padding: 4px;
				}
			}
		</style>
        <div class="floating_header">
            <nav>
				<?php if($settings['float_list']) : 
					$counter = 1;
				?>
                <ul>
					<?php foreach($settings['float_list'] as $item) : ?>
                    <li>
                        <a data-href="#<?php echo $item['target_id'] ?>" href="#<?php echo $item['target_id'] ?>"  class="<?php echo $counter !== count($settings['float_list']) ? 'step-link' : 'step-link active'; ?>">
                            <?php echo $item['item_title'] ?>
                        </a>
                    </li>
					<?php 
					$counter++;
					endforeach; 
					?>
                </ul>
				<?php endif; ?>
            </nav>
        </div>
        <?php     if ( \Elementor\Plugin::$instance->editor->is_edit_mode()) : ?>
			<script>
			jQuery(document).ready(function ($) {

				const floating_header = $('.floating_header');
				const selected_sections = floating_header.find('ul li a');

				// Attach scroll event listener
				$(window).scroll(function () {
                    selected_sections.each(function(){
                        const distanceFromTop = $(window).scrollTop();
                        const item = $(this);
                        const itemTop = $(item.data('href'))?.offset()?.top;
                        if((distanceFromTop + 150) > itemTop){
                            selected_sections.removeClass('active')
                            item.addClass("active")
                        }
                    })
                });

				selected_sections.on("click", function(){
					selected_sections.removeClass("active");
                    $(this).addClass("active");
				})
			});
		</script>
        <?php  endif; ?>
		<?php
	}

}