<?php

/**
 * @OA\Schema(
 *      title="EmployeeUpdate",
 *      description="EmployeeUpdate body data",
 *      type="object"
 * )
 */
class EmployeeUpdate
{
    /**
     * @OA\Property(
     *      title="identification",
     *      description="Identification of the Employee",
     *      example="1039420535"
     * )
     *
     * @var string
     */
    public $identification;

     /**
     * @OA\Property(
     *      title="identification_type",
     *      description="identification_type of the Employee",
     *      example="Cedula de Ciudadania"
     * )
     *
     * @var string
     */
    public $identification_type;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Employee",
     *      example="David"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="lastname",
     *      description="Lastname of the Employee",
     *      example="Ruiz"
     * )
     *
     * @var string
     */
    public $lastname;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the Employee",
     *      example="super@yopmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="birth_date",
     *      description="Birth_Date of the Employee",
     *      example="2022-01-01"
     * )
     *
     * @var date
     */
    public $birth_date;

    /**
     * @OA\Property(
     *      title="adress",
     *      description="adress of the Employee",
     *      example="Cll 60 # 75 - 150"
     * )
     *
     * @var string
     */
    public $adress;

    /**
     * @OA\Property(
     *      title="phone",
     *      description="phone of the Employee",
     *      example=3194062550
     * )
     *
     * @var numeric
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="photo",
     *      description="photo of the user",
     *      example="avatar"
     * )
     *
     * @var string
     */
    public $photo;

    /**
     * @OA\Property(
     *      title="commerce_id",
     *      description="commerce_id of the Employee",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $commerce_id;

    /**
     * @OA\Property(
     *      title="is_employee",
     *      description="is_employee of the user",
     *      example="1"
     * )
     *
     * @var boolean
     */
    public $is_employee;
}