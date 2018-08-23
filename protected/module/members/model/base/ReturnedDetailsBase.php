<?php
Doo::loadCore('db/DooModel');

class ReturnedDetailsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $item;

    /**
     * @var varchar Max length is 100.
     */
    public $package;

    /**
     * @var varchar Max length is 100.
     */
    public $unit;

    /**
     * @var date
     */
    public $expire_date;

    /**
     * @var varchar Max length is 100.
     */
    public $sell_price;

    /**
     * @var varchar Max length is 100.
     */
    public $sell_discount;

    /**
     * @var int Max length is 11.
     */
    public $sales;

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

    /**
     * @var int Max length is 11.
     */
    public $stockroom;

    public $_table = 'returned_details';
    public $_primarykey = 'id';
    public $_fields = array('id','item','package','unit','expire_date','sell_price','sell_discount','sales','create_date','edit_date','create_by','edit_by','stockroom');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'item' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'package' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'unit' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'expire_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'sell_price' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'sell_discount' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'sales' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
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
                ),

                'stockroom' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                )
            );
    }

}