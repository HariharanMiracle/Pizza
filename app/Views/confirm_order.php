<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="text-success">Success!!! Your order has been made</h1>
            <h1 class="text-warning">Track your order using the order id: <?php echo $orderId; ?></h1>
            <h1 class="text-success"><b>Your pizza will be delivered in </b> <?php echo date("H:i:s", strtotime("+30 minutes")); ?></h1>
            <a href = "<?php echo base_url().'/Home' ?>"><button class="btn btn-info">Home</button></a>
        </div>
    </div>
</div>