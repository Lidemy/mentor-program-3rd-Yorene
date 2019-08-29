`this` 的重點就是 this 的值與其宣告位置無關，但與其呼叫的方式有關。所以，我們要看 this 是怎麼被呼叫的，要怎麼看呢？
把所有的呼叫，所有的 function call，都轉成利用`call`的形式來看。規則就是在呼叫 function 以前是什麼東西，把它放到 call 的參數去。

所以：

第一個可以看成是 obj.inner.hello.call(obj.inner) 結果就是 2。
第二個可以看成是 obj2.hello.call(obj2) 結果也還是 2。

第三個可以看成是 hello.call() ，因為沒有傳東西進去，所以是預設綁定，在非嚴格模式底下是 window（如果在瀏覽器底下執行）；如果是嚴格模式底下就是 undefined。