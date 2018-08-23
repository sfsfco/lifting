<?php
Doo::loadCore('db/DooModel');

class BanksBase extends DooModel{

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
    public $number;

    /**
     * @var varchar Max length is 100.
     */
    public $account_name;

    /**
     * @var varchar Max length is 100.
     */
    public $branch;

    /**
     * @var varchar Max length is 100.
     */
    public $swift_code;

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

    public $_table = 'banks';
    public $_primarykey = 'id';
    public $_fields = array('id','name','number','account_name','branch','swift_code','create_date','edit_date','create_by','edit_by');

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

                'number' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'account_name' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'branch' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'swift_code' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
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