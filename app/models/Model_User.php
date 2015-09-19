<?php

/**
 * Object model mapping for relational table `user` 
 */
class Model_User extends RedBean_SimpleModel {
    
    // lifecycle hooks
    
    public function dispense() {
        $this->role = 'guest';
    }
   
    
    public function update() {
        $this->modify_date = date("Y-m-d H:i:s");
    }

}

?>
