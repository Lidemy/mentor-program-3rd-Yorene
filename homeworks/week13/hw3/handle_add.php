<?php
session_start();
require_once('conn.php');

$content = $_POST["content"];
// 存入資料庫是看得懂的，不用轉換；但讀取出來就要轉換！
// $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

// // $user_id = $_POST["user_id"];
// // 直接從 cookie 拿 id
// $certificate_id = $_COOKIE['member_id'];
// $certificate_sql = "SELECT user_id FROM yorene_users_certificate WHERE certificate_id = '$certificate_id' ";
// $certificate_result = $conn->query($certificate_sql);
// $certificate_resultCheck = $certificate_result->num_rows;
// if ($certificate_result == true && $certificate_resultCheck > 0) {
//   $cRow = $certificate_result->fetch_assoc();
//   $user_id = $cRow['user_id'];
// }

$user_id = $_SESSION['valid_user'];
if (empty($content)) {
  die("Please check!");
}

// $sql = "INSERT INTO yorene_comments(content, user_id) VALUES ('$content', '$user_id')";

// week12
$sql = "INSERT INTO yorene_comments(content, user_id) VALUES ( ?, ? )";
$statement = $conn->prepare($sql);
$statement->bind_param("si", $content, $user_id);
$statement->execute();
// $result = $stmt->get_result();
// echo $statement;

// header("Location: ./index.php");

// week13 AJAX
$last_id = $conn->insert_id;
$newSql = "SELECT created_at FROM yorene_comments WHERE id = $last_id ";
$result = $conn->query($newSql);
if ($result == true && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $createdTime = $row['created_at'];

  $arr = array('result' => 'success', 'commentId' => $last_id, 'created_at' => $createdTime, 'd' => 4 );

}

echo json_encode($arr);


// $result = $statement->get_result();
// $result = $conn->query($sql);

// week9
// if ($result) {
//   header("Location: ./index.php");
//   echo "success";
// } else {
//   echo "Failed, " . $conn->error . "<br>";
//   echo "Failed, " . $conn->connect_error . "<br>";
// }
