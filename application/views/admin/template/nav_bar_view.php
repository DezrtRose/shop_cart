<div class="row-fluid">
    <ul class="unstyled nav nav-tabs">
        <li <?php if ( $this -> uri -> segment(2) == 'home' ): ?> class="active"<?php endif; ?>>
            <a href="<?php echo base_url() ?>admin/home">Home</a>
        </li>
        <li <?php if ( $this -> uri -> segment(2) == 'category' ): ?> class="active"<?php endif; ?>>
            <a href="<?php echo base_url() ?>admin/category">Category Manager</a>
        </li>
        <li <?php if ( $this -> uri -> segment(2) == 'brand' ): ?> class="active"<?php endif; ?>>
            <a href="<?php echo base_url() ?>admin/brand">Brand Manager</a>
        </li>
        <li <?php if ( $this -> uri -> segment(2) == 'product' ): ?> class="active"<?php endif; ?>>
            <a href="<?php echo base_url() ?>admin/product">Product Manager</a>
        </li>
        <li <?php if ( $this -> uri -> segment(2) == 'customer' ): ?> class="active"<?php endif; ?>>
            <a href="<?php echo base_url() ?>admin/customer">Customer Manager</a>
        </li>
        <li <?php if ( $this -> uri -> segment(2) == 'order' ): ?> class="active"<?php endif; ?>>
            <a href="<?php echo base_url() ?>admin/order">Order Manager</a>
        </li>
    </ul>
    <ul class="unstyled pull-right" style="margin-top: -54px">
        <li>
            <a class="btn" href="<?php echo base_url() ?>admin/report"><i class="icon-share-alt"></i> Generate Report</a>
        </li>
    </ul>
</div>