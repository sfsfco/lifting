<?php
Doo::loadCore('db/DooModel');

class WorkordersBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $title;

    /**
     * @var int Max length is 11.
     */
    public $client;

    /**
     * @var date
     */
    public $delivery_date;

    /**
     * @var varchar Max length is 255.
     */
    public $delivery_address;

    /**
     * @var varchar Max length is 255.
     */
    public $request_no;

    /**
     * @var varchar Max length is 255.
     */
    public $po_no;

    /**
     * @var int Max length is 11.
     */
    public $quotation;

    /**
     * @var varchar Max length is 255.
     */
    public $net_value;

    /**
     * @var varchar Max length is 255.
     */
    public $tax;

    /**
     * @var varchar Max length is 255.
     */
    public $total_value;

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

    public $_table = 'workorders';
    public $_primarykey = 'id';
    public $_fields = array('id','title','client','delivery_date','delivery_address','request_no','po_no','quotation','net_value','tax','total_value','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'title' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'client' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'delivery_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'delivery_address' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'request_no' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'po_no' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'quotation' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'net_value' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'tax' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'total_value' => array(
                        array( 'maxlength', 255 ),
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