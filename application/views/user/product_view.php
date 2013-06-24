<div class="modal-body">
    <table class="table table-hover">
        <thead>
            Product Categories
        </thead>
        <tr>
            <td>
                Category Name
            </td>
            <td>
                Category Products
            </td>
        </tr>
        <?php foreach ($product_info as $data) : ?>
            <tr>
                <td>
                    <i class="icon-th-large icon-white"></i>
                    <a href="<?php echo base_url() ?>products/<?php echo $data['category_id'] ?>">
                        <?php echo $data['category_name'] ?>
                    </a>
                </td>
                <td>
                    <a href="<?php echo base_url() ?>products/<?php echo $data['category_id'] ?>">
                        <?php echo count($this -> product_model -> get_product(null, $data['category_id'])) ?>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>