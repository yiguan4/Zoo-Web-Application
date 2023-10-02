<!---SJSU CMPE 138 Fall 2021 TEAM6--->
<?php
  include_once 'header.php';
?>
<h1>Ask a question</h1>
<form method=post action="addquestion.php">
<p><strong>Your E-Mail Address:</strong><br>
<input type="text" name="topic_owner" size=40 maxlength=150>
<p><strong>Topic Title:</strong><br>
<input type="text" name="topic_title" size=40 maxlength=150>
<P><strong>Post Text:</strong><br>
 <textarea name="post_text" rows=8 cols=40 wrap=virtual></textarea>
 <P><input type="submit" name="submit" value="Add question"></p>
 </form>
 </body>
 </html>
