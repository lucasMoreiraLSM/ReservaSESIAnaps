<?php
namespace MRBS;

// O índice é apenas um esboço para redirecionar para a visualização apropriada
// conforme definido em config.inc.php usando a variável $ default_view
// Se $default_room estiver definido em config.inc.php, isso será
// ser usado para redirecionar para uma sala específica.

require "defaultincludes.inc";
require_once "mrbs_sql.inc";

switch ($default_view)
{
  case "month":
    $redirect_str = "month.php";
    break;
  case "week":
    $redirect_str = "week.php";
    break;
  default:
    $redirect_str = "day.php";
}

$redirect_str .= "?year=$year&month=$month&day=$day&area=$area&room=$room";

header("Location: $redirect_str");

