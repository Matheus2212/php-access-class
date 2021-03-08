<?php

class Access
{
    /** List of Browsers */
    public $browsers = array(
        '/msie/i'      => 'Internet Explorer',
        '/firefox/i'   => 'Firefox',
        '/safari/i'    => 'Safari',
        '/chrome/i'    => 'Chrome',
        '/edge/i'      => 'Edge',
        '/opera/i'     => 'Opera',
        '/netscape/i'  => 'Netscape',
        '/maxthon/i'   => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i'    => 'Handheld Browser'
    );

    /** List of OSs */
    public $OS = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );

    /** List of Crawlers */
    public $crawlers = array(
        '/google/i' => 'Google',
        '/msnbot/i' => 'MSN',
        '/Rambler/i' => 'Rambler',
        '/Yahoo/i' => 'Yahoo',
        '/AbachoBOT/i' => 'AbachoBOT',
        '/Accoona/i' => 'Accoona',
        '/AcoiRobot/i' => 'AcoiRobot',
        '/ASPSeek/i' => 'ASPSeek',
        '/CrocCrawler/i' => 'CrocCrawler',
        '/Dumbot/i' => 'Dumbot',
        '/FAST-WebCrawler/i' => 'FAST-WebCrawler',
        '/GeonaBot/i' => 'GeonaBot',
        '/Gigabot/i' => 'Gigabot',
        '/Lycos/i' => 'Lycos spider',
        '/MSRBOT/i' => 'MSRBOT',
        '/Scooter/i' => 'Altavista robot',
        '/Altavista/i' => 'AltaVista robot',
        '/IDBot/i' => 'ID-Search Bot',
        '/eStyle/i' => 'eStyle Bot',
        '/Scrubby/i' => 'Scrubby robot'
    );

    /** Info array */
    private $access = array();

    public function __construct()
    {
        $this->access['browser'] = $this->getBrowser();
        $this->access['browserVersion'] = $this->getBrowserVersion();
        $this->access['OS'] = $this->getOS();
        $this->access['robot'] = $this->getRobot();
        $this->access['referer'] = $_SERVER['HTTP_REFERER'];
        $this->access['time'] = time();
    }

    private function getBrowser()
    {
        foreach ($this->browsers as $regex => $name) {
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
                return $name;
            }
        }
        return "Unknown";
    }

    private function getBrowserVersion()
    {
        $data = explode("/", $_SERVER['HTTP_USER_AGENT']);
        return $data[count($data) - 1];
    }

    private function getOS()
    {
        foreach ($this->OS as $regex => $name) {
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
                return $name;
            }
        }
        return "Unknown";
    }

    private function getRobot()
    {
        foreach ($this->crawlers as $regex => $name) {
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
                return $name;
            }
        }
        return false;
    }

    public function getInfo()
    {
        return $this->access;
    }
}
