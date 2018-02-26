<?php

namespace App\Http\Controllers;

use Input;

class CompareController extends Controller {
    
    public function index() {
        return view('compare/index');
    }
    
    public function compare() {
        $first_repository = Input::get('first_repository');
        $second_repository = Input::get('second_repository');
        
        $results = [];
        
        $githubClient = new \Github\Client();
        
        if(!empty($first_repository)) {
                
        }
        
        
        
        $repos = $githubClient->api('user')->repositories('Weso1ek');
        
        
        var_dump($repos);
        
        die('askdjjkashdasjhdj');
        
        
        return view('compare/results');
    }
}