<?php

require 'global.php';
require 'Parsedown.php';
require 'Curl.php';

class Controller{
    
    private $curl;
    private $Parsedown;
    
    function __construct() {
        $this->curl = new Curl();
        $this->Parsedown = new Parsedown();
    }
    
    function getRepositories($name = null) {
        if($name==null)
            return json_decode($this->curl->get("https://api.github.com/user/repos"));
        else{
            $value = array();
            $data = json_decode($this->curl->get("https://api.github.com/user/repos"));
            foreach($data as $record){
                if($record->name == $name){
                    array_push($value, $record);
                    array_push($value,$this->getCommits($record->owner->login, $name));
                    array_push($value,$this->getReadme($record->owner->login, $name));
                    return $value;
                }
            }
            return false;
        }
            
    }
    
    function getCommits($user,$name){
        return json_decode($this->curl->get("https://api.github.com/repos/$user/$name/commits"));
    }
    
    function getReadme($user,$name){
        $data = json_decode($this->curl->get("https://api.github.com/repos/$user/$name/readme"));
        if(isset($data->download_url))
            return $this->Parsedown->text($this->curl->get($data->download_url));
        else
            return $this->Parsedown->text('##No s\'ha pogut trobar l\'arxiu README.MD');
    }

}

