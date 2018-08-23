<?php
Doo::loadCore('db/DooModel');

class PrefrancesBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 255.
     */
    public $k;

    /**
     * @var text
     */
    public $v;

    public $_table = 'prefrances';
    public $_primarykey = 'id';
    public $_fields = array('id','k','v');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'k' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'v' => array(
                        array( 'notnull' ),
                )
            );
    }

}