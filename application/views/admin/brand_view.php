<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="padding-left: 10px">Brand Manager</h3>
    </div>
    <ul class="unstyled">
        <li class="text-info">
            <?php echo $this -> session -> flashdata('info') ?>
        </li>
        <li class="text-error">
            <?php echo $this -> session -> flashdata('error') ?>
        </li>
    </ul>
    <?php if ( empty($brand_info) ) { ?>
        <span class="span2 alert alert-info">
            No brands to display.
        </span>
    <?php } else { ?>
        <table class="table table-hover">
            <tr>
                <td>
                    Brand Name
                </td>
                <td>
                    Brand Options
                </td>
            </tr>
            <?php foreach ($brand_info as $data) : ?>
                <tr>
                    <td>
                        <?php echo $data['brand_name'] ?>
                    </td>
                    <td>
                        <a class="btn" href="<?php echo base_url() ?>admin/brand/edit/<?php echo $data['brand_id'] ?>">
                            <i class="icon-edit"></i> Edit
                        </a>
                        <a onclick="return confirm('All products of this brand will be deleted. Are you sure?')" class="btn" href="<?php echo base_url() ?>admin/brand/delete/<?php echo $data['brand_id'] ?>">
                            <i class="icon-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="2">
                    <a class="btn btn-primary" href="<?php echo base_url() ?>admin/brand/add">
                        Add <i class="icon-plus-sign icon-white"></i>
                    </a>
                </td>
            </tr>
        </table>
    <?php } ?>
</div>