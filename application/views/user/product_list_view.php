<div class="modal-body">
    <table class="table">
        <thead>
        Product Listing
        </thead>
        <?php foreach ($product_info as $data) : ?>
            <?php $product_image = $this -> product_model -> get_images($data['product_id']) ?>
            <tr>
                <?php foreach($product_image as $image) : ?>
                    <td class="span2">
                        <?php if ( $image['product_id'] == $data['product_id'] ) : ?>
                        <a href="<?php echo base_url() ?>products/particular/<?php echo $data['product_id'] ?>">
                            <img class="thumbnail" width="100px" height="100px"
                                 src="<?php echo base_url() ?>images/products/thumb/<?php echo $image['product_image'] ?>" />
                            <?php break ?>
                        </a>
                        <?php endif ?>
                    </td>
                <?php endforeach ?>
                <td>
                    <form class="modal-form" action="<?php echo base_url() ?>user/cart_controller" method="post">
                        Name :
                        <a href="<?php echo base_url() ?>products/particular/<?php echo $data['product_id'] ?>">
                            <input type="hidden" name="current_url" value="<?php echo current_url() ?>" />
                            <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>" />
                            <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>" />
                            <?php echo $data['product_name'] ?>
                        </a>
                        <div class="alert alert-info">
                            <input type="hidden" name="product_price" value="<?php echo $data['product_price'] ?>" />
                            Price : Rs. <?php echo $data['product_price'] ?>
                            <label style="color: #eeeeee">Qty</label>
                            <input type="text" name="product_qty" placeholder="#" style="width: 20px"/>
                        </div>
                        <a href="<?php echo base_url() ?>products/particular/<?php echo $data['product_id'] ?>" class="btn"><i class="icon-info-sign icon-white"></i> View Details</a>
                        <button type="submit" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>