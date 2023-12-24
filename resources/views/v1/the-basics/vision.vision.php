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
                        <h1>Vision</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#displaying-data">Displaying Data</a>
                            </li>
                            <li>
                                <a href="#vision-directives">Vision Directives</a>
                                <ul>
                                    <li>
                                        <a href="#if-statements">If Statements</a>
                                    </li>
                                    <li>
                                        <a href="#loops-statements">Loops Statements</a>
                                    </li>
                                    <li>
                                        <a href="#resources">Resources</a>
                                    </li>
                                    <li>
                                        <a href="#components">Components</a>
                                    </li>
                                    <li>
                                        <a href="#assets">Assets</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Vision is a straightforward template engine inspired by Laravel's Blade. It allows the use of plain PHP in templates, and Vision templates are compiled into plain PHP and cached until the template is modified. This ensures that the view is compiled only once after detection of modifications, and subsequently, only the compiled version is rendered.
                        </p>
                        <p>
                            Vision template files have the extension <code>.vision.php</code> and are typically stored in the <code>resources/views</code> folder. They can be returned by routes or controllers using the global helper method called <code>view</code>. Of course, data can be passed to Vision views:
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
                        <h2 id="displaying-data">
                            <a href="#displaying-data">Displaying Data</a>
                        </h2>
                        <p>
                            In Vision, you can display data that is passed to your views by wrapping the variable in curly braces. For example, given the following route:
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
                        <p>
                            You can display the contents of the <code>name</code> variable like this:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>Welcome, &lbrace;&lbrace; $name &rbrace;&rbrace;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                Vision's <code>&lbrace;&lbrace; &rbrace;&rbrace;</code> echo statements are automatically processed through PHP's <code>htmlspecialchars</code> function to prevent XSS attacks.
                            </p>
                        </blockquote>
                        <p>
                            Moreover, you are not limited to displaying the contents of the variables passed to the view. You can also echo the results of any PHP function. In fact, you can insert any PHP code you wish inside a Vision echo statement:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>The current UNIX timestamp is &lbrace;&lbrace; time() &rbrace;&rbrace;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="vision-directives">
                            <a href="#vision-directives">Vision Directives</a>
                        </h2>
                        <p>
                            In addition to template inheritance and displaying data, Vision provides convenient shortcuts for common PHP control structures, such as conditional statements and loops. These shortcuts offer a clean and concise way to work with PHP control structures while remaining familiar to their PHP counterparts.
                        </p>
                        <h3 id="if-statements">
                            <a href="#if-statements">If Statements</a>
                        </h3>
                        <p>
                            You can construct <code>if</code> statements using the <code>&commat;if</code>, <code>&commat;elseif</code>, <code>&commat;else</code>, and <code>&commat;endif</code> directives in Vision. These directives function identically to their PHP counterparts:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&commat;if (count([1]) === 1)</span>
                                    </div>
                                    <div class="line indent">
                                        <span>I have one record!</span>
                                    </div>
                                    <div class="line">
                                        <span>&commat;elseif (count([2]) > 1)</span>
                                    </div>
                                    <div class="line indent">
                                        <span>I have multiple records!</span>
                                    </div>
                                    <div class="line">
                                        <span>&commat;else</span>
                                    </div>
                                    <div class="line indent">
                                        <span>I don't have any records!</span>
                                    </div>
                                    <div class="line">
                                        <span>&commat;endif</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="loops-statements">
                            <a href="#loops-statements">Loops Statements</a>
                        </h3>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&commat;foreach ($users as $user)</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&lt;p&gt;This is user &lbrace;&lbrace; $user->id &rbrace;&rbrace;&lt;/p&gt;</span>
                                    </div>
                                    <div class="line">
                                        <span>&commat;endforeach</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="resources">
                            <a href="#resources">Resources</a>
                        </h3>
                        <p>
                            The <code>&commat;resources</code> directive allows you to import a specific style or script directly into your view. The entry point for this method is the <code>/resources</code> folder. The specified style or script will be minified for optimization purposes and directly injected into the compiled view.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;style&gt;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&commat;resource(css/welcome.css)</span>
                                    </div>
                                    <div class="line">
                                        <span>&lt;/style&gt;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                Modifying a file imported using the <code>&commat;resources</code> directive may not be automatically detected by the view compiler. To observe changes, you should force a recompilation of the specific view, for example, by saving it again. This ensures that any modifications to the imported file are reflected in the compiled view.
                            </p>
                        </blockquote>
                        <h3 id="components">
                            <a href="#components">Components</a>
                        </h3>
                        <p>
                            The <code>&commat;components</code> directive enables the importing of other views into a specific view. Nested views will be correctly compiled by Vision, allowing changes in the imported file to be immediately visible without the need for manual recompilation. This makes it a tool for structuring and organizing your views, enhancing code reusability, and simplifying maintenance.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&commat;component(components/button)</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="assets">
                            <a href="#assets">Assets</a>
                        </h3>
                        <p>
                            While not a direct Vision directive, the <code>asset</code> method is a commonly used helper function within views. It allows you to specify an asset, such as an image, style, or script located in the public folder of your application.
                        </p>
                        <p>
                            To ensure a proper view structure, it is recommended to place styles, scripts, and images in the <code>/storage/app/public</code> folder. Then, create a <a href="/docs/1.x/structure#the-storage-directory">symbolic link</a> to this folder to make it accessible from the browser. For example, by running the following command:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>php dfork storage:link uploads</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            You can then utilize the <method>asset</method> helper in your view:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;link href="&lbrace;&lbrace; asset('uploads/css/styles.css') &rbrace;&rbrace;" /&gt;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Vision will translate this into a valid link pointing to <code>https://example.com/uploads/css/styles.css</code>. This ensures correct asset handling and accessibility in your application.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
