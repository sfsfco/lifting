<?php
Doo::loadCore('db/DooModel');

class InvoicesBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 100.
     */
    public $name;

    /**
     * @var int Max length is 11.
     */
    public $delivery_note;

    /**
     * @var datetime
     */
    public $delivery_date;

    /**
     * @var int Max length is 11.
     */
    public $po;

    /**
     * @var int Max length is 11.
     */
    public $quotation;

    /**
     * @var varchar Max length is 255.
     */
    public $serial;

    /**
     * @var int Max length is 11.
     */
    public $taxed;

    /**
     * @var varchar Max length is 100.
     */
    public $tax;

    /**
     * @var text
     */
    public $items;

    /**
     * @var int Max length is 11.
     */
    public $bank;

    /**
     * @var int Max length is 11.
     */
    public $client;

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
    public $deleted;

    public $_table = 'invoices';
    public $_primarykey = 'id';
    public $_fields = array('id','name','delivery_note','delivery_date','po','quotation','serial','taxed','tax','items','bank','client','create_date','edit_date','create_by','edit_by','deleted');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'delivery_note' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'delivery_date' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'po' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'quotation' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'serial' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'taxed' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'tax' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'items' => array(
                        array( 'notnull' ),
                ),

                'bank' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'client' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'create_date' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'edit_date' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'create_by' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'edit_by' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'deleted' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                )
            );
    }

}