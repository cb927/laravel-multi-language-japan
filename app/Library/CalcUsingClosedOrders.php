<?php
namespace App\Library;

class CalcUsingClosedOrders
{
    public $closedOrders;

    public $sumOfNyukin = 0;
    public $sumOfSyukkin = 0;
    public $sumOfAdj = 0;
    public $sumOfCommission = 0;
    public $sumOfSwap = 0;
    public $sumOfProfits = 0;
    
    public function __construct($closedOrders)
    {
        $this->closedOrders = $closedOrders;
        
        self::getSumOfEach();
    }

    private function getSumOfEach()
    {
        foreach($this->closedOrders as $closedOrder)
        {
            if($closedOrder['profit'] > 0 && $closedOrder['type'] == 'BALANCE')
            {
                $this->sumOfNyukin += $closedOrder['profit'];
            }

            if($closedOrder['profit'] < 0 && $closedOrder['type'] == 'BALANCE')
            {
                $this->sumOfSyukkin += $closedOrder['profit'];
            }

            if($closedOrder['type'] != 'BALANCE')
            {
                $this->sumOfProfits += $closedOrder['profit'];
            }

            $this->sumOfCommission += $closedOrder['commission'];

            if($closedOrder['type'] != 'BALANCE')
            {
                $this->sumOfSwap += $closedOrder['swap'];
            }
        }
    }

}