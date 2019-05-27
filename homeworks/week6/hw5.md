## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

`<button> </button>` 就是個按紐。
`<mark> </mark>`：左右可以有其它東西，像螢光筆一樣，預設黃色底。
`<hr>` 是水平線的元素。

## 請問什麼是盒模型（box modal）

當 CSS 用各種階層來描述 HTML 文件外觀的樣式時，會把每一個 HTML 的元素視為一個 box 盒或框，每個元素被表示為一個矩形的方框，一個盒子或一個框，由框的內容 content，內邊距 padding，邊界/邊框 border 和外邊距 margin 所構成。一個元素或說一個盒子或框，會佔據掉畫面上的空間就是由上述這幾個相加而得。上述所說，我們稱之為 box model。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？

inline：可以併排，但較少調整寬高，多依內容來決定。
block：不可併排，但可以調整寬高。
inline-block：可以併排，也可以調整寬高。
依上述特性來選擇合適的時機使用。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

### static 

本身預設就是 static。所以一定會用到。

### relative

就是相對原本的位置來調整。可以分別調整上、下、左、右。常用於和 absolute 同時使用。

### fixed

固定在瀏覽器視窗上（viewport）的某個位置。不論畫面如何滑動，其位置固定。
1. 會脫離原本其它東西的排版。
2. 當沒有設定上、右、下、左時，預設會固定在原本的位置。
常見的有：選單/導覽列、Logo、頁尾

### absolute

絕對值、絕對位置。可以設一個參考點為其絕對位置的起始點。一樣可以分別調整上、下、左、右。
參考點為往上找到第一個不是預設的 static 的元素。
好像當想要把某東西放在 viewport 的中間時可以使用。再把 top，left 設為 50%，並加上 transform: tranlate(-50%, -50%); 即可。
