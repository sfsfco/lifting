<?php
Doo::loadCore('db/DooModel');

class GroupsBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $name;

    /**
     * @var int Max length is 11.
     */
    public $active;

    /**
     * @var datetime
     */
    public $create_date;

    /**
     * @var datetime
     */
    public $edit_date;

    /**
     * @var datetime
     */
    public $last_edit;

    /**
     * @var int Max length is 11.
     */
    public $create_by;

    /**
     * @var int Max length is 11.
     */
    public $edit_by;

    public $_table = 'groups';
    public $_primarykey = 'id';
    public $_fields = array('id','name','active','create_date','edit_date','last_edit','create_by','edit_by');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'active' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'create_date' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'edit_date' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'last_edit' => array(
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
                )
            );
    }

}