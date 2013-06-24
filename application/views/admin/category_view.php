<div class="row-fluid accordion-group" style="height: 65%">
    <div class="page-header">
        <h3 style="padding-left: 10px">Category Manager</h3>
    </div>
    <ul class="unstyled">
        <li class="text-info">
            <?php echo $this -> session -> flashdata('info') ?>
        </li>
        <li class="text-error">
            <?php echo $this -> session -> flashdata('error') ?>
        </li>
    </ul>
    <?php if ( empty($cat_info) ) { ?>
        <span class="span2 alert alert-info">
            No categories to display.
        </span>
    <?php } else { ?>
        <table class="table table-hover">
            <tr>
                <td>
                    Category Name
                </td>
                <td>
                    Category Options
                </td>
            </tr>
            <?php foreach ($cat_info as $data) : ?>
                <tr>
                    <td>
                        <?php echo $data['cat_name'] ?>
                    </td>
                    <td>
                        <a class="btn" href="<?php echo base_url() ?>admin/category/edit/<?php echo $data['cat_id'] ?>">
                            <i class="icon-edit"></i> Edit
                        </a>
                        <a onclick="return confirm('All products and brands of this category will be deleted. Are you sure?')" class="btn" href="<?php echo base_url() ?>admin/category/delete/<?php echo $data['cat_id'] ?>">
                            <i class="icon-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="2">
                    <a class="btn btn-primary" href="<?php echo base_url() ?>admin/category/add">
                        Add <i class="icon-plus-sign icon-white"></i>
                    </a>
                </td>
            </tr>
        </table>
    <?php } ?>
</div>