<?php
// 访客模式是指把一个对象的操作外包给其他对象（Visitors），但需要做授权判断

// 航盛大厦
abstract class HSAE
{
    // 判断一个访客是否有权限访问，这里只是简单判断方法名是否存在
    public function accept(VisitorInterface $visitor)
    {
        $class = get_called_class();

        $visitingMethod = 'visit'. $class;

        if (!method_exists('VisitorInterface', $visitingMethod)) {
            throw new \InvalidArgumentException("该访客不能访问$class\n");
        }

        call_user_func([$visitor, $visitingMethod], $this);
    }
}

class Floor17 extends HSAE
{
    public function getName()
    {
        return '17楼';
    }
}

class Floor19 extends HSAE
{
    public function getName()
    {
        return '19楼';
    }
}

interface VisitorInterface
{
    public function visitFloor17(Floor17 $floor);
}

class Visitor implements VisitorInterface
{
    public function visitFloor17(Floor17 $floor)
    {
        echo '访客访问了' . $floor->getName() . "\n";
    }
}

$visitor = new Visitor;

$floor = new Floor17;
$floor->accept($visitor); // 输出 访客访问了17楼

try {
    $floor = new Floor19;
    $floor->accept($visitor);
} catch (\Exception $e) {
    echo $e->getMessage(); // 这里会抛出异常 该访客不能访问Floor19
}
