<?php 
    include 'functions.php';
    getHeader();
    if(empty($_SESSION['user_id']))
    {
      echo "<script>location.href='index.php';</script>";
      exit;
    }
    $chapterData = getChapterDataById($_GET['row_id']);
    $chapterData = mysqli_fetch_array($chapterData);
    $allTopicssData = getAllTopicByChapterId($_GET['row_id']);
?>
<div class="container">
  <h2 class="text-center" style="margin-top:5%;margin-bottom:5%;">Topics in <?php echo $chapterData['name']; ?></h2>           
  <table class="table table-bordered" style="margin-bottom:13%;">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Topics</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 1;
        while($topicRow = mysqli_fetch_array($allTopicssData))
        {
        ?>
        <tr>
          <td><?php echo '('.$i.'.)'; ?></td>
          <td><a href="topic.php?row_id=<?php echo $topicRow['id']; ?>" ><?php echo $topicRow['name']; ?></a></td>
        </tr>
        <?php
            $i++;
        }
      ?>
    </tbody>
  </table>
</div>
<?php getFooter(); ?>