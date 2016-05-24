<?php

abstract class AbstractFactory
{
    /**
     * 生产一个水果，抽象工厂类不关心到底生产的是什么东西
     *
     * @return Fruit
     */
    abstract public function create();
}

class AppleFactory extends AbstractFactory
{
    public function create()
    {
        return new Apple();
    }
}

class BananaFactory extends AbstractFactory
{
    public function create()
    {
        return new Banana();
    }
}

interface FruitInterface
{
    public function say();
}

class Apple implements FruitInterface
{
    public function say()
    {
        echo "I'm apple\n";
    }
}

class Banana implements FruitInterface
{
    public function say()
    {
        echo "I'm banana\n";
    }
}

// 测试用例
function test(AbstractFactory $factory)
{
    // 这个函数并不关心具体工厂，反正知道工厂能生产水果，水果能say hi
    $fruit = $factory->create();
    $fruit->say();
}

test(new AppleFactory); // 输出 I'm apple

test(new BananaFactory); // 输出 I'm banana
