<?php
  require('models\student.php');

  class Students
  {
      public int    $msv;
      public string $fullname;

      public function __construct(int $msv, string $fullname)
      {
          $this->msv  = $number;
          $this->fullname    = $fullname;
      }

      public function getMsv(): int
      {
          return $this->msv;
      }
      public function getFullName() : string 
      {
        return $this->string;
      }

      public function setMsv($msv)
      {
        $this->msv = $msv;
      }

      public function setFullname($fullname)
      {
        $this->fullname = $fullname;
      }
  }
?>