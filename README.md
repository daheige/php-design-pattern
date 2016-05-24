# PHP设计模式 #

对于设计模式相信大家都不陌生，但在实际项目中可能大家很少会仔细思考应该使用什么样的设计模式。其实使用了设计模式会让代码更健壮和易维护，我后面会举些例子来说明使用设计模式的好处。

## 设计模式的归类  ##

设计模式主要分为三大类：**生成模式**，**结构模式**，**行为模式**，下面是一些较常见的模式。

### 生成模式 (Creational) ###

- [Singleton (单例模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/creational/Singleton.php)
- [Simple Factory (简单工厂模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/creational/SimpleFactory.php)
- [StaticFactory (静态工厂模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/creational/StaticFactory.php)
- [Abstract Factory (抽象工厂模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/creational/AbstractFactory.php)
- [Factory Method (工厂方法模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/creational/FactoryMethod.php)
- [Builder (生成器模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/creational/Builder.php)

### 结构模式 (Structural) ###

- [Adapter (转接器模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/structural/Adapter.php)
- [Bridge (桥接模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/structural/Bridge.php)
- [Composite (合成模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/structural/Composite.php)
- [DependencyInjection (依赖注入模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/structural/DependencyInjection.php)
- [Facade (表象模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/structural/Facade.php)

### 行为模式 (Behavioral) ###

- [Command (命令模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/behavioral/Command.php)
- [Iterator (迭代器模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/behavioral/Iterator.php)
- [Observer (观察者模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/behavioral/Observer.php)
- [Visitor (访客模式)](https://github.com/hyperjiang/php-design-pattern/tree/master/behavioral/Visitor.php)

## 核心思想 ##
设计模式的核心思想是**分而治之**，把复杂的逻辑分解成一个个相对简单的子模块，每个子模块只完成具体的简单逻辑，解耦解得好，以后整个系统就会更便于扩展和维护。学习了设计模式也不必生搬硬套，多看优秀框架的代码，比如lavavel，zend framework等，潜移默化必有所成。
