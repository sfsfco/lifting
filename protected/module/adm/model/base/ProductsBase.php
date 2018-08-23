<?php
Doo::loadCore('db/DooModel');

class ProductsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $name;

    /**
     * @var varchar Max length is 255.
     */
    public $ar_name;

    /**
     * @var int Max length is 11.
     */
    public $product_category;

    /**
     * @var text
     */
    public $photo;

    /**
     * @var int Max length is 11.
     */
    public $featured;

    /**
     * @var text
     */
    public $details;

    /**
     * @var text
     */
    public $ar_details;

    /**
     * @var datetime
     */
    public $create_date;

    /**
     * @var int Max length is 11.
     */
    public $create_by;

    /**
     * @var datetime
     */
    public $edit_date;

    /**
     * @var int Max length is 11.
     */
    public $edit_by;

    /**
     * @var int Max length is 11.
     */
    public $views;

    public $_table = 'products';
    public $_primarykey = 'id';
    public $_fields = array('id','name','ar_name','product_category','photo','featured','details','ar_details','create_date','create_by','edit_date','edit_by','views');

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

                'ar_name' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'product_category' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'photo' => array(
                        array( 'optional' ),
                ),

                'featured' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'details' => array(
                        array( 'notnull' ),
                ),

                'ar_details' => array(
                        array( 'notnull' ),
                ),

                'create_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'create_by' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'edit_date' => array(
                        array( 'datetime' ),
                        array( 'optional' ),
                ),

                'edit_by' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'views' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                )
            );
    }

}