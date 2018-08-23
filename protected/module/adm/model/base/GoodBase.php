<?php
Doo::loadCore('db/DooModel');

class GoodBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $supplier;

    /**
     * @var int Max length is 11.
     */
    public $purchase;

    /**
     * @var date
     */
    public $received_date;

    /**
     * @var varchar Max length is 100.
     */
    public $payment_method;

    /**
     * @var varchar Max length is 100.
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

    public $_table = 'good';
    public $_primarykey = 'id';
    public $_fields = array('id','supplier','purchase','received_date','payment_method','total_value','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'supplier' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'purchase' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'received_date' => array(
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