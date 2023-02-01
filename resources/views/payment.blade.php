<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    how to integrate stripe payment gateway in laravel 9
    </title>
</head>
<body>
    <form action="./payment/pay" method="post">
    @ csrf
    <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    
    data-key="{ env('STRIPE_SECRET') }"
    data-name="Hackerkernel"
    data-amount="100"
    data-currency="USD"
    data-description="stripe payment testing in  laravel 9"
    data-image="https://laravel.100dotcom.com/logo.png"

>

</script>

    </form>
</body>
</html>