
這段程式碼仔細觀察就會發現，一共分成兩種樣子：

一個是大家常見的 `console.log(數字)`，我想這部份大家應該都沒什麼問題，反正就是當程式執行到該行時，會印出該數字；
第二個部份可能大家會開始有一點不太確定，可能也是當程式執行到該行時會印出該數字，還是先不會印出，等到之後才印出呢？基本上，其實也就這兩種可能性嘛。

所以，我們針對 `setTimeout` 來說明，仔細看看，這段程式碼到底是怎麼執行的呢？

執行到 `setTimeout` 這一行時，setTimeout 裡面的 function 會被放進 WebAPIs 裡面，在 0 秒鐘過後，被轉到 task Queue 裡面，而此時的 Call Stack 會先把 1, 3, 5 都印出來清空後，Event Loop 才會把 task Queue 裡面的東西轉到 Call Stack 去，接著印出 2, 4。

由此可知，最後印出來的結果如下：
1
3
5
2
4