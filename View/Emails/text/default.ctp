Hi <?php echo $pic_name; ?>,

A new ticket has been created.

Ticket Detail
--------------------------------------------------

Ticket Number: <?php echo $ticket_number; ?>

<?php
$cn = '';
if (isset($ticket['Ticket'])):
    if (isset($ticket['Ticket']['customer_name'])):
        $cn = $ticket['Ticket']['customer_name'];
    endif;
endif;

echo "Customer Name: ".$cn;
?>

<?php
$customer_type_print = 'Customer Type: ';
if (isset($ticket['Customer'])):
    $customer_type_print .= $ticket['Customer']['CLI_TYP'] == 2 ? 'Corporate' : 'Personal';

else:
    $customer_type_print .= '-';
endif;

echo $customer_type_print;
?>

Interaction: <?php echo $ticket['InteractionLevel1']['interaction_title1']; ?>

Interaction Detail: <?php echo $ticket['InteractionLevel2']['interaction_title2']; ?>

