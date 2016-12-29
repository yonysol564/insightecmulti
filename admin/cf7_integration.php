<?php

add_filter("wpcf7_editor_panels","add_integrations_tab",1,1);
add_action("wpcf7_save_contact_form","save_contact_form_salesforce_integration",10, 1);
add_filter("wpcf7_contact_form_properties","add_sf_properties",10,2);

function add_sf_properties($properties,$contact_form){
    //add mail tags to allowed properties
    $properties["wpcf7_sf"] = isset($properties["wpcf7_sf"]) ? $properties["wpcf7_sf"] : array();
    $properties["wpcf7_sf_map"] = isset($properties["wpcf7_sf_map"]) ? $properties["wpcf7_sf_map"] : array();

    return $properties;
}

function add_integrations_tab($panels){

    $integration_panel = array(
        'title' => __( 'Salesforce integration', 'contact-form-7' ),
        'callback' => 'wpcf7_integrations'
    );

    $panels["sf-integration"] = $integration_panel;

    return $panels;
}
function wpcf7_integrations( $post ) {
    $sf_data = $post->prop( 'wpcf7_sf' );
    $sf_data_map = $post->prop( 'wpcf7_sf_map' );

    $mail_tags = $post->collect_mail_tags(array("exclude"=>array("all-fields")));

    ?>
    <h2><?php echo esc_html( __( 'Salesforce integration', 'contact-form-7' ) ); ?></h2>
    <fieldset>
        <div class="cf7_row">
            <label for="wpcf7-sf-send_to_salesforce">
                <input type="checkbox" id="wpcf7-sf-send_to_salesforce" name="wpcf7-sf[send_to_salesforce]" <?php checked($sf_data["send_to_salesforce"],"on");?>/>
                <?php _e("Send to salesforce ?");?>
            </label>
        </div>
        <div class="cf7_row">
            <label for="wpcf7-sf-recordtype">
                <?php _e("Record type");?>
                <input type="text" id="wpcf7-sf-recordtype" name="wpcf7-sf[recordtype]" class="large-text" value="<?php echo $sf_data["recordtype"];?>"/>
            </label>
        </div>
        <div class="cf7_row">
            <label for="wpcf7-sf-username">
                <?php _e("USERNAME");?>
                <input type="text" id="wpcf7-sf-username" name="wpcf7-sf[username]" class="large-text" value="<?php echo $sf_data["username"];?>"/>
            </label>
        </div>
        <div class="cf7_row">
            <label for="wpcf7-sf-password">
                <?php _e("PASSWORD");?>
                <input type="text" id="wpcf7-sf-password" name="wpcf7-sf[password]" class="large-text" value="<?php echo $sf_data["password"];?>" />
            </label>
        </div>
        <div class="cf7_row">
            <label for="wpcf7-sf-SECURITY_TOKEN">
                <?php _e("SECURITY_TOKEN");?>
                <input type="text" id="wpcf7-sf-password" name="wpcf7-sf[security_token]" class="large-text" value="<?php echo $sf_data["security_token"];?>" />
            </label>
        </div>
        <div class="cf7_row">
            <label for="wpcf7-sf-base_url">
                <?php _e("Base url");?>
                <input type="text" id="wpcf7-sf-base_url" name="wpcf7-sf[base_url]" class="large-text" value="<?php echo $sf_data["base_url"];?>" />
            </label>
        </div>
    </fieldset>
    <h2><?php echo esc_html( __( 'Form fields', 'contact-form-7' ) ); ?></h2>
    <fieldset>
        <table>
            <tr>
                <th><?php _e("Form fields");?></th>
                <th><?php _e("Salesforce field key");?></th>
            </tr>
        <?php foreach($mail_tags as $mail_tag):?>
            <tr>
                <th style="text-align:left;"><?php echo $mail_tag;?></th>
                <td><input type="text" id="sf-<?php echo $mail_tag;?>" name="wpcf7_sf_map[<?php echo $mail_tag;?>]" class="large-text" value="<?php echo isset($sf_data_map[$mail_tag]) ? $sf_data_map[$mail_tag] : "";?>" /></td>
            </tr>
        <?php endforeach;?>
        </table>
    </fieldset>
    <?php
}



function save_contact_form_salesforce_integration($contact_form){
    $properties = $contact_form->get_properties();

    $properties['wpcf7_sf'] = $_POST["wpcf7-sf"];
    $properties['wpcf7_sf_map'] = $_POST["wpcf7_sf_map"];

    $contact_form->set_properties($properties);

}

//send data process
function wpcf_sf_send_data($WPCF7_ContactForm) {

    $submission = WPCF7_Submission::get_instance();

    $url    = $submission->get_meta( 'url' );
    $params = $submission->get_posted_data();

    $sf_data = $WPCF7_ContactForm->prop( 'wpcf7_sf' );
    $sf_data_map = $WPCF7_ContactForm->prop( 'wpcf7_sf_map' );
    $sf_record_id = "";

    if($sf_data["send_to_salesforce"] == "on"){
        $sf_record_id = send_data_to_salesforce($submission,$WPCF7_ContactForm,$sf_data,$sf_data_map);
        if($sf_record_id){
            $mail = $WPCF7_ContactForm->prop('mail');
            $mail['body'].= '<br/> Salesforce record ID = $sf_record_id';
            $WPCF7_ContactForm->set_properties( array( 'mail' => $mail ) );
        }
    }


    return $sf_record_id;

}
function send_data_to_salesforce($submission,$WPCF7_ContactForm,$sf_data,$sf_data_map){
    $username = $sf_data["username"];
    $password = $sf_data["password"];
    $securityToken = $sf_data["security_token"];
    $recordtype = $sf_data["recordtype"];

    $records = array();
    $records[] = get_sf_record($submission,$sf_data_map,$recordtype);

    $sf_record_id = salesforce_create_record($records,$username,$password,$securityToken,$recordtype);

    return $sf_record_id;
}
function salesforce_create_record($records,$username,$password,$securityToken,$recordtype){

    try{
        if(!class_exists("SforceEnterpriseClient")){
            get_template_part ('admin/salesforce/SforceEnterpriseClient');
            get_template_part ('admin/salesforce/SforceHeaderOptions.php');
            get_template_part ('admin/salesforce/SforceEnterpriseClient');
        }
        $mySforceConnection = new SforceEnterpriseClient();
        $mySforceConnection->createConnection(TEMPLATEPATH."/admin/salesforce/enterprise_wsdl.xml");
        $mySforceConnection->login($username, $password.$securityToken);

        //print_r($records);
        $result = $mySforceConnection->create($records,"Patient__c");

        if (is_soap_fault($result)) {
            //trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);
        }

        $sf_record_id = "";
        if(isset($result[0]->success) && $result[0]->success){
            $sf_record_id =  $result[0]->id;
        }

        return $sf_record_id;
    }catch(Exception $e) {
        print_r($e);
    }

}
function get_sf_record($submission,$sf_data_map,$recordtype){

    if(!class_exists("SforceEnterpriseClient")){
        get_template_part ('admin/salesforce/SforceEnterpriseClient');
    }

    $submited_data = $submission->get_posted_data();

    $record = new SObject();
    $record->type = "Lead";

    foreach($sf_data_map as $form_key=>$sf_form_key){
        if($sf_form_key){
            $value = isset($submited_data[$form_key]) ? $submited_data[$form_key] : "";
            if(is_array($value)){
                $record->$sf_form_key = $value ? true : false;
            }else{
                $record->$sf_form_key = $value;
            }
        }
    }

    $record->RecordTypeId = "01220000000jlLoAAI";

    return $record;
}

function send_steps_form_to_sf($post_id,$steps_args,$values,$firstname, $lastname, $email){
    $sf_username  = get_field("sf_username",$post_id);
    $sf_password = get_field("sf_password",$post_id);
    $sf_security_token = get_field("security_token",$post_id);
    $sf_record_type = get_field("sf_record_type",$post_id);
    $sf_recordtyptid = get_field("sf_recordtyptid",$post_id);

    $sf_first_name_key  = get_field("sf_first_name_field_id",$post_id);
    $sf_last_name_key = get_field("sf_last_name_field_id",$post_id);
    $sf_email_name_key = get_field("sf_user_email_field_id",$post_id);
    $record = new stdClass();

    $questions = get_field("dynamic_steps_rep",$post_id);

    //fix steps positioninig
    $ordered_steps_args = array();
    foreach($steps_args as $steps_arg){
        $step_order = $steps_arg["step"] - 1;
        $ordered_steps_args[$step_order] = $steps_arg;
    }

    foreach($questions as $key=>$question){

        if(is_array($ordered_steps_args[$key]["value"])){
            $value = implode(",",$ordered_steps_args[$key]["value"]);
        }else{
            $value = $ordered_steps_args[$key]["value"];
        }
        $record->$question["salesforce_field_id"] = $value;
    }

    $record->$sf_first_name_key = $firstname;
    $record->$sf_last_name_key = $lastname;
    $record->$sf_email_name_key = $email;
    $record->RecordTypeId = $sf_recordtyptid;

    $records = array($record);

    salesforce_create_record($records,$sf_username,$sf_password,$sf_security_token,$sf_record_type);
}
function send_curl_request($url,$action,$sf_data,$fields = array()){


    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    $url = $url."/".$action."?".$fields_string;
    if($fields_string){
        $url = $url."?".$fields_string;
    }
    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    return $result;
}
add_action( "wpcf7_before_send_mail", "wpcf_sf_send_data" );
