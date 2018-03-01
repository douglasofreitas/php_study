1 - Check if word is Palimdrome.
<br>
<?php
$word = 'qwertrewq';
$is_palimdrome = palimdrome($word);
var_dump($is_palimdrome);
function palimdrome($word){
  $index = 0;
  while($index < strlen($word)/2){
    if($word[$index] != $word[strlen($word) - $index - 1]){
      return false;
    }
    $index++;
  }
  return true;
}
?>
<br><br>
2 - Count the numbers of letters in a setence: <br>
<br>
Input: $phrase = "word count algorithm" <br>
Print: <br>
a = 1 <br>
c = 1 <br>
d = 1 <br>
g = 1 <br>
h = 1 <br>
i = 1 <br>
l = 1 <br>
m = 1 <br>
n = 1 <br>
o = 3 <br>
r = 2 <br>
t = 2 <br>
u = 1 <br>
w = 1 <br>
<br>
<?php
$phrase = "word count algorithm";
$countLetters = countWords($phrase);
foreach($countLetters as $letter => $count){
  if($letter != ' ') echo $letter.' = '.$count.'<br>';
}
function countWords($phrase){
  $letters = array();
  while($index < strlen($phrase)){
    if(!isset($letters[$phrase[$index]])) $letters[$phrase[$index]] = 0;
    $letters[$phrase[$index]] ++;
    $index++;
  }
  ksort($letters);
  return $letters;
}
?>
