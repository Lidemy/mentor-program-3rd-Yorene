## Bootstrap 是什麼？

簡單來說，是一個的 UI Library，一個負責各種前端成分的 Library（front-end component library）
也因為是前端，包含 CSS 和 JavaScript，其中 JavaScript 會使用 jQuery 來實做。
幫你寫好很多個 CSS 的 class，只要套上 class 就能讓網頁煥然一新（這句話是真心的，在改留言版時很有感受

ps 只是我覺得 CSS 檔是變小了沒錯，可是全部都增加在 HTML 的 class 名稱上，讓 HTML 變複雜（不知道是我不太會用，還是本來就會這樣？

## 請簡介網格系統以及與 RWD 的關係

RWD 全名是 Responsive web design，就是讓網頁會因應使用者螢幕大小的不同，而自動改變排版方式的設計方式。而達成這個目的地的實做方法常利用網格系統，也就是 Grid system ，原理把網頁畫成一格一格的，再來規定不同大小的螢幕時，網頁元素各字會佔幾格。

## 請找出任何一個與 Bootstrap 類似的 library

那當然是要找到比 Bootstrap 更早的 Foundation 啦~

**官網：**http://foundation.zurb.com/
**Github：**https://github.com/zurb/foundation-sites

ps 聽說大名鼎鼎的 facebook 就是用這個框架？

## jQuery 是什麼？

簡單來說，是一個 JavaScript 的 Library 函式庫。
優點是有跨瀏覽器的支援（特別是早期瀏覽器支援度很差的時候，聽說現在好很多）
主要用在 DOM 文件的操作，可以取代 browser 原生提供的 api，但無法取代 JavaScript。
也能提供事件、資料相關的簡單函式，像是核心程式加強非同步傳輸(AJAX)以及事件(Event)的功能。
總之，比原生的 vanilla js 方便許多（所以大家都愛用XD

## jQuery 與 vanilla JS 的關係是什麼？

vanilla JS 就是不用任何框架，純原生的 JavaScript。
jQuery 與 vanilla JS，就是一種相對詞的感覺（但不是相反
就像剛才說的 jQuery 主要用在 DOM 文件的操作，可以取代 browser 原生提供的 api，但無法取代 JavaScript，在寫事件相關功能時，還是會用到原生的 JavaScript。
