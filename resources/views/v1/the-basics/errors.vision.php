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
                        <h1>Errors</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#configuration">Configuration</a>
                            </li>
                            <li>
                                <a href="#exception-handler">The Exception Handler</a>
                                <ul>
                                    <li>
                                        <a href="#reporting-exceptions">Reporting Exceptions</a>
                                    </li>
                                    <li>
                                        <a href="#rendering-exceptions">Rendering Exceptions</a>
                                    </li>
                                    <li>
                                        <a href="#http-exceptions">HTTP Exceptions</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#logging">Logging</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            Upon initiating a new Dreamfork project, error and exception handling come pre-configured for your convenience. The <code>App\Exceptions\Handler</code> class serves as the central location where all exceptions thrown by your application are logged and subsequently presented to the user. Further exploration of this class will be covered in more detail throughout this documentation.
                        </p>
                        <h2 id="configuration">
                            <a href="#configuration">Configuration</a>
                        </h2>
                        <p>
                            The <code>debug</code> option in your <code>config/app.php</code> configuration file dictates the level of error information displayed to the user. By default, this option is configured to respect the value of the <code>APP_DEBUG</code> environment variable, which is stored in your <code>.env</code> file.
                        </p>
                        <p>
                            For local development, it is recommended to set the <code>APP_DEBUG</code> environment variable to true. However, in a production environment, this value should always be set to false. Setting the value to true in a production environment poses a risk of exposing sensitive configuration values to your application's end users.
                        </p>
                        <h2 id="exception-handler">
                            <a href="#exception-handler">The Exception Handler</a>
                        </h2>
                        <h3 id="reporting-exceptions">
                            <a href="#reporting-exceptions">Reporting Exceptions</a>
                        </h3>
                        <p>
                            All exceptions in the application are handled by the <code>App\Exceptions\Handler</code> class, which, in turn, inherits from the main Exception Handler. This class contains the <code>register</code> method responsible for capturing all unhandled exceptions in the application and forwarding them to the main handler. If you feel the need to handle exceptions in a custom way, you can handle the exception within the <code>register</code> method instead of passing it to the <code>reportable</code> method. Alternatively, you can perform specific actions before forwarding the exception to <code>reportable</code>.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// App\Exceptions\Handler.php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>public function register(\Throwable $e): void</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// Performing own actions on exception before passing it to main handler.</span>
                                    </div>
                                    <div class="line indent">
                                        <span>// ...</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$this->reportable($e);</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="ignoring-exceptions">
                            <a href="#ignoring-exceptions">Ignoring Exceptions</a>
                        </h4>
                        <p>
                            Handler also allows you to define exceptions that should be muted and not reported further. To achieve this, assign an array of such exceptions to the <code>$dontReport</code> variable.
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// App\Exceptions\Handler.php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>protected $dontReport = [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>\Exception::class</span>
                                    </div>
                                    <div class="line">
                                        <span>];</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>public function register(\Throwable $e): void</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>$this->reportable($e);</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="global-log-context">
                            <a href="#global-log-context">Global Log Context</a>
                        </h4>
                        <p>
                            When possible, DreamFork automatically includes the ID of the currently authorized user as contextual data for each exception. It is also possible to define custom global contextual data by implementing the <code>context</code> method on the Handler:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// App\Exceptions\Handler.php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>public function context(): array</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>return array_merge(parent::context(), [ 'foo' => 'bar', ]);</span>
                                    </div>
                                    <div class="line">
                                        <span>}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h4 id="global-log-context">
                            <a href="#global-log-context">Exception Log Context</a>
                        </h4>
                        <p>
                            While including context in every log message can be beneficial, there are instances where a specific exception may require unique context for enhanced logging. By defining a <code>context</code> method within one of your application's exceptions, you can specify any data pertinent to that exception, which will be added to the exception's log entry:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>&lt;?php</span>
                                    </div>
                                    <div class="line">
                                        <span>namespace App\Exceptions;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>class CustomException extends \Exception</span>
                                    </div>
                                    <div class="line">
                                        <span>{</span>
                                    </div>
                                    <div class="line indent">
                                        <span>public function context() {</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>return ['custom' => 'my_custom_value'];</span>
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
                        <h4 id="exception-log-levels">
                            <a href="#exception-log-levels">Exception Log Levels</a>
                        </h4>
                        <p>
                            All application logs resulting from the handling of a caught exception are recorded with a specified log level indicating the importance of the message being logged. If you wish to associate a particular type of exception with a specific log level, you can define the <code>$levels</code> property. This property should contain an array of exception types and their corresponding log levels, following the <a href="https://www.php-fig.org/psr/psr-3/">PSR-3 standard</a>:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>// App\Exceptions\Handler.php</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>use Framework\Log\LogLevel;</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                    <div class="line">
                                        <span>protected $levels = [</span>
                                    </div>
                                    <div class="line indent">
                                        <span>\PDOException::class => LogLevel::CRITICAL</span>
                                    </div>
                                    <div class="line">
                                        <span>];</span>
                                    </div>
                                    <div class="line">
                                        <span>&nbsp;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="rendering-exceptions">
                            <a href="#rendering-exceptions">Rendering Exceptions</a>
                        </h3>
                        <p>
                            DreamFork converts caught exceptions into responses based on the utilized interface. For example, when using the API interface and the request includes the header <code>Accept: application/json</code>, the Handler will return a JsonResponse with an appropriate structure. Otherwise, it will return an HTTP response with a rendered view describing the caught exception.
                        </p>
                        <h4 id="exception-response-configuration">
                            <a href="#exception-response-configuration">Exception Response Configuration</a>
                        </h4>
                        <p>
                            Returned responses contain varying levels of feedback information based on the <a href="/docs/1.x/errors#configuration">debug configuration</a>. When the <code>debug mode</code> is enabled, the application provides expanded data, assisting developers in pinpointing the cause of an exception. In cases where the <code>debug mode</code> is disabled, the application returns minimal data to prevent potential leakage of inappropriate information when users encounter errors in the application.
                        </p>
                        <h3 id="http-exceptions">
                            <a href="#http-exceptions">HTTP Exceptions</a>
                        </h3>
                        <p>
                            DreamFork by default provides two types of rendered views for exceptions. The developer view, available when the <code>debug mode</code> is enabled, displays comprehensive information about the caught exception. The user view, applicable when the <code>debug mode</code> is disabled, presents a general error message along with the status code.
                        </p>
                        <h4 id="custom-http-error-pages">
                            <a href="#custom-http-error-pages">Custom HTTP Error Pages</a>
                        </h4>
                        <p>
                            The previously described views are available in the directory <code>/resources/views/exceptions</code>. Feel free to customize them as needed.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                If you intend to make significant modifications to these views, you may need to edit the exception renderer located in the <code>/framework/Exceptions/ExceptionRenderer.php</code> directory.
                            </p>
                        </blockquote>
                        <h2 id="logging">
                            <a href="#logging">Logging</a>
                        </h2>
                        <p>
                            As previously mentioned, DreamFork logs caught exceptions by recording them in the event log. This log is located in the <code>/storage/logs/dreamfork.log</code> directory and contains simplified entries regarding the caught exceptions.
                        </p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
