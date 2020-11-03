<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12 text-center bg-light"><h2>Selected Pizza</h2></div>
            </div>
            <?php
                echo '<h5><b>Pizza name: </b> '.$pizzaObj['name'].'</h5>';
                ?>
                <img src="<?php echo base_url() . '/uploads/' . $pizzaObj['picture']; ?>"
                                height="300px" width="300px">
                <?php                        
                echo '<h5><b>Pizza price: </b></h5>';
                echo '<ul>';
                echo '<li>Small: '.$pizzaObj['small'].' LKR</li>';
                echo '<li>Medium: '.$pizzaObj['medium'].' LKR</li>';
                echo '<li>Large: '.$pizzaObj['large'].' LKR</li></ul>';
            ?>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12 text-center bg-light"><h2>Select Your Topping & Size</h2></div>
            </div>
            <form action="<?php echo base_url('PizzaOrder/addToCart'); ?>" name="pizzaOrderCart" id="pizzaOrderCart"
          method="post" onsubmit="return validateForm()">
                <div class="form-group">              
                    <label>Topping: <span class="text-danger" id="toppingError">*</span></label>
                    <select id="topping" name="topping" class="form-control" onchange="changeTotal()">
                        <option value="-1"> Select an option </option>
                        <?php
                            foreach($topping as $toppingObj){
                                if($toppingObj['name'] != 'none'){
                                    ?><option value="<?php echo $toppingObj['id'].'/'.$toppingObj['price']; ?>"> <?php echo $toppingObj['name'] .' & '.$toppingObj['price'].' LKR'; ?> </option><?php
                                }
                            }
                        ?>
                    </select> 
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label><input type="radio" name="size" value="small" onclick="changeTotal()">Small</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="size" value="medium" onclick="changeTotal()">Medium</label>
                    </div>      
                    <div class="radio">
                        <label><input type="radio" name="size" value="large" onclick="changeTotal()" checked>Large</label>
                    </div>            
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type = "text" name="pizzaId" id = "pizzaId" value="<?php echo $pizzaObj['id']; ?>" hidden/>
                        <input type = "text" name="total" id = "total" value="<?php echo $pizzaObj['large']; ?>" hidden/>
                        <h4><b>Price: </b><span id="total_price"><?php echo $pizzaObj['large']; ?></span></h4>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Add to cart</button>
                </div>
            </form>
            <a href = "<?php echo base_url().'/Home' ?>"><button class="btn btn-info">Home</button></a>
        </div>
    </div>
</div>

<script>
    function changeTotal(){
        var small = <?php echo $pizzaObj['small']; ?>;
        var medium = <?php echo $pizzaObj['medium']; ?>;
        var large = <?php echo $pizzaObj['large']; ?>;
        var topping = document.getElementById("topping").value;

        var strPart = topping.split("/");

        var toppingId = strPart[0];
        var toppingPrice = strPart[1];

        const rbs = document.querySelectorAll('input[name="size"]');
        let selected;
        for (const rb of rbs) {
            if (rb.checked) {
                selected = rb.value;
                break;
            }
        }

        var total = 0;
        if(selected == "small"){
            total = parseFloat(small) + parseFloat(toppingPrice);
        }
        else if(selected == "medium"){
            total = parseFloat(medium) + parseFloat(toppingPrice);
        }
        else{
            total = parseFloat(large) + parseFloat(toppingPrice);
        }

        document.getElementById('total_price').innerHTML = total;
        document.getElementById('total').value = total;
    }

    function validateForm(){
        var topping = document.getElementById("topping").value;

        var strPart = topping.split("/");

        var toppingId = strPart[0];
        var toppingPrice = strPart[1];

        if(toppingId == -1){
            document.getElementById("toppingError").innerHTML = "Please select an option...";
            return false;
        }
        else{
            document.getElementById("toppingError").innerHTML = "";
            return true;
        }
    }
</script>