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
     *   path="/customer/{customerId}/rate",
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
}