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
// Time:     15:30
// Project:  Psr7HtmlTemplates
//
declare(strict_types=1);
namespace CodeInc\Psr7HtmlTemplates;
use CodeInc\HtmlTemplates\HtmlHeadersTrait;
use CodeInc\Psr7Responses\HtmlResponse;
use Psr\Http\Message\ResponseInterface;


/**
 * Class AbstractPsr7HtmlTemplate
 *
 * @package CodeInc\Psr7HtmlTemplates
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
abstract class AbstractPsr7HtmlTemplate implements Psr7HtmlTemplateInterface
{
	use HtmlHeadersTrait;
	public const DEFAULT_CHARSET = "UTF-8";
	public const DEFAULT_LANGUAGE = "en-US";

	/**
	 * Page's charset
	 *
	 * @var string
	 */
	protected $charset;

	/**
	 * <html> tag language
	 *
	 * @var string
	 */
	protected $language;

	/**
	 * Page's title
	 *
	 * @var string|null
	 */
	protected $title;

    /**
     * Page's content
     *
     * @var string|null
     */
	protected $content;

    /**
     * SimplePsr7HtmlTemplate constructor.
     *
     * @param null|string $title
     * @param string $charset
     * @param string $language
     */
	public function __construct(?string $title = null, string $charset = self::DEFAULT_CHARSET,
        string $language = self::DEFAULT_LANGUAGE)
    {
        if ($title !== null) {
            $this->setTitle($title);
        }
        $this->charset = $charset;
        $this->language = $language;
    }

    /**
	 * Returns the HTML title
	 *
	 * @return null|string
	 */
	public function getTitle():?string
    {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title):void
    {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getCharset():string
    {
		return $this->charset;
	}

	/**
	 * @param string $htmlCharset
	 */
	public function setCharset(string $htmlCharset):void
    {
		$this->charset = $htmlCharset;
	}

	/**
	 * @return string
	 */
	public function getLanguage():string
    {
		return $this->language;
	}

	/**
	 * @param string $language
	 */
	public function setLanguage(string $language):void
    {
		$this->language = $language;
	}

    /**
     * Sets the template's content.
     *
     * @param string $content
     */
    public function setContent(string $content):void
    {
        $this->content = $content;
    }

    /**
     * Adds content to the template.
     *
     * @param string $content
     */
    public function addContent(string $content):void
    {
        $this->content .= $content;
    }

    /**
     * Returns the page's content
     *
     * @return string|null
     */
    public function getContent():?string
    {
        return $this->content;
    }

    /**
     * Returns the page's header.
     *
     * @return string
     */
	abstract protected function getHeader():string;

    /**
     * Returns the page's footer.
     *
     * @return string
     */
	abstract protected function getFooter():string;

    /**
     * @inheritdoc
     * @return HtmlResponse
     */
	public function buildResponse():ResponseInterface
    {
        return new HtmlResponse($this->getResponseHtml());
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function getResponseHtml():string
    {
        return $this->getHeader()
            .$this->getContent()
            .$this->getFooter();
    }
}