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
                        <h1>Views</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#passing-data-to-views">Passing Data To Views</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            While it's not practical to return entire HTML document strings directly from your routes and controllers, views offer a convenient way to organize HTML in separate files.
                        </p>
                        <p>
                            Views help in separating your controller/application logic from your presentation logic and are stored in the <code>resources/view</code> directory. In Dreamfork, view templates are commonly written using the simple <a href="/docs/1.x/vision">Vision template engine</a>. A simple view might look something like this:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;!-- View stored in resources/views/greeting.vision.php --&gt;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>&lt;html&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&lt;body&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>&lt;h1&gt;Welcome, &lbrace;&lbrace; $name &rbrace;&rbrace;&lt;/h1&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&lt;/body&gt;</span>
                                    </div>
                                    <div class="line">
                                        <span>&lt;/html&gt;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Given this view is stored at <code>resources/views/greeting.vision.php</code>, you can return it using the global <code>view</code> helper like this:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/', function() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return view('greeting', ['name' => 'John']);</span>
                                    </div>
                                    <div class="line">
                                        <span>});</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="passing-data-to-views">
                            <a href="#passing-data-to-views">Passing Data To Views</a>
                        </h2>
                        <p>
                            As demonstrated in the previous example, you can pass an array of data to views to make that data available within the view:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>return view('greeting', ['name' => 'John']);</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            When passing information in this manner, the data should be an array with key/value pairs. After providing data to a view, you can access each value within your view using the data's keys, for example, <code>&lt;?php echo $name; ?&gt;</code>.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
