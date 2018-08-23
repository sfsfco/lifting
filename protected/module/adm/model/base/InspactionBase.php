<?php
Doo::loadCore('db/DooModel');

class InspactionBase extends DooModel{

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
    public $email;

    /**
     * @var varchar Max length is 255.
     */
    public $subject;

    /**
     * @var text
     */
    public $message;

    /**
     * @var int Max length is 11.
     */
    public $readed;

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

    public $_table = 'inspaction';
    public $_primarykey = 'id';
    public $_fields = array('id','name','email','subject','message','readed','create_date','edit_date','create_by','edit_by');

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

                'email' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'subject' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'message' => array(
                        array( 'optional' ),
                ),

                'readed' => array(
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