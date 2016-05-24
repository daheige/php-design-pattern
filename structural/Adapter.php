<?php
// 有一些类的方法并不一样，比如不同数据库客户端的方法，
// 转接器就是通过包装让我们能够通过同样的方法名来调用不同类方法

// 狗的接口
interface DogInterface
{
    public function bark();
}

class Dog implements DogInterface
{
    public function bark()
    {
        echo "woof woof\n";
    }
}

// 猫的接口
interface CatInterface
{
    public function meow();
}

class Cat implements CatInterface
{
    public function meow()
    {
        echo "meow meow\n";
    }
}

// 猫的转接器
class CatAdapter implements DogInterface
{
    protected $cat;

    public function __construct(CatInterface $cat)
    {
        $this->cat = $cat;
    }

    public function bark()
    {
        $this->cat->meow();
    }
}

// 测试用例
function test(DogInterface $dog)
{
    $dog->bark();
}

test(new Dog); // 输出 woof woof
// test(new Cat); 这样调用会出错，因为test接受的参数是狗的接口
// 必须使用转接器模式
test(new CatAdapter(new Cat)); // 输出 meow meow
