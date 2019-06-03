## 什麼是 DOM？

DOM 的全名是 Document Object Model。就是瀏覽器把 HTML 的標記（ Document ）轉換成物件( Object )，讓 JavaScript 可以改變到頁面的元素。所以說，DOM 是 JS 跟 HTML 溝通的橋樑。

目標：讓 Javascript 可以去選取 HTML 當中的任何元素。
原理：DOM 把所有元素當做一個節點，元素相連後就像一個 DOM Tree 有很多的延伸分支，而 Javascript 每次的選取就是選取每個節點存在的位置。

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？

總共分三大階段，事件的傳遞機制 DOM event flow：**Capturing Phase → Target Phase → Bubbling Phase**
用中文說就是，先捕獲，再 Target Phase，最後再冒泡。
以下，分別說三個階段：

1. Capturing Phase：就是在 DOM 從上往下，直到捕獲 target 的過程。
2. Target Phase：就是當事件傳到 target 自己時，沒有分捕獲跟冒泡。執行順序依程式碼的順序為準。
   如果你的冒泡監聽寫在前面的話，那就會先讀取到 target 的冒泡。
3. Bubbling Phase：離開 target 在 DOM 從下往上直到回到 dovument 的過程。

留意兩件事
第一件事就是整個過程只會有一個 e，
第二，整個過程只要有一個 e.preventDefault( ) 那麼全部都會沒有效果。

## 什麼是 event delegation，為什麼我們需要它？

為什麼我們需要它？
因為有個問題是，後來動態新增的元素無法擁有前面我們設定好的監聽事件 `addEventListener` ，要解進這個問題就要使用 event delegation，所以我們需要它。

什麼是 event delegation？

event delegation，其實就是把監聽事件這件事交給 class 的父元素來做！
因為為 class 裡面所有每一個子元素都加監聽事件的效果，等於讓 class 的父元素來監聽事件。
原理為透過事件傳遞機制，我們可以知道，每一次子元素的觸發都會觸發到父元素。

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？

阻止 event 發生：e.preventDefault( )。事件沒發生！
阻止事件繼續傳遞：e.stopPropagation( )。事件有發生，只是沒有向上級報告！
