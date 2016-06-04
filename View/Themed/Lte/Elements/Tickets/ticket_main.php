<table id="pbs-index" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Ticket No.</th>
            <th>CIF</th>
            <th>Customer Name</th>
            <th>Interaction</th>
            <th>Interaction Detail</th>
            <th>Created Date</th>
            <th>Due Date</th>
            <th>Days</th>
            <th>Aging</th>
            <th>Status</th>
            <th>Department</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $page = $this->Paginator->params['paging']['Ticket']['page'];
        $limit = $this->Paginator->params['paging']['Ticket']['limit'];
        $rows_num = (($limit * $page) - $limit) + 1;

        foreach ($tickets as $item):
        ?>

        <tr>
            <td><?php echo $rows_num; ?></td>

            <td>
                <?php
                echo $item['Ticket']['ticket_number'];
                ?>
            </td>

            <td>
                &nbsp;
            </td>

            <td>
                <?php
                echo $item['Ticket']['customer_name'];
                ?>
            </td>

            <td>
                <?php
                echo $item['InteractionLevel1']['interaction_title1'];
                ?>
            </td>

            <td>
                <?php
                echo $item['InteractionLevel2']['interaction_title2'];
                ?>
            </td>

            <td>
                <?php
                echo date('d-m-Y', strtotime($item['Ticket']['created']));
                ?>
            </td>

            <td>
                <?php
                if ($item['Ticket']['due_date'] != null):
                    echo date('d-m-Y', strtotime($item['Ticket']['due_date']));
                else:
                    echo "-";
                endif;
                ?>
            </td>

            <td>
                <?php
                if ($item['Ticket']['ticket_days'] == null):
                    $created_date = strtotime($item['Ticket']['created']);
                    $now = time();
                    $datediff = $now - $created_date;
                    $days = floor($datediff / (60 * 60 * 24));
                    $days_label = 'day';

                    if ($days > 1) {
                        $days_label = 'days';
                    }

                    echo $days.' '.$days_label;

                else:
                    $days_label = 'day';
                    if ($item['Ticket']['ticket_days'] > 1) {
                        $days_label = 'days';
                    }

                    echo $item['Ticket']['ticket_days'].' '.$days_label;
                endif;
                ?>
            </td>

            <td>
                <?php
                if ($item['Ticket']['ticket_aging'] == null):
                    if ($item['Ticket']['due_date'] != null):
                        $now = time();
                        $due_date = strtotime($item['Ticket']['due_date']);
                        if ($now > $due_date):
                            $datediff_aging = $now - $due_date;
                            $days_aging = floor($datediff_aging / (60 * 60 * 24));

                            echo '+'.$days_aging;
                        else:
                            echo '-';
                        endif;
                    else:
                        echo '-';
                    endif;

                else:
                    if ($item['Ticket']['ticket_aging'] > 0):
                        echo '+'.$item['Ticket']['ticket_aging'];
                    else:
                        echo '-';
                    endif;
                endif;
                ?>
            </td>

            <td>
                <?php
                echo $ticket_statuses[$item['Ticket']['ticket_status']];
                ?>
            </td>

            <td>
                <?php
                echo isset($item['Department']['department_name']) ? $item['Department']['department_name'] : '-';
                ?>
            </td>

            <td>
                <?php
                echo $this->Html->link(
                    '<span class="glyphicon glyphicon-search"></span> Detail',
                    array(
                        'controller' => 'tickets',
                        'action' => 'ajax_modal_get_ticket_detail',
                        $item['Ticket']['id']
                    ),
                    array(
                        'escape' => false,
                        'data-toggle' => 'modal',
                        'data-target' => '#myModal',
                        'title' => 'View ticket detail'
                    )
                );
                ?>
            </td>
        </tr>

        <?php
        $rows_num++;
        endforeach;
        ?>
    </tbody>
</table>
