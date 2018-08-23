<?php
Doo::loadCore('db/DooModel');

class PrefrancesoldBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $site_name;

    /**
     * @var varchar Max length is 255.
     */
    public $meta;

    /**
     * @var varchar Max length is 255.
     */
    public $logo;

    /**
     * @var int Max length is 11.
     */
    public $paging;

    /**
     * @var varchar Max length is 255.
     */
    public $mail;

    /**
     * @var varchar Max length is 255.
     */
    public $slave_host;

    /**
     * @var varchar Max length is 255.
     */
    public $slave_database;

    /**
     * @var varchar Max length is 255.
     */
    public $slave_user;

    /**
     * @var varchar Max length is 255.
     */
    public $slave_password;

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

    /**
     * @var text
     */
    public $contacts;

    /**
     * @var text
     */
    public $map;

    /**
     * @var varchar Max length is 100.
     */
    public $currency;

    /**
     * @var varchar Max length is 100.
     */
    public $tax_id;

    /**
     * @var varchar Max length is 255.
     */
    public $serial;

    /**
     * @var varchar Max length is 255.
     */
    public $none_serial;

    public $_table = 'prefrancesold';
    public $_primarykey = 'id';
    public $_fields = array('id','site_name','meta','logo','paging','mail','slave_host','slave_database','slave_user','slave_password','create_date','edit_date','create_by','edit_by','contacts','map','currency','tax_id','serial','none_serial');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'site_name' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'meta' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'logo' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'paging' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'mail' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'slave_host' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'slave_database' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'slave_user' => array(
                        array( 'maxlength', 255 ),
                        array( 'optional' ),
                ),

                'slave_password' => array(
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
                ),

                'contacts' => array(
                        array( 'optional' ),
                ),

                'map' => array(
                        array( 'optional' ),
                ),

                'currency' => array(
                        array( 'maxlength', 100 ),
                        array( 'optional' ),
                ),

                'tax_id' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'serial' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'none_serial' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                )
            );
    }

}