<?php
	/*
	Minimal BBS Ver.1.00
	Copyright (c) 2018 Yuichiro Gomi
	
	This software is released under the MIT License.
	http://opensource.org/licenses/mit-license.php
	*/
	
	// ファイル読込(初期設定時に指定したファイル名の空ファイルを用意する)
	$line = file("mbbs.dat");

	// ファイル処理
	if ($_POST['act'] != "") {
		$file = fopen("mbbs.dat", "w");
		foreach ($line as $key => $value){
			if ($key == $_POST['id'] -1) {
				if ($_POST['act'] == "修正") {
					$contents .= $_POST['article']."\n";
				}
				if ($_POST['act'] == "削除") {
					$contents .= "\n";
				}
			} else {
				$contents .= $value;
			}
		}
		if ($_POST['act'] == "書込") {
			$contents .= $_POST['article']."\n";
		}
		fputs($file, $contents);
		fclose($file);
	}
	
	// ファイル再読込
	$line = file("mbbs.dat");
?>
<html>
<head>
</head>
<body>
<form method="POST" action="">
  <input type="hidden" name="id" value="new">
  <input type="text" name="article">
  <input type="submit" name="act" value="書込"><br>
</form>
<hr>
<?php
	foreach($line as $key => $value){
?>
<form method="POST" action="">
  <?=$key+1?>:
  <input type="hidden" name="id" value="<?=$key+1?>">
  <input type="text" name="article" value="<?=$value?>">
  <input type="submit" name="act" value="修正">
  <input type="submit" name="act" value="削除"><br>
</form>
<hr>
<?php
	}
?>
</body>
</html>
