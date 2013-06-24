$().ready(function() {
    $('#form').validate({
        rules: {
            cat_name: 'required',
            brand_name: 'required',
            product_name: 'required',
            from_date: {
                required: true,
                date: true
            },
            to_date: {
                required: true,
                date: true
            },
            product_price: {
                required: true,
                number: true
            },
            report_type: {
                selectcheck: true
            },
            cat_id: {
                selectcheck: true
            },
            category_select: {
                selectcheck: true
            },
            brand_select: {
                selectcheck: true
            }
        },
        messages: {
            cat_name: 'Please enter a category name.',
            brand_name: 'Please enter a brand name.',
            cat_id: 'Please select a category.',
            category_select: 'Please select a category.',
            brand_select: 'Please select a brand.',
            product_name: 'Please enter product name.',
            product_price: 'Please enter product price.',
            report_type: 'Please select a report type.',
            from_date: 'Please enter a date.',
            to_date: 'Please enter a date.'
        }
    });

    //validating check boxes
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "Please select a brand.");
    //validating check boxes

})