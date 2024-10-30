<?php 

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * @version 1.0.4
 */

if ( ! class_exists( 'CCWP_Admin_Notices' ) ) {

    class CCWP_Admin_Notices {

        private static $_instance;
        private $admin_notices;
        const TYPES = 'error,warning,info,success';

        private function __construct() {
            $this->admin_notices = new stdClass();
            foreach ( explode( ',', self::TYPES ) as $type ) {
                $this->admin_notices->{$type} = [];
            }
            add_action( 'admin_init', [ &$this, 'action_admin_init' ] );
            add_action( 'admin_notices', [ &$this, 'action_admin_notices' ] );
            add_action( 'admin_enqueue_scripts', [ &$this, 'action_admin_enqueue_scripts' ] );
        }

        public static function get_instance() {
            if ( ! ( self::$_instance instanceof self ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function action_admin_init() {
            $dismiss_option = filter_input(INPUT_GET, CCWP_PLUGIN_SLUG.'_dismiss', FILTER_UNSAFE_RAW);
            if ( is_string( $dismiss_option ) ) {
                update_option(CCWP_PLUGIN_SLUG."_dismissed_".$dismiss_option, true);
                if (get_option(CCWP_PLUGIN_SLUG."_dismissed_".$dismiss_option) == 1) {
                    echo 'Successful!';
                    wp_die();
                }
            }
        }

        public function action_admin_enqueue_scripts() {
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script(
                'ccwp-notify',
                CCWP_URL.'assets/admin/js/ccwp-notify.js',
                ['jquery']
            );
        }

        public function action_admin_notices() {
            foreach ( explode(',', self::TYPES) as $type) {
                foreach ( $this->admin_notices->{$type} as $admin_notice ) {
                    $dismiss_url = add_query_arg([CCWP_PLUGIN_SLUG.'_dismiss' => $admin_notice->dismiss_option], admin_url());
                    $screen = get_current_screen();
                    if ( ! get_option( CCWP_PLUGIN_SLUG."_dismissed_{$admin_notice->dismiss_option}" )) {
                        ?><div class="notice is-dismissible ccwp-notice notice-<?php echo $type;
                            if ( $admin_notice->dismiss_option ) {
                                echo ' is-dismissible" data-dismiss-url="' . esc_url( $dismiss_url );
                            } ?>">
                            <div class="ccwp-rate-notice-container">
                                <div class="logo-img">
                                    <img src="<?php echo CCWP_URL.'assets/admin/img/icon.svg'; ?>" alt="<?php echo CCWP_NAME; ?>" style="width:96px">
                                </div>
                                <div>
                                    <h2>🥰 <?php _e('Please rate our free', CCWP_PLUGIN_SLUG); ?>
                                    &laquo;<?php echo CCWP_NAME; ?>&raquo;</h2>
                                    <hr>
                                    <p><?php _e('Your valuable feedback will help us improve.', CCWP_PLUGIN_SLUG); ?><br><?php _e('It will only take a few minutes', CCWP_PLUGIN_SLUG); ?>: <a href="https://wordpress.org/support/plugin/currency-converter-widget-pro/reviews/#new-post" rel="noopener" target="_blank"><?php _e('Rate it now', CCWP_PLUGIN_SLUG); ?></a> 👍</p>
                                    <p><a href="https://wordpress.org/support/plugin/currency-converter-pro/reviews/#new-post" rel="noopener" target="_blank"><img src="<?php echo CCWP_URL.'assets/admin/img/stars.png'; ?>" alt="<?php _e('Rating', CCWP_PLUGIN_SLUG); ?>"></a></p>
                                </div>
                            </div>
                        </div>
                        <style>
                            .ccwp-rate-notice-container {
                                display: flex;
                                padding: 10px 0;
                            }
                            .ccwp-rate-notice-container .logo-img {
                                margin-right: 15px;
                            }
                            .ccwp-rate-notice-container h2 {
                                margin: 0;
                            }
                            .ccwp-rate-notice-container p {
                                padding: 0;
                                margin: 0;
                            }
                        </style><?php
                    }
                }
            }
        }

        public function error( $message, $dismiss_option = false ) {
            $this->notice( 'error', $message, $dismiss_option );
        }

        public function warning( $message, $dismiss_option = false ) {
            $this->notice( 'warning', $message, $dismiss_option );
        }

        public function success( $message, $dismiss_option = false ) {
            $this->notice( 'success', $message, $dismiss_option );
        }

        public function info( $message, $dismiss_option = false ) {
            $this->notice( 'info', $message, $dismiss_option );
        }

        private function notice( $type, $message, $dismiss_option ) {
            $notice = new stdClass();
            $notice->message = $message;
            $notice->dismiss_option = $dismiss_option;
            $this->admin_notices->{$type}[] = $notice;
        }
    }
}
