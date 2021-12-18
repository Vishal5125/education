<?php 
    include 'functions.php';
    getHeader();
    if(empty($_SESSION['user_id']))
    {
      echo "<script>location.href='index.php';</script>";
      exit;
    }
    $allSubject = getAllSubjects();
?>
<div class="container">
  <h2 class="text-center" style="margin-top:5%;margin-bottom:5%;">Subjects</h2>           
  <table class="table table-bordered" style="margin-bottom:13%;">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Subject</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 1;
        while($subjectRow = mysqli_fetch_assoc($allSubject))
        {
        ?>
        <tr>
          <td><?php echo '('.$i.'.)'; ?></td>
          <td><a href="subjectChaptersList.php?row_id=<?php echo $subjectRow['id']; ?>" ><?php echo $subjectRow['name']; ?></a></td>
        </tr>
        <?php
            $i++;
        }
      ?>
    </tbody>
  </table>
</div>
<?php getFooter(); ?>