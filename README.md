# Support

The 104corp support package.

## 系統需求

* PHP >= 5.5

## 安裝

使用 [Composer][] 安裝

```
$ composer require 104corp/support
```

## 說明

這裡是常用的工具實作成 Trait ，可以直接拿來使用，這樣能避免複製貼上所引發的問題。

### ContainerAwareTrait

ContainerAwareTrait 實作設定 PSR-11 的物件。

### GuzzleClientAwareTrait

GuzzleClientAwareTrait 實作了如何設定 [Guzzle][] Client 的方法。

它的實作方法是：當 `getHttpClient()` 時，如果 $httpClient 已被 `getHttpClient()` 設定的話，就回傳現有的 $httpClient ；反之，就 new 一個新的。

這個做法可以在測試跟實際使用之間，取得一個較好的平衡。平常使用通常不需要很在意如何初始化 Guzzle ，但在測試需要使用 mock 的時候，這樣設計將能方便地替換真實物件。

### HttpClientAwareTrait

HttpClientAwareTrait 也是設定 [Guzzle][] Client 的方法。不一樣的是，它只依賴 interface 而不是實作，這可以在需要替換 Guzzle 時，有個介面可以實作讓整個程式不需要大改。

### LoggerTrait

LoggerTrait 繼承了 [`Psr\Log\LoggerAwareTrait`](https://github.com/php-fig/log/blob/master/Psr/Log/LoggerAwareTrait.php) ，同時實作 log 方法去使用它提供的 logger 成員。另外 log 方法有做 logger 是否為 null 判斷。

使用它的 class 可以直接在任何角落使用 log 方法來操作 logger ，而且不需要在意 logger 物件是否存在。而要不要記 log 會由使用這個 class 的角色決定是否要 `setLogger()` 。因此可以在測試初始化的時候忽略，而在上線的時候傳入需要的 Logger 。

以下是簡單的範例：

```php
use Corp104\Support\LoggerTrait;
use Psr\Log\LogLevel;

class MyClass {
    use LoggerTrait;
    
    public function doSomething() {
        $this->log(LogLevel::INFO, 'I do something');
    }
}

// --------------------------------------


$foo = new MyClass();
$foo->doSomething();  // 這裡不會記 log

$logger = new \Monolog\Logger('name');
$foo->setLogger($logger);
$foo->doSomething();  // 這裡會記 log 
```

另外， `setLogger()` 是認 interface 的，代表包括自己寫的 logger 之外，還能傳入第三方所寫的 logger ，如 [Monolog][] 。

## Contributing

開發相關資訊可以參考 [CONTRIBUTING](/CONTRIBUTING.md) ，有任何問題或建議，歡迎發 issue ；如果覺得程式碼可以修更好的話，也歡迎發 PR 修正。

PR 如何使用可以參考 [Git 官方文件](https://git-scm.com/book/zh-tw/v2/GitHub-%E5%8F%83%E8%88%87%E4%B8%80%E5%80%8B%E5%B0%88%E6%A1%88)。

[Composer]: https://getcomposer.org/
[Guzzle]: http://docs.guzzlephp.org/en/latest/
[Monolog]: https://github.com/Seldaek/monolog
