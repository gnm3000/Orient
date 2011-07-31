<?php

/*
 * This file is part of the Orient package.
 *
 * (c) Alessandro Nadalin <alessandro.nadalin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This class handles the SQL statement to remove an index from the DB.
 *
 * @package    Orient
 * @subpackage Query
 * @author     Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */

namespace Orient\Query\Command\Index;

use Orient\Query\Command\Index;
use Orient\Contract\Formatter\Query\Token as TokenFormatter;
use Orient\Formatter\Query\EmbeddedRid as EmbeddedRidFormatter;

class Remove extends Index
{
    const SCHEMA = "DELETE FROM index::Name :Where";

    public function __construct($indexName, $key, $rid = null, TokenFormatter $ridFormatter = null)
    {
        parent::__construct();

        $ridFormatter = $ridFormatter ?: new EmbeddedRidFormatter;
        $this->setToken('Name', $indexName);

        if (!is_null($key)) {
          $this->where("key = ?", $key);
        }

        if ($rid) {
            $method = $key ? 'andWhere' : 'where';
            $rid    = $ridFormatter::format(array($rid));
            $this->$method("rid = $rid");
        }
    }

    /**
     * Returns the formatters for this query's tokens.
     *
     * @return Array
     */
    protected function getTokenFormatters()
    {
        return array_merge(parent::getTokenFormatters(), array(
            'Name'  => "Orient\Formatter\Query\Regular",
        ));
    }
}
