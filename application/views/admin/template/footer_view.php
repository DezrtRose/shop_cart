    <div class="footer">
        <ul class="unstyled">
            <li class="">
                &copy 2013.
            </li>
        </ul>
    </div>
</div>
<script src="<?php echo base_url() ?>jQuery/jquery-1.9.1.js"></script>
<script src="<?php echo base_url() ?>jQuery/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>jQuery/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>jQuery/my_jquery.js"></script>
<script src="<?php echo base_url() ?>/style/datepicker/bootstrap-datepicker.js"></script>
<script>
    var startDate = new Date(2012,1,20);
    var endDate = new Date(2012,1,25);
    $('#date-start')
        .datepicker()
        .on('changeDate', function(ev){
            if (ev.date.valueOf() > endDate.valueOf()){
                $('#alert').show().find('strong').text('The start date must be before the end date.');
            } else {
                $('#alert').hide();
                startDate = new Date(ev.date);
                $('#date-start-display').text($('#date-start').data('date'));
            }
            $('#date-start').datepicker('hide');
        });
    $('#date-end')
        .datepicker()
        .on('changeDate', function(ev){
            if (ev.date.valueOf() < startDate.valueOf()){
                $('#alert').show().find('strong').text('The end date must be after the start date.');
            } else {
                $('#alert').hide();
                endDate = new Date(ev.date);
                $('#date-end-display').text($('#date-end').data('date'));
            }
            $('#date-end').datepicker('hide');
        });
</script>
</body>
</html>