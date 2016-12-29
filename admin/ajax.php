<?php
add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );
function add_frontend_ajax_javascript_file() {
    wp_enqueue_script( 'ajax_custom_script', THEME_DIR . '/admin/ajax.js', array('jquery') );
    wp_localize_script( 'ajax_custom_script', 'ajaxurl', admin_url( 'admin-ajax.php' ));
}

add_action( 'wp_ajax_send_email_from_steps', 'send_email_from_steps' );
add_action( 'wp_ajax_nopriv_send_email_from_steps', 'send_email_from_steps' );

add_action( 'wp_ajax_get_country_from_region', 'get_country_from_region' );
add_action( 'wp_ajax_nopriv_get_country_from_region', 'get_country_from_region' );

add_action( 'wp_ajax_get_all_posts_from_country', 'get_all_posts_from_country' );
add_action( 'wp_ajax_nopriv_get_all_posts_from_country', 'get_all_posts_from_country' );

add_action( 'wp_ajax_send_email_to_center', 'send_email_to_center' );
add_action( 'wp_ajax_nopriv_send_email_to_center', 'send_email_to_center' );

add_action( 'wp_ajax_get_centers_by_region', 'get_centers_by_region' );
add_action( 'wp_ajax_nopriv_get_centers_by_region', 'get_centers_by_region' );

add_action( 'wp_ajax_get_all_centers', 'get_all_centers' );
add_action( 'wp_ajax_nopriv_get_get_all_centers', 'get_all_centers' );



/* ==========================================================================
   						Sen Mail From Steps
========================================================================== */
function send_email_from_steps() {
    $post_id        = isset($_POST['post_id']) ? sanitize_text_field($_POST['post_id'] ) : '';
	$email 			= isset($_POST['email']) ? sanitize_email($_POST['email'] ) : '';
	//$fullname 		= isset($_POST['fullname']) ? sanitize_text_field($_POST['fullname'] ) : '';
	$firstname 		= isset($_POST['firstname']) ? sanitize_text_field($_POST['firstname'] ) : '';
	$lastname 		= isset($_POST['lastname']) ? sanitize_text_field($_POST['lastname'] ) : '';
	$steps_args 	= isset($_POST['steps_args']) ? $_POST['steps_args']  : '';

	$values			= isset($_POST['values']) ? $_POST['values']  : '';
	//print_r($values);
	//die();

	$headers = "From: " . 'info@insightec.com' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	if( $email ) {

		$send_to_user = send_mail_to_user($steps_args, $values,  $firstname, $lastname, $email, $headers,$post_id);

		$send_to_admin = send_mail_to_admin($steps_args, $values , $firstname, $lastname, $email, $headers,$post_id);

        send_steps_form_to_sf($post_id,$steps_args,$values,$firstname, $lastname, $email);

		if($send_to_admin) {
			$response['to_admin'] = "email sent to admin";
		}
		echo json_encode($response);
	}
	die();
}

/* ==========================================================================
   						Get  Country From Region
   ========================================================================== */
function get_country_from_region(){
	$parent_id = isset($_POST['parent_id']) ? sanitize_text_field( $_POST['parent_id']  ) : '';
	$countries = get_terms( 'location', array( 'parent'=> $parent_id , 'hide_empty'=>false) );
	$options = array();

	if($countries) {
		foreach($countries as $country) {
			$options[$country->term_id] = $country->name;
		}
		echo json_encode($options);
	}

	die();
}

/* ==========================================================================
   						Get  All Centers
   ========================================================================== */
function get_all_centers(){

	$center_args = array(
		'post_type'			=> 'center',
		'posts_per_page'	=> -1
	);

	$result = array();
	$center_query = new WP_Query($center_args);

	ob_start();

    if( $center_query->have_posts() ) {
        while($center_query->have_posts()): $center_query->the_post();
            global $post;
            get_template_part("inc/ajax","center");
        endwhile; wp_reset_query();
    } else {
        ?>
        <div class="ajax_response_message no_centers">
            <?php _e('There is no Centers','insightec'); ?>
        </div>
        <?php
    }



	$results['html'] = ob_get_clean();

	echo json_encode($results);

	die();
}

/* ==========================================================================
   						Get Centers By Region
   ========================================================================== */
function get_centers_by_region(){

	$parent_id = isset($_POST['parent_id']) ? sanitize_text_field( $_POST['parent_id']  ) : '';
	$center_args = array(
		'post_type'			=> 'center',
		'posts_per_page'	=> -1,
		'tax_query'			=> array(
			array(
				'terms'		=> $parent_id,
				'field'		=> 'term_id',
				'taxonomy'	=> 'location'
			)
		)
	);
	$result = array();
	$center_query = new WP_Query($center_args);

	ob_start();

    if( $center_query->have_posts() ) {
        while($center_query->have_posts()): $center_query->the_post();
            global $post;
            get_template_part("inc/ajax","center");
        endwhile; wp_reset_query();
    } else {
        ?>
        <div class="ajax_response_message no_centers">
            <?php _e('There is no Centers','insightec'); ?>
        </div>
        <?php
    }



	$results['html'] = ob_get_clean();

	echo json_encode($results);

	die();
}

/* ==========================================================================
   						Get All Psts From Country
   ========================================================================== */
function get_all_posts_from_country(){

	$country_term_id = isset($_POST['country_term_id']) ? sanitize_text_field( $_POST['country_term_id']  ) : '';
	$center_args = array(
		'post_type'			=> 'center',
		'posts_per_page'	=> -1,
		'tax_query'			=> array(
			array(
				'terms'		=> $country_term_id,
				'field'		=> 'term_id',
				'taxonomy'	=> 'location'
			)
		)
	);
	$result = array();
	$center_query = new WP_Query($center_args);

	ob_start();

    if( $center_query->have_posts() ) {
        while($center_query->have_posts()): $center_query->the_post();
            global $post;
            get_template_part("inc/ajax","center");
        endwhile; wp_reset_query();
    } else {
        ?>
        <div class="ajax_response_message no_centers">
            <?php _e('There is no Centers','insightec'); ?>
        </div>
        <?php
    }



	$results['html'] = ob_get_clean();

	echo json_encode($results);

	die();
}

/* ==========================================================================
   						Send Mail To User
   ========================================================================== */
function send_mail_to_user($steps_args, $values, $firstname , $lastname, $email, $headers,$post_id) {
	$mes_user = get_field('email_message_username',$post_id);
	$mes_eamil = get_field('email_message_email',$post_id);
	$mes_qu = get_field('email_message_question',$post_id);
	$mes_ans = get_field('email_message_answer',$post_id);
	$mes_suit = get_field('email_message_suitable',$post_id);
	$mes_not_suit = get_field('email_message_not_suitable',$post_id);

	$to 	  = $email;
	$subject  = "New form submition";
	$suitable = true;


	$message = "<html>";
		$message .= "<body>";
			$message .= "<p><strong>" . $mes_user . "</strong> ".$firstname . "  " . $lastname."</p>";
			$message .= "<p><strong>" . $mes_eamil . "</strong> ".$email."</p><hr>";
			if($steps_args){
				foreach($steps_args as $arg) {
						$message .= "<p><strong>" . $mes_qu . "</strong> ".$arg['title']."</p>";
                        if(is_array($arg["value"])){
                            $arg["value"] = implode(",",$arg["value"]);
                        }
						$message .= "<p><strong>" . $mes_ans . "</strong> ".$arg['value']."</p>";

					if($arg['radio_data_id'] == 1 || $arg['option_val'] == 1 ){
						$suitable = false;
					} else {
						$suitable = true;
					}
					$message .= "<hr>";

				}
			}

			if ($suitable) {
				$message .= "<div><strong>" . $mes_suit . "</strong></div>";
			} else {
				$message .= "<div>" . $mes_not_suit . "</strong></div>";
			}

		$message .= "</body>";
	$message .= "</html>";

	return wp_mail( $to, $subject, $message, $headers);

}


/* ==========================================================================
   						Send Mail To Admin
   ========================================================================== */
function send_mail_to_admin($steps_args, $values , $firstname, $lastname, $email, $headers,$post_id) {

	$mes_user = get_field('email_message_username',$post_id);
	$mes_eamil = get_field('email_message_email',$post_id);
	$mes_qu = get_field('email_message_question',$post_id);
	$mes_ans = get_field('email_message_answer',$post_id);
	$mes_suit = get_field('email_message_suitable',$post_id);
	$mes_not_suit = get_field('email_message_not_suitable',$post_id);

	$to 	  = $email;
	$subject  = "New form submition";
	$suitable = true;

	$message = "<html>";
		$message .= "<body>";
			$message .= "<p><strong>" . $mes_user . "</strong> ".$firstname . "  " . $lastname."</p>";
			$message .= "<p><strong>" . $mes_eamil . "</strong> ".$email."</p><hr>";
			if($steps_args){
				foreach($steps_args as $arg) {
						$message .= "<p><strong>" . $mes_qu . "</strong> ".$arg['title']."</p>";
                        if(is_array($arg["value"])){
                            $arg["value"] = implode(",",$arg["value"]);
                        }
						$message .= "<p><strong>" . $mes_ans . "</strong> ".$arg['value']."</p>";

					if($arg['radio_data_id'] == 1 || $arg['option_val'] == 1 ){
						$suitable = false;
					} else {
						$suitable = true;
					}
					$message .= "<hr>";

				}
			}

			if ($suitable) {
				$message .= "<div><strong>" . $mes_suit . "</strong></div>";
			} else {
				$message .= "<div>" . $mes_not_suit . "</strong></div>";
			}

		$message .= "</body>";
	$message .= "</html>";

	return wp_mail( $to, $subject, $message, $headers);
}


/* ==========================================================================
   						Send Mail To Center
   ========================================================================== */
function send_email_to_center(){

	$result = array();
	$headers = "From: New Requests From <" . 'info@insightec.com' . ">\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$params["firstname"] 	= isset($_POST['firstname']) ? sanitize_text_field($_POST['firstname'] ) : '';
	$params["lastname"]		= isset($_POST['lastname']) ? sanitize_text_field($_POST['lastname'] ) : '';
	$params["phone"] 	    = isset($_POST['phone']) ? sanitize_text_field($_POST['phone'] ) : '';
	$params["email"] 		= isset($_POST['email']) ? sanitize_text_field($_POST['email'] ) : '';
	$params["comment"] 		= isset($_POST['comment']) ? sanitize_text_field($_POST['comment'] ) : '';
	$params["post_id"] 	    = isset($_POST['pid']) ? sanitize_text_field($_POST['pid'] ) : '';

	$to = get_field('centeremail',$params["post_id"]);
	$result['mailto'] = $to;

	$subject = "New Requests From - " . $fullname;
	$message = "User Details:\n";
	$message .= "Firstname: " . $params["firstname"] . "\n";
	$message .= "Lasttname: " . $params["lastname"] . "\n";
	$message .= "Phone: " . $params["phone"] . "\n";
	$message .= "Email: " . $params["email"] . "\n";
	$message .= "Comment: " . $params["comment"] . "\n";

    //send record to salesforce
    if(get_field("send_to_salesforce","options")){
        $sf_username = get_field("sf_username","options");
        $sf_password = get_field("sf_password","options");
        $sf_security_token = get_field("sf_security_token","options");

        $sf_fields = get_field("pop_sf_fields","options");
        $record = new stdClass();

        foreach($sf_fields as $sf_field){
            $sf_key = $sf_field["salesforce_field_id"];
            $form_key = $sf_field["form_field_id"];
            $record->$sf_key = $params[$form_key];
        }
        //get treatment_center
        $center_account_id = get_field("accountid",$params["post_id"]);
        $account_name = get_field("account_name",$params["post_id"]);
        $record->Treatment_Center__c = $center_account_id;
        $records = array($record);

        $sf_record_id = salesforce_create_record($records,$sf_username,$sf_password,$sf_security_token,"Patient__c");
        if($sf_record_id)
            $message .= "Salesforce id: " . $sf_record_id . "\n";

    }


	if(wp_mail( $to , $subject, $message ,$headers)){
		$result['mail'] = 'success';
	}else{
		$result['mail'] = 'not';
	}


	echo json_encode($result);


	die();
}
