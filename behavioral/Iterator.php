<?php
// 迭代器用来遍历一个容器里面的对象
// 迭代器接口参考 http://php.net/manual/en/class.iterator.php
// 实际应用中比较少自己实现迭代器，都是直接放数组里面来遍历
class Book
{
    private $author;
    private $title;
    public function __construct($title, $author)
    {
        $this->author = $author;
        $this->title  = $title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}

class BookList implements \Countable
{
    private $books;

    public function getBook($index)
    {
        if (isset($this->books[$index])) {
            return $this->books[$index];
        }
        return;
    }

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBook($index)
    {
        unset($this->books[$index]);
    }

    public function count()
    {
        return count($this->books);
    }
}

class BookListIterator implements \Iterator
{
    private $bookList;

    protected $currentBook = 0;

    public function __construct(BookList $bookList)
    {
        $this->bookList = $bookList;
    }

    public function current()
    {
        return $this->bookList->getBook($this->currentBook);
    }

    public function next()
    {
        $this->currentBook++;
    }

    public function key()
    {
        return $this->currentBook;
    }

    public function valid()
    {
        return null !== $this->bookList->getBook($this->currentBook);
    }

    public function rewind()
    {
        $this->currentBook = 0;
    }
}

// 测试用例
$bookList = new BookList();
$bookList->addBook(new Book('Book 1', 'Author 1'));
$bookList->addBook(new Book('Book 2', 'Author 2'));
$bookList->addBook(new Book('Book 3', 'Author 3'));

$iterator = new BookListIterator($bookList);

/* 输出
Book 1 by Author 1
Book 2 by Author 2
Book 3 by Author 3
 */
while ($iterator->valid()) {
    echo $iterator->current()->getAuthorAndTitle() . "\n";
    $iterator->next();
}

// 也可以像下面这样调用
foreach ($iterator as $book) {
    echo $book->getAuthorAndTitle() . "\n";
}
