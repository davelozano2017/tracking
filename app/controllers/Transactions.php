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
      'accounts_id'     => decode(post('consignee_id')),
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

  public function UpdateTransactions() {
    $data = array(
      'transactions_id' => decode(post('transactions_id')),
      'awb_number'      => post('awb_number'),
      'shipper_id'      => decode(post('shipper_id')),
      'accounts_id'     => decode(post('consignee_id')),
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
  
    $this->model->use('TransactionsModel')->UpdateTransactions($data);
  }


  public function CreateOrUpdateAssignToDriver() {
    $date = post('delivery_date');
    $awbNumber = decode(post('awb_number'));
    $data = array(
      'accounts_id'    => decode(post('accounts_id')),
      'awb_number'     => $awbNumber,
      'message'     => 'Your package has been packed and is being handed over to our logistics partner. and will be deliver from 
      '.date('F d, Y',strtotime($date)). ' to '. date('F d, Y',strtotime($date. '+3 days')).'(estimated date)', 
      'tracking_date'  => date('Y-m-d',strtotime($date))
    );
    $this->model->use('TransactionsModel')->CreateOrUpdateAssignToDriver($data);
  }

  public function updateTransactionStatusByAWBNumber($awb_number) {
    $this->model->use('TransactionsModel')->updateTransactionStatusByAWBNumber($awb_number);
  }

}