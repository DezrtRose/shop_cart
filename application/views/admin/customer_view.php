<div class="row-fluid accordion-group" style="height: 65%">
    <div class="page-header">
        <h3 style="padding-left: 10px">Customer Manager</h3>
    </div>
    <ul class="unstyled">
        <li class="text-info">
            <?php echo $this -> session -> flashdata('info') ?>
        </li>
        <li class="text-error">
            <?php echo $this -> session -> flashdata('error') ?>
        </li>
    </ul>
    <?php if ( empty($customer_info) ) { ?>
        <span class="span2 alert alert-info">
            No customer to display.
        </span>
    <?php } else { ?>
        <table class="table table-hover">
            <tr>
                <td>
                    #
                </td>
                <td>
                    Customer Name
                </td>
                <td>
                    Customer Option
                </td>
            </tr>
            <?php $counter = 1 ?>
            <?php foreach ($customer_info as $data) : ?>
                <tr>
                    <td class="span1">
                        <?php echo $counter; $counter++ ?>
                    </td>
                    <td>
                        <?php echo $data['customer_name'] ?>
                    </td>
                    <td>
                        <a onclick="return confirm('All customer details will be deleted. Are you sure?')" class="btn" href="<?php echo base_url() ?>admin/customer/delete/<?php echo $data['customer_id'] ?>">
                            <i class="icon-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php } ?>
</div>