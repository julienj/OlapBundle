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

/**
*	OlapDatasourceInterface interface
*
*  	@author Julien Jacottet <jjacottet@gmail.com>
*/
interface OlapDatasourceInterface
{

    /**
     * Get soap url
     *
     * @return String url
     *
     */
    public function getUrl();
    
    /**
     * Get Soap User
     *
     * @return String user
     *
     */
    public function getUser();

    /**
     * Get soap password
     *
     * @return String password
     *
     */
    public function getPassword();

    /**
     * Get DataSourceInfo
     *
     * @return String DataSourceInfo
     *
     */    
    public function getDataSourceInfo();

    /**
     * Get Catalog Name
     *
     * @return String Catalog name
     *
     */
    public function getCatalogName();

    /**
     * Get Schema Name
     *
     * @return String Schema Name
     *
     */
    public function getSchemaName();

}
