<div class="modal-body">
    <form class="modal-form" action="<?php echo base_url() ?>user/cart_controller" method="post">
        <table class="table">
            <tr>
                <td class="span2" rowspan="4">
                    <div class="row">
                        <div class="span4 well">
                            <div id="myCarousel" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="thumbnail" src="<?php echo base_url() ?>/images/products/<?php echo $product_image[0]['product_image'] ?>" width="400px" height="400px" />
                                    </div>
                                    <?php for ($i = 1; $i < count($product_image); $i++) : ?>
                                        <div class="item">
                                            <img class="thumbnail" src="<?php echo base_url() ?>/images/products/<?php echo $product_image[$i]['product_image'] ?>" width="400px" height="400px" />
                                        </div>
                                    <?php endfor ?>
                                </div>
                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php foreach ($product_info as $product) : ?>
                <tr>
                    <td>
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>" >
                        <input type="hidden" name="product_name" value="<?php echo $product['product_name'] ?>" >
                        <input type="hidden" name="product_price" value="<?php echo $product['product_price'] ?>" >
                        <?php echo 'Product Name : '.$product['product_name'].'<br />Brand Name : '.$product['brand_name'].'<br />Product Price : '.$product['product_price'].'<br />Product Description : '.$product['product_desc']; ?>
                    </td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td>
                    <label>Qty</label>
                    <input type="hidden" name="current_url" value="<?php echo current_url() ?>" />
                    <input type="text" name="product_qty" placeholder="#" style="width: 20px" /><br />
                    <button type="submit" name="submit" value="submit" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</button>
                </td>
            </tr>
        </table>
    </form>
</div>
