<?php
// 桥接模式 简单点可以看作一种流水线操作
// 下面的例子是生产汽车和摩托车都要经过两道工序，生产零件和进行组装
abstract class Vehicle
{
    protected $workShop1;
    protected $workShop2;

    public function __construct(Workshop $workShop1, Workshop $workShop2)
    {
        $this->workShop1 = $workShop1;
        $this->workShop2 = $workShop2;
    }

    public function manufacture()
    {
    }
}

class Car extends Vehicle
{
    public function __construct(Workshop $workShop1, Workshop $workShop2)
    {
        parent::__construct($workShop1, $workShop2);
    }

    public function manufacture()
    {
        echo 'Car ';
        $this->workShop1->work();
        $this->workShop2->work();
    }
}

class Motorcycle extends Vehicle
{
    public function __construct(Workshop $workShop1, Workshop $workShop2)
    {
        parent::__construct($workShop1, $workShop2);
    }

    public function manufacture()
    {
        echo 'Motorcycle ';
        $this->workShop1->work();
        $this->workShop2->work();
    }
}

interface Workshop
{
    public function work();
}

class Produce implements Workshop
{
    public function work()
    {
        echo 'Produced ';
    }
}

class Assemble implements Workshop
{
    public function work()
    {
        echo "Assembled\n";
    }
}

// 测试用例
$vehicle = new Car(new Produce(), new Assemble());
$vehicle->manufacture(); // 输出 Car Produced Assembled

$vehicle = new Motorcycle(new Produce(), new Assemble());
$vehicle->manufacture(); // 输出 Motorcycle Produced Assembled
