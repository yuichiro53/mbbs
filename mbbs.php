<?php
	/*
	Minimal BBS Ver.1.00
	Copyright (c) 2018 Yuichiro Gomi
	
	This software is released under the MIT License.
	http://opensource.org/licenses/mit-license.php
	*/
	
	// �t�@�C���Ǎ�(�����ݒ莞�Ɏw�肵���t�@�C�����̋�t�@�C����p�ӂ���)
	$line = file("mbbs.dat");

	// �t�@�C������
	if ($_POST['act'] != "") {
		$file = fopen("mbbs.dat", "w");
		foreach ($line as $key => $value){
			if ($key == $_POST['id'] -1) {
				if ($_POST['act'] == "�C��") {
					$contents .= $_POST['article']."\n";
				}
				if ($_POST['act'] == "�폜") {
					$contents .= "\n";
				}
			} else {
				$contents .= $value;
			}
		}
		if ($_POST['act'] == "����") {
			$contents .= $_POST['article']."\n";
		}
		fputs($file, $contents);
		fclose($file);
	}
	
	// �t�@�C���ēǍ�
	$line = file("mbbs.dat");
?>
<html>
<head>
</head>
<body>
<form method="POST" action="">
  <input type="hidden" name="id" value="new">
  <input type="text" name="article">
  <input type="submit" name="act" value="����"><br>
</form>
<hr>
<?php
	foreach($line as $key => $value){
?>
<form method="POST" action="">
  <?=$key+1?>:
  <input type="hidden" name="id" value="<?=$key+1?>">
  <input type="text" name="article" value="<?=$value?>">
  <input type="submit" name="act" value="�C��">
  <input type="submit" name="act" value="�폜"><br>
</form>
<hr>
<?php
	}
?>
</body>
</html>
