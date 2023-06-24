<?php
declare(strict_types=1);
  enum EnumStatus: int {
    case PassagemAdquirida = 0;
    case PassagemCancelada = 1;
    case CheckinRealizado = 3;
    case EmbarqueRealizado = 4;
    case NoShow = 5;
  }
?>