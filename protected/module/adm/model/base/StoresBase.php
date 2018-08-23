<?php
Doo::loadCore('db/DooModel');

class StoresBase extends DooModel{

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
    public $price;

    /**
     * @var varchar Max length is 100.
     */
    public $discount;

    /**
     * @var varchar Max length is 100.
     */
    public $quantity;

    /**
     * @var int Max length is 11.
     */
    public $good;

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

    public $_table = 'stores';
    public $_primarykey = 'id';
    public $_fields = array('id','item','price','discount','quantity','good','create_date','edit_date','create_by','edit_by','stockroom');

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

                'price' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'discount' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'quantity' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'good' => array(
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
                        array( 'optional' ),
                )
            );
    }

}