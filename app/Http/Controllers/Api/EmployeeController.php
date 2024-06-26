<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEmployeeQuery;

class EmployeeController extends Controller
{

    private $EmployeeQuery;

    public function __construct(IEmployeeQuery $employeeQuery)
    {
        $this->EmployeeQuery = $employeeQuery;
    }

    /**
     * @OA\Get(
     *      path="/employee/index",
     *      operationId="getAllEmployees",
     *      tags={"Employee"},
     *      summary="Get All Employees",
     *      description="Return Employees",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="commerce_id",
     *          description="Employee Commerce Id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="identification",
     *          description="Employee Identification",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="identification_type",
     *          description="Employee Tipo Identification",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="name",
     *          description="Employee Name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="lastname",
     *          description="Employee LastName",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="phone",
     *          description="Employee Phone",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          description="Employee Email",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="adress",
     *          description="Employee Adress",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="birth_date",
     *          description="Employee BirthDate",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="is_employee",
     *          description="Employee isEmployee",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="boolean"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="employee_state",
     *          description="Employee State",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index(Request $request)
    {
        return $this->EmployeeQuery->index($request);
    }

    /**
     * @OA\Get(
     *      path="/employee/getallbycommerceid/{commerce_id}",
     *      operationId="getAllByCommerceId",
     *      tags={"Employee"},
     *      summary="Get All Employee By Commerce Id",
     *      description="Return All Employee",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="commerce_id",
     *          description="Commerce Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function getAllByCommerceId(Request $request, $commerce_id)
    {
        return $this->EmployeeQuery->getAllByCommerceId($request, $commerce_id);
    }



    /**
     * @OA\Post(
     *      path="/employee/store",
     *      operationId="storeEmployees",
     *      tags={"Employee"},
     *      summary="Store Employee",
     *      description="Store Employee",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Employee")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function store(Request $request)
    {
        return $this->EmployeeQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/employee/showbyemployeeid/{id}",
     *      operationId="getEmployeeById",
     *      tags={"Employee"},
     *      summary="Get One Employee By one Id",
     *      description="Return One Employee",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Employee Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function showByEmployeeId(Request $request, $id)
    {
        return $this->EmployeeQuery->showByEmployeeId($request, $id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '';
    }

    /**
     * @OA\Put(
     *      path="/employee/update/{id}",
     *      operationId="getUpdateEmployeeById",
     *      tags={"Employee"},
     *      summary="Update One Employee By one Id",
     *      description="Update One Employee",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Employee Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/EmployeeUpdate")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function update(Request $request, $id)
    {
        return $this->EmployeeQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/employee/destroy/{id}",
     *      operationId="getDestroyEmployeeById",
     *      tags={"Employee"},
     *      summary="Delete One Employee By one Id",
     *      description="Delete One Employee",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Employee Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function destroy($id)
    {
        return $this->EmployeeQuery->destroy($id);
    }
}
