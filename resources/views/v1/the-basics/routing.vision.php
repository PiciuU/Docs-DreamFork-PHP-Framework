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
                        <h1>Routing</h1>
                        <ul>
                            <li>
                                <a href="#basic-routing">Basic Routing</a>
                                <ul>
                                    <li>
                                        <a href="#the-default-interfaces">The Default Interfaces</a>
                                    </li>
                                    <li>
                                        <a href="#the-custom-interfaces">The Custom Interfaces</a>
                                    </li>
                                    <li>
                                        <a href="#available-router-methods">Available Router Methods</a>
                                    </li>
                                    <li>
                                        <a href="#using-controllers-in-routing">Using Controllers In Routing</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#route-parameters">Route Parameters</a>
                                <ul>
                                    <li>
                                        <a href="#required-parameters">Required Parameters</a>
                                    </li>
                                    <li>
                                        <a href="#global-parameters">Global Parameters</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#route-groups">Route Groups</a>
                                <ul>
                                    <li>
                                        <a href="#route-group">Group</a>
                                    </li>
                                    <li>
                                        <a href="#route-guard">Guard</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#fallback-routes">Fallback Routes</a>
                            </li>
                            <li>
                                <a href="#cors">Cross-Origin Resource Sharing (CORS)</a>
                            </li>
                        </ul>
                        <h2 id="basic-routing">
                            <a href="#basic-routing">Basic Routing</a>
                        </h2>
                        <p>
                            The fundamental concept of basic routing in Dreamfork involves specifying a URI along with a closure, offering a straightforward and expressive approach to defining routes and their behavior. This method simplifies the process, eliminating the need for complex routing configuration files:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Route;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::get('/welcome', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return 'Welcome!';</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="the-default-interfaces">
                            <a href="#the-default-interfaces">The Default Interfaces</a>
                        </h3>
                        <p>
                            All routes in Dreamfork are defined in files located within the <code>routes</code> folder. By default, these files are automatically loaded by the <code>App\Providers\RouteServiceProvider</code>. This provider encompasses the definition of all route interfaces, allowing for customization of their settings. For instance, it is possible to disconnect a specific interface, modify its prefix, or add request/response headers directly in this provider.
                        </p>
                        <p>
                            For example, if you intend for your application to solely function as a backend API, you can disable the <code>web</code> interface in <code>App\Providers\RouteServiceProvider</code> by setting enabled to false. Within the <code>routes</code> folder, each interface has its own file. The default files are <code>routes/web.php</code> and <code>routes/api.php</code> Routes defined in <code>routes/web.php</code> are treated as HTTP routes by default and have no prefix. This means that you can access the following route by navigating to <code>http://example.com/user</code> in your browser:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// routes/web.php</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Route;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::get('/user', [UserController::class, 'index']);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Routes specified in the <code>routes/api.php</code> file are encapsulated within a route group by the <code>App\Providers\RouteServiceProvider</code>. This grouping automatically applies the <code>/api</code> URI prefix to all routes within the file, eliminating the need for manual application to each route. To customize the prefix and other options for the route group, adjustments can be made within your <code>RouteServiceProvider</code> class.
                        </p>
                        <h3 id="the-custom-interfaces">
                            <a href="#the-custom-interfaces">The Custom Interfaces</a>
                        </h3>
                        <p>
                            In Dreamfork, creating custom interfaces is a straightforward process. To achieve this, you need to define your interface in the <code>RouteServiceProvider</code>:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// RouteServiceProvider</span>
                                    </div>
                                    <div class="line">
                                        <span>private $availableInterfaces = [</span>
                                    </div>
                                    <div class="line">
                                        <span class="indent"></span>
                                        <span>...</span>
                                    </div>
                                    <div class="line">
                                        <span class="indent"></span>
                                        <span>'rss' => [</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'enabled' => true,</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'prefix' => '/rss',</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'request-headers' => [],</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>'response-headers' => []</span>
                                    </div>
                                    <div class="line">
                                        <span class="indent"></span>
                                        <span>]</span>
                                    </div>
                                    <div class="line">
                                        <span>];</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Afterward, you should create a file with the name of your interface in the <code>routes</code> folder. In this example, the file is named <code>rss.php</code> In this file, you can define the routes that should be accessible for this interface:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// routes/rss.php</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Route;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::get('/feed', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return 'RSS feed';</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="available-router-methods">
                            <a href="#available-router-methods">Available Router Methods</a>
                        </h3>
                        <p>
                            The router provides the ability to register routes that respond to various HTTP verbs. You can use the following methods to register routes for specific HTTP verbs:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get($uri, $callback);</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::post($uri, $callback);</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::put($uri, $callback);</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::patch($uri, $callback);</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::delete($uri, $callback);</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::options($uri, $callback);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In certain cases, you may need to register a route that responds to all HTTP verbs. The <code>any</code> method allows you to achieve this by registering a route that responds to any HTTP verb:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::any('/welcome', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return 'Welcome!';</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                When using the same URI for multiple routes, prioritize the order of declaration. Place routes using <code>get</code>, <code>post</code>, <code>put</code>, <code>patch</code>, <code>delete</code>, and <code>options</code> methods before those using the <code>any</code> method. This ensures proper matching of incoming requests with the intended route.
                            </p>
                        </blockquote>
                        <h3 id="using-controllers-in-routing">
                            <a href="#using-controllers-in-routing">Using Controllers In Routing</a>
                        </h3>
                        <p>
                            In addition to using closures as callbacks, you can streamline your routes by passing <code>controllers</code> and their associated methods. Instead of providing a callback, you can specify the exact controller and method to be invoked. Routes automatically map controllers from the <code>App\Controllers</code> folder, eliminating the need to explicitly define them in the routes file.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// routes/web.php</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Route;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::get('/user', [UserController::class, 'index']);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In this case, the <code>UserController</code> controller's <code>index</code> method will be called when the specified route is accessed.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                Due to automatic mapping, controllers passed in routes must reside in the <code>App\Controllers</code> folder. Ensure that the controllers are properly located in this directory to avoid routing issues.
                            </p>
                        </blockquote>
                        <h2 id="route-parameters">
                            <a href="#route-parameters">Route Parameters</a>
                        </h2>
                        <h3 id="required-parameters">
                            <a href="#required-parameters">Required Parameters</a>
                        </h3>
                        <p>
                            To capture segments of the URI in your route, use route parameters. For instance, if you need to extract a user's ID from the URL, define a route parameter like this:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/user/{id}', function (string $id) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return 'User '.$id;</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can define multiple route parameters as needed:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/user/{id}/history/{historyId}', function (string $id, string $historyId) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Route parameters are enclosed in curly braces <code>{}</code>, and they should consist of alphanumeric characters. Underscores (<code>_</code>) are also allowed in parameter names. Parameters are injected into route callbacks/controllers based on their order; the names of the callback/controller arguments do not impact the injection process.
                        </p>
                        <h3 id="global-parameters">
                            <a href="#global-parameters">Global Parameters</a>
                        </h3>
                        <p>
                            In every route, two parameters, namely <code>$request</code> and <code>$routes</code>, are automatically injected. These parameters, of types <code>Framework\Http\Request</code> and <code>Framework\Http\Routing\RouteCollection</code>, provide access to essential information regardless of the specific parameters defined for a given route.
                        </p>
                        <p>
                            You can always access these global parameters, even if no additional parameters for them are specified for a particular route:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/user/{uid}', function ($request, $routes, $uid) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// Access $request and $routes here</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The <code>$request</code> parameter allows you to retrieve information about the incoming HTTP request, while <code>$routes</code> provides access to the collection of defined routes in your application. These global parameters are injected automatically and can be utilized as needed in your route callbacks or controllers.
                        </p>
                        <p>
                            It's important to note that global parameters are automatically injected into the first available position among the function arguments. This means that if you define a route parameter to capture a segment but use a different name in the function than the one assigned to the parameter, the argument in the function will be mapped to the first one available global parameter.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/user/{id}', function ($uid) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// $uid is mapped to $request, not to the 'id' parameter defined in the route</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In this scenario, <code>$uid</code> will be mapped to the <code>$request</code> global parameter, not to the <code>id</code> parameter defined in the route. Always consider the automatic injection order when working with global route parameters.
                        </p>
                        <h2 id="route-groups">
                            <a href="#route-groups">Route Groups</a>
                        </h2>
                        <p>
                            Route groups provide a convenient way to share route attributes, such as a prefix or authentication requirements, among a multitude of routes. This eliminates the need to specify these attributes individually for each route, promoting cleaner and more efficient route organization.
                        </p>
                        <h3 id="route-group">
                            <a href="#route-group">Group</a>
                        </h3>
                        <p>
                            To include routes within a group, you can use the <code>group</code> method. The first argument to this method is the group's prefix, and the second argument is a callback function containing the routes. For example:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::group('/auth', function () {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>Route::post('/register', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>});</span>
                                    </div>
                                    <div class="line indent">
                                        <span>Route::post('/login', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>});</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In this way, routes within the group will be generated with the path prefix <code>/auth</code>, resulting in paths like <code>/auth/register</code>.
                        </p>
                        <h3 id="route-guard">
                            <a href="#route-guard">Guard</a>
                        </h3>
                        <p>
                            To place routes within a middleware guard, ensuring that specific paths are accessible only after successful authentication, use the <code>guard</code> method. Provide a callback function as an argument, containing the desired routes. The guard verifies the authenticity of the request by passing it through an authentication service that utilizes <a href="/docs/1.x/tokenization">tokenization</a>:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::guard(function () {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>Route::get('/user', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>});</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            In this case, the routes within the guard will be protected, and access will be granted only to authenticated users. The authentication process involves tokenization, ensuring secure validation of the incoming requests.
                        </p>
                        <h2 id="fallback-routes">
                            <a href="#fallback-routes">Fallback Routes</a>
                        </h2>
                        <p>
                            Using the <code>Route::fallback</code> method, you can designate a route to execute when no other route matches the incoming request.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::fallback(function () {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return "Route does not exist";</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                It's important to note that the fallback route should always be the last route registered by your application.
                            </p>
                        </blockquote>
                        <h2 id="cors">
                            <a href="#cors">Cross-Origin Resource Sharing (CORS)</a>
                        </h2>
                        <p>
                            Dreamfork can automatically respond to CORS <code>OPTIONS</code> HTTP requests with default configured values. The <code>OPTIONS</code> requests are handled seamlessly by the <code>HandleCors</code> middleware.
                        </p>
                        <p>
                            If you need to modify the CORS configuration to suit your specific requirements, you can do so in the <code>config/cors.php</code> file. This configuration file contains detailed descriptions of all available options, allowing you to customize the CORS settings according to your needs.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                For more information about CORS, please check the <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS#the_http_response_headers" target="_blank">MDN web documentation on CORS</a>.
                            </p>
                        </blockquote>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
