<?php
Doo::loadCore('db/DooModel');

class CertificatesBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $workorder;

    /**
     * @var int Max length is 11.
     */
    public $client;

    /**
     * @var varchar Max length is 255.
     */
    public $client_address;

    /**
     * @var datetime
     */
    public $test_date;

    /**
     * @var int Max length is 11.
     */
    public $test_by;

    /**
     * @var varchar Max length is 255.
     */
    public $certificat_type;

    /**
     * @var varchar Max length is 255.
     */
    public $certificate_form;

    /**
     * @var varchar Max length is 255.
     */
    public $certificat_no;

    /**
     * @var varchar Max length is 255.
     */
    public $magnet_type;

    /**
     * @var date
     */
    public $next_examination;

    /**
     * @var varchar Max length is 255.
     */
    public $according_to;

    /**
     * @var datetime
     */
    public $last_sent;

    /**
     * @var datetime
     */
    public $create_date;

    /**
     * @var datetime
     */
    public $edit_date;

    /**
     * @var int Max length is 11.
     */
    public $create_by;

    /**
     * @var int Max length is 11.
     */
    public $edit_by;

    public $_table = 'certificates';
    public $_primarykey = 'id';
    public $_fields = array('id','workorder','client','client_address','test_date','test_by','certificat_type','certificate_form','certificat_no','magnet_type','next_examination','according_to','last_sent','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'workorder' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'client' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'client_address' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'test_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'test_by' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'certificat_type' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'certificate_form' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'certificat_no' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'magnet_type' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'next_examination' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'according_to' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'last_sent' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'create_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'edit_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'create_by' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'edit_by' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                )
            );
    }

}