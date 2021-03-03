<?php

$ghBaseUrl = "https://github.com/";
$ghRawUrl = "https://raw.githubusercontent.com/";
$ghApiBaseUrl = "https://api.github.com/repos/";
$ghOrganization = $_GET['orga'];
$ghRepository = $_GET['repo'];
$ghApiUrl = $ghApiBaseUrl . $ghOrganization . "/" . $ghRepository;
$ghRepoUrl = $ghBaseUrl . $ghOrganization . "/" . $ghRepository;

$ghResult = CallAPI("GET", $ghApiUrl);

$ghResultJson = json_decode($ghResult, true);

$ghRepoBase = $ghRawUrl . $ghOrganization . "/" . $ghRepository . "/" . $ghResultJson['default_branch'];

// Github values
$name = $ghResultJson['name'];
$full_name = $ghResultJson['full_name'];
$stars = $ghResultJson['stargazers_count'];
$created = $ghResultJson['created_at'];
$updated = $ghResultJson['updated_at'];
$homepage = $ghResultJson['homepage'];
$forks = $ghResultJson['forks_count'];
$issues = $ghResultJson['open_issues'];
$network = $ghResultJson['network_count'];
$subscribers = $ghResultJson['subscribers_count'];
$owner = $ghResultJson['owner']['login'];
$node_id = $ghResultJson['node_id'];
$default_branch = $ghResultJson['default_branch'];

// branches
// https://api.github.com/repos/laravel/framework/branches -> name
// https://api.github.com/repos/laravel/framework/branches/8.x

/*
created_at
updated_at
homepage
size
stargazers_count
watchers_count
language
forks_count
open_issues // open_issues_count
network_count
subscribers_count
license

? latest-release ?
? fix-time-issue ?
*/

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    // see https://docs.github.com/en/rest/overview/resources-in-the-rest-api#rate-limiting
    // see https://docs.github.com/en/rest/overview/resources-in-the-rest-api#basic-authentication
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "adrolli:ThisismyCode2018!");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, "OpenSEO/1.0");

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}