<?php

require('config.php');

$branch = $argv[1];

$json = file_get_contents("https://api.trello.com/1/boards/".$board."/cards/visible?key=".$key."&token=".$token);

$cards = json_decode( $json );

foreach ($cards AS $card) {

  if ( strpos($card->name, $branch) !== false OR strpos($card->desc, $branch) !== false ) {

    $idChecklists = $card->idChecklists;

    foreach ( $idChecklists AS $idChecklist ) {

      $checklistJson = file_get_contents("https://api.trello.com/1/checklists/".$idChecklist."?key=".$key."&token=".$token);
      $checklist = json_decode( $checklistJson );

      $checklistArray = array();
      
      $checklistArray["name"] = $checklist -> name;
      $checklistArray["todo"] = array();
      $checklistArray["done"] = array();

      foreach ( $checklist -> checkItems AS $item ) {

        if ( $item->state == "incomplete" ) {
          $checklistArray["todo"][] = $item->name;
        } else {
          $checklistArray["done"][] = $item->name;
        }

      }

      $checklists[] = $checklistArray;

    }

  }

}

foreach ( $checklists AS $checklist ) {

  $output[] = "";

  $output[] = $checklist["name"].":";
  $output[] = "================================";

  if ( count( $checklist["todo"] ) > 0 ) {

    $output[] = "";

    foreach ( $checklist["todo"] AS $todo ) {

      $output[] = "[ ] ".$todo;

    }

  }

  if ( count( $checklist["done"] ) > 0 ) {

    $output[] = "";

    foreach ( $checklist["done"] AS $done ) {

      $output[] = "[x] ".$done;

    }

  }

  $output[] = "";

}

echo implode($output, PHP_EOL).PHP_EOL;

