<?php
if (!class_exists('Redux')) {
    return;
}
$opt_name = "cleaning_services_opt";
$opt_prefix = 'cleaning_services';

Redux::setSection($opt_name, array(
    'title' => esc_html__('SMTP Mail Settings','cleaning_services-core'),
    'id' => 'smtp_mail_settings',
    'desc' => esc_html__('This for SMTP Mail setting!','cleaning_services-core'),
    'customizer_width' => '400px',
    'icon' => 'el el-share',
    'fields' => array(
        array(
            'id' => $opt_prefix . '-des_email',
            'type' => 'text',
            'title' => esc_html__('Destination Email','cleaning_services-core'),
            'subtitle' => esc_html__('The Owner Mail Address.','cleaning_services-core'),
            'default' => ''
        ),
        array(
            'id' => $opt_prefix . '-success_message',
            'type' => 'text',
            'title' => esc_html__('Success Message','cleaning_services-core'),
            'subtitle' => esc_html__('Show User when message sent successfully.','cleaning_services-core'),
            'default' => 'Your massage send successfully.'
        ),
        array(
            'id' => $opt_prefix . '-error_message',
            'type' => 'text',
            'title' => esc_html__('Error Message','cleaning_services-core'),
            'subtitle' => esc_html__('Show User when message not sent.','cleaning_services-core'),
            'default' => ' Some Error.'
        ),
	array(
            'id' => $opt_prefix . '-useing_smtpMail',
            'type' => 'switch',
            'title' => esc_html__('Using SMTP Mail','cleaning_services-core'),
            'subtitle' => esc_html__('Enable or Disable SMTP Mail','cleaning_services-core'),
            'default' => false,
            'on' => esc_html__('Enable','cleaning_services-core'),
            'off' => esc_html__('Disable','cleaning_services-core'),
        ),
	array(
            'id' => $opt_prefix . '-smtp_host',
            'type' => 'text',
            'title' => esc_html__('SMTP Host Name','cleaning_services-core'),
            'subtitle' => esc_html__('The hostname of the mail server','cleaning_services-core'),
            'default' => ''
        ),
	array(
            'id' => $opt_prefix . '-smtp_Username',
            'type' => 'text',
            'title' => esc_html__('SMTP User Name','cleaning_services-core'),
            'subtitle' => esc_html__('Username to use for SMTP authentication','cleaning_services-core'),
            'default' => ''
        ),
	array(
            'id' => $opt_prefix . '-smtp_Password',
            'type' => 'text',
            'title' => esc_html__('SMTP Password','cleaning_services-core'),
            'subtitle' => esc_html__('Password to use for SMTP authentication','cleaning_services-core'),
            'default' => ''
        ),
	array(
            'id' => $opt_prefix . '-smtp_Port',
            'type' => 'text',
            'title' => esc_html__('SMTP Port Number','cleaning_services-core'),
            'subtitle' => esc_html__('SMTP port number - likely to be 25, 465 or 587','cleaning_services-core'),
            'default' => ''
        ),
	array(
            'id' => $opt_prefix . '-smtp_From',
            'type' => 'text',
            'title' => esc_html__('SMTP Form','cleaning_services-core'),
            'subtitle' => esc_html__('SMTP From email address','cleaning_services-core'),
            'default' => ''
        ),
	array(
            'id' => $opt_prefix . '-smtp_FromName',
            'type' => 'text',
            'title' => esc_html__('SMTP From Name','cleaning_services-core'),
            'subtitle' => esc_html__('SMTP From name','cleaning_services-core'),
            'default' => ''
        ),
	array(
            'id' => $opt_prefix . '-smtp_SMTPSecure',
            'type' => 'text',
            'title' => esc_html__('SMTP Encryption system','cleaning_services-core'),
            'subtitle' => esc_html__('Encryption system to use - ssl or tls','cleaning_services-core'),
            'default' => ''
        ),
	array(
            'id' => $opt_prefix . '-useing_smtp_auth',
            'type' => 'switch',
            'title' => esc_html__('SMTP authentication','cleaning_services-core'),
            'subtitle' => esc_html__('Enable or Disable SMTP authentication','cleaning_services-core'),
            'default' => true,
            'on' => esc_html__('True','cleaning_services-core'),
            'off' => esc_html__('False','cleaning_services-core'),
        ),
	array(
            'id' => $opt_prefix . '-smtp_SMTPDEbug',
            'type' => 'text',
            'title' => esc_html__('SMTP Debug','cleaning_services-core'),
            'subtitle' => esc_html__('Only for developer, Please dont change this.','cleaning_services-core'),
            'default' => '0'
        ),
	
    )
));
