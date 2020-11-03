<div class="container">
    <form action="<?php echo base_url('Order/track'); ?>" name="orderForm" id="orderForm"
          method="post" onsubmit="return validateForm()">
        <div class="form-group">              
            <label>Order Number: <span class="text-danger" id="orderNumberError">*</span></label>
            <input type="number" id="number" name="number" class="form-control" required/>
        </div>
        <div class="form-group">              
            <input type="submit" value="Track Order" class="btn btn-info"/>
        </div>
    </form>
</div>