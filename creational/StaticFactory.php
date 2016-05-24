<?php
// 静态工厂模式 是 简单工厂模式 的变种
class StaticFactory
{
    /**
     * 生产一个水果
     *
     * @param  string           $type 类型
     * @return FruitInterface
     */
    public static function create($type)
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
$apple = StaticFactory::create('apple');
$apple->say(); // 输出 I'm apple

$banana = StaticFactory::create('banana');
$banana->say(); // 输出 I'm banana
