<?php

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
    
    function getUserData(){
        return json_decode($this->curl->get("https://api.github.com/user"));
    }
    
    function createRepository($name,$private,$wiki,$desc = '',$license = 'mit',$download){
        if($private=="false" || $private == false) $private = false;
        else $private = true;
        
        if($wiki=="false" || $wiki == false)$wiki = false;
        else $wiki = true;
        
        if($download=="false" || $download == false) $download = false;
        else $download = true;
        
        $parameters = array(
            'name' => strval($name),
            'descripction' => strval($desc),
            'private' => $private,
            'has_wiki' => $wiki,
            'has_downloads' => $download
            //'license_template' => strval($license)
        );
        return json_decode($this->curl->post("https://api.github.com/user/repos",json_encode($parameters)));
    }
    
    function getNotifications(){
        return json_decode($this->curl->get("https://api.github.com/notifications"));
    }
    
    function deleteRepository($name){
        return json_decode($this->curl->delete("https://api.github.com/repos/".$_SESSION['username']."/$name",null));
    }

}
