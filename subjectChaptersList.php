<?php 
    include 'functions.php';
    getHeader();
    if(empty($_SESSION['user_id']))
    {
      echo "<script>location.href='index.php';</script>";
      exit;
    }
    $subjectData = getSubjectDataById($_GET['row_id']);
    $subjectData = mysqli_fetch_array($subjectData);
    $allChaptersData = getAllChapterBySubjectId($_GET['row_id']);
?>
<div class="container">
  <h2 class="text-center" style="margin-top:5%;margin-bottom:5%;">Chapters in <?php echo $subjectData['name']; ?></h2>           
  <table class="table table-bordered" style="margin-bottom:13%;">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Chapters</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 1;
        while($chapterRow = mysqli_fetch_assoc($allChaptersData))
        {
        ?>
        <tr>
          <td><?php echo '('.$i.'.)'; ?></td>
          <td><a href="chapterTopicsList.php?row_id=<?php echo $chapterRow['id']; ?>" ><?php echo $chapterRow['name']; ?></a></td>
        </tr>
        <?php
            $i++;
        }
      ?>
    </tbody>
  </table>
</div>
<?php getFooter(); ?>