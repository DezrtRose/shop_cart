<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="margin-left: 10px">Edit Category</h3>
    </div>
    <form class="modal-form" method="post" action="" id="form" style="margin-left: 10px">
        <ul class="unstyled">
            <li>
                <label>Category Name (Required)</label>
            </li>
            <li>
                <input type="text" name="cat_name" id="cat_name" value="<?php echo $cat_info[0]['cat_name']; ?>" />
                <label for="cat_name" class="error" style=""></label>
            </li>
            <li>
                <button class="btn btn-primary" type="submit" name="submit" value="submit">
                    Update Category
                </button>
            </li>
        </ul>
    </form>
</div>