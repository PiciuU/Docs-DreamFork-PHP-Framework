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
                        <h1>Request Lifecycle</h1>
                        <ul>
                            <li>
                                <a href="#lifecycle-overview">Lifecycle Overview</a>
                                <ul>
                                    <li>
                                        <a href="#first-steps">First Steps</a>
                                    </li>
                                    <li>
                                        <a href="#http-console-kernels">HTTP / Console Kernels</a>
                                    </li>
                                    <li>
                                        <a href="#routing">Routing</a>
                                    </li>
                                    <li>
                                        <a href="#finishing-up">Finishing up</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2 id="lifecycle-overview">
                            <a href="#lifecycle-overview">Lifecycle Overview</a>
                        </h2>
                        <h3 id="first-steps">
                            <a href="#first-steps">First Steps</a>
                        </h3>
                        <p>
                            The <code>public/index.php</code> file serves as the entry point for all requests to a Dreamfork application. Your web server configuration (Apache/Nginx) directs all requests to this file. While the <code>index.php</code> file isn't extensive in code, it serves as the initial step for loading the remainder of the framework.
                        </p>
                        <p>
                            Within the <code>index.php</code> file, the Composer-generated autoloader definition is loaded. Subsequently, an instance of the Dreamfork application is obtained from <code>bootstrap/app.php</code>. Dreamfork's initial action involves creating an instance of the application / <a href="/docs/1.x/container">service container</a>.
                        </p>
                        <h3 id="http-console-kernels">
                            <a href="#http-console-kernels">HTTP / Console Kernels</a>
                        </h3>
                        <p>
                            Once a request arrives, it is directed to the <code>HTTP Kernel</code>, which triggers the bootstrap process of the previously created application instance. After the bootstrap, the Kernel takes charge of handling the request by passing it to the Router in the handle method. The <code>handle</code> method is a signature method for the Kernel and is straightforward in its operation. It takes a <code>Request</code> as input and returns a <code>Response</code>, which is subsequently sent to the user.
                        </p>
                        <p>
                            The framework also incorporates a <code>Console Kernel</code>, which is invoked solely from the terminal command line and is not accessible via HTTP. It is utilized by <code>dfork</code>, a program similar to Laravel's Artisan. <a href="/docs/1.x/dfork">Dfork</a> facilitates the execution of commands that streamline work with the framework, such as maintenance mode, symbolic linking of storage, or generating skeletons for models/controllers.
                        </p>
                        <h3 id="routing">
                            <a href="#routing">Routing</a>
                        </h3>
                        <p>
                            Routing is a crucial aspect of the framework, wherein an incoming request handled by the Kernel is directed to the Router, responsible for further processing. The Router leverages the provider called <code>RouterServiceProvider</code>, which loads available <code>routes</code> into the application and determines the utilized interface (web or api).
                        </p>
                        <p>
                            Upon receiving a request, the router checks the available routes to determine where the request should be directed. The router then dispatches the request to the appropriate route and controller, from which it subsequently receives a response. This response is transformed by the router into either a <code>Symfony Response</code> or <code>Symfony JsonResponse</code>, depending on the utilized interface and the data the response is meant to send. The prepared response is then returned to the Kernel.
                        </p>
                        <h3 id="finishing-up">
                            <a href="#finishing-up">Finishing Up</a>
                        </h3>
                        <p>
                            The prepared response is sent back to the HTTP Kernel, specifically its <code>handle</code> method. This method returns a response object, and in the <code>index.php</code> file, the send method is invoked on the returned response. The <code>send</code> method facilitates the transmission of the response content to the user's web browser.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
