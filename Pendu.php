<?php
/**
 * Created by PhpStorm.
 * User: LydiaPC
 * Date: 08/02/18
 * Time: 15:47
 */
namespace Pendu\Game;
include "Pendu_words.php";
include "Pendu_letter.php";
class Pendu
{
    use Pendu_words;
    use Pendu_letter;
    const MAXTRIALS = 8;
    var $allLetters = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    var $try = 0;
    var $wordsList = null;
    var $word = "";
    var $index = 0;
    var $missed = 0;
    var $wordSize = 0;
    var $hiddenWord = "";
    var $usedLetters = [];
    public $error = [];
     function __construct()
     {
         $post = ($_POST)?$_POST:[];
         $view = "start";
         $letter = (isset($post["triedLetter"]))?strtoupper($post["triedLetter"]):null;
         $this->wordsList = file("datas/words.txt", FILE_IGNORE_NEW_LINES);

         if($post) {
             if(isset($post["datas"])){
                 try {
                     $this->getSerializedData($post["datas"]);
                     $this->pushUsedLetters($letter);
                 }Catch(\Error $e){
                    $this->error[] = $e;
                 }
             }
         }else{
             $this->index = $this->randomIndexFromWordlList($this->wordsList);
         }
         if($this->error){
             print_r($this->error); die();
         }
         $this->word = $this->getWordFormIndex($this->index);
         $this->wordSize = strlen($this->word);
         $this->countTrials();
         $this->hiddenWord = $this->getHiddenWord();
         if($this->hiddenWord == $this->word){
             $view = "won";
         }else if($this->missed >= $this::MAXTRIALS){
             $view = "lost";
         }
         $this->returnView($view);
     }
    private function returnView($viewName){
         include "./views/tpl/head.php";
         include "./views/".$viewName.".php";
         include "./views/tpl/foot.php";
    }
    private function setSerializedDatas(){
         return rawurlencode(serialize(["wordIndex"=>$this->index, "usedLetters"=>$this->usedLetters]));
    }
    private function getSerializedData($datas){
         try {
             $unserializedDatas = unserialize(rawurldecode($datas));
             $this->usedLetters = $unserializedDatas["usedLetters"];
             $this->index = $unserializedDatas["wordIndex"];
         }Catch(\Exception $e){
             throw new \Error("Datas are unserializable");
         }
    }
}