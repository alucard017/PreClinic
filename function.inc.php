<?php
function pre($data){
    echo "<pre>";
    print_r($data);
}
    function alert($link1){
        ?>
        <script>
        alert('<?php echo $link1?>');
        </script>
        <?php
    }
    function redirect($link){
        ?>
        <script>
        window.location.href='<?php echo $link?>';
        </script>
        <?php
        die();
    }
    function escape($str){
        global $con;
        $str=mysqli_real_escape_string($con,$str);
        return $str;
    
    }
    function show_product($con,$user_id,$user_type){
        $sql="select memorabilia.*,cart.* from memorabilia,cart where cart.status='0' && cart.product_id=memorabilia.product_id";
    
        if($user_id!='' && $user_type!=''){
            $sql.=" && cart.user_id='$user_id' && cart.user_type='$user_type'";
        }
        $res = mysqli_query($con, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($res))
        {
            $data[] = $row;
        }
        return $data;
    }
    
    
    use Twilio\Rest\Client;

    function mobile_sms($number,$message){
        require 'messaging/vendor/autoload.php';
        
        // Your Account SID and Auth Token from twilio.com/console
        $account_sid = 'AC1aed3b3a853033106bdc14c82a939404';
        $auth_token = 'a1892d8174de4f6682576baeba76fde2';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
        
        // A Twilio number you own with SMS capabilities
        $twilio_number = "+447723608137";

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            
            $number,
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );
        if($client){
            return 1;
        }else{
            return 0;
        }
    }
?>