<?php

namespace App\Query\Request;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Query\Abstraction\IAuthQuery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class AuthQuery implements IAuthQuery
{
    private $name = 'name';
    private $email = 'email';
    private $password = 'password';

    public function login(Request $request)
    {
        $rules = [
            // $this->name     => 'required|string|min:1|max:128',
            $this->email    => 'required|string|max:128|email',
            $this->password => 'required|string',
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $credentials = request([$this->name, $this->email, $this->password]);
            $validator = Validator::make($request->all(), $rules);
            if (!Auth::attempt($credentials) || $validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }

            $user = $request->user();
            $tokenResult = $user->createToken(env('APP_NAME'));
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addDays(1);
            // $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
                'data' => [
                    'access_token' => $tokenResult->accessToken,
                    'token_type'   => 'Bearer',
                    'expires_at'   => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString(),
                ],
                'message' => 'Usuario logueado con éxito!'
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Credenciales no autorizadas!', 'error' => $e], 403);
        }
    }

    public function user(Request $request)
    {
        try {            
            $user = User::query()
                ->select(['id', 'name', 'lastname', 'phone', 'email', 'photo', 'theme', 'rol_id'])
                ->where('id', '=', $request->user()->id)
                ->with(['rol:id,name,description,active'])
                ->first();
            return response()->json([
                'data' => [
                    'User' => $user,
                ],
                'message' => 'Datos de Usuario Consultados Correctamente!'
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function signup(Request $request)
    {
        try {
            $request->validate([
                $this->name     => 'required|string|min:5|max:128',
                $this->email    => 'required|string|email|unique:users',
                $this->password => 'required|string|confirmed',
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }

        $user = new User([
            $this->name     => $request->name,
            $this->email    => $request->email,
            $this->password => bcrypt($request->password),
        ]);

        $user->save();
        return response()->json(['message' => 'Usuario creado correctamente!'], 201);
    }
}
