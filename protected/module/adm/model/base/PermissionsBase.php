<?php
Doo::loadCore('db/DooModel');

class PermissionsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $controller_name;

    /**
     * @var text
     */
    public $actions;

    /**
     * @var int Max length is 11.
     */
    public $group_id;

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

    public $_table = 'permissions';
    public $_primarykey = 'id';
    public $_fields = array('id','controller_name','actions','group_id','create_date','edit_date','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'controller_name' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'actions' => array(
                        array( 'notnull' ),
                ),

                'group_id' => array(
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