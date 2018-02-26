<?php

namespace App\Http\Controllers;

use Input;

class CompareController extends Controller {
    
    /**
     * Github api request class
     * 
     * @var object 
     */
    protected $githubClient;

    public function __construct()
    {
        $this->githubClient = new \Github\Client();
    }
    
    public function index() {
        return view('compare/index');
    }
    
    public function compare() {
        $first_repository = Input::get('first_repository');
        $second_repository = Input::get('second_repository');
        
        $results = [];
        if(!empty($first_repository)) {
            $results['first'] = $this->getRepositoryInfo($first_repository);
        }
        
        if(!empty($second_repository)) {
            $results['second'] = $this->getRepositoryInfo($second_repository);
        }
        return view('compare/results', $results);
    }
    
    /**
     * 
     * @param string $url
     * @return array
     */
    protected function getRepositoryInfo($url) {
        $repositoryInfo = [];
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return $repositoryInfo;
        }

        $matches = [];
        $username = null;
        $repositoryName = null;
        
        preg_match_all('/https:\/\/github.com\/([a-zA-Z0-9-_]+)\/([a-zA-Z0-9-_]+)/i', $url, $matches);

        if(isset($matches[1])) {
            $username = $matches[1][0];
        }

        if(isset($matches[2])) {
            $repositoryName = $matches[2][0];
        }
                
        if (empty($username) || empty($repositoryName)) {
            return $repositoryInfo;
        }

        $repositoryInfo = $this->githubClient->api('repo')->show($username, $repositoryName);
        return $repositoryInfo;
    }
}