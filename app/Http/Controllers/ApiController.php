<?php

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Compare Github repositories API",
 *     version="1.0.0"
 *   )
 * )
 */

namespace App\Http\Controllers;

use Request;

class ApiController extends Controller {
        
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
    
    /**
     * @SWG\Get(
     *   path="user/repositories/{user}",
     *   summary="List user githubs respositories",
     *   operationId="userRepositories",
     *   @SWG\Parameter(
     *     name="user",
     *     in="query",
     *     description="User Github login.",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     */
    public function userRepositories($user) {
        $repositiories = $this->githubClient->api('user')->repositories($user);
        return response()->json($repositiories);
    }
    
    /**
     * @SWG\Get(
     *   path="user/{user}",
     *   summary="Show user information",
     *   operationId="userUser",
     *   @SWG\Parameter(
     *     name="user",
     *     in="query",
     *     description="User Github login.",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     */
    public function getUser($user) {
        $repositiories = $this->githubClient->api('user')->show($user);
        return response()->json($repositiories);
    }
    
    /**
     * @SWG\Get(
     *   path="repository/{user}/{name}",
     *   summary="Repository information",
     *   operationId="getRepository",
     *   @SWG\Parameter(
     *     name="user",
     *     in="query",
     *     description="User Github login.",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="name",
     *     in="query",
     *     description="Repository name.",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     */
    public function getRepository($user, $name) {
        $repository = $this->githubClient->api('repo')->show($user, $name);
        return response()->json($repository);
    }    
}