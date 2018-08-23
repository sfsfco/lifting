<?php
Doo::loadCore('db/DooModel');

class SuppliersBase extends DooModel{

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
    public $address;

    /**
     * @var varchar Max length is 100.
     */
    public $phone1;

    /**
     * @var varchar Max length is 100.
     */
    public $phone2;

    /**
     * @var varchar Max length is 100.
     */
    public $fax;

    /**
     * @var varchar Max length is 100.
     */
    public $mobile;

    /**
     * @var varchar Max length is 255.
     */
    public $city;

    /**
     * @var varchar Max length is 255.
     */
    public $country;

    /**
     * @var varchar Max length is 100.
     */
    public $postal_code;

    /**
     * @var varchar Max length is 150.
     */
    public $site;

    /**
     * @var varchar Max length is 100.
     */
    public $mail;

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
     * @var int Max length is 11.
     */
    public $create_by;

    /**
     * @var int Max length is 11.
     */
    public $edit_by;

    public $_table = 'suppliers';
    public $_primarykey = 'id';
    public $_fields = array('id','name','address','phone1','phone2','fax','mobile','city','country','postal_code','site','mail','details','create_date','edit_date','create_by','edit_by');

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

                'address' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'phone1' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'phone2' => array(
                        array( 'maxlength', 100 ),
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

                'city' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'country' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'postal_code' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'site' => array(
                        array( 'maxlength', 150 ),
                        array( 'optional' ),
                ),

                'mail' => array(
                        array( 'maxlength', 100 ),
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