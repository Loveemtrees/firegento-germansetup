<?php
/**
 * This file is part of the FIREGENTO project.
 *
 * FireGento_GermanSetup is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  FireGento
 * @package   FireGento_GermanSetup
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2011 FireGento Team (http://www.firegento.de). All rights served.
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @version   $Id:$
 * @since     0.1.0
 */
/**
 * Setup script; Creates all initial pages, blocks and emails
 *
 * @category  FireGento
 * @package   FireGento_GermanSetup
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2011 FireGento Team (http://www.firegento.de). All rights served.
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @version   $Id:$
 * @since     0.1.0
 */

/* @var $installer Mage_Eav_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();

// execute pages
foreach ($this->getConfigPages() as $name => $data) {
    if ($data['execute'] == 1) {
        $this->createCmsPage($data, false);
    }
}

// execute blocks
foreach ($this->getConfigBlocks() as $name => $data) {
    if ($data['execute'] == 1) {
        if ($name == 'gs_footerlinks') {
            $this->updateFooterLinksBlock($data);
        } else {
            $this->createCmsBlock($data, false);
        }
    }
}

// execute emails
foreach ($this->getConfigEmails() as $name => $data) {
    if ($data['execute'] == 1) {
        $this->createEmail($data, false);
    }
}

$installer->endSetup();
