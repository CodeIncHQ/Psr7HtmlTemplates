<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2018 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material is strictly forbidden unless prior    |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     20/02/2018
// Time:     15:21
// Project:  Psr7HtmlTemplates
//
declare(strict_types=1);
namespace CodeInc\Psr7HtmlTemplates;


/**
 * Class BlankPsr7HtmlTemplate
 *
 * @package CodeInc\Psr7HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class BlankPsr7HtmlTemplate extends AbstractPsr7HtmlTemplate
{
    /**
     * @inheritdoc
     * @return string
     */
	public function getHeader():string
	{
	    ob_start();
		?>
		<!DOCTYPE html>
		<html lang="<?=htmlspecialchars($this->getLanguage())?>">
			<head>
				<meta charset="<?=htmlspecialchars($this->getCharset())?>">
				<title><?=htmlspecialchars($this->getTitle())?></title>
				<?=$this->getHtmlHeadersAsString()?>
			</head>

			<body>
		<?
        return ob_get_clean();
	}

    /**
     * @inheritdoc
     * @return string
     */
	public function getFooter():string
	{
	    ob_start();
		?>
			</body>
		</html>
		<?
        return ob_get_clean();
	}
}