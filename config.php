<?php
require_once('vendor/autoload.php');
 
$stripe = array(
    'secret_key' => 'sk_live_Fvz40CI4ThdzAR4AQvgfVIdf00Nr3Z3Wff',
    'publishable_key' => 'pk_live_m6KARSQnscf77lLOcJaaXaYF00Acp2G60I',
);
 
\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>