<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @component(html-elements/head);
    </head>
    <body>
        <div id="app">
            <main>
                @component(v1/components/menu);
                <section>
                    <div class="container">
                        <h1>Helpers</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#available-methods">Available Methods</a>
                                <ul>
                                    <li>
                                        <a href="#arrays-and-objects-list">Array & Objects</a>
                                    </li>
                                    <li>
                                        <a href="#paths-method">Paths</a>
                                    </li>
                                    <li>
                                        <a href="#urls-method">URLs</a>
                                    </li>
                                    <li>
                                        <a href="#miscellaneous-method">Miscellaneous</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#other-utilities">Other Utilities</a>
                                <ul>
                                    <li>
                                        <a href="#dates">Dates</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            DreamFork incorporates a range of global "helper" PHP functions. While many of these functions serve internal purposes within the framework, you are welcome to leverage them in your own applications if you find them beneficial.
                        </p>
                        <h2 id="available-methods">
                            <a href="#available-methods">Available Methods</a>
                        </h2>
                        <p>
                            DreamFork incorporates a range of global "helper" PHP functions. While many of these functions serve internal purposes within the framework, you are welcome to leverage them in your own applications if you find them beneficial.
                        </p>
                        <h3 id="arrays-and-objects-list">
                            <a href="#arrays-and-object-list">Array & Objects</a>
                        </h3>
                        <p>
                            DreamFork utilizes the <code>Arr</code> class from Laravel for handling arrays. The documentation for this class is accessible at <a href="https://laravel.com/docs/10.x/helpers#arrays-and-objects-method-list">https://laravel.com/docs/10.x/helpers#arrays-and-objects-method-list</a>
                        </p>
                        <h3 id="paths-method-list">
                            <a href="#paths-method-list">Paths</a>
                        </h3>
                        <div class="list">
                            <p>
                                <a href="#method-app-path">app_path</a>
                                <a href="#method-base-path">base_path</a>
                                <a href="#method-config-path">config_path</a>
                                <a href="#method-database-path">database_path</a>
                                <a href="#method-public-path">public_path</a>
                                <a href="#method-resource-path">resource_path</a>
                                <a href="#method-storage-path">storage_path</a>
                            </p>
                        </div>
                        <h3 id="urls-method-list">
                            <a href="#urls-method-list">URLs</a>
                        </h3>
                        <div class="list">
                            <p>
                                <a href="#method-asset">asset</a>
                                <a href="#method-url">url</a>
                            </p>
                        </div>
                        <h3 id="miscellaneous-method-list">
                            <a href="#miscellaneous-method-list">Miscellaneous</a>
                        </h3>
                        <div class="list">
                            <p>
                                <a href="#method-app">app</a>
                                <a href="#method-absolute-path">absolute_path</a>
                                <a href="#method-class-basename">class_basename</a>
                                <a href="#method-collect">collect</a>
                                <a href="#method-config">config</a>
                                <a href="#method-e">e</a>
                                <a href="#method-env">env</a>
                                <a href="#method-kernel">kernel</a>
                                <a href="#method-load">load</a>
                                <a href="#method-logger">logger</a>
                                <a href="#method-request">request</a>
                                <a href="#method-response">response</a>
                                <a href="#method-router">router</a>
                                <a href="#method-throw-if">throw_if</a>
                                <a href="#method-validator">validator</a>
                                <a href="#method-view">view</a>
                            </p>
                        </div>
                        <h2 id="paths-method">
                            <a href="#paths-method">Paths</a>
                        </h2>
                        <h4 id="method-app-path">
                            <a href="#method-app-path">app_path()</a>
                        </h4>
                        <p>
                            The <code>app_path</code> function returns the fully qualified path to your application's <code>app</code> directory. You may also use the <code>app_path</code> function to generate a fully qualified path to a file relative to the application directory:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$path = app_path('Controllers/UserController.php');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-base-path">
                            <a href="#method-base-path">base_path()</a>
                        </h4>
                        <p>
                            The <code>base_path</code> returns the fully qualified path to your application's root directory. You may also use the <code>base_path</code> function to generate a fully qualified path to a given file relative to the project root directory.
                        </p>
                        <h4 id="method-config-path">
                            <a href="#method-config-path">config_path()</a>
                        </h4>
                        <p>
                            The <code>config_path</code> function returns the fully qualified path to your application's <code>config</code> directory. You may also use the <code>config_path</code> function to generate a fully qualified path to a given file within the application's configuration directory.
                        </p>
                        <h4 id="method-database-path">
                            <a href="#method-database-path">database_path()</a>
                        </h4>
                        <p>
                            The <code>database_path</code> function returns the fully qualified path to your application's <code>database</code> directory. You may also use the <code>database_path</code> function to generate a fully qualified path to a given file within the database directory.
                        </p>
                        <h4 id="method-public-path">
                            <a href="#method-public-path">public_path()</a>
                        </h4>
                        <p>
                            The <code>public_path</code> function returns the fully qualified path to your application's <code>public</code> directory. You may also use the <code>public_path</code> function to generate a fully qualified path to a given file within the public directory.
                        </p>
                        <h4 id="method-resource-path">
                            <a href="#method-resource-path">resource_path()</a>
                        </h4>
                        <p>
                            The <code>resource_path</code> function returns the fully qualified path to your application's <code>resource</code> directory. You may also use the <code>resource_path</code> function to generate a fully qualified path to a file relative to the application directory:
                        </p>
                        <h4 id="method-storage-path">
                            <a href="#method-storage-path">storage_path()</a>
                        </h4>
                        <p>
                            The <code>storage_path</code> function returns the fully qualified path to your application's <code>storage</code> directory. You may also use the <code>storage_path</code> function to generate a fully qualified path to a file relative to the application directory:
                        </p>
                        <h2 id="urls-method">
                            <a href="#urls-method">URLs</a>
                        </h2>
                        <h4 id="method-asset">
                            <a href="#method-asset">asset()</a>
                        </h4>
                        <p>
                            The <code>asset</code> function generates a URL for an asset using the current scheme of the request (HTTP or HTTPS):
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$url = asset('css/global.css'); // https://example.com/css/global.css</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-url">
                            <a href="#method-url">url()</a>
                        </h4>
                        <p>
                            The <code>url</code> function generates a fully qualified URL to the given path. If no path is provided, an <code>Framework\Services\URL\UrlGenerator</code> instance is returned.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$url = url('user/profile'); // https://example.com/user/profile</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="miscellaneous-method">
                            <a href="#miscellaneous-method">Miscellaneous</a>
                        </h2>
                        <h4 id="method-app">
                            <a href="#method-app">app()</a>
                        </h4>
                        <p>
                            The <code>app</code> function returns the <a href="/docs/1.x/container">service container</a> instance.
                        </p>
                        <h4 id="method-absolute-path">
                            <a href="#method-absolute-path">absolute_path()</a>
                        </h4>
                        <p>
                            The <code>absolute_path</code> function converts a given path to its absolute form:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>echo absolute_path(storage_path("public/someFile.png")); // /home/www/example/storage/public/someFile.png</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-class-basename">
                            <a href="#method-class-basename">class_basename()</a>
                        </h4>
                        <p>
                            The <code>class_basename</code> function returns the class "basename" of the given object or class name.
                        </p>
                        <h4 id="method-collect">
                            <a href="#method-collect">collect()</a>
                        </h4>
                        <p>
                            The <code>collect</code> function creates a <a href="/docs/1.x/collections">collection</a> instance from the given value.
                        </p>
                        <h4 id="method-config">
                            <a href="#method-config">config()</a>
                        </h4>
                        <p>
                            The <code>config</code> function gets the value of a <a href="/docs/1.x/configuration">configuration</a> variable. The configuration values may be accessed using "dot" syntax, which includes the name of the file and the option you wish to access. A default value may be specified and is returned if the configuration option does not exist:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$value = config('app.locale', 'en');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-e">
                            <a href="#method-e">e()</a>
                        </h4>
                        <p>
                            The <code>e</code> function returns encoded HTML special characters in a string.
                        </p>
                        <h4 id="method-env">
                            <a href="#method-env">env()</a>
                        </h4>
                        <p>
                            The <code>env</code> function retrieves the value of an <a href="/docs/1.x/configuration#environment-configuration">environment variable</a> or returns a default value:
                        </p>
                        <h4 id="method-kernel">
                            <a href="#method-kernel">kernel()</a>
                        </h4>
                        <p>
                            The <code>kernel</code> function returns the <code>Framework\Http\Kernel</code> instance.
                        </p>
                        <h4 id="method-load">
                            <a href="#method-load">load()</a>
                        </h4>
                        <p>
                            The <code>load</code> function loads a specified PHP file if it exists, otherwise throws exception.
                        </p>
                        <h4 id="method-logger">
                            <a href="#method-logger">logger()</a>
                        </h4>
                        <p>
                            The <code>logger</code> function returns the <code>App\Exceptions\Handler</code> instance.
                        </p>
                        <h4 id="method-request">
                            <a href="#method-request">request()</a>
                        </h4>
                        <p>
                            The <code>request</code> function returns the current <a href="/docs/1.x/requests">request</a> instance.
                        </p>
                        <h4 id="method-response">
                            <a href="#method-response">response()</a>
                        </h4>
                        <p>
                            The <code>response</code> function creates a <a href="/docs/1.x/responses">response</a> instance or obtains an instance of the response factory:
                        </p>
                        <h4 id="method-router">
                            <a href="#method-router">router()</a>
                        </h4>
                        <p>
                            The <code>router</code> function return the <code>Framework\Http\Router</code> instance.
                        </p>
                        <h4 id="method-throw-if">
                            <a href="#method-throw-if">throw_if()</a>
                        </h4>
                        <p>
                            The <code>throw_if</code> function throws the given exception if the given condition is true:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>throw_if($collection->isEmpty(), new Exception('Collection cannot be empty!'));</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="method-validator">
                            <a href="#method-validator">validator()</a>
                        </h4>
                        <p>
                            The <code>validator</code> function creates a new <a href="/docs/1.x/validation">validator</a> instance with the given arguments. You may use it as an alternative to the <code>Validator</code> facade.
                        </p>
                        <h4 id="method-view">
                            <a href="#method-view">view()</a>
                        </h4>
                        <p>
                            The <code>view</code> function retrieves a <a href="/docs/1.x/views">view</a> instance.
                        </p>
                        <h2 id="other-utilities">
                            <a href="#other-utilities">Other Utilities</a>
                        </h2>
                        <h3 id="dates">
                            <a href="#dates">Dates</a>
                        </h3>
                        <p>
                            Dreamfork includes <a href="https://carbon.nesbot.com/docs/">Carbon</a>, a robust library for date and time manipulation. You can instantiate a new Carbon instance using the <code>Carbon\Carbon</code> class. For a comprehensive understanding of <code>Carbon</code> and its functionalities, we recommend referring to the <a href="https://carbon.nesbot.com/docs/">official Carbon documentation</a>.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Carbon\Carbon;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$now = Carbon::now();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
