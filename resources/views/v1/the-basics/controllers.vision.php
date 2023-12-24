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
                        <h1>Controllers</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#writing-controllers">Writing Controllers</a>
                                <ul>
                                    <li>
                                        <a href="#basic-controllers">Basic Controllers</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Instead of defining all your request handling logic as closures in route files, consider organizing this behavior using "controller" classes. Controllers group related request handling logic into a single class, promoting better organization and maintainability. By default, controllers are stored in the <code>App/Controllers</code> directory.
                        </p>
                        <h2 id="writing-controllers">
                            <a href="#writing-controllers">Writing Controllers</a>
                        </h2>
                        <h3 id="basic-controllers">
                            <a href="#basic-controllers">Basic Controllers</a>
                        </h3>
                        <p>
                            To quickly generate a new controller, use the following command:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>php dfork make:controller UserController</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The created controller will automatically receive a basic structure, inheriting the <code>Request</code> class and extending the foundational <code>Controller</code> class.
                        </p>
                        <p>
                            Once you have written a controller class and method, you may define a route to the controller method like so:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Route::get('/user', [UserController::class, 'index']);</span>
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
