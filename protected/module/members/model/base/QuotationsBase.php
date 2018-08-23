<?php
Doo::loadCore('db/DooModel');

class QuotationsBase extends DooModel{

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
     * @var varchar Max length is 255.
     */
    public $request_no;

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
    public $quotation_date;

    /**
     * @var date
     */
    public $delivery_date;

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

    public $_table = 'quotations';
    public $_primarykey = 'id';
    public $_fields = array('id','title','client','request_no','net_value','tax','total_value','quotation_date','delivery_date','create_date','edit_date','create_by','edit_by');

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

                'request_no' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
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

                'quotation_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'delivery_date' => array(
                        array( 'date' ),
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