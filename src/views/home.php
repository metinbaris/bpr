<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Form</title>
    <link href="/css/app.css" rel="stylesheet"/>
</head>
<body>
<h1 class="pt-40">Contact Form</h1>
<div class="container">
    <form class="contactForm">
        <div id="contact-details">
            <label for="customer_name">Name*</label>
            <input type="text" name="customer_name" placeholder="Name">
            <label for="email_address">Email*</label>
            <input type="email" name="email_address" placeholder="Email">
            <label for="">Type of Enquiry*</label>
            <select id="enquiry_type" onchange="toggleOrderNumber()">
                <option>General</option>
                <option>Regarding An Order</option>
            </select>
            <div id="enquiry_type_dependent" class="hidden">
                <label for="order_number">Order Id</label>
                <input type="text" name="order_number" minlength="6" maxlength="6" placeholder="Example: 004389">
            </div>
        </div>
        <div id="message-box">
            <label for="message">Message</label>
            <textarea name="message" id="message" maxlength="1000"></textarea>
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
