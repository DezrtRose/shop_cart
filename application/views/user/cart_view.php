<?php if ( $this->cart->contents() ) { ?>

    <?php echo form_open(base_url().'user/cart_controller/update_cart'); ?>

    <table class="table">

        <tr>
            <th>QTY</th>
            <th>Item Description</th>
            <th style="text-align:right">Item Price</th>
            <th style="text-align:right">Sub-Total</th>
        </tr>

        <?php $i = 1; ?>

        <?php foreach ($this->cart->contents() as $items): ?>

            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

            <tr>
                <td>
                    <input type="text" name="<?php echo $i?>[qty]" value="<?php echo $items['qty'] ?>" maxlength="3" style="width: 20px" />
                </td>
                <td>
                    <?php echo $items['name']; ?>
                    <a href="<?php echo base_url() ?>user_controller/remove_from_cart/<?php echo $items['rowid'] ?>/<?php echo current_url() ?>">
                        <i class="icon-trash icon-white"></i>
                    </a>
                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
            </tr>

            <?php $i++; ?>

        <?php endforeach; ?>

        <tr>
            <td colspan="2">&nbsp;</td>
            <td style="text-align: right"><strong>Total</strong></td>
            <td style="text-align: right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>
        <input type="hidden" name="item_count" value="<?php echo $i ?>" />
        <input type="hidden" name="current_url" value="<?php echo current_url() ?>" />

    </table>

    <p>
        <button class="btn" type="submit" name="submit" value="submit">
            <i class="icon-edit icon-white"></i> Update Cart
        </button>
        <a href="<?php echo base_url() ?>buy/steps" class="btn btn-primary">
            <i class="icon-arrow-right icon-white"></i> Check Out
        </a>
    </p>
<?php } else {?>

<div class="well">
    No items in the cart <a href="<?php echo base_url() ?>">Go Back to the Store</a>
</div>

<?php } ?>
