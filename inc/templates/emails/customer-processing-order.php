<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php 
    global $emailMSG; 
    $emailMSG = __( "Il tuo ordine è stato ricevuto ed è attualmente in fase di elaborazione. I dettagli dell'ordine sono riportati di seguito.", 'nutrisslim-suite' ) . '<br><br>' ;

global $emailNote; 
$emailNote = __('Attenzione: A causa dell\'aumento della domanda, si prega di notare che il tempo di consegna previsto è di circa 7 giorni. Ci scusiamo per il disagio e faremo del nostro meglio per spedire il pacco il più rapidamente possibile. Grazie per la comprensione.','naturesfinest'); ?>
<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

$template_path = plugin_dir_path( __FILE__ ) . 'trusted_reviews_invite.php';
if (file_exists($template_path)) {
    include $template_path;
} else {
    // Handle error if template not found
    echo 'Template not found!';
}
// get_template_part('woocommerce/emails/trusted_reviews_invite');

/*
$template_path = plugin_dir_path( __FILE__ ) . 'email_reviews_invite.php';
if (file_exists($template_path)) {
    include $template_path;
} else {
    // Handle error if template not found
    echo 'Template not found!';
}
*/
// get_template_part('woocommerce/emails/email_reviews_invite');

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
/* if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
} */

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );