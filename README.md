## Решение задач на знание основных принципов ООП

Решения находятся в `/src/`
Тесты на решения находятся в `/tests/`

### OOP design
<details><summary>1. PasswordValidator.php</summary>
Реализуйте класс `PasswordValidator` ориентируясь на тесты.

Этот валидатор поддерживает следующие опции:

`minLength `(по-умолчанию 8) - минимальная длина пароля
`containNumbers` (по-умолчанию `false`) - требование содержать хотя бы одну цифру
Массив ошибок в ключах содержит название опции, а в значении текст указывающий на ошибку.
</details>

<details><summary>2. Truncater.php</summary>

Для работы с текстом в вебе бывает полезна функция `truncate()`, которая обрезает слишком длинный текст и ставит в конце, например, многоточие:

Реализуйте класс Truncater с единственным методом `truncate()`.
```php
<?php

const OPTIONS = [
    'separator' => '...',
    'length' => 200,
];
```
В классе уже присутствует конфигурация по умолчанию:
separator отвечает за символ(ы) добавляющиеся в конце, после обрезания строки, а `length` это длина до которой происходит сокращение. Если строка короче или равна этой опции, то никакого сокращения не происходит. Конфигурацию по умолчанию можно переопределить передав новую в конструктор (она мержится с тем что в классе), а также через передачу конфигурации вторым параметром в метод `truncate()`. Оба этих способа можно комбинировать.
</details>

<details><summary>3. Converter.php</summary>

Реализуйте функцию `toStd()`, которая принимает на вход ассоциативный массив и возвращает объект типа `stdClass` такой же структуры. Выполните задачу, проставляя ключи и значения вручную без использования преобразования типа.
Это задание можно решить простым преобразованием типа (в object), но это не спортивно).
</details>

<details><summary>4. CourseTest.php</summary>

Реализуйте тест CourseTest, проверяющий работоспособность метода getName() класса Course.
```php
<?php

namespace App;

class Course
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
```
</details>

<details><summary>5. Comparator.php</summary>

Реализуйте функцию `compare($seq1, $seq2)`, которая сравнивает две строчки набранные в редакторе. Если они равны, то возвращает `true`, иначе - `false`. Особенность строчек в том они могут содержать символ `#`, соответствующий нажатию клавиши `Backspace`. Она означает, что нужно стереть предыдущий символ: `abd##a#` превращается в `a`.

```php
// 'ac' === 'ac'
compare('ab#c', 'ab#c'); // true

// '' === ''
compare('ab##', 'c#d#'); // true

// 'c' === 'b'
compare('a#c', 'b'); // false

// 'cd' === 'cd'
compare('#cd', 'cd'); // true
```
</details>

<details><summary>6. DeckOfCards.php</summary>
Реализуйте класс `DeckOfCards`, который описывает колоду карт и умеет её мешать.

Конструктор класса принимает на вход массив, в котором перечислены номиналы карт в единственном экземпляре, например, `[6, 7, 8, 9, 10, 'king']`.

Реализуйте публичный метод `getShuffled()`, с помощью которого можно получить полную колоду в виде отсортированного случайным образом массива.

```php
$deck = new DeckOfCards([2, 3]);
$deck->getShuffled(); // [2, 3, 3, 3, 2, 3, 2, 2]
$deck->getShuffled(); // [3, 3, 2, 2, 2, 3, 3, 2]
```
В "полной" колоде каждая карта встречается 4 раза — для простоты не учитываем масть.
</details>

<details><summary>7. Url.php</summary>

В данном упражнении вам предстоит реализовать класс `Url`, который позволяет извлекать из HTTP адреса, представленного строкой, его части.

Класс должен содержать конструктор и методы:

конструктор - принимает на вход HTTP адрес в виде строки.
`getScheme()` - возвращает протокол передачи данных (без двоеточия).
`getHostName()` - возвращает имя хоста.
`getQueryParams()` - возвращает параметры запроса в виде пар ключ-значение объекта.
`getQueryParam()` - получает значение параметра запроса по имени. Если параметр с переданным именем не существует, метод возвращает значение заданное вторым параметром (по умолчанию равно null).
`equals($url)` - принимает объект класса Url и возвращает результат сравнения с текущим объектом - true или false.

```php
use App\Url;

$url = new Url('http://yandex.ru:80?key=value&key2=value2');
$url->getScheme(); // 'http'
$url->getHostName(); // 'yandex.ru'
$url->getQueryParams();
// [
//     'key' => 'value',
//     'key2' => 'value2',
// ];
$url->getQueryParam('key'); // 'value'
// второй параметр - значение по умолчанию
$url->getQueryParam('key2', 'lala'); // 'value2'
$url->getQueryParam('new', 'ehu'); // 'ehu'
$url->getQueryParam('new'); // null
$url->equals(new Url('http://yandex.ru:80?key=value&key2=value2')); // true
$url->equals(new Url('http://yandex.ru:80?key=value')); // false
```
</details>

<details><summary>8. Noralizer.php</summary>

Реализуйте функцию `normalize()` которая принимает на вход список городов, производит внутри некоторые преобразования и возвращает структуру определенного формата.
```php
$raw = [
    [
        'name' => 'istambul',
        'country' => 'turkey'
    ],
    [
        'name' => 'Moscow ',
        'country' => ' Russia'
    ],
    [
        'name' => 'iStambul',
        'country' => 'tUrkey'
    ],
    [
        'name' => 'antalia',
        'country' => 'turkeY '
    ],
    [
        'name' => 'samarA',
        'country' => '  ruSsiA'
    ],
];
```

Входная структура представляет из себя список городов, где каждый город это ассоциативный массив с ключами `name` и `country`. Значения в этих ключах не нормализованы. Они могут быть в любом регистре и содержать начальные и концевые пробелы. Сами города могут дублироваться в рамках одной страны.

```php
$actual = normalize($raw);
// $expected = [
//     'russia' => [
//         'moscow', 'samara'
//     ],
//     'turkey' => [
//         'antalia', 'istambul'
//     ]
// ];
```
Конечная структура — ассоциативный массив, в котором ключ это страна, а значение — список имен городов отсортированный по именам. Сама структура отсортирована по странам. Дублей городов в выходной структуре быть не должно, а сами страны и города должны быть записаны в нижнем регистре без ведущих и концевых пробелов.
</details>

<details><summary>9. Booking.php</summary>

Реализуйте класс `Booking`, который позволяет бронировать номер отеля на определённые даты. Единственный интерфейс класса — функция `book()`, которая принимает на вход две даты в текстовом формате. Если бронирование возможно, то метод возвращает true и выполняет бронирование (даты записываются во внутреннее состояние объекта).

```php
$booking = new Booking();
$booking->book('11-11-2008', '13-11-2008'); // true
$booking->book('12-11-2008', '12-11-2008'); // false
$booking->book('10-11-2008', '12-11-2008'); // false
$booking->book('12-11-2008', '14-11-2008'); // false
$booking->book('10-11-2008', '11-11-2008'); // true
$booking->book('13-11-2008', '14-11-2008'); // true
```
</details>

<details><summary>10. NormalizerTwo.php</summary>

Реализуйте функцию `getQuestions()`, которая принимает на вход текст (полученный из редактора) и возвращает извлеченные из этого текста вопросы. Это должна быть строчка в форме списка разделенных переводом строки вопросов.

Входящий текст разбит на строки и может содержать любые пробельные символы. Некоторые из этих строк являются вопросами. Они определяются по последнему символу: если это знак `?`, то считаем строку вопросом.

```php
$text = <<<HEREDOC
lala\r\nr
ehu?\t
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
turum-purum
HEREDOC;

$result = getQuestions($text); // "ehu?\none two?"
echo $result;
// ehu?
// one two?
```
</details>

### Polymorphism

<details><summary>1. LinkedList.php</summary>

Реализуйте функцию `reverse($list)`, которая принимает на вход односвязный список и переворачивает его.

```php
use App\Node;
use function App\LinkedList\reverse;

// (1, 2, 3)
$numbers = new Node(1, new Node(2, new Node(3)));
$reversedNumbers = reverse($numbers); // (3, 2, 1)
```
</details>


<details><summary>2. HTML.php</summary>

Реализуйте функцию` getLinks($tags)`, которая принимает на вход список тегов, находит среди них теги `a`, `link` и `img`, а затем извлекает ссылки и возвращает список ссылок. Теги подаются на вход в виде массива, где каждый элемент это тег. Тег имеет следующую структуру:

`name` - имя тега.
`href` или `src` - атрибуты. Атрибуты зависят от тега: `img` - `src`, a - `href`, `link` - `href`.

```php
use function App\HTML\getLinks;

$tags = [
    ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
    ['name' => 'div'],
    ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
    ['name' => 'h1']
];
$links = getLinks($tags);
// [
//     'hexlet.io/assets/logo.png',
//     'hexlet.io/assets/style.css'
// ];
```
</details>

<details><summary>3. HTML.php</summary>

Реализуйте функцию `stringify($tag)`, которая принимает на вход тег и возвращает его текстовое представление. Например:

```php
use function App\HTML\stringify;

$tag = ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];
$html = stringify($tag);
// <hr class="px-3" id="myid">


$tag = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2', 'id' => 'wow'];
$html = stringify($tag);
// <div id="wow">text2</div>
```

Внутри структуры тега есть три специальных ключа:

`name` - имя тега
`tagType` - тип тега, определяет его парность (pair) или одиночность (single)
`body` - тело тега, используется для парных тегов
Все остальное становится атрибутами тега и не зависит от того парный он или нет.
</details>
