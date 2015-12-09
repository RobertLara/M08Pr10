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
    
    function getRepositories($name = null) {    //Documentació oficial de la crida https://developer.github.com/v3/repos/#list-your-repositories
        if($name==null)     //Retorna els llistat de repositoris
            return json_decode($this->curl->get("https://api.github.com/user/repos"));
        else{
            $data = json_decode($this->curl->get("https://api.github.com/user/repos")); //Llistat de repositoris
            foreach($data as $record){  //Comproba cada repositori
                if($record->name == $name){ //En cas de coincidencia
                    $value = array();
                    array_push($value, $record);    //Dades del repositori
                    array_push($value,$this->getCommits($record->owner->login, $name)); //Commits
                    array_push($value,$this->getReadme($record->owner->login, $name));  //README.MD
                    return $value;  //Retorna el repositori en qüestió amb un array(3)
                }
            }
            return false;   //Retorna false en cas de no exitir aquest repositori
        }  
    }
    
    function getCommits($user,$name){   //Documentació oficial de la crida https://developer.github.com/v3/repos/commits/#list-commits-on-a-repository
        return json_decode($this->curl->get("https://api.github.com/repos/$user/$name/commits"));
    }
    
    function getReadme($user,$name){    //Documentació oficial de la crida https://developer.github.com/v3/repos/contents/#get-the-readme
        $data = json_decode($this->curl->get("https://api.github.com/repos/$user/$name/readme"));   //Crida que rep l'arxiu README si existeix
        if(isset($data->download_url))
            return $this->Parsedown->text($this->curl->get($data->download_url));   //Continugt formatat README
        else
            return $this->Parsedown->text('##No s\'ha pogut trobar l\'arxiu README.MD');    //README en cas d'error
    }
    
    function getUserData(){     //Documentació oficial de la crida https://developer.github.com/v3/users/#get-the-authenticated-user
        return json_decode($this->curl->get("https://api.github.com/user"));    //Retorna objecte
    }
    
    function createRepository($name,$private,$wiki,$desc = '',$license = 'mit',$download){  //Documentació oficial de la crida https://developer.github.com/v3/repos/#create
        if($private=="false" || $private == false) $private = false;    //Assignem valor booleà
        else $private = true;
        
        if($wiki=="false" || $wiki == false)$wiki = false;  //Assignem valor booleà
        else $wiki = true;
        
        if($download=="false" || $download == false) $download = false; //Assignem valor booleà
        else $download = true;
        
        $parameters = array(
            'name' => strval($name),
            'descripction' => strval($desc),
            'private' => $private,
            'has_wiki' => $wiki,
            'has_downloads' => $download
            //'license_template' => strval($license)
        );  //Parametres per a crear repositori
        return json_decode($this->curl->post("https://api.github.com/user/repos",json_encode($parameters)));    //Retorna objecte
    }
    
    function getNotifications(){    //Documentació oficial de la crida https://developer.github.com/v3/activity/notifications/#list-your-notifications
        return json_decode($this->curl->get("https://api.github.com/notifications"));   //Retorna objecte
    }
    
    function deleteRepository($name){   //Documentació oficial de la crida https://developer.github.com/v3/repos/#delete-a-repository
        return json_decode($this->curl->delete("https://api.github.com/repos/".$_SESSION['username']."/$name",null));   //Retorna objecte
    }
    
}
