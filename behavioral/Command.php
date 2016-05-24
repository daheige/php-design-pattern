<?php
// 命令模式有3个角色：命令、调用者、接收者，调用者调用命令但不接收结果，
// 结果由接收者来接收
interface CommandInterface
{
    public function execute();
}

class HelloCommand implements CommandInterface
{
    protected $output;

    public function __construct(Receiver $console)
    {
        $this->output = $console;
    }

    public function execute()
    {
        $this->output->write('Hello');
    }
}

class WorldCommand implements CommandInterface
{
    protected $output;

    public function __construct(Receiver $console)
    {
        $this->output = $console;
    }

    public function execute()
    {
        $this->output->write('World');
    }
}

class Receiver
{
    private $output = [];

    public function write($str)
    {
        $this->output[] = $str;
    }

    public function say()
    {
        echo implode(" ", $this->output) . "\n";
    }
}

class Invoker
{
    protected $command;

    public function setCommand(CommandInterface $cmd)
    {
        $this->command = $cmd;
    }

    public function run()
    {
        $this->command->execute();
    }
}

// 测试用例
$invoker  = new Invoker();
$receiver = new Receiver();
$invoker->setCommand(new HelloCommand($receiver));
$invoker->run();
$invoker->setCommand(new WorldCommand($receiver));
$invoker->run();
$receiver->say(); // 输出 Hello World
