<?php
error_reporting(E_ALL ^ E_NOTICE);  



// This array contains all the letters and the points assigned to each letter
$scores = array(
	// 1 point letters
	"E" => 1, "A" => 1, "I" => 1, "O" => 1, "N" => 1, "R" => 1, "T" => 1, "L" => 1, "S" => 1, "U" => 1,
	// 2 points letters
	"D" => 2, "G"  => 2,
	// 3 points letters
	"B" => 3, "C"  => 3, "M" => 3, "P" => 3,
	// 4 points letters
	"F" => 4, "H" => 4, "V"=> 4, "W"=> 4, "Y"=> 4,
	// 5 points letters
	"K" => 5,
	// 8 points letters
	"J" => 8, "X"=> 8,
	// 10 points letters
	"Q" => 10, "Z" => 10
 );

$bagDistribution = array(
	"E" => 12,
	"A" => 9, "I" => 9,
	"O" => 8,
	"N" => 6, "R" => 6, "T" => 6,
	"L" => 4, "S" => 4, "U" => 4, "D" => 4,
	"G" => 3,
	"B"=> 2, "C"=> 2, "M"=> 2, "P"=> 2, "F" => 2, "H" => 2, "V" => 2, "W" => 2, "Y" => 2,
	"K" => 1, "J"=> 1, "X"=> 1, "Q"=> 1, "Z"=> 1
);
$bag = array();
$rack = array();

function calculateScore($word){

	global $scores;
	$score = 0;

	$characters = str_split(strtoupper($word));

	foreach($characters as $char){
		$score = $score + $scores[$char];
	}

	return $score;

}

function createBag(){
	global $bagDistribution;
	$bag = array();
	foreach($bagDistribution as $key => $value){

		for($i = 0; $i < $bagDistribution[$key]; $i++){
			$bag[] = $key;
		}
	}

	return $bag;
/*
	for($i = 0; $i <= count($bagDistribution); $i++){
		for($j = 0;$j<= $bagDistribution[$bagDistribution[$i]];$j++){
			$bag[] = $bagDistribution
		}
	}*/
}

$word = "England";

function assignTiles($bag,$nbr){

	shuffle($bag);
	$tiles = array();
	$count = 0;

	foreach($bag as $key => $value){

		$tiles[] = $value;
		$count++;
		if($count == $nbr){
			return $tiles;
			break;
		}
	}	
	
	return $tiles;
}
$bag = createBag();

$rack = array("W","O","R","L","X","S","S");
$words = array("HELLO","WORLD");
function findValidWords($rack){
	global $words;

	$word = "";
	foreach($words as $word){
		$charactersWord = str_split($word);
		$count = 0;
		$found = false;
		foreach($rack as $tile){
			//echo $tile;
			if(in_array($tile,$charactersWord)){
				$count++;
			}
			if($count == count($charactersWord)){
				$found = true;
				$word = $word;
				break;
			}
		}

		if($found){
			break;
		}

	}

	return $found;

}
//echo"<pre>";
//var_dump($rack);


//echo calculateScore($word);
echo findValidWords($rack);


?>