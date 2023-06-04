<?php
//1.
class Computer {

    //2.
    public $model = null;
    public $operating_system = null;
    public $is_portable = null;
    public $status = 'off';

    public function switchOff()
    {
        $this->status = 'off';
    }

    public function switchOn()
    {
        $this->status = 'on';
    }

    public function toggleSwitch() : void
    {
        // $this->status = $this->status === 'off' ? 'on' : 'off';

       if($this->status === 'off'){
        $this->status = 'on';
       } else {
        $this->status = 'off';
       }

   

    }

}