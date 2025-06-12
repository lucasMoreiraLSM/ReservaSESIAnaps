<?php
namespace MRBS;
// Provavelmente deve ser uma classe, mas você só pode ter protegido
// membros da classe no PHP 5, para não incomodarmos

// Leia o número da versão real de um arquivo muito mais simples

require_once('version_num.inc');

function get_mrbs_version()
{
  global $hg_command;
  global $mrbs_version_number;

  $mrbs_version = "ReservaSESI $mrbs_version_number";

  if (function_exists('exec') && !function_disabled('exec'))
  {
    // Suprimir erros, porque estamos interessados apenas no sucesso
    $hg_id_out = @exec("$hg_command id --id --branch", $output, $retval);

    if (($retval == 0) && (strlen($hg_id_out)))
    {
      $mrbs_version .= "+hg ($hg_id_out)";
    }
  }

  return $mrbs_version;
}
