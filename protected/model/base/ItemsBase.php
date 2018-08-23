<?php
Doo::loadCore('db/DooModel');

class ItemsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $name;

    /**
     * @var varchar Max length is 100.
     */
    public $country;

    /**
     * @var varchar Max length is 100.
     */
    public $purchase_price;

    /**
     * @var varchar Max length is 100.
     */
    public $purchase_discount;

    /**
     * @var varchar Max length is 255.
     */
    public $barcode;

    /**
     * @var int Max length is 11.
     */
    public $category;

    /**
     * @var varchar Max length is 100.
     */
    public $unit_type;

    /**
     * @var varchar Max length is 100.
     */
    public $package_units;

    /**
     * @var varchar Max length is 100.
     */
    public $order_limit;

    /**
     * @var text
     */
    public $details;

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

    public $_table = 'items';
    public $_primarykey = 'id';
    public $_fields = array('id','name','country','purchase_price','purchase_discount','barcode','category','unit_type','package_units','order_limit','details','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'country' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'purchase_price' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'purchase_discount' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'barcode' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'category' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'unit_type' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'package_units' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'order_limit' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'details' => array(
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