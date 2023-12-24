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
                        <h1>Configuration</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#environment-configuration">Environment Configuration</a>
                                <ul>
                                    <li>
                                        <a href="#retrieving-environment-configuration">Retrieving Environment Configuration</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#accessing-configuration-values">Accessing Configuration Values</a>
                            </li>
                            <li>
                                <a href="#debug-mode">Debug Mode</a>
                            </li>
                            <li>
                                <a href="#maintenance-mode">Maintenance Mode</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            All configuration files for the Dreamfork framework are located in the <code>config</code> directory. Each option is extensively documented, providing you with the flexibility to explore and understand the available configuration settings.
                        </p>
                        <p>
                            These files allow you to configure crucial aspects such as your database connection details, and other settings like your application timezone. Feel free to navigate through these files to tailor your configuration according to your project's requirements.
                        </p>
                        <h2 id="environment-configuration">
                            <a href="#environment-configuration">Environment Configuration</a>
                        </h2>
                        <p>
                            Customizing configuration values based on the environment where your application runs is often essential. For instance, you might want different database settings for local development compared to your production server.
                        </p>
                        <p>
                            To simplify this process, Dreamfork relies on the <a href="https://github.com/vlucas/phpdotenv">DotEnv</a> PHP library. In a new Dreamfork installation, the root directory of your application will include a <code>.env.example</code> file defining numerous common environment variables. During the installation, this file will be automatically copied to <code>.env</code>.
                        </p>
                        <p>
                            The default <code>.env</code> file in Dreamfork contains common configuration values that may vary depending on whether your application is running locally or on a production web server. These values are then fetched from various configuration files within the config directory using Dreamfork's env function.
                        </p>
                        <h4 id="environment-file-security">
                            <a href="#environment-file-security">Environment File Security</a>
                        </h4>
                        <p>
                            It is crucial not to include your <code>.env</code> file in your application's source control. This is because each developer or server using your application might necessitate a distinct environment configuration. Additionally, including it poses a security risk if an intruder gains access to your source control repository, as it may expose sensitive credentials.
                        </p>
                        <h3 id="retrieving-environment-configuration">
                            <a href="#retrieving-environment-configuration">Retrieving Environment Configuration</a>
                        </h3>
                        <p>
                            All the variables specified in the <code>.env</code> file will be automatically loaded into the <code>$_ENV</code> PHP super-global when your application receives a request. However, you can use the <code>env</code> function to fetch values from these variables in your configuration files. In fact, upon reviewing the Dreamfork configuration files, you'll observe that many options already employ this function:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>'env' => env('APP_ENV', 'production'),</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            The second parameter passed to the <code>env</code> function is the "default value." This value will be returned if no environment variable exists for the given key.
                        </p>
                        <h2 id="accessing-configuration-values">
                            <a href="#accessing-configuration-values">Accessing Configuration Values</a>
                        </h2>
                        <p>
                            You can conveniently retrieve your configuration values using the global <code>config</code> function from any part of your application. To access configuration values, utilize "dot" syntax, which involves specifying the name of the file and the option you want to access. If the configuration option does not exist, you can also provide a default value, which will be returned:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line"><span class="variable">$value </span><span class="punctuation">= </span><span class="function">config</span><span class="parentheses">(</span><span class="text">'app.timezone'</span><span class="parentheses">)</span><span class="punctuation">;</span></div>
                                    <div class="line">&nbsp;</div>
                                    <div class="line"><span class="comment">// Retrieve a default value if the configuration value does not exist...</span></div>
                                    <div class="line">
                                        <span class="variable">$value </span><span class="punctuation">= </span><span class="function">config</span><span class="parentheses">(</span><span class="text">'app.timezone'</span><span class="punctuation">, </span><span class="text">'Europe/Warsaw'</span><span class="parentheses">)<span class="punctuation">;</span></span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            This feature allows, for instance, easy determination of the application environment. Based on this, you can create conditional blocks in your code, adjusting the behavior according to the detected environment:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span class="keyword">if </span><span class="parentheses">(</span><span class="function">config</span><span class="parentheses">(</span><span class="text">'app.env'</span><span class="parentheses">) == <span class="text">'local'</span><span class="parentheses">) {</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="comment">// The environment is local</span>
                                    </div>
                                    <div class="line">
                                        <span class="parentheses">}</span><span class="keyword"> else </span><span class="parentheses">{</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="comment">// The environment is production</span>
                                    </div>
                                    <div class="line">
                                        <span class="parentheses">}</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h2 id="debug-mode">
                            <a href="#debug-mode">Debug Mode</a>
                        </h2>
                        <p>
                            The <code>debug</code> option in your <code>config/app.php</code> configuration file governs the extent of error information displayed to the user. By default, this option is configured to respect the value of the <code>APP_DEBUG</code> environment variable, which is stored in your <code>.env</code> file.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                During local development, it's advisable to set the <code>APP_DEBUG</code> environment variable to true. <strong>However, in a production environment, this value should always be set to false. Setting the variable to true in a production environment may pose a security risk by potentially exposing sensitive configuration values to end-users of your application.</strong>
                            </p>
                        </blockquote>
                        <h2 id="maintenance-mode">
                            <a href="#maintenance-mode">Maintenance Mode</a>
                        </h2>
                        <p>
                            When your application is in maintenance mode, a custom view will be presented for all incoming requests. This allows you to effectively "disable" your application temporarily during updates or maintenance tasks.
                        </p>
                        <p>
                            To activate maintenance mode, run the following Dfork command:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>php dfork maintenance:enable</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            Upon activating maintenance mode, two files will be generated in the <code>storage/framework</code> directory, governing the functionality of the maintenance mode. One of them is <code>maintenance_config</code>, containing the settings for maintenance mode.
                        </p>
                        <div class="content-list">
                            <ul>
                                <li>
                                    <code>whitelist_ip</code> allows you to define an array of authorized IP addresses that can bypass maintenance mode.
                                </li>
                                <li>
                                    <code>template</code> specifies the file to be used as the maintenance mode view.
                                </li>
                                <li>
                                    <code>secret</code> lets you set a secret key that, when appended to the browser's address as "?secret=your_secret_key," allows bypassing maintenance mode.
                                </li>
                                <li>
                                    <code>status</code> defines the HTTP response status code.
                                </li>
                                <li>
                                    <code>redirect</code> points to the location where the user will be redirected from maintenance mode.
                                </li>
                                <li>
                                    <code>refresh</code> and <code>retry</code> determine the intervals for page refresh to check if the maintenance mode has concluded.
                                </li>
                            </ul>
                        </div>
                        <p>
                            You can deactivate maintenance mode using the following command:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>php dfork maintenance:disable</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                You have the option to customize the default maintenance mode template by creating your own template at <code>storage/framework/resources/maintenance_view.php</code>. <strong>Please note that the maintenance mode doesn't support the Vision template engine.</strong>
                            </p>
                        </blockquote>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
