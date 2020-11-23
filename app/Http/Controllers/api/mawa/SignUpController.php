<?php

namespace App\Http\Controllers\api\mawa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class SignUpController extends Controller
{
    public function signUp(Request $request) {
      $login = $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users',
        'password' => 'required|string'
      ]);
 return response($password);
      $user = User::create(request(['name', 'email', bcrypt('password')]));


      if (!$user) {
        return response(['message' => 'invalid sign up credentials']);
      }

      return response(['signedUp' => 1]);
    }

}
