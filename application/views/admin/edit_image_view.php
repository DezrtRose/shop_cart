<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="margin-left: 10px">Product Images</h3>
    </div>
    <form class="modal-form" method="post" action="" id="form" style="margin-left: 10px">
        <ul class="unstyled">
            <li>
                <label>Product Name</label>
            </li>
            <li>
                <input type="text" name="product_name" id="product_name" readonly="" value="<?php echo $product_info[0]['product_name'] ?>" />
            </li>
            <li>
                <?php $counter = 0 ?>
                <?php foreach ($image_info as $i) : ?>
                    <img class="thumbnail" src="<?php echo base_url() ?>images/products/thumb/<?php echo $i['product_image'] ?>" />
                    <input type="hidden" name="org_product_image_<?php echo $counter ?>" value="<?php echo $i['product_image'] ?>" />
                    <input type="hidden" name="image_id_<?php echo $counter ?>" value="<?php echo $i['image_id'] ?>" />
                    <input type="text" name="product_image_<?php echo $counter ?>" value="<?php echo $i['product_image'] ?>" />
                    <?php $counter++ ?>
                <?php endforeach ?>
                <input type="hidden" name="data_counter" value="<?php echo $counter ?>" />
            </li>
            <li>
                <button class="btn btn-primary" type="submit" name="submit" value="submit">
                    Update Product
                </button>
            </li>
        </ul>
    </form>
</div>