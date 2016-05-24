<?php
// 观察者模式就是对一个主题对象（Subject）指定若干观察者（Observer），
// 当主题对象有变动时就去通知观察者
// php有自带两个接口来实现观察者模式，主题接口SplSubject 和 观察者接口SplObserver
// SplSubject接口：http://php.net/manual/en/class.splsubject.php
// SplObserver接口：http://php.net/manual/en/class.splobserver.php
// SplObjectStorage类：http://php.net/manual/en/class.splobjectstorage.php
class User implements \SplSubject
{
    protected $data = [];

    protected $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;

        // 当user对象的数据有更新时通知观察者
        $this->notify();
    }
}

class UserObserver implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo get_class($subject) . " 被更新\n";
    }
}

// 测试用例
$subject  = new User();
$observer = new UserObserver();
$subject->attach($observer);
$subject->property = 123; // 输出 User 被更新
