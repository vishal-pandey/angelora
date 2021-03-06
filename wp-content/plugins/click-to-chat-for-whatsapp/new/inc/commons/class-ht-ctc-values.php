<?php
/**
 * variables/values.. db values.. 
 * 
 * ht_ctc()->values->ctc_options['number'];
 * or
 * $values = ht_ctc()->values->ctc_options;
 *      $values["number"];
 * 
 * similar to variables.php in /prev
 * @package ctc
 * @since 2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'HT_CTC_Values' ) ) :

class HT_CTC_Values {

    /**
     * db options table - ht_ctc_main_options values
     * 
     * @var array get_options ht_ctc_main_options
     */
    public $ctc_chat;

    public function __construct() {
        $this->ctc_chat_fn();
    }

    // main options
    public function ctc_chat_fn() {
        $this->ctc_chat =  get_option('ht_ctc_chat_options');
    }


}

endif; // END class_exists check