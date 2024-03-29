<?php

/**
 * @OA\Schema(
 *      title="CorrectiveMonitoringRSSTEvidence",
 *      description="CorrectiveMonitoringRSSTEvidence body data",
 *      type="object"
 * )
 */
class CorrectiveMonitoringRSSTEvidence
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the evidence",
     *      example="FileName"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="file",
     *      description="File of the evidence",
     *      example="FileHostingName"
     * )
     *
     * @var string
     */
    public $file;

    /**
     * @OA\Property(
     *      title="type",
     *      description="Type File",
     *      example="image/jpeg"
     * )
     *
     * @var string
     */
    public $type;


    /**
     * @OA\Property(
     *      title="approved",
     *      description="approved of the evidence",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $approved;


    /**
     * @OA\Property(
     *      title="corrective_id",
     *      description="corrective_id of the Corrective",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $corrective_id;

}