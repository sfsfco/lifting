<?php
Doo::loadCore('db/DooModel');

class SalesBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $client;

    /**
     * @var date
     */
    public $sell_date;

    /**
     * @var varchar Max length is 100.
     */
    public $payment_method;

    /**
     * @var varchar Max length is 100.
     */
    public $total_value;

    /**
     * @var varchar Max length is 100.
     */
    public $total_discount;

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

    public $_table = 'sales';
    public $_primarykey = 'id';
    public $_fields = array('id','client','sell_date','payment_method','total_value','total_discount','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'client' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'sell_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'payment_method' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'total_value' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'total_discount' => array(
                        array( 'maxlength', 100 ),
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