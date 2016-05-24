<?php
// 很多人最熟悉的单例模式在目前是被认为是反面模式（ANTI-PATTERN）的，不推荐使用
class Singleton
{
    /**
     * @var Singleton
     */
    private static $instance;

    /**
     * @var integer
     */
    public $count = 0;

    /**
     * 获取对象
     *
     * @return self
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * 禁止外部使用new初始化
     */
    private function __construct()
    {
    }

    /**
     * 禁止外部克隆
     */
    private function __clone()
    {
    }

    /**
     * 禁止外部唤醒
     */
    private function __wakeup()
    {
    }

    public function increase()
    {
        $this->count++;
    }
}

// 测试用例
$obj = Singleton::getInstance();

echo $obj->count . "\n"; // 输出 0

$obj->increase();

$obj2 = Singleton::getInstance();

echo $obj2->count . "\n"; // 输出 1
