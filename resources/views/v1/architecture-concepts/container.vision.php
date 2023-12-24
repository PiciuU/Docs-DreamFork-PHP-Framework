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
                        <h1>Service Container</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#binding">Binding</a>
                                <ul>
                                    <li>
                                        <a href="#static-binding">Static binding</a>
                                    </li>
                                    <li>
                                        <a href="#aliases">Aliases</a>
                                    </li>
                                    <li>
                                        <a href="#singleton">Singleton</a>
                                    </li>
                                    <li>
                                        <a href="#dynamic-binding">Dynamic Binding</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Dreamfork utilizes a straightforward service container that implements dependency injection. This approach ensures that the application injects various helper classes or <a href="/docs/1.x/facades">facades</a> by creating their declarations, but initializes them only when they are actually used. This mechanism contributes to a more efficient and optimized utilization of resources within the framework.
                        </p>
                        <p>
                            In many cases, you will interact with the service container indirectly, using convenient helper classes or <code>facades</code> designed for this purpose.
                        </p>
                        <h2 id="binding">
                            <a href="#binding">Binding</a>
                        </h2>
                        <h3 id="static-binding">
                            <a href="#static-binding">Static binding</a>
                        </h3>
                        <p>
                            Service container is accessible from any part of your application, by utilizing the <code>app()</code> helper function. This allows you to register your own classes with the dependency injection system, making them available for use throughout your application.
                        </p>
                        <p>
                            Upon registering a class with the <code>app()</code> injector, it checks whether an instance of that class already exists. If an instance does not exist, the injector creates one. This ensures that the class will have only one shared instance throughout the application, providing you with consistent access to that instance:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use App\Services\Notification;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>app(Notification::class)->notify();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            By utilizing <code>app()</code>, you can conveniently access the service container and resolve instances without explicitly calling <code>make()</code>. This enhances the simplicity and readability of your code when working with the dependency injection system. This means that the following code would achieve exactly the same result:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use App\Services\Notification;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>app()->make(Notification::class)->notify();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="aliases">
                            <a href="#aliases">Aliases</a>
                        </h3>
                        <p>
                            In addition to registering classes in the service container, you can create <code>aliases</code> for instances within the dependency injector. This allows you to avoid repetitive class imports in places where you want to utilize the created instance. Instead, you can use the <code>alias</code> directly:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use App\Services\Notification;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>app()->alias('notification', Notification::class);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span class="comment">// Another file:</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>app('notification')->notify();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="singleton">
                            <a href="#singleton">Singleton</a>
                        </h3>
                        <p>
                            The approaches mentioned earlier inherently act as <code>Singletons</code>, meaning they create only one instance for a given class by default. However, the service container provides a dedicated function for creating <code>singletons</code>, although it achieves the same end result as using <code>make()</code> or <code>app()</code> with a parameter. This dedicated function is named <code>singleton()</code>:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use App\Services\Notification;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>app()->singleton('notification', Notification::class);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>app('notification')->notify();</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            One notable difference is that, in the case of such an instance definition, immediate use with method chaining is not possible. Initially, you need to create the <code>singleton</code>, and only then can you utilize it. Additionally, the <code>singleton()</code> method allows for the immediate definition of an <code>alias</code>.
                        </p>
                        <h3 id="dynamic-binding">
                            <a href="#dynamic-binding">Dynamic Binding</a>
                        </h3>
                        <p>
                            Dynamic Binding allows you to define classes using the <code>bind()</code> function, where the default setting for the third parameter, the flag, is false. This configuration specifies that, for the given class, a new instance will be created each time it is called. The previously mentioned <code>singleton()</code> function utilizes the <code>bind()</code> method but with the third parameter set to true, ensuring a single shared instance of the specified class.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>use App\Services\Notification;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>app()->bind('notification', Notification::class);</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span class="comment">// Upon calling notify(), an instance of the Notification class is created.</span>
                                    </div>
                                    <div class="line">
                                        <span>app('notification')->notify();</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span class="comment">// As the bound class is not shared, another instance is created.</span>
                                    </div>
                                    <div class="line">
                                        <span>app('notification')->notify();</span>
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
