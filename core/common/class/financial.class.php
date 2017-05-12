<?php
namespace TE\common\financial;

public class CheckIban {
  public function check_iban($iban) {
    $letters=array("A"=>10, "B"=>11, "C"=>12, "D"=>13, "E"=>14, "F"=>15, "G"=>16,"H"=>17, "I"=>18, "J"=>19, "K"=>20, "L"=>21, "M"=>22, "N"=>23, "O"=>24, "P"=>25, "Q"=>26, "R"=>27, "S"=>28, "T"=>29, "U"=>30, "V"=>31, "W"=>32, "X"=>33, "Y"=>34, "Z"=>35);
    $iban=trim($iban);
    $iban=strtoupper($iban);
    $iban=str_replace(array(" ","-"),"",$iban);
    if(strlen($iban)==24)
    {
        # Obtain code for 2 letters
        $LetterValue1 = $letters[substr($iban, 0, 1)];
        $LetterValue2 = $letters[substr($iban, 1, 1)];
        # Obtain the next values
        $NextNumbers= substr($iban, 2, 2);
        $value = substr($iban, 4, strlen($iban)).$LetterValue1.$LetterValue2.$NextNumbers;
        if(bcmod($value,97)==1)
        {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
  }
}
