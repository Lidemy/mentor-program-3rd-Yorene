<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

    <?php

    // $pageSql = "SELECT id FROM yorene_comments ";
    $pageSql = "SELECT count(id) AS count FROM yorene_comments ";
    $pageResult = $conn->query($pageSql);
    // $PageResultCheck = $pageResult->num_rows;
    $row = $pageResult->fetch_assoc();
    $count = $row['count'];
    // if ($pageResult == true && $PageResultCheck > 0) {
    //   $pageNumber = ceil($PageResultCheck / 20);
    // }
    if ( $count > 20) {
      $pageNumber = ceil($count / 20);
      for ($i = 1; $i <= $pageNumber; $i += 1) {
        echo "<li class='page-item'><a class='page-link' href='./page.php?id=$i'> $i </a></li> ";
      }
    }
    ?>

    <li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>