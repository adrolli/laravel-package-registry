<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<?php

$ghBaseUrl = "https://github.com/";
$ghRawUrl = "https://raw.githubusercontent.com/";
$ghApiBaseUrl = "https://api.github.com/repos/";
$ghOrganization = $_GET['orga'];
$ghRepository = $_GET['repo'];
$ghApiUrl = $ghApiBaseUrl . $ghOrganization . "/" . $ghRepository;

$composerJsonDependencies = array("require", "require-dev", "replace", "provide", "conflict", "suggest");
$packageJsonDependencies = array("dependencies", "devDependencies", "peerDependencies");

$ghResult = CallAPI("GET", $ghApiUrl);

$ghResultJson = json_decode($ghResult, true);

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

// construct repo urls

// https://github.com/laravel/framework/blob/8.x/composer.json

$ghRepoBase = $ghRawUrl . $ghOrganization . "/" . $ghRepository . "/" . $ghResultJson['default_branch'];

// echo '<a href="' . $ghRepoBase . '/composer.json" target="_blank">composer.json</a>';
// echo '<a href="' . $ghRepoBase . '/package.json" target="_blank">package.json</a>';

$composerFile = @file_get_contents($ghRepoBase . '/composer.json');
$packageFile = @file_get_contents($ghRepoBase . '/package.json');

/* This can be much better with Laravel, skipping ...
if (false !== ($data = file_get_contents("http://www.google.com"))) {
  $error = error_get_last();
  echo "HTTP request failed. Error was: " . $error['message'];
} else {
  echo "Everything went better than expected";
}
*/

// echo $composerFile;

$composerFileJson = json_decode($composerFile, true);
$packageFileJson = json_decode($packageFile, true);

foreach ($composerJsonDependencies As $dependencyGroup) {
  
  if (!empty($composerFileJson[$dependencyGroup])) {
    // in_array("laravel/framework", $composerFileJson[$dependencyGroup]);
    // print_r($composerFileJson[$dependencyGroup]);

    $checkfor = 'illuminate/console';

    if (array_key_exists($checkfor, $composerFileJson[$dependencyGroup])) {
      echo "Laravel Version " . $composerFileJson[$dependencyGroup][$checkfor] . " found in " . $dependencyGroup . "<br>";
    
    
    } else {
      echo "NO Laravel found in " . $dependencyGroup . "<br>";
    }


  } else {
    echo $dependencyGroup . " is empty<br>";
  }
}

// echo in_array("laravel/framework", $composerFileJson);

// echo $composerFileJson['name'];
// print_r($composerFileJson['require']);

/*

https://raw.githubusercontent.com/laravel/framework/8.x/composer.json
https://raw.githubusercontent.com/laravel/framework/8.x/composer.json

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
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, "OpenSEO/1.0");

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
?>


<!-- This example requires Tailwind CSS v2.0+ -->
<div>
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>

              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>

              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Reports</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <!-- Heroicon name: outline/bell -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="ml-3 relative">
              <div>
                <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=G6cD9g1Jq9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
              </div>
              <!--
                Profile dropdown panel, show/hide based on dropdown state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reports</a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=G6cD9g1Jq9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
          </div>
          <button class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
        </div>
        <div class="mt-3 px-2 space-y-1">
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Profile</a>

          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>

          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        Dashboard
      </h1>
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

    <div>
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        <?php echo $full_name ?>
    </h3>
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">
            Github Stars
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
            <?php echo $stars ?>
            </dd>
        </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">
            Avg. Open Rate
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
            58.16%
            </dd>
        </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">
            Avg. Click Rate
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
            24.57%
            </dd>
        </div>
        </div>
    </dl>
    </div>

    <h2 class="mt-4 text-xl leading-6 font-medium text-gray-900">Composer <span><a href="<?php echo $ghRepoBase . '/composer.json' ?>">(JSON)</a></span></h2>

    <?php

    foreach ($composerJsonDependencies As $dependencyGroup) {
        if (!empty($composerFileJson[$dependencyGroup])) {


          echo '<h3 class="mt-2 text-lg leading-6 font-medium text-gray-900">' . $dependencyGroup . '</h3>

          <div class="mt-5 flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Package
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Version
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">';
                   
                    foreach($composerFileJson[$dependencyGroup] as $requirement => $version) {
                    
                      echo '<tr>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        ' . $requirement . '
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ' . $version . '
                      </td>
                    </tr>';
  
                  }
  
                  echo '                </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>';
  
        }
      }
      ?>

<h2 class="mt-4 text-xl leading-6 font-medium text-gray-900">NPM Packages <span><a href="<?php echo $ghRepoBase . '/package.json' ?>">(JSON)</a></span></h2>

<?php

foreach ($packageJsonDependencies As $dependencyGroup) {
    if (!empty($packageFileJson[$dependencyGroup])) {


      echo '<h3 class="mt-2 text-lg leading-6 font-medium text-gray-900">' . $dependencyGroup . '</h3>

      <div class="mt-5 flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Package
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Version
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">';
               
                foreach($packageFileJson[$dependencyGroup] as $requirement => $version) {
                
                  echo '<tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    ' . $requirement . '
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    ' . $version . '
                  </td>
                </tr>';

              }

              echo '                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>';

    }
  }
  ?>

    </div>
  </main>
</div>

</body>
</html>