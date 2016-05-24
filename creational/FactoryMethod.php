<?php
// 工厂方法模式 是 抽象工厂模式 的加强版
abstract class FactoryMethod
{
    /**
     * 子类必须实现这个抽象方法
     *
     * @return FruitInterface
     */
    abstract protected function createFruit();

    /**
     * 生产一个水果
     *
     * @return FruitInterface
     */
    public function create()
    {
        $obj = $this->createFruit();
        $obj->setColor();
        return $obj;
    }
}

interface FruitInterface
{
    public function say();

    public function setColor();
}

class Apple implements FruitInterface
{
    protected $color;

    public function say()
    {
        echo "I'm apple, my color is $this->color\n";
    }

    public function setColor()
    {
        $this->color = 'red';
    }
}

class Banana implements FruitInterface
{
    protected $color;

    public function say()
    {
        echo "I'm banana, my color is $this->color\n";
    }

    public function setColor()
    {
        $this->color = 'yellow';
    }
}

class AppleFactory extends FactoryMethod
{
    protected function createFruit()
    {
        return new Apple();
    }
}

class BananaFactory extends FactoryMethod
{
    protected function createFruit()
    {
        return new Banana();
    }
}

// 测试用例
function test(FactoryMethod $factory)
{
    $fruit = $factory->create();
    $fruit->say();
}

test(new AppleFactory); // 输出 I'm apple, my color is red

test(new BananaFactory); // 输出 I'm banana, my color is yellow
