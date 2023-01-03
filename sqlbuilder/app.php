<?php

// Client Code

require "vendor/autoload.php";

use DesignPattern\MySQLQueryBuilder;

$builder = new MySQLQueryBuilder();


// # 1
// $query1 = $builder->select('goal', ['*'])
// 	->where('player', 'LIKE', '%Bender')
// 	->getSQL();

// echo $query1;

// echo "\n\n-------------------------\n\n";

// # 2
// $query2 = $builder->select('game', ['game.id', 'game.mdate', 'game.stadium', 'goal.player', 'goal.gtime'])
// 		->join('goal', 'game.id', 'goal.matchid')
// 		->where('game.stadium', 'LIKE' ,'%National%')
// 		->getSQL();

// echo $query2;

echo "\n\n-------------------------\n\n";
#number1
$query1 = $builder->select('game', [ 'game.team1', 'game.team2', 'goal.player'])
	->join('goal', 'game.id', 'goal.matchid')
	->where('game.mdate', 'LIKE', '2012-06-12T00:00:00')
	->where('game.stadium', 'LIKE', 'National Stadium Warsaw')
	->getSQL();

echo $query1;


echo "\n\n-------------------------\n\n";
#number2
$query2 = $builder->select('eteam', [ 'goal.player', 'eteam.coach'])
	->join('goal', 'eteam.id', 'goal.teamid')
	->where('goal.player', 'LIKE', '%Mario Gómez')
	->where('eteam.id', 'LIKE', 'GER')
	->getSQL();

echo $query2;

echo "\n\n-------------------------\n\n";
#number3
$query3 = $builder->select('eteam', [ 'game.team1','game.team2', 'eteam.coach'])
	->join('game', 'eteam.id', 'game.id')
	->where('game.mdate', 'LIKE', '2012-06-15T00:00:00')
	->limit(10, )
	->getSQL();

echo $query3;

echo "\n\n-------------------------\n\n";

var_dump($builder);
