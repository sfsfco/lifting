<?php
Doo::loadCore('db/DooModel');

class DeliveryBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var date
     */
    public $delivery_date;

    /**
     * @var varchar Max length is 255.
     */
    public $delivery_address;

    /**
     * @var int Max length is 11.
     */
    public $workorder;

    /**
     * @var varchar Max length is 255.
     */
    public $delivery_to;

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

    public $_table = 'delivery';
    public $_primarykey = 'id';
    public $_fields = array('id','delivery_date','delivery_address','workorder','delivery_to','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'delivery_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'delivery_address' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'workorder' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'delivery_to' => array(
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