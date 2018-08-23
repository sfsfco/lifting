<?php
Doo::loadCore('db/DooModel');

class StockallocationsDetailsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $stock;

    /**
     * @var int Max length is 11.
     */
    public $stock_code;

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
    public $unit_cost;

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

    public $_table = 'stockallocations_details';
    public $_primarykey = 'id';
    public $_fields = array('id','stock','stock_code','quantity','details','unit_cost','total_value','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'stock' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'stock_code' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'quantity' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'details' => array(
                        array( 'optional' ),
                ),

                'unit_cost' => array(
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