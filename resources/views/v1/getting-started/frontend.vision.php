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
                        <h1>Frontend</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#using-php">Using PHP</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork is a backend framework equipped with essential features for developing modern web applications, including <a href="/docs/1.x/routing">routing</a>, <a href="/docs/1.x/validation">validation</a>, <a href="/docs/1.x/filesystem">file storage</a>, and more. When it comes to frontend development in Dreamfork, the recommended approach involves utilizing PHP in conjunction with the Vision template engine.
                        </p>
                        <h2 id="using-php">
                            <a href="#using-php">Using PHP</a>
                        </h2>
                        <p>
                            In the past, the conventional approach for PHP applications involved rendering HTML to the browser using basic HTML templates interspersed with PHP <code>echo</code> statements, presenting data retrieved from a database during the request:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;div&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&lt;?php foreach ($users as $user): ?&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>Hello, &lt;?php echo $user->name; ?&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&lt;?php endforeach; ?&gt</span>
                                    </div>
                                    <div class="line">
                                        <span>&lt;/div&gt;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            With Dreamfork, a similar method for rendering HTML is still achievable, leveraging <a href="/docs/1.x/views">views</a> and <a href="/docs/1.x/vision">Vision</a>. Vision is a lightweight and straightforward templating language that offers a concise syntax for displaying data, iterating over data, and more:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;div&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&commat;foreach ($users as $user)</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>Hello, &lbrace;&lbrace; $user->name &rbrace;&rbrace;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&commat;endforeach</span>
                                    </div>
                                    <div class="line">
                                        <span>&lt;/div&gt;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            When constructing applications using this approach, form submissions and other page interactions typically result in receiving an entirely new HTML document from the server, leading to the entire page being re-rendered by the browser. Even today, many applications may find this method suitable for constructing their frontends using straightforward Vision templates.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
