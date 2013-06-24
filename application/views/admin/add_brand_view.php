<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="margin-left: 10px">Add Brand</h3>
    </div>
    <form class="modal-form" method="post" action="" id="form" style="margin-left: 10px">
        <ul class="unstyled">
            <li>
                <label>Brand Name*</label>
            </li>
            <li>
                <input type="text" name="brand_name" id="brand_name" placeholder="Brand Name" />
            </li>
            <li>
                <label>Brand Category*</label>
            </li>
            <li>
                <select name="cat_id">
                    <option value="0">
                        Select Category
                    </option>
                    <?php foreach ($cat_info as $c) : ?>
                        <option value="<?php echo $c['cat_id'] ?>">
                            <?php echo $c['cat_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </li>
            <li>
                <button class="btn btn-primary" type="submit" name="submit" value="submit">
                    Save Brand
                </button>
            </li>
        </ul>
    </form>
</div>