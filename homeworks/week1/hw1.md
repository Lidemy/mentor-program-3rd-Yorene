## 交作業流程

### 覺得寫作業也很難，應該也要寫進流程裡面

1. 先下載作業範本：clone (好像只有第一次才需要，或是之後老師的 master 有更新也是用 pull)
2. 切到資料夾：mentor-program-3rd-Yorene
3. 先開一個新的 branch 來寫作業：git branch + WeekN(分支是開全部的分支！在全部頭的地方！)
4. 切到該 branch 開始寫作業：git checkout + WeekN
5. 開起檔案開始寫：vim hw1.md

## 交作業流程

### 在 local 端

1. 寫好後可以檢查作業的正確性，一周的作業一起交，執行 commit：
2. 如果有新檔案要控制，還是要先用 git add  . 再用 commit - am
3. 如果沒有新檔案，只是舊檔案的修改，可以直接用 coomit -am “message”
4. 剛完一份作業做一次 commit，寫完一週作業再一起 push
5. 上傳到 GitHub：git push (-u) origin WeekN(push 之前先檢查一下 commit message，git commit --amend "message" : 修改commit

### 在 GitHub 上

1. 到 GitHub 上按下 compare & pull request：Pull requests 可以問問題，但不要按下 merge。例外：如果有一些小錯誤，自己提交 PR 之後自己 merge 就好，不用再交一次。
2. 問完問題按 create
3. 到 https://github.com/Lidemy/homeworks-3rd 建立 issue
4. 標題 [Week1] 一定要大寫，內容要有作業的連結(pull request 的 url)，也可以寫心得
5. 讓老師檢查作業，作業改完才會按 merge 完後，branch 會被刪掉，issue 也會 closed (在雲端 merge 可以看檔案的變化？)
6. 看到作業改完(怎麼看到呢？還不太確定，可能下次交作業時就會看到？或是之後想看可以用 pull )
7. 確認是否在 master 的分支上：用 git status 檢查，如果不是用 git checkout master 切換過去
8. 把 merge 完的檔案拉下來，將檔案從 GitHub 拉下來：git pull origin master
9. 刪掉本機上的 branch：git branch -d WeekN

