<div class="container">
    <div class="row">
        <div class="col-12 text-center bg-light">
            <h1>Welcome to pizza app</h1>
        </div>
    </div>
    <div class="row" id="pizza-menu">
        <div class="col-12">
        <hr/>
            <h3 class="text-warning"><u>Pizza Menu</u></h3>
            <?php
                foreach ($pizza as $pizzaObj) {
                    if($pizzaObj['name'] != 'none'){
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
    						<a href="<?php echo base_url().'/PizzaOrder/addToppings/'.$pizzaObj['id']; ?>"><button type="button" class="btn btn-info">Add toppings & Add to cart</button></a>
                        <?php
                        echo '<br/><br/><br/>';
                    }
                }        
            ?>
        <hr/>
        </div>
    </div>

    <div class="row" id="pizza-menu">
        <div class="col-12">
        <hr/>
            <h3 class="text-warning"><u>Special Menu</u></h3>
            <?php
                foreach ($special as $specialObj) {
                    if($specialObj['name'] != 'none'){
                        echo '<h5><b>Combo: </b> '.$specialObj['name'].'</h5>';
                        ?>
                        <img src="<?php echo base_url() . '/uploads/' . $specialObj['picture']; ?>"
                                           height="300px" width="300px">
                        <?php                        
                        echo '<h5><b>Description: </b>'.$specialObj['description'].'</h5>';
                        echo '<h5><b>Combo price: </b>'.$specialObj['price'].'</h5>';
                        ?>
    						<a href="<?php echo base_url().'/SpecialOrder/addToCart/'.$specialObj['id']; ?>"><button type="button" class="btn btn-info">Add to cart</button></a>
                        <?php                        
                        echo '<br/><br/><br/>';
                    }
                }        
            ?>
        <hr/>
        </div>
    </div>

    <div class="row" id="pizza-menu">
        <div class="col-12">
        <hr/>
            <h3 class="text-warning"><u>Sides Menu</u></h3>
            <?php
                foreach ($sides as $sidesObj) {
                    if($sidesObj['name'] != 'none'){
                        echo '<h5><b>Sides name: </b> '.$sidesObj['name'].'</h5>';
                        ?>
                        <img src="<?php echo base_url() . '/uploads/' . $sidesObj['picture']; ?>"
                                           height="300px" width="300px">
                        <?php           
                        echo '<h5><b>Price: </b>'.$sidesObj['price'].'</h5>';
                        ?>
                            <a href="<?php echo base_url().'/SidesOrder/addToCart/'.$sidesObj['id']; ?>"><button type="button" class="btn btn-info">Add to cart</button></a>
                        <?php
                        echo '<br/><br/><br/>';
                    }
                }        
            ?>
        <hr/>
        </div>
    </div>        
</div>