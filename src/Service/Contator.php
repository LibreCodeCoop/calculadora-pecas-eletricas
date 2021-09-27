<?php

class Contator
{
    private $data = [
        '3' => 'LC1D09M7 0010826',
        '4' => 'LC1D12M7 0006706',
        '5' => 'LC1D18M7 0004673',
        '6' => 'LC1D25M7 0006705',
        '7' => 'LC1D32M7 0010829 ',
        '8' => 'LC1D40AM7 0005806',
        '9' => 'LC1D50AM7 N 0010834',
        '10' => 'LC1D65AM7 N 0008419',
        '11' => 'LC1D80M7 0010631',
        '12' => 'LC1D95M7 N 0003996',
        '13' => 'LC1D1156M7 N 0005556',
        '14' => 'LC1E0910M7 0017432',
        '15' => 'LC1E1210M7 0017492',
        '16' => 'LC1E1810M7 0017428',
        '17' => 'LC1E2510M7 0017429',
        '18' => 'LC1E3210M7 0017430',
        '19' => 'LC1E40M6 FL 0015207',
        '20' => 'LC1E50M7 N 0015209',
        '21' => 'LC1E65M7 N 0017486',
        '22' => 'LC1E80M7 N 0017427',
        '23' => 'LC1E95M7 N 0017579',
        '24' => 'SK109A10M 0075558',
        '25' => 'SK112A10M 0074803',
        '26' => 'SK118A10M 007487',
        '27' => 'SK125A10M 0075475',
        '28' => 'SK132A10M 0016376',
        '29' => 'SK140A11M 0071590',
        '30' => 'SK165A11M 0075588',
        '31' => 'SK180A11M 0075590',
        '32' => 'SK195A11M 0075592'
    ];

    private $tensao;
    private $sistema;
    private $cv;
    public function __construct($cv, $tensao, $sistema)
    {
        $this->cv = (float) $cv;
        $this->tensao = (int) $tensao;
        $this->sistema = (int) $sistema;
    }

    private function trifasico()
    {
        return ($this->cv * 746) / ($this->tensao * 1.73 * 0.65);
    }

    private function monofasicoBifasico()
    {
        return ($this->cv * 746) / ($this->tensao * 0.65);
    }

    private function corrente()
    {
        if ($this->sistema == 1 || $this->sistema == 2) {
            return $this->monofasicoBifasico();
        }
        if ($this->sistema == 3) {
            return $this->trifasico();
        }
        return 0;
    }
    private function schneider()
    {
        $corrente = $this->corrente();
        if ($corrente <= 9) return $this->data[24];
        if ($corrente <= 12) return $this->data[25];
        if ($corrente <= 18) return $this->data[26];
        if ($corrente <= 25) return $this->data[27];
        if ($corrente <= 32) return $this->data[28];
        if ($corrente <= 40) return $this->data[29];
        if ($corrente <= 65) return $this->data[30];
        if ($corrente <= 80) return $this->data[31];
        if ($corrente <= 95) return $this->data[32];
        // return 'NENHUM';
    }
    private function steck()
    {
        $corrente = $this->corrente();
        if ($corrente <= 9) return $this->data[3];
        if ($corrente <= 12) return $this->data[4];
        if ($corrente <= 18) return $this->data[5];
        if ($corrente <= 25) return $this->data[6];
        if ($corrente <= 32) return $this->data[7];
        if ($corrente <= 40) return $this->data[8];
        if ($corrente <= 50) return $this->data[9];
        if ($corrente <= 65) return $this->data[10];
        if ($corrente <= 80) return $this->data[11];
        if ($corrente <= 95) return $this->data[12];
        if ($corrente <= 115) return $this->data[13];
        // return 'NENHUM';
    }
    public function getResult()
    {
        return array_filter([
            'Schneider' => [
                $this->schneider()
            ],
            'Steck' => [
                $this->steck()
            ]
        ]);
    }
}
