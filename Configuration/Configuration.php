<?php

/*
 * This file is part of the Prince package.
 *
 * (c) Bertrand Zuchuat <bertrand.zuchuat@gmail.com>
 * (c) Jérémy Leherpeur <jeremy@leherpeur.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Amenophis\Prince\Configuration;

/**
 * @author Bertrand Zuchuat <bertrand.zuchuat@gmail.com>
 * @author Jérémy Leherpeur <jeremy@leherpeur.net>
 */
class Configuration
{
    /**
     * -h, --help
     * Display usage and options.
     */
    protected $help;

    /**
     * --version
     * Display version information.
     */
    protected $version;

    /**
     * -v, --verbose
     * Log informative messages.
     */
    protected $verbose;

    /**
     * --log=FILE
     * Log error messages to a file.
     */
    protected $log;

    /**
     * -i, --input=FORMAT
     * Set input format [auto | xml | html | html5].
     */
    protected $input;

    /**
     * -l, --input-list=FILE
     * Read input file list from specified file.
     */
    protected $inputList;

    /**
     * --baseurl=URL
     * Specify the base URL of the input document.
     */
    protected $baseurl;

    /**
     * --fileroot=DIR
     * Specify the root directory for absolute filenames.
     */
    protected $fileroot;

    /**
     * --no-xinclude
     * Disable XInclude processing.
     */
    protected $noXinclude;

    /**
     * --no-network
     * Disable network access (prevents HTTP downloads).
     */
    protected $noNetwork;

    /**
     * --http-user=USER
     * Specify the username for HTTP authentication.
     */
    protected $httpUser;

    /**
     * --http-password=PASS
     * Specify the password for HTTP authentication.
     */
    protected $httpPassword;

    /**
     * --http-proxy=PROXY
     * Specify the HTTP proxy server.
     */
    protected $httpProxy;

    /**
     * --http-timeout=SEC
     * Specify the HTTP timeout in seconds.
     */
    protected $httpTimeout;

    /**
     * --cookiejar=FILE
     * Specify a file containing HTTP cookies.
     */
    protected $cookiejar;

    /**
     * --ssl-cacert=FILE
     * Specify an SSL certificate file.
     */
    protected $sslCacert;

    /**
     * --ssl-capath=PATH
     * Specify an SSL certificate directory.
     */
    protected $sslCapath;

    /**
     * --insecure
     * Disable SSL verification (not recommended).
     */
    protected $insecure;

    /**
     * --javascript
     * Enable JavaScript in HTML documents.
     */
    protected $javascript;

    /**
     * --script=FILE
     * Run an external script.
     */
    protected $script;

    /**
     * -s, --style=FILE
     * Apply a CSS file.
     */
    protected $style;

    /**
     * --media=MEDIA
     * Specify the media type (eg. print, screen).
     */
    protected $media;

    /**
     * --no-author-style
     * Ignore author style sheets.
     */
    protected $noAuthorStyle;

    /**
     * --no-default-style
     * Ignore default style sheets.
     */
    protected $noDefaultStyle;

    /**
     * -o, --output=FILE.PDF
     * Specify the output PDF file.
     */
    protected $output;

    /**
     * --profile=PROFILE
     * Specify the PDF profile to use.
     */
    protected $profile;

    /**
     * --attach=FILE
     * Attach a file to the PDF.
     */
    protected $attach;

    /**
     * --no-embed-fonts
     * Disable font embedding in PDF output.
     */
    protected $noEmbedFonts;

    /**
     * --no-subset-fonts
     * Disable font subsetting in PDF output.
     */
    protected $noSubsetFonts;

    /**
     * --no-compress
     * Disable compression of PDF output.
     */
    protected $noCompress;

    /**
     * --pdf-title=TITLE
     * Set PDF document title.
     */
    protected $pdfTitle;

    /**
     * --pdf-subject=SUBJECT
     * Set PDF document subject.
     */
    protected $pdfSubject;

    /**
     * --pdf-author=AUTHOR
     * Set PDF document author.
     */
    protected $pdfAuthor;

    /**
     * --pdf-keywords=KEYWORDS
     * Set PDF document keywords.
     */
    protected $pdfKeywords;

    /**
     * --pdf-creator=CREATOR
     * Set PDF document creator.
     */
    protected $pdfCreator;

    /**
     * --encrypt
     * Encrypt PDF output.
     */
    protected $encrypt;

    /**
     * --key-bits=NUM
     * Set encryption key size [40 | 128].
     */
    protected $keyBits;

    /**
     * --user-password=PASS
     * Set PDF user password.
     */
    protected $userPassword;

    /**
     * --owner-password=PASS
     * Set PDF owner password.
     */
    protected $ownerPassword;

    /**
     * --disallow-print
     * Disallow printing of PDF output.
     */
    protected $disallowPrint;

    /**
     * --disallow-copy
     * Disallow copying from PDF output.
     */
    protected $disallowCopy;

    /**
     * --disallow-annotate
     * Disallow annotation of PDF output.
     */
    protected $disallowAnnotate;

    /**
     * --disallow-modify
     * Disallow modification of PDF output.
     */
    protected $disallowModify;

    /**
     * --scanfonts FILES...
     * Scan font files and create a CSS file.
     */
    protected $scanfonts;

    /**
     * @param $attach
     * @return $this
     * @throws \Exception
     */
    public function setAttach($attach)
    {
        if(!is_readable($attach))
        {
            throw new \Exception(sprintf('The attach path "%s" does not exist', $attach));
        }

        $this->attach = $attach;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * @param $baseurl
     * @return $this
     * @throws \Exception
     */
    public function setBaseurl($baseurl)
    {
        if(!is_readable($baseurl))
        {
            throw new \Exception(sprintf('The baseurl path "%s" does not exist', $baseurl));
        }

        $this->baseurl = $baseurl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBaseurl()
    {
        return $this->baseurl;
    }

    /**
     * @param $cookiejar
     * @return $this
     * @throws \Exception
     */
    public function setCookiejar($cookiejar)
    {
        if(!is_readable($cookiejar))
        {
            throw new \Exception(sprintf('The cookiejar path "%s" does not exist', $cookiejar));
        }

        $this->cookiejar = $cookiejar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCookiejar()
    {
        return $this->cookiejar;
    }

    /**
     * @param $disallowAnnotate
     * @return $this
     * @throws \Exception
     */
    public function setDisallowAnnotate($disallowAnnotate)
    {
        if (!is_bool($disallowAnnotate)) {
            throw new \Exception('The disallowAnnotate option need to be a boolean');
        }

        $this->disallowAnnotate = $disallowAnnotate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisallowAnnotate()
    {
        return $this->disallowAnnotate;
    }

    /**
     * @param $disallowCopy
     * @return $this
     * @throws \Exception
     */
    public function setDisallowCopy($disallowCopy)
    {
        if (!is_bool($disallowCopy)) {
            throw new \Exception('The disallowCopy option need to be a boolean');
        }

        $this->disallowCopy = $disallowCopy;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisallowCopy()
    {
        return $this->disallowCopy;
    }

    /**
     * @param $disallowModify
     * @return $this
     * @throws \Exception
     */
    public function setDisallowModify($disallowModify)
    {
        if (!is_bool($disallowModify)) {
            throw new \Exception('The disallowModify option need to be a boolean');
        }

        $this->disallowModify = $disallowModify;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisallowModify()
    {
        return $this->disallowModify;
    }

    /**
     * @param $disallowPrint
     * @return $this
     * @throws \Exception
     */
    public function setDisallowPrint($disallowPrint)
    {
        if (!is_bool($disallowPrint)) {
            throw new \Exception('The disallowPrint option need to be a boolean');
        }

        $this->disallowPrint = $disallowPrint;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisallowPrint()
    {
        return $this->disallowPrint;
    }

    /**
     * @param $encrypt
     * @return $this
     * @throws \Exception
     */
    public function setEncrypt($encrypt)
    {
        if (!is_bool($encrypt)) {
            throw new \Exception('The encrypt option need to be a boolean');
        }

        $this->encrypt = $encrypt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEncrypt()
    {
        return $this->encrypt;
    }

    /**
     * @param $fileroot
     * @return $this
     * @throws \Exception
     */
    public function setFileroot($fileroot)
    {
        if(!is_dir($fileroot))
        {
            throw new \Exception(sprintf('The fileroot dir "%s" does not exist', $fileroot));
        }

        $this->fileroot = $fileroot;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileroot()
    {
        return $this->fileroot;
    }

    /**
     * @param $help
     * @return $this
     * @throws \Exception
     */
    public function setHelp($help)
    {
        if (!is_bool($help)) {
            throw new \Exception('The help option need to be a boolean');
        }

        $this->help = $help;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * @param $httpPassword
     * @return $this
     */
    public function setHttpPassword($httpPassword)
    {
        $this->httpPassword = $httpPassword;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHttpPassword()
    {
        return $this->httpPassword;
    }

    /**
     * @param $httpProxy
     * @return $this
     */
    public function setHttpProxy($httpProxy)
    {
        $this->httpProxy = $httpProxy;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHttpProxy()
    {
        return $this->httpProxy;
    }

    /**
     * @param $httpTimeout
     * @return $this
     */
    public function setHttpTimeout($httpTimeout)
    {
        $this->httpTimeout = $httpTimeout;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHttpTimeout()
    {
        return $this->httpTimeout;
    }

    /**
     * @param $httpUser
     * @return $this
     */
    public function setHttpUser($httpUser)
    {
        $this->httpUser = $httpUser;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHttpUser()
    {
        return $this->httpUser;
    }

    /**
     * @param $input
     * @return $this
     */
    public function setInput($input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param $inputList
     * @return $this
     * @throws \Exception
     */
    public function setInputList($inputList)
    {
        if(!is_readable($inputList))
        {
            throw new \Exception(sprintf('The inputList path "%s" does not exist', $inputList));
        }

        $this->inputList = $inputList;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInputList()
    {
        return $this->inputList;
    }

    /**
     * @param $insecure
     * @return $this
     * @throws \Exception
     */
    public function setInsecure($insecure)
    {
        if (!is_bool($insecure)) {
            throw new \Exception('The insecure option need to be a boolean');
        }

        $this->insecure = $insecure;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsecure()
    {
        return $this->insecure;
    }

    /**
     * @param $javascript
     * @return $this
     * @throws \Exception
     */
    public function setJavascript($javascript)
    {
        if (!is_bool($javascript)) {
            throw new \Exception('The javascript option need to be a boolean');
        }

        $this->javascript = $javascript;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getJavascript()
    {
        return $this->javascript;
    }

    /**
     * @param $keyBits
     * @return $this
     * @throws \Exception
     */
    public function setKeyBits($keyBits)
    {
        if (!in_array($keyBits, array(40, 128))) {
            throw new \Exception(sprintf('The keyBits "%s" is invalid. Allowed values are 40 and 128', $keyBits));
        }

        $this->keyBits = $keyBits;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKeyBits()
    {
        return $this->keyBits;
    }

    /**
     * @param $log
     * @return $this
     * @throws \Exception
     */
    public function setLog($log)
    {
        

        $this->log = $log;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @param $media
     * @return $this
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param $noAuthorStyle
     * @return $this
     * @throws \Exception
     */
    public function setNoAuthorStyle($noAuthorStyle)
    {
        if (!is_bool($noAuthorStyle)) {
            throw new \Exception('The noAuthorStyle option need to be a boolean');
        }

        $this->noAuthorStyle = $noAuthorStyle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoAuthorStyle()
    {
        return $this->noAuthorStyle;
    }

    /**
     * @param $noCompress
     * @return $this
     * @throws \Exception
     */
    public function setNoCompress($noCompress)
    {
        if (!is_bool($noCompress)) {
            throw new \Exception('The noCompress option need to be a boolean');
        }

        $this->noCompress = $noCompress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoCompress()
    {
        return $this->noCompress;
    }

    /**
     * @param $noDefaultStyle
     * @return $this
     * @throws \Exception
     */
    public function setNoDefaultStyle($noDefaultStyle)
    {
        if (!is_bool($noDefaultStyle)) {
            throw new \Exception('The noDefaultStyle option need to be a boolean');
        }

        $this->noDefaultStyle = $noDefaultStyle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoDefaultStyle()
    {
        return $this->noDefaultStyle;
    }

    /**
     * @param $noEmbedFonts
     * @return $this
     * @throws \Exception
     */
    public function setNoEmbedFonts($noEmbedFonts)
    {
        if (!is_bool($noEmbedFonts)) {
            throw new \Exception('The noEmbedFonts option need to be a boolean');
        }

        $this->noEmbedFonts = $noEmbedFonts;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoEmbedFonts()
    {
        return $this->noEmbedFonts;
    }

    /**
     * @param $noNetwork
     * @return $this
     * @throws \Exception
     */
    public function setNoNetwork($noNetwork)
    {
        if (!is_bool($noNetwork)) {
            throw new \Exception('The noNetwork option need to be a boolean');
        }

        $this->noNetwork = $noNetwork;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoNetwork()
    {
        return $this->noNetwork;
    }

    /**
     * @param $noSubsetFonts
     * @return $this
     * @throws \Exception
     */
    public function setNoSubsetFonts($noSubsetFonts)
    {
        if (!is_bool($noSubsetFonts)) {
            throw new \Exception('The noSubsetFonts option need to be a boolean');
        }

        $this->noSubsetFonts = $noSubsetFonts;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoSubsetFonts()
    {
        return $this->noSubsetFonts;
    }

    /**
     * @param $noXinclude
     * @return $this
     * @throws \Exception
     */
    public function setNoXinclude($noXinclude)
    {
        if (!is_bool($noXinclude)) {
            throw new \Exception('The noXinclude option need to be a boolean');
        }

        $this->noXinclude = $noXinclude;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoXinclude()
    {
        return $this->noXinclude;
    }

    /**
     * @param $output
     * @return $this
     * @throws \Exception
     */
    public function setOutput($output)
    {
        if(!is_writable($output))
        {
            throw new \Exception(sprintf('The output path "%s" is not writable', $output));
        }

        $this->output = $output;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param $ownerPassword
     * @return $this
     */
    public function setOwnerPassword($ownerPassword)
    {
        $this->ownerPassword = $ownerPassword;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerPassword()
    {
        return $this->ownerPassword;
    }

    /**
     * @param $pdfAuthor
     * @return $this
     */
    public function setPdfAuthor($pdfAuthor)
    {
        $this->pdfAuthor = $pdfAuthor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPdfAuthor()
    {
        return $this->pdfAuthor;
    }

    /**
     * @param $pdfCreator
     * @return $this
     */
    public function setPdfCreator($pdfCreator)
    {
        $this->pdfCreator = $pdfCreator;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPdfCreator()
    {
        return $this->pdfCreator;
    }

    /**
     * @param $pdfKeywords
     * @return $this
     */
    public function setPdfKeywords($pdfKeywords)
    {
        $this->pdfKeywords = $pdfKeywords;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPdfKeywords()
    {
        return $this->pdfKeywords;
    }

    /**
     * @param $pdfSubject
     * @return $this
     */
    public function setPdfSubject($pdfSubject)
    {
        $this->pdfSubject = $pdfSubject;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPdfSubject()
    {
        return $this->pdfSubject;
    }

    /**
     * @param $pdfTitle
     * @return $this
     */
    public function setPdfTitle($pdfTitle)
    {
        $this->pdfTitle = $pdfTitle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPdfTitle()
    {
        return $this->pdfTitle;
    }

    /**
     * @param $profile
     * @return $this
     * @throws \Exception
     */
    public function setProfile($profile)
    {
        if(!is_readable($profile))
        {
            throw new \Exception(sprintf('The profile path "%s" does not exist', $profile));
        }

        $this->profile = $profile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param $scanfonts
     * @return $this
     */
    public function setScanfonts($scanfonts)
    {
        $this->scanfonts = $scanfonts;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getScanfonts()
    {
        return $this->scanfonts;
    }

    /**
     * @param $script
     * @return $this
     * @throws \Exception
     */
    public function setScript($script)
    {
        if(!is_readable($script))
        {
            throw new \Exception(sprintf('The script path "%s" does not exist', $script));
        }

        $this->script = $script;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * @param $sslCacert
     * @return $this
     * @throws \Exception
     */
    public function setSslCacert($sslCacert)
    {
        if(!is_readable($sslCacert))
        {
            throw new \Exception(sprintf('The sslCacert path "%s" does not exist', $sslCacert));
        }

        $this->sslCacert = $sslCacert;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSslCacert()
    {
        return $this->sslCacert;
    }

    /**
     * @param $sslCapath
     * @return $this
     * @throws \Exception
     */
    public function setSslCapath($sslCapath)
    {
        if(!is_dir($sslCapath))
        {
            throw new \Exception(sprintf('The sslCapath dir "%s" does not exist', $sslCapath));
        }

        $this->sslCapath = $sslCapath;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSslCapath()
    {
        return $this->sslCapath;
    }

    /**
     * @param $style
     * @return $this
     * @throws \Exception
     */
    public function setStyle($style)
    {
        if(!is_readable($style))
        {
            throw new \Exception(sprintf('The style path "%s" does not exist', $style));
        }

        $this->style = $style;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param $userPassword
     * @return $this
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * @param $verbose
     * @return $this
     * @throws \Exception
     */
    public function setVerbose($verbose)
    {
        if (!is_bool($verbose)) {
            throw new \Exception('The verbose option need to be a boolean');
        }

        $this->verbose = $verbose;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerbose()
    {
        return $this->verbose;
    }

    /**
     * @param $version
     * @return $this
     * @throws \Exception
     */
    public function setVersion($version)
    {
        if (!is_bool($version)) {
            throw new \Exception('The version option need to be a boolean');
        }

        $this->version = $version;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param array $config
     */
    public function setConfig($config = array())
    {
        if ($config && is_array($config)) {
            foreach ($config as $key => $value) {
                $camelAttribute = preg_replace('/(?:^|_)(.?)/e',"strtoupper('$1')", $key);
                $method = sprintf("set%s", $camelAttribute);
                if (method_exists($this, $method)) {
                   call_user_func(array($this, $method), $value);
                }
            }
        }
    }

    public function all()
    {
        $reflect = new \ReflectionClass($this);
        $properties = $reflect->getProperties(\ReflectionProperty::IS_PROTECTED);
        $values = $reflect->getProperties();

        $parameters = array();

        foreach ($properties as $prop) {
            $prop->setAccessible(true);
            $propertyName = strtolower(preg_replace('/([^A-Z])([A-Z])/', "$1-$2", $prop->getName()));
            $parameters[$propertyName] = $prop->getValue($this);
        }

        return $parameters;
    }
}