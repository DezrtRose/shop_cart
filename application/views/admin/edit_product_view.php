<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="margin-left: 10px">Add Product</h3>
    </div>
    <form class="modal-form" method="post" action="" id="form" enctype="multipart/form-data" style="margin-left: 10px">
        <ul class="unstyled">
            <li>
                <label>Product Name</label>
            </li>
            <li>
                <input type="text" name="product_name" id="product_name" value="<?php echo $product_info[0]['product_name'] ?>" />
            </li>
            <li>
                <label>Product Brand</label>
            </li>
            <li>
                <select name="brand_select">
                    <option value="0">Select  Brand</option>
                    <?php foreach ($brand_info as $b) : ?>
                        <option value="<?php echo $b['brand_id'].','.$b['brand_name'] ?>">
                            <?php echo $b['brand_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </li>
            <li>
                <label>Product Category</label>
            </li>
            <li>
                <select name="category_select">
                    <option value="0">Select  Brand</option>
                    <?php foreach ($category_info as $c) : ?>
                        <option value="<?php echo $c['cat_id'].','.$c['cat_name'] ?>">
                            <?php echo $c['cat_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </li>
            <li>
                <label>Product Price</label>
            </li>
            <li>
                <input type="text" name="product_price" id="product_price" value="<?php echo $product_info[0]['product_price'] ?>" />
            </li>
            <li>
                <label>Product Description</label>
            </li>
            <li>
                <textarea name="product_desc" id="product_desc"><?php echo $product_info[0]['product_desc'] ?></textarea>
            </li>
            <li>
                <label>Upload Product Images*</label>
            </li>
            <li>
                <input type="file" name="userfile[]" id="userfile" multiple="" />
            </li>
            <li>
                <?php foreach ($image_info as $image) : ?>
                    <span class="pull-left">
                        <img class="thumbnail" src="<?php echo base_url() ?>images/products/thumb/<?php echo $image['product_image'] ?>">
                    <a href="<?php echo base_url() ?>admin/product_controller/delete_image/<?php echo $this -> uri -> segment(4) ?>/<?php echo $image['image_id'] ?>/<?php echo $image['product_image'] ?>">
                        Remove Image
                    </a>
                    </span>
                <?php endforeach ?>
            </li>
            <li>
                <button class="btn btn-primary" type="submit" name="submit" value="submit">
                    Update Product
                </button>
            </li>
        </ul>
    </form>
</div>