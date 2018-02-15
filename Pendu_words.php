<?php
/**
 * Created by PhpStorm.
 * User: LydiaPC
 * Date: 08/02/18
 * Time: 17:06
 */
namespace Pendu\Game;
trait Pendu_words
{
    /*Words function*/
    private function getWordFormIndex($index){
        return $this->wordsList[$index-1];
    }
    private function randomIndexFromWordlList(){
        return rand(0, sizeof($this->wordsList));
    }
    private function getHiddenWord(){
        $hiddenWord = "";
        for ($i=0;$i<$this->wordSize;$i++){
            if(!in_array($this->word[$i], $this->usedLetters)) {
                $hiddenWord .= "*";
            }else{
                $hiddenWord .= $this->word[$i];
            }
        }
        return $hiddenWord;
    }
}