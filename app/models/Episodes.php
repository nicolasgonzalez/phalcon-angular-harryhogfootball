<?php
/**
 * Episodes.php
 * Episodes
 *
 * The model for the episodes table
 *
 * @author      Nikos Dimopoulos <nikos@niden.net>
 * @since       2012-06-21
 * @category    Models
 * @license     MIT - https://github.com/niden/phalcon-angular-harryhogfootball/blob/master/LICENSE
 *
 */

use niden_Session as Session;

class Episodes extends Phalcon_Model_Base
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $number;

    /**
     * @var string
     */
    public $summary;

    /**
     * @var integer
     */
    public $airDate;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var integer
     */
    public $createdAtUserId;

    /**
     * @var string
     */
    public $lastUpdate;

    /**
     * @var integer
     */
    public $lastUpdateUserId;

    /**
     * Initializes the class and sets any relationships with other models
     */
    public function initialize()
    {
        $this->belongsTo('episodeId', 'Scoring', 'id');
    }

    public function beforeSave()
    {
        if (empty($this->createdAtUserId)) {
            $auth     = Session::get('auth');
            $datetime = date('Y-m-d H:i:s');

            $this->createdAt        = $datetime;
            $this->createdAtUserId  = (int) $auth['id'];
        }
    }

    /**
     * @param array $parameters
     *
     * @static
     * @return Phalcon_Model_Resultset Episodes[]
     */
    static public function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @param array $parameters
     *
     * @static
     * @return  Phalcon_Model_Base   Episodes
     */
    static public function findFirst($parameters = array())
    {
        return parent::findFirst($parameters);
    }
}