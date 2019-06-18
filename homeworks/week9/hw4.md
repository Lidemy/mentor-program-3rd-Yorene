## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

先說說它們相同的地方，它們都是文字的一種型態 data type。

CHAR 固定長度的字串，其長度可為 0 至 255，預設為 1 ，在儲存長度不足時，會自動在右邊補足空白
VARCHAR 可變長度的字串，最大的有效長度需視資料列大小限制而定。username 常用之。
TEXT 純文字欄位，最大長度為 2^16 -1 = 65535 個字元，儲存時會附加兩個位元組在最前面用來紀錄長度。content 常用之。

字串和文字欄位最大的不同是，欄位是有格式的，所以可以換行；而字串不行。所以，留言版的內容使用的資料型態是 TEXT，而不是 VARCHAR。

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？

Cookie 是一種在網頁中儲存資料的方式。會將資料存在本地，也就是存在自己的 瀏覽器 browser 裡。

如果我們要設定 Cookie，可以在 Server 端的 PHP 檔裡利用 setcookie() 函式把資料存到 Cookie 裡面。
在我們的例子裡就是在 handle_login.php 檔案加上 
```
$cookie_value_user_id = $row['id'];
setcookie("member_id", "$cookie_value_user_id", time() + 60 * 60);
```
此時，browser 發一個 request 去 handle_login.php （Request URL: http://handle_login.php）來得到在 Response Headers 中帶有一個 Set-Cookie: member_id=3; expires=Mon, 17-Jun-2019 20:37:57 GMT; Max-Age=3600 的 response。

瀏覽器 browser 收到這個 Set-Cookie 之後，在下一次發送 request 時，會把 Cookie 放在 headers 裡面一起帶去 Server。
在我們的例子裡就是在 browser 發一個 request 去 add.php（Request URL: http://add.php）時，在其 Request Headers 中會帶著一個 Cookie: member_id=3。

### 補充：

登出 logout 其實就是發一個 request 去 logout.php（Request URL: http://logout.php）來得到在 Response Headers 中帶有一個空 Cookie，即 Set-Cookie: member_id=deleted; expires=Thu, 01-Jan-1970 00:00:01 GMT; Max-Age=0 的 response。
在我們的例子裡就是在 logout.php 檔案加上
```
setcookie("member_id", "", time()-1200);
```

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

首先，相較於 Session，Cookies 比較容易被駭，會員登入系統應該要使用 Session 會比較安全。

再來，資料庫不直接儲存我們的密碼會比較好，應該轉換成一些亂碼來儲存會比較好。只可惜現在我真的不會，希望之後會教囉XD
