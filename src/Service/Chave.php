<?php

class Chave
{
    private $data = [
        '3' => 'CHAVE DE PARTIDA DIR. 3P 0,5CV 220V 1,6-2,5A 0005613',
        '4' => 'CHAVE DE PARTIDA DIR. 3P 0,75-1CV 220V 2,5-4A 0010852',
        '5' => 'CHAVE DE PARTIDA DIR. 3P 1,5CV 220V 4-6A 0010853',
        '6' => 'CHAVE DE PARTIDA DIR. 3P 10CV 220V 23-32A 0010858',
        '7' => 'CHAVE DE PARTIDA DIR. 3P 12,5-15CV 220V 30-38A 0010859',
        '8' => 'CHAVE DE PARTIDA DIR. 3P 2CV 220V 5,5-8A 0005543',
        '9' => 'CHAVE DE PARTIDA DIR. 3P 3CV 220V 7-10A 0010854',
        '10' => 'CHAVE DE PARTIDA DIR. 3P 4CV 220V 9-13A 0010855',
        '11' => 'CHAVE DE PARTIDA DIR. 3P 5-6CV 220V 12-18A 0010856',
        '12' => 'CHAVE DE PARTIDA DIR. 3P 7,5CV 220V 16-24A 0010857',
        '13' => 'CHAVE PARTIDA DIRETA 0,5CV 1,6/2,5A 230V 0083706',
        '14' => 'CHAVE PARTIDA DIRETA 0.16CV 0,63/-1A 230V 0083703',
        '15' => 'CHAVE PARTIDA DIRETA 0.25CV 1,1.6A 230V 0083704',
        '16' => 'CHAVE PARTIDA DIRETA 1,5CV 4/6A 230V 0083708',
        '17' => 'CHAVE PARTIDA DIRETA 1/3-1/2CV 1/1,6A 220V 0076650',
        '18' => 'CHAVE PARTIDA DIRETA 1/4CV 0,63/-1A 220V 0076649',
        '19' => 'CHAVE PARTIDA DIRETA 10CV 23/32A 230V 0083714',
        '20' => 'CHAVE PARTIDA DIRETA 15CV 30/40A 230V 0083715',
        '21' => 'CHAVE PARTIDA DIRETA 1CV 2,5/4A 230V 0083707',
        '22' => 'CHAVE PARTIDA DIRETA 20CV 37/50A 230V 0083716',
        '23' => 'CHAVE PARTIDA DIRETA 30CV 63/80A 230V 0083717',
        '24' => 'CHAVE PARTIDA DIRETA 3CV 7/10A 230V 0083709',
        '25' => 'CHAVE PARTIDA DIRETA 4CV 9,13A 230V 0083710',
        '26' => 'CHAVE PARTIDA DIRETA 5CV 12/18A 230V 0083711',
        '27' => 'CHAVE PARTIDA DIRETA 7,5CV 17,25A 230V 0083712',
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

    private function steck1()
    {
        $corrente = $this->corrente();
        if ($this->cv <= 0.16) return $this->data[14];
        if ($this->cv == 0.25) return $this->data[15];
        if ($this->cv == 0.5) return $this->data[13];
        if ($this->cv == 0.75) return $this->data[4];
        if ($this->cv == 1) return $this->data[21];
        if ($this->cv == 1.5) return $this->data[16];
        if ($this->cv == 2) return '';
        if ($this->cv == 3) return $this->data[24];
        if ($this->cv == 4) return $this->data[25];
        if ($this->cv <= 6) return $this->data[26];
        if ($this->cv == 7.5) return $this->data[27];
        if ($this->cv <= 10) return $this->data[19];
        if ($this->cv <= 15) return $this->data[20];
        if ($this->cv <= 20) return $this->data[22];
        if ($this->cv <= 30) return $this->data[23];
    }
    private function steck2()
    {
        $corrente = $this->corrente();
        if ($this->cv <= 0.25) return $this->data[18];
        if ($this->cv == 0.5) return $this->data[17];
    }
    private function schneider()
    {
        $corrente = $this->corrente();
        if ($corrente <= 0.16) return '';
        if ($this->cv == 0.5) return $this->data[3];
        if ($this->cv <= 1) return $this->data[4];
        if ($this->cv <= 1.5) return $this->data[5];
        if ($this->cv == 2) return $this->data[8];
        if ($this->cv == 3) return $this->data[9];
        if ($this->cv == 4) return $this->data[10];
        if ($this->cv <= 6) return $this->data[11];
        if ($this->cv == 7.5) return $this->data[12];
    }

    public function getResult()
    {
        return array_filter([
            'Steck' => array_filter([
                $this->steck1(),
                $this->steck2()
            ]),
            'Schneider' => array_filter([
                $this->schneider()
            ])
        ]);
    }
}
