<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="/css/app.css" rel="stylesheet"/>
</head>
<body>
<h1 class="pt-40">Contact Form</h1>
<div class="container">
    <?php
    if (! empty($_SESSION[ 'flash_message' ])) {
        echo $_SESSION[ 'flash_message' ];
        unset($_SESSION[ 'flash_message' ]);
    }
    ?>
    <form class="contactForm" action="submit-contact-form" method="post">
        <div id="contact_details">
            <label for="customer_name">Name*</label>
            <input type="text" name="customer_name" placeholder="Name"
                   value="<?php echo isset($_POST[ "customer_name" ]) ? $_POST[ "customer_name" ] : ''; ?>">
            <label for="email_address">Email*</label>
            <input type="email" name="email_address" placeholder="Email"
                   value="<?php echo isset($_POST[ "email_address" ]) ? $_POST[ "email_address" ] : ''; ?>">
            <label for="">Type of Enquiry*</label>
            <select id="enquiry_type" name="enquiry_type" onchange="toggleOrderNumber()">
                <option value="General">General</option>
                <option value="Regarding An Order">Regarding An Order</option>
            </select>
            <div id="enquiry_type_dependent" class="hidden">
                <label for="order_number">Order Id*</label>
                <input type="text" id="order_number" name="order_number" minlength="6" maxlength="6"
                       placeholder="E.g. 004389">
            </div>
        </div>
        <div id="message_box">
            <label for="message">Message*</label>
            <textarea name="message"
                      id="message"
                      maxlength="1000"><?php echo isset($_POST[ "message" ]) ? $_POST[ "message" ] : ''; ?></textarea>
        </div>
        <div id="terms_and_conditions_box">
            <input type="checkbox" id="terms_and_conditions" name="terms_and_conditions">
            <label for="terms_and_conditions">I have read and i agree to the data protection policy.*</label>
        </div>
        <button>Submit</button>
    </form>
</div>
<script type="text/javascript">
  function toggleOrderNumber () {
    document.getElementById('enquiry_type_dependent').classList.toggle('hidden')
  }
</script>
</body>
</html>
