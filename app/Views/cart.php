<div class="container">
    <div class="row bg-light">
        <div class="col-6 pl-5 pr-5 pt-2 pb-2 text-left">
            <a href = "<?php echo base_url().'/Home' ?>"><button class="btn btn-info">Home</button></a>
        </div>
        <div class="col-6 pl-5 pr-5 pt-2 pb-2 text-right">
            <a href = "<?php echo base_url().'/Order/checkout' ?>"><button class="btn btn-info">Checkout</button></a>
            <a href="<?php echo base_url().'/Order/cancelOrder' ?>"><button type="button" class="btn btn-info">Cancel Order</button></a>
        </div>
    </div>

    <div>
        <?php
            foreach($_SESSION['cart'] as $cartObj){
                if($cartObj['specialid'] != 0){
                    foreach($special as $specialObj){
                        if($specialObj['id'] == $cartObj['specialid']){
                            ?>
                                <div>
                                    <?php
                                    echo '<h5><b>Combo: </b> '.$specialObj['name'].'</h5>';
                                    ?>
                                    <img src="<?php echo base_url() . '/uploads/' . $specialObj['picture']; ?>"
                                                    height="300px" width="300px">
                                    <?php                        
                                    echo '<h5><b>Description: </b>'.$specialObj['description'].'</h5>';
                                    echo '<h5><b>Combo price: </b>'.$specialObj['price'].'</h5>';
                                    ?>
                                        <a href = "<?php echo base_url().'/Cart/remove/'.$cartObj['id'] ?>"><button class="btn btn-danger">Remove</button></a>
                                    <?php
                                    echo '<br/><br/><br/>';
                                    ?>
                                </div>
                            <?php
                        }
                    }
                }
                else if($cartObj['sidesid'] != 0){
                    foreach($sides as $sidesObj){
                        if($sidesObj['id'] == $cartObj['sidesid']){
                            ?>
                                <div>
                                    <?php
                                    echo '<h5><b>Sides name: </b> '.$sidesObj['name'].'</h5>';
                                    ?>
                                    <img src="<?php echo base_url() . '/uploads/' . $sidesObj['picture']; ?>"
                                                    height="300px" width="300px">
                                    <?php                        
                                    echo '<h5><b>Price: </b>'.$sidesObj['price'].'</h5>';
                                    ?>
                                        <a href = "<?php echo base_url().'/Cart/remove/'.$cartObj['id'] ?>"><button class="btn btn-danger">Remove</button></a>
                                    <?php                                    
                                    echo '<br/><br/><br/>';
                                    ?>
                                </div>
                            <?php
                        }
                    }
                }
                else{
                    ?>
                        <div class="row">
                            <div class="col-6"><?php
                                foreach($pizza as $pizzaObj){
                                    if($pizzaObj['id'] == $cartObj['pizzaid']){
                                        ?>
                                            <div>
                                                <?php
                                                echo '<h5><b>Pizza name: </b> '.$pizzaObj['name'].'</h5>';
                                                ?>
                                                <img src="<?php echo base_url() . '/uploads/' . $pizzaObj['picture']; ?>"
                                                                height="300px" width="300px">
                                                <?php
                                                if($cartObj['size'] == "small"){
                                                    echo '<h5><b>Price: </b>'.$pizzaObj['small'].'</h5>';
                                                }   
                                                else if($cartObj['size'] == "medium"){
                                                    echo '<h5><b>Price: </b>'.$pizzaObj['medium'].'</h5>';
                                                }
                                                else{
                                                    echo '<h5><b>Price: </b>'.$pizzaObj['large'].'</h5>';
                                                }
                                                ?>
                                                    <a href = "<?php echo base_url().'/Cart/remove/'.$cartObj['id'] ?>"><button class="btn btn-danger">Remove</button></a>
                                                <?php                     
                                                echo '<br/><br/><br/>';
                                                ?>
                                            </div>
                                        <?php
                                    }
                                }                                                        
                            ?></div>
                            <div class="col-6"><?php
                                foreach($topping as $toppingObj){
                                    if($toppingObj['id'] == $cartObj['toppingid']){
                                        ?>
                                            <div>
                                                <?php
                                                echo '<h5><b>Pizza name: </b> '.$toppingObj['name'].'</h5>';
                                                ?>
                                                <img src="<?php echo base_url() . '/uploads/' . $toppingObj['picture']; ?>"
                                                                height="300px" width="300px">
                                                <?php                        
                                                echo '<h5><b>Price: </b>'.$toppingObj['price'].'</h5>';
                                                ?><h5><b>Total price: </b><?php echo $cartObj['price']; ?></h5><?php
                                                echo '<br/><br/><br/>';
                                                ?>
                                            </div>
                                        <?php
                                    }
                                }                             
                            ?></div>
                        </div>
                    <?php
                }
            }
        ?>            
    </div>
</div>