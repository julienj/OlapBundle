Getting Started With OlapBundle
==================================


## Installation

Add the following lines in your `deps` file:

```
[phpOlap]
    git=git://github.com/julienj/phpOlap.git

[OlapBundle]
    git=git://github.com/julienj/OlapBundle.git
    target=bundles/Julienj/OlapBundle

```

Run the vendors script to download the bundle and php Olap:

``` bash
$ php bin/vendors install
```

## Configure the Autoloader

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'Julienj' => __DIR__.'/../vendor/bundles',
    'phpOlap' => __DIR__.'/../vendor/phpOlap/src',
));
```

## Enable the bundle


``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Julienj\OlapBundle\OlapBundle(),
    );
}
```

##Create your Datasource Class

ORM exemple :

``` php
<?php

namespace Acme\YourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Julienj\olapBundle\Olap\OlapDatasourceInterface as OlapDatasourceInterface;

/**
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class OlapDatasource implements OlapDatasourceInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string $user
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string $dataSourceInfo
     *
     * @ORM\Column(name="dataSourceInfo", type="string", length=255)
     */
    private $dataSourceInfo;

    /**
     * @var string $catalogName
     *
     * @ORM\Column(name="catalogName", type="string", length=255)
     */
    private $catalogName;

    /**
     * @var string $schemaName
     *
     * @ORM\Column(name="schemaName", type="string", length=255)
     */
    private $schemaName;
```


## Use Olap connection

*** Action ***
``` php
    public function helloAction($name)
    {
        
        $datasource = $this->getDoctrine()
                ->getRepository('AcmeDemoBundle:OlapDatasource')
                ->find(1);
        
        $olap = $this->get('olap')->getConnection($datasource);
        $cube = $olap->findOneCube();
        
        return array('cube' => $cube);
    }
```

*** Template ***

``` html
<h1>{{ cube.getName() }}!</h1>

<ul>
	<li class="measure">
		Measures
		<ul>
			{% for measure in cube.getMeasures() %}
				<li>{{ measure.getCaption() }}</li>
			{% endfor %}
		</ul>
	</li>
</ul>
```
## phpOlap

[phpOlap](https://github.com/julienj/phpOlap/blob/master/README.md)


