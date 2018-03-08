<?php
/**
 * Created by PhpStorm.
 * User: LydiaPC
 * Date: 10/02/18
 * Time: 13:09
 */

namespace Pendu\Game;
trait Pendu_letter
{
    private function countTrials(){
        for($i=0; $i<sizeof($this->usedLetters);$i++){
            $this->try++;
            if(!$this->isLetterInStr($this->word, $this->usedLetters[$i])) {
                $this->missed++;
            }
            array_splice($this->allLetters, array_search($this->usedLetters[$i], $this->allLetters), 1);
        }
    }
    private function pushUsedLetters(...$postLetter){
        foreach ($postLetter as $letter){
            if(ctype_alpha($letter)) {
                if (!in_array($letter, $this->usedLetters)) {
                    $this->usedLetters[] = $letter;
                }
            }
        }
    }
    private function isLetterInStr($string, $char){
        for($i=0;$i<strlen($string);$i++){
            if($string[$i]==$char){
                return true;
            }
        }
        return false;
    }
    private function usedLetterStr(){
        $str = "";
        foreach ($this->usedLetters as $letter){
            $str.= ",".$letter;
        }
        $str[0] = " ";
        return $str;
    }
}