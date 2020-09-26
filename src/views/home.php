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
        echo '<div id="flash-message" class="text-center flash-message">' . $_SESSION[ 'flash_message' ] . '!';
        unset($_SESSION[ 'flash_message' ]);
    }
    ?>
</div>
<form class="contactForm" action="submit-customer-enquiry" method="post" id="contact_form">
    <div id="contact_details">
        <div class="form-control">
            <label for="customer_name">Name*</label>
            <small class="hidden"> Error Message</small>
            <input type="text" name="customer_name" id="customer_name" placeholder="Name"
                   value="<?php echo isset($_POST[ "customer_name" ]) ? $_POST[ "customer_name" ] : ''; ?>">
        </div>
        <div class="form-control">
            <label for="email_address">Email*</label>
            <small class="hidden"> Error Message</small>
            <input type="email" name="email_address" id="email_address" placeholder="Email"
                   value="<?php echo isset($_POST[ "email_address" ]) ? $_POST[ "email_address" ] : ''; ?>">
        </div>
        <div class="form-control">
            <label for="">Type of Enquiry*</label>
            <small class="hidden"> Error Message</small>
            <select id="enquiry_type" name="enquiry_type" onchange="toggleOrderNumber()">
                <option value="General">General</option>
                <option value="Regarding An Order"<?php echo isset($_POST[ 'enquiry_type' ]) && $_POST[ 'enquiry_type' ] === 'Regarding An Order' ? ' selected' : '' ?>
                >Regarding An Order
                </option>
            </select>
        </div>
        <div id="enquiry_type_dependent"
             class="<?php echo isset($_POST[ 'enquiry_type' ]) && $_POST[ 'enquiry_type' ] === 'Regarding An Order' ? 'form-control' : ' hidden form-control' ?>">
            <label for="order_number">Order Id* (E.g. 004389)</label>
            <small class="hidden"> Error Message</small>
            <input type="text" id="order_number" name="order_number" placeholder="Order Number" maxlength="6"
                   value="<?php echo isset($_POST[ 'order_number' ]) ? $_POST[ 'order_number' ] : '' ?>"
            >
        </div>
    </div>
    <div id="message_box" class="form-control">
        <label for="message">Message*</label>
        <small class="hidden"> Error Message</small>
        <textarea name="message"
                  placeholder="Message"
                  id="message"
                  maxlength="1000"><?php echo isset($_POST[ "message" ]) ? $_POST[ "message" ] : ''; ?></textarea>
    </div>
    <div id="terms_and_conditions_box" class="form-control">
        <input type="checkbox" id="terms_and_conditions" name="terms_and_conditions" placeholder="Terms and Conditions">
        <label for="terms_and_conditions">I have read and i agree to the data protection policy.*</label>
        <small class="hidden"> Error Message</small>
    </div>
    <button>Submit</button>
</form>
</div>
<script src="/js/constants.js" type="text/javascript"></script>
<script src="/js/contact_form.js" type="text/javascript"></script>
</body>
</html>
