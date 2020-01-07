<?php
// init and sort roster
$roster = [8, 5, 6, 9, 3, 8, 2, 4, 6, 10, 8, 5, 6, 1, 7, 10, 5, 3, 7, 6];
array_multisort($roster);
// arrays for each team
$team1 = [];
$team2 = [];
// We need to know if there is an even or odd number on each team
$pairMod = COUNT($roster) / 2;
// if there is an even number on each team, grab the first and last values of the sorted
// roster and add them to team one, then grab the second and second last value add them to team 2
// and so on until no one is left.
if ($pairMod % 2 == 0) {
    for ($i = 0; $i < $pairMod; $i++) {
        if ($i % 2 == 0) {
            array_push($team1, $roster[$i], $roster[COUNT($roster) - $i - 1]);
        } else {
            array_push($team2, $roster[$i], $roster[COUNT($roster) - $i - 1]);
        }
    }
}
// if there is an odd number of players, follow the same process until the last iteration of the loop
else {
    for ($i = 0; $i < $pairMod; $i++) {
        if ($i % 2 == 0 && $i != $pairMod - 1) {
            array_push($team1, $roster[$i], $roster[COUNT($roster) - $i - 1]);
        }
        if ($i % 2 == 1 && $i != $pairMod - 1) {
            array_push($team2, $roster[$i], $roster[COUNT($roster) - $i - 1]);
        }
        // on last iteration, check to see what team has a higher score, give the final larger scored
        // player to the team that has less score and the team with the higher score the lower player
        // if they are equal it doesn't matter
        if ($i == $pairMod - 1) {
            if (array_sum($team1) > array_sum($team2)) {
                array_push($team1, $roster[$i]);
                array_push($team2, $roster[COUNT($roster) - $i - 1]);
            } else {
                array_push($team2, $roster[$i]);
                array_push($team1, $roster[COUNT($roster) - $i - 1]);
            }
        }
    }
}

// sort the arrays for ease of viewing
array_multisort($team1, $team2);
// print the arrays
print_r($team1);
print_r($team2);
