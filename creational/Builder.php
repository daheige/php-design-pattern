<?php
// 生成器模式 用来组建复杂的类
interface BuilderInterface
{
    public function createVehicle();

    public function addWheel();

    public function addEngine();

    public function addDoors();

    public function getVehicle();
}

// 单车生成器
class BikeBuilder implements BuilderInterface
{
    protected $bike;

    public function createVehicle()
    {
        $this->bike = new Bike();
    }

    public function addDoors()
    {
    }

    public function addEngine()
    {
    }

    public function addWheel()
    {
        $this->bike->setPart('前轮', new Wheel());
        $this->bike->setPart('后轮', new Wheel());
    }

    public function getVehicle()
    {
        return $this->bike;
    }
}

// 汽车生成器
class CarBuilder implements BuilderInterface
{
    protected $car;

    public function createVehicle()
    {
        $this->car = new Car();
    }

    public function addDoors()
    {
        $this->car->setPart('右门', new Door());
        $this->car->setPart('左门', new Door());
    }

    public function addEngine()
    {
        $this->car->setPart('引擎', new Engine());
    }

    public function addWheel()
    {
        $this->car->setPart('左前轮', new Wheel());
        $this->car->setPart('右前轮', new Wheel());
        $this->car->setPart('左后轮', new Wheel());
        $this->car->setPart('右后轮', new Wheel());
    }

    public function getVehicle()
    {
        return $this->car;
    }
}

// 车辆
abstract class Vehicle
{
    protected $data;

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}

class Bike extends Vehicle
{
}

class Car extends Vehicle
{
}

// 下面是组件
class Door
{
}

class Engine
{
}

class Wheel
{
}

// 主管类，其实相当于一个工厂，通过builder类来构建复杂对象
class Director
{
    /**
     * 主管类不必关心具体builder，只知道builder有哪些接口，直接调用即可
     *
     * @param  BuilderInterface $builder
     * @return Vehicle
     */
    public function build(BuilderInterface $builder)
    {
        $builder->createVehicle();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();
        return $builder->getVehicle();
    }
}

// 测试用例
$director = new Director;

$bike = $director->build(new BikeBuilder);
var_dump($bike);

$car = $director->build(new CarBuilder);
var_dump($car);

/* 输出：
object(Bike)#3 (1) {
  ["data":protected]=>
  array(2) {
    ["前轮"]=>
    object(Wheel)#4 (0) {
    }
    ["后轮"]=>
    object(Wheel)#5 (0) {
    }
  }
}
object(Car)#6 (1) {
  ["data":protected]=>
  array(7) {
    ["右门"]=>
    object(Door)#7 (0) {
    }
    ["左门"]=>
    object(Door)#8 (0) {
    }
    ["引擎"]=>
    object(Engine)#9 (0) {
    }
    ["左前轮"]=>
    object(Wheel)#10 (0) {
    }
    ["右前轮"]=>
    object(Wheel)#11 (0) {
    }
    ["左后轮"]=>
    object(Wheel)#12 (0) {
    }
    ["右后轮"]=>
    object(Wheel)#13 (0) {
    }
  }
}
*/
