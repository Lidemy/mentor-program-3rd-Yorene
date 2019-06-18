資料庫名稱：comments

Table name: comments

| **欄位名稱**   | **欄位型態** | **說明**  |                      |
| -------------- | ------------ | --------- | -------------------- |
| **Id**         | Integer      | 留言 id   | A_I = auto increment |
| **Content**    | TEXT         | 留言內容  |                      |
| **Created_at** | DATETIME     | 留言時間  | current timestamp    |
| **user_id**    | Integer      | 使用者 id |                      |

Table 名稱：users

| 欄位名稱 | 欄位型態    | 說明      |
| -------- | ----------- | --------- |
| id       | integer     | 使用者 id |
| username | VARCHAR(16) | 帳號      |
| password | VARCHAR(16) | 密碼      |
| nickname | VARCHAR(64) | 暱稱      |

