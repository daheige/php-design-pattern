<?php
// 表象模式 是指要完成某个功能需要执行多个不同类的不同方法，那么就把这些需要完成的动作封装到一起
// 下面的例子是制作一个网站需要设计师设计，然后程序员编码
class Facade
{
    protected $designer;
    protected $coder;

    public function __construct(Designer $designer, Coder $coder)
    {
        $this->designer = $designer;
        $this->coder    = $coder;
    }

    public function make()
    {
        $this->designer->design();
        $this->coder->code();
    }
}

class Designer
{
    public function design()
    {
        echo "design -> ";
    }
}

class Coder
{
    public function code()
    {
        echo "code\n";
    }
}

// 测试用例
$designer = new Designer;
$coder    = new Coder;
$facade   = new Facade($designer, $coder);
$facade->make(); // 输出 design -> code

// 如果不用表象模式，就是这样写，但如果调用的地方比较多，就会出现大量的重复代码
// $designer->design();
// $coder->code();
