<?php

class Rele
{
    private $data = [
        3 => 'RELE SRT FRAME 25 1,6-2,5A 0,5 CV P/SK109/112/118  0076180',
        4 => 'RELE SRT FRAME 25 12-18A 5-6CV P/SK109/112/118/125  0075609',
        5 => 'RELE SRT FRAME 25 17-25A 7,5CV P/109/112/118/125  0075610',
        6 => 'RELE SRT FRAME 25 2,5-4A 1CV P/SK109/112/118/125  0076181',
        7 => 'RELE SRT FRAME 25 4-6A 1,5CV P/SK109/112/118/125   0076182',
        8 => 'RELE SRT FRAME 25 5,5-8A 2CV P/109/112/118/125/132  0076183',
        9 => 'RELE SRT FRAME 25 7-10A 3CV P/SK109/112/118/125  0075593',
        10 => 'RELE SRT FRAME 25 9-13A 4CV P/SK109/112/118/125  0075595',
        11 => 'RELE SRT FRAME 36 23-32A P/SK132   0075611',
        12 => 'RELE SRT FRAME 36 30-40A P/SK132   0076187',
        13 => 'RELE SRT FRAME 93  63-80A P/SK140/150/165/180/195   0075617',
        14 => 'RELE SRT FRAME 93 23,32A 10CV P/SK140/150/165/180   0075612',
        15 => 'RELE SRT FRAME 93 30-40A 12,5/15CV P/SK140/150/165   0075613',
        16 => 'RELE SRT FRAME 93 37-50A P/SK140/150/165/180/195   0075614',
        17 => 'RELE SRT FRAME 93 48-65A P/SK140/150/165/180/195   0075615',
        18 => 'RELE SRT FRAME 93 55-70A P/SK140/150/165/180/195   0075616',
        19 => 'RELE SRT FRAME 93 80-93A P/SK140/150/165/180/195  0075618',
        20 => 'RELE SOBRECARGA LR9F P/LC1F115/185 48-80A   0005599',
        21 => 'RELE SOBRECARGA LR9F P/LC1F115/185 60-100A   0013951',
        22 => 'RELE SOBRECARGA LRD P/LC1D09-38 1,6-2,5A   0010846',
        23 => 'RELE SOBRECARGA LRD P/LC1D09-38 1-1,6A   0006114',
        24 => 'RELE SOBRECARGA LRD P/LC1D09-38 2,5-4A   0008979',
        25 => 'RELE SOBRECARGA LRD P/LC1D09-38 4-6A   0006635',
        26 => 'RELE SOBRECARGA LRD P/LC1D09-38 5,5-8A   0010847',
        27 => 'RELE SOBRECARGA LRD P/LC1D09-38 7-10A   0010848',
        28 => 'RELE SOBRECARGA LRD P/LC1D115-150 95-120A   0005604',
        29 => 'RELE SOBRECARGA LRD P/LC1D12-38 9-13A   0007570',
        30 => 'RELE SOBRECARGA LRD P/LC1D18-38 12-18A   0005805',
        31 => 'RELE SOBRECARGA LRD P/LC1D25-38 16-24A   0006102',
        32 => 'RELE SOBRECARGA LRD P/LC1D25-38 23-32A   0010849',
        33 => 'RELE SOBRECARGA LRD P/LC1D32-38 30-38A   0010850',
        34 => 'RELE SOBRECARGA LRD P/LC1D40A-65A 17-25A   0013702',
        35 => 'RELE SOBRECARGA LRD P/LC1D40A-65A 37-50A   0017241',
        36 => 'RELE SOBRECARGA LRD P/LC1D40A-65A 48-65A   0017242',
        37 => 'RELE SOBRECARGA LRD P/LC1D65-95A 63-80A   0005602',
        38 => 'RELE SOBRECARGA LRD P/LC1D80-95A 80-104A   0005603',
        39 => 'RELE SOBRECARGA LRE P/LC1E06-E38 0,10-0,16A 0015216',
        40 => 'RELE SOBRECARGA LRE P/LC1E06-E38 0,16-0,25A   0015217',
        41 => 'RELE SOBRECARGA LRE P/LC1E06-E38 0,25-0,40A  0015218',
        42 => 'RELE SOBRECARGA LRE P/LC1E06-E38 0,40-0,63A   0015219',
        43 => 'RELE SOBRECARGA LRE P/LC1E06-E38 0,63-1A   0015220',
        44 => 'RELE SOBRECARGA LRE P/LC1E06-E38 1,6-2,5A   0015222',
        45 => 'RELE SOBRECARGA LRE P/LC1E06-E38 1-1,6A   0015221',
        46 => 'RELE SOBRECARGA LRE P/LC1E06-E38 2,5-4A   0015223',
        47 => 'RELE SOBRECARGA LRE P/LC1E06-E38 4-6A   0015224',
        48 => 'RELE SOBRECARGA LRE P/LC1E09-E38 5,5-8A   0015225',
        49 => 'RELE SOBRECARGA LRE P/LC1E09-E38 7-10A   0015226',
        50 => 'RELE SOBRECARGA LRE P/LC1E12-E38 9-13A  0015227',
        51 => 'RELE SOBRECARGA LRE P/LC1E18-E38 12-18A   0015228',
        52 => 'RELE SOBRECARGA LRE P/LC1E25-E38 16-24A   0015229',
        53 => 'RELE SOBRECARGA LRE P/LC1E25-E38 23-32A   0015230',
        54 => 'RELE SOBRECARGA LRE P/LC1E38 30-38A   0015232',
        55 => 'RELE SOBRECARGA LRE P/LC1E40-E95 17-25A   0015231',
        56 => 'RELE SOBRECARGA LRE P/LC1E40-E95 23-32A   0015233',
        57 => 'RELE SOBRECARGA LRE P/LC1E40-E95 30-40A   0015234',
        58 => 'RELE SOBRECARGA LRE P/LC1E50-E95 37-50A   0015235',
        59 => 'RELE SOBRECARGA LRE P/LC1E65-E95 48-65A   0015236',
        60 => 'RELE SOBRECARGA LRE P/LC1E80-E95 55-70A   0015237',
        61 => 'RELE SOBRECARGA LRE P/LC1E80-E95 63-80A   0015238',
        62 => 'RELE SOBRECARGA LRE P/LC1E95 80-104A   0015239',
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

    public function steck()
    {
        $corrente = $this->corrente();
        if ($corrente <= 2.5) return $this->data[3];
        if ($corrente <= 4) return $this->data[6];
        if ($corrente <= 6) return $this->data[7];
        if ($corrente <= 8) return $this->data[8];
        if ($corrente <= 10) return $this->data[9];
        if ($corrente <= 13) return $this->data[10];
        if ($corrente <= 18) return $this->data[4];
        if ($corrente <= 25) return $this->data[5];
        if ($corrente <= 32) return $this->data[11];
        if ($corrente <= 40) return $this->data[15];
        if ($corrente <= 50) return $this->data[16];
        if ($corrente <= 65) return $this->data[17];
        if ($corrente <= 70) return $this->data[18];
        if ($corrente <= 80) return $this->data[13];
        if ($corrente <= 93) return $this->data[19];
    }
    public function lc1d()
    {
        $corrente = $this->corrente();
        if ($corrente <= 1.6) return $this->data[23];
        if ($corrente <= 2.5) return $this->data[22];
        if ($corrente <= 4) return $this->data[24];
        if ($corrente <= 6) return $this->data[25];
        if ($corrente <= 8) return $this->data[26];
        if ($corrente <= 10) return $this->data[27];
        if ($corrente <= 13) return $this->data[29];
        if ($corrente <= 18) return $this->data[30];
        if ($corrente <= 24) return $this->data[31];
        if ($corrente <= 32) return $this->data[32];
        if ($corrente <= 38) return $this->data[33];
        if ($corrente <= 50) return $this->data[35];
        if ($corrente <= 65) return $this->data[36];
        if ($corrente <= 80) return $this->data[37];
        if ($corrente <= 104) return $this->data[38];
    }
    public function lc1e()
    {
        $corrente = $this->corrente();
        if ($corrente <= 0.16) return $this->data[39];
        if ($corrente <= 0.25) return $this->data[40];
        if ($corrente <= 0.4) return $this->data[41];
        if ($corrente <= 0.63) return $this->data[42];
        if ($corrente <= 1) return $this->data[43];
        if ($corrente <= 1.6) return $this->data[45];
        if ($corrente <= 2.5) return $this->data[44];
        if ($corrente <= 4) return $this->data[46];
        if ($corrente <= 6) return $this->data[47];
        if ($corrente <= 8) return $this->data[48];
        if ($corrente <= 10) return $this->data[49];
        if ($corrente <= 13) return $this->data[50];
        if ($corrente <= 18) return $this->data[51];
        if ($corrente <= 25) return $this->data[52];
        if ($corrente <= 32) return $this->data[53];
        if ($corrente <= 40) return $this->data[57];
        if ($corrente <= 50) return $this->data[58];
        if ($corrente <= 65) return $this->data[59];
        if ($corrente <= 70) return $this->data[60];
        if ($corrente <= 80) return $this->data[61];
        if ($corrente <= 104) return $this->data[62];
    }

    public function getResult()
    {
        return array_filter([
            'Steck' => [
                $this->steck()
            ],
            'Schneider para contatores LC1D' => [
                $this->lc1d()
            ],
            'Schneider para contatores LC1E' => [
                $this->lc1e()
            ]
        ]);
    }
}
