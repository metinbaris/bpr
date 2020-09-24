<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="/css/app.css" rel="stylesheet"/>
</head>
<body>
<div class="container">
    <div class="successMessage">
        <p>Hey <?php echo (isset($_SESSION[ 'customerName' ])) ? $_SESSION[ 'customerName' ] : '' ?>,
            thanks for sending us a message.</p>
        <p>We are going to get back to you, as soon as possible !</p>
        <p>Redirecting you back in <span id="countDown"></span>...</p>
    </div>
</div>
<script type="text/javascript">
  let timeLeft = 6
  setInterval(function () {
    timeLeft--
    document.getElementById('countDown').innerHTML = String(timeLeft)
  }, 1000)

  setTimeout(function () {
    window.location.href = '/'
  }, 5800)
</script>
</body>
</html>
