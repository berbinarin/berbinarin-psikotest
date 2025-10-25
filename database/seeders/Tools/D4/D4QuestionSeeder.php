<?php

namespace Database\Seeders\Tools\D4;

use App\Models\Tool;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class D4QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $d4_1 = Tool::where('name', 'D4 Bagian 1')->with('sections')->first();
        $d4_2 = Tool::where('name', 'D4 Bagian 2')->with('sections')->first();

        $questionsPart1 = [
            // SUBTES CONTOH
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 1,
                'text' => '<p>1.AB  AC  AD  AE  AF</p>
                            <p>2.  aA  aB  BA  Ba Bb</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 2,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'AC'],
                    ['key' => 'B', 'text' => 'AE'],
                    ['key' => 'C', 'text' => 'AF'],
                    ['key' => 'D', 'text' => 'AB'],
                    ['key' => 'E', 'text' => 'AD'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 3,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'BA'],
                    ['key' => 'B', 'text' => 'Ba'],
                    ['key' => 'C', 'text' => 'Bb'],
                    ['key' => 'D', 'text' => 'aA'],
                    ['key' => 'E', 'text' => 'aB'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES A
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 4,
                'text' => '<p>1. nv  nx  xn  vx  xv</p>
                            <p>2. bl  dl  ld  lb    bd</p>
                            <p>3. ar     au   ur   ra   ru</p>
                            <p>4. wu   vu   vw wv   uw</p>
                            <p>5. wm  um  mu  wu mw</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 5,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'xn'],
                    ['key' => 'B', 'text' => 'xv'],
                    ['key' => 'C', 'text' => 'nx'],
                    ['key' => 'D', 'text' => 'vx'],
                    ['key' => 'E', 'text' => 'nv'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 6,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'bl'],
                    ['key' => 'B', 'text' => 'ld'],
                    ['key' => 'C', 'text' => 'lb'],
                    ['key' => 'D', 'text' => 'dl'],
                    ['key' => 'E', 'text' => 'bd'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 7,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ra'],
                    ['key' => 'B', 'text' => 'ur'],
                    ['key' => 'C', 'text' => 'ar'],
                    ['key' => 'D', 'text' => 'ru'],
                    ['key' => 'E', 'text' => 'au'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 8,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'vw'],
                    ['key' => 'B', 'text' => 'vu'],
                    ['key' => 'C', 'text' => 'wv'],
                    ['key' => 'D', 'text' => 'wu'],
                    ['key' => 'E', 'text' => 'uw'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 9,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'wu'],
                    ['key' => 'B', 'text' => 'wm'],
                    ['key' => 'C', 'text' => 'mu'],
                    ['key' => 'D', 'text' => 'mw'],
                    ['key' => 'E', 'text' => 'um'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],

            // SUBTES B
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 10,
                'text' => '<p>6.  79  76     67  69    97</p>
                            <p>7.  ra na    nr    rn     ar</p>
                            <p>8.  za  mz   zm  az    ma</p>
                            <p>9.  AV  VN   NV  NA  VA</p>
                            <p>10. OQ  CQ  QC  QO OC</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 11,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '76'],
                    ['key' => 'B', 'text' => '79'],
                    ['key' => 'C', 'text' => '97'],
                    ['key' => 'D', 'text' => '79'],
                    ['key' => 'E', 'text' => '67'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 12,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ar'],
                    ['key' => 'B', 'text' => 'na'],
                    ['key' => 'C', 'text' => 'nr'],
                    ['key' => 'D', 'text' => 'rn'],
                    ['key' => 'E', 'text' => 'ra'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 13,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'az'],
                    ['key' => 'B', 'text' => 'za'],
                    ['key' => 'C', 'text' => 'zm'],
                    ['key' => 'D', 'text' => 'Mz'],
                    ['key' => 'E', 'text' => 'ma'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 14,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'NV'],
                    ['key' => 'B', 'text' => 'VN'],
                    ['key' => 'C', 'text' => 'AV'],
                    ['key' => 'D', 'text' => 'VA'],
                    ['key' => 'E', 'text' => 'NA'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 15,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'QO'],
                    ['key' => 'B', 'text' => 'QC'],
                    ['key' => 'C', 'text' => 'OC'],
                    ['key' => 'D', 'text' => 'OQ'],
                    ['key' => 'E', 'text' => 'CQ'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES C
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 16,
                'text' => '<p>11.CU  UU  UC  US  CC</p>
                            <p>12. 4H  4N   NH  N4 HN</p>
                            <p>13. Rr   RP  pR   PP rr</p>
                            <p>14. AA   A8  8a   8A  aA</p>
                            <p>15. LT   Tt    tT    Tl   tt</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 17,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'CU'],
                    ['key' => 'B', 'text' => 'US'],
                    ['key' => 'C', 'text' => 'CC'],
                    ['key' => 'D', 'text' => 'UU'],
                    ['key' => 'E', 'text' => 'UC'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 18,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'N4'],
                    ['key' => 'B', 'text' => 'NH'],
                    ['key' => 'C', 'text' => '4N'],
                    ['key' => 'D', 'text' => 'HN'],
                    ['key' => 'E', 'text' => '4H'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 19,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'RP'],
                    ['key' => 'B', 'text' => 'PP'],
                    ['key' => 'C', 'text' => 'rr'],
                    ['key' => 'D', 'text' => 'pR'],
                    ['key' => 'E', 'text' => 'Rr'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 20,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'aA'],
                    ['key' => 'B', 'text' => 'Aa'],
                    ['key' => 'C', 'text' => '8A'],
                    ['key' => 'D', 'text' => 'A8'],
                    ['key' => 'E', 'text' => '8a'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 21,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'tT'],
                    ['key' => 'B', 'text' => 'Tl'],
                    ['key' => 'C', 'text' => 'Tt'],
                    ['key' => 'D', 'text' => 'LT'],
                    ['key' => 'E', 'text' => 'tt'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],

            // SUBTES D
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 22,
                'text' => '<p>16. Av  Vv  av  VV AA</p>
                            <p>17. 4d  3c 4a  4c   3a</p>
                            <p>18. X7  V9 V5  X9 V7</p>
                            <p>19. A9 7b  79  9b   b7</p>
                            <p>20. 20  25 02  05   52</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 23,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Av'],
                    ['key' => 'B', 'text' => 'av'],
                    ['key' => 'C', 'text' => 'AA'],
                    ['key' => 'D', 'text' => 'VV'],
                    ['key' => 'E', 'text' => 'Vv'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 24,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '3a'],
                    ['key' => 'B', 'text' => '4c'],
                    ['key' => 'C', 'text' => '4a'],
                    ['key' => 'D', 'text' => '3c'],
                    ['key' => 'E', 'text' => '4d'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 25,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'X9'],
                    ['key' => 'B', 'text' => 'V9'],
                    ['key' => 'C', 'text' => 'X7'],
                    ['key' => 'D', 'text' => 'V7'],
                    ['key' => 'E', 'text' => 'V6'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 26,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'B7'],
                    ['key' => 'B', 'text' => 'A9'],
                    ['key' => 'C', 'text' => '79'],
                    ['key' => 'D', 'text' => '7B'],
                    ['key' => 'E', 'text' => '9b'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 27,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '25'],
                    ['key' => 'B', 'text' => '52'],
                    ['key' => 'C', 'text' => '20'],
                    ['key' => 'D', 'text' => '5'],
                    ['key' => 'E', 'text' => '2'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES E
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 28,
                'text' => '<p>21. ar     ra ro     or   oa</p>
                            <p>22. lc     lo    ol    oc   co</p>
                            <p>23. ls     l3    3l     3s   sl</p>
                            <p>24. ma  cm  ca   mc  am</p>
                            <p>25. xv    vx vw   wx   wv</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 29,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'or'],
                    ['key' => 'B', 'text' => 'ra'],
                    ['key' => 'C', 'text' => 'ro'],
                    ['key' => 'D', 'text' => 'oa'],
                    ['key' => 'E', 'text' => 'ar'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 30,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'lc'],
                    ['key' => 'B', 'text' => 'oc'],
                    ['key' => 'C', 'text' => 'Lo'],
                    ['key' => 'D', 'text' => 'co'],
                    ['key' => 'E', 'text' => 'ol'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 31,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'l3'],
                    ['key' => 'B', 'text' => 'sl'],
                    ['key' => 'C', 'text' => '3l'],
                    ['key' => 'D', 'text' => '3s'],
                    ['key' => 'E', 'text' => 'ls'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 32,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ma'],
                    ['key' => 'B', 'text' => 'mc'],
                    ['key' => 'C', 'text' => 'cm'],
                    ['key' => 'D', 'text' => 'am'],
                    ['key' => 'E', 'text' => 'ca'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 33,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'wv'],
                    ['key' => 'B', 'text' => 'xv'],
                    ['key' => 'C', 'text' => 'vw'],
                    ['key' => 'D', 'text' => 'vx'],
                    ['key' => 'E', 'text' => 'wx'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES F
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 34,
                'text' => '<p>26.  ud un  nd  nu  du</p>
                            <p>27.  fk    lk   kf  lf    kl</p>
                            <p>28.  pq  qg  gp  gq qp</p>
                            <p>29.  2u 2q  qu  q2  u2</p>
                            <p>30.  41  44 14  11  40</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 35,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'nu'],
                    ['key' => 'B', 'text' => 'ud'],
                    ['key' => 'C', 'text' => 'du'],
                    ['key' => 'D', 'text' => 'nd'],
                    ['key' => 'E', 'text' => 'un'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 36,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'lf'],
                    ['key' => 'B', 'text' => 'lk'],
                    ['key' => 'C', 'text' => 'kl'],
                    ['key' => 'D', 'text' => 'fk'],
                    ['key' => 'E', 'text' => 'kf'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 37,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'qp'],
                    ['key' => 'B', 'text' => 'gp'],
                    ['key' => 'C', 'text' => 'qg'],
                    ['key' => 'D', 'text' => 'gq'],
                    ['key' => 'E', 'text' => 'pq'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 38,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '2u'],
                    ['key' => 'B', 'text' => 'qu'],
                    ['key' => 'C', 'text' => 'u2'],
                    ['key' => 'D', 'text' => 'q2'],
                    ['key' => 'E', 'text' => '2q'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 39,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '40'],
                    ['key' => 'B', 'text' => '14'],
                    ['key' => 'C', 'text' => '11'],
                    ['key' => 'D', 'text' => '44'],
                    ['key' => 'E', 'text' => '41'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES G
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 40,
                'text' => '<p>31.  nr     ne   en     rn   re</p>
                            <p>32.  bb     dd  ld      db  bd</p>
                            <p>33.  RB   RD  DR   BR BD</p>
                            <p>34.  MW  MV  VW VM  WM</p>
                            <p>35.  OD   OB  BD  DO  BO</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 41,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ne'],
                    ['key' => 'B', 'text' => 'en'],
                    ['key' => 'C', 'text' => 'rn'],
                    ['key' => 'D', 'text' => 'nr'],
                    ['key' => 'E', 'text' => 're'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 42,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'bd'],
                    ['key' => 'B', 'text' => 'bb'],
                    ['key' => 'C', 'text' => 'ld'],
                    ['key' => 'D', 'text' => 'dd'],
                    ['key' => 'E', 'text' => 'db'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 43,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'BR'],
                    ['key' => 'B', 'text' => 'BD'],
                    ['key' => 'C', 'text' => 'RB'],
                    ['key' => 'D', 'text' => 'RD'],
                    ['key' => 'E', 'text' => 'DR'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 44,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'MV'],
                    ['key' => 'B', 'text' => 'VM'],
                    ['key' => 'C', 'text' => 'MW'],
                    ['key' => 'D', 'text' => 'VW'],
                    ['key' => 'E', 'text' => 'WM'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 45,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'BO'],
                    ['key' => 'B', 'text' => 'BD'],
                    ['key' => 'C', 'text' => 'DO'],
                    ['key' => 'D', 'text' => 'OD'],
                    ['key' => 'E', 'text' => 'OB'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES H
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 46,
                'text' => '<p>36. PR  PB RB  RP  BP</p>
                            <p>37.  Dd  Db  dB bB  DD</p>
                            <p>38.  EE  Ef   eF  Fe FF</p>
                            <p>39.  Ze   Zz  ZE  zZ eZ</p>
                            <p>40.  Zz   Nz  zZ  zn ZN</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 47,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'PB'],
                    ['key' => 'B', 'text' => 'RB'],
                    ['key' => 'C', 'text' => 'RP'],
                    ['key' => 'D', 'text' => 'BP'],
                    ['key' => 'E', 'text' => 'PR'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 48,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'bB'],
                    ['key' => 'B', 'text' => 'Dd'],
                    ['key' => 'C', 'text' => 'Db'],
                    ['key' => 'D', 'text' => 'dB'],
                    ['key' => 'E', 'text' => 'DD'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 49,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'EE'],
                    ['key' => 'B', 'text' => 'Fe'],
                    ['key' => 'C', 'text' => 'eF'],
                    ['key' => 'D', 'text' => 'FF'],
                    ['key' => 'E', 'text' => 'EF'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 50,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'eZ'],
                    ['key' => 'B', 'text' => 'Ze'],
                    ['key' => 'C', 'text' => 'zZ'],
                    ['key' => 'D', 'text' => 'Zz'],
                    ['key' => 'E', 'text' => 'ZE'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 51,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'zn'],
                    ['key' => 'B', 'text' => 'zZ'],
                    ['key' => 'C', 'text' => 'ZN'],
                    ['key' => 'D', 'text' => 'Zz'],
                    ['key' => 'E', 'text' => 'Nz'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],

            // SUBTES I
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 52,
                'text' => '<p>41.  7c  9b  9c 9e  7b</p>
                            <p>42.  7c 2b  7b  2d  7d</p>
                            <p>43.  n3  Sn  3s ns  3n</p>
                            <p>44.  20  25  02  05 52</p>
                            <p>45.  ec  ac  ca  ce  ae</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 53,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '7c'],
                    ['key' => 'B', 'text' => '9e'],
                    ['key' => 'C', 'text' => '9b'],
                    ['key' => 'D', 'text' => '9c'],
                    ['key' => 'E', 'text' => '7b'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 54,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '7b'],
                    ['key' => 'B', 'text' => '2b'],
                    ['key' => 'C', 'text' => '2d'],
                    ['key' => 'D', 'text' => '7d'],
                    ['key' => 'E', 'text' => '7c'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 55,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ns'],
                    ['key' => 'B', 'text' => 'n3'],
                    ['key' => 'C', 'text' => 'Sn'],
                    ['key' => 'D', 'text' => '3s'],
                    ['key' => 'E', 'text' => '3n'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 56,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '52'],
                    ['key' => 'B', 'text' => '05'],
                    ['key' => 'C', 'text' => '25'],
                    ['key' => 'D', 'text' => '02'],
                    ['key' => 'E', 'text' => '20'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 57,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ca'],
                    ['key' => 'B', 'text' => 'ce'],
                    ['key' => 'C', 'text' => 'ae'],
                    ['key' => 'D', 'text' => 'ec'],
                    ['key' => 'E', 'text' => 'ac'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],

            // SUBTES J
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 58,
                'text' => '<p>46.  2h    h4  42 4h   24</p>
                            <p>47.  av    va vo  ao   ov</p>
                            <p>48.  fa     fr    ra rf    ar</p>
                            <p>49.  ma  cm  ca  mc am</p>
                            <p>50.  rc    cr    co  oc  or</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 59,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'h4'],
                    ['key' => 'B', 'text' => '42'],
                    ['key' => 'C', 'text' => '4h'],
                    ['key' => 'D', 'text' => '24'],
                    ['key' => 'E', 'text' => '2h'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 60,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'vo'],
                    ['key' => 'B', 'text' => 'av'],
                    ['key' => 'C', 'text' => 'ao'],
                    ['key' => 'D', 'text' => 'ov'],
                    ['key' => 'E', 'text' => 'va'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 61,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ar'],
                    ['key' => 'B', 'text' => 'rf'],
                    ['key' => 'C', 'text' => 'fr'],
                    ['key' => 'D', 'text' => 'fa'],
                    ['key' => 'E', 'text' => 'ra'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 62,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'cm'],
                    ['key' => 'B', 'text' => 'ca'],
                    ['key' => 'C', 'text' => 'am'],
                    ['key' => 'D', 'text' => 'mc'],
                    ['key' => 'E', 'text' => 'ma'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 63,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'cr'],
                    ['key' => 'B', 'text' => 'co'],
                    ['key' => 'C', 'text' => 'rc'],
                    ['key' => 'D', 'text' => 'oc'],
                    ['key' => 'E', 'text' => 'or'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES K
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 64,
                'text' => '<p>51.  ch   ho  hc    oc  oh</p>
                            <p>52.  sc    rs   rc    cs cr</p>
                            <p>53.  ar    au  ur    ra   ru</p>
                            <p>54.  pq   qg  gp   gq qp</p>
                            <p>55.  am  na  nm  mn an</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 65,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'oc'],
                    ['key' => 'B', 'text' => 'ho'],
                    ['key' => 'C', 'text' => 'oh'],
                    ['key' => 'D', 'text' => 'ch'],
                    ['key' => 'E', 'text' => 'hc'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 66,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'rs'],
                    ['key' => 'B', 'text' => 'es'],
                    ['key' => 'C', 'text' => 'er'],
                    ['key' => 'D', 'text' => 're'],
                    ['key' => 'E', 'text' => 'se'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 67,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Ar'],
                    ['key' => 'B', 'text' => 'Ru'],
                    ['key' => 'C', 'text' => 'Au'],
                    ['key' => 'D', 'text' => 'Ra'],
                    ['key' => 'E', 'text' => 'ur'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 68,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Qg'],
                    ['key' => 'B', 'text' => 'Pq'],
                    ['key' => 'C', 'text' => 'Qp'],
                    ['key' => 'D', 'text' => 'Gp'],
                    ['key' => 'E', 'text' => 'gq'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 69,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Nm'],
                    ['key' => 'B', 'text' => 'Am'],
                    ['key' => 'C', 'text' => 'Mn'],
                    ['key' => 'D', 'text' => 'An'],
                    ['key' => 'E', 'text' => 'ns'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES L
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 70,
                'text' => '<p>56.  gj    jg  pg  jp   gp</p>
                            <p>57.  tp   et   ep  pe pt</p>
                            <p>58.  ra   na  nr rn   ar</p>
                            <p>59.  bb  dd  ld   db bd</p>
                            <p>60.  l8    8l   la 8a  a8</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 71,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Gp'],
                    ['key' => 'B', 'text' => 'Jp'],
                    ['key' => 'C', 'text' => 'Pg'],
                    ['key' => 'D', 'text' => 'Jg'],
                    ['key' => 'E', 'text' => 'gj'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 72,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Et'],
                    ['key' => 'B', 'text' => 'Pe'],
                    ['key' => 'C', 'text' => 'Ep'],
                    ['key' => 'D', 'text' => 'Tp'],
                    ['key' => 'E', 'text' => 'pt'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 73,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Rn'],
                    ['key' => 'B', 'text' => 'Ra'],
                    ['key' => 'C', 'text' => 'Ar'],
                    ['key' => 'D', 'text' => 'Nr'],
                    ['key' => 'E', 'text' => 'na'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 74,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'bb'],
                    ['key' => 'B', 'text' => 'bd'],
                    ['key' => 'C', 'text' => 'ld'],
                    ['key' => 'D', 'text' => 'dd'],
                    ['key' => 'E', 'text' => 'db'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 75,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'la'],
                    ['key' => 'B', 'text' => '8l'],
                    ['key' => 'C', 'text' => 'l8'],
                    ['key' => 'D', 'text' => '8a'],
                    ['key' => 'E', 'text' => 'a8'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES M
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 76,
                'text' => '<p>61. HN  HZ  ZH   ZN NH</p>
                            <p>62. RR  BR  RB   BB RP</p>
                            <p>63. CU  UU  UC  US CC</p>
                            <p>64. PR  PB   RB  RP BP</p>
                            <p>65. CK  KJ   JC   KC JK</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 77,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'HZ'],
                    ['key' => 'B', 'text' => 'ZN'],
                    ['key' => 'C', 'text' => 'NH'],
                    ['key' => 'D', 'text' => 'ZH'],
                    ['key' => 'E', 'text' => 'HN'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 78,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'RB'],
                    ['key' => 'B', 'text' => 'RP'],
                    ['key' => 'C', 'text' => 'BR'],
                    ['key' => 'D', 'text' => 'RR'],
                    ['key' => 'E', 'text' => 'BB'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 79,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'CU'],
                    ['key' => 'B', 'text' => 'UC'],
                    ['key' => 'C', 'text' => 'US'],
                    ['key' => 'D', 'text' => 'UU'],
                    ['key' => 'E', 'text' => 'CC'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 80,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'BP'],
                    ['key' => 'B', 'text' => 'RB'],
                    ['key' => 'C', 'text' => 'PB'],
                    ['key' => 'D', 'text' => 'PR'],
                    ['key' => 'E', 'text' => 'RP'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 81,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'KJ'],
                    ['key' => 'B', 'text' => 'CK'],
                    ['key' => 'C', 'text' => 'JC'],
                    ['key' => 'D', 'text' => 'KC'],
                    ['key' => 'E', 'text' => 'JK'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES N
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 82,
                'text' => '<p>66. T1    1T  11  Tt   TT</p>
                            <p>67. SX   sX   sx  Xs XS</p>
                            <p>68. LT    Tt    tT   Tl   tt</p>
                            <p>69. Zz    NZ  zZ  zn ZN</p>
                            <p>70. GQ  Qg  qq  qg QG</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 83,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '1T'],
                    ['key' => 'B', 'text' => 'Tt'],
                    ['key' => 'C', 'text' => 'T1'],
                    ['key' => 'D', 'text' => 'TT'],
                    ['key' => 'E', 'text' => '11'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 84,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'SX'],
                    ['key' => 'B', 'text' => 'XS'],
                    ['key' => 'C', 'text' => 'sX'],
                    ['key' => 'D', 'text' => 'sx'],
                    ['key' => 'E', 'text' => 'Xs'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 85,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'tt'],
                    ['key' => 'B', 'text' => 'Tt'],
                    ['key' => 'C', 'text' => 'tT'],
                    ['key' => 'D', 'text' => 'T1'],
                    ['key' => 'E', 'text' => 'LT'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 86,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'zZ'],
                    ['key' => 'B', 'text' => 'NZ'],
                    ['key' => 'C', 'text' => 'zn'],
                    ['key' => 'D', 'text' => 'Zz'],
                    ['key' => 'E', 'text' => 'ZN'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 87,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'QG'],
                    ['key' => 'B', 'text' => 'qq'],
                    ['key' => 'C', 'text' => 'GQ'],
                    ['key' => 'D', 'text' => 'Qg'],
                    ['key' => 'E', 'text' => 'qg'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES O
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 88,
                'text' => '<p>71. 4c   1a 1c   4d  2d</p>
                            <p>72. S8  C3  S3  C8C5</p>
                            <p>73. A9  7b   79 9b  b7</p>
                            <p>74. 18  81  71  78  17</p>
                            <p>75. b4  4d   db d4  bd</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 89,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '4d'],
                    ['key' => 'B', 'text' => '4c'],
                    ['key' => 'C', 'text' => '1a'],
                    ['key' => 'D', 'text' => '2d'],
                    ['key' => 'E', 'text' => '1c'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 90,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'C5'],
                    ['key' => 'B', 'text' => 'C3'],
                    ['key' => 'C', 'text' => 'S8'],
                    ['key' => 'D', 'text' => 'S3'],
                    ['key' => 'E', 'text' => 'C8'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 91,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '79'],
                    ['key' => 'B', 'text' => 'b7'],
                    ['key' => 'C', 'text' => '9b'],
                    ['key' => 'D', 'text' => '7b'],
                    ['key' => 'E', 'text' => 'A9'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 92,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '71'],
                    ['key' => 'B', 'text' => '18'],
                    ['key' => 'C', 'text' => '81'],
                    ['key' => 'D', 'text' => '17'],
                    ['key' => 'E', 'text' => '78'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 93,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '4d'],
                    ['key' => 'B', 'text' => 'bd'],
                    ['key' => 'C', 'text' => 'd4'],
                    ['key' => 'D', 'text' => 'b4'],
                    ['key' => 'E', 'text' => 'db'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES P
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 94,
                'text' => '<p>76. u6  u4  4u  6u 46</p>
                            <p>77. 3x  7x  73  37 x7</p>
                            <p>78. ls   l3    3l   3s sl</p>
                            <p>79. en  dn  de  ed nd</p>
                            <p>80. ni   fi    fn    in  nf</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 95,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '46'],
                    ['key' => 'B', 'text' => '6u'],
                    ['key' => 'C', 'text' => 'u4'],
                    ['key' => 'D', 'text' => 'u6'],
                    ['key' => 'E', 'text' => '4u'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 96,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '3x'],
                    ['key' => 'B', 'text' => '37'],
                    ['key' => 'C', 'text' => '7x'],
                    ['key' => 'D', 'text' => '73'],
                    ['key' => 'E', 'text' => 'x7'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 97,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '13'],
                    ['key' => 'B', 'text' => 'sl'],
                    ['key' => 'C', 'text' => '31'],
                    ['key' => 'D', 'text' => '3s'],
                    ['key' => 'E', 'text' => 'ls'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 98,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ed'],
                    ['key' => 'B', 'text' => 'nd'],
                    ['key' => 'C', 'text' => 'de'],
                    ['key' => 'D', 'text' => 'en'],
                    ['key' => 'E', 'text' => 'dn'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 99,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'in'],
                    ['key' => 'B', 'text' => 'fi'],
                    ['key' => 'C', 'text' => 'ni'],
                    ['key' => 'D', 'text' => 'fn'],
                    ['key' => 'E', 'text' => 'nf'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],

            // SUBTES Q
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 100,
                'text' => '<p>81. 35   53   h3 3h   5h</p>
                            <p>82. bl     dl   ld    lb   bd</p>
                            <p>83. fk     lk   kf    lf    kl</p>
                            <p>84. 69   6d 9d   d6   d9</p>
                            <p>85. XX  VX  VZ  ZV XV</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 101,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '53'],
                    ['key' => 'B', 'text' => '3h'],
                    ['key' => 'C', 'text' => 'h3'],
                    ['key' => 'D', 'text' => '5h'],
                    ['key' => 'E', 'text' => '35'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 102,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'bd'],
                    ['key' => 'B', 'text' => 'dl'],
                    ['key' => 'C', 'text' => 'lb'],
                    ['key' => 'D', 'text' => 'bl'],
                    ['key' => 'E', 'text' => 'ld'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 103,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'lf'],
                    ['key' => 'B', 'text' => 'fk'],
                    ['key' => 'C', 'text' => 'kl'],
                    ['key' => 'D', 'text' => 'kf'],
                    ['key' => 'E', 'text' => 'lk'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 104,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '9d'],
                    ['key' => 'B', 'text' => 'd6'],
                    ['key' => 'C', 'text' => 'd9'],
                    ['key' => 'D', 'text' => '69'],
                    ['key' => 'E', 'text' => '6d'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 105,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'XX'],
                    ['key' => 'B', 'text' => 'VX'],
                    ['key' => 'C', 'text' => 'VZ'],
                    ['key' => 'D', 'text' => 'ZV'],
                    ['key' => 'E', 'text' => 'XV'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES R
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 106,
                'text' => '<p>86. j8   a8  8a  8j   ja</p>
                            <p>87. 79  76  67 69  97</p>
                            <p>88. nr   ne  en  rn  re</p>
                            <p>89. 4X  4V  Vx V4 X4</p>
                            <p>90. vn   vz  zv  nv zn</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 107,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ja'],
                    ['key' => 'B', 'text' => '8j'],
                    ['key' => 'C', 'text' => 'a8'],
                    ['key' => 'D', 'text' => 'j8'],
                    ['key' => 'E', 'text' => '8a'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 108,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '69'],
                    ['key' => 'B', 'text' => '76'],
                    ['key' => 'C', 'text' => '67'],
                    ['key' => 'D', 'text' => '79'],
                    ['key' => 'E', 'text' => '97'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 109,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'nr'],
                    ['key' => 'B', 'text' => 'rn'],
                    ['key' => 'C', 'text' => 're'],
                    ['key' => 'D', 'text' => 'en'],
                    ['key' => 'E', 'text' => 'ne'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 110,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '4X'],
                    ['key' => 'B', 'text' => '4V'],
                    ['key' => 'C', 'text' => 'V4'],
                    ['key' => 'D', 'text' => 'Vx'],
                    ['key' => 'E', 'text' => 'X4'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 111,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'zv'],
                    ['key' => 'B', 'text' => 'zn'],
                    ['key' => 'C', 'text' => 'nv'],
                    ['key' => 'D', 'text' => 'vz'],
                    ['key' => 'E', 'text' => 'vn'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES S
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 112,
                'text' => '<p>91. B8   R8   8B  RB  8R</p>
                            <p>92. OQ  CQ  QC QO OC</p>
                            <p>93. OD  OB  BD  DO BO</p>
                            <p>94. ZY   ZX   XY  YZ  YX</p>
                            <p>95. OU  OC  UC  UO CO</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 113,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '8R'],
                    ['key' => 'B', 'text' => 'R8'],
                    ['key' => 'C', 'text' => 'B8'],
                    ['key' => 'D', 'text' => 'RB'],
                    ['key' => 'E', 'text' => '8B'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 114,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'QO'],
                    ['key' => 'B', 'text' => 'OQ'],
                    ['key' => 'C', 'text' => 'CQ'],
                    ['key' => 'D', 'text' => 'QC'],
                    ['key' => 'E', 'text' => 'OC'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 115,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'DC'],
                    ['key' => 'B', 'text' => 'OD'],
                    ['key' => 'C', 'text' => 'BO'],
                    ['key' => 'D', 'text' => 'BD'],
                    ['key' => 'E', 'text' => 'OB'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 116,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ZX'],
                    ['key' => 'B', 'text' => 'YZ'],
                    ['key' => 'C', 'text' => 'XY'],
                    ['key' => 'D', 'text' => 'ZY'],
                    ['key' => 'E', 'text' => 'YX'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 117,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'OC'],
                    ['key' => 'B', 'text' => 'OU'],
                    ['key' => 'C', 'text' => 'CO'],
                    ['key' => 'D', 'text' => 'UC'],
                    ['key' => 'E', 'text' => 'UO'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],

            // SUBTES T
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 118,
                'text' => '<p>96.   Cc  Oc  OO  cO cc</p>
                            <p>97.   Aa   A8  8a  8A  aA</p>
                            <p>98.   Ze   Zz  ZE  zE  eZ</p>
                            <p>99.   BP  Pb  bP  pp  bB</p>
                            <p>100. Cz  CZ  Zc  zC  cz</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 119,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'OO'],
                    ['key' => 'B', 'text' => 'Oc'],
                    ['key' => 'C', 'text' => 'cc'],
                    ['key' => 'D', 'text' => 'cO'],
                    ['key' => 'E', 'text' => 'Cc'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 120,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Aa'],
                    ['key' => 'B', 'text' => 'A8'],
                    ['key' => 'C', 'text' => '8a'],
                    ['key' => 'D', 'text' => '8A'],
                    ['key' => 'E', 'text' => 'aA'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 121,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ZE'],
                    ['key' => 'B', 'text' => 'zE'],
                    ['key' => 'C', 'text' => 'eZ'],
                    ['key' => 'D', 'text' => 'Zz'],
                    ['key' => 'E', 'text' => 'Ze'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 122,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'bP'],
                    ['key' => 'B', 'text' => 'bB'],
                    ['key' => 'C', 'text' => 'BP'],
                    ['key' => 'D', 'text' => 'Pb'],
                    ['key' => 'E', 'text' => 'pp'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_1->sections[0]->id,
                'order' => 123,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'CZ'],
                    ['key' => 'B', 'text' => 'Cz'],
                    ['key' => 'C', 'text' => 'zC'],
                    ['key' => 'D', 'text' => 'Zc'],
                    ['key' => 'E', 'text' => 'cz'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
        ];

        // Insert questions for Part 1
        foreach ($questionsPart1 as $question) {
            Question::create($question);
        }

        $questionsPart2 = [
            // SUBTES A - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 1,
                'text' => '<p>1. YZ VY  VX  XY  ZY</p>
                            <p>2. b9  c6   69  96   6c</p>
                            <p>3. ou  oa   ua   uo  ao</p>
                            <p>4. lc    lo    ol    oc  co</p>
                            <p>5. X7  V9  V5   X9 V7</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 2,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'YZ'],
                    ['key' => 'B', 'text' => 'VX'],
                    ['key' => 'C', 'text' => 'VY'],
                    ['key' => 'D', 'text' => 'XY'],
                    ['key' => 'E', 'text' => 'ZY'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 3,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'b9'],
                    ['key' => 'B', 'text' => '69'],
                    ['key' => 'C', 'text' => '6c'],
                    ['key' => 'D', 'text' => '96'],
                    ['key' => 'E', 'text' => 'c6'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 4,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ua'],
                    ['key' => 'B', 'text' => 'uo'],
                    ['key' => 'C', 'text' => 'ao'],
                    ['key' => 'D', 'text' => 'oa'],
                    ['key' => 'E', 'text' => 'ou'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 5,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'oc'],
                    ['key' => 'B', 'text' => 'ol'],
                    ['key' => 'C', 'text' => 'lc'],
                    ['key' => 'D', 'text' => 'lo'],
                    ['key' => 'E', 'text' => 'co'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 6,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'V7'],
                    ['key' => 'B', 'text' => 'X9'],
                    ['key' => 'C', 'text' => 'V9'],
                    ['key' => 'D', 'text' => 'V5'],
                    ['key' => 'E', 'text' => 'X7'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES B - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 7,
                'text' => '<p>6. Sc  8c  8s  cS  c8</p>
                            <p>7. ob  bt    ot   tb  bo</p>
                            <p>8. 5e 3d   4d  2e  2d</p>
                            <p>9. rc   dc   dr   rd cr</p>
                            <p>10. ws  sw  st   tw ts</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 8,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '8s'],
                    ['key' => 'B', 'text' => 'c8'],
                    ['key' => 'C', 'text' => '8c'],
                    ['key' => 'D', 'text' => 'Sc'],
                    ['key' => 'E', 'text' => 'cS'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 9,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'tb'],
                    ['key' => 'B', 'text' => 'ot'],
                    ['key' => 'C', 'text' => 'ob'],
                    ['key' => 'D', 'text' => 'bt'],
                    ['key' => 'E', 'text' => 'bo'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 10,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '3d'],
                    ['key' => 'B', 'text' => '4d'],
                    ['key' => 'C', 'text' => '2e'],
                    ['key' => 'D', 'text' => '2d'],
                    ['key' => 'E', 'text' => '5e'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 11,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'dc'],
                    ['key' => 'B', 'text' => 'rc'],
                    ['key' => 'C', 'text' => 'rd'],
                    ['key' => 'D', 'text' => 'dr'],
                    ['key' => 'E', 'text' => 'cr'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 12,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'sw'],
                    ['key' => 'B', 'text' => 'ts'],
                    ['key' => 'C', 'text' => 'tw'],
                    ['key' => 'D', 'text' => 'ws'],
                    ['key' => 'E', 'text' => 'st'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES C - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 13,
                'text' => '<p>11. wm  um  mu  wu mw</p>
                            <p>12. pp   qq   pq   pg  qp</p>
                            <p>13. nv   nx   xn    vx  xv</p>
                            <p>14. nu   un  um   mn mu</p>
                            <p>15. zn   zz   nz    nn  mn</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 14,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'mw'],
                    ['key' => 'B', 'text' => 'wu'],
                    ['key' => 'C', 'text' => 'mu'],
                    ['key' => 'D', 'text' => 'wm'],
                    ['key' => 'E', 'text' => 'um'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 15,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'qq'],
                    ['key' => 'B', 'text' => 'qp'],
                    ['key' => 'C', 'text' => 'pq'],
                    ['key' => 'D', 'text' => 'pg'],
                    ['key' => 'E', 'text' => 'pp'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 16,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'xv'],
                    ['key' => 'B', 'text' => 'vx'],
                    ['key' => 'C', 'text' => 'nx'],
                    ['key' => 'D', 'text' => 'nv'],
                    ['key' => 'E', 'text' => 'xn'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 17,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'mn'],
                    ['key' => 'B', 'text' => 'un'],
                    ['key' => 'C', 'text' => 'nu'],
                    ['key' => 'D', 'text' => 'mu'],
                    ['key' => 'E', 'text' => 'um'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 18,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'nn'],
                    ['key' => 'B', 'text' => 'zz'],
                    ['key' => 'C', 'text' => 'zn'],
                    ['key' => 'D', 'text' => 'mn'],
                    ['key' => 'E', 'text' => 'nz'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES D - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 19,
                'text' => '<p>16.pg  gy  py   yp   yg</p>
                            <p>17. 59  9Y  5Y  Y9 95</p>
                            <p>18. nu  on  ou un   uo</p>
                            <p>19. ud  un nd  nu   du</p>
                            <p>20. 41  44  14  11  40</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 20,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'pg'],
                    ['key' => 'B', 'text' => 'py'],
                    ['key' => 'C', 'text' => 'yg'],
                    ['key' => 'D', 'text' => 'gy'],
                    ['key' => 'E', 'text' => 'yp'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 21,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '5Y'],
                    ['key' => 'B', 'text' => 'Y9'],
                    ['key' => 'C', 'text' => '95'],
                    ['key' => 'D', 'text' => '9Y'],
                    ['key' => 'E', 'text' => '59'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 22,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'un'],
                    ['key' => 'B', 'text' => 'ou'],
                    ['key' => 'C', 'text' => 'on'],
                    ['key' => 'D', 'text' => 'nu'],
                    ['key' => 'E', 'text' => 'uo'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 23,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'nd'],
                    ['key' => 'B', 'text' => 'ud'],
                    ['key' => 'C', 'text' => 'nu'],
                    ['key' => 'D', 'text' => 'du'],
                    ['key' => 'E', 'text' => 'un'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 24,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '41'],
                    ['key' => 'B', 'text' => '40'],
                    ['key' => 'C', 'text' => '11'],
                    ['key' => 'D', 'text' => '14'],
                    ['key' => 'E', 'text' => '44'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES E - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 25,
                'text' => '<p>21. Rr     RP  pR  PP   rr</p>
                            <p>22.LT     IT    IL    TL    TI</p>
                            <p>23.MW  MV  VW  VM  WM</p>
                            <p>24. Uu    Wu  uW  WW uU</p>
                            <p>25. 3x     xc    c3    cx   3c</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 26,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'rr'],
                    ['key' => 'B', 'text' => 'pR'],
                    ['key' => 'C', 'text' => 'PP'],
                    ['key' => 'D', 'text' => 'Rr'],
                    ['key' => 'E', 'text' => 'RP'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 27,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'TL'],
                    ['key' => 'B', 'text' => 'IT'],
                    ['key' => 'C', 'text' => 'TI'],
                    ['key' => 'D', 'text' => 'IL'],
                    ['key' => 'E', 'text' => 'LT'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 28,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'MV'],
                    ['key' => 'B', 'text' => 'WM'],
                    ['key' => 'C', 'text' => 'VW'],
                    ['key' => 'D', 'text' => 'MW'],
                    ['key' => 'E', 'text' => 'WM'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 29,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'uU'],
                    ['key' => 'B', 'text' => 'uW'],
                    ['key' => 'C', 'text' => 'Uu'],
                    ['key' => 'D', 'text' => 'WW'],
                    ['key' => 'E', 'text' => 'Wu'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 30,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'c3'],
                    ['key' => 'B', 'text' => 'xc'],
                    ['key' => 'C', 'text' => '3x'],
                    ['key' => 'D', 'text' => 'cx'],
                    ['key' => 'E', 'text' => '3c'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES F - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 31,
                'text' => '<p>26. AV   VN  NV  NA  VA</p>
                            <p>27. YX   XX   Yy Xy    xX</p>
                            <p>28. EL    FL   FE  LF   LE</p>
                            <p>29. MN  NM  VN  MV NV</p>
                            <p>30. EE   Ef     eF  Fe  FF</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 32,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'NV'],
                    ['key' => 'B', 'text' => 'NA'],
                    ['key' => 'C', 'text' => 'VN'],
                    ['key' => 'D', 'text' => 'VA'],
                    ['key' => 'E', 'text' => 'AV'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 33,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Xy'],
                    ['key' => 'B', 'text' => 'XX'],
                    ['key' => 'C', 'text' => 'xX'],
                    ['key' => 'D', 'text' => 'YX'],
                    ['key' => 'E', 'text' => 'Yy'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 34,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'EL'],
                    ['key' => 'B', 'text' => 'LE'],
                    ['key' => 'C', 'text' => 'LF'],
                    ['key' => 'D', 'text' => 'FL'],
                    ['key' => 'E', 'text' => 'FE'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 35,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'MN'],
                    ['key' => 'B', 'text' => 'MV'],
                    ['key' => 'C', 'text' => 'VN'],
                    ['key' => 'D', 'text' => 'NM'],
                    ['key' => 'E', 'text' => 'NV'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 36,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'eF'],
                    ['key' => 'B', 'text' => 'Ef'],
                    ['key' => 'C', 'text' => 'Fe'],
                    ['key' => 'D', 'text' => 'EE'],
                    ['key' => 'E', 'text' => 'FF'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES G - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 37,
                'text' => '<p>31. S8  C8  8C  8S   S5</p>
                            <p>32. h6   h8   86   8h  6h</p>
                            <p>33.4d   3c   4a   4c   3a</p>
                            <p>34. Z4   Z1  14   1Z  4Z</p>
                            <p>35. Qo  Qq  QO  oq QQ</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 38,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'C8'],
                    ['key' => 'B', 'text' => 'S5'],
                    ['key' => 'C', 'text' => '8S'],
                    ['key' => 'D', 'text' => 'S8'],
                    ['key' => 'E', 'text' => '8C'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 39,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'h6'],
                    ['key' => 'B', 'text' => 'h8'],
                    ['key' => 'C', 'text' => '8h'],
                    ['key' => 'D', 'text' => '86'],
                    ['key' => 'E', 'text' => '6h'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 40,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '4d'],
                    ['key' => 'B', 'text' => '4c'],
                    ['key' => 'C', 'text' => '3a'],
                    ['key' => 'D', 'text' => '3c'],
                    ['key' => 'E', 'text' => '4a'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 41,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '4Z'],
                    ['key' => 'B', 'text' => '14'],
                    ['key' => 'C', 'text' => 'Z1'],
                    ['key' => 'D', 'text' => '1Z'],
                    ['key' => 'E', 'text' => 'Z4'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 42,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'QQ'],
                    ['key' => 'B', 'text' => 'oq'],
                    ['key' => 'C', 'text' => 'Qq'],
                    ['key' => 'D', 'text' => 'QO'],
                    ['key' => 'E', 'text' => 'Qo'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES H - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 43,
                'text' => '<p>36. xc  ex   ec ce  xe</p>
                            <p>37. ar   ra   ro   or oa</p>
                            <p>38. 8c  8a  7a  6c  7c</p>
                            <p>39. us  uc  sc  su  cu</p>
                            <p>40.wo  ro  rw  ow  wr</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 44,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'xc'],
                    ['key' => 'B', 'text' => 'ce'],
                    ['key' => 'C', 'text' => 'ec'],
                    ['key' => 'D', 'text' => 'ex'],
                    ['key' => 'E', 'text' => 'xe'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 45,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'oa'],
                    ['key' => 'B', 'text' => 'ra'],
                    ['key' => 'C', 'text' => 'ar'],
                    ['key' => 'D', 'text' => 'or'],
                    ['key' => 'E', 'text' => 'ro'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 46,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '6c'],
                    ['key' => 'B', 'text' => '8a'],
                    ['key' => 'C', 'text' => '7a'],
                    ['key' => 'D', 'text' => '7c'],
                    ['key' => 'E', 'text' => '8c'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 47,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'us'],
                    ['key' => 'B', 'text' => 'su'],
                    ['key' => 'C', 'text' => 'cu'],
                    ['key' => 'D', 'text' => 'sc'],
                    ['key' => 'E', 'text' => 'uc'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 48,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'wo'],
                    ['key' => 'B', 'text' => 'ow'],
                    ['key' => 'C', 'text' => 'ro'],
                    ['key' => 'D', 'text' => 'rw'],
                    ['key' => 'E', 'text' => 'wr'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],

            // SUBTES I - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 49,
                'text' => '<p>41. wu  vu vw     wv  uw</p>
                            <p>42.er    ri    ir       ie    re</p>
                            <p>43. 31   23  32     13  21</p>
                            <p>44. 2u   2q  qu     q2 u2</p>
                            <p>45. XV  VX VW  WX  WV</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 50,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'vu'],
                    ['key' => 'B', 'text' => 'vw'],
                    ['key' => 'C', 'text' => 'uv'],
                    ['key' => 'D', 'text' => 'wv'],
                    ['key' => 'E', 'text' => 'wu'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 51,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'er'],
                    ['key' => 'B', 'text' => 're'],
                    ['key' => 'C', 'text' => 'ir'],
                    ['key' => 'D', 'text' => 'ri'],
                    ['key' => 'E', 'text' => 'ie'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 52,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '13'],
                    ['key' => 'B', 'text' => '23'],
                    ['key' => 'C', 'text' => '32'],
                    ['key' => 'D', 'text' => '21'],
                    ['key' => 'E', 'text' => '31'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 53,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'q2'],
                    ['key' => 'B', 'text' => 'qu'],
                    ['key' => 'C', 'text' => 'u2'],
                    ['key' => 'D', 'text' => '2u'],
                    ['key' => 'E', 'text' => '2q'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 54,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'VW'],
                    ['key' => 'B', 'text' => 'WV'],
                    ['key' => 'C', 'text' => 'VX'],
                    ['key' => 'D', 'text' => 'XV'],
                    ['key' => 'E', 'text' => 'WX'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES J - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 55,
                'text' => '<p>46. ae  et    ea   ta    te</p>
                            <p>47. VI  SI    SV   VS IV</p>
                            <p>48. th   he et    eh    ht</p>
                            <p>49. za  mz  zm  az   ma</p>
                            <p>50. sx  sa ax    xs    xa</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 56,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'et'],
                    ['key' => 'B', 'text' => 'ta'],
                    ['key' => 'C', 'text' => 'ae'],
                    ['key' => 'D', 'text' => 'te'],
                    ['key' => 'E', 'text' => 'ea'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 57,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'SV'],
                    ['key' => 'B', 'text' => 'IV'],
                    ['key' => 'C', 'text' => 'VS'],
                    ['key' => 'D', 'text' => 'VI'],
                    ['key' => 'E', 'text' => 'SI'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 58,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'et'],
                    ['key' => 'B', 'text' => 'he'],
                    ['key' => 'C', 'text' => 'ht'],
                    ['key' => 'D', 'text' => 'eh'],
                    ['key' => 'E', 'text' => 'th'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 59,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'za'],
                    ['key' => 'B', 'text' => 'mz'],
                    ['key' => 'C', 'text' => 'ma'],
                    ['key' => 'D', 'text' => 'az'],
                    ['key' => 'E', 'text' => 'zm'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 60,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ax'],
                    ['key' => 'B', 'text' => 'sx'],
                    ['key' => 'C', 'text' => 'sa'],
                    ['key' => 'D', 'text' => 'xa'],
                    ['key' => 'E', 'text' => 'xs'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],

            // SUBTES K - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 61,
                'text' => '<p>51.  Av   Vv      aV   VV  AA</p>
                            <p>52.  Mw  wW WM  MM  mW</p>
                            <p>53.  4H  4N     NH   N4  HN</p>
                            <p>54.  Dd  Db     dB   bB   DD</p>
                            <p>55.  S8  83      S3    38  3S</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 62,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Av'],
                    ['key' => 'B', 'text' => 'VV'],
                    ['key' => 'C', 'text' => 'Vv'],
                    ['key' => 'D', 'text' => 'AA'],
                    ['key' => 'E', 'text' => 'aV'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 63,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'WM'],
                    ['key' => 'B', 'text' => 'wW'],
                    ['key' => 'C', 'text' => 'MM'],
                    ['key' => 'D', 'text' => 'Mw'],
                    ['key' => 'E', 'text' => 'mW'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 64,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '4H'],
                    ['key' => 'B', 'text' => 'NH'],
                    ['key' => 'C', 'text' => 'N4'],
                    ['key' => 'D', 'text' => 'HN'],
                    ['key' => 'E', 'text' => '4N'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 65,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'bB'],
                    ['key' => 'B', 'text' => 'Dd'],
                    ['key' => 'C', 'text' => 'Db'],
                    ['key' => 'D', 'text' => 'dB'],
                    ['key' => 'E', 'text' => 'DD'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 66,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'S3'],
                    ['key' => 'B', 'text' => 'S8'],
                    ['key' => 'C', 'text' => '83'],
                    ['key' => 'D', 'text' => '38'],
                    ['key' => 'E', 'text' => '3S'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES L - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 67,
                'text' => '<p>56.  XO  OO OX  OV  XX</p>
                            <p>57.  S8   C8   8C  8S SS</p>
                            <p>58.  X7   V9   V5   X9 V7</p>
                            <p>59. L7    LI    I7    IL    7L</p>
                            <p>60.  RB  RD  DR  BR BD</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 68,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'OX'],
                    ['key' => 'B', 'text' => 'XX'],
                    ['key' => 'C', 'text' => 'OO'],
                    ['key' => 'D', 'text' => 'XO'],
                    ['key' => 'E', 'text' => 'OV'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 69,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'C8'],
                    ['key' => 'B', 'text' => 'SS'],
                    ['key' => 'C', 'text' => '8S'],
                    ['key' => 'D', 'text' => 'S8'],
                    ['key' => 'E', 'text' => '8C'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 70,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'V5'],
                    ['key' => 'B', 'text' => 'V7'],
                    ['key' => 'C', 'text' => 'X9'],
                    ['key' => 'D', 'text' => 'V9'],
                    ['key' => 'E', 'text' => 'X7'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 71,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'LI'],
                    ['key' => 'B', 'text' => 'IL'],
                    ['key' => 'C', 'text' => 'L7'],
                    ['key' => 'D', 'text' => '7L'],
                    ['key' => 'E', 'text' => 'I7'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 72,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'BD'],
                    ['key' => 'B', 'text' => 'RD'],
                    ['key' => 'C', 'text' => 'DR'],
                    ['key' => 'D', 'text' => 'BR'],
                    ['key' => 'E', 'text' => 'RB'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES M - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 73,
                'text' => '<p>61. 18    81    71    78  17</p>
                            <p>62. Vv    Ww  Wv   wV vv</p>
                            <p>63. Mm  MN   NN  nn   mM</p>
                            <p>64. b9    c6     69  96    6c</p>
                            <p>65. 4c    1a     1c  4d    2d</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 74,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '78'],
                    ['key' => 'B', 'text' => '81'],
                    ['key' => 'C', 'text' => '71'],
                    ['key' => 'D', 'text' => '18'],
                    ['key' => 'E', 'text' => '17'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 75,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'vv'],
                    ['key' => 'B', 'text' => 'Vv'],
                    ['key' => 'C', 'text' => 'Ww'],
                    ['key' => 'D', 'text' => 'wV'],
                    ['key' => 'E', 'text' => 'Ww'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 76,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Mm'],
                    ['key' => 'B', 'text' => 'nn'],
                    ['key' => 'C', 'text' => 'NN'],
                    ['key' => 'D', 'text' => 'mM'],
                    ['key' => 'E', 'text' => 'MN'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 77,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '69'],
                    ['key' => 'B', 'text' => 'c6'],
                    ['key' => 'C', 'text' => '96'],
                    ['key' => 'D', 'text' => '6c'],
                    ['key' => 'E', 'text' => 'b9'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 78,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '1a'],
                    ['key' => 'B', 'text' => '4d'],
                    ['key' => 'C', 'text' => '1c'],
                    ['key' => 'D', 'text' => '4c'],
                    ['key' => 'E', 'text' => '2d'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],

            // SUBTES N - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 79,
                'text' => '<p>66. 2h  h4   42   4h  24</p>
                            <p>67. YZ  VY  VX  XY ZX</p>
                            <p>68. n3  Sn   3s ns   3n</p>
                            <p>69. wo  ro    rw  ow wr</p>
                            <p>70. ar   ra    ro   or oa</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 80,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'h4'],
                    ['key' => 'B', 'text' => '24'],
                    ['key' => 'C', 'text' => '2h'],
                    ['key' => 'D', 'text' => '42'],
                    ['key' => 'E', 'text' => '4h'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 81,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ZX'],
                    ['key' => 'B', 'text' => 'YZ'],
                    ['key' => 'C', 'text' => 'XY'],
                    ['key' => 'D', 'text' => 'VX'],
                    ['key' => 'E', 'text' => 'VY'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 82,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'n3'],
                    ['key' => 'B', 'text' => '3s'],
                    ['key' => 'C', 'text' => '3n'],
                    ['key' => 'D', 'text' => 'ns'],
                    ['key' => 'E', 'text' => 'Sn'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 83,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'wo'],
                    ['key' => 'B', 'text' => 'wr'],
                    ['key' => 'C', 'text' => 'rw'],
                    ['key' => 'D', 'text' => 'ow'],
                    ['key' => 'E', 'text' => 'ro'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 84,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ar'],
                    ['key' => 'B', 'text' => 'ra'],
                    ['key' => 'C', 'text' => 'ro'],
                    ['key' => 'D', 'text' => 'or'],
                    ['key' => 'E', 'text' => 'oa'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES O - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 85,
                'text' => '<p>71. ni    fi     fn in    nf</p>
                            <p>72. wu  vu   vw  wv uw</p>
                            <p>73. th    he  et    eh ht</p>
                            <p>74. am  na nm  mn  an</p>
                            <p>75. 3x   7x  73  37  x7</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 86,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'fn'],
                    ['key' => 'B', 'text' => 'in'],
                    ['key' => 'C', 'text' => 'nf'],
                    ['key' => 'D', 'text' => 'ni'],
                    ['key' => 'E', 'text' => 'fi'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 87,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'wv'],
                    ['key' => 'B', 'text' => 'vw'],
                    ['key' => 'C', 'text' => 'vu'],
                    ['key' => 'D', 'text' => 'wu'],
                    ['key' => 'E', 'text' => 'uw'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 88,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ht'],
                    ['key' => 'B', 'text' => 'et'],
                    ['key' => 'C', 'text' => 'he'],
                    ['key' => 'D', 'text' => 'th'],
                    ['key' => 'E', 'text' => 'eh'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 89,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'nm'],
                    ['key' => 'B', 'text' => 'na'],
                    ['key' => 'C', 'text' => 'an'],
                    ['key' => 'D', 'text' => 'am'],
                    ['key' => 'E', 'text' => 'mn'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 90,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '3x'],
                    ['key' => 'B', 'text' => '37'],
                    ['key' => 'C', 'text' => '7x'],
                    ['key' => 'D', 'text' => '73'],
                    ['key' => 'E', 'text' => 'x7'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],

            // SUBTES P - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 91,
                'text' => '<p>76. j8    a8   8a   8j    ja</p>
                            <p>77. 59   9Y   5Y  Y9  95</p>
                            <p>78. fk     lk   kf    lf    kl</p>
                            <p>79. ma  cm  ca   mc am</p>
                            <p>80. nv   nx    xn  vx   xv</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 92,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '8j'],
                    ['key' => 'B', 'text' => 'ja'],
                    ['key' => 'C', 'text' => 'a8'],
                    ['key' => 'D', 'text' => 'j8'],
                    ['key' => 'E', 'text' => '8a'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 93,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '95'],
                    ['key' => 'B', 'text' => '9Y'],
                    ['key' => 'C', 'text' => '59'],
                    ['key' => 'D', 'text' => 'Y9'],
                    ['key' => 'E', 'text' => '5Y'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 94,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'lk'],
                    ['key' => 'B', 'text' => 'kf'],
                    ['key' => 'C', 'text' => 'fk'],
                    ['key' => 'D', 'text' => 'lf'],
                    ['key' => 'E', 'text' => 'kl'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 95,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ca'],
                    ['key' => 'B', 'text' => 'am'],
                    ['key' => 'C', 'text' => 'mc'],
                    ['key' => 'D', 'text' => 'cm'],
                    ['key' => 'E', 'text' => 'ma'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 96,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'xv'],
                    ['key' => 'B', 'text' => 'vx'],
                    ['key' => 'C', 'text' => 'nx'],
                    ['key' => 'D', 'text' => 'xn'],
                    ['key' => 'E', 'text' => 'nv'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],

            // SUBTES Q - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 97,
                'text' => '<p>81. se   rs   re    es er</p>
                            <p>82. 4X  4V  VX  V4 X4</p>
                            <p>83. zn   zz  nz   nn mn</p>
                            <p>84. LT   IT   IL   TL TI</p>
                            <p>85. 41  44  14   11 40</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 98,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 're'],
                    ['key' => 'B', 'text' => 'er'],
                    ['key' => 'C', 'text' => 'es'],
                    ['key' => 'D', 'text' => 'se'],
                    ['key' => 'E', 'text' => 'rs'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 99,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '4V'],
                    ['key' => 'B', 'text' => 'V4'],
                    ['key' => 'C', 'text' => 'VX'],
                    ['key' => 'D', 'text' => 'X4'],
                    ['key' => 'E', 'text' => '4X'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 100,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'mn'],
                    ['key' => 'B', 'text' => 'zz'],
                    ['key' => 'C', 'text' => 'nz'],
                    ['key' => 'D', 'text' => 'zn'],
                    ['key' => 'E', 'text' => 'nn'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 101,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'LT'],
                    ['key' => 'B', 'text' => 'IL'],
                    ['key' => 'C', 'text' => 'TL'],
                    ['key' => 'D', 'text' => 'IT'],
                    ['key' => 'E', 'text' => 'TI'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 102,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => '14'],
                    ['key' => 'B', 'text' => '40'],
                    ['key' => 'C', 'text' => '41'],
                    ['key' => 'D', 'text' => '44'],
                    ['key' => 'E', 'text' => '11'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],

            // SUBTES R - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 103,
                'text' => '<p>86. us   ue   se   su eu</p>
                            <p>87. PR  PB  RB  RPBP</p>
                            <p>88.Rr   RP  pR  PP  rr</p>
                            <p>89. SX  sX   sx   Xs XS</p>
                            <p>90. ra na    nr   rn   ar</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 104,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'eu'],
                    ['key' => 'B', 'text' => 'us'],
                    ['key' => 'C', 'text' => 'se'],
                    ['key' => 'D', 'text' => 'ue'],
                    ['key' => 'E', 'text' => 'su'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 105,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'BP'],
                    ['key' => 'B', 'text' => 'RP'],
                    ['key' => 'C', 'text' => 'PR'],
                    ['key' => 'D', 'text' => 'PB'],
                    ['key' => 'E', 'text' => 'RB'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 106,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Rr'],
                    ['key' => 'B', 'text' => 'rr'],
                    ['key' => 'C', 'text' => 'PP'],
                    ['key' => 'D', 'text' => 'pR'],
                    ['key' => 'E', 'text' => 'RP'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 107,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'XS'],
                    ['key' => 'B', 'text' => 'Xs'],
                    ['key' => 'C', 'text' => 'sx'],
                    ['key' => 'D', 'text' => 'SX'],
                    ['key' => 'E', 'text' => 'sX'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 108,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'ra'],
                    ['key' => 'B', 'text' => 'na'],
                    ['key' => 'C', 'text' => 'rn'],
                    ['key' => 'D', 'text' => 'nr'],
                    ['key' => 'E', 'text' => 'ar'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],

            // SUBTES S - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 109,
                'text' => '<p>91. OU  OC  UC  UO CO</p>
                            <p>92. RB  RD  DR   BR BD</p>
                            <p>93. XX  XO  OO  OX OV</p>
                            <p>94.HN  HZ  ZH   ZN   NH</p>
                            <p>95. Av   Vv   aV   VV  AA</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 110,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'UO'],
                    ['key' => 'B', 'text' => 'OC'],
                    ['key' => 'C', 'text' => 'UC'],
                    ['key' => 'D', 'text' => 'CO'],
                    ['key' => 'E', 'text' => 'OU'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 111,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'DR'],
                    ['key' => 'B', 'text' => 'BD'],
                    ['key' => 'C', 'text' => 'RB'],
                    ['key' => 'D', 'text' => 'BR'],
                    ['key' => 'E', 'text' => 'RD'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 112,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'OV'],
                    ['key' => 'B', 'text' => 'XX'],
                    ['key' => 'C', 'text' => 'OO'],
                    ['key' => 'D', 'text' => 'OX'],
                    ['key' => 'E', 'text' => 'XO'],
                ],
                'scoring' => ['correct_answer' => 'D'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 113,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'HZ'],
                    ['key' => 'B', 'text' => 'ZN'],
                    ['key' => 'C', 'text' => 'HN'],
                    ['key' => 'D', 'text' => 'NH'],
                    ['key' => 'E', 'text' => 'ZH'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 114,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Vv'],
                    ['key' => 'B', 'text' => 'VV'],
                    ['key' => 'C', 'text' => 'aV'],
                    ['key' => 'D', 'text' => 'AA'],
                    ['key' => 'E', 'text' => 'Av'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],

            // SUBTES T - Part 2
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 115,
                'text' => '<p>96.   OQ  CQ  QC   QO OC</p>
                            <p>97.   Ze    Zz   ZE    zE  eZ</p>
                            <p>98.   GQ Qg   qq    qg   QG</p>
                            <p>99.   Mm  MN  NN  nn   mM</p>
                            <p>100. Qo   Qq   OQ  oq   QQ</p>',
                'type' => 'instruction',
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 116,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'CQ'],
                    ['key' => 'B', 'text' => 'QO'],
                    ['key' => 'C', 'text' => 'OC'],
                    ['key' => 'D', 'text' => 'QC'],
                    ['key' => 'E', 'text' => 'OQ'],
                ],
                'scoring' => ['correct_answer' => 'E'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 117,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Ze'],
                    ['key' => 'B', 'text' => 'eZ'],
                    ['key' => 'C', 'text' => 'ZE'],
                    ['key' => 'D', 'text' => 'Zz'],
                    ['key' => 'E', 'text' => 'zE'],
                ],
                'scoring' => ['correct_answer' => 'C'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 118,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'Qg'],
                    ['key' => 'B', 'text' => 'GQ'],
                    ['key' => 'C', 'text' => 'qq'],
                    ['key' => 'D', 'text' => 'QG'],
                    ['key' => 'E', 'text' => 'qg'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 119,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'nn'],
                    ['key' => 'B', 'text' => 'MN'],
                    ['key' => 'C', 'text' => 'Mm'],
                    ['key' => 'D', 'text' => 'NN'],
                    ['key' => 'E', 'text' => 'mM'],
                ],
                'scoring' => ['correct_answer' => 'A'],
            ],
            [
                'section_id' => $d4_2->sections[0]->id,
                'order' => 120,
                'type' => 'multiple_choice',
                'options' => [
                    ['key' => 'A', 'text' => 'oq'],
                    ['key' => 'B', 'text' => 'OQ'],
                    ['key' => 'C', 'text' => 'Qo'],
                    ['key' => 'D', 'text' => 'Qq'],
                    ['key' => 'E', 'text' => 'QQ'],
                ],
                'scoring' => ['correct_answer' => 'B'],
            ],
        ];

        // Insert questions for Part 2
        foreach ($questionsPart2 as $question) {
            Question::create($question);
        }
    }
}
