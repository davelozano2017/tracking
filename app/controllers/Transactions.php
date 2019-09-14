<?php 

class Transactions extends Controller {

  public function __construct(){
    parent:: __construct();
    $this->token = $_SESSION['token'];
  }

  public function CreateNewTransactions() {
    $data = array(
      'awb_number'      => post('awb_number'),
      'shipper_id'      => decode(post('shipper_id')),
      'accounts_id'    => decode(post('consignee_id')),
      'origin_id'       => decode(post('origin_id')),
      'destination_id'  => decode(post('destination_id')),
      'address'         => post('address'), 
      'quantity'        => post('quantity'), 
      'description'     => post('description'), 
      'cwt'             => post('cwt'), 
      'pay_mode_id'     => decode(post('pay_mode_id')), 
      'service_mode_id' => decode(post('service_mode_id')), 
      'amount'          => post('amount'), 
    );
  
    $this->model->use('TransactionsModel')->CreateNewTransactions($data);
  }
}