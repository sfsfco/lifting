<?php
Doo::loadCore('db/DooModel');

class CertificatesDetailsBase extends DooModel{

    /**
     * @var varchar Max length is 255.
     */
    public $original_cert_no;

    /**
     * @var datetime
     */
    public $original_cert_date;

    /**
     * @var varchar Max length is 255.
     */
    public $name_cert;

    /**
     * @var datetime
     */
    public $last_exam;

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $certificate;

    /**
     * @var int Max length is 11.
     */
    public $workorder;

    /**
     * @var int Max length is 11.
     */
    public $workorder_item;

    /**
     * @var varchar Max length is 100.
     */
    public $i_d;

    /**
     * @var varchar Max length is 255.
     */
    public $quantity;

    /**
     * @var text
     */
    public $details;

    /**
     * @var varchar Max length is 255.
     */
    public $swl;

    /**
     * @var varchar Max length is 255.
     */
    public $pl;

    /**
     * @var varchar Max length is 255.
     */
    public $idno;

    /**
     * @var varchar Max length is 225.
     */
    public $certificat_type;

    /**
     * @var varchar Max length is 225.
     */
    public $certificate_form;

    /**
     * @var varchar Max length is 225.
     */
    public $according_to;

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

    public $_table = 'certificates_details';
    public $_primarykey = 'id';
    public $_fields = array('original_cert_no','original_cert_date','name_cert','last_exam','id','certificate','workorder','workorder_item','i_d','quantity','details','swl','pl','idno','certificat_type','certificate_form','according_to','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'original_cert_no' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'original_cert_date' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'name_cert' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'last_exam' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'certificate' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'workorder' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'workorder_item' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'i_d' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'quantity' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'details' => array(
                        array( 'optional' ),
                ),

                'swl' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'pl' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'idno' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'certificat_type' => array(
                        array( 'maxlength', 225 ),
                        array( 'notnull' ),
                ),

                'certificate_form' => array(
                        array( 'maxlength', 225 ),
                        array( 'notnull' ),
                ),

                'according_to' => array(
                        array( 'maxlength', 225 ),
                        array( 'notnull' ),
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