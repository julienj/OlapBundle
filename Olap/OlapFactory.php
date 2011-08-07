<?php

/*
* This file is part of olapBundle.
*
* (c) Julien Jacottet <jjacottet@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Julienj\olapBundle\Olap;

use Julienj\olapBundle\Olap\OlapDatasourceInterface;

/**
*	OlapFactory
*
*  	@author Julien Jacottet <jjacottet@gmail.com>
*/
class OlapFactory{


    /**
      * Constructor
      *
      * @param String $ataptatorClass Adaptator class Name
      * @param String $connectionClass Connection class name
      *
      */
	public function __construct($ataptatorClass, $connectionClass)
	{
		$this->adaptatorClass = $ataptatorClass;
		$this->connectionClass = $connectionClass;
	}

    /**
      * get Connection name
      *
      * @param OlapDatasourceInterface $datasource datasource object
 	  *
      * @return Object Connection Object
      *
      */
	public function getConnection(OlapDatasourceInterface $datasource){
		
		$adaptator = new $this->adaptatorClass($datasource->getUrl(),$datasource->getUser(),$datasource->getPassword());
		
		return $connection = new $this->connectionClass($adaptator, array(
		    'DataSourceInfo' => $datasource->getDataSourceInfo(),
		    'CatalogName' => $datasource->getCatalogName(),
		    'SchemaName' => $datasource->getSchemaName()
		));
	}
}