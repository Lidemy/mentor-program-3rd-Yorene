## CSS 預處理器是什麼？我們可以不用它嗎？

### CSS 預處理器是什麼？
CSS 預處理器 就是 CSS preprocessor，看字面上的意思是預先處理。
白話來說，就是用程式化和簡潔化的方法寫一些長得很像 CSS 但其實是 Sass 的檔案（以作業為例），這些預先處理的檔案經過處理後會變成真的 CSS 檔案。

### 我們可以不用它嗎？
當然可以不用它，不然我們前幾週是怎麼寫作業的XD
不寫的話，可以直接寫 CSS 檔。

## 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。

是否需要重新下載，是否要繼續使用的 Header：If-Modified-Since 與 If-None-Match/Etag

第一種：用 **檔案時間更新與否** 決定是否需要重新下載：If-Modified-Since
（日期的格式更改為易閱讀格式）
```
// Cache 設定時，server 給的
Last-Modified: 2019-01-01 13:00:00 // 表示檔案最後一次更改的時間
  //  Cache 過期後，browser 送出的 request
  If-Modified-Since: 2019-01-01 13:00:00
// 有更新，回傳新檔案/重新下載，同時給新的 cache header；沒更新，如下
Status code: 304 (Not Modified)
```

第二種：用 **檔案內容修改與否** 決定是否需要重新下載：If-None-Match

```
// Cache 設定時，server 給的
ETage: x234fdd
  //  Cache 過期後，browser 送出的 request
  If-None-Match: x234fdd
// 有修改，回傳新檔案/重新下載，同時給新的 cache header；沒更新，如下
Status code: 304 (Not Modified)
```

這兩種方式選擇一種來使用即可。

## Stack 跟 Queue 的差別是什麼？

Queue 的中文是佇列、隊列，按照字面上的翻意就是排隊，想像有一群人在排隊，我們一定是從先排隊的人開始處理事情。
換成資料也是一樣的，先進入排隊的資料，可以優先出來處理，也就是先進先出的概念，又稱為 First In, First Out，即 FIFO。當然啦，最後排隊的資料，就是最後處理了。

Stack 的中文是堆疊、棧，想像有一疊盤子，堆疊盤子是從最下面那層開始一個一個疊上去的，而我們要使用盤子時，會先從最上面的盤子開始拿。
換成資料也是一樣的，後面才疊上去的資料，會被優先處理，也就是後進先出的概念，又稱為 Last In First Out，即 LIFO。當然啦，最先放下的資料，就是最後處理了。

## 請去查詢資料並解釋 CSS Selector 的權重是如何計算的（不要複製貼上，請自己思考過一遍再自己寫出來）

當我們在使用 CSS Selector 來選擇一個元素來決定其樣式時，如果同一個元素上同時有兩個不同的 CSS Selector 時，我們如何決定哪一個 CSS Selector 會是這個元素的最終樣式呢？

這時，就要比較這兩個（或多個）CSS Selector 的權重 Specificity 了。

權重 Specificity 分為三階：
第一階是 #id 和 ::Pseudo-element 偽元素。
第二階是 .class 類別、:pseudo-class 偽類別和 [attribute] 屬性。
第三階是 tag 標籤。

所以，我們如何決定哪一個 CSS Selector 會是這個元素的最終樣式呢？

> 權重愈重愈贏。

順序如下：
1。先比階級：第一階勝過第二階，第二階勝過第三階。
2。若同一階，則比數量，數量愈多者勝。
3。如果三階權重都相同，以寫在 CSS 檔順序愈後面者勝。

例外：`!important` 權重最最高最最重，看到它不用比，直接獲勝。（但通常不會使用）