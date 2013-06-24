<div class="row-fluid accordion-group" style="height: 65%">
    <div class="page-header">
        <h3 style="padding-left: 10px">Report Generator</h3>
    </div>
    <ul class="unstyled">
        <li class="text-info">
            <?php echo $this -> session -> flashdata('info') ?>
        </li>
        <li class="text-error">
            <?php echo $this -> session -> flashdata('error') ?>
        </li>
    </ul>
    <form class="modal-form" method="post" action="" id="form" style="margin-left: 10px">
        <ul class="unstyled">
            <li>
                <label>
                    Report Type*
                </label>
            </li>
            <li>
                <select name="report_type">
                    <option value="0">
                        Select a type
                    </option>
                    <option value="1">
                        Customer Report
                    </option>
                    <option value="2">
                        Order Report
                    </option>
                </select>
            </li>
            <li>

                <div class="alert alert-error" id="alert">
                    <strong>Choose date</strong>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Start date
                            <a href="#" class="btn small" id="date-start" data-date-format="yyyy-mm-dd" data-date="2012-02-20">Change</a>
                        </th>
                        <th>
                            End date
                            <a href="#" class="btn small" id="date-end" data-date-format="yyyy-mm-dd" data-date="2012-02-25">Change</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="date-start-display"><?php echo date(now()) ?></td>
                        <td id="date-end-display">2012-02-25</td>
                    </tr>
                    </tbody>
                </table>

            </li>
            <li>
                <button class="btn btn-primary" name="submit" value="submit">
                    View Report
                </button>
            </li>
        </ul>
    </form>
</div>