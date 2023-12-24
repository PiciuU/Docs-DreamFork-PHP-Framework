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
                        <h1>Deployment</h1>
                        <ul>
                            <li>
                                <a href="#introduction">Introduction</a>
                            </li>
                            <li>
                                <a href="#server-requirements">Server Requirements</a>
                            </li>
                            <li>
                                <a href="#server-configuration">Server Configuration</a>
                                <ul>
                                    <li>
                                        <a href="#nginx">Nginx</a>
                                    </li>
                                    <li>
                                        <a href="#web-hosting">Web Hosting</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#optimization">Optimization</a>
                            </li>
                            <li>
                                <a href="#server-configuration">Debug Mode</a>
                            </li>
                        </ul>
                        <h2 id="introduction">
                            <a href="#introduction">Introduction</a>
                        </h2>
                        <p>
                            When you're prepared to deploy your Dreamfork application to production, there are several crucial steps you can take to ensure optimal performance. In this document, we'll outline some key initial measures to ensure a successful deployment of your Dreamfork application.
                        </p>
                        <h2 id="server-requirements">
                            <a href="#server-requirements">Server Requirements</a>
                        </h2>
                        <p>
                            The Dreamfork framework has specific system requirements. Please make sure that your web server meets the following minimum PHP version and includes the required extensions:
                        </p>
                        <div class="content-list">
                            <ul>
                                <li>PHP >= 8.1</li>
                                <li>Ctype PHP Extension</li>
                                <li>cURL PHP Extension</li>
                                <li>DOM PHP Extension</li>
                                <li>Fileinfo PHP Extension</li>
                                <li>Filter PHP Extension</li>
                                <li>Hash PHP Extension</li>
                                <li>Mbstring PHP Extension</li>
                                <li>OpenSSL PHP Extension</li>
                                <li>PCRE PHP Extension</li>
                                <li>PDO PHP Extension</li>
                                <li>Session PHP Extension</li>
                                <li>Tokenizer PHP Extension</li>
                                <li>XML PHP Extension</li>
                            </ul>
                        </div>
                        <h2 id="server-configuration">
                            <a href="#server-configuration">Server Configuration</a>
                        </h2>
                        <h3 id="nginx">
                            <a href="#nginx">Nginx</a>
                        </h3>
                        <p>
                            When deploying your application on a server running Nginx, you can utilize the following configuration file as a basis for setting up your web server. It is important to customize this file according to your server's specific configuration.
                        </p>
                        <p>
                            Ensure, similar to the configuration provided below, that your web server routes all requests to the <code>public/index.php</code> file of your application. Avoid moving the <code>index.php</code> file to your project's root, as serving the application from the project root could expose sensitive configuration files to the public Internet:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>server &lbrace;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>listen 80;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>listen [::]:80;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>server_name example.com;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>root /srv/example.com/public;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>add_header X-Frame-Options "SAMEORIGIN";</span>
                                    </div>
                                    <div class="line indent">
                                        <span>add_header X-Content-Type-Options "nosniff";</span>
                                    </div>
                                    <div class="line indent">
                                        <span>index index.php;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>charset utf-8;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>location / &lbrace;</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>try_files $uri $uri/ /index.php?$query_string;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&rbrace;</span>
                                    </div>
                                    <div class="line indent">
                                        <span> location = /favicon.ico { access_log off; log_not_found off; }</span>
                                    </div>
                                    <div class="line indent">
                                        <span> location = /robots.txt { access_log off; log_not_found off; }</span>
                                    </div>
                                    <div class="line indent">
                                        <span>error_page 404 /index.php;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>location ~ \.php$ &lbrace;</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>include fastcgi_params;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&rbrace;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>location ~ /\.(?!well-known).* &lbrace;</span>
                                    </div>
                                    <div class="line indent">
                                        <span class="indent"></span>
                                        <span>deny all;</span>
                                    </div>
                                    <div class="line indent">
                                        <span>&rbrace;</span>
                                    </div>
                                    <div class="line">
                                        <span>&rbrace;</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <h3 id="web-hosting">
                            <a href="#web-hosting">Web Hosting</a>
                        </h3>
                        <p>
                            When using web hosting services and lacking access to configure Nginx or Apache, manual deployment of the application is possible. Place all application files in the main directory of your domain. Then, move the <code>public</code> folder to a subdirectory, which might be either <code>public_html</code> or <code>private_html</code> depending on your server's settings. Subsequently, in the public/index.php file, adjust all paths to point to the relevant application files located in the main directory. Ensure that access to these files is restricted from the browser user's perspective.
                        </p>
                        <p>
                            This way, the application will be accessible through the URL <code>example.com/public/</code> for users. If you want the application URL to be without the folder name, you can extract the files from the public folder and place them directly in the <code>public_html</code> or <code>private_html</code> folder.
                        </p>
                        <h2 id="optimization">
                            <a href="#optimization">Optimization</a>
                        </h2>
                        <p>
                            When deploying your application, it is recommended to transfer all application files to the server, excluding folders like <code>vendor</code>, files from <code>storage/logs</code>, and files from <code>storage/framework/views</code>. This helps speed up the deployment process and reduces the potential for issues. After uploading the application, ensure to optimize Composer's class autoloader map for efficient class loading:
                        </p>
                        <div class="code-snippet">
                            <pre>
                                <code>
                                    <div class="line">
                                        <span>composer install --optimize-autoloader --no-dev</span>
                                    </div>
                                </code>
                            </pre>
                        </div>
                        <p>
                            This command will optimize the autoloader and exclude development dependencies, ensuring a smoother and faster production deployment. Remember to configure the <code>.env</code> configuration file correctly by adjusting the values to fit the production environment
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                If Composer isn't accessible on your server, manual transfer of the <code>vendor</code> folder is possible, but strongly discouraged due to potential compatibility issues. Installing Composer on the server and running <code>composer install</code> is the recommended approach for proper package management.
                            </p>
                        </blockquote>
                        <h2 id="debug-mode">
                            <a href="#debug-mode">Debug Mode</a>
                        </h2>
                        <p>
                            The debug option in your <code>config/app.php</code> configuration file controls the amount of information displayed to users in the event of an error. By default, this option aligns with the value of the <code>APP_DEBUG</code> environment variable stored in your application's <code>.env</code> file.
                        </p>
                        <blockquote>
                            <div class="icon"></div>
                            <p>
                                For the production environment, it's crucial to set this value to false. Enabling <code>APP_DEBUG</code> in production poses a risk of exposing sensitive configuration details to end users of your application.
                            </p>
                        </blockquote>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
