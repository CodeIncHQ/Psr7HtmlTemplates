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
// Time:     14:46
// Project:  Psr7HtmlTemplates
//
declare(strict_types=1);
namespace CodeInc\Psr7HtmlTemplates;
use CodeInc\Psr7Responses\HtmlResponse;
use Psr\Http\Message\ResponseInterface;


/**
 * Interface Psr7HtmlTemplateInterface
 *
 * @package CodeInc\Psr7HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
interface Psr7HtmlTemplateInterface
{
    /**
     * Returns the PSR-7 response for the template.
     *
     * @return ResponseInterface|HtmlResponse
     */
    public function buildResponse():ResponseInterface;

    /**
     * Returns the HTML code of the response.
     *
     * @return string
     */
    public function getResponseHtml():string;
}