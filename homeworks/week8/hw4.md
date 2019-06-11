## 什麼是 Ajax？

AJAX 全名是 Asynchronous JavaScript and XML。
按字面上的意思就是非同步的 JavaScript 及 XML。而現在比較少用 XML，最後一個字可以說是 JSON。
簡單地說，AJAX 是指使用 JavaScript 中的 XMLHttpRequest 物件來與伺服器非同步地進行交換格式為 JSON 的資料。

## 用 Ajax 與我們用表單送出資料的差別在哪？

運用 XMLHttpRequest，即 AJAX 與網頁伺服器進行非同步 asynchronous 資料交換時，
最大優點，就是能在不更新整個頁面的前提下維護資料。因為這個技術的主要目的在於 **局部** 交換用戶端及伺服器之間的資料。

而使用表單送出資料時，會將整個頁面連結到下一個網址去。
事實上，與其說是傳送資料，其實比較像是帶著一個參數（資料）到一個我們指定的頁面去！（用 action）所以會自動換頁！
沒有寫 JavaScript，只是利用 HTML 的 form 這個元素特性是本身就會發送 request。

## JSONP 是什麼？

JSONP 是第三種傳送資料的方式，全名是 JSON with padding。
上述的 AJAX 在使用時會受到 Same origin policy 同源政策的限制而無法解析出資料。此時可以使用 JSONP。
其原理是利用 JavaScript 中不受同源政策限制的例外，像是 `<script>` 這個 Tag。
使用方法為 `<script src = "你要 GET 資料的網域名稱"> </script>` 就會不受限制來去要資料。假如 sverver 回傳資料中有某個 function，我們也在本地端的 JavaScript 建立一個名字一樣的 function，並利用呼叫此 function 來取得資料。
現在比較少用。

## 要如何存取跨網域的 API？

如上面所說，需要跨網域的存取資料時，可以使用 JSONP。
其實，如果 server 端有在 response header 加上 `access-control-allow-origin: *` （* 表示為全部的網域都可以）時，那麼該 API 也不受同源政策的限制，此時，也可以使用 AJAX 來取得跨網域的資料。

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？

啊，好像又不小心提前打了XD
如上一題所說，是因為我們的 server 有加上 `access-control-allow-origin: *` ，所以就沒有踫到同源政策的問題。