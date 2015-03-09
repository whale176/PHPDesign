ParseFile
=========
Parse markdown-format note to generate a table of content.

# Usage

`#`   => main title / first title
`##`  => sub title / second title
`###` => minus title / third title

### Example

```
Ajax: 非同步 JavaScript 與 XML (Asynchronous JavaScript and XML)

# jQuery 函式

### load()
* 載入 HTML 檔案，並放進網頁中某個特定元件裡。
```js
$('#newslinks a').click(function(evt){
        var link = $(this).attr('href');
        $('#headlines').load(link + ' #newsItem');
        return false;  // or evt.preventDefault(); 為了告訴瀏覽器不要執行 <a> 預設動作(開啟連結)
    });
```

### get() / post()
* 發送資料給伺服器，並取得伺服器所回傳的資料。
```js
$.get(url, data, callback);
$.post(url, data, callback);
```
```

### Result

```
1 jQuery 函式
1. 1. 1 load()
1. 1. 1 get() / post()
```