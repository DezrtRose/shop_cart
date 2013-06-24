<div class="row-fluid accordion-group">
    <div class="page-header">
        <h3 style="padding-left: 10px">Order Manager</h3>
    </div>
    <ul class="unstyled">
        <li class="text-info">
            <?php echo $this -> session -> flashdata('info') ?>
        </li>
        <li class="text-error">
            <?php echo $this -> session -> flashdata('error') ?>
        </li>
    </ul>
    <?php if ( empty($order_info) ) { ?>
        <span class="span2 alert alert-info">
            No orders to display.
        </span>
    <?php } else { ?>
        <table class="table table-hover">
            <tr>
                <td>
                    Product Name
                </td>
                <td>
                    Order Quantity
                </td>
                <td>
                    Order Date
                </td>
                <td>
                    Order Receive Date
                </td>
            </tr>
            <?php foreach ($order_info as $data) : ?>
                <tr>
                    <td>
                        <?php echo $data['product_name'] ?>
                    </td>
                    <td>
                        <?php echo $data['order_qty'] ?>
                    </td>
                    <td>
                        <?php echo $data['order_date'] ?>
                    </td>
                    <td>
                        <?php echo $data['order_receive_date'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php } ?>
</div>