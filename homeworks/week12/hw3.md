## 請說明 SQL Injection 的攻擊原理以及防範方法

什麼是 SQL Injection？

資安金句，永遠不要相信來自 client 端的資料！
這個事件起因於你相信了，讓 client 端的輸入變成程式的一部份。於是被攻擊了。
變成什麼程式呢？SQL。
攻擊目標是 database server，偷別人的資料庫來做壞事，或是破壞資料庫。
簡單來說，攻擊者藉由特殊字元，改變語法上的邏輯，變成 SQL 語法，輸入攻擊者想要的任意 SQL 讓網站執行，可能取得資料庫的所有內容，或刪除所有內容。

如何防範？

防範原則是不要相信任何來自 client 端的資料！
利用內建函式 prepare statement 來指定使用者輸入參數的型別，例如設定為字串。攻擊者即無法藉由特殊字元，變成 SQL 語法的一部份來攻擊。

## 請說明 XSS 的攻擊原理以及防範方法

什麼是 XSS ？

XSS 全名為 Cross-Site Sripting ，即跨站腳本攻擊。
一樣，資安金句，永遠不要相信來自 client 端的資料！
這個事件起因於你相信了，讓 client 端的輸入變成程式的一部份。於是被攻擊了。
變成什麼程式呢？通常是 JavaScript。
攻擊目標是其它的使用者，偷別人的 cookie/session 來做壞事。

如何防範？

防範原則是不要相信任何來自 client 端的資料！
方法就是好好 validate 所有的 user input！
可利用內建函式 htmlspecialchars，會將特殊字符轉換為 HTML 格式，就不會被當成是 JavaScript 來執行了。
用法為：htmlspecialchars($str, ENT_QUOTES, ‘utf-8’)。

## 請說明 CSRF 的攻擊原理以及防範方法

什麼是 CSRF ？

CSRF 全名為 Cross Site Request Forgery，跨站偽造請求，即跨站請求偽造。看看 CSRF 的前兩個字 CS，即 Cross Site，表示可以在任何一個網址底下發動攻擊。就是在不同的 domain 底下卻能夠偽造出「使用者本人**主動**發出的 request」。
我們點一下惡意連結，我們以為要去 A Site，實際上卻在背後去了 B Site，而我們在 B Site 的 cookie/session 還有效時，就會被偽造成我們使用者本人主動發出的 request。
所以這種攻擊又稱作 one-click attack，因為只要我們點一下就中招了。

如何防範？

一樣是剛才關鍵的那兩個字 CS，即 Cross Site。
防範原則就是只能相信來自同一個 Site 來的 request。
方法可以是加上一些「只有使用者知道」的資訊，例如加上 CSRF token，或是 Double Submit Cookie。
當然，也可以利用第二層的驗證碼，像是圖形驗證碼、簡訊驗證碼等來避免攻擊。
