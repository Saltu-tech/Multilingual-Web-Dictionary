


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>SEARCH YOUR WORD</title>
        <style>
body {
  background-image: url('lh.jpg');
 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
        <style media="screen">
            form{
                margin-left:700px;
            }
            label{
            font-weight:bold;
            font-size:18px;
        }
        input[type=text]{
            width:350px;
            padding:10px;
            font-size:16px;

        }
        button[type=SEARCH]{
            font-size:17px;
            font-weight:bold;
            margin-left:120px;
            padding:10px ;
        }

            </style>
    </head>
    <body>
        <h1>SEARCH YOUR WORD</h1>
        <form class="" action="insert.php"method="post">
            <label for="">WORD</label><br>
            <input type="text"name="WORD"value=""placeholder="Enter word" required><br><br>
            <button class="btn" type ="SEARCH">SEARCH</button>
        </form>

        
        <?php include 'db.php';
        $search =$_POST['WORD'];
//echo "<table><tr><th>w_id</th><th>word</th></tr>";
try {
$stmt = $conn->prepare("select * from word,meaning,language,pos,example where word='$search' AND word.w_id=meaning.m_id AND meaning.m_id=language.l_id AND language.l_id=pos.pos_id AND pos.pos_id=ex_id");

$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result=$stmt->fetchAll();
foreach ($result as $row) {
echo "<br> Word - ".$row['word']."<br> Syllable - ".$row['syllable']."<br> Pronounciation- ".$row['pronuntiation']."<br>Meaning - ".$row['meanning']."<br> Other Language <br> Hindi -".$row['hindi']."<br> Telugu - ".$row['telugu']."<br> Marathi - ".$row['marathi']."<br> POS - <br> Noun - ".$row['noun']."<br> Verb -".$row['verb']."<br> Adverb - ".$row['adverb']."<br> Example - ".$row['example']."<br>".
"image<img align=right height=400 weight=400 src=".$row["imagel"];
}

} catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>"; ?>

  </body>
</html>