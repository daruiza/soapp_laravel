<?php

namespace App\Query\Request;

use App\Model\Core\Commerce;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery
{
    private $name = 'name';
    private $nit = 'nit';
    private $department = 'department';
    private $city = 'city';
    private $adress = 'adress';
    private $description = 'description';
    private $logo = 'logo';
    private $active = 'active';
    private $user_id = 'user_id';

    public function index(Request $request)
    {
        try {
            $commerces = Commerce::where('active', 1)
                ->select(['id', 'name', 'nit', 'department', 'city', 'user_id'])
                ->with(['user:id,name,lastname,phone,email'])
                ->name($request->name)
                ->nit($request->nit)
                ->department($request->department)
                ->city($request->city)
                ->user_id($request->user_id)
                ->orderBy('id',  $request->sort ?? 'ASC')
                ->paginate($request->limit ?? 10, ['*'], '', $request->page ?? 1);

            return response()->json([
                'data' => [
                    'commerce' => $commerces,
                ],
                'message' => 'Datos de Tiendas Consultados Correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function store(Request $request)
    {
        // if ((auth()->check() && auth()->user()->rol_id == 1) || (auth()->check() && auth()->user()->rol_id == 3)) {

            // Creamos las reglas de validación
            $rules = [
                $this->name => 'required|string|min:1|max:128|unique:commerces|',
                $this->nit   => 'required|unique:commerces|'
            ];
            try {
                // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                // Creamos el nuevo comercio
                $commerce = new Commerce();
                $request->request->add(['active' => 1]);
                $newCommerce = $commerce->create($request->input());

                return response()->json([
                    'data' => [
                        'commerce' => $newCommerce,
                    ],
                    'message' => 'Tienda creada correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        // } else {
        //     return response()->json(['message' => 'No tiene permiso para crear tienda!'], 403);
        // }
    }

    public function update(Request $request, Int $id)
    {
        if ($id) {
            try {
                $commerce = Commerce::findOrFail($id);
                $rules = [
                    $this->name  => 'required|string|min:1|max:128|', Rule::unique('commerces')->ignore($commerce->id),
                    $this->nit   => 'required|', Rule::unique('commerces')->ignore($commerce->id),
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                $commerce->name = $request->name;
                $commerce->nit = $request->nit;
                $commerce->department = $request->department ?? $commerce->department;
                $commerce->city = $request->city ?? $commerce->city;
                $commerce->adress = $request->adress ?? $commerce->adress;
                $commerce->description = $request->description ?? $commerce->description;
                $commerce->logo = $request->logo ?? $commerce->logo;
                $commerce->save();
                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'Negocio actualizado con éxito!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
            }
        }
    }

    public function showByUserId(Request $request,  int $id)
    {
        if ($id) {
            try {
                $commerce = Commerce::where('user_id', '=', $id)->first();
                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Tienda no existe!', 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function showByCommerceId(Request $request, $id)
    {
        if ($id) {
            try {
                $commerce = Commerce::findOrFail($id);
                $commerce->user;
                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'Datos de Tienda Consultados Correctamente!'
                ], 201);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Tienda no existe!', 'error' => $e->getMessage()], 403);
            }
        }
    }

    public function destroy(Int $id)
    {
        if (auth()->check() && auth()->user()->rol_id == 1) {

            if ($id) {
                try {
                    $commerce = Commerce::findOrFail($id);
                    $commerce->delete();
                    return response()->json([
                        'data' => [
                            'user' => $commerce,
                        ],
                        'message' => 'Tienda eliminada con éxito!'
                    ], 201);
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Tienda no existe!', 'error' => $e->getMessage()], 403);
                }
            }
        } else {
            return response()->json(['message' => 'Necesita permisos de super-administrador!'], 403);
        }
    }
}
