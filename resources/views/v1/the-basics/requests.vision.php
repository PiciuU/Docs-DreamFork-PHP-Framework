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
                        <h1>Requests</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#interacting-with-the-request">Interacting With The Request</a>
                                <ul>
                                    <li>
                                        <a href="#dependency-injection-route-parameters">Dependency Injection & Route Parameters</a>
                                    </li>
                                    <li>
                                        <a href="#request-path-and-method">Request Path, Host, & Method</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#input">Input</a>
                                <ul>
                                    <li>
                                        <a href="#retrieving-input">Retrieving Input</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork's <code>Framework\Http\Request</code> class offers an object-oriented approach to engage with the current HTTP request being processed by your application. It also allows you to retrieve input, cookies, and files submitted with the request.
                        </p>
                        <h2 id="interacting-with-the-request">
                            <a href="#interacting-with-the-request">Interacting With The Request</a>
                        </h2>
                        <p>
                            To obtain the current request instance within a controller, you can use type-hinting for the <code>Framework\Http\Request</code> class on your route closure or controller method. As mentioned in the <a href="/docs/1.x/routing#global-parameters">Routing</a> section, the framework automatically passes the global parameter <code>$request</code>, providing convenient access to the request instance.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>namespace App\Controllers;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Http\Request;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class UserController extends Controller</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>public function store(Request $request)</span>
                                    </div>
                                    <div class="line indent">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>return $request->input('name');</span>
                                    </div>
                                    <div class="line indent">
                                        <span>}</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="dependency-injection-route-parameters">
                            <a href="#dependency-injection-route-parameters">Dependency Injection & Route Parameters</a>
                        </h3>
                        <p>
                            If your controller method is also expecting input from a route parameter, you should list your route parameters after your other dependencies. For example, if your route is defined like this:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::put('/user/{id}', [UserController::class, 'update']);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can still type-hint the <code>Framework\Http\Request</code> and access your <code>id</code> route parameter by defining your controller method as follows:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>namespace App\Controllers;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Http\Request;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class UserController extends Controller</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>public function update(Request $request, string $id)</span>
                                    </div>
                                    <div class="line indent">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>}</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                It's important to note that the order of arguments in the method is not crucial. In other words, you can use <code>public function update(string $id, Request $request)</code>. The key aspect is to ensure that the argument names align with the route parameters for proper binding.
                            </p>
                        </blockquote>
                        <h3 id="request-path-and-method">
                            <a href="#request-path-and-method">Request Path, Host, & Method</a>
                        </h3>
                        <p>
                            The <code>Framework\Http\Request</code> instance provides various methods for inspecting the incoming HTTP request and extends the <code>Symfony\Component\HttpFoundation\Request</code> class. Here, we'll explore some of the key methods.
                        </p>
                        <h4 id="retrieving-the-request-path">
                            <a href="#retrieving-the-request-path">Retrieving The Request Path</a>
                        </h4>
                        <p>
                            The <code>getPathInfo()</code> method returns the request's path information. For instance, if the incoming request is directed at <code>http://example.com/foo/bar</code>, calling <code>$request->getPathInfo()</code> will return <code>foo/bar</code>:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$uri = $request->getPathInfo();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="retrieving-the-request-method">
                            <a href="#retrieving-the-request-method">Retrieving The Request Method</a>
                        </h4>
                        <p>
                            Use the <code>isMethod</code> method to verify that the HTTP verb matches a given string:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>if ($request->isMethod('post')) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="request-headers">
                            <a href="#request-headers">Request Headers</a>
                        </h4>
                        <p>
                            You can retrieve a request header from the <code>Framework\Http\Request</code> instance using the <code>header</code> method. If the header is not present on the request, null will be returned. However, the <code>header</code> method accepts an optional second argument that will be returned if the header is not present:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$value = $request->header('X-Header-Name');</span>
                                    </div>
                                    <div class="line">
                                        <span>$value = $request->header('X-Header-Name', 'default');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            For convenience, the <code>bearerToken</code> method may be used to retrieve a bearer token from the <code>Authorization</code> header. If no such header is present, an empty string will be returned:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$token = $request->bearerToken();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="input">
                            <a href="#input">Input</a>
                        </h2>
                        <h3 id="retrieving-input">
                            <a href="#retrieving-input">Retrieving Input</a>
                        </h2>
                        <p>
                            You can obtain all incoming request input data as an <code>array</code> using the <code>all</code> method. This approach works whether the incoming request is from an HTML form or an XHR request:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$input = $request->all();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="retrieving-an-input-value">
                            <a href="#retrieving-an-input-value">Retrieving An Input Value</a>
                        </h2>
                        <p>
                            Regardless of the HTTP verb used for the request, you can access all user input from your <code>Framework\Http\Request</code> instance using the <code>input</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$name = $request->input('name');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can pass a default value as the second argument to the <code>input</code> method, which will be returned if the requested input value is not present:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$name = $request->input('name', 'John');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Calling the <code>input</code> method without any arguments retrieves all input values as an array, just like <code>all</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$input = $request->input();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="retrieving-input-via-dynamic-properties">
                            <a href="#retrieving-input-via-dynamic-properties">Retrieving Input Via Dynamic Properties</a>
                        </h4>
                        <p>
                            User input can also be accessed using dynamic properties on the <code>Framework\Http\Request</code> instance. For instance, if one of your application's forms includes a name field, you can access the value like this:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>$name = $request->name;</span>
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
