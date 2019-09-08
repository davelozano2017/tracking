<?php 

class AccountModel extends Model {

    public function __construct() {
        parent::__construct();
    }


    public function secureLogin($data) {
        if($this->db->has('accounts',['email' => $data['email']])) {
            $check = $this->db->select('accounts','*',['email' => $data['email']]);
            $hash = $check[0]['password'];
            if(verify($data['password'],$hash)) {
                $_SESSION['accounts_id'] = $check[0]['accounts_id'];
                $_SESSION['role'] = $check[0]['role'];
                switch($_SESSION['role']) {
                  case 'Admin'; redirect('admin/dashboard'); break;
                  case 'Courier'; redirect('courier/dashboard'); break;
                  case 'Customer'; redirect('customer/dashboard'); break;
                }
            } else {
                redirect('login','Invalid username or password');
            }
        } else {
            redirect('login','Invalid username or password');
            
        }
    }

    public function CreateNewUser($data) {
        if($this->db->has('accounts',['email' => $data['email']])) {
            redirect('admin/users/create','Email already exist');
        } else {
            $this->db->insert('accounts',$data);
        }

    }

    public function GetUserByRoles($role) {
        return $this->db->select('accounts','*',['role' => $role]);
    }
    
    public function GetUserByid($accounts_id) {
        return $this->db->select('accounts', ["[>]province" => ["province_id" => "province_id"]],'*',['accounts.accounts_id' => $accounts_id ]);

    }

}


