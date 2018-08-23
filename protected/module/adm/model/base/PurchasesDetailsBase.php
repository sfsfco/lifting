<?php
Doo::loadCore('db/DooModel');

class PurchasesDetailsBase extends DooModel{

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
    public $quantity;

    /**
     * @var varchar Max length is 100.
     */
    public $price;

    /**
     * @var varchar Max length is 100.
     */
    public $discount;

    /**
     * @var int Max length is 11.
     */
    public $purchase;

    /**
     * @var text
     */
    public $details;

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

    /**
     * @var int Max length is 11.
     */
    public $stockroom;

    public $_table = 'purchases_details';
    public $_primarykey = 'id';
    public $_fields = array('id','item','quantity','price','discount','purchase','details','currency','create_date','edit_date','create_by','edit_by','stockroom');

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

                'quantity' => array(
                        array( 'maxlength', 100 ),
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

                'purchase' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'details' => array(
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
                ),

                'stockroom' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                )
            );
    }

}