<?php
Doo::loadCore('db/DooModel');

class PaymentsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var date
     */
    public $payment_date;

    /**
     * @var varchar Max length is 100.
     */
    public $payment_type;

    /**
     * @var int Max length is 11.
     */
    public $payment_for;

    /**
     * @var varchar Max length is 100.
     */
    public $payment_value;

    /**
     * @var int Max length is 11.
     */
    public $payment_id;

    /**
     * @var varchar Max length is 100.
     */
    public $payment_method;

    /**
     * @var int Max length is 11.
     */
    public $bank_id;

    /**
     * @var varchar Max length is 100.
     */
    public $bank_no;

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

    public $_table = 'payments';
    public $_primarykey = 'id';
    public $_fields = array('id','payment_date','payment_type','payment_for','payment_value','payment_id','payment_method','bank_id','bank_no','details','currency','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'payment_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'payment_type' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'payment_for' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'payment_value' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'payment_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'payment_method' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'bank_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'bank_no' => array(
                        array( 'maxlength', 100 ),
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
                )
            );
    }

}