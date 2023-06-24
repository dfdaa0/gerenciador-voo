<?php
  include_once('global.php');

  class Status{
    private EnumStatus $s;
    public function __construct(EnumStatus $s)
    {
        $this->s = $s;
    }

    public function setStatus($s){
        $this->s = $s;
    }

    public function printStatus(){
        var_dump($this->s);
    }
  }

  $s = new Status(EnumStatus::PassagemAdquirida);
  $s->printStatus();
  $s->setStatus(EnumStatus::EmbarqueRealizado);
  $s->printStatus();
  $s->setStatus(EnumStatus::PassagemCancelada);
  $s->printStatus();
  $s->setStatus(EnumStatus::CheckinRealizado);
  $s->printStatus();
  
