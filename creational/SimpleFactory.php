<?php

class SimpleFactory
{
    /**
     * 生产一个水果
     *
     * @param  string           $type 类型
     * @return FruitInterface
     */
    public function create($type)
    {
        $className = ucfirst($type);

        if (!class_exists($className)) {
            throw new \InvalidArgumentException("$type is invalid");
        }

        return new $className();
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
$factory = new SimpleFactory();

$apple = $factory->create('apple');
$apple->say(); // 输出 I'm apple

$banana = $factory->create('banana');
$banana->say(); // 输出 I'm banana
