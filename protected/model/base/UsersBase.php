<?php
Doo::loadCore('db/DooModel');

class UsersBase extends DooModel{

    /**
     * @var varchar Max length is 255.
     */
    public $sign;

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $first_name;

    /**
     * @var varchar Max length is 255.
     */
    public $last_name;

    /**
     * @var varchar Max length is 255.
     */
    public $mail;

    /**
     * @var varchar Max length is 255.
     */
    public $username;

    /**
     * @var varchar Max length is 255.
     */
    public $password;

    /**
     * @var varchar Max length is 255.
     */
    public $address;

    /**
     * @var varchar Max length is 255.
     */
    public $country;

    /**
     * @var varchar Max length is 255.
     */
    public $salary;

    /**
     * @var varchar Max length is 255.
     */
    public $phone;

    /**
     * @var varchar Max length is 255.
     */
    public $mobile;

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
     * @var datetime
     */
    public $last_login;

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
    public $group_id;

    /**
     * @var int Max length is 11.
     */
    public $active;

    /**
     * @var varchar Max length is 255.
     */
    public $pic;

    public $_table = 'users';
    public $_primarykey = 'id';
    public $_fields = array('sign','id','first_name','last_name','mail','username','password','address','country','salary','phone','mobile','details','create_date','edit_date','last_login','create_by','edit_by','group_id','active','pic');

    public function getVRules() {
        return array(
                'sign' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'first_name' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'last_name' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'mail' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'username' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'password' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'address' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'country' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'salary' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'phone' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'mobile' => array(
                        array( 'maxlength', 255 ),
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

                'last_login' => array(
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
                ),

                'group_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'active' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'pic' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                )
            );
    }

}