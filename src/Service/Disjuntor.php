<?php

class Disjuntor
{
    private $data = [
        '33' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 13-18A 0024942',
        '34' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 17-23A 0080043',
        '35' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 2,5-4A 0076021',
        '36' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 20-25A 0024945',
        '37' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 24-32A 0024947',
        '38' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 4-6,3A 0026428',
        '39' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 6-10A 0009040',
        '40' => 'DISJUNTOR MOTOR TERMOMAG 3P 25A 9–14A 0024940',
        '41' => 'DISJUNTOR MOTOR TERMOMAG 3P 80A 25-40A 0006493',
        '42' => 'DISJUNTOR MOTOR TERMOMAG 3P 80A 40-63A 0037548',
        '43' => 'DISJUNTOR MOTOR TERMOMAG 3P 80A 56-80A 0080042',
        '46' => 'DISJUNTOR MOTOR TERMOMAG GV2 1,6-2,5A C/BOT IMP 0010818',
        '47' => 'DISJUNTOR MOTOR TERMOMAG GV2 13-18A C/BOT IMP 0010821',
        '48' => 'DISJUNTOR MOTOR TERMOMAG GV2 17-23A C/BOT IMP 0010822',
        '49' => 'DISJUNTOR MOTOR TERMOMAG GV2 2,5-4A C/BOT IMP 0006528',
        '50' => 'DISJUNTOR MOTOR TERMOMAG GV2 20-25A C/BOT IMP 0010823',
        '51' => 'DISJUNTOR MOTOR TERMOMAG GV2 24-32A C/BOT IMP 0005021',
        '52' => 'DISJUNTOR MOTOR TERMOMAG GV2 4-6,3A C/BOT IMP 0004362',
        '53' => 'DISJUNTOR MOTOR TERMOMAG GV2 6-10A C/BOT IMP 0010819',
        '54' => 'DISJUNTOR MOTOR TERMOMAG GV2 9-14A C/BOT IMP 0010820',
        '55' => 'DISJUNTOR MOTOR TERMOMAG GV2 9-14A C/BOT IMP 0010820',
        '56' => 'DISJUNTOR MOTOR TERMOMAG GV2P 20-25A 0005596',
        '59' => 'DISJUNTOR MOTOR TERMOMAG GV3 48-65A 0003619',
        '60' => 'DISJUNTOR MOTOR TERMOMAG GV3P 17-25A 0001769',
        '61' => 'DISJUNTOR MOTOR TERMOMAG GV3P 30-40A 0010947',
        '64' => 'DISJUNTOR MOTOR TERMOMAG GV7 48-80A 100KA-220V 0013953',
        '65' => 'DISJUNTOR MOTOR TERMOMAG GV7 48-80A 85KA-220V 0013952',
        '68' => 'DISJUNTOR MOTOR TERMOMAG GZ1 0,63-1A C/BOT IMP 0035074',
        '69' => 'DISJUNTOR MOTOR TERMOMAG GZ1 1,6-2,5A C/BOT IMP 0016524',
        '70' => 'DISJUNTOR MOTOR TERMOMAG GZ1 1-1,6A C/BOT IMP 0051286',
        '71' => 'DISJUNTOR MOTOR TERMOMAG GZ1 13-18A C/BOT IMP 0009068',
        '72' => 'DISJUNTOR MOTOR TERMOMAG GZ1 17-23A C/BOT IMP 0015747',
        '73' => 'DISJUNTOR MOTOR TERMOMAG GZ1 2,5-4A C/BOT IMP 0009066',
        '74' => 'DISJUNTOR MOTOR TERMOMAG GZ1 20-25A C/BOT IMP 0041021',
        '75' => 'DISJUNTOR MOTOR TERMOMAG GZ1 24-32A C/BOT IMP 0051284',
        '76' => 'DISJUNTOR MOTOR TERMOMAG GZ1 4-6,3A C/BOT IMP 0004602',
        '77' => 'DISJUNTOR MOTOR TERMOMAG GZ1 6-10A C/BOT IMP 0009067',
        '78' => 'DISJUNTOR MOTOR TERMOMAG GZ1 9-14A C/BOT IMP 0016523'
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
        return ($this->cv * 746) / ($this->tensao * 1.73 * 0.7);
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
    private function schneider1()
    {
        $corrente = $this->corrente();
        if ($corrente <= 2.5) return $this->data[46];
        if ($corrente <= 4) return $this->data[49];
        if ($corrente <= 6.3) return $this->data[52];
        if ($corrente <= 10) return $this->data[53];
        if ($corrente <= 14) return $this->data[54];
        if ($corrente <= 18) return $this->data[47];
        if ($corrente <= 23) return $this->data[48];
        if ($corrente <= 25) return $this->data[50];
        if ($corrente <= 32) return $this->data[51];
        // return 'NENHUM';
    }
    private function schneider2()
    {
        if ($this->tensao == 7.5) return $this->data[56];
        // return 'NENHUM';
    }
    private function schneider3()
    {
        if ($this->tensao == 7.5) return $this->data[60];
        if ($this->tensao == 10) return $this->data[61];
        if ($this->tensao == 11) return $this->data[61];
        if ($this->tensao == 12) return $this->data[61];
        if ($this->tensao >= 15) return $this->data[59];
        // return 'NENHUM';
    }
    private function schneider4()
    {
        $corrente = $this->corrente();
        if ($corrente <= 1) return $this->data[68];
        if ($corrente <= 1.6) return $this->data[70];
        if ($corrente <= 2.5) return $this->data[69];
        if ($corrente <= 4) return $this->data[73];
        if ($corrente <= 6.3) return $this->data[76];
        if ($corrente <= 10) return $this->data[77];
        if ($corrente <= 14) return $this->data[78];
        if ($corrente <= 18) return $this->data[71];
        if ($corrente <= 25) return $this->data[74];
        if ($corrente <= 32) return $this->data[75];
        // return 'NENHUM';
    }
    private function steck()
    {
        $corrente = $this->corrente();
        if ($corrente < 4) return '';
        if ($corrente == 4) return $this->data[35];
        if ($corrente <= 6.3) return $this->data[38];
        if ($corrente <= 10) return $this->data[39];
        if ($corrente <= 14) return $this->data[40];
        if ($corrente <= 18) return $this->data[33];
        if ($corrente <= 23) return $this->data[34];
        if ($corrente == 24) return $this->data[36];
        if ($corrente <= 32) return $this->data[37];
        if ($corrente <= 40) return $this->data[41];
        if ($corrente <= 63) return $this->data[42];
        if ($corrente <= 80) return $this->data[43];
        // return 'NENHUM';
    }
    public function getResult()
    {
        return array_filter([
            'Schneider' => array_filter([
                $this->schneider1(),
                $this->schneider2(),
                $this->schneider3(),
                $this->schneider4()
            ]),
            'Steck' => [
                $this->steck()
            ]
        ]);
    }
}
