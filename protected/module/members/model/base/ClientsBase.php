<?php
Doo::loadCore('db/DooModel');

class ClientsBase extends DooModel{

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
    public $representative;

    /**
     * @var varchar Max length is 255.
     */
    public $city;

    /**
     * @var varchar Max length is 50.
     */
    public $postal_code;

    /**
     * @var varchar Max length is 100.
     */
    public $country;

    /**
     * @var varchar Max length is 255.
     */
    public $address;

    /**
     * @var varchar Max length is 100.
     */
    public $phone;

    /**
     * @var varchar Max length is 255.
     */
    public $mail;

    /**
     * @var varchar Max length is 100.
     */
    public $fax;

    /**
     * @var varchar Max length is 100.
     */
    public $mobile;

    /**
     * @var int Max length is 11.
     */
    public $active;

    /**
     * @var text
     */
    public $details;

    /**
     * @var varchar Max length is 255.
     */
    public $username;

    /**
     * @var varchar Max length is 255.
     */
    public $password;

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

    public $_table = 'clients';
    public $_primarykey = 'id';
    public $_fields = array('id','name','representative','city','postal_code','country','address','phone','mail','fax','mobile','active','details','username','password','create_date','edit_date','create_by','edit_by');

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

                'representative' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'city' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'postal_code' => array(
                        array( 'maxlength', 50 ),
                        array( 'optional' ),
                ),

                'country' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'address' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'phone' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'mail' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'fax' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'mobile' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'active' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'details' => array(
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