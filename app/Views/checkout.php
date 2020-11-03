<div class="container">
    <form action="<?php echo base_url('Order/confirmOrder'); ?>" name="orderForm" id="orderForm"
          method="post" onsubmit="return validateForm()">
            <div class="form-group">              
                <label>Name: <span class="text-danger" id="nameError">*</span></label>
                <input type="text" id="name" name="name" class="form-control" required/>
            </div>
            <div class="form-group">              
                <label>Address: <span class="text-danger" id="addressError">*</span></label>
                <textarea id="address" name="address" class="form-control" required></textarea>
            </div>
            <div class="form-group">              
                <label>Phone number: <span class="text-danger" id="phonenumberError">*</span></label>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" required/>
            </div>
            <div class="form-group">              
                <input type="submit" class="btn btn-info"/>
            </div>

    </form>
</div>