<?php
/*
Template Name: QueueSms
*/

get_header();

class Queue
{
    private $queue;

    public function __construct()
    {
        $this->queue = array();
    }

    public function enqueue($item)
    {
        array_push($this->queue, $item);
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return array_shift($this->queue);
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }

    public function size()
    {
        return count($this->queue);
    }
}

$initial_date = "2024-01-24";
$final_date =  "2024-01-25";
$orders = wc_get_orders(array(
    'limit' => -1,
    'status' => array('wc-completed', 'wc-processing', 'wc-pws-ready-to-ship', 'wc-pws-shipping'),
    'date_created' => $initial_date . '...' . $final_date
));
$phoneQueue = new Queue();
$i = 0;
foreach ($orders as $order) {
    $billingPhone = $order->get_billing_phone();
    if (!empty($billingPhone)) {
        $products = $order->get_items();
        foreach ($products as $product) {
            $id = $product->get_product_id();
            if ($id == 129557){
                $phoneQueue->enqueue(array('phone' => $billingPhone, 'name' => $order->get_billing_first_name()));
				break;
			}
        }

    }
}
$i = 0;
while (!$phoneQueue->isEmpty()) {
    try {
        sendSms($phoneQueue->dequeue()['phone'], array($phoneQueue->dequeue()['name']), 208117);
        if ($i % 10 == 0)
            usleep(500);
        $i++;
        echo $phoneQueue->dequeue()['phone'] . " is sent" . "<br/>";
    } catch (Exception $exception) {
        print_r($exception);
    }
}

get_footer();