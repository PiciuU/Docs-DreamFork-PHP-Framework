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
                        <h1>Responses</h1>
                        <ul>
                            <li>
                                <a href="#creating-responses">Creating Responses</a>
                                <ul>
                                    <li>
                                        <a href="#strings-arrays">Strings & Arrays</a>
                                    </li>
                                    <li>
                                        <a href="#response-objects">Response Objects</a>
                                    </li>
                                    <li>
                                        <a href="#orm-models-and-collections">ORM Models & Collections</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#other-response-types">Other Response Types</a>
                                <ul>
                                    <li>
                                        <a href="#no-content-responses">No Content Responses</a>
                                    </li>
                                    <li>
                                        <a href="#view-responses">View Responses</a>
                                    </li>
                                    <li>
                                        <a href="#json-responses">JSON Responses</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="creating-responses">
                            <a href="#creating-responses">Creating Responses</a>
                        </h2>
                        <h3 id="strings-arrays">
                            <a href="#strings-arrays">Strings & Arrays</a>
                        </h3>
                        <p>
                            All routes and controllers should return a response to be sent back to the user's browser. Dreamfork offers various ways to return responses. The most basic response involves returning a string from a route or controller. The framework will automatically convert the string into a full HTTP response:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return 'Hello World';</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Besides returning strings, you can also return arrays. The framework will automatically convert the array into a JSON response:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return [1,2,3];</span>
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
                                You can also return <a href="/docs/1.x/orm-collections">ORM collections</a> from your routes or controllers, and they will be automatically converted to JSON.
                            </p>
                        </blockquote>
                        <h3 id="response-objects">
                            <a href="#response-objects">Response Objects</a>
                        </h3>
                        <p>
                            Typically, your route actions won't just return simple strings or arrays. Instead, you might return full <code>Framework\Http\Response</code> instances or <a href="/docs/1.x/views">views</a>.
                        </p>
                        <p>
                            Returning a full <code>Response</code> instance enables you to customize the response's HTTP status code and headers. A <code>Response</code> instance inherits from the <code>Symfony\Component\HttpFoundation\Response</code> class, providing various methods for building HTTP responses:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return response('Hello World', 200);</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="orm-models-and-collections">
                            <a href="#orm-models-and-collections">ORM Models & Collections</a>
                        </h3>
                        <p>
                            You can also directly return <a href="/docs/1.x/orm">ORM</a> models and collections from your routes and controllers. Laravel will automatically convert these models and collections to JSON responses while respecting the model's hidden attributes:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use App\Models\User;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>Route::get('/', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="other-response-types">
                            <a href="#other-response-types">Other Response Types</a>
                        </h2>
                        <p>
                            The <code>response</code> helper can be employed to generate various types of response instances. When the <code>response</code> helper is called without arguments, it returns an implementation of the Framework\Http\Routing\ResponseFactory class. This class provides several helpful methods for generating responses.
                        </p>
                        <h3 id="no-content-responses">
                            <a href="#no-content-responses">No Content Responses</a>
                        </h3>
                        <p>
                            To send a response with no content, you can use the <code>noContent</code> method, which returns a response without content and with a status of 204:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>return response()->noContent();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="view-responses">
                            <a href="#view-responses">View Responses</a>
                        </h3>
                        <p>
                            If you require control over the response's status and headers but also need to return a view as the response's content, use the <code>view</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>return response()->view('welcome', $data, 200);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Of course, if you do not need to pass a custom HTTP status code or custom headers, you may use the global <code>view</code> helper function.
                        </p>
                        <h3 id="json-responses">
                            <a href="#json-responses">JSON Responses</a>
                        </h3>
                        <p>
                            The <code>json</code> method automatically sets the <code>Content-Type</code> header to <code>application/json</code> and converts the given array to JSON using the <code>json_encode</code> PHP function:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>return response()->json([</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'user' => User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            For creating a JSONP response, you can use the <code>jsonp</code> method:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>return response()->jsonp($request->input('callback'), [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>'user' => User::find(1);</span>
                                    </div>
                                    <div class="line">
                                        <span>]);</span>
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
