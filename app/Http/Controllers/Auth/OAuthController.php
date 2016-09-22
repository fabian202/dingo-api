<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\BaseController;

use Authorizer;
use Auth;

class OAuthController extends BaseController
{
  public function authorizeClient()
  {
    return $this->response->array(Authorizer::issueAccessToken());
  }
}
