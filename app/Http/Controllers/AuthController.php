<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Productos;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','me']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request){
        /*$request->validate([
            'email' => 'required',
            'password' => 'required|string'
        ]);
        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthodfsadfadfrized'], 401);
        }
        $user = $request -> user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json(['data' =>[
            'user' => Auth::user(),
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]]);

        return $this->respondWithToken($token);*/
        $correo = request(['email']);
        $correo = implode(' ', $correo);
        $expresion = "/\S+@\S+\.\S+/";
        if(preg_match("/\S+@\S+\.\S+/", $correo) == 0){
            return view('form')->with('productos',1);
        }
        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            //return response()->json(['error' => 'Unauthorized'], 401);             
            return view('form')->with('productos',2);
        }
        $productos = Productos::all();
        return view('index')->with('productos',$productos);
        //return $this->respondWithToken($token);
    }
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return view('');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
            'nombre'=> 'required',
            'telefono' => 'required',
            'username' => 'required',
            'nacimiento'=> 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator -> validate(),
            ['password' => bcrypt($request->password)]
        ));
        return response()->json([
            'Message' =>'asdasdasdasd',
            'user' => $user
        ],201);
    }
    

}
