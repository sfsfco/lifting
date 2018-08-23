<?php
Doo::loadCore('db/DooModel');

class DeliveryDetailsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $delivery;

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
    public $unit_cost;

    /**
     * @var varchar Max length is 255.
     */
    public $total;

    /**
     * @var int Max length is 11.
     */
    public $currency;

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

    public $_table = 'delivery_details';
    public $_primarykey = 'id';
    public $_fields = array('id','delivery','i_d','quantity','details','swl','pl','unit_cost','total','currency','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'delivery' => array(
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

                'unit_cost' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'total' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'currency' => array(
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
                )
            );
    }

}