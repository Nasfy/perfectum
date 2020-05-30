<?php
    Class MixArray {
        private $arr1,
                $arr2,
                $arrLength;

        function __construct() {
             $this->arrLength = rand(22, 100);
             $this->arr1 = $this->randArr($this->arrLength, 33, 126);
             $this->arr2 = $this->randArr($this->arrLength, 33, 126);
        }

        function randArr( $N, $min = 33, $max = 126) {
            return array_map(
                function() use( $min, $max) {
                    return chr(rand( $min, $max));
                },
                array_pad( [], $N, 0)
            );
        }

        function mixArr() {
            private $mixArr,
                    $itter = 0;

            for ($i = 0; $i < sizeof($this->arr1); $i++) {
                $mixArr[$itter++] = $this->arr1[$i];
                $mixArr[$itter++] = $this->arr2[$i];
            }
            print_r($this->arr1);
            print_r($this->arr2);
            print_r($mixArr);
        }
    }
    $mass = new MixArray;
    print_r($mass->mixArr());
