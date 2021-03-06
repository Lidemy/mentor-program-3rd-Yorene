## 請解釋後端與前端的差異。

前端是我們在網頁上能看到的所有在畫面上的東西，通常由三種語言構成，
第一個是 HTML，它提供了網頁的架構和所有的內容，包含文字和圖片…等等。
第二個是 CSS，它掌控了網頁的外觀，就是由它決定了網頁的樣式，包含字型、顏色、背景…等等。
第三種是 JavaScript，它讓網頁能夠跑起來，在使用者按下某個按紐之後，網頁應該要做什麼去判斷，所以說它是讓網頁能夠運算、提交表單驗證，或能做商業邏輯的程式。

後端所有我們在畫面上看不到的東西，它的程式語言就有非常多種，從很常見的老牌的 PHP、Java，到較近期因著各種機緣搭著各種潮流而十分熱門的 Python、Ruby 都可以是後端。這些程式都會處理很多和資料庫相關的運用。


## 假設我今天去 Google 首頁搜尋框打上：JavaScri[t 並且按下 Enter，請說出從這一刻開始到我看到搜尋結果為止發生在背後的事情。

我們按下 Enter 後，我們電腦的 browser 瀏覽器就會把 JavaScript 轉換成一個 request
browser 瀏覽器開始把這個 request 傳送給 server 伺服器(此 request 是搜尋 JavaScript)
server 伺服器收到 request
server 伺服器連去資料庫，搜尋 JavaScript
資料庫找到 JavaScript 的資料並回傳給 server 伺服器
server 伺服器回傳 respond 給 browser 瀏覽器(此 respond 是 JavaScript 的資料)
browser 瀏覽器把那些 JavaScript 的資料顯示出來

## 請列舉出 5 個 command line 指令並且說明功用

exit 會 logout 離開，千萬不要随便按啊，剛才不小心試了一下，快嚇壞我了，還好剛才有存檔。真的要養成随手随檔的習慣啊！反正不要随意亂 commit 應該就可以了吧。

more 將檔案一頁頁印在終端機上，剛開始以為像 tail 一樣沒有印出全部的檔案，後來仔細看看才發現可以使用上下移動換頁，就會出現全部的文字了，真是誤會一場啊，一樣按 q 可以離開，如果一直捲到最下面也會自動離開。
另外一個好完的地方是，如果用 man 去查這個指令的話，會出現 less - opposite of more。也就是說，這兩個指令是相反的，相關搭配詞也是相反的，說明書根本不想重覆想兩遍，直接告訴你，它們兩個是相反的指令，然後就很乾脆的貼上 less 的說明書讓你去看看。仔細想想，某種程度上，也很符合工程師的那種 DRY = Don't Repeat Yourself 的精神吧。

### 某種程度上，我也算是介紹了3 種指令吧，哈哈哈

tail 會顯示檔案的最後幾行
在說明書裡是這樣說的： tail -- display the last part of a file
而它常用的搭配詞(其實常不常用我也不知道，但確實是在說明書裡面有出現的搭配詞)-n number：意思就是說你可以指定要從這個檔案最後數來的第n 行開始印出來。

### 好啦，還是再找了一個指令，就多學習一個吧。只是都不太確定使用它們的場合在何時呢？

