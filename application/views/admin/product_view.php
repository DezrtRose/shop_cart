<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="padding-left: 10px">Product Manager</h3>
    </div>
    <ul class="unstyled">
        <li class="text-info">
            <?php echo $this -> session -> flashdata('info') ?>
        </li>
        <li class="text-error">
            <?php echo $this -> session -> flashdata('error') ?>
        </li>
    </ul>
    <?php if ( empty($product_info) ) { ?>
        <span class="span2 alert alert-info">
            No products to display.
        </span>
    <?php } else { ?>
        <table class="table table-hover">
            <tr>
                <td>
                    Product Name
                </td>
                <td>
                    Product Category
                </td>
                <td>
                    Product Brand
                </td>
                <td>
                    Product Options
                </td>
            </tr>
            <?php foreach ($product_info as $data) : ?>
                <tr>
                    <td>
                        <?php echo $data['product_name'] ?>
                    </td>
                    <td>
                        <?php echo $data['brand_name'] ?>
                    </td>
                    <td>
                        <?php echo $data['category_name'] ?>
                    </td>
                    <td>
                        <a class="btn" href="<?php echo base_url() ?>admin/product/edit/<?php echo $data['product_id'] ?>">
                            <i class="icon-edit"></i> Edit
                        </a>
                        <a onclick="return confirm('The product will be deleted. Are you sure?')" class="btn" href="<?php echo base_url() ?>admin/product/delete/<?php echo $data['product_id'] ?>">
                            <i class="icon-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="4">
                    <a class="btn btn-primary" href="<?php echo base_url() ?>admin/product/add">
                        Add <i class="icon-plus-sign icon-white"></i>
                    </a>
                </td>
            </tr>
        </table>
    <?php } ?>
</div>