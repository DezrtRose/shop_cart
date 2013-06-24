<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="margin-left: 10px">Add Product</h3>
    </div>
    <span class="text-error">
        <?php echo $this -> session -> flashdata('error') ?>
    </span>
    <form class="modal-form" method="post" action="" id="form" enctype="multipart/form-data" style="margin-left: 10px">
        <ul class="unstyled">
            <li>
                <label>Product Name*</label>
            </li>
            <li>
                <input type="text" name="product_name" id="product_name" placeholder="Product Name" />
            </li>
            <li>
                <label>Product Category*</label>
            </li>
            <li>
                <select name="category_select">
                    <option value="0">Select  Category</option>
                    <?php foreach ($category_info as $c) : ?>
                        <option value="<?php echo $c['cat_id'].','.$c['cat_name'] ?>">
                            <?php echo $c['cat_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </li>
            <li>
                <label>Product Brand*</label>
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
                <label>Product Price*</label>
            </li>
            <li>
                <input type="text" name="product_price" id="product_price" placeholder="Product Price (Required)" />
            </li>
            <li>
                <label>Product Description</label>
            </li>
            <li>
                <textarea name="product_desc" id="product_desc"></textarea>
            </li>
            <li>
                <label>Upload Product Images*</label>
            </li>
            <li>
                <input type="file" name="file[]" id="file" multiple="" />
            </li>
            <li>
                <button class="btn btn-primary" type="submit" name="submit" id="submit" value="submit">
                    Save Product
                </button>
            </li>
        </ul>
    </form>
</div>