<?php
// 依赖注入 就是某个类声明给它传的参数必须是什么接口的，
// 这个类不关心你给它传的到底是什么具体实例
interface Parameters
{
    public function get($key);
    public function set($key, $value);
}

abstract class AbstractConfig
{
    protected $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }
}

class ArrayConfig extends AbstractConfig implements Parameters
{
    public function get($key, $default = null)
    {
        if (isset($this->storage[$key])) {
            return $this->storage[$key];
        }
        return $default;
    }

    public function set($key, $value)
    {
        $this->storage[$key] = $value;
    }
}

class Connection
{
    protected $configuration;

    protected $host;

    // 构造函数要求输入的参数config必须继承Parameters接口
    // 这样才能保证config具有get和set方法
    public function __construct(Parameters $config)
    {
        $this->configuration = $config;
    }

    public function connect()
    {
        $host = $this->configuration->get('host');

        echo "连接到服务器 $host\n";

        $this->host = $host;
    }

    public function getHost()
    {
        return $this->host;
    }
}

// 测试用例
$config = new ArrayConfig(['host' => '127.0.0.1']); // 我们一般会从配置文件读取配置数组

$connection = new Connection($config);
$connection->connect(); // 输出 连接到服务器 127.0.0.1
