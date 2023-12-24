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
                        <h1>Facades</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#when-to-use-facades">When To Use Facades</a>
                                <ul>
                                    <li>
                                        <a href="#facades-vs-helper-functions">Facades Vs. Helper Functions</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#how-facades-work">How Facades Work</a>
                            </li>
                            <li>
                                <a href="#facade-class-reference">Facade Class Reference</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            In the Dreamfork documentation, you'll frequently come across code snippets that leverage Dreamfork's "facades" to interact with various features. Facades offer a "static" interface to classes registered in the application's service container. Dreamfork provides a range of facades, allowing convenient access to nearly all of framework functionalities.
                        </p>
                        <p>
                            Dreamfork facades act as "static proxies" to the underlying classes in the service container, delivering a concise and expressive syntax. This approach maintains superior testability and flexibility compared to traditional static methods.
                        </p>
                        <p>
                            All Dreamfork facades are neatly organized in the <code>Framework\Support\Facades</code> namespace. Consequently, accessing a facade is straightforward, as demonstrated below:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Hash;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$hash = Hash::make('raw_text');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="helper-functions">
                            <a href="#helper-functions">Helper Functions</a>
                        </h4>
                        <p>
                            To complement facades, Dreamfork provides a range of convenient global "helper functions," streamlining the interaction with common Dreamfork features. These helper functions, such as <code>view</code>, <code>response</code>, <code>url</code>, <code>config</code>, and more, offer a simplified approach to various tasks. Each helper function in Dreamfork is thoroughly documented alongside its associated feature. You can find a comprehensive list in the dedicated <a href="/docs/1.x/helpers">helper documentation</a>.
                        </p>
                        <p>
                            For instance, instead of utilizing the <code>Framework\Support\Facades\Response</code> facade to create a JSON response, you can effortlessly use the <code>response</code> function. Thanks to the global availability of helper functions, there's no need to import any classes before putting them to use:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Response;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return Response::json([$data]);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return response()->json([$data]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="when-to-use-facades">
                            <a href="#when-to-use-facades">When To Use Facades</a>
                        </h2>
                        <p>
                            Facades offer a short and memorable syntax, enabling you to utilize Dreamfork's features without the need to recall lengthy class names that require manual injection or configuration. Their use of PHP's dynamic methods also enhances ease of testing.
                        </p>
                        <h3 id="facades-vs-helper-functions">
                            <a href="#facades-vs-helper-functions">Facades Vs. Helper Functions</a>
                        </h3>
                        <p>
                            In addition to facades, Dreamfork provides a range of "helper" functions that handle common tasks such as generating views or sending HTTP responses. Many of these helper functions perform tasks equivalent to corresponding facades. For example, the following facade call and helper call are equivalent:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>return Framework\Support\Facades\View::make('welcome');</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>return view('welcome');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            There is no practical distinction between facades and helper functions. You can use them according to your preference when a corresponding helper function is defined for a given facade.
                        </p>
                        <h2 id="how-facades-work">
                            <a href="#how-facades-work">How Facades Work</a>
                        </h2>
                        <p>
                            In the Dreamfork framework, a facade serves as a convenient way to access objects from the container. The underlying mechanics are implemented in the <code>Facade</code> class, with Dreamfork's facades extending the base <code>Framework\Support\Facades\Facade</code> class.
                        </p>
                        <p>
                            The <code>Facade</code> class utilizes the <code>__callStatic()</code> magic method, deferring calls from the facade to an object resolved from the container. Consider the following example, where a call is made to Dreamfork's hash service:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use Framework\Support\Facades\Hash;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>$hash = Hash::make('raw_text');</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            At first glance, it might appear that the static <code>make</code> method is being called on the <code>Hash</code> class. However, this facade acts as a proxy, providing access to the underlying implementation of the <code>Framework\Services\Hash\HashManager</code> class. Any calls made through the facade are forwarded to the underlying instance of Dreamfork's hash manager.
                        </p>
                        <p>
                            In the case of the <code>Framework\Support\Facades\Hash</code> class, you won't find a static method named <code>make</code>. Instead, the Hash facade extends the base Facade class and defines the <code>getFacadeAccessor()</code> method. This method returns the name of a service container binding. When a user invokes any static method on the <code>Hash</code> facade, Dreamfork resolves the hash manager binding from the service container and executes the requested method (such as <code>make</code>) on that object.
                        </p>
                        <h2 id="facade-class-reference">
                            <a href="#facade-class-reference">Facade Class Reference</a>
                        </h2>
                        <p>
                            Below you will find every facade and its underlying class. The service container binding key is also included where applicable.
                        </p>
                        <div class="content-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Facade</th>
                                        <th>Class</th>
                                        <th>Service Container Binding</th>
                                        <th>Helper Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Auth</td>
                                        <td>Framework\Services\Auth\AuthManager</td>
                                        <td><code>auth</code></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>DB</td>
                                        <td>Framework\Database\DatabaseManager</td>
                                        <td><code>db</code></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Storage</td>
                                        <td>Framework\Filesystem\FilesystemManager</td>
                                        <td><code>filesystem</code></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Hash</td>
                                        <td>Framework\Services\Hash\HashManager</td>
                                        <td><code>hash</code></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Request</td>
                                        <td>Framework\Http\Request</td>
                                        <td><code>request</code></td>
                                        <td><a href="/docs/1.x/helpers#method-request">request()</a></td>
                                    </tr>
                                    <tr>
                                        <td>Response</td>
                                        <td>Framework\Http\Response</td>
                                        <td><code>response</code></td>
                                        <td><a href="/docs/1.x/helpers#method-response">response()</a></td>
                                    </tr>
                                    <tr>
                                        <td>Route</td>
                                        <td>Framework\Http\Router</td>
                                        <td><code>route</code></td>
                                        <td><a href="/docs/1.x/helpers#method-router">router()</a></td>
                                    </tr>
                                    <tr>
                                        <td>URL</td>
                                        <td>Framework\Services\URL\UrlGenerator</td>
                                        <td><code>url</code></td>
                                        <td><a href="/docs/1.x/helpers#method-url">url()</a></td>
                                    </tr>
                                    <tr>
                                        <td>Validator</td>
                                        <td>Framework\Services\Validator\Factory</td>
                                        <td><code>validator</code></td>
                                        <td><a href="/docs/1.x/helpers#method-validator">validator()</a></td>
                                    </tr>
                                    <tr>
                                        <td>View</td>
                                        <td>Framework\View\Factory</td>
                                        <td><code>view</code></td>
                                        <td><a href="/docs/1.x/helpers#method-view">view()</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
