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
```

### Result

```
1 jQuery 函式
1. 1. 1 load()
1. 1. 1 get() / post()
```