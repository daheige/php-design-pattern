<?php
// 合成模式 是指一些不同的元素继承同一个抽象父类，这样可以一视同仁的处理
abstract class FormElement
{
    abstract public function render();
}

class Form extends FormElement
{
    protected $elements;

    // 遍历表单元素并进行渲染
    public function render()
    {
        $formCode = '';
        foreach ($this->elements as $element) {
            $formCode .= $element->render() . PHP_EOL;
        }
        return $formCode;
    }

    // 添加表单元素
    public function addElement(FormElement $element)
    {
        $this->elements[] = $element;
    }
}

class InputElement extends FormElement
{
    public function render()
    {
        return '<input type="text" />';
    }
}

class TextElement extends FormElement
{
    public function render()
    {
        return 'this is a text element';
    }
}

// 测试用例
$form = new Form();
$form->addElement(new TextElement());
$form->addElement(new InputElement());
$embed = new Form();
$embed->addElement(new TextElement());
$embed->addElement(new InputElement());
$form->addElement($embed);  // 表单也能作为表单元素嵌套插入

echo $form->render();
/* 输出
this is a text element
<input type="text" />
this is a text element
<input type="text" />

*/
