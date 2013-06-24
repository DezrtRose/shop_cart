<?php
    $items = $this -> cart -> contents();
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="satish_user@access-keys.com">
    <input type="hidden" name="item_name"
           value="Laptop">
    <input type="hidden" name="item_number" value="MEM32507725">
    <input type="hidden" name="amount" value="3">
    <input type="hidden" name="tax" value="1">
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <!-- Enable override of buyers’s address stored with PayPal . -->
    <input type="hidden" name="address_override" value="1">
    <!-- Set variables that override the address stored with PayPal. -->
    <input type="hidden" name="first_name" value="John">
    <input type="hidden" name="last_name" value="Doe">
    <input type="hidden" name="address1" value="345 Lark Ave">
    <input type="hidden" name="city" value="San Jose">
    <input type="hidden" name="state" value="CA">
    <input type="hidden" name="zip" value="95121">
    <input type="hidden" name="country" value="US">
    <input type="image" name="submit" border="0"
           src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif"
           alt="PayPal - The safer, easier way to pay online">
</form> 