<?php

class MySearch
{
    protected $page;

    public function getPage($searchQuery)
    {
        $headers = [
            'authority:www.google.com.ua',
//'method:POST',
            'path:/gen_204?atyp=i&ct=slh&cad=&ei=YI1_Wf75KMShUcCPmtgB&s=2&v=2&pv=0.18980989703025086&me=12:1501531489424,V,0,0,0,0:51,U,51:0,V,0,0,1366,163:5743,e,H&zx=1501531495218',
            'scheme:https',
            'accept:*/*',
            'accept-language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
            'cache-control:max-age=0',
            'content-length:0',
            'content-type:text/html;charset=UTF-8',
            'cookie:XDEBUG_SESSION=PHPSTORM; NID=108=s-tO0gCk1SxV8ZyBJVxwpGAiM0BQq2OYXX9XAxcCl46CrttFteJXwVCZzqwZDduk2gTeUGjPUWp26bKCrsiVTSBQh5GXrGlJ9_9SsH5Gplqd9BqOR6hS3B3L2vP3jDHdmYAeLwTy4pGlk_i_Hmqzod8bXDTYmAk1zcbDuhk3PZ__EXSIPz37gGmKpcB64zM8EKzmMJYb6EHLeCDZhakJ1G7mAAyatYAcic4IVmM; DV=U0l6_aZ4IlMt4Ga-ULf03c-TNASk2VW48WNVQ7njPqIwAQA; UULE=a+cm9sZToxIHByb2R1Y2VyOjEyIHByb3ZlbmFuY2U6NiB0aW1lc3RhbXA6MTUwMTUzMTQ4ODUyNzAwMCBsYXRsbmd7bGF0aXR1ZGVfZTc6NDY5NjYzODM1IGxvbmdpdHVkZV9lNzozMjAyMTQyOTl9IHJhZGl1czozMDM4MA==',
            'origin:https://www.google.com.ua',
            'referer:https://www.google.com.ua/',
            'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36',
            'x-chrome-uma-enabled:1',
            'x-client-data:CI+2yQEIorbJAQjEtskBCPqcygEIqZ3KAQ=='
        ];
        $initAddress = 'https://www.google.com.ua/'.$searchQuery;

        $ch = curl_init($initAddress);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        $page = curl_exec($ch);
        $this->page=$page;
        if($page !== false)
        {
            return true;
        }else
        {
            return ['error'=>0];
        }
    }

    public function processingWithPost()
    {
        $searchQuery = str_replace(" ",'+',$_POST['searchQuery']);
        $searchStr = 'search?q='.$searchQuery;
        unset($_POST['searchQuery']);

        return $searchStr;
    }

    public function parsePage()
    {
     $searchPage = new DOMDocument();
        @$searchPage->loadHTML($this->page);
        $finder = new DomXPath($searchPage);
        $className="rc";
        $nodes = $finder->query("//*[contains(@class, '$className')]");

        $dataArr = [];
        $f=0;
        foreach( $nodes as $obj ) {
            $dataArr[$f]=['name'=>$obj->firstChild->firstChild->nodeValue,
                'link'=>$obj->firstChild->firstChild->getAttribute('href'),
                'shortText'=>$obj->getElementsByTagName('span')->item(1)->nodeValue];
            $f++;
        }
        return $dataArr;
    }
}